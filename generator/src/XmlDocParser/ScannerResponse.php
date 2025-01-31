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
        /**
         * @readonly
         */
        public array $methods,
        /**
         * @readonly
         */
        public array $overloadedFunctions
    ) {
    }
}
