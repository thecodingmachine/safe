<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use Safe\Generator\FileCreator;

use function explode;
use function strpos;

class DocPage
{
    public function __construct(private readonly string $path)
    {
    }

    public static function findDocDir(): string
    {
        return __DIR__ . '/../../doc';
    }

    public static function findReferenceDir(): string
    {
        return DocPage::findDocDir() . '/doc-en/en/reference';
    }

    // Ignore function if it was removed before PHP 7.1
    private function getIsDeprecated(string $file): bool
    {
        if (preg_match('/&warn\.deprecated\.function-(\d+-\d+-\d+)\.removed-(\d+-\d+-\d+)/', $file, $matches)) {
            $removedVersion = $matches[2];
            [$major, $minor] = explode('-', $removedVersion);
            if ($major < 8 || ($major == 8 && $minor == 0)) {
                return true;
            }
        }

        if (preg_match('/&warn\.removed\.function-(\d+-\d+-\d+)/', $file, $matches)) {
            $removedVersion = $matches[1];
            [$major, $minor] = explode('-', $removedVersion);
            if ($major < 8 || ($major == 8 && $minor == 0)) {
                return true;
            }
        }

        return false;
    }

    public function getErrorType(): int
    {
        if ($this->detectFalsyFunction()) {
            return Method::FALSY_TYPE;
        }
        if ($this->detectNullsyFunction()) {
            return Method::NULLSY_TYPE;
        }
        if ($this->detectEmptyFunction()) {
            return Method::EMPTY_TYPE;
        }
        return Method::UNKNOWN_TYPE;
    }

    /*
     * Detect function which return FALSE on error.
     */
    public function detectFalsyFunction(): bool
    {
        $returnValuesSection = $this->getReturnValues();
        $func = require FileCreator::getSafeRootDir() . '/generator/config/detectFalsyFunction.php';
        return $func($returnValuesSection);
    }

    /*
     * Detect function which return NULL on error.
     */
    public function detectNullsyFunction(): bool
    {
        $returnValuesSection = $this->getReturnValues();
        $func = require FileCreator::getSafeRootDir() . '/generator/config/detectNullsyFunction.php';
        return $func($returnValuesSection);
    }

    /*
     * Detect functions which return an empty string on error.
     */
    public function detectEmptyFunction(): bool
    {
        $returnValuesSection = $this->getReturnValues();
        $func = require FileCreator::getSafeRootDir() . '/generator/config/detectEmptyFunction.php';
        return $func($returnValuesSection);
    }

    private function getReturnValues(): string
    {
        $file = file_get_contents($this->path);
        if ($file === false) {
            throw new \RuntimeException('An error occurred while reading '.$this->path);
        }
        if ($this->getIsDeprecated($file)) {
            return "";
        }
        // Only evaluate the text inside the `<refsect1 role="returnvalues">...</refsect1>` section of the doc page.
        // This minimizes 'false positives', where text such as "returns false when ..." could be matched outside
        // the function's dedicated Return Values section.
        return $this->extractSection('returnvalues', $file);
    }

    /**
     * @return \SimpleXMLElement[]
     */
    public function getMethodSynopsis(): array
    {
        /** @var string[] $cleanedFunctions */
        $cleanedFunctions = [];

        $file = \file_get_contents($this->path);
        if ($file === false) {
            throw new \RuntimeException('An error occurred while reading '.$this->path);
        }

        // Only evaluate the synopsis inside the `<refsect1 role="description">...</refsect1>` section of the doc page.
        // Other synopses might occur in the `<refsect1 role="parameters">...</refsect1>` section, but these describe
        // handlers, callbacks, and other callable-type arguments, not the function itself.
        $fileDescriptionSection = $this->extractSection('description', $file);

        if (!preg_match_all('/<\/?methodsynopsis[\s\S]*?>[\s\S]*?<\/methodsynopsis>/m', $fileDescriptionSection, $functions, PREG_SET_ORDER, 0)) {
            return [];
        }

        $functions = $this->arrayFlatten($functions);
        foreach ($functions as $function) {
            $cleaningFunction = \str_replace(['&false;', '&true;', '&null;'], ['false', 'true', 'null'], $function);
            $cleaningFunction = preg_replace('/&(.*);/m', '', $cleaningFunction);
            if (!\is_string($cleaningFunction)) {
                throw new \RuntimeException('Error occurred in preg_replace');
            }
            $cleanedFunctions[] = $cleaningFunction;
        }
        $functionObjects = [];
        foreach ($cleanedFunctions as $cleanedFunction) {
            $functionObject = \simplexml_load_string($cleanedFunction);
            if ($functionObject) {
                $functionObjects[] = $functionObject;
            }
        }
        return $functionObjects;
    }

