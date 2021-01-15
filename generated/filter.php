<?php

namespace Safe;

use Safe\Exceptions\FilterException;

/**
 * This function is useful for retrieving many values without
 * repetitively calling filter_input.
 * 
 * @param int $type One of INPUT_GET, INPUT_POST,
 * INPUT_COOKIE, INPUT_SERVER, or
 * INPUT_ENV.
 * @param  $options An array defining the arguments. A valid key is a string
 * containing a variable name and a valid value is either a filter type, or an array
 * optionally specifying the filter, flags and options. If the value is an
 * array, valid keys are filter which specifies the
 * filter type,
 * flags which specifies any flags that apply to the
 * filter, and options which specifies any options that
 * apply to the filter. See the example below for a better understanding.
 * 
 * This parameter can be also an integer holding a filter constant. Then all values in the
 * input array are filtered by this filter.
 * @param bool $add_empty Add missing keys as NULL to the return value.
 * @return mixed An array containing the values of the requested variables on success.
 * If the input array designated by type is not populated,
 * the function returns NULL if the FILTER_NULL_ON_FAILURE
 * flag is not given, or FALSE otherwise. For other failures, FALSE is returned.
 * 
 * An array value will be FALSE if the filter fails, or NULL if 
 * the variable is not set. Or if the flag FILTER_NULL_ON_FAILURE
 * is used, it returns FALSE if the variable is not set and NULL if the filter 
 * fails. If the add_empty parameter is FALSE, no array
 * element will be added for unset variables.
 * @throws FilterException
 * 
 */
function filter_input_array(int $type,  $options = FILTER_DEFAULT, bool $add_empty = true)
{
    error_clear_last();
    $result = \filter_input_array($type, $options, $add_empty);
    if ($result === false) {
        throw FilterException::createFromPhpError();
    }
    return $result;
}


/**
 * This function is useful for retrieving many values without
 * repetitively calling filter_var.
 * 
 * @param array $array An array with string keys containing the data to filter.
 * @param  $options An array defining the arguments. A valid key is a string
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
 * @return mixed An array containing the values of the requested variables on success. An array value will be FALSE if the filter fails, or NULL if 
 * the variable is not set.
 * @throws FilterException
 * 
 */
function filter_var_array(array $array,  $options = FILTER_DEFAULT, bool $add_empty = true)
{
    error_clear_last();
    $result = \filter_var_array($array, $options, $add_empty);
    if ($result === false) {
        throw FilterException::createFromPhpError();
    }
    return $result;
}


