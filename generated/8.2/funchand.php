<?php

namespace Safe;

use Safe\Exceptions\FunchandException;

/**
 * Creates a function dynamically from the parameters passed, and returns a unique name for it.
 *
 * @param string $args The function arguments, as a single comma-separated string.
 * @param string $code The function code.
 * @return string Returns a unique function name as a string.
 * Note that the name contains a non-printable character ("\0"),
 * so care should be taken when printing the name or incorporating it in any other
 * string.
 * @throws FunchandException
 *
 */
function create_function(string $args, string $code): string
{
    error_clear_last();
    $safeResult = \create_function($args, $code);
    if ($safeResult === false) {
        throw FunchandException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param callable(): void $callback The function to register.
 * @param mixed $args
 * @throws FunchandException
 *
 */
function register_tick_function(callable $callback, ...$args): void
{
    error_clear_last();
    if ($args !== []) {
        $safeResult = \register_tick_function($callback, ...$args);
    } else {
        $safeResult = \register_tick_function($callback);
    }
    if ($safeResult === false) {
        throw FunchandException::createFromPhpError();
    }
}
