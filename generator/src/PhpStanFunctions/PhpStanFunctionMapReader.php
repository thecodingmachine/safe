<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;

use Safe\Generator\FileCreator;

class PhpStanFunctionMapReader
{
    /**
     * @var array<string, string[]>
     */
    private $functionMap;

    /**
     * @var array<string, string[]>
     */
    private $customFunctionMap;

    public function __construct()
    {
        $this->functionMap = require 'phar://' . FileCreator::getSafeRootDir() . '/generator/vendor/phpstan/phpstan/phpstan.phar/resources/functionMap.php';
        $this->customFunctionMap = require FileCreator::getSafeRootDir() . '/generator/config/CustomPhpStanFunctionMap.php';
    }

    public function getFunction(string $functionName): ?PhpStanFunction
    {
        if (!isset($this->functionMap[$functionName])) {
            return null;
        }
        $map = $this->functionMap[$functionName];
        $customMap = $this->customFunctionMap[$functionName] ?? null;
        if ($map && $customMap) {
            if ($customMap === $map) {
                throw new \RuntimeException("Useless custom function map $functionName: ".var_export($customMap, true)."\nPlease delete this line from the custom file");
            }
            $map = $customMap;
        }
        return new PhpStanFunction($map);
    }
}
