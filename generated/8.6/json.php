<?php

namespace Safe;

use Safe\Exceptions\JsonException;

/**
 * @param mixed $value
 * @param int $flags
 * @param positive-int $depth
 * @return non-empty-string
 * @throws JsonException
 *
 */
function json_encode($value, int $flags = 0, int $depth = 512): string
{
    error_clear_last();
    $safeResult = \json_encode($value, $flags, $depth);
    if ($safeResult === false) {
        throw JsonException::createFromPhpError();
    }
    return $safeResult;
}
