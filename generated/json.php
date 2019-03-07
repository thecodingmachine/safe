<?php

namespace Safe;

use Safe\Exceptions\JsonException;

/**
 * Returns a string containing the JSON representation of the supplied
 * value.
 *
 * The encoding is affected by the supplied options
 * and additionally the encoding of float values depends on the value of
 * serialize_precision.
 *
 * @param mixed $value The value being encoded. Can be any type except
 * a resource.
 *
 * All string data must be UTF-8 encoded.
 *
 * PHP implements a superset of JSON as specified in the original
 * RFC 7159.
 * @param int $options Bitmask consisting of JSON_HEX_QUOT,
 * JSON_HEX_TAG,
 * JSON_HEX_AMP,
 * JSON_HEX_APOS,
 * JSON_NUMERIC_CHECK,
 * JSON_PRETTY_PRINT,
 * JSON_UNESCAPED_SLASHES,
 * JSON_FORCE_OBJECT,
 * JSON_PRESERVE_ZERO_FRACTION,
 * JSON_UNESCAPED_UNICODE,
 * JSON_PARTIAL_OUTPUT_ON_ERROR,
 * JSON_UNESCAPED_LINE_TERMINATORS,
 * JSON_THROW_ON_ERROR. The behaviour of these
 * constants is described on the
 * JSON constants page.
 * @param int $depth Set the maximum depth. Must be greater than zero.
 * @return string Returns a JSON encoded string on success.
 * @throws JsonException
 *
 */
function json_encode($value, int $options = 0, int $depth = 512): string
{
    error_clear_last();
    $result = \json_encode($value, $options, $depth);
    if ($result === false) {
        throw JsonException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @return string Returns the error message on success, "No error" if no
 * error has occurred.
 * @throws JsonException
 *
 */
function json_last_error_msg(): string
{
    error_clear_last();
    $result = \json_last_error_msg();
    if ($result === false) {
        throw JsonException::createFromPhpError();
    }
    return $result;
}
