<?php

namespace Safe;

use Safe\Exceptions\UrlException;

/**
 * @param string $string
 * @param bool $strict
 * @return string
 * @throws UrlException
 *
 */
function base64_decode(string $string, bool $strict = false): string
{
    error_clear_last();
    $safeResult = \base64_decode($string, $strict);
    if ($safeResult === false) {
        throw UrlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $url
 * @param bool $associative
 * @param null|resource $context
 * @return array
 * @throws UrlException
 *
 */
function get_headers(string $url, bool $associative = false, $context = null): array
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \get_headers($url, $associative, $context);
    } else {
        $safeResult = \get_headers($url, $associative);
    }
    if ($safeResult === false) {
        throw UrlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param bool $use_include_path
 * @return array
 * @throws UrlException
 *
 */
function get_meta_tags(string $filename, bool $use_include_path = false): array
{
    error_clear_last();
    $safeResult = \get_meta_tags($filename, $use_include_path);
    if ($safeResult === false) {
        throw UrlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $url
 * @param int $component
 * @return array|int|null|string
 * @throws UrlException
 *
 */
function parse_url(string $url, int $component = -1)
{
    error_clear_last();
    $safeResult = \parse_url($url, $component);
    if ($safeResult === false) {
        throw UrlException::createFromPhpError();
    }
    return $safeResult;
}
