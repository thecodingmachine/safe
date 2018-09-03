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
    public function __construct(string $_path) {
        $this->path = $_path;
    }

    /*
     * Detect function which didn't return FALSE on error.
     *
     * @return bool
     */
    public function detectFalsyFunction(): bool {
        $file = file_get_contents($this->path);

        if (!preg_match('/::/m', $file)) {
            if (preg_match('/&false; on error/m', $file)) {
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
            if (preg_match('/&return.falseproblem;/m', $file)) {
                return true;
            }
        }
        return false;
    }


    /*
     * @return SimpleXMLElement string[]
     */
    public function getMethodSynopsis(): array {
        $cleanedFunctions = [];
        $cleaningFunction = '';

        $file = file_get_contents($this->path);
        if (!preg_match_all('/<\/?methodsynopsis[\s\S]*?>[\s\S]*?<\/methodsynopsis>/m', $file, $functions, PREG_SET_ORDER, 0)) {
            return [];
        }
        $functions = $this->arrayFlatten($functions);
        foreach ($functions as $function) {
            $cleaningFunction = preg_replace('/&(false);/m', 'FALSE', $function);
            $cleaningFunction = preg_replace('/&(true);/m', 'TRUE', $cleaningFunction);
            $cleaningFunction = preg_replace('/&(.*);/m', '', $cleaningFunction);
            $cleanedFunctions[] = $cleaningFunction;
        }
        foreach ($cleanedFunctions as $cleanedFunction) {
            $functionObjects[] = simplexml_load_string($cleanedFunction);
        }
        return $functionObjects;
    }

    /*
     * @param multidimensional string array
     * @return string array
     */
    private function arrayFlatten(array $array): array {
        $result = array();

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->arrayFlatten($value));
            }
            else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}

