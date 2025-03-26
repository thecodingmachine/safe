<?php

namespace Safe;

use Safe\Exceptions\MiscException;

/**
 * Defines a named constant at runtime.
 *
 * @param string $constant_name The name of the constant.
 *
 * It is possible to define constants with reserved or
 * even invalid names, whose value can (only) be retrieved with
 * constant. However, doing so is not recommended.
 * @param mixed $value The value of the constant.
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
function define(string $constant_name, $value, bool $case_insensitive = false): void
{
    error_clear_last();
    $safeResult = \define($constant_name, $value, $case_insensitive);
    if ($safeResult === false) {
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
 * @return bool|string If return is set to TRUE, returns the highlighted
 * code as a string instead of printing it out. Otherwise, it will return
 * TRUE on success.
 * @throws MiscException
 *
 */
function highlight_file(string $filename, bool $return = false)
{
    error_clear_last();
    $safeResult = \highlight_file($filename, $return);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param string $string The PHP code to be highlighted. This should include the opening tag.
 * @param bool $return Set this parameter to TRUE to make this function return the
 * highlighted code.
 * @return bool|string If return is set to TRUE, returns the highlighted
 * code as a string instead of printing it out.
 * Otherwise, it will return TRUE.
 *
 */
function highlight_string(string $string, bool $return = false)
{
    error_clear_last();
    $safeResult = \highlight_string($string, $return);
    return $safeResult;
}


/**
 *
 *
 * @param bool $as_number Whether the high resolution time should be returned as array
 * or number.
 * @return array{0:int,1:int}|float|int Returns an array of integers in the form [seconds, nanoseconds], if the
 * parameter as_number is false. Otherwise the nanoseconds
 * are returned as int (64bit platforms) or float
 * (32bit platforms).
 * Returns FALSE on failure.
 * @throws MiscException
 *
 */
function hrtime(bool $as_number = false)
{
    error_clear_last();
    $safeResult = \hrtime($as_number);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Pack given arguments into a binary string according to
 * format.
 *
 * The idea for this function was taken from Perl and all formatting codes
 * work the same as in Perl. However, there are some formatting codes that are
 * missing such as Perl's "u" format code.
 *
 * Note that the distinction between signed and unsigned values only
 * affects the function unpack, where as
 * function pack gives the same result for
 * signed and unsigned format codes.
 *
 * @param string $format The format string consists of format codes
 * followed by an optional repeater argument. The repeater argument can
 * be either an integer value or * for repeating to
 * the end of the input data. For a, A, h, H the repeat count specifies
 * how many characters of one data argument are taken, for @ it is the
 * absolute position where to put the next data, for everything else the
 * repeat count specifies how many data arguments are consumed and packed
 * into the resulting binary string.
 *
 * Currently implemented formats are:
 *
 * pack format characters
 *
 *
 *
 * Code
 * Description
 *
 *
 *
 *
 * a
 * NUL-padded string
 *
 *
 * A
 * SPACE-padded string
 *
 * h
 * Hex string, low nibble first
 *
 * H
 * Hex string, high nibble first
 * csigned char
 *
 * C
 * unsigned char
 *
 * s
 * signed short (always 16 bit, machine byte order)
 *
 *
 * S
 * unsigned short (always 16 bit, machine byte order)
 *
 *
 * n
 * unsigned short (always 16 bit, big endian byte order)
 *
 *
 * v
 * unsigned short (always 16 bit, little endian byte order)
 *
 *
 * i
 * signed integer (machine dependent size and byte order)
 *
 *
 * I
 * unsigned integer (machine dependent size and byte order)
 *
 *
 * l
 * signed long (always 32 bit, machine byte order)
 *
 *
 * L
 * unsigned long (always 32 bit, machine byte order)
 *
 *
 * N
 * unsigned long (always 32 bit, big endian byte order)
 *
 *
 * V
 * unsigned long (always 32 bit, little endian byte order)
 *
 *
 * q
 * signed long long (always 64 bit, machine byte order)
 *
 *
 * Q
 * unsigned long long (always 64 bit, machine byte order)
 *
 *
 * J
 * unsigned long long (always 64 bit, big endian byte order)
 *
 *
 * P
 * unsigned long long (always 64 bit, little endian byte order)
 *
 *
 * f
 * float (machine dependent size and representation)
 *
 *
 * g
 * float (machine dependent size, little endian byte order)
 *
 *
 * G
 * float (machine dependent size, big endian byte order)
 *
 *
 * d
 * double (machine dependent size and representation)
 *
 *
 * e
 * double (machine dependent size, little endian byte order)
 *
 *
 * E
 * double (machine dependent size, big endian byte order)
 *
 *
 * x
 * NUL byte
 *
 *
 * X
 * Back up one byte
 *
 *
 * Z
 * NUL-padded string
 *
 *
 * @
 * NUL-fill to absolute position
 *
 *
 *
 *
 * @param mixed $values
 * @return string Returns a binary string containing data.
 *
 */
function pack(string $format, ...$values): string
{
    error_clear_last();
    if ($values !== []) {
        $safeResult = \pack($format, ...$values);
    } else {
        $safeResult = \pack($format);
    }
    return $safeResult;
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
    $safeResult = \sapi_windows_cp_conv($in_codepage, $out_codepage, $subject);
    if ($safeResult === null) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Set the codepage of the current process.
 *
 * @param int $codepage A codepage identifier.
 * @throws MiscException
 *
 */
function sapi_windows_cp_set(int $codepage): void
{
    error_clear_last();
    $safeResult = \sapi_windows_cp_set($codepage);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 * Sends a CTRL event to another process in the same process group.
 *
 * @param int $event The CTRL event to send;
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
    $safeResult = \sapi_windows_generate_ctrl_event($event, $pid);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 * Sets or removes a CTRL event handler, which allows Windows
 * CLI processes to intercept or ignore CTRL+C and
 * CTRL+BREAK events. Note that in multithreaded environments,
 * this is only possible when called from the main thread.
 *
 * @param callable|null $handler A callback function to set or remove. If set, this function will be called
 * whenever a
 *
 * CTRL
 * C
 *
 * or
 *
 * CTRL
 * BREAK
 *
 * event occurs.
 * The function is supposed to have the following signature:
 *
 * voidhandler
 * intevent
 *
 *
 *
 * event
 *
 *
 * The CTRL event which has been received;
 * either PHP_WINDOWS_EVENT_CTRL_C
 * or PHP_WINDOWS_EVENT_CTRL_BREAK.
 *
 *
 *
 *
 * Setting a NULL handler causes the process to ignore
 *
 * CTRL
 * C
 *
 * events, but not
 *
 * CTRL
 * BREAK
 *
 * events.
 * @param bool $add
 * @throws MiscException
 *
 */
function sapi_windows_set_ctrl_handler(?callable $handler, bool $add = true): void
{
    error_clear_last();
    $safeResult = \sapi_windows_set_ctrl_handler($handler, $add);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 * If enable is NULL, the function returns TRUE if the stream stream has VT100 control codes enabled.
 *
 * If enable is a bool, the function will try to enable or disable the VT100 features of the stream stream.
 * If the feature has been successfully enabled (or disabled).
 *
 * At startup, PHP tries to enable the VT100 feature of the STDOUT/STDERR streams. By the way, if those streams are redirected to a file, the VT100 features may not be enabled.
 *
 * If VT100 support is enabled, it is possible to use control sequences as they are known from the VT100 terminal.
 * They allow the modification of the terminal's output. On Windows these sequences are called Console Virtual Terminal Sequences.
 *
 * @param resource $stream The stream on which the function will operate.
 * @param bool|null $enable If bool, the VT100 feature will be enabled (if TRUE) or disabled (if FALSE).
 * @throws MiscException
 *
 */
function sapi_windows_vt100_support($stream, ?bool $enable = null): void
{
    error_clear_last();
    if ($enable !== null) {
        $safeResult = \sapi_windows_vt100_support($stream, $enable);
    } else {
        $safeResult = \sapi_windows_vt100_support($stream);
    }
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 *
 *
 * @param int $seconds Halt time in seconds (must be greater than or equal to 0).
 * @return false|int Returns zero on success.
 *
 * If the call was interrupted by a signal, sleep returns
 * a non-zero value. On Windows, this value will always be
 * 192 (the value of the
 * WAIT_IO_COMPLETION constant within the Windows API).
 * On other platforms, the return value will be the number of seconds left to
 * sleep.
 *
 */
function sleep(int $seconds)
{
    error_clear_last();
    $safeResult = \sleep($seconds);
    return $safeResult;
}


/**
 * Delays program execution for the given number of
 * seconds and nanoseconds.
 *
 * @param int $seconds Must be a non-negative integer.
 * @param int $nanoseconds Must be a non-negative integer less than 1 billion.
 * @return array{seconds:0|positive-int,nanoseconds:0|positive-int}|bool Returns TRUE on success.
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
    $safeResult = \time_nanosleep($seconds, $nanoseconds);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
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
    $safeResult = \time_sleep_until($timestamp);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
}


/**
 * Unpacks from a binary string into an array according to the given
 * format.
 *
 * The unpacked data is stored in an associative array. To
 * accomplish this you have to name the different format codes and
 * separate them by a slash /. If a repeater argument is present,
 * then each of the array keys will have a sequence number behind
 * the given name.
 *
 * Changes were made to bring this function into line with Perl:
 *
 *
 * The "a" code now retains trailing NULL bytes.
 *
 *
 * The "A" code now strips all trailing ASCII whitespace (spaces, tabs,
 * newlines, carriage returns, and NULL bytes).
 *
 *
 * The "Z" code was added for NULL-padded strings, and removes trailing
 * NULL bytes.
 *
 *
 *
 * @param string $format See pack for an explanation of the format codes.
 * @param string $string The packed data.
 * @param int $offset The offset to begin unpacking from.
 * @return array Returns an associative array containing unpacked elements of binary
 * string.
 * @throws MiscException
 *
 */
function unpack(string $format, string $string, int $offset = 0): array
{
    error_clear_last();
    $safeResult = \unpack($format, $string, $offset);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}
