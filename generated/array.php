<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

/**
 * Applies the user-defined callback function to each
 * element of the array. This function will recurse
 * into deeper arrays.
 *
 * @param array|object $array The input array.
 * @param callable $callback Typically, callback takes on two parameters.
 * The array parameter's value being the first, and
 * the key/index second.
 *
 * If callback needs to be working with the
 * actual values of the array, specify the first parameter of
 * callback as a
 * reference. Then,
 * any changes made to those elements will be made in the
 * original array itself.
 * @param mixed $arg If the optional arg parameter is supplied,
 * it will be passed as the third parameter to the
 * callback.
 * @throws ArrayException
 *
 */
function array_walk_recursive(&$array, callable $callback, $arg = null): void
{
    error_clear_last();
    if ($arg !== null) {
        $safeResult = \array_walk_recursive($array, $callback, $arg);
    } else {
        $safeResult = \array_walk_recursive($array, $callback);
    }
    if ($safeResult === false) {
        throw ArrayException::createFromPhpError();
    }
}

