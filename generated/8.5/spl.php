<?php

namespace Safe;

use Safe\Exceptions\SplException;

/**
 * This function returns an array with the names of the interfaces that the
 * given object_or_class and its parents implement.
 *
 * @param object|string $object_or_class An object (class instance) or a string (class or interface name).
 * @param bool $autoload Whether to autoload
 * if not already loaded.
 * @return array An array on success, or FALSE when the given class doesn't exist.
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
 * This function returns an array with the name of the parent classes of
 * the given object_or_class.
 *
 * @param object|string $object_or_class An object (class instance) or a string (class name).
 * @param bool $autoload Whether to autoload
 * if not already loaded.
 * @return array An array on success, or FALSE when the given class doesn't exist.
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
 * This function returns an array with the names of the traits that the
 * given object_or_class uses. This does however not include
 * any traits used by a parent class.
 *
 * @param object|string $object_or_class An object (class instance) or a string (class name).
 * @param bool $autoload Whether to autoload
 * if not already loaded.
 * @return array An array on success, or FALSE when the given class doesn't exist.
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
 * Register a function with the spl provided __autoload queue. If the queue
 * is not yet activated it will be activated.
 *
 * If your code has an existing __autoload function then
 * this function must be explicitly registered on the __autoload queue. This
 * is because spl_autoload_register will effectively
 * replace the engine cache for the __autoload function
 * by either spl_autoload or
 * spl_autoload_call.
 *
 * If there must be multiple autoload functions, spl_autoload_register
 * allows for this. It effectively creates a queue of autoload functions, and
 * runs through each of them in the order they are defined. By contrast,
 * __autoload may only be defined once.
 *
 * @param callable(string):void|null $callback The autoload function being registered.
 * If NULL, then the default implementation of
 * spl_autoload will be registered.
 *
 * The class will not contain the leading
 * backslash of a fully-qualified identifier.
 * @param bool $throw This parameter specifies whether
 * spl_autoload_register should throw
 * exceptions when the callback
 * cannot be registered.
 *
 * This parameter is ignored as of PHP 8.0.0, and a notice will be
 * emitted if set to FALSE. spl_autoload_register
 * will now always throw a TypeError on invalid
 * arguments.
 * @param bool $prepend If TRUE, spl_autoload_register will prepend
 * the autoloader on the autoload queue instead of appending it.
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
 * Removes a function from the autoload queue. If the queue
 * is activated and empty after removing the given function then it will
 * be deactivated.
 *
 * When this function results in the queue being deactivated, any
 * __autoload function that previously existed will not be reactivated.
 *
 * @param mixed $callback The autoload function being unregistered.
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
