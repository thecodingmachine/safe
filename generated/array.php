<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

/**
 *
 *
 * @param array $array
 * @param callable $callback The callback function to call to check each element, which must be
 *
 * boolcallback
 * mixedvalue
 * mixedkey
 *
 * If this function returns FALSE, FALSE is returned from
 * array_all and the callback will not be called for
 * further elements.
 * @throws ArrayException
 *
 */
function array_all(array $array, callable $callback): void
{
    error_clear_last();
    $safeResult = \array_all($array, $callback);
    if ($safeResult === false) {
        throw ArrayException::createFromPhpError();
    }
}
