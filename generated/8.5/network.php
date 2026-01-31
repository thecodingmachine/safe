<?php

namespace Safe;

use Safe\Exceptions\NetworkException;

/**
 * @return bool
 *
 */
function closelog(): bool
{
    error_clear_last();
    $safeResult = \closelog();
    return $safeResult;
}


/**
 * @param string $hostname
 * @param int $type
 * @param array|null $authoritative_name_servers
 * @param array|null $additional_records
 * @param bool $raw
 * @return list
 * @throws NetworkException
 *
 */
function dns_get_record(string $hostname, int $type = DNS_ANY, ?array &$authoritative_name_servers = null, ?array &$additional_records = null, bool $raw = false): array
{
    error_clear_last();
    $safeResult = \dns_get_record($hostname, $type, $authoritative_name_servers, $additional_records, $raw);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $hostname
 * @param int $port
 * @param int|null $error_code
 * @param null|string $error_message
 * @param float|null $timeout
 * @return resource
 * @throws NetworkException
 *
 */
function fsockopen(string $hostname, int $port = -1, ?int &$error_code = null, ?string &$error_message = null, ?float $timeout = null)
{
    error_clear_last();
    if ($timeout !== null) {
        $safeResult = \fsockopen($hostname, $port, $error_code, $error_message, $timeout);
    } else {
        $safeResult = \fsockopen($hostname, $port, $error_code, $error_message);
    }
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return string
 * @throws NetworkException
 *
 */
function gethostname(): string
{
    error_clear_last();
    $safeResult = \gethostname();
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $protocol
 * @return int
 * @throws NetworkException
 *
 */
function getprotobyname(string $protocol): int
{
    error_clear_last();
    $safeResult = \getprotobyname($protocol);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $protocol
 * @return string
 * @throws NetworkException
 *
 */
function getprotobynumber(int $protocol): string
{
    error_clear_last();
    $safeResult = \getprotobynumber($protocol);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $port
 * @param string $protocol
 * @return string
 * @throws NetworkException
 *
 */
function getservbyport(int $port, string $protocol): string
{
    error_clear_last();
    $safeResult = \getservbyport($port, $protocol);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param callable $callback
 * @throws NetworkException
 *
 */
function header_register_callback(callable $callback): void
{
    error_clear_last();
    $safeResult = \header_register_callback($callback);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
}


/**
 * @param string $ip
 * @return string
 * @throws NetworkException
 *
 */
function inet_ntop(string $ip): string
{
    error_clear_last();
    $safeResult = \inet_ntop($ip);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $ip
 * @return string
 * @throws NetworkException
 *
 */
function inet_pton(string $ip): string
{
    error_clear_last();
    $safeResult = \inet_pton($ip);
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $ip
 * @return false|string
 *
 */
function long2ip(int $ip)
{
    error_clear_last();
    $safeResult = \long2ip($ip);
    return $safeResult;
}


/**
 * @return array
 * @throws NetworkException
 *
 */
function net_get_interfaces(): array
{
    error_clear_last();
    $safeResult = \net_get_interfaces();
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $prefix
 * @param int $flags
 * @param int $facility
 * @return bool
 *
 */
function openlog(string $prefix, int $flags, int $facility): bool
{
    error_clear_last();
    $safeResult = \openlog($prefix, $flags, $facility);
    return $safeResult;
}


/**
 * @param string $hostname
 * @param int $port
 * @param int|null $error_code
 * @param null|string $error_message
 * @param float|null $timeout
 * @return resource
 * @throws NetworkException
 *
 */
function pfsockopen(string $hostname, int $port = -1, ?int &$error_code = null, ?string &$error_message = null, ?float $timeout = null)
{
    error_clear_last();
    if ($timeout !== null) {
        $safeResult = \pfsockopen($hostname, $port, $error_code, $error_message, $timeout);
    } else {
        $safeResult = \pfsockopen($hostname, $port, $error_code, $error_message);
    }
    if ($safeResult === false) {
        throw NetworkException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $priority
 * @param string $message
 * @return bool
 *
 */
function syslog(int $priority, string $message): bool
{
    error_clear_last();
    $safeResult = \syslog($priority, $message);
    return $safeResult;
}
