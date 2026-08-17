<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use Safe\Filesystem\PathHelper;
use Safe\Generator\FileCreator;

use function explode;
use function strpos;

class DocPage
{
    public function __construct(private readonly string $path)
    {
    }

    public static function referenceDir(): string
    {
        return PathHelper::docsDirectory().'/php/doc-en/reference';
    }

    // Ignore function if it was removed before PHP 8.1
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

    public function getErrorType(): ErrorType
    {
        $file = file_get_contents($this->path);
        if ($file === false) {
            throw new \RuntimeException('An error occurred while reading '.$this->path);
        }
        if ($this->getIsDeprecated($file)) {
            return ErrorType::UNKNOWN;
        }

        // Only evaluate the text inside the `<refsect1 role="returnvalues">...</refsect1>` section of the doc page.
        // This minimizes 'false positives', where text such as "returns false when ..." could be matched outside
        // the function's dedicated Return Values section.
        $returnDocs = $this->extractSection('returnvalues', $file);
        $detectErrorType = require FileCreator::getSafeRootDir() . '/generator/config/detectErrorType.php';
        return $detectErrorType($returnDocs);
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

        // Load entity definitions from .ent files and build entity replacement map
        $entityReplacements = []; // Map of entity name => replacement value
        
        // Load DTD-format entity files
        $patterns = [
            '/php/doc-base/entities/*.ent',
            '/php/doc-en/*.ent',
            '/php/doc-en/entities/*.ent',
        ];
        
        foreach ($patterns as $pattern) {
            $files = glob(PathHelper::docsDirectory() . $pattern);
            if ($files !== false) {
                foreach ($files as $file) {
                    self::parseEntityFile($file, $entityReplacements);
                }
            }
        }
        
        // Also handle XML-format entity files (newer format)
        $xmlFiles = glob(PathHelper::docsDirectory() . '/php/doc-en/entities/*.ent');
        if ($xmlFiles !== false) {
            foreach ($xmlFiles as $file) {
                self::parseXmlEntityFile($file, $entityReplacements);
            }
        }

        // Replace entities in the content before parsing
        // Do multiple passes to handle nested entity references
        if (!empty($entityReplacements)) {
            for ($pass = 0; $pass < 10; $pass++) { // Max 10 passes to prevent infinite loops
                $contentBefore = $content;
                foreach ($entityReplacements as $entityName => $entityValue) {
                    $pattern = '&' . $entityName . ';';
                    $content = \str_replace($pattern, $entityValue, $content);
                }
                // Stop if nothing changed
                if ($content === $contentBefore) {
                    break;
                }
            }
        }

        libxml_use_internal_errors(true);
        $elem = \simplexml_load_string($content, \SimpleXMLElement::class, LIBXML_DTDLOAD | LIBXML_NOENT);
        if ($elem === false) {
            $errors = "";
            foreach (libxml_get_errors() as $error) {
                $errors .= trim($error->message) . "\n";
            }
            throw new \RuntimeException('Invalid XML file for '.$this->path . ":\n" . $errors);
        }
        $elem->registerXPathNamespace('docbook', 'http://docbook.org/ns/docbook');

        return $elem;
    }

    /**
     * Parse DTD-format entity file and populate the entity replacements map.
     * Uses an XML parser approach to properly handle complex entity content.
     *
     * @param string $filePath Path to .ent file
     * @param array<string, string> &$entityReplacements Map to populate with entity name => value
     */
    private static function parseEntityFile(string $filePath, array &$entityReplacements): void
    {
        $content = \file_get_contents($filePath);
        if ($content === false) {
            return;
        }
        
        // Remove XML declaration and comments before wrapping in DOCTYPE
        $content = (string)\preg_replace('/<\?xml[^?]*\?>/', '', $content);
        $content = (string)\preg_replace('/<!--[\s\S]*?-->/', '', $content);
        
        // Wrap the entity declarations in a DOCTYPE so we can parse them
        // This allows libxml2 to properly parse the entity declarations
        $doctype = '<!DOCTYPE entities [' . $content . ']>';
        $wrappedXml = '<?xml version="1.0" encoding="utf-8"?>' . $doctype . '<root/>';
        
        // Use DOMDocument to load the wrapped XML, which will parse the DTD entities
        $dom = new \DOMDocument('1.0', 'utf-8');
        $dom->preserveWhiteSpace = true;
        
        libxml_use_internal_errors(true);
        if ($dom->loadXML($wrappedXml)) {
            // Get the internal DTD subset which contains the entity definitions
            $internalSubset = $dom->doctype?->internalSubset;
            if ($internalSubset !== null) {
                // Parse the internal subset to extract entities
                self::extractEntitiesFromDtd($internalSubset, $entityReplacements);
            }
        }
        libxml_use_internal_errors(false);
    }
    
    /**
     * Extract entity definitions from a DTD internal subset string.
     *
     * @param string $dtdSubset The internal DTD subset content
     * @param array<string, string> &$entityReplacements Map to populate with entity name => value
     */
    private static function extractEntitiesFromDtd(string $dtdSubset, array &$entityReplacements): void
    {
        // Parse entity declarations from the DTD subset
        // Match: <!ENTITY name "value"> or <!ENTITY name 'value'>
        if (\preg_match_all('/<!ENTITY\s+(\S+)\s+(["\'])(.+?)\2\s*>/s', $dtdSubset, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $entityName = $match[1];
                $entityValue = $match[3];
                // Only add if not already defined (first occurrence wins)
                if (!isset($entityReplacements[$entityName])) {
                    $entityReplacements[$entityName] = $entityValue;
                }
            }
        }
    }
    
    /**
     * Parse XML-format entity file (newer PHP doc format).
     * These files contain <entity name="...">...</entity> elements.
     * Uses regex parsing instead of XML parsing to avoid entity resolution issues.
     *
     * @param string $filePath Path to .ent file
     * @param array<string, string> &$entityReplacements Map to populate with entity name => value
     */
    private static function parseXmlEntityFile(string $filePath, array &$entityReplacements): void
    {
        $content = \file_get_contents($filePath);
        if ($content === false) {
            return;
        }
        
        // Remove XML declaration and comments
        $content = (string)\preg_replace('/<\?xml[^?]*\?>/', '', $content);
        $content = (string)\preg_replace('/<!--[\s\S]*?-->/', '', $content);
        
        // Extract entity elements using regex: <entity name="...">...</entity>
        // This avoids XML parsing issues with undefined entities
        if (\preg_match_all('/<entity\s+name="([^"]+)"[^>]*>([\s\S]*?)<\/entity>/s', $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $entityName = $match[1];
                $entityValue = \trim($match[2]);
                // Only add if not already defined (first occurrence wins)
                if (!isset($entityReplacements[$entityName]) && !empty($entityValue)) {
                    $entityReplacements[$entityName] = $entityValue;
                }
            }
        }
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
}
