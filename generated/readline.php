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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \readline_add_history($prompt);
    restore_error_handler();

    if ($result === false) {
        throw ReadlineException::createFromPhpError($error);
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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \readline_callback_handler_install($prompt, $callback);
    restore_error_handler();

    if ($result === false) {
        throw ReadlineException::createFromPhpError($error);
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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \readline_clear_history();
    restore_error_handler();

    if ($result === false) {
        throw ReadlineException::createFromPhpError($error);
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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \readline_completion_function($callback);
    restore_error_handler();

    if ($result === false) {
        throw ReadlineException::createFromPhpError($error);
    }
}


/**
 * This function reads a command history from a file.
 *
 * @param string $filename Path to the filename containing the command history.
 * @throws ReadlineException
 *
 */
function readline_read_history(string $filename = null): void
{
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    if ($filename !== null) {
        $result = \readline_read_history($filename);
    } else {
        $result = \readline_read_history();
    }
    restore_error_handler();

    if ($result === false) {
        throw ReadlineException::createFromPhpError($error);
    }
}


/**
 * This function writes the command history to a file.
 *
 * @param string $filename Path to the saved file.
 * @throws ReadlineException
 *
 */
function readline_write_history(string $filename = null): void
{
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    if ($filename !== null) {
        $result = \readline_write_history($filename);
    } else {
        $result = \readline_write_history();
    }
    restore_error_handler();

    if ($result === false) {
        throw ReadlineException::createFromPhpError($error);
    }
}