    /**
     * Loads the XML file, resolving all DTD declared entities.
     */
    public function loadAndResolveFile(): \SimpleXMLElement
    {
        $content = \file_get_contents($this->path);
        if ($content === false) {
            throw new \RuntimeException('An error occurred while reading '.$this->path);
        }
        $strpos = \strpos($content, '?>')+2;
        if (!\file_exists(DocPage::findDocDir() . '/entities/generated.ent')) {
            self::buildEntities();
        }
        $path = \realpath(DocPage::findDocDir() . '/entities/generated.ent');


        $content = \substr($content, 0, $strpos)
            .'<!DOCTYPE refentry SYSTEM "'.$path.'">'
            .\substr($content, $strpos+1);

        $elem = \simplexml_load_string($content, \SimpleXMLElement::class, LIBXML_DTDLOAD | LIBXML_NOENT);
        if ($elem === false) {
            throw new \RuntimeException('Invalid XML file for '.$this->path);
        }
        $elem->registerXPathNamespace('docbook', 'http://docbook.org/ns/docbook');

        return $elem;
    }

    /**
     * Returns the module name in Camelcase.
     */
    public function getModule(): string
    {
        return $this->toCamelCase(\basename(\dirname($this->path, 2)));
    }

    private function extractSection(string $sectionName, string $file): string
    {
        $regexpBase = '/<refsect1\s+role="%s">[\s\S]*?<\/refsect1>/m';
        $regexpString = sprintf($regexpBase, preg_quote($sectionName, '/'));
        preg_match_all($regexpString, $file, $output);
        $output = implode('', $this->arrayFlatten((array) $output));
        return $output;
    }

    private function toCamelCase(string $str): string
    {
        $tokens = preg_split("/[_ ]+/", $str);
        if ($tokens === false) {
            throw new \RuntimeException('Unexpected preg_split error'); // @codeCoverageIgnore
        }

        $str = '';
        foreach ($tokens as $token) {
            $str .= ucfirst($token);
        }

        return $str;
    }

    /**
     * @param mixed[] $array multidimensional string array
     * @return string[]
     */
    private function arrayFlatten(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->arrayFlatten($value));
            } else {
                $result[$key] = strval($value);
            }
        }
        return $result;
    }

    public static function buildEntities(): void
    {
        $file1 = \file_get_contents(DocPage::findDocDir() . '/doc-en/en/language-defs.ent') ?: '';
        $file2 = \file_get_contents(DocPage::findDocDir() . '/doc-en/en/language-snippets.ent') ?: '';
        $file3 = \file_get_contents(DocPage::findDocDir() . '/doc-en/en/extensions.ent') ?: '';
        $file4 = \file_get_contents(DocPage::findDocDir() . '/doc-en/doc-base/entities/global.ent') ?: '';

        $completeFile = $file1 . self::extractXmlHeader($file2) . self::extractXmlHeader($file3) . $file4;

        \file_put_contents(DocPage::findDocDir() . '/entities/generated.ent', $completeFile);
    }

    private static function extractXmlHeader(string $content): string
    {
        $strpos = strpos($content, '?>')+2;
        return substr($content, $strpos);
    }
}
