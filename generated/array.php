<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

/**
 * Creates an array by using the values from the
 * keys array as keys and the values from the
 * values array as the corresponding values.
 *
 * @param array $keys Array of keys to be used. Illegal values for key will be
 * converted to string.
 * @param array $values Array of values to be used
 * @return array Returns the combined array, FALSE if the number of elements
 * for each array isn't equal.
 * @throws ArrayException
 *
 */
function array_combine(array $keys, array $values): array
{
    error_clear_last();
    $result = \array_combine($keys, $values);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
    return $result;
}


/**
 * array_multisort can be used to sort several
 * arrays at once, or a multi-dimensional array by one or more
 * dimensions.
 *
 * Associative (string) keys will be maintained, but numeric
 * keys will be re-indexed.
 *
 * @param array $array1 An array being sorted.
 * @param array|int $array1_sort_order The order used to sort the previous array argument. Either
 * SORT_ASC to sort ascendingly or SORT_DESC
 * to sort descendingly.
 *
 * This argument can be swapped with array1_sort_flags
 * or omitted entirely, in which case SORT_ASC is assumed.
 * @param array|int $array1_sort_flags Sort options for the previous array argument:
 *
 * Sorting type flags:
 *
 *
 * SORT_REGULAR - compare items normally
 * (don't change types)
 *
 *
 * SORT_NUMERIC - compare items numerically
 *
 *
 * SORT_STRING - compare items as strings
 *
 *
 *
 * SORT_LOCALE_STRING - compare items as
 * strings, based on the current locale. It uses the locale,
 * which can be changed using setlocale
 *
 *
 *
 *
 * SORT_NATURAL - compare items as strings
 * using "natural ordering" like natsort
 *
 *
 *
 *
 * SORT_FLAG_CASE - can be combined
 * (bitwise OR) with
 * SORT_STRING or
 * SORT_NATURAL to sort strings case-insensitively
 *
 *
 *
 *
 * This argument can be swapped with array1_sort_order
 * or omitted entirely, in which case SORT_REGULAR is assumed.
 * @param mixed $params More arrays, optionally followed by sort order and flags. Only elements
 * corresponding to equivalent elements in previous arrays are compared.
 * In other words, the sort is lexicographical.
 * @throws ArrayException
 *
 */
