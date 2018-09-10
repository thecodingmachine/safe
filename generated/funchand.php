<?php

namespace Safe;

use Safe\Exceptions\FunchandException;

/**
 * Creates an anonymous function from the parameters passed, and
 * returns a unique name for it.
 *
 * @param string $args The function arguments.
 * @param string $code The function code.
 * @return string Returns a unique function name as a string, .
 * @throws FunchandException
 *
 */
function create_function(string $args, string $code): string
{
    error_clear_last();
    $result = \create_function($args, $code);
    if ($result === false) {
        throw FunchandException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the specified argument from a user-defined function's argument list.
 *
 * This function may be used in conjunction with
 * func_get_args and func_num_args
 * to allow user-defined functions to accept variable-length argument lists.
 *
 * @param int $arg_num The argument offset. Function arguments are counted starting from
 * zero.
 * @return mixed Returns the specified argument, .
 * @throws FunchandException
 *
 */
function func_get_arg(int $arg_num)
{
    error_clear_last();
    $result = \func_get_arg($arg_num);
    if ($result === false) {
        throw FunchandException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param callable $function The function name as a string, or an array consisting of an object and
 * a method.
 * @param mixed $arg
 * @param mixed $params
 * @throws FunchandException
 *
 */
function register_tick_function(callable $function, $arg = null, ...$params): void
{
    error_clear_last();
    if ($params !== null) {
        $result = \register_tick_function($function, $arg, $params);
    } elseif ($arg !== null) {
        $result = \register_tick_function($function, $arg);
    } else {
        $result = \register_tick_function($function);
    }
    if ($result === false) {
        throw FunchandException::createFromPhpError();
    }
}
