<?php

namespace Safe;

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
