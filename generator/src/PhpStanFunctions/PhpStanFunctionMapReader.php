<?php


namespace Safe\PhpStanFunctions;

class PhpStanFunctionMapReader
{
    /**
     * @var array<string, array>
     */
    private $functionMap;
    /**
     * @var array<string, array>
     */
    private $customFunctionMap;

    public function __construct()
    {
        $this->functionMap = require 'phar://'.__DIR__.'/../../vendor/phpstan/phpstan/phpstan.phar/resources/functionMap.php';
        $this->customFunctionMap = require __DIR__ . '/../../config/CustomPhpStanFunctionMap.php';
    }

    public function hasFunction(string $functionName): bool
    {
        return isset($this->functionMap[$functionName]);
    }

    public function getFunction(string $functionName): PhpStanFunction
    {
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
