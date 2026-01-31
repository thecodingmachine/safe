<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

/**
 * @param array $array
 * @param callable $callback
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
 * @param array $keys
 * @param array $values
 * @return array
 *
 */
function array_combine(array $keys, array $values): array
{
    error_clear_last();
    $safeResult = \array_combine($keys, $values);
    return $safeResult;
}


/**
 * @param array $array
 * @return array
 *
 */
function array_flip(array $array): array
{
    error_clear_last();
    $safeResult = \array_flip($array);
    return $safeResult;
}


/**
 * @param array $array
 * @param array $replacements
 * @return array
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
    return $safeResult;
}


/**
 * @param array $array
 * @param array $replacements
 * @return array
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
    return $safeResult;
}


/**
 * @param array|object $array
 * @param callable $callback
 * @param mixed $arg
 * @return bool
 *
 */
function array_walk_recursive(&$array, callable $callback, $arg = null): bool
{
    error_clear_last();
    if ($arg !== null) {
        $safeResult = \array_walk_recursive($array, $callback, $arg);
    } else {
        $safeResult = \array_walk_recursive($array, $callback);
    }
    return $safeResult;
}


/**
 * @param array $array
 * @return bool
 *
 */
function shuffle(array &$array): bool
{
    error_clear_last();
    $safeResult = \shuffle($array);
    return $safeResult;
}
