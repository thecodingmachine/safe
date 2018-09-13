<?php
/**
 * This file contains all the functions that could not be dealt with automatically using the code generator.
 * If you add a function in this list, do not forget to add it in the generator/config/specialCasesFunctions.php
 *
 */

namespace Safe;

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
