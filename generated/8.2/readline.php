<?php

namespace Safe;

use Safe\Exceptions\ReadlineException;

/**
 * This function adds a line to the command line history.
 *
 * @param string $prompt The line to be added in the history.
 * @throws ReadlineException
 *
 */
function readline_add_history(string $prompt): void
{
    error_clear_last();
    $safeResult = \readline_add_history($prompt);
    if ($safeResult === false) {
        throw ReadlineException::createFromPhpError();
    }
}


/**
 * Sets up a readline callback interface then prints
 * prompt and immediately returns.
 * Calling this function twice without removing the previous
 * callback interface will automatically and conveniently overwrite the old
 * interface.
 *
 * The callback feature is useful when combined with
 * stream_select as it allows interleaving of IO and
 * user input, unlike readline.
 *
 * @param string $prompt The prompt message.
 * @param callable $callback The callback function takes one parameter; the
 * user input returned.
 * @throws ReadlineException
 *
 */
function readline_callback_handler_install(string $prompt, callable $callback): void
{
    error_clear_last();
    $safeResult = \readline_callback_handler_install($prompt, $callback);
    if ($safeResult === false) {
        throw ReadlineException::createFromPhpError();
    }
}


/**
 * This function clears the entire command line history.
 *
 * @throws ReadlineException
 *
 */
function readline_clear_history(): void
{
    error_clear_last();
    $safeResult = \readline_clear_history();
    if ($safeResult === false) {
        throw ReadlineException::createFromPhpError();
    }
}


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
 * @param null|string $filename Path to the filename containing the command history.
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
 * @param null|string $filename Path to the saved file.
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
