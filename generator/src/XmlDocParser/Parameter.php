<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use Safe\PhpStanFunctions\PhpStanFunction;
use Safe\PhpStanFunctions\PhpStanType;

class Parameter
{
    private readonly PhpStanType $type;

    public function __construct(
        private \SimpleXMLElement $parameter,
        ?PhpStanFunction $phpStanFunction,
        int $position
    ) {
        $type = PhpStanType::selectMostUsefulType(
            $phpStanFunction?->getParameter($this->getParameterName(), $position)?->getType(),
            new PhpStanType($this->parameter->type)
        );
        // If the docs say that the type defaults to null, then force it to
        // be nullable, even if the docs and phpstan both say it's not...
        if ($this->getDefaultValue() === "null"
            && !str_contains($type->getDocBlockType(), "null")
            && !str_contains($type->getDocBlockType(), "mixed")
        ) {
            $type = new PhpStanType($type->getDocBlockType() . "|null");
        }
        $this->type = $type;
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

    public function getParameterName(): string
    {
        return $this->parameter->parameter->__toString();
    }

    public function getParameterType(): string
    {
        return (new PhpStanType($this->parameter->type))->getDocBlockType();
    }

    public function isByReference(): bool
    {
        return ((string)$this->parameter->parameter['role']) === 'reference';
    }

    /**
     * Some parameters can be optional with no default value. In this case, the function is "overloaded" (which is not
     * possible in user-land but possible in core...)
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
        if ($initializer === 'null' || ($initializer !== 'array()' && str_contains($initializer, '('))) {
            return true;
        }
        return false;
    }

    public function isVariadic(): bool
    {
        return ((string)$this->parameter['rep']) === 'repeat';
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
        return property_exists($this->parameter, 'initializer') && $this->parameter->initializer !== null;
    }

    public function getDefaultValue(): ?string
    {
        if (!$this->hasDefaultValue()) {
            return null;
        }

        $initializer = $this->getInitializer();

        // Some default value have weird values. For instance, first parameter of "mb_internal_encoding" has default value "mb_internal_encoding()"
        if (str_contains($initializer, '(')) {
            return null;
        }

        if ($initializer === "NULL") {
            return "null";
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
