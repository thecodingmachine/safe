<?php

namespace Safe;

use Safe\Exceptions\MiscException;

/**
 * Defines a named constant at runtime.
 *
 * @param string $name The name of the constant.
 *
 * It is possible to define constants with reserved or
 * even invalid names, whose value can (only) be retrieved with
 * constant. However, doing so is not recommended.
 * @param mixed $value The value of the constant. In PHP 5, value must
 * be a scalar value (integer,
 * float, string, boolean, or
 * NULL). In PHP 7, array values are also accepted.
 *
 * While it is possible to define resource constants, it is
 * not recommended and may cause unpredictable behavior.
 * @param bool $case_insensitive If set to TRUE, the constant will be defined case-insensitive.
 * The default behavior is case-sensitive; i.e.
 * CONSTANT and Constant represent
 * different values.
 *
 * Case-insensitive constants are stored as lower-case.
 * @throws MiscException
 *
 */
function define(string $name, $value, bool $case_insensitive = false): void
{
    error_clear_last();
    $result = \define($name, $value, $case_insensitive);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 * Prints out or returns a syntax highlighted version of the code contained
 * in filename using the colors defined in the
 * built-in syntax highlighter for PHP.
 *
 * Many servers are configured to automatically highlight files
 * with a phps extension. For example,
 * example.phps when viewed will show the
 * syntax highlighted source of the file. To enable this, add this
 * line to the httpd.conf:
 *
 * @param string $filename Path to the PHP file to be highlighted.
 * @param bool $return Set this parameter to TRUE to make this function return the
 * highlighted code.
 * @return string|bool If return is set to TRUE, returns the highlighted
 * code as a string instead of printing it out. Otherwise, it will return
 * TRUE on success, FALSE on failure.
 * @throws MiscException
 *
 */
function highlight_file(string $filename, bool $return = false)
{
    error_clear_last();
    $result = \highlight_file($filename, $return);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $str The PHP code to be highlighted. This should include the opening tag.
 * @param bool $return Set this parameter to TRUE to make this function return the
 * highlighted code.
 * @return string|bool If return is set to TRUE, returns the highlighted
 * code as a string instead of printing it out. Otherwise, it will return
 * TRUE on success, FALSE on failure.
 * @throws MiscException
 *
 */
function highlight_string(string $str, bool $return = false)
{
    error_clear_last();
    $result = \highlight_string($str, $return);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
    return $result;
}


/**
 * Convert string from one codepage to another.
 *
 * @param int|string $in_codepage The codepage of the subject string.
 * Either the codepage name or identifier.
 * @param int|string $out_codepage The codepage to convert the subject string to.
 * Either the codepage name or identifier.
 * @param string $subject The string to convert.
 * @return string The subject string converted to
 * out_codepage.
 * @throws MiscException
 *
 */
function sapi_windows_cp_conv($in_codepage, $out_codepage, string $subject): string
{
    error_clear_last();
    $result = \sapi_windows_cp_conv($in_codepage, $out_codepage, $subject);
    if ($result === null) {
        throw MiscException::createFromPhpError();
    }
    return $result;
}


/**
 * Set the codepage of the current process.
 *
 * @param int $cp A codepage identifier.
 * @throws MiscException
 *
 */
function sapi_windows_cp_set(int $cp): void
{
    error_clear_last();
    $result = \sapi_windows_cp_set($cp);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 * Sends a CTRL event to another process in the same process group.
 *
 * @param int $event The CTRL even to send;
 * either PHP_WINDOWS_EVENT_CTRL_C
 * or PHP_WINDOWS_EVENT_CTRL_BREAK.
 * @param int $pid The ID of the process to which to send the event to. If 0
 * is given, the event is sent to all processes of the process group.
 * @throws MiscException
 *
 */
function sapi_windows_generate_ctrl_event(int $event, int $pid = 0): void
{
    error_clear_last();
    $result = \sapi_windows_generate_ctrl_event($event, $pid);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 * If enable is omitted, the function returns TRUE if the stream stream has VT100 control codes enabled, FALSE otherwise.
 *
 * If enable is specified, the function will try to enable or disable the VT100 features of the stream stream.
 * If the feature has been successfully enabled (or disabled).
 *
 * At startup, PHP tries to enable the VT100 feature of the STDOUT/STDERR streams. By the way, if those streams are redirected to a file, the VT100 features may not be enabled.
 *
 * If VT100 support is enabled, it is possible to use control sequences as they are known from the VT100 terminal.
 * They allow the modification of the terminal's output. On Windows these sequences are called Console Virtual Terminal Sequences.
 *
 * @param resource $stream The stream on which the function will operate.
 * @param bool $enable If specified, the VT100 feature will be enabled (if TRUE) or disabled (if FALSE).
 * @throws MiscException
 *
 */
function sapi_windows_vt100_support($stream, bool $enable = null): void
{
    error_clear_last();
    if ($enable !== null) {
        $result = \sapi_windows_vt100_support($stream, $enable);
    } else {
        $result = \sapi_windows_vt100_support($stream);
    }
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 *
 *
 * @param int $seconds Halt time in seconds.
 * @return int Returns zero on success.
 *
 * If the call was interrupted by a signal, sleep returns
 * a non-zero value. On Windows, this value will always be
 * 192 (the value of the
 * WAIT_IO_COMPLETION constant within the Windows API).
 * On other platforms, the return value will be the number of seconds left to
 * sleep.
 * @throws MiscException
 *
 */
function sleep(int $seconds): int
{
    error_clear_last();
    $result = \sleep($seconds);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
    return $result;
}


/**
 * Delays program execution for the given number of
 * seconds and nanoseconds.
 *
 * @param int $seconds Must be a non-negative integer.
 * @param int $nanoseconds Must be a non-negative integer less than 1 billion.
 * @return array{0:int,1:int}|bool Returns TRUE on success.
 *
 * If the delay was interrupted by a signal, an associative array will be
 * returned with the components:
 *
 *
 *
 * seconds - number of seconds remaining in
 * the delay
 *
 *
 *
 *
 * nanoseconds - number of nanoseconds
 * remaining in the delay
 *
 *
 *
 * @throws MiscException
 *
 */
function time_nanosleep(int $seconds, int $nanoseconds)
{
    error_clear_last();
    $result = \time_nanosleep($seconds, $nanoseconds);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
    return $result;
}


/**
 * Makes the script sleep until the specified
 * timestamp.
 *
 * @param float $timestamp The timestamp when the script should wake.
 * @throws MiscException
 *
 */
function time_sleep_until(float $timestamp): void
{
    error_clear_last();
    $result = \time_sleep_until($timestamp);
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
}
