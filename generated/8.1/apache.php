<?php

namespace Safe;

use Safe\Exceptions\ApacheException;

/**
 * @return string
 * @throws ApacheException
 *
 */
function apache_get_version(): string
{
    error_clear_last();
    $safeResult = \apache_get_version();
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $variable
 * @param bool $walk_to_top
 * @return string
 * @throws ApacheException
 *
 */
function apache_getenv(string $variable, bool $walk_to_top = false): string
{
    error_clear_last();
    $safeResult = \apache_getenv($variable, $walk_to_top);
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return object
 * @throws ApacheException
 *
 */
function apache_lookup_uri(string $filename): object
{
    error_clear_last();
    $safeResult = \apache_lookup_uri($filename);
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return array
 * @throws ApacheException
 *
 */
function apache_request_headers(): array
{
    error_clear_last();
    $safeResult = \apache_request_headers();
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return array
 * @throws ApacheException
 *
 */
function apache_response_headers(): array
{
    error_clear_last();
    $safeResult = \apache_response_headers();
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $variable
 * @param string $value
 * @param bool $walk_to_top
 * @throws ApacheException
 *
 */
function apache_setenv(string $variable, string $value, bool $walk_to_top = false): void
{
    error_clear_last();
    $safeResult = \apache_setenv($variable, $value, $walk_to_top);
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
}


/**
 * @return array
 * @throws ApacheException
 *
 */
function getallheaders(): array
{
    error_clear_last();
    $safeResult = \getallheaders();
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $uri
 * @throws ApacheException
 *
 */
function virtual(string $uri): void
{
    error_clear_last();
    $safeResult = \virtual($uri);
    if ($safeResult === false) {
        throw ApacheException::createFromPhpError();
    }
}
