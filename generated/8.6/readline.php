<?php

namespace Safe;

use Safe\Exceptions\ReadlineException;

/**
 * @param string $prompt
 * @return bool
 *
 */
function readline_add_history(string $prompt): bool
{
    error_clear_last();
    $safeResult = \readline_add_history($prompt);
    return $safeResult;
}


/**
 * @param string $prompt
 * @param callable $callback
 * @return bool
 *
 */
function readline_callback_handler_install(string $prompt, callable $callback): bool
{
    error_clear_last();
    $safeResult = \readline_callback_handler_install($prompt, $callback);
    return $safeResult;
}


/**
 * @return bool
 *
 */
function readline_clear_history(): bool
{
    error_clear_last();
    $safeResult = \readline_clear_history();
    return $safeResult;
}


/**
 * @param callable $callback
 * @throws ReadlineException
 *
 */
function readline_completion_function(callable $callback): void
{
    error_clear_last();
    $safeResult = \readline_completion_function($callback);
    if ($safeResult === false) {
        throw ReadlineException::createFromPhpError();
    }
}


/**
 * @param null|string $filename
 * @throws ReadlineException
 *
 */
function readline_read_history(?string $filename = null): void
{
    error_clear_last();
    if ($filename !== null) {
        $safeResult = \readline_read_history($filename);
    } else {
        $safeResult = \readline_read_history();
    }
    if ($safeResult === false) {
        throw ReadlineException::createFromPhpError();
    }
}


/**
 * @param null|string $filename
 * @throws ReadlineException
 *
 */
function readline_write_history(?string $filename = null): void
{
    error_clear_last();
    if ($filename !== null) {
        $safeResult = \readline_write_history($filename);
    } else {
        $safeResult = \readline_write_history();
    }
    if ($safeResult === false) {
        throw ReadlineException::createFromPhpError();
    }
}
