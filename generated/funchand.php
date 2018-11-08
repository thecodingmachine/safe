<?php

namespace Safe;

use Safe\Exceptions\FunchandException;

/**
 * Calls the callback given by the first parameter with
 * the parameters in param_arr.
 *
 * @param callable $callback The callable to be called.
 * @param array $param_arr The parameters to be passed to the callback, as an indexed array.
 * @return mixed Returns the return value of the callback, .
 * @throws FunchandException
 *
 */
function call_user_func_array(callable $callback, array $param_arr)
{
    error_clear_last();
    $result = \call_user_func_array($callback, $param_arr);
    if ($result === false) {
        throw FunchandException::createFromPhpError();
    }
    return $result;
}


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
 * Calls a user defined function or method given by the function
 * parameter. This function must be called within a method context, it can't be
 * used outside a class.
 * It uses the late static
 * binding.
 * All arguments of the forwarded method are passed as values,
 * and as an array, similarly to call_user_func_array.
 *
 * @param callable $function The function or method to be called. This parameter may be an array,
 * with the name of the class, and the method, or a string, with a function
 * name.
 * @param array $parameters One parameter, gathering all the method parameter in one array.
 *
 * Note that the parameters for forward_static_call_array are
 * not passed by reference.
 * @return mixed Returns the function result, .
 * @throws FunchandException
 *
 */
function forward_static_call_array(callable $function, array $parameters)
{
    error_clear_last();
    $result = \forward_static_call_array($function, $parameters);
    if ($result === false) {
        throw FunchandException::createFromPhpError();
    }
    return $result;
}


/**
 * Calls a user defined function or method given by the function
 * parameter, with the following arguments. This function must be called within a method
 * context, it can't be used outside a class.
 * It uses the late static
 * binding.
 *
 * @param callable $function The function or method to be called. This parameter may be an array,
 * with the name of the class, and the method, or a string, with a function
 * name.
 * @param mixed $parameter Zero or more parameters to be passed to the function.
 * @param mixed $params
 * @return mixed Returns the function result, .
 * @throws FunchandException
 *
 */
function forward_static_call(callable $function, $parameter = null, ...$params)
{
    error_clear_last();
    if ($params !== []) {
        $result = \forward_static_call($function, $parameter, ...$params);
    } elseif ($parameter !== null) {
        $result = \forward_static_call($function, $parameter);
    } else {
        $result = \forward_static_call($function);
    }
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
    if ($params !== []) {
        $result = \register_tick_function($function, $arg, ...$params);
    } elseif ($arg !== null) {
        $result = \register_tick_function($function, $arg);
    } else {
        $result = \register_tick_function($function);
    }
    if ($result === false) {
        throw FunchandException::createFromPhpError();
    }
}
