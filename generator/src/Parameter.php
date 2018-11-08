<?php
namespace Safe;

use Safe\PhpStanFunctions\PhpStanFunction;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;

class Parameter
{
    /**
     * @var \SimpleXMLElement
     */
    private $parameter;
    /**
     * @var PhpStanFunction|null
     */
    private $phpStanFunction;

    public function __construct(\SimpleXMLElement $parameter, ?PhpStanFunction $phpStanFunction)
    {
        $this->parameter = $parameter;
        $this->phpStanFunction = $phpStanFunction;
    }

    /**
     * Returns the type as declared in the doc.
     * @return string
     */
    public function getType(): string
    {
        $type = $this->parameter->type->__toString();
        return Type::toRootNamespace($type);
    }

    /**
     * Returns the type as declared in the doc.
     * @return string
     */
    public function getBestType(): string
    {
        // Get the type from PhpStan database first, then from the php doc.
        if ($this->phpStanFunction !== null) {
            $phpStanParameter = $this->phpStanFunction->getParameter($this->getParameter());
            if ($phpStanParameter) {
                return $phpStanParameter->getType();
            }
        }
        return $this->getType();
    }

    /*
     * @return string
     */
    public function getParameter(): string
    {
        if ($this->isVariadic()) {
            return 'params';
        }
        // The db2_bind_param method has parameters with a dash in it... yep... (patch submitted)
        return \str_replace('-', '_', $this->parameter->parameter->__toString());
    }

    public function isByReference(): bool
    {
        return ((string)$this->parameter->parameter['role']) === 'reference';
    }

    /**
     * Some parameters can be optional with no default value. In this case, the function is "overloaded" (which is not
     * possible in user-land but possible in core...)
     *
     * @return bool
     */
    public function isOptionalWithNoDefault(): bool
    {
        return ((string)$this->parameter['choice']) === 'opt' && !$this->hasDefaultValue();
    }

    public function isVariadic(): bool
    {
        return $this->parameter->parameter->__toString() === '...';
    }

    public function isNullable(): bool
    {
        if ($this->phpStanFunction !== null) {
            $phpStanParameter = $this->phpStanFunction->getParameter($this->getParameter());
            if ($phpStanParameter) {
                return $phpStanParameter->isNullable();
            }
        }
        return $this->hasDefaultValue() && $this->getDefaultValue() === 'null';
    }

    /*
     * @return string
     */
    public function getInitializer(): string
    {
        return \str_replace(['<constant>', '</constant>'], '', $this->getInnerXml($this->parameter->initializer));
    }

    public function hasDefaultValue(): bool
    {
        return isset($this->parameter->initializer);
    }

    public function getDefaultValue(): ?string
    {
        if (!$this->hasDefaultValue()) {
            return null;
        }

        $initializer = $this->getInitializer();

        // Some default value have weird values. For instance, first parameter of "mb_internal_encoding" has default value "mb_internal_encoding()"
        if (strpos($initializer, '(') !== false) {
            return null;
        }

        return $initializer;
    }

    private function getInnerXml(\SimpleXMLElement $SimpleXMLElement): string
    {
        $element_name = $SimpleXMLElement->getName();
        $inner_xml = $SimpleXMLElement->asXML();
        if ($inner_xml === false) {
            throw new \RuntimeException('Unable to serialize to XML');
        }
        $inner_xml = str_replace(['<'.$element_name.'>', '</'.$element_name.'>', '<'.$element_name.'/>'], '', $inner_xml);
        $inner_xml = trim($inner_xml);
        return $inner_xml;
    }
}
