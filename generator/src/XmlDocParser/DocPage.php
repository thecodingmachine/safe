<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

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

    /*
     * Detect function which return FALSE on error.
     */
    public function detectFalsyFunction(): bool
    {
        $file = file_get_contents($this->path);
        if ($file === false) {
            throw new \RuntimeException('An error occurred while reading '.$this->path);
        }

        if ($this->getIsDeprecated($file)) {
            return false;
        }

        // Only evaluate the text inside the `<refsect1 role="returnvalues">...</refsect1>` section of the doc page.
        // This minimizes 'false positives', where text such as "returns false when ..." could be matched outside
        // the function's dedicated Return Values section.
        $returnValuesSection = $this->extractSection('returnvalues', $file);

        if (preg_match('/[Tt]he function returns &false;/m', $returnValuesSection)) {
            return true;
        }

        if (preg_match('/&false;\s+on\s+error/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&false;\s+on\s+failure/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&false;\s+otherwise/m', $returnValuesSection) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/may\s+return\s+&false;/m', $returnValuesSection) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&false;\s+if\s+an\s+error\s+occurred/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&return.success;/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&return.nullorfalse;/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&return.falseforfailure;/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&date.datetime.return.modifiedobjectorfalseforfailure;/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/ or &false; \\(and generates an error/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&false;\s+if\s+the\s+number\s+of\s+elements\s+for\s+each\s+array\s+isn\'t\s+equal/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/If\s+the\s+call\s+fails,\s+it\s+will\s+return\s+&false;/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/Upon\s+failure,?\s+\<function\>[\w_]{1,15}?\<\/function\>\s+returns\s+&false;/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/On\s+failure,\s+&false;\s+is\s+returned/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/on\s+success,\s+otherwise\s+&false;\s+is\s+returned/m', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/Returns.*on success[.\s\S]+Returns &false;\s+if/m', $returnValuesSection)) {
            return true;
        }

        if (preg_match('/&gd\.return\.identifier;/m', $returnValuesSection)) {
            return true;
        }
        //used for date
        if (preg_match('/If a non-numeric value is used for
   \<parameter\>timestamp\<\/parameter\>, &false; is returned/m', $returnValuesSection)) {
            return true;
        }

        //used to detect imagecreatefromstring
        if (preg_match('/&false; is returned if\s+the image type is unsupported, the data is not in a recognised format,\s+or the image is corrupt and cannot be loaded/m', $returnValuesSection)) {
            return true;
        }

        //used to detect class_implements
        if (preg_match("/&false; when the given class doesn't exist/m", $returnValuesSection)) {
            return true;
        }

        //used to detect get_headers and ldap_search
        if (preg_match("/&false; on failure/m", $returnValuesSection)) {
            return true;
        }

        //used to detect inet_pton
        if (preg_match("/&false; if a syntactically invalid/m", $returnValuesSection)) {
            return true;
        }

        return false;
    }

    /*
     * Detect function which return NULL on error.
     */
    public function detectNullsyFunction(): bool
    {
        $file = \file_get_contents($this->path);
        if ($file === false) {
            throw new \RuntimeException('An error occurred while reading '.$this->path);
        }

        if ($this->getIsDeprecated($file)) {
            return false;
        }

        // Only evaluate the text inside the `<refsect1 role="returnvalues">...</refsect1>` section of the doc page.
        // This minimizes 'false positives', where text such as "returns false when ..." could be matched outside
        // the function's dedicated Return Values section.
        $returnValuesSection = $this->extractSection('returnvalues', $file);

        if (preg_match('/&null;\s+on\s+failure/', $returnValuesSection)) {
            return true;
        }
        if (preg_match('/&null;\s+if\s+an\s+error\s+occurs/', $returnValuesSection)) {
            return true;
        }

        return false;
    }

    /*
     * Detect function which return an empty string on error.
     */
    public function detectEmptyFunction(): bool
    {
        $file = file_get_contents($this->path);
        if ($file === false) {
            throw new \RuntimeException('An error occurred while reading '.$this->path);
        }
        if ($this->getIsDeprecated($file)) {
            return false;
        }

        $returnValuesSection = $this->extractSection('returnvalues', $file);

        if (preg_match('/an\s+empty\s+string\s+on\s+error/', $returnValuesSection)) {
            return true;
        }

        return false;
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
