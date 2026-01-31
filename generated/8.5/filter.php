<?php

namespace Safe;

use Safe\Exceptions\FilterException;

/**
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
 * @param array $array
 * @param mixed $options
 * @param bool $add_empty
 * @return array|null
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
