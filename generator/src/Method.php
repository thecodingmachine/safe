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

    public function getFunctionType(): string
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

        return $type;
    }

    /**
     * @return Parameter[]
     */
    public function getFunctionParam(): array
    {
        if ($this->params === null) {
            if (!isset($this->functionObject->methodparam)) {
                return [];
            }
            $phpStanFunction = $this->getPhpStanData();
            $params = [];
            foreach ($this->functionObject->methodparam as $param) {
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
        foreach ($this->getFunctionParam() as $parameter) {
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
        return preg_replace('/'.$search.'/m', '', $string);
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
            return $phpStanFunction->getReturnType();
        } else {
            return $this->getFunctionType();
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
     * The function is overloaded if at least one parameter optional with no default value.
     *
     * @return bool
     */
    public function isOverloaded(): bool
    {
        foreach ($this->getFunctionParam() as $parameter) {
            if ($parameter->isOptionalWithNoDefault()) {
                return true;
            }
        }
        return false;
    }

    public function cloneAndRemoveAParameter(): Method
    {
        $new = clone $this;
        $params = $this->getFunctionParam();
        \array_pop($params);
        $new->params = $params;
        return $new;
    }
}
