<?php

namespace Safe;

use Safe\Exceptions\UrlException;

/**
 * Decodes a base64 encoded data.
 * 
 * @param string $data The encoded data.
 * @param bool $strict If the strict parameter is set to TRUE
 * then the base64_decode function will return
 * FALSE if the input contains character from outside the base64
 * alphabet. Otherwise invalid characters will be silently discarded.
 * @return string Returns the decoded data . The returned data may be
 * binary.
 * @throws UrlException
 * 
 */
function base64_decode(string $data, bool $strict = false): string
{
    error_clear_last();
    $result = \base64_decode($data, $strict);
    if ($result === FALSE) {
        throw UrlException::createFromPhpError();
    }
    return $result;
}


/**
 * Encodes the given data with base64.
 * 
 * This encoding is designed to make binary data survive transport through
 * transport layers that are not 8-bit clean, such as mail bodies.
 * 
 * Base64-encoded data takes about 33% more space than the original
 * data.
 * 
 * @param string $data The data to encode.
 * @return string The encoded data, as a string .
 * @throws UrlException
 * 
 */
function base64_encode(string $data): string
{
    error_clear_last();
    $result = \base64_encode($data);
    if ($result === FALSE) {
        throw UrlException::createFromPhpError();
    }
    return $result;
}


