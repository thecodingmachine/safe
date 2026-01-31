<?php

namespace Safe;

use Safe\Exceptions\MiscException;

/**
 * @param string $constant_name
 * @param mixed $value
 * @param bool $case_insensitive
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
 * @param string $filename
 * @param bool $return
 * @return bool|string
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
 * @param string $string
 * @param bool $return
 * @return bool|string
 * @throws MiscException
 *
 */
function highlight_string(string $string, bool $return = false)
{
    error_clear_last();
    $safeResult = \highlight_string($string, $return);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param bool $as_number
 * @return array{0:int,1:int}|float|int
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
 * @param string $format
 * @param mixed $values
 * @return string
 * @throws MiscException
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
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int|string $in_codepage
 * @param int|string $out_codepage
 * @param string $subject
 * @return string
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
 * @param int $codepage
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
 * @param int $event
 * @param int $pid
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
 * @param callable|null $handler
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
 * @param resource $stream
 * @param bool|null $enable
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
 * @param int $seconds
 * @return int
 * @throws MiscException
 *
 */
function sleep(int $seconds): int
{
    error_clear_last();
    $safeResult = \sleep($seconds);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $seconds
 * @param int $nanoseconds
 * @return array{seconds:0|positive-int,nanoseconds:0|positive-int}|bool
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
 * @param float $timestamp
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
 * @param string $format
 * @param string $string
 * @param int $offset
 * @return array
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
