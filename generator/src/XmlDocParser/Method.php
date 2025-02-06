<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use Safe\PhpStanFunctions\PhpStanFunction;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;
use Safe\PhpStanFunctions\PhpStanType;
use Safe\Generator\FileCreator;

class Method
{
    const FALSY_TYPE = 1;
    const NULLSY_TYPE = 2;
    const EMPTY_TYPE = 3;
    /**
     * @var Parameter[]|null
     */
    private ?array $params = null;
    /**
     * The function prototype from the phpstan internal documentation (functionMap.php)
     */
    private ?PhpStanFunction $phpstanSignature;
    private PhpStanType $returnType;

    public function __construct(
        private \SimpleXMLElement $functionObject,
        private \SimpleXMLElement $rootEntity,
        private string $moduleName,
        PhpStanFunctionMapReader $phpStanFunctionMapReader,
        private int $errorType
    ) {
        $functionName = $this->getFunctionName();
        $this->phpstanSignature = $phpStanFunctionMapReader->hasFunction($functionName) ? $phpStanFunctionMapReader->getFunction($functionName) : null;

        // mostly we trust phpstan, but if phpstan says it's a "resource",
        // and the PHP docs have a more specific type hint, then we prefer
        // to use the PHP docs
        $phpStanType = $this->phpstanSignature ? $this->phpstanSignature->getReturnType() : null;
        $phpDocType = new PhpStanType($this->functionObject->type);
        if ($phpStanType && $phpStanType->getDocBlockType($errorType) === "resource" && $phpDocType->getDocBlockType($errorType) !== "") {
            $phpStanType = null;
        }
        $this->returnType = $phpStanType ?? $phpDocType;
    }

    public function __toString(): string
    {
        $data = $this->getFunctionName() . "\n";
        $data .= "\n";
        $data .= "Parameters:\n";
        $n = 0;
        foreach ($this->getParams() as $param) {
            $phpStanParam = $this->phpstanSignature ?
                $this->phpstanSignature->getParameter($param->getParameterName(), $n++) :
                null;

            $phpStanType = $phpStanParam ? $phpStanParam->getType() : null;

            $data .= "  " . $param->getParameterName() . "\n";
            $data .= "    PHPStan: " . ($phpStanType ? $phpStanType->getDocBlockType() : "(unknown)") . "\n";
            $data .= "    PHPDoc:  " . $param->getParameterType() . "\n";
            $data .= "    Safe:    " . $param->getDocBlockType() . "\n";
        }
        $data .= "\n";
        $data .= "Error type: " . [1=>"false", 2=>"null", 3=>"empty"][$this->errorType] . "\n";
        $data .= "\n";
        $data .= "Return type:\n";
        $phpStanType = $this->phpstanSignature ? $this->phpstanSignature->getReturnType() : null;
        $phpDocType = new PhpStanType($this->functionObject->type);
        $data .= "  PHPStan: " . ($phpStanType ? $phpStanType->getDocBlockType() : "(unknown)") . "\n";
        $data .= "  PHPDoc:  " . $phpDocType->getDocBlockType() . "\n";
        $data .= "  Safe:    " . $this->returnType->getDocBlockType($this->errorType) . "\n";
        return $data;
    }

    public function getFunctionName(): string
    {
        return $this->functionObject->methodname->__toString();
    }

    public function getErrorType(): int
    {
        return $this->errorType;
    }

    public function getSignatureReturnType(): string
    {
        return $this->returnType->getSignatureType($this->errorType);
    }

    /**
     * @return Parameter[]
     */
    public function getParams(): array
    {
        if ($this->params === null) {
            if (!isset($this->functionObject->methodparam)) {
                return [];
            }
            $phpStanFunction = $this->phpstanSignature;
            $params = [];
            $i=1;
            foreach ($this->functionObject->methodparam as $param) {
                $notes = $this->stripReturnFalseText($this->getStringForXPath("(//docbook:refsect1[@role='parameters']//docbook:varlistentry)[$i]//docbook:note//docbook:para"));
                $i++;

                if (preg_match('/This parameter has been removed in PHP (\d+\.\d+\.\d+)/', $notes, $matches)) {
                    $removedVersion = $matches[1];
                    [$major, $minor] = explode('.', $removedVersion);
                    if ($major < 8 || ($major == 8 && $minor == 0)) {
                        // Ignore parameter if it was removed before PHP 8.1
                        continue;
                    }
                }

                $params[] = new Parameter($param, $phpStanFunction, $i-2);
            }
            $this->params = $params;
        }
        return $this->params;
    }

    public function getPhpDoc(): string
    {
        $str = "\n/**\n".
            implode("\n", array_map(function (string $line) {
                return rtrim(' * '.ltrim($line));
            }, \explode("\n", \strip_tags($this->getDocBlock()))))
            ."\n */\n";

        return $str;
    }

