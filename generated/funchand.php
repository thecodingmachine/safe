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
    $result = \create_function($args, $code);
    restore_error_handler();

    if ($result === false) {
        throw FunchandException::createFromPhpError($error);
    }
    return $result;
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
    if ($args !== []) {
        $result = \register_tick_function($callback, ...$args);
    } else {
        $result = \register_tick_function($callback);
    }
    restore_error_handler();

    if ($result === false) {
        throw FunchandException::createFromPhpError($error);
    }
}
