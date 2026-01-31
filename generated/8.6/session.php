<?php

namespace Safe;

use Safe\Exceptions\SessionException;

/**
 * @throws SessionException
 *
 */
function session_abort(): void
{
    error_clear_last();
    $safeResult = \session_abort();
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * @param int|null $value
 * @return int
 * @throws SessionException
 *
 */
function session_cache_expire(?int $value = null): int
{
    error_clear_last();
    if ($value !== null) {
        $safeResult = \session_cache_expire($value);
    } else {
        $safeResult = \session_cache_expire();
    }
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|string $value
 * @return string
 * @throws SessionException
 *
 */
function session_cache_limiter(?string $value = null): string
{
    error_clear_last();
    if ($value !== null) {
        $safeResult = \session_cache_limiter($value);
    } else {
        $safeResult = \session_cache_limiter();
    }
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $prefix
 * @return string
 * @throws SessionException
 *
 */
function session_create_id(string $prefix = ""): string
{
    error_clear_last();
    $safeResult = \session_create_id($prefix);
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @throws SessionException
 *
 */
function session_decode(string $data): void
{
    error_clear_last();
    $safeResult = \session_decode($data);
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * @throws SessionException
 *
 */
function session_destroy(): void
{
    error_clear_last();
    $safeResult = \session_destroy();
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * @return string
 * @throws SessionException
 *
 */
function session_encode(): string
{
    error_clear_last();
    $safeResult = \session_encode();
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return int
 * @throws SessionException
 *
 */
function session_gc(): int
{
    error_clear_last();
    $safeResult = \session_gc();
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|string $id
 * @return string
 * @throws SessionException
 *
 */
function session_id(?string $id = null): string
{
    error_clear_last();
    if ($id !== null) {
        $safeResult = \session_id($id);
    } else {
        $safeResult = \session_id();
    }
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|string $module
 * @return string
 * @throws SessionException
 *
 */
function session_module_name(?string $module = null): string
{
    error_clear_last();
    if ($module !== null) {
        $safeResult = \session_module_name($module);
    } else {
        $safeResult = \session_module_name();
    }
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|string $name
 * @return non-falsy-string
 * @throws SessionException
 *
 */
function session_name(?string $name = null): string
{
    error_clear_last();
    if ($name !== null) {
        $safeResult = \session_name($name);
    } else {
        $safeResult = \session_name();
    }
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param bool $delete_old_session
 * @throws SessionException
 *
 */
function session_regenerate_id(bool $delete_old_session = false): void
{
    error_clear_last();
    $safeResult = \session_regenerate_id($delete_old_session);
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * @throws SessionException
 *
 */
function session_reset(): void
{
    error_clear_last();
    $safeResult = \session_reset();
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * @param null|string $path
 * @return string
 * @throws SessionException
 *
 */
function session_save_path(?string $path = null): string
{
    error_clear_last();
    if ($path !== null) {
        $safeResult = \session_save_path($path);
    } else {
        $safeResult = \session_save_path();
    }
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param array $options
 * @throws SessionException
 *
 */
function session_start(array $options = []): void
{
    error_clear_last();
    $safeResult = \session_start($options);
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * @throws SessionException
 *
 */
function session_unset(): void
{
    error_clear_last();
    $safeResult = \session_unset();
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * @throws SessionException
 *
 */
function session_write_close(): void
{
    error_clear_last();
    $safeResult = \session_write_close();
    if ($safeResult === false) {
        throw SessionException::createFromPhpError();
    }
}
