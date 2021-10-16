<?php

namespace Safe;

use function explode;
use function strpos;

class DocPage
{
    /**
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

    // Ignore function if it was removed before PHP 7.1
    private function getIsDeprecated(string $file): bool
    {
        if (preg_match('/&warn\.deprecated\.function-(\d+-\d+-\d+)\.removed-(\d+-\d+-\d+)/', $file, $matches)) {
            $removedVersion = $matches[2];
            [$major, $minor] = explode('-', $removedVersion);
            if ($major < 7 || ($major == 7 && $minor == 0)) {
                return true;
            }
        }

        if (preg_match('/&warn\.removed\.function-(\d+-\d+-\d+)/', $file, $matches) && isset($matches[2])) {
            $removedVersion = $matches[2];
            [$major, $minor] = explode('-', $removedVersion);
            if ($major < 7 || ($major == 7 && $minor == 0)) {
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
            throw new \RuntimeException('An error occured while reading '.$this->path);
        }

        if ($this->getIsDeprecated($file)) {
            return false;
        }

        if (preg_match('/&false;\s+on\s+error/m', $file)) {
            return true;
        }
        if (preg_match('/&false;\s+on\s+failure/m', $file)) {
            return true;
        }
        if (preg_match('/&false;\s+otherwise/m', $file) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $file)) {
            return true;
        }
        if (preg_match('/may\s+return\s+&false;/m', $file) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $file)) {
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
        if (preg_match('/&false;\s+if\s+the\s+number\s+of\s+elements\s+for\s+each\s+array\s+isn\'t\s+equal/m', $file)) {
            return true;
        }
        if (preg_match('/If\s+the\s+call\s+fails,\s+it\s+will\s+return\s+&false;/m', $file)) {
            return true;
        }
        if (preg_match('/Upon\s+failure,?\s+\<function\>[\w_]{1,15}?\<\/function\>\s+returns\s+&false;/m', $file)) {
            return true;
        }
        if (preg_match('/On\s+failure,\s+&false;\s+is\s+returned/m', $file)) {
            return true;
        }
        if (preg_match('/on\s+success,\s+otherwise\s+&false;\s+is\s+returned/m', $file)) {
            return true;
        }
        if (preg_match('/Returns.*on success[.\s\S]+Returns &false;\s+if/m', $file)) {
            return true;
        }

        if (preg_match('/&gd\.return\.identifier;/m', $file)) {
            return true;
        }
        if (preg_match('/&gd\.return\.identifier;/m', $file)) {
            return true;
        }
        //used for date
        if (preg_match('/If a non-numeric value is used for 
   \<parameter\>timestamp\<\/parameter\>, &false; is returned/m', $file)) {
            return true;
        }

        //used to detect imagecreatefromstring
        if (preg_match('/If the arguments are invalid, the function returns &false;/m', $file)) {
            return true;
        }

        //used to detect class_implements
        if (preg_match("/&false; when the given class doesn't exist/m", $file)) {
            return true;
        }

        //used to detect get_headers and ldap_search
        if (preg_match("/&false; on failure/m", $file)) {
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
            throw new \RuntimeException('An error occured while reading '.$this->path);
        }

        if ($this->getIsDeprecated($file)) {
            return false;
        }

        if (preg_match('/&null;\s+on\s+failure/', $file)) {
            return true;
        }
        if (preg_match('/&null;\s+if\s+an\s+error\s+occurs/', $file)) {
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
            throw new \RuntimeException('An error occured while reading '.$this->path);
        }

        // Only evaluate the synopsis inside the `<refsect1 role="description">...</refsect1>` section of the doc page.
        // Other synopses might occur in the `<refsect1 role="parameters">...</refsect1>` section, but these describe
        // handlers, callbacks, and other callable-type arguments, not the function itself.
        preg_match_all('/<refsect1\s+role="description">[\s\S]*?<\/refsect1>/m', $file, $fileDescriptionSection);
        $fileDescriptionSection = implode('', $this->arrayFlatten((array) $fileDescriptionSection));

        if (!preg_match_all('/<\/?methodsynopsis[\s\S]*?>[\s\S]*?<\/methodsynopsis>/m', $fileDescriptionSection, $functions, PREG_SET_ORDER, 0)) {
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
        if ($content === false) {
            throw new \RuntimeException('An error occured while reading '.$this->path);
        }
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
        $file1 = \file_get_contents(__DIR__.'/../doc/doc-en/en/language-defs.ent') ?: '';
        $file2 = \file_get_contents(__DIR__.'/../doc/doc-en/en/language-snippets.ent') ?: '';
        $file3 = \file_get_contents(__DIR__.'/../doc/doc-en/en/extensions.ent') ?: '';
        $file4 = \file_get_contents(__DIR__.'/../doc/doc-en/doc-base/entities/global.ent') ?: '';

        $completeFile = $file1 . self::extractXmlHeader($file2) . self::extractXmlHeader($file3) . $file4;

        \file_put_contents(__DIR__.'/../doc/entities/generated.ent', $completeFile);
    }

    private static function extractXmlHeader(string $content): string
    {
        $strpos = strpos($content, '?>')+2;
        return substr($content, $strpos);
    }
}
