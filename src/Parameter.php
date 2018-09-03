<?php
namespace Safe;

class Parameter
{
    /**
     * @var \SimpleXMLElement
     */
    private $parameter;

    public function __construct(\SimpleXMLElement $parameter)
    {
        $this->parameter = $parameter;
    }

    /*
     * @return string
     */
    public function getType(): string
    {
        return $this->parameter->type->__toString();
    }

    /*
     * @return string
     */
    public function getParameter(): string {
        return $this->parameter->parameter->__toString();
    }

    /*
     * @return string
     */
    public function getInitializer(): string {
        return $this->parameter->initializer->__toString();
    }
}