    private function getDocBlock(): string
    {
        $str = $this->stripReturnFalseText($this->getStringForXPath("//docbook:refsect1[@role='description']/docbook:para"));
        $str .= "\n\n";

        $i=1;
        foreach ($this->getParams() as $parameter) {
            $str .= '@param '.$parameter->getDocBlockType().' $'.$parameter->getParameterName().' ';
            $str .= $this->getStringForXPath("(//docbook:refsect1[@role='parameters']//docbook:varlistentry)[$i]//docbook:para")."\n";
            $i++;
        }

        $str .= $this->getReturnDocBlock();

        $str .= '@throws '.FileCreator::toExceptionName($this->getModuleName()). "\n";

        return $str;
    }

    public function getReturnDocBlock(): string
    {
        $returnDoc = $this->getStringForXPath("//docbook:refsect1[@role='returnvalues']/docbook:para");
        $returnDoc = $this->stripReturnFalseText($returnDoc);

        $bestReturnType = $this->getDocBlockReturnType();
        if ($bestReturnType !== 'void') {
            return '@return '.$bestReturnType. ' ' .$returnDoc."\n";
        }
        return '';
    }

    private function stripReturnFalseText(string $string): string
    {
        $string = \strip_tags($string);
        switch ($this->errorType) {
            case self::NULLSY_TYPE:
                $string = $this->removeString($string, ', or NULL if an error occurs');
                $string = $this->removeString($string, ' and NULL on failure');
                $string = $this->removeString($string, ' or NULL on failure');
                break;

            case self::FALSY_TYPE:
                $string = $this->removeString($string, 'or FALSE on failure');
                $string = $this->removeString($string, ', FALSE on failure');
                $string = $this->removeString($string, ', FALSE on errors');
                $string = $this->removeString($string, '. Returns FALSE on error');
                $string = $this->removeString($string, 'may return FALSE');
                $string = $this->removeString($string, 'and FALSE on failure');
                $string = $this->removeString($string, 'on success, or FALSE otherwise');
                $string = $this->removeString($string, 'or FALSE on error');
                $string = $this->removeString($string, 'or FALSE if an error occurred');
                $string = $this->removeString($string, ' Returns FALSE otherwise.');
                $string = $this->removeString($string, ', FALSE otherwise');
                $string = $this->removeString($string, ' and FALSE if an error occurred');
                $string = $this->removeString($string, 'the function will return TRUE, or FALSE otherwise');
                $string = $this->removeString($string, ', FALSE if the pipe cannot be established');
                break;

            case self::EMPTY_TYPE:
                $string = $this->removeString($string, ' or an empty string on error');
                break;

            default:
                throw new \RuntimeException('Incorrect error type.');
        }

        return $string;
    }

    /**
     * Removes a string, even if the string is split on multiple lines.
     */
    private function removeString(string $string, string $search): string
    {
        $search = str_replace(' ', '\s+', $search);
        $result = preg_replace('/[\s\,]*'.$search.'/m', '', $string);
        if ($result === null) {
            throw new \RuntimeException('An error occurred while calling preg_replace');
        }
        return $result;
    }

    private function getStringForXPath(string $xpath): string
    {
        $paragraphs = $this->rootEntity->xpath($xpath);
        if ($paragraphs === false || $paragraphs === null) {
            throw new \RuntimeException('Error while performing Xpath request.');
        }
        $str = '';
        foreach ($paragraphs as $paragraph) {
            $str .= $this->getInnerXml($paragraph)."\n\n";
        }
        return trim($str);
    }

    private function getDocBlockReturnType(): string
    {
        return $this->returnType->getDocBlockType($this->errorType);
    }

    private function getInnerXml(\SimpleXMLElement $SimpleXMLElement): string
    {
        $element_name = $SimpleXMLElement->getName();
        $inner_xml = $SimpleXMLElement->asXML();
        if ($inner_xml === false) {
            throw new \RuntimeException('Unable to serialize to XML');
        }
        $inner_xml = str_replace(['<'.$element_name.'>', '</'.$element_name.'>'], '', $inner_xml);
        $inner_xml = trim($inner_xml);
        return $inner_xml;
    }

    public function getModuleName(): string
    {
        return $this->moduleName;
    }

    /**
     * The function is overloaded if at least one parameter is optional with no default value and this parameter is not by reference.
     */
    public function isOverloaded(): bool
    {
        foreach ($this->getParams() as $parameter) {
            if ($parameter->isOptionalWithNoDefault() && !$parameter->isByReference()) {
                return true;
            }
        }
        return false;
    }

    public function cloneAndRemoveAParameter(): Method
    {
        $new = clone $this;
        $params = $this->getParams();
        \array_pop($params);
        $new->params = $params;
        return $new;
    }
}
