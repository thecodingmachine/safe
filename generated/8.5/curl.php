<?php

namespace Safe;

use Safe\Exceptions\CurlException;

/**
 * Copies a cURL handle keeping the same preferences.
 *
 * @param \CurlHandle $handle A cURL handle returned by
 * curl_init.
 * @return \CurlHandle Returns a new cURL handle.
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
 * This function URL encodes the given string according to RFC 3986.
 *
 * @param \CurlHandle $handle A cURL handle returned by
 * curl_init.
 * @param string $string The string to be encoded.
 * @return string Returns escaped string.
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
 * Execute the given cURL session.
 *
 * This function should be called after initializing a cURL session and all
 * the options for the session are set.
 *
 * @param \CurlHandle $handle A cURL handle returned by
 * curl_init.
 * @return bool|string On success, this function flushes the result directly to the
 * stdout and returns TRUE.
 * However, if the CURLOPT_RETURNTRANSFER
 * option is set, it will return
 * the result on success.
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
 * Gets information about the last transfer.
 *
 * @param \CurlHandle $handle A cURL handle returned by
 * curl_init.
 * @param int|null $option One of the CURLINFO_* constants.
 * @return mixed If option is given, returns its value.
 * Otherwise, returns an associative array with the following elements
 * (which correspond to option):
 *
 *
 *
 * "url"
 *
 *
 *
 *
 * "content_type"
 *
 *
 *
 *
 * "http_code"
 *
 *
 *
 *
 * "header_size"
 *
 *
 *
 *
 * "request_size"
 *
 *
 *
 *
 * "filetime"
 *
 *
 *
 *
 * "ssl_verify_result"
 *
 *
 *
 *
 * "redirect_count"
 *
 *
 *
 *
 * "total_time"
 *
 *
 *
 *
 * "namelookup_time"
 *
 *
 *
 *
 * "connect_time"
 *
 *
 *
 *
 * "pretransfer_time"
 *
 *
 *
 *
 * "size_upload"
 *
 *
 *
 *
 * "size_download"
 *
 *
 *
 *
 * "speed_download"
 *
 *
 *
 *
 * "speed_upload"
 *
 *
 *
 *
 * "download_content_length"
 *
 *
 *
 *
 * "upload_content_length"
 *
 *
 *
 *
 * "starttransfer_time"
 *
 *
 *
 *
 * "redirect_time"
 *
 *
 *
 *
 * "certinfo"
 *
 *
 *
 *
 * "primary_ip"
 *
 *
 *
 *
 * "primary_port"
 *
 *
 *
 *
 * "local_ip"
 *
 *
 *
 *
 * "local_port"
 *
 *
 *
 *
 * "redirect_url"
 *
 *
 *
 *
 * "request_header" (This is only set if the CURLINFO_HEADER_OUT
 * is set by a previous call to curl_setopt)
 *
 *
 *
 *
 * "posttransfer_time_us" (Available as of PHP 8.4.0 and cURL 8.10.0)
 *
 *
 *
 * Note that private data is not included in the associative array and must be retrieved individually with the CURLINFO_PRIVATE option.
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
 * Initializes a new session and returns a cURL handle.
 *
 * @param null|string $url If provided, the CURLOPT_URL option will be set
 * to its value. This can be set manually using the
 * curl_setopt function.
 *
 * The file protocol is disabled by cURL if
 * open_basedir is set.
 * @return \CurlHandle Returns a cURL handle on success.
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
 * Ask the multi handle if there are any messages or information from the individual transfers.
 * Messages may include information such as an error code from the transfer or just the fact
 * that a transfer is completed.
 *
 * Repeated calls to this function will return a new result each time, until a FALSE is returned
 * as a signal that there is no more to get at this point. The integer pointed to with
 * queued_messages will contain the number of remaining messages after this
 * function was called.
 *
 * @param \CurlMultiHandle $multi_handle A cURL multi handle returned by
 * curl_multi_init.
 * @param int|null $queued_messages Number of messages that are still in the queue
 * @return array On success, returns an associative array for the message.
 *
 *
 * Contents of the returned array
 *
 *
 *
 * Key:
 * Value:
 *
 *
 *
 *
 * msg
 * The CURLMSG_DONE constant. Other return values
 * are currently not available.
 *
 *
 * result
 * One of the CURLE_* constants. If everything is
 * OK, the CURLE_OK will be the result.
 *
 *
 * handle
 * Resource of type curl indicates the handle which it concerns.
 *
 *
 *
 *
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
 * Allows the processing of multiple cURL handles asynchronously.
 *
 * @return \CurlMultiHandle Returns a cURL multi handle.
 *
 */
function curl_multi_init(): \CurlMultiHandle
{
    error_clear_last();
    $safeResult = \curl_multi_init();
    return $safeResult;
}


/**
 * Sets an option on the given cURL multi handle.
 *
 * @param \CurlMultiHandle $multi_handle A cURL multi handle returned by
 * curl_multi_init.
 * @param int $option One of the CURLMOPT_* constants.
 * @param mixed $value The value to be set on option.
 * See the description of the
 * CURLMOPT_* constants
 * for details on the type of values each constant expects.
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
 * Sets an option on the given cURL session handle.
 *
 * @param \CurlHandle $handle A cURL handle returned by
 * curl_init.
 * @param int $option The CURLOPT_* option to set.
 * @param mixed $value The value to be set on option.
 * See the description of the
 * CURLOPT_* constants
 * for details on the type of values each constant expects.
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
 * Return an integer containing the last share curl error number.
 *
 * @param \CurlShareHandle $share_handle A cURL share handle returned by
 * curl_share_init.
 * @return int Returns an integer containing the last share curl error number.
 *
 */
function curl_share_errno(\CurlShareHandle $share_handle): int
{
    error_clear_last();
    $safeResult = \curl_share_errno($share_handle);
    return $safeResult;
}


/**
 * Sets an option on the given cURL share handle.
 *
 * @param \CurlShareHandle $share_handle A cURL share handle returned by
 * curl_share_init.
 * @param int $option One of the CURLSHOPT_* constants.
 * @param mixed $value One of the CURL_LOCK_DATA_* constants.
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
 * This function decodes the given URL encoded string.
 *
 * @param \CurlHandle $handle A cURL handle returned by
 * curl_init.
 * @param string $string The URL encoded string to be decoded.
 * @return string Returns decoded string.
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
 * Available if built against libcurl &gt;= 7.62.0.
 *
 * Some protocols have "connection upkeep" mechanisms.
 * These mechanisms usually send some traffic on existing connections in order to keep them alive;
 * this can prevent connections from being closed due to overzealous firewalls, for example.
 *
 * Connection upkeep is currently available only for HTTP/2 connections.
 * A small amount of traffic is usually sent to keep a connection alive.
 * HTTP/2 maintains its connection by sending a HTTP/2 PING frame.
 *
 * @param \CurlHandle $handle A cURL handle returned by
 * curl_init.
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
