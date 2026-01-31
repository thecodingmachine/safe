<?php

namespace Safe;

use Safe\Exceptions\SplException;

/**
 * @param object|string $object_or_class
 * @param bool $autoload
 * @return array
 * @throws SplException
 *
 */
function class_implements($object_or_class, bool $autoload = true): array
{
    error_clear_last();
    $safeResult = \class_implements($object_or_class, $autoload);
    if ($safeResult === false) {
        throw SplException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param object|string $object_or_class
 * @param bool $autoload
 * @return array
 * @throws SplException
 *
 */
function class_parents($object_or_class, bool $autoload = true): array
{
    error_clear_last();
    $safeResult = \class_parents($object_or_class, $autoload);
    if ($safeResult === false) {
        throw SplException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param object|string $object_or_class
 * @param bool $autoload
 * @return array
 * @throws SplException
 *
 */
function class_uses($object_or_class, bool $autoload = true): array
{
    error_clear_last();
    $safeResult = \class_uses($object_or_class, $autoload);
    if ($safeResult === false) {
        throw SplException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param callable(string):void|null $callback
 * @param bool $throw
 * @param bool $prepend
 * @throws SplException
 *
 */
function spl_autoload_register(?callable $callback = null, bool $throw = true, bool $prepend = false): void
{
    error_clear_last();
    if ($prepend !== false) {
        $safeResult = \spl_autoload_register($callback, $throw, $prepend);
    } elseif ($throw !== true) {
        $safeResult = \spl_autoload_register($callback, $throw);
    } elseif ($callback !== null) {
        $safeResult = \spl_autoload_register($callback);
    } else {
        $safeResult = \spl_autoload_register();
    }
    if ($safeResult === false) {
        throw SplException::createFromPhpError();
    }
}


/**
 * @param mixed $callback
 * @throws SplException
 *
 */
function spl_autoload_unregister($callback): void
{
    error_clear_last();
    $safeResult = \spl_autoload_unregister($callback);
    if ($safeResult === false) {
        throw SplException::createFromPhpError();
    }
}
