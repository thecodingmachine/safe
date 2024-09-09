<?php

declare(strict_types=1);

namespace Safe;

use Safe\PhpStanFunctions\PhpStanFunction;
use Safe\PhpStanFunctions\PhpStanParameter;
use Safe\PhpStanFunctions\PhpStanType;

class Parameter
{
    private readonly \Safe\PhpStanFunctions\PhpStanType $phpStanType;

    public function __construct(private \SimpleXMLElement $parameter, ?PhpStanFunction $phpStanFunction, int $position)
    {
        $phpStanParam = $phpStanFunction instanceof \Safe\PhpStanFunctions\PhpStanFunction ? $phpStanFunction->getParameter($this->getParameterName(), $position) : null;
        $this->phpStanType = $phpStanParam instanceof \Safe\PhpStanFunctions\PhpStanParameter ? $phpStanParam->getType() : new PhpStanType($this->parameter->type->__toString());  //todo: is this if useful?
    }

    /**
     * Tries to identify the typehint from the doc-block parameter
     */
    public function getSignatureType(): string
    {
        return $this->phpStanType->getSignatureType();
    }

    /**
     * Try to fetch the complete type used in the doc_block, first from phpstan, then from the regular documentation
     */
    public function getDocBlockType(): string
    {
        return $this->phpStanType->getDocBlockType();
    }

    public function getParameterName(): string
    {
        return $this->parameter->parameter->__toString();
    }

    public function getParameterType(): string
    {
        return $this->parameter->type->__toString();
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
        return $initializer === 'null' || ($initializer !== 'array()' && str_contains($initializer, '('));
    }

    public function isVariadic(): bool
    {
        return ((string)$this->parameter['rep']) === 'repeat';
    }

    public function isNullable(): bool
    {
        return $this->phpStanType->isNullable()
            || $this->getDefaultValue() === "null"
            || $this->getDefaultValue() === "NULL";
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

        return $initializer;
    }

    private function getInnerXml(\SimpleXMLElement $SimpleXMLElement): string
    {
        $element_name = $SimpleXMLElement->getName();
        $inner_xml = $SimpleXMLElement->asXML();
        if ($inner_xml === false) {
            throw new \RuntimeException('Unable to serialize to XML');
        }

        $inner_xml = str_replace(['<' . $element_name . '>', '</' . $element_name . '>', '<' . $element_name . '/>'], '', $inner_xml);
        return trim($inner_xml);
    }
}
