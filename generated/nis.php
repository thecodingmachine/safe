<?php

namespace Safe;

/**
 * Gets the first key-value pair from the named map
 * in the named domain.
 * 
 * @param string $domain The NIS domain name.
 * @param string $map The NIS map.
 * @return array Returns the first key-value pair as an array on success, s.
 * @throws Exceptions\NisException
 * 
 */
function yp_first(string $domain, string $map): array
{
    error_clear_last();
    $result = \yp_first($domain, $map);
    if ($result === FALSE) {
        throw Exceptions\NisException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the value associated with the passed key
 * out of the specified map.
 * 
 * @param string $domain The NIS domain name.
 * @param string $map The NIS map.
 * @param string $key This key must be exact.
 * @return string Returns the value, s.
 * @throws Exceptions\NisException
 * 
 */
function yp_match(string $domain, string $map, string $key): string
{
    error_clear_last();
    $result = \yp_match($domain, $map, $key);
    if ($result === FALSE) {
        throw Exceptions\NisException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the next key-value pair in the named map
 * after the specified key.
 * 
 * @param string $domain 
 * @param string $map 
 * @param string $key 
 * @return array Returns the next key-value pair as an array, s.
 * @throws Exceptions\NisException
 * 
 */
function yp_next(string $domain, string $map, string $key): array
{
    error_clear_last();
    $result = \yp_next($domain, $map, $key);
    if ($result === FALSE) {
        throw Exceptions\NisException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the order number for a map.
 * 
 * @param string $domain 
 * @param string $map 
 * @return int Returns the order number for a map .
 * @throws Exceptions\NisException
 * 
 */
function yp_order(string $domain, string $map): int
{
    error_clear_last();
    $result = \yp_order($domain, $map);
    if ($result === FALSE) {
        throw Exceptions\NisException::createFromPhpError();
    }
    return $result;
}


