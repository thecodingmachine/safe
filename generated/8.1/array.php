<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

/**
 * Creates an array by using the values from the
 * keys array as keys and the values from the
 * values array as the corresponding values.
 *
 * @param array $keys Array of keys to be used. Illegal values for key will be
 * converted to string.
 * @param array $values Array of values to be used
 * @return array Returns the combined array, FALSE if the number of elements
 * for each array isn't equal.
 * @throws ArrayException
 *
 */
function array_combine(array $keys, array $values): array
{
    error_clear_last();
    $safeResult = \array_combine($keys, $values);
    if ($safeResult === false) {
        throw ArrayException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * array_flip returns an array in flip
 * order, i.e. keys from array become values and values
 * from array become keys.
 *
 * Note that the values of array need to be valid
 * keys, i.e. they need to be either int or
 * string. A warning will be emitted if a value has the wrong
 * type, and the key/value pair in question will not be included
 * in the result.
 *
 * If a value has several occurrences, the latest key will be
 * used as its value, and all others will be lost.
 *
 * @param array $array An array of key/value pairs to be flipped.
 * @return array Returns the flipped array on success.
 * @throws ArrayException
 *
 */
function array_flip(array $array): array
{
    error_clear_last();
    $safeResult = \array_flip($array);
    if ($safeResult === null) {
        throw ArrayException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * array_replace_recursive replaces the values of
 * array with the same values from all the following
 * arrays. If a key from the first array exists in the second array, its value
 * will be replaced by the value from the second array. If the key exists in the
 * second array, and not the first, it will be created in the first array.
 * If a key only exists in the first array, it will be left as is.
 * If several arrays are passed for replacement, they will be processed
 * in order, the later array overwriting the previous values.
 *
 * array_replace_recursive is recursive : it will recurse into
 * arrays and apply the same process to the inner value.
 *
 * When the value in the first array is scalar, it will be replaced
 * by the value in the second array, may it be scalar or array.
 * When the value in the first array and the second array
 * are both arrays, array_replace_recursive will replace
 * their respective value recursively.
 *
 * @param array $array The array in which elements are replaced.
 * @param array $replacements Arrays from which elements will be extracted.
 * @return array Returns an array.
 * @throws ArrayException
 *
 */
function array_replace_recursive(array $array, array ...$replacements): array
{
    error_clear_last();
    if ($replacements !== []) {
        $safeResult = \array_replace_recursive($array, ...$replacements);
    } else {
        $safeResult = \array_replace_recursive($array);
    }
    if ($safeResult === null) {
        throw ArrayException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * array_replace replaces the values of
 * array with values having the same keys in each of the following
 * arrays. If a key from the first array exists in the second array, its value
 * will be replaced by the value from the second array. If the key exists in the
 * second array, and not the first, it will be created in the first array.
 * If a key only exists in the first array, it will be left as is.
 * If several arrays are passed for replacement, they will be processed
 * in order, the later arrays overwriting the previous values.
 *
 * array_replace is not recursive : it will replace
 * values in the first array by whatever type is in the second array.
 *
 * @param array $array The array in which elements are replaced.
 * @param array $replacements Arrays from which elements will be extracted.
 * Values from later arrays overwrite the previous values.
 * @return array Returns an array.
 * @throws ArrayException
 *
 */
function array_replace(array $array, array ...$replacements): array
{
    error_clear_last();
    if ($replacements !== []) {
        $safeResult = \array_replace($array, ...$replacements);
    } else {
        $safeResult = \array_replace($array);
    }
    if ($safeResult === null) {
        throw ArrayException::createFromPhpError();
    }
    return $safeResult;
}


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


/**
 * This function shuffles (randomizes the order of the elements in) an array.
 * It uses a pseudo random number generator that is not suitable for
 * cryptographic purposes.
 *
 * @param array $array The array.
 * @throws ArrayException
 *
 */
function shuffle(array &$array): void
{
    error_clear_last();
    $safeResult = \shuffle($array);
    if ($safeResult === false) {
        throw ArrayException::createFromPhpError();
    }
}
