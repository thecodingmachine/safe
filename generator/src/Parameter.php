<?php
namespace Safe;

use Safe\PhpStanFunctions\PhpStanFunction;
use Safe\PhpStanFunctions\PhpStanParameter;
use Safe\PhpStanFunctions\PhpStanType;

class Parameter
{
    /**
     * @var \SimpleXMLElement
     */
    private $parameter;
    /**
     * @var PhpStanType
     */
    private $type;

    public function __construct(\SimpleXMLElement $parameter, ?PhpStanFunction $phpStanFunction, int $position)
    {
        $this->parameter = $parameter;
        $phpStanParam = $phpStanFunction ? $phpStanFunction->getParameter($this->getParameter(), $position) : null;
        
        $this->type = $phpStanParam ? $phpStanParam->getType() : new PhpStanType($this->parameter->type->__toString()); //todo: is this if useful?
    }

    /**
     * Tries to identify the typehint from the doc-block parameter
     */
    public function getSignatureType(): string
    {
        return $this->type->getSignatureType();
    }

    /**
     * Try to fetch the complete type used in the doc_block, first from phpstan, then from the regular documentation
     */
    public function getDocBlockType(): string
    {
        return $this->type->getDocBlockType();
    }

    public function getParameter(): string
    {
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
        if (((string)$this->parameter['choice']) !== 'opt' && !$this->isVariadic()) {
            return false;
        }
        if (!$this->hasDefaultValue()) {
            return true;
        }

        $initializer = $this->getInitializer();
        // Some default value have weird values. For instance, first parameter of "mb_internal_encoding" has default value "mb_internal_encoding()"
        if ($initializer === 'null' || ($initializer !== 'array()' && strpos($initializer, '(') !== false)) {
            return true;
        }
        return false;
    }

    public function isVariadic(): bool
    {
        return ((string)$this->parameter['rep']) === 'repeat';
    }

    public function isNullable(): bool
    {
        return $this->type->isNullable();
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
