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
            return 'function '.$this->method->getFunctionName().'('.$this->displayParamsWithType($this->method->getParams()).')'.': '.$this->method->getReturnType().'{}';
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
        if ($this->method->getReturnType() !== 'mixed' && $this->method->getReturnType() !== 'resource') {
            $returnType = ': ' . $this->method->getReturnType();
        } else {
            $returnType = '';
        }
        $returnStatement = '';
        if ($this->method->getReturnType() !== 'void') {
            $returnStatement = "    return \$result;\n";
        }
        $moduleName = $this->method->getModuleName();

        $phpFunction .= "function {$this->method->getFunctionName()}({$this->displayParamsWithType($this->method->getParams())}){$returnType}
{
    error_clear_last();
";

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
            $phpFunction .= 'else {'."\n";
            $phpFunction .= '        $result = '.$this->printFunctionCall($method)."\n";
            $phpFunction .= '    }';
        }

        $phpFunction .= $this->generateExceptionCode($moduleName, $this->method).$returnStatement. '}

';

        return $phpFunction;
    }

    private function generateExceptionCode(string $moduleName, Method $method) : string
    {
        // Special case for CURL: we need the first argument of the method if this is a resource.
        if ($moduleName === 'Curl') {
            $params = $method->getParams();
            if (\count($params) > 0 && $params[0]->getParameter() === 'ch') {
                return "
    if (\$result === false) {
        throw CurlException::createFromCurlResource(\$ch);
    }
";
            }
        }

        $exceptionName = FileCreator::toExceptionName($moduleName);
        return "
    if (\$result === false) {
        throw {$exceptionName}::createFromPhpError();
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
            $paramAsString = '';
            if ($param->getType() !== 'mixed' && $param->getType() !== 'resource') {
                if ($param->isNullable()) {
                    $paramAsString .= '?';
                }
                $paramAsString .= $param->getType().' ';
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
