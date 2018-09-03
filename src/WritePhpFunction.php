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
    public function getPhpPrototypeFunction(): string {
        if ($this->method->getFunctionName() && strpos($this->method->getFunctionType(), 'void') === FALSE)
            return 'function '.$this->method->getFunctionName().'('.$this->displayParamsWithType().')'.': '.$this->method->getFunctionType().'{}';
        else
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
    private function writePhpFunction(): string {
        if (strpos($this->method->getFunctionType(), 'void') !== FALSE) {
            return '';
        }
        $phpFunction = "function {$this->method->getFunctionName()}({$this->displayParamsWithType()}): {$this->method->getFunctionType()}
{
    \$all_params = func_get_args();
    if ((\${$this->method->getFunctionType()} = \\{$this->method->getFunctionName()}(...\$all_params)) === FALSE) {
         \$error = error_get_last();
         throw new FileWritingException(\$error['message']);
    }
    return \${$this->method->getFunctionType()};
}

";
        return $phpFunction;
    }

    /*
     * @return string
     */
    private function displayParamsWithType(): string {
        $params = $this->method->getFunctionParam();
        $paramsAsString = [];
        $optDectected = FALSE;

        foreach($params as $param) {
            $paramAsString = '';
            if ($param->getType() !== "mixed" && $param->getType() !== "resource") {
                $paramAsString = $param->getType().' ';
            }

            $paramName = $param->getParameter();
            if ($paramName === '...') {
                $paramAsString .= ' ...$params';
            } else {
                $paramAsString .= '$'.$paramName;
            }


            if ($param->getInitializer() != null) {
                $paramAsString .= ' = '.$param->getInitializer();
                $optDectected = TRUE;

            } else if ($optDectected) {
                $paramAsString .= ' = null';
            }
            $paramsAsString[] = $paramAsString;
        }

        return implode(', ', $paramsAsString);
    }
}
