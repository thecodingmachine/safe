<?php

namespace Safe;

use Safe\Exceptions\SplException;

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
 * @param callable(string):void $callback The autoload function being registered.
 * If NULL, then the default implementation of
 * spl_autoload will be registered.
 * @param bool $throw This parameter specifies whether
 * spl_autoload_register should throw
 * exceptions when the callback
 * cannot be registered.
 * @param bool $prepend If true, spl_autoload_register will prepend
 * the autoloader on the autoload queue instead of appending it.
 * @throws SplException
 *
 */
function spl_autoload_register(callable $callback = null, bool $throw = true, bool $prepend = false): void
{
    error_clear_last();
    if ($prepend !== false) {
        $result = \spl_autoload_register($callback, $throw, $prepend);
    } elseif ($throw !== true) {
        $result = \spl_autoload_register($callback, $throw);
    } elseif ($callback !== null) {
        $result = \spl_autoload_register($callback);
    }else {
        $result = \spl_autoload_register();
    }
    if ($result === false) {
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
function spl_autoload_unregister( $callback): void
{
    error_clear_last();
    $result = \spl_autoload_unregister($callback);
    if ($result === false) {
        throw SplException::createFromPhpError();
    }
}

