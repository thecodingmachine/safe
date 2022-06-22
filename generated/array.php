<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

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
function array_replace_recursive(array $array, array  ...$replacements): array
{
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    if ($replacements !== []) {
        $result = \array_replace_recursive($array, ...$replacements);
    } else {
        $result = \array_replace_recursive($array);
    }
    restore_error_handler();

    if ($result === null) {
        throw ArrayException::createFromPhpError($error);
    }
    return $result;
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
function array_replace(array $array, array  ...$replacements): array
{
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    if ($replacements !== []) {
        $result = \array_replace($array, ...$replacements);
    } else {
        $result = \array_replace($array);
    }
    restore_error_handler();

    if ($result === null) {
        throw ArrayException::createFromPhpError($error);
    }
    return $result;
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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    if ($arg !== null) {
        $result = \array_walk_recursive($array, $callback, $arg);
    } else {
        $result = \array_walk_recursive($array, $callback);
    }
    restore_error_handler();

    if ($result === false) {
        throw ArrayException::createFromPhpError($error);
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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \shuffle($array);
    restore_error_handler();

    if ($result === false) {
        throw ArrayException::createFromPhpError($error);
    }
}
