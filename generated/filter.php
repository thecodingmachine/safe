<?php

namespace Safe;

use Safe\Exceptions\FilterException;

/**
 *
 *
 * @param int $type One of INPUT_GET, INPUT_POST,
 * INPUT_COOKIE, INPUT_SERVER, or
 * INPUT_ENV.
 * @param string $variable_name Name of a variable to check.
 * @throws FilterException
 *
 */
function filter_has_var(int $type, string $variable_name): void
{
    error_clear_last();
    $result = \filter_has_var($type, $variable_name);
    if ($result === false) {
        throw FilterException::createFromPhpError();
    }
}


/**
 * This function is useful for retrieving many values without
 * repetitively calling filter_var.
 *
 * @param array $data An array with string keys containing the data to filter.
 * @param mixed $definition An array defining the arguments. A valid key is a string
 * containing a variable name and a valid value is either a
 * filter type, or an
 * array optionally specifying the filter, flags and options.
 * If the value is an array, valid keys are filter
 * which specifies the filter type,
 * flags which specifies any flags that apply to the
 * filter, and options which specifies any options that
 * apply to the filter. See the example below for a better understanding.
 *
 * This parameter can be also an integer holding a filter constant. Then all values in the
 * input array are filtered by this filter.
 * @param bool $add_empty Add missing keys as NULL to the return value.
 * @return mixed An array containing the values of the requested variables on success, . An array value will be FALSE if the filter fails, or NULL if
 * the variable is not set.
 * @throws FilterException
 *
 */
function filter_var_array(array $data, $definition = null, bool $add_empty = true)
{
    error_clear_last();
    if ($add_empty !== true) {
        $result = \filter_var_array($data, $definition, $add_empty);
    } elseif ($definition !== null) {
        $result = \filter_var_array($data, $definition);
    } else {
        $result = \filter_var_array($data);
    }
    if ($result === false) {
        throw FilterException::createFromPhpError();
    }
    return $result;
}
