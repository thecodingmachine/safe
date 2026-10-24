<?php

namespace Safe;

use Safe\Exceptions\CurlException;

/**
 * @param \CurlHandle $handle
 * @return \CurlHandle
 * @throws CurlException
 *
 */
function curl_copy_handle(\CurlHandle $handle): \CurlHandle
{
    error_clear_last();
    $safeResult = \curl_copy_handle($handle);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($handle);
    }
    return $safeResult;
}


/**
 * @param \CurlHandle $handle
 * @param string $string
 * @return string
 * @throws CurlException
 *
 */
function curl_escape(\CurlHandle $handle, string $string): string
{
    error_clear_last();
    $safeResult = \curl_escape($handle, $string);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($handle);
    }
    return $safeResult;
}


/**
 * @param \CurlHandle $handle
 * @return bool|string
 * @throws CurlException
 *
 */
function curl_exec(\CurlHandle $handle)
{
    error_clear_last();
    $safeResult = \curl_exec($handle);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($handle);
    }
    return $safeResult;
}


/**
 * @param \CurlHandle $handle
 * @param int|null $option
 * @return mixed
 * @throws CurlException
 *
 */
function curl_getinfo(\CurlHandle $handle, ?int $option = null)
{
    error_clear_last();
    if ($option !== null) {
        $safeResult = \curl_getinfo($handle, $option);
    } else {
        $safeResult = \curl_getinfo($handle);
    }
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($handle);
    }
    return $safeResult;
}


/**
 * @param null|string $url
 * @return \CurlHandle
 * @throws CurlException
 *
 */
function curl_init(?string $url = null): \CurlHandle
{
    error_clear_last();
    if ($url !== null) {
        $safeResult = \curl_init($url);
    } else {
        $safeResult = \curl_init();
    }
    if ($safeResult === false) {
        throw CurlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \CurlMultiHandle $multi_handle
 * @param int|null $queued_messages
 * @return array
 * @throws CurlException
 *
 */
function curl_multi_info_read(\CurlMultiHandle $multi_handle, ?int &$queued_messages = null): array
{
    error_clear_last();
    $safeResult = \curl_multi_info_read($multi_handle, $queued_messages);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($multi_handle);
    }
    return $safeResult;
}


/**
 * @return \CurlMultiHandle
 *
 */
function curl_multi_init(): \CurlMultiHandle
{
    error_clear_last();
    $safeResult = \curl_multi_init();
    return $safeResult;
}


/**
 * @param \CurlMultiHandle $multi_handle
 * @param int $option
 * @param mixed $value
 * @throws CurlException
 *
 */
function curl_multi_setopt(\CurlMultiHandle $multi_handle, int $option, $value): void
{
    error_clear_last();
    $safeResult = \curl_multi_setopt($multi_handle, $option, $value);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($multi_handle);
    }
}


/**
 * @param \CurlHandle $handle
 * @param int $option
 * @param mixed $value
 * @throws CurlException
 *
 */
function curl_setopt(\CurlHandle $handle, int $option, $value): void
{
    error_clear_last();
    $safeResult = \curl_setopt($handle, $option, $value);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($handle);
    }
}


/**
 * @param \CurlShareHandle $share_handle
 * @return int
 *
 */
function curl_share_errno(\CurlShareHandle $share_handle): int
{
    error_clear_last();
    $safeResult = \curl_share_errno($share_handle);
    return $safeResult;
}


/**
 * @param \CurlShareHandle $share_handle
 * @param int $option
 * @param mixed $value
 * @throws CurlException
 *
 */
function curl_share_setopt(\CurlShareHandle $share_handle, int $option, $value): void
{
    error_clear_last();
    $safeResult = \curl_share_setopt($share_handle, $option, $value);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($share_handle);
    }
}


/**
 * @param \CurlHandle $handle
 * @param string $string
 * @return string
 * @throws CurlException
 *
 */
function curl_unescape(\CurlHandle $handle, string $string): string
{
    error_clear_last();
    $safeResult = \curl_unescape($handle, $string);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($handle);
    }
    return $safeResult;
}


/**
 * @param \CurlHandle $handle
 * @throws CurlException
 *
 */
function curl_upkeep(\CurlHandle $handle): void
{
    error_clear_last();
    $safeResult = \curl_upkeep($handle);
    if ($safeResult === false) {
        throw CurlException::createFromPhpError($handle);
    }
}
