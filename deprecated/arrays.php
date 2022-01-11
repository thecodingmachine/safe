<?php

namespace Safe;

use Safe\Exceptions\ArrayException;

/**
 * array_flip returns an array in flip
 * order, i.e. keys from array become values and values
 * from array become keys.
 *
 * Note that the values of array need to be valid
 * keys, i.e. they need to be either integer or
 * string. A warning will be emitted if a value has the wrong
 * type, and the key/value pair in question will not be included
 * in the result.
 *
 * If a value has several occurrences, the latest key will be
 * used as its value, and all others will be lost.
 *
 * @param array $array An array of key/value pairs to be flipped.
 * @return array Returns the flipped array on success.
 * @throws ArrayException
 *
 */
function array_flip(array $array): array
{
    return \array_flip($array);
}
