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
    private $functionMap74;

    public function __construct()
    {
        $this->functionMap = require __DIR__.'/../../vendor/phpstan/phpstan/src/Reflection/SignatureMap/functionMap.php';
        $this->functionMap74 = (require __DIR__.'/../../vendor/phpstan/phpstan/src/Reflection/SignatureMap/functionMap_php74delta.php')['new'];
    }

    public function hasFunction(string $functionName): bool
    {
        return isset($this->functionMap[$functionName]) || isset($this->functionMap74[$functionName]);
    }

    public function getFunction(string $functionName): PhpStanFunction
    {
        $map = $this->functionMap74[$functionName] ?? $this->functionMap[$functionName];
        return new PhpStanFunction($map);
    }
}
