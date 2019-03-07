<?php

namespace Safe;

use Safe\PhpStanFunctions\PhpStanFunction;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;

class Method
{
    /**
     * @var \SimpleXMLElement
     */
    private $functionObject;
    /**
     * @var \SimpleXMLElement
     */
    private $rootEntity;
    /**
     * @var string
     */
    private $moduleName;
    /**
     * @var Parameter[]|null
     */
    private $params = null;
    /**
     * @var PhpStanFunctionMapReader
     */
    private $phpStanFunctionMapReader;

    public function __construct(\SimpleXMLElement $_functionObject, \SimpleXMLElement $rootEntity, string $moduleName, PhpStanFunctionMapReader $phpStanFunctionMapReader)
    {
        $this->functionObject = $_functionObject;
        $this->rootEntity = $rootEntity;
        $this->moduleName = $moduleName;
        $this->phpStanFunctionMapReader = $phpStanFunctionMapReader;
    }

    public function getFunctionName(): string
    {
        return $this->functionObject->methodname->__toString();
    }

    public function getReturnType(): string
    {
        // If the function returns a boolean, since false is for error, true is for success.
        // Let's replace this with a "void".
        $type = $this->functionObject->type->__toString();
        if ($type === 'bool') {
            return 'void';
        }
        // Some types are completely weird. For instance, oci_new_collection returns a "OCI-Collection" (with a dash, yup)
        if (\strpos($type, '-') !== false) {
            return 'mixed';
        }

        return Type::toRootNamespace($type);
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
            $phpStanFunction = $this->getPhpStanData();
            $params = [];
            $i=1;
            foreach ($this->functionObject->methodparam as $param) {
                $notes = $this->stripReturnFalseText($this->getStringForXPath("(//docbook:refsect1[@role='parameters']//docbook:varlistentry)[$i]//docbook:note//docbook:para"));
                $i++;

                if (preg_match('/This parameter has been removed in PHP (\d+\.\d+\.\d+)/', $notes, $matches)) {
                    $removedVersion = $matches[1];
                    [$major, $minor] = explode('.', $removedVersion);
                    if ($major < 7 || ($major == 7 && $minor == 0)) {
                        // Ignore parameter if it was removed before PHP 7.1
                        continue;
                    }
                }

                $params[] = new Parameter($param, $phpStanFunction);
            }
            $this->params = $params;
        }
        return $this->params;
    }

    public function getPhpDoc(): string
    {
        $str = "/**\n".
            implode("\n", array_map(function (string $line) {
                return ' * '.ltrim($line);
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
            $str .= '@param '.$parameter->getBestType().' $'.$parameter->getParameter().' ';
            $str .= $this->getStringForXPath("(//docbook:refsect1[@role='parameters']//docbook:varlistentry)[$i]//docbook:para")."\n";
            $i++;
        }

        $bestReturnType = $this->getBestReturnType();
        if ($bestReturnType !== 'void') {
            $str .= '@return '.$bestReturnType. ' ' .$this->getReturnDoc()."\n";
        }

        $str .= '@throws '.FileCreator::toExceptionName($this->getModuleName()). "\n";

        return $str;
    }

    private function getReturnDoc(): string
    {
        $returnDoc = $this->getStringForXPath("//docbook:refsect1[@role='returnvalues']/docbook:para");
        return $this->stripReturnFalseText($returnDoc);
    }

    private function stripReturnFalseText(string $string): string
    {
        $string = \strip_tags($string);
        $string = $this->removeString($string, 'or FALSE on failure');
        $string = $this->removeString($string, 'may return FALSE');
        $string = $this->removeString($string, 'and FALSE on failure');
        $string = $this->removeString($string, 'on success, or FALSE otherwise');
        $string = $this->removeString($string, 'or FALSE on error');
        $string = $this->removeString($string, 'or FALSE if an error occurred');
        $string = $this->removeString($string, 'the function will return TRUE, or FALSE otherwise');
        return $string;
    }

    /**
     * Removes a string, even if the string is split on multiple lines.
     * @param string $string
     * @param string $search
     * @return string
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
        if ($paragraphs === false) {
            throw new \RuntimeException('Error while performing Xpath request.');
        }
        $str = '';
        foreach ($paragraphs as $paragraph) {
            $str .= $this->getInnerXml($paragraph)."\n\n";
        }
        return trim($str);
    }

    private function getBestReturnType(): ?string
    {
        $phpStanFunction = $this->getPhpStanData();
        // Get the type from PhpStan database first, then from the php doc.
        if ($phpStanFunction !== null) {
            return Type::toRootNamespace($phpStanFunction->getReturnType());
        } else {
            return Type::toRootNamespace($this->getReturnType());
        }
    }

    private function getPhpStanData(): ?PhpStanFunction
    {
        $functionName = $this->getFunctionName();
        if (!$this->phpStanFunctionMapReader->hasFunction($functionName)) {
            return null;
        }
        return $this->phpStanFunctionMapReader->getFunction($functionName);
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
     *
     * @return bool
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
