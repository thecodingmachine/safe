<?php

declare(strict_types=1);

namespace Safe;

class WritePhpFunction
{
    public function __construct(private Method $method)
    {
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
            $returnStatement = "    return \$safeResult;\n";
        }
        $moduleName = $this->method->getModuleName();

        $phpFunction .= "function {$this->method->getFunctionName()}({$this->displayParamsWithType($this->method->getParams())}){$returnType}
{
    error_clear_last();
";

        if (!$this->method->isOverloaded()) {
            $phpFunction .= '    $safeResult = '.$this->printFunctionCall($this->method);
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
                $phpFunction .= 'if ($'.$lastParameter->getParameterName().' !== '.$defaultValueToString.') {'."\n";
                $phpFunction .= '        $safeResult = '.$this->printFunctionCall($method)."\n";
                $phpFunction .= '    }';
                $inElse = true;
                $method = $method->cloneAndRemoveAParameter();
                if (!$method->isOverloaded()) {
                    break;
                }
            } while (true);
            $phpFunction .= ' else {'."\n";
            $phpFunction .= '        $safeResult = '.$this->printFunctionCall($method)."\n";
            $phpFunction .= '    }';
        }

        $phpFunction .= $this->generateExceptionCode($moduleName, $this->method).$returnStatement. '}
';

        return $phpFunction;
    }

    private function generateExceptionCode(string $moduleName, Method $method) : string
    {
        $errorValue = match ($method->getErrorType()) {
            Method::FALSY_TYPE => 'false',
            Method::NULLSY_TYPE => 'null',
            Method::EMPTY_TYPE => "''",
            default => throw new \LogicException("Method doesn't have an error type"),
        };

        // Special case for CURL: we need the first argument of the method if this is a resource.
        if ($moduleName === 'Curl') {
            $params = $method->getParams();
            if (\count($params) > 0 && in_array($params[0]->getParameterType(), ['CurlHandle', 'CurlMultiHandle', 'CurlShareHandle'])) {
                $name = $params[0]->getParameterName();
                return "
    if (\$safeResult === $errorValue) {
        throw CurlException::createFromPhpError(\$$name);
    }
";
            }
        }

        $exceptionName = FileCreator::toExceptionName($moduleName);
        return "
    if (\$safeResult === $errorValue) {
        throw {$exceptionName}::createFromPhpError();
    }
";
    }

    /**
     * @param Parameter[] $params
     */
    private function displayParamsWithType(array $params): string
    {
        $paramsAsString = [];
        $optDetected = false;

        foreach ($params as $param) {
            $paramAsString = '';
            $typeDetected = false;

            // parameters can not have type void
            if ($param->getSignatureType() !== 'void') {
                $paramAsString = $param->getSignatureType();
            }

            if ($paramAsString !== '') {
                $paramAsString .= ' ';
                if ($param->isNullable() && $paramAsString[0] !== "?") {
                    $paramAsString = "?" . $paramAsString;
                }

                $typeDetected = true;
            }

            $paramName = $param->getParameterName();
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

                if ($typeDetected && $paramAsString[0] !== "?") {
                    $paramAsString = "?" . $paramAsString;
                }
            }
            $paramsAsString[] = $paramAsString;
        }

        return str_replace('\\\\', '\\', implode(', ', $paramsAsString));
    }

    private function printFunctionCall(Method $function): string
    {
        $functionCall = '\\'.$function->getFunctionName().'(';
        $functionCall .= implode(', ', \array_map(function (Parameter $parameter) {
            $str = '';
            if ($parameter->isVariadic()) {
                $str = '...';
            }
            return $str.'$'.$parameter->getParameterName();
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
