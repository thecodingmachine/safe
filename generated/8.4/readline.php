<?php

namespace Safe;

use Safe\Exceptions\ReadlineException;

/**
 * This function registers a completion function. This is the same kind of
 * functionality you'd get if you hit your tab key while using Bash.
 *
 * @param callable $callback You must supply the name of an existing function which accepts a
 * partial command line and returns an array of possible matches.
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
 * This function reads a command history from a file.
 *
 * @param string $filename Path to the filename containing the command history.
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
 * This function writes the command history to a file.
 *
 * @param string $filename Path to the saved file.
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

function readline_add_history()
{
    return \readline_add_history(...func_get_args());
}

function readline_callback_handler_install()
{
    return \readline_callback_handler_install(...func_get_args());
}

function readline_clear_history()
{
    return \readline_clear_history(...func_get_args());
}