function array_multisort(array &$array1, $array1_sort_order = SORT_ASC, $array1_sort_flags = SORT_REGULAR, ...$params): void
{
    error_clear_last();
    if ($params !== []) {
        $result = \array_multisort($array1, $array1_sort_order, $array1_sort_flags, ...$params);
    } else {
        $result = \array_multisort($array1, $array1_sort_order, $array1_sort_flags);
    }
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * Applies the user-defined callback function to each
 * element of the array. This function will recurse
 * into deeper arrays.
 *
 * @param array $array The input array.
 * @param callable $callback Typically, callback takes on two parameters.
 * The array parameter's value being the first, and
 * the key/index second.
 *
 * If callback needs to be working with the
 * actual values of the array, specify the first parameter of
 * callback as a
 * reference. Then,
 * any changes made to those elements will be made in the
 * original array itself.
 * @param mixed $userdata If the optional userdata parameter is supplied,
 * it will be passed as the third parameter to the
 * callback.
 * @throws ArrayException
 *
 */
function array_walk_recursive(array &$array, callable $callback, $userdata = null): void
{
    error_clear_last();
    $result = \array_walk_recursive($array, $callback, $userdata);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function sorts an array such that array indices maintain their
 * correlation with the array elements they are associated with.
 *
 * This is used mainly when sorting associative arrays where the actual
 * element order is significant.
 *
 * @param array $array The input array.
 * @param int $sort_flags You may modify the behavior of the sort using the optional parameter
 * sort_flags, for details see
 * sort.
 * @throws ArrayException
 *
 */
function arsort(array &$array, int $sort_flags = SORT_REGULAR): void
{
    error_clear_last();
    $result = \arsort($array, $sort_flags);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function sorts an array such that array indices maintain
 * their correlation with the array elements they are associated
 * with.  This is used mainly when sorting associative arrays where
 * the actual element order is significant.
 *
 * @param array $array The input array.
 * @param int $sort_flags You may modify the behavior of the sort using the optional
 * parameter sort_flags, for details
 * see sort.
 * @throws ArrayException
 *
 */
function asort(array &$array, int $sort_flags = SORT_REGULAR): void
{
    error_clear_last();
    $result = \asort($array, $sort_flags);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * Sorts an array by key in reverse order, maintaining key to data
 * correlations. This is useful mainly for associative arrays.
 *
 * @param array $array The input array.
 * @param int $sort_flags You may modify the behavior of the sort using the optional parameter
 * sort_flags, for details see
 * sort.
 * @throws ArrayException
 *
 */
function krsort(array &$array, int $sort_flags = SORT_REGULAR): void
{
    error_clear_last();
    $result = \krsort($array, $sort_flags);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * Sorts an array by key, maintaining key to data correlations. This is
 * useful mainly for associative arrays.
 *
 * @param array $array The input array.
 * @param int $sort_flags You may modify the behavior of the sort using the optional
 * parameter sort_flags, for details
 * see sort.
 * @throws ArrayException
 *
 */
function ksort(array &$array, int $sort_flags = SORT_REGULAR): void
{
    error_clear_last();
    $result = \ksort($array, $sort_flags);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * natcasesort is a case insensitive version of
 * natsort.
 *
 * This function implements a sort algorithm that orders
 * alphanumeric strings in the way a human being would while maintaining
 * key/value associations.  This is described as a "natural ordering".
 *
 * @param array $array The input array.
 * @throws ArrayException
 *
 */
function natcasesort(array &$array): void
{
    error_clear_last();
    $result = \natcasesort($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function implements a sort algorithm that orders alphanumeric strings
 * in the way a human being would while maintaining key/value associations.
 * This is described as a "natural ordering".  An example of the difference
 * between this algorithm and the regular computer string sorting algorithms
 * (used in sort) can be seen in the example below.
 *
 * @param array $array The input array.
 * @throws ArrayException
 *
 */
function natsort(array &$array): void
{
    error_clear_last();
    $result = \natsort($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function sorts an array in reverse order (highest to lowest).
 *
 * @param array $array The input array.
 * @param int $sort_flags You may modify the behavior of the sort using the optional
 * parameter sort_flags, for details see
 * sort.
 * @throws ArrayException
 *
 */
function rsort(array &$array, int $sort_flags = SORT_REGULAR): void
{
    error_clear_last();
    $result = \rsort($array, $sort_flags);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function shuffles (randomizes the order of the elements in) an array.
 * It uses a pseudo random number generator that is not suitable for
 * cryptographic purposes.
 *
 * @param array $array The array.
 * @throws ArrayException
 *
 */
function shuffle(array &$array): void
{
    error_clear_last();
    $result = \shuffle($array);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function sorts an array.  Elements will be arranged from
 * lowest to highest when this function has completed.
 *
 * @param array $array The input array.
 * @param int $sort_flags The optional second parameter sort_flags
 * may be used to modify the sorting behavior using these values:
 *
 * Sorting type flags:
 *
 *
 * SORT_REGULAR - compare items normally
 * (don't change types)
 *
 *
 * SORT_NUMERIC - compare items numerically
 *
 *
 * SORT_STRING - compare items as strings
 *
 *
 *
 * SORT_LOCALE_STRING - compare items as
 * strings, based on the current locale. It uses the locale,
 * which can be changed using setlocale
 *
 *
 *
 *
 * SORT_NATURAL - compare items as strings
 * using "natural ordering" like natsort
 *
 *
 *
 *
 * SORT_FLAG_CASE - can be combined
 * (bitwise OR) with
 * SORT_STRING or
 * SORT_NATURAL to sort strings case-insensitively
 *
 *
 *
 * @throws ArrayException
 *
 */
function sort(array &$array, int $sort_flags = SORT_REGULAR): void
{
    error_clear_last();
    $result = \sort($array, $sort_flags);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function sorts an array such that array indices maintain their
 * correlation with the array elements they are associated with, using a
 * user-defined comparison function.
 *
 * This is used mainly when sorting associative arrays where the actual
 * element order is significant.
 *
 * @param array $array The input array.
 * @param callable $value_compare_func See usort and uksort for
 * examples of user-defined comparison functions.
 * @throws ArrayException
 *
 */
function uasort(array &$array, callable $value_compare_func): void
{
    error_clear_last();
    $result = \uasort($array, $value_compare_func);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * uksort will sort the keys of an array using a
 * user-supplied comparison function.  If the array you wish to sort
 * needs to be sorted by some non-trivial criteria, you should use
 * this function.
 *
 * @param array $array The input array.
 * @param callable $key_compare_func The comparison function must return an integer less than, equal to, or greater than zero if the first argument is considered to be respectively less than, equal to, or greater than the second.
 * Note that before PHP 7.0.0 this integer had to be in the range from -2147483648 to 2147483647.
 * @throws ArrayException
 *
 */
function uksort(array &$array, callable $key_compare_func): void
{
    error_clear_last();
    $result = \uksort($array, $key_compare_func);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}


/**
 * This function will sort an array by its values using a user-supplied
 * comparison function.  If the array you wish to sort needs to be sorted by
 * some non-trivial criteria, you should use this function.
 *
 * @param array $array The input array.
 * @param callable $value_compare_func The comparison function must return an integer less than, equal to, or greater than zero if the first argument is considered to be respectively less than, equal to, or greater than the second.
 * Note that before PHP 7.0.0 this integer had to be in the range from -2147483648 to 2147483647.
 *
 * Returning non-integer values from the comparison
 * function, such as float, will result in an internal cast to
 * integer of the callback's return value. So values such as
 * 0.99 and 0.1 will both be cast to an integer value of 0, which will
 * compare such values as equal.
 * @throws ArrayException
 *
 */
function usort(array &$array, callable $value_compare_func): void
{
    error_clear_last();
    $result = \usort($array, $value_compare_func);
    if ($result === false) {
        throw ArrayException::createFromPhpError();
    }
}
