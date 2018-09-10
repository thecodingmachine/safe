<?php

namespace Safe;

use Safe\Exceptions\ApacheException;

/**
 * Fetch the Apache version.
 *
 * @return string Returns the Apache version on success .
 * @throws ApacheException
 *
 */
function apache_get_version(): string
{
    error_clear_last();
    $result = \apache_get_version();
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * apache_reset_timeout resets the Apache write timer,
 * which defaults to 300 seconds. With set_time_limit(0);
 * ignore_user_abort(true) and periodic
 * apache_reset_timeout calls, Apache can theoretically
 * run forever.
 *
 * This function requires Apache 1.
 *
 * @throws ApacheException
 *
 */
function apache_reset_timeout(): void
{
    error_clear_last();
    $result = \apache_reset_timeout();
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
}


/**
 * Fetch all HTTP response headers.
 *
 * @return array An array of all Apache response headers on success .
 * @throws ApacheException
 *
 */
function apache_response_headers(): array
{
    error_clear_last();
    $result = \apache_response_headers();
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
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
    $result = \apache_setenv($variable, $value, $walk_to_top);
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
}
