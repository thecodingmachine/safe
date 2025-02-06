<?php

namespace Safe;

use Safe\Exceptions\FilterException;

/**
 * This function is useful for retrieving many values without
 * repetitively calling filter_input.
 *
 * @param int $type
 * @param array|int $options
 * @param bool $add_empty
 * @return array|null
 * @throws FilterException
 *
 */
function filter_input_array(int $type, $options = FILTER_DEFAULT, bool $add_empty = true): ?array
{
    error_clear_last();
    $safeResult = \filter_input_array($type, $options, $add_empty);
    if ($safeResult === false) {
        throw FilterException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param array $array
 * @param mixed $options
 * @param bool $add_empty Add missing keys as NULL to the return value.
 * @return array|null An array containing the values of the requested variables on success. An array value will be FALSE if the filter fails, or NULL if
 * the variable is not set.
 * @throws FilterException
 *
 */
function filter_var_array(array $array, $options = FILTER_DEFAULT, bool $add_empty = true): ?array
{
    error_clear_last();
    $safeResult = \filter_var_array($array, $options, $add_empty);
    if ($safeResult === false) {
        throw FilterException::createFromPhpError();
    }
    return $safeResult;
}
