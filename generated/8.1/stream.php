<?php

namespace Safe;

use Safe\Exceptions\StreamException;

/**
 * @param resource $context
 * @param array $params
 * @throws StreamException
 *
 */
function stream_context_set_params($context, array $params): void
{
    error_clear_last();
    $safeResult = \stream_context_set_params($context, $params);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param resource $from
 * @param resource $to
 * @param int|null $length
 * @param int $offset
 * @return int
 * @throws StreamException
 *
 */
function stream_copy_to_stream($from, $to, ?int $length = null, int $offset = 0): int
{
    error_clear_last();
    if ($offset !== 0) {
        $safeResult = \stream_copy_to_stream($from, $to, $length, $offset);
    } elseif ($length !== null) {
        $safeResult = \stream_copy_to_stream($from, $to, $length);
    } else {
        $safeResult = \stream_copy_to_stream($from, $to);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param string $filtername
 * @param int $read_write
 * @param mixed $params
 * @return resource
 * @throws StreamException
 *
 */
function stream_filter_append($stream, string $filtername, ?int $read_write = null, $params = null)
{
    error_clear_last();
    if ($params !== null) {
        $safeResult = \stream_filter_append($stream, $filtername, $read_write, $params);
    } elseif ($read_write !== null) {
        $safeResult = \stream_filter_append($stream, $filtername, $read_write);
    } else {
        $safeResult = \stream_filter_append($stream, $filtername);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param string $filtername
 * @param int $read_write
 * @param mixed $params
 * @return resource
 * @throws StreamException
 *
 */
function stream_filter_prepend($stream, string $filtername, ?int $read_write = null, $params = null)
{
    error_clear_last();
    if ($params !== null) {
        $safeResult = \stream_filter_prepend($stream, $filtername, $read_write, $params);
    } elseif ($read_write !== null) {
        $safeResult = \stream_filter_prepend($stream, $filtername, $read_write);
    } else {
        $safeResult = \stream_filter_prepend($stream, $filtername);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filter_name
 * @param string $class
 * @throws StreamException
 *
 */
function stream_filter_register(string $filter_name, string $class): void
{
    error_clear_last();
    $safeResult = \stream_filter_register($filter_name, $class);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param resource $stream_filter
 * @throws StreamException
 *
 */
function stream_filter_remove($stream_filter): void
{
    error_clear_last();
    $safeResult = \stream_filter_remove($stream_filter);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param resource $handle
 * @param int $maxlength
 * @param int $offset
 * @return string
 * @throws StreamException
 *
 */
function stream_get_contents($handle, int $maxlength = -1, int $offset = -1): string
{
    error_clear_last();
    $safeResult = \stream_get_contents($handle, $maxlength, $offset);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $handle
 * @param int $length
 * @param string $ending
 * @return string
 * @throws StreamException
 *
 */
function stream_get_line($handle, int $length, string $ending = ""): string
{
    error_clear_last();
    $safeResult = \stream_get_line($handle, $length, $ending);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @throws StreamException
 *
 */
function stream_isatty($stream): void
{
    error_clear_last();
    $safeResult = \stream_isatty($stream);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @return string
 * @throws StreamException
 *
 */
function stream_resolve_include_path(string $filename): string
{
    error_clear_last();
    $safeResult = \stream_resolve_include_path($filename);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param bool $enable
 * @throws StreamException
 *
 */
function stream_set_blocking($stream, bool $enable): void
{
    error_clear_last();
    $safeResult = \stream_set_blocking($stream, $enable);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @param int $seconds
 * @param int $microseconds
 * @throws StreamException
 *
 */
function stream_set_timeout($stream, int $seconds, int $microseconds = 0): void
{
    error_clear_last();
    $safeResult = \stream_set_timeout($stream, $seconds, $microseconds);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param resource $server_socket
 * @param float $timeout
 * @param null|string $peername
 * @return resource
 * @throws StreamException
 *
 */
function stream_socket_accept($server_socket, ?float $timeout = null, ?string &$peername = null)
{
    error_clear_last();
    if ($peername !== null) {
        $safeResult = \stream_socket_accept($server_socket, $timeout, $peername);
    } elseif ($timeout !== null) {
        $safeResult = \stream_socket_accept($server_socket, $timeout);
    } else {
        $safeResult = \stream_socket_accept($server_socket);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $remote_socket
 * @param int|null $errno
 * @param null|string $errstr
 * @param float $timeout
 * @param int-mask $flags
 * @param resource $context
 * @return resource
 * @throws StreamException
 *
 */
function stream_socket_client(string $remote_socket, ?int &$errno = null, ?string &$errstr = null, ?float $timeout = null, int $flags = STREAM_CLIENT_CONNECT, $context = null)
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \stream_socket_client($remote_socket, $errno, $errstr, $timeout, $flags, $context);
    } elseif ($flags !== STREAM_CLIENT_CONNECT) {
        $safeResult = \stream_socket_client($remote_socket, $errno, $errstr, $timeout, $flags);
    } elseif ($timeout !== null) {
        $safeResult = \stream_socket_client($remote_socket, $errno, $errstr, $timeout);
    } else {
        $safeResult = \stream_socket_client($remote_socket, $errno, $errstr);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $handle
 * @param bool $want_peer
 * @return string
 * @throws StreamException
 *
 */
function stream_socket_get_name($handle, bool $want_peer): string
{
    error_clear_last();
    $safeResult = \stream_socket_get_name($handle, $want_peer);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $domain
 * @param int $type
 * @param int $protocol
 * @return resource[]
 * @throws StreamException
 *
 */
function stream_socket_pair(int $domain, int $type, int $protocol): array
{
    error_clear_last();
    $safeResult = \stream_socket_pair($domain, $type, $protocol);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $local_socket
 * @param int|null $errno
 * @param null|string $errstr
 * @param int $flags
 * @param resource $context
 * @return resource
 * @throws StreamException
 *
 */
function stream_socket_server(string $local_socket, ?int &$errno = null, ?string &$errstr = null, int $flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, $context = null)
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \stream_socket_server($local_socket, $errno, $errstr, $flags, $context);
    } else {
        $safeResult = \stream_socket_server($local_socket, $errno, $errstr, $flags);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param int $mode
 * @throws StreamException
 *
 */
function stream_socket_shutdown($stream, int $mode): void
{
    error_clear_last();
    $safeResult = \stream_socket_shutdown($stream, $mode);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @throws StreamException
 *
 */
function stream_supports_lock($stream): void
{
    error_clear_last();
    $safeResult = \stream_supports_lock($stream);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param string $protocol
 * @param string $class
 * @param int $flags
 * @throws StreamException
 *
 */
function stream_wrapper_register(string $protocol, string $class, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \stream_wrapper_register($protocol, $class, $flags);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param string $protocol
 * @throws StreamException
 *
 */
function stream_wrapper_restore(string $protocol): void
{
    error_clear_last();
    $safeResult = \stream_wrapper_restore($protocol);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}


/**
 * @param string $protocol
 * @throws StreamException
 *
 */
function stream_wrapper_unregister(string $protocol): void
{
    error_clear_last();
    $safeResult = \stream_wrapper_unregister($protocol);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
}
