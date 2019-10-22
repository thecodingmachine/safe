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
        $this->functionMap = require __DIR__.'/../../vendor/phpstan/phpstan/src/Reflection/SignatureMap/functionMap.php';
        $this->customFunctionMap = require __DIR__.'/CustomPhpStanFunctionMap.php';
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
                throw new \RuntimeException('Useless custom function map: '.var_export($customMap, true)."\nPlease delete this line from the custom file");
            }
            $map = $customMap;
        }
        return new PhpStanFunction($map);
    }
    
    public function uselessFunction()
    {
        return 'lol';
    }
}
