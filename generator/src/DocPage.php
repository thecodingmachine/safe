<?php

namespace Safe;

class DocPage
{
    /*
     * @var string
     */
    private $path;

    /*
     * @return string
     * @parameter string
     */
    public function __construct(string $_path)
    {
        $this->path = $_path;
    }

    /*
     * Detect function which didn't return FALSE on error.
     *
     * @return bool
     */
    public function detectFalsyFunction(): bool
    {
        $file = file_get_contents($this->path);

        if (preg_match('/&false;\s+on\s+error/m', $file)) {
            return true;
        }
        if (preg_match('/&false;\s+on\s+failure/m', $file)) {
            return true;
        }
        if (preg_match('/&false;\s+if\s+an\s+error\s+occurred/m', $file)) {
            return true;
        }
        if (preg_match('/&return.success;/m', $file)) {
            return true;
        }
        if (preg_match('/&return.nullorfalse;/m', $file)) {
            return true;
        }
        if (preg_match('/&return.falseforfailure;/m', $file)) {
            return true;
        }
        if (preg_match('/&date.datetime.return.modifiedobjectorfalseforfailure;/m', $file)) {
            return true;
        }
        if (preg_match('/ or &false; \\(and generates an error/m', $file)) {
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
        if (!preg_match_all('/<\/?methodsynopsis[\s\S]*?>[\s\S]*?<\/methodsynopsis>/m', $file, $functions, PREG_SET_ORDER, 0)) {
            return [];
        }
        $functions = $this->arrayFlatten($functions);
        foreach ($functions as $function) {
            $cleaningFunction = \str_replace(['&false;', '&true;', '&null;'], ['false', 'true', 'null'], $function);
            $cleaningFunction = preg_replace('/&(.*);/m', '', $cleaningFunction);
            if (!\is_string($cleaningFunction)) {
                throw new \RuntimeException('Error occured in preg_replace');
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
     *
     * @return \SimpleXMLElement
     */
    public function loadAndResolveFile(): \SimpleXMLElement
    {
        $content = \file_get_contents($this->path);
        $strpos = \strpos($content, '?>')+2;
        if (!\file_exists(__DIR__.'/../doc/entities/generated.ent')) {
            self::buildEntities();
        }
        $path = \realpath(__DIR__.'/../doc/entities/generated.ent');


        $content = \substr($content, 0, $strpos)
            .'<!DOCTYPE refentry SYSTEM "'.$path.'">'
            .\substr($content, $strpos+1);

        echo 'Loading '.$this->path."\n";
        $elem = \simplexml_load_string($content, \SimpleXMLElement::class, LIBXML_DTDLOAD | LIBXML_NOENT);
        if ($elem === false) {
            throw new \RuntimeException('Invalid XML file for '.$this->path);
        }
        $elem->registerXPathNamespace('docbook', 'http://docbook.org/ns/docbook');

        return $elem;
    }

    /**
     * Returns the module name in Camelcase.
     *
     * @return string
     */
    public function getModule(): string
    {
        return $this->toCamelCase(\basename(\dirname($this->path, 2)));
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
        $result = array();

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->arrayFlatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public static function buildEntities(): void
    {
        $file1 = \file_get_contents(__DIR__.'/../doc/doc-en/en/language-defs.ent');
        $file2 = \file_get_contents(__DIR__.'/../doc/doc-en/en/language-snippets.ent');
        $file3 = \file_get_contents(__DIR__.'/../doc/doc-en/en/extensions.ent');
        $file4 = \file_get_contents(__DIR__.'/../doc/doc-en/doc-base/entities/global.ent');

        $completeFile = $file1 . self::extractXmlHeader($file2) . self::extractXmlHeader($file3) . $file4;

        \file_put_contents(__DIR__.'/../doc/entities/generated.ent', $completeFile);
    }

    private static function extractXmlHeader(string $content): string
    {
        $strpos = strpos($content, '?>')+2;
        return substr($content, $strpos);
    }
}
