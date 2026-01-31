<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use Safe\PhpStanFunctions\PhpStanFunction;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;
use Safe\PhpStanFunctions\PhpStanType;
use Safe\Generator\FileCreator;

class Method
{
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
        private ErrorType $errorType
    ) {
        $this->phpstanSignature = $phpStanFunctionMapReader->getFunction($this->getFunctionName());
        $this->returnType = PhpStanType::selectMostUsefulType(
            $this->phpstanSignature?->getReturnType(),
            new PhpStanType($this->functionObject->type),
            $errorType
        );
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
        $data .= "Error type: " . $this->errorType->name . "\n";
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

    public function getErrorType(): ErrorType
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
                $notes = $this->stripReturnFalseText($this->getStringForXPath("(//docbook:refsect1[@role='parameters']//docbook:varlistentry)[$i]//docbook:note/"));
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
        $str = '';
        foreach ($this->getParams() as $parameter) {
            $str .= '@param '.$parameter->getDocBlockType().' $'.$parameter->getParameterName()."\n";
        }

        $str .= $this->getReturnDocBlock();

        if ($this->getErrorType() !== ErrorType::UNKNOWN) {
            $str .= '@throws '.FileCreator::toExceptionName($this->getModuleName()). "\n";
        }

        return $str;
    }

    public function getReturnDocBlock(): string
    {
        $bestReturnType = $this->getDocBlockReturnType();
        if ($bestReturnType !== 'void') {
            return '@return '.$bestReturnType."\n";
        }
        return '';
    }

    private function stripReturnFalseText(string $string): string
    {
        $string = \strip_tags($string);
        switch ($this->errorType) {
            case ErrorType::UNKNOWN:
                break;

            case ErrorType::NULLSY:
                $string = $this->removeString($string, ', or NULL if an error occurs');
                $string = $this->removeString($string, ' and NULL on failure');
                $string = $this->removeString($string, ' or NULL on failure');
                break;

            case ErrorType::FALSY:
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
                $string = $this->removeString($string, 'On failure to change the value, FALSE is returned.');
                $string = $this->removeString($string, 'or FALSE for failure');
                $string = $this->removeString($string, 'FALSE for failure');
                break;

            case ErrorType::EMPTY:
                $string = $this->removeString($string, ' or an empty string on error');
                break;

            case ErrorType::MINUS_ONE:
                $string = $this->removeString($string, ' or -1 on error');
                $string = $this->removeString($string, 'Returns -1 on error.');
                $string = $this->removeString($string, 'In case of an error then -1 is returned.');
                $string = $this->removeString($string, '-1 indicates that the query returned an error');
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
        // Some doc blocks put their text inside para, some simpara
        $paragraphs = $this->rootEntity->xpath($xpath . "/docbook:para");
        if ($paragraphs === []) {
            $paragraphs = $this->rootEntity->xpath($xpath . "/docbook:simpara");
        }
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
