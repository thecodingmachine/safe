<?php

namespace Safe;

use Safe\Exceptions\FilterException;

/**
 * This function is useful for retrieving many values without
 * repetitively calling filter_input.
 *
 * @param int $type One of the INPUT_* constants.
 *
 * The content of the superglobal that is being filtered is the original
 * "raw" content provided by the SAPI,
 * prior to any user modification to the superglobal.
 * To filter a modified superglobal use
 * filter_var_array instead.
 * @param array|int $options
 * @param bool $add_empty
 * @return array|null On success, an array containing the values of the requested variables.
 *
 * On failure, FALSE is returned.
 * Except if the failure is that the input array designated by
 * type is not populated where NULL is returned
 * if the FILTER_NULL_ON_FAILURE flag is used.
 *
 * Missing entries from the input array will be populated into the returned
 * array if add_empty is TRUE.
 * In which case, missing entries will be set to NULL,
 * unless the FILTER_NULL_ON_FAILURE flag is used,
 * in which case it will be FALSE.
 *
 * An entry of the returned array will be FALSE if the filter fails,
 * unless the FILTER_NULL_ON_FAILURE flag is used,
 * in which case it will be NULL.
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
 * Filter an associative array of values using
 * FILTER_VALIDATE_*
 * validation filters,
 * FILTER_SANITIZE_*
 * sanitization filters, or custom filters.
 *
 * @param array $array An associative array containing the data to filter.
 * @param mixed $options Either an associative array of options,
 * or the filter to apply to each entry,
 * which can either be a validation filter by using one of the
 * FILTER_VALIDATE_*
 * constants, or a sanitization filter by using one of the
 * FILTER_SANITIZE_*
 * constants.
 *
 * The option array is an associative array where the key corresponds
 * to a key in the data array and the associated
 * value is either the filter to apply to this entry,
 * or an associative array describing how and which filter should be
 * applied to this entry.
 *
 * The associative array describing how a filter should be applied
 * must contain the 'filter' key whose associated
 * value is the filter to apply, which can be one of the
 * FILTER_VALIDATE_*,
 * FILTER_SANITIZE_*,
 * FILTER_UNSAFE_RAW, or
 * FILTER_CALLBACK constants.
 * It can optionally contain the 'flags' key
 * which specifies and flags that apply to the filter,
 * and the 'options' key which specifies any options
 * that apply to the filter.
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
