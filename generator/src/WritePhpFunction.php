<?php

namespace Safe;

class WritePhpFunction
{
    /**
     * @var Method
     */
    private $method;

    public function __construct(Method $method)
    {
        $this->method = $method;
    }

    /*
     * @return string
     */
    public function getPhpPrototypeFunction(): string
    {
        if ($this->method->getFunctionName()) {
            $returnType = $this->method->getSignatureReturnType();
            $returnType = $returnType ? ': '.$returnType : '';
            return 'function '.$this->method->getFunctionName().'('.$this->displayParamsWithType($this->method->getParams()).')'.$returnType.'{}';
        }
        return '';
    }

    /*
     * return string
     */
    public function getPhpFunctionalFunction(): string
    {
        if ($this->getPhpPrototypeFunction()) {
            return $this->writePhpFunction();
        }
        return '';
    }

    /*
     * return string
     */
    private function writePhpFunction(): string
    {
        $phpFunction = $this->method->getPhpDoc();
        $returnType = $this->method->getSignatureReturnType();
        $returnType = $returnType ? ': '.$returnType : '';
        $returnStatement = '';
        if ($this->method->getSignatureReturnType() !== 'void') {
            $returnStatement = "    return \$result;\n";
        }
        $moduleName = $this->method->getModuleName();

        $phpFunction .= "function {$this->method->getFunctionName()}({$this->displayParamsWithType($this->method->getParams())}){$returnType}
{";

        $includeErrorHandler = true;
        // Certain methods from curl don't need the custom error handler
        if ($moduleName !== 'Curl') {
            $params = $this->method->getParams();
            if (\count($params) > 0 && in_array($params[0]->getParameter(), ['handle', 'multi_handle', 'share_handle'])) {
                $includeErrorHandler = false;
            }
        }

        if ($includeErrorHandler) {
            $phpFunction .= "
    \$error = [];
    set_error_handler( function(int \$errno, string \$errstr, string \$errfile, int \$errline) use (&\$error) {
        \$error = [
            'type' => \$errno,
            'message' => \$errstr,
            'file' => \$errfile,
            'line' => \$errline,
        ];
        return false;
    });\n";
        }

        if (!$this->method->isOverloaded()) {
            $phpFunction .= '    $result = '.$this->printFunctionCall($this->method);
        } else {
            $method = $this->method;
            $inElse = false;
            do {
                $lastParameter = $method->getParams()[count($method->getParams())-1];
                if ($inElse) {
                    $phpFunction .= ' else';
                } else {
                    $phpFunction .= '    ';
                }
                if ($lastParameter->isVariadic()) {
                    $defaultValueToString = '[]';
                } else {
                    $defaultValue = $lastParameter->getDefaultValue();
                    $defaultValueToString = $this->defaultValueToString($defaultValue);
                }
                $phpFunction .= 'if ($'.$lastParameter->getParameter().' !== '.$defaultValueToString.') {'."\n";
                $phpFunction .= '        $result = '.$this->printFunctionCall($method)."\n";
                $phpFunction .= '    }';
                $inElse = true;
                $method = $method->cloneAndRemoveAParameter();
                if (!$method->isOverloaded()) {
                    break;
                }
            } while (true);
            $phpFunction .= ' else {'."\n";
            $phpFunction .= '        $result = '.$this->printFunctionCall($method)."\n";
            $phpFunction .= '    }';
        }
        $phpFunction .= "\n    restore_error_handler();\n";

        $phpFunction .= $this->generateExceptionCode($moduleName, $this->method).$returnStatement. '}
';

        return $phpFunction;
    }

    private function generateExceptionCode(string $moduleName, Method $method) : string
    {
        switch ($method->getErrorType()) {
            case Method::FALSY_TYPE:
                $errorValue = 'false';
                break;
            case Method::NULLSY_TYPE:
                $errorValue = 'null';
                break;
            case Method::EMPTY_TYPE:
                $errorValue = "''";
                break;
            default:
                throw new \LogicException("Method doesn't have an error type");
        }
        // Special case for CURL: we need the first argument of the method if this is a resource.
        if ($moduleName === 'Curl') {
            $params = $method->getParams();
            if (\count($params) > 0) {
                if ($params[0]->getParameter() === 'handle') {
                    return "
    if (\$result === $errorValue) {
        throw CurlException::createFromCurlHandle(\$handle);
    }
";
                } elseif ($params[0]->getParameter() === 'multi_handle') {
                    return "
    if (\$result === $errorValue) {
        throw CurlException::createFromCurlMultiHandle(\$multi_handle);
    }
";
                } elseif ($params[0]->getParameter() === 'share_handle') {
                    return "
    if (\$result === $errorValue) {
        throw CurlException::createFromCurlShareHandle(\$share_handle);
    }
";
                }
            }
        }

        $exceptionName = FileCreator::toExceptionName($moduleName);
        return "
    if (\$result === $errorValue) {
        throw {$exceptionName}::createFromPhpError(\$error);
    }
";
    }

    /**
     * @param Parameter[] $params
     * @return string
     */
    private function displayParamsWithType(array $params): string
    {
        $paramsAsString = [];
        $optDetected = false;

        foreach ($params as $param) {
            $paramAsString = $param->getSignatureType();
            if ($paramAsString !== '') {
                $paramAsString .= ' ';
            }

            $paramName = $param->getParameter();
            if ($param->isVariadic()) {
                $paramAsString .= ' ...$'.$paramName;
            } else {
                if ($param->isByReference()) {
                    $paramAsString .= '&';
                }
                $paramAsString .= '$'.$paramName;
            }


            if ($param->hasDefaultValue() || $param->isOptionalWithNoDefault()) {
                $optDetected = true;
            }
            $defaultValue = $param->getDefaultValue();
            if ($defaultValue !== null) {
                $paramAsString .= ' = '.$this->defaultValueToString($defaultValue);
            } elseif ($optDetected && !$param->isVariadic()) {
                $paramAsString .= ' = null';
            }
            $paramsAsString[] = $paramAsString;
        }

        return implode(', ', $paramsAsString);
    }

    private function printFunctionCall(Method $function): string
    {
        $functionCall = '\\'.$function->getFunctionName().'(';
        $functionCall .= implode(', ', \array_map(function (Parameter $parameter) {
            $str = '';
            if ($parameter->isVariadic()) {
                $str = '...';
            }
            return $str.'$'.$parameter->getParameter();
        }, $function->getParams()));
        $functionCall .= ');';
        return $functionCall;
    }

    private function defaultValueToString(?string $defaultValue): string
    {
        if ($defaultValue === null) {
            return 'null';
        }
        if ($defaultValue === '') {
            return "''";
        }
        return $defaultValue;
    }
}
