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
    if ($result === false) {
        throw UrlException::createFromPhpError();
    }
    return $result;
}


/**
 * get_headers returns an array with the headers sent
 * by the server in response to a HTTP request.
 *
 * @param string $url The target URL.
 * @param int $format If the optional format parameter is set to non-zero,
 * get_headers parses the response and sets the
 * array's keys.
 * @param resource $context A valid context resource created with
 * stream_context_create.
 * @return array Returns an indexed or associative array with the headers, .
 * @throws UrlException
 *
 */
function get_headers(string $url, int $format = 0, $context = null): array
{
    error_clear_last();
    if ($context !== null) {
        $result = \get_headers($url, $format, $context);
    } else {
        $result = \get_headers($url, $format);
    }
    if ($result === false) {
        throw UrlException::createFromPhpError();
    }
    return $result;
}
