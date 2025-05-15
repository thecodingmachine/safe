<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

class ScannerResponse
{
    /**
     * @param Method[] $methods
     * @param string[] $overloadedFunctions
     */
    public function __construct(
        public readonly array $methods,
        public readonly array $overloadedFunctions
    ) {
    }

    public function hasOverloadedFunctions(): bool
    {
        return 0 <= \count($this->overloadedFunctions);
    }
}
