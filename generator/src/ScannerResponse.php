<?php

namespace Safe;

class ScannerResponse
{
    /**
     * @readonly
     * @var Method[]
     */
    public array $methods;

    /**
     * @readonly
     * @var string[]
     */
    public array $overloadedFunctions;

    /**
     * @param Method[] $methods
     * @param string[] $overloadedFunctions
     */
    public function __construct(array $methods, array $overloadedFunctions)
    {
        $this->methods = $methods;
        $this->overloadedFunctions = $overloadedFunctions;
    }
}
