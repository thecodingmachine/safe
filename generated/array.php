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


/**
 * This function will return the current element in an array.
 *
 * @param object|array $array The input array.
 *
 * @return mixed
 * @throws ArrayException
 *
 */
function current($array)
{
    error_clear_last();
    $result = \current($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }

    return $result;
}


/**
 * This function will set the internal pointer of an array to its last element.
 *
 * @param object|array &$array The input array.
 *
 * @return mixed
 * @throws ArrayException
 *
 */
function end(&$array)
{
    error_clear_last();
    $result = \end($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }

    return $result;
}


/**
 * This function will advance the internal pointer of an array.
 *
 * @param object|array &$array The input array.
 *
 * @return mixed
 * @throws ArrayException
 *
 */
function next(&$array)
{
    error_clear_last();
    $result = \next($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }

    return $result;
}


/**
 * This function will rewind the internal array pointer.
 *
 * @param object|array &$array The input array.
 *
 * @return mixed
 * @throws ArrayException
 *
 */
function prev(&$array)
{
    error_clear_last();
    $result = \prev($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }

    return $result;
}


/**
 * This function will set the internal pointer of an array to its first element.
 *
 * @param object|array &$array The input array.
 *
 * @return mixed
 * @throws ArrayException
 *
 */
function reset(&$array)
{
    error_clear_last();
    $result = \reset($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }

    return $result;
}
