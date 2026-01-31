<?php

namespace Safe;

use Safe\Exceptions\SocketsException;

/**
 * @param \Socket $socket
 * @return \Socket
 * @throws SocketsException
 *
 */
function socket_accept(\Socket $socket): \Socket
{
    error_clear_last();
    $safeResult = \socket_accept($socket);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \AddressInfo $address
 * @return \Socket
 * @throws SocketsException
 *
 */
function socket_addrinfo_bind(\AddressInfo $address): \Socket
{
    error_clear_last();
    $safeResult = \socket_addrinfo_bind($address);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \AddressInfo $address
 * @return \Socket
 * @throws SocketsException
 *
 */
function socket_addrinfo_connect(\AddressInfo $address): \Socket
{
    error_clear_last();
    $safeResult = \socket_addrinfo_connect($address);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $host
 * @param mixed $service
 * @param array $hints
 * @return \AddressInfo[]
 * @throws SocketsException
 *
 */
function socket_addrinfo_lookup(string $host, $service = null, array $hints = []): array
{
    error_clear_last();
    if ($hints !== []) {
        $safeResult = \socket_addrinfo_lookup($host, $service, $hints);
    } elseif ($service !== null) {
        $safeResult = \socket_addrinfo_lookup($host, $service);
    } else {
        $safeResult = \socket_addrinfo_lookup($host);
    }
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @param string $address
 * @param int $port
 * @throws SocketsException
 *
 */
function socket_bind(\Socket $socket, string $address, int $port = 0): void
{
    error_clear_last();
    $safeResult = \socket_bind($socket, $address, $port);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param \Socket $socket
 * @param string $address
 * @param int|null $port
 * @throws SocketsException
 *
 */
function socket_connect(\Socket $socket, string $address, ?int $port = null): void
{
    error_clear_last();
    if ($port !== null) {
        $safeResult = \socket_connect($socket, $address, $port);
    } else {
        $safeResult = \socket_connect($socket, $address);
    }
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param int $port
 * @param int $backlog
 * @return \Socket
 * @throws SocketsException
 *
 */
function socket_create_listen(int $port, int $backlog = 128): \Socket
{
    error_clear_last();
    $safeResult = \socket_create_listen($port, $backlog);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $domain
 * @param int $type
 * @param int $protocol
 * @param \Socket[]|null $pair
 * @throws SocketsException
 *
 */
function socket_create_pair(int $domain, int $type, int $protocol, ?array &$pair): void
{
    error_clear_last();
    $safeResult = \socket_create_pair($domain, $type, $protocol, $pair);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param int $domain
 * @param int $type
 * @param int $protocol
 * @return \Socket
 * @throws SocketsException
 *
 */
function socket_create(int $domain, int $type, int $protocol): \Socket
{
    error_clear_last();
    $safeResult = \socket_create($domain, $type, $protocol);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @return resource
 * @throws SocketsException
 *
 */
function socket_export_stream(\Socket $socket)
{
    error_clear_last();
    $safeResult = \socket_export_stream($socket);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @param int $level
 * @param int $option
 * @return mixed
 * @throws SocketsException
 *
 */
function socket_get_option(\Socket $socket, int $level, int $option)
{
    error_clear_last();
    $safeResult = \socket_get_option($socket, $level, $option);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @param null|string $address
 * @param int|null $port
 * @throws SocketsException
 *
 */
function socket_getpeername(\Socket $socket, ?string &$address, ?int &$port = null): void
{
    error_clear_last();
    $safeResult = \socket_getpeername($socket, $address, $port);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param \Socket $socket
 * @param null|string $address
 * @param int|null $port
 * @throws SocketsException
 *
 */
function socket_getsockname(\Socket $socket, ?string &$address, ?int &$port = null): void
{
    error_clear_last();
    $safeResult = \socket_getsockname($socket, $address, $port);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @return \Socket
 * @throws SocketsException
 *
 */
function socket_import_stream($stream): \Socket
{
    error_clear_last();
    $safeResult = \socket_import_stream($stream);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @param int $backlog
 * @throws SocketsException
 *
 */
function socket_listen(\Socket $socket, int $backlog = 0): void
{
    error_clear_last();
    $safeResult = \socket_listen($socket, $backlog);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param \Socket $socket
 * @param int $length
 * @param int $mode
 * @return string
 * @throws SocketsException
 *
 */
function socket_read(\Socket $socket, int $length, int $mode = PHP_BINARY_READ): string
{
    error_clear_last();
    $safeResult = \socket_read($socket, $length, $mode);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @param string $data
 * @param int $length
 * @param int $flags
 * @return int
 * @throws SocketsException
 *
 */
function socket_send(\Socket $socket, string $data, int $length, int $flags): int
{
    error_clear_last();
    $safeResult = \socket_send($socket, $data, $length, $flags);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @param array $message
 * @param int $flags
 * @return int
 * @throws SocketsException
 *
 */
function socket_sendmsg(\Socket $socket, array $message, int $flags = 0): int
{
    error_clear_last();
    $safeResult = \socket_sendmsg($socket, $message, $flags);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @param string $data
 * @param int $length
 * @param int $flags
 * @param string $address
 * @param int|null $port
 * @return int
 * @throws SocketsException
 *
 */
function socket_sendto(\Socket $socket, string $data, int $length, int $flags, string $address, ?int $port = null): int
{
    error_clear_last();
    if ($port !== null) {
        $safeResult = \socket_sendto($socket, $data, $length, $flags, $address, $port);
    } else {
        $safeResult = \socket_sendto($socket, $data, $length, $flags, $address);
    }
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Socket $socket
 * @throws SocketsException
 *
 */
function socket_set_block(\Socket $socket): void
{
    error_clear_last();
    $safeResult = \socket_set_block($socket);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param \Socket $socket
 * @throws SocketsException
 *
 */
function socket_set_nonblock(\Socket $socket): void
{
    error_clear_last();
    $safeResult = \socket_set_nonblock($socket);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param \Socket $socket
 * @param int $level
 * @param int $option
 * @param array|int|string $value
 * @throws SocketsException
 *
 */
function socket_set_option(\Socket $socket, int $level, int $option, $value): void
{
    error_clear_last();
    $safeResult = \socket_set_option($socket, $level, $option, $value);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param \Socket $socket
 * @param int $mode
 * @throws SocketsException
 *
 */
function socket_shutdown(\Socket $socket, int $mode = 2): void
{
    error_clear_last();
    $safeResult = \socket_shutdown($socket, $mode);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * @param \Socket $socket
 * @param int $process_id
 * @return string
 * @throws SocketsException
 *
 */
function socket_wsaprotocol_info_export(\Socket $socket, int $process_id): string
{
    error_clear_last();
    $safeResult = \socket_wsaprotocol_info_export($socket, $process_id);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $info_id
 * @return \Socket
 * @throws SocketsException
 *
 */
function socket_wsaprotocol_info_import(string $info_id): \Socket
{
    error_clear_last();
    $safeResult = \socket_wsaprotocol_info_import($info_id);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $info_id
 * @throws SocketsException
 *
 */
function socket_wsaprotocol_info_release(string $info_id): void
{
    error_clear_last();
    $safeResult = \socket_wsaprotocol_info_release($info_id);
    if ($safeResult === false) {
        throw SocketsException::createFromPhpError();
    }
}
