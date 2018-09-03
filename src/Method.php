<?php

namespace Safe;

class Method
{
    /**
     * @var \SimpleXMLElement
     */
    private $functionObject;

    /*
     * @parameter \SimpleXMLElement $_functionObject
     */
    public function __construct(\SimpleXMLElement $_functionObject) {
        $this->functionObject = $_functionObject;
    }

    /*
     * @return string
     */
    public function getFunctionName(): string {
        return $this->functionObject->methodname->__toString();
    }

    /*
    * @return string
    */
    public function  getFunctionType(): string {
        return $this->functionObject->type->__toString();
    }

    /**
     * @return Parameter[]
     */
    public function getFunctionParam(): array {
        if (!isset($this->functionObject->methodparam)) {
            return [];
        }
        $params = [];
        foreach ($this->functionObject->methodparam as $param) {
            $params[] = new Parameter($param);
        }
        return $params;
    }
}

