<?php

namespace Safe;

use Safe\Exceptions\ApacheException;

/**
 * Fetch the Apache version.
 *
 * @return string Returns the Apache version on success.
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
 * Retrieve an Apache environment variable specified by
 * variable.
 *
 * @param string $variable The Apache environment variable
 * @param bool $walk_to_top Whether to get the top-level variable available to all Apache layers.
 * @return string The value of the Apache environment variable on success
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
 * This performs a partial request for a URI.  It goes just far
 * enough to obtain all the important information about the given
 * resource.
 *
 * @param string $filename The filename (URI) that's being requested.
 * @return object An object of related URI information. The properties of
 * this object are:
 *
 *
 * status
 * the_request
 * status_line
 * method
 * content_type
 * handler
 * uri
 * filename
 * path_info
 * args
 * boundary
 * no_cache
 * no_local_copy
 * allowed
 * send_bodyct
 * bytes_sent
 * byterange
 * clength
 * unparsed_uri
 * mtime
 * request_time
 *
 *
 * Returns FALSE on failure.
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
 * Fetches all HTTP request headers from the current request. Works in the
 * Apache, FastCGI, CLI, and FPM webservers.
 *
 * @return array|false An associative array of all the HTTP headers in the current request.
 *
 */
function apache_request_headers()
{
    error_clear_last();
    $safeResult = \apache_request_headers();
    return $safeResult;
}


/**
 * Fetch all HTTP response headers.  Works in the
 * Apache, FastCGI, CLI, and FPM webservers.
 *
 * @return array|false An array of all Apache response headers on success.
 *
 */
function apache_response_headers()
{
    error_clear_last();
    $safeResult = \apache_response_headers();
    return $safeResult;
}


/**
 * apache_setenv sets the value of the Apache
 * environment variable specified by
 * variable.
 *
 * @param string $variable The environment variable that's being set.
 * @param string $value The new variable value.
 * @param bool $walk_to_top Whether to set the top-level variable available to all Apache layers.
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
 * Fetches all HTTP headers from the current request.
 *
 * This function is an alias for apache_request_headers.
 * Please read the apache_request_headers
 * documentation for more information on how this function works.
 *
 * @return array An associative array of all the HTTP headers in the current request.
 *
 */
function getallheaders(): array
{
    error_clear_last();
    $safeResult = \getallheaders();
    return $safeResult;
}


/**
 * virtual is an Apache-specific function which
 * is similar to &lt;!--#include virtual...--&gt; in
 * mod_include.
 * It performs an Apache sub-request.  It is useful for including
 * CGI scripts or .shtml files, or anything else that you would
 * parse through Apache. Note that for a CGI script, the script
 * must generate valid CGI headers.  At the minimum that means it
 * must generate a Content-Type header.
 *
 * To run the sub-request, all buffers are terminated and flushed to the
 * browser, pending headers are sent too.
 *
 * @param string $uri The file that the virtual command will be performed on.
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
