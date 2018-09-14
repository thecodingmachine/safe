<?php
/**
 * This file contains all the functions that could not be dealt with automatically using the code generator.
 * If you add a function in this list, do not forget to add it in the generator/config/specialCasesFunctions.php
 *
 */

namespace Safe;

use Safe\Exceptions\ApcException;
use Safe\Exceptions\ApcuException;
use Safe\Exceptions\JsonException;

/**
 * Wrapper for json_decode that throws when an error occurs.
 *
 * @param string $json    JSON data to parse
 * @param bool $assoc     When true, returned objects will be converted
 *                        into associative arrays.
 * @param int $depth   User specified recursion depth.
 * @param int $options Bitmask of JSON decode options.
 *
 * @return mixed
 * @throws JsonException if the JSON cannot be decoded.
 * @link http://www.php.net/manual/en/function.json-decode.php
 */
function json_decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0)
{
    $data = \json_decode($json, $assoc, $depth, $options);
    if (JSON_ERROR_NONE !== json_last_error()) {
        throw JsonException::createFromPhpError();
    }
    return $data;
}


/**
 * Fetchs a stored variable from the cache.
 *
 * @param mixed $key The key used to store the value (with
 * apc_store). If an array is passed then each
 * element is fetched and returned.
 * @return mixed The stored variable or array of variables on success; FALSE on failure
 * @throws ApcException
 *
 */
function apc_fetch($key)
{
    error_clear_last();
    $result = \apc_fetch($key, $success);
    if ($success === false) {
        throw ApcException::createFromPhpError();
    }
    return $result;
}

/**
 * Fetchs an entry from the cache.
 *
 * @param string|string[] $key The key used to store the value (with
 * apcu_store). If an array is passed then each
 * element is fetched and returned.
 * @return mixed The stored variable or array of variables on success; FALSE on failure
 * @throws ApcuException
 *
 */
function apcu_fetch($key)
{
    error_clear_last();
    $result = \apcu_fetch($key, $success);
    if ($success === false) {
        throw ApcuException::createFromPhpError();
    }
    return $result;
}
