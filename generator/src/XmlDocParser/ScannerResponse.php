<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use Safe\Domain\MethodDefinition;

class ScannerResponse
{
    /**
     * @param Method[] $methods
     * @param MethodDefinition[] $overloadedFunctions
     */
    public function __construct(
        public readonly array $methods,
        public readonly array $overloadedFunctions
    ) {
    }
}
