<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;

// This file configures rector/rector to replace all PHP functions with their equivalent "safe" functions.
return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        RenameFunctionRector::class,
        [
            {{functionNames}}
        ],
    );
};