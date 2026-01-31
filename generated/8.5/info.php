<?php

namespace Safe;

use Safe\Exceptions\InfoException;

/**
 * @param int $option
 * @param mixed $value
 * @return mixed
 *
 */
function assert_options(int $option, $value = null)
{
    error_clear_last();
    if ($value !== null) {
        $safeResult = \assert_options($option, $value);
    } else {
        $safeResult = \assert_options($option);
    }
    return $safeResult;
}


/**
 * @param string $title
 * @throws InfoException
 *
 */
function cli_set_process_title(string $title): void
{
    error_clear_last();
    $safeResult = \cli_set_process_title($title);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * @param string $extension_filename
 * @throws InfoException
 *
 */
function dl(string $extension_filename): void
{
    error_clear_last();
    $safeResult = \dl($extension_filename);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * @param string $option
 * @return mixed
 * @throws InfoException
 *
 */
function get_cfg_var(string $option)
{
    error_clear_last();
    $safeResult = \get_cfg_var($option);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return string
 * @throws InfoException
 *
 */
function get_include_path(): string
{
    error_clear_last();
    $safeResult = \get_include_path();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return int
 * @throws InfoException
 *
 */
function getlastmod(): int
{
    error_clear_last();
    $safeResult = \getlastmod();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return int
 * @throws InfoException
 *
 */
function getmygid(): int
{
    error_clear_last();
    $safeResult = \getmygid();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return int
 * @throws InfoException
 *
 */
function getmyinode(): int
{
    error_clear_last();
    $safeResult = \getmyinode();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return int
 * @throws InfoException
 *
 */
function getmypid(): int
{
    error_clear_last();
    $safeResult = \getmypid();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return int
 * @throws InfoException
 *
 */
function getmyuid(): int
{
    error_clear_last();
    $safeResult = \getmyuid();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $short_options
 * @param array $long_options
 * @param int|null $rest_index
 * @return array|array|array
 * @throws InfoException
 *
 */
function getopt(string $short_options, array $long_options = [], ?int &$rest_index = null): array
{
    error_clear_last();
    $safeResult = \getopt($short_options, $long_options, $rest_index);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $mode
 * @return array
 * @throws InfoException
 *
 */
function getrusage(int $mode = 0): array
{
    error_clear_last();
    $safeResult = \getrusage($mode);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $option
 * @return string
 * @throws InfoException
 *
 */
function ini_get(string $option): string
{
    error_clear_last();
    $safeResult = \ini_get($option);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $option
 * @param bool|float|int|null|string $value
 * @return string
 * @throws InfoException
 *
 */
function ini_set(string $option, $value): string
{
    error_clear_last();
    $safeResult = \ini_set($option, $value);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return non-empty-string
 * @throws InfoException
 *
 */
function php_sapi_name(): string
{
    error_clear_last();
    $safeResult = \php_sapi_name();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $flags
 * @return bool
 *
 */
function phpcredits(int $flags = CREDITS_ALL): bool
{
    error_clear_last();
    $safeResult = \phpcredits($flags);
    return $safeResult;
}


/**
 * @param int $flags
 * @return bool
 *
 */
function phpinfo(int $flags = INFO_ALL): bool
{
    error_clear_last();
    $safeResult = \phpinfo($flags);
    return $safeResult;
}


/**
 * @param string $assignment
 * @throws InfoException
 *
 */
function putenv(string $assignment): void
{
    error_clear_last();
    $safeResult = \putenv($assignment);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * @param string $include_path
 * @return string
 * @throws InfoException
 *
 */
function set_include_path(string $include_path): string
{
    error_clear_last();
    $safeResult = \set_include_path($include_path);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $seconds
 * @throws InfoException
 *
 */
function set_time_limit(int $seconds): void
{
    error_clear_last();
    $safeResult = \set_time_limit($seconds);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}
