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

function array_combine()
{
    return \array_combine(...func_get_args());
}

function array_flip()
{
    return \array_flip(...func_get_args());
}

function array_replace_recursive()
{
    return \array_replace_recursive(...func_get_args());
}

function array_replace()
{
    return \array_replace(...func_get_args());
}

function array_walk_recursive()
{
    return \array_walk_recursive(...func_get_args());
}

function shuffle()
{
    return \shuffle(...func_get_args());
}
