<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

/**
 * @param array $keys
 * @param array $values
 * @return array
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
 * @param array $array
 * @return array
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
 * @param array $array
 * @param array $replacements
 * @return array
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
 * @param array $array
 * @param array $replacements
 * @return array
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
 * @param array|object $array
 * @param callable $callback
 * @param mixed $arg
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
 * @param array $array
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
