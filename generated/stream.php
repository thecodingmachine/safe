<?php

namespace Safe;

use Safe\Exceptions\StreamException;

/**
 * Sets parameters on the specified context.
 *
 * @param resource $context The stream or context to apply the parameters too.
 * @param array $params An associative array of parameters to be set in the following format:
 * $params['paramname'] = "paramvalue";.
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
 * Makes a copy of up to length bytes
 * of data from the current position (or from the
 * offset position, if specified) in
 * from to to. If
 * length is NULL, all remaining content in
 * from will be copied.
 *
 * @param resource $from The source stream
 * @param resource $to The destination stream
 * @param int $length Maximum bytes to copy. By default all bytes left are copied.
 * @param int $offset The offset where to start to copy data
 * @return int Returns the total count of bytes copied.
 * @throws StreamException
 *
 */
function stream_copy_to_stream($from, $to, int $length = null, int $offset = 0): int
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
 * Adds filtername to the list of filters
 * attached to stream.
 *
 * @param resource $stream The target stream.
 * @param string $filtername The filter name.
 * @param int $read_write By default, stream_filter_append will
 * attach the filter to the read filter chain
 * if the file was opened for reading (i.e. File Mode:
 * r, and/or +).  The filter
 * will also be attached to the write filter chain
 * if the file was opened for writing (i.e. File Mode:
 * w, a, and/or +).
 * STREAM_FILTER_READ,
 * STREAM_FILTER_WRITE, and/or
 * STREAM_FILTER_ALL can also be passed to the
 * read_write parameter to override this behavior.
 * @param mixed $params This filter will be added with the specified
 * params to the end of
 * the list and will therefore be called last during stream operations.
 * To add a filter to the beginning of the list, use
 * stream_filter_prepend.
 * @return resource Returns a resource on success. The resource can be
 * used to refer to this filter instance during a call to
 * stream_filter_remove.
 *
 * FALSE is returned if stream is not a resource or
 * if filtername cannot be located.
 * @throws StreamException
 *
 */
function stream_filter_append($stream, string $filtername, int $read_write = null, $params = null)
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
 * Adds filtername to the list of filters
 * attached to stream.
 *
 * @param resource $stream The target stream.
 * @param string $filtername The filter name.
 * @param int $read_write By default, stream_filter_prepend will
 * attach the filter to the read filter chain
 * if the file was opened for reading (i.e. File Mode:
 * r, and/or +).  The filter
 * will also be attached to the write filter chain
 * if the file was opened for writing (i.e. File Mode:
 * w, a, and/or +).
 * STREAM_FILTER_READ,
 * STREAM_FILTER_WRITE, and/or
 * STREAM_FILTER_ALL can also be passed to the
 * read_write parameter to override this behavior.
 * See stream_filter_append for an example of
 * using this parameter.
 * @param mixed $params This filter will be added with the specified params
 * to the beginning of the list and will therefore be
 * called first during stream operations.  To add a filter to the end of the
 * list, use stream_filter_append.
 * @return resource Returns a resource on success. The resource can be
 * used to refer to this filter instance during a call to
 * stream_filter_remove.
 *
 * FALSE is returned if stream is not a resource or
 * if filtername cannot be located.
 * @throws StreamException
 *
 */
function stream_filter_prepend($stream, string $filtername, int $read_write = null, $params = null)
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
 * stream_filter_register allows you to implement
 * your own filter on any registered stream used with all the other
 * filesystem functions (such as fopen,
 * fread etc.).
 *
 * @param string $filter_name The filter name to be registered.
 * @param string $class To implement a filter, you need to define a class as an extension of
 * php_user_filter with a number of member
 * functions. When performing read/write operations on the stream
 * to which your filter is attached, PHP will pass the data through your
 * filter (and any other filters attached to that stream) so that the
 * data may be modified as desired. You must implement the methods
 * exactly as described in php_user_filter - doing
 * otherwise will lead to undefined behaviour.
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
 * Removes a stream filter previously added to a stream with
 * stream_filter_prepend or
 * stream_filter_append.  Any data remaining in the
 * filter's internal buffer will be flushed through to the next filter before
 * removing it.
 *
 * @param resource $stream_filter The stream filter to be removed.
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
 * Identical to file_get_contents, except that
 * stream_get_contents operates on an already open
 * stream resource and returns the remaining contents in a string, up to
 * length bytes and starting at the specified
 * offset.
 *
 * @param resource $stream A stream resource (e.g. returned from fopen)
 * @param int $length The maximum bytes to read. Defaults to NULL (read all the remaining
 * buffer).
 * @param int $offset Seek to the specified offset before reading. If this number is negative,
 * no seeking will occur and reading will start from the current position.
 * @return string Returns a string.
 * @throws StreamException
 *
 */
function stream_get_contents($stream, int $length = null, int $offset = -1): string
{
    error_clear_last();
    if ($offset !== -1) {
        $safeResult = \stream_get_contents($stream, $length, $offset);
    } elseif ($length !== null) {
        $safeResult = \stream_get_contents($stream, $length);
    } else {
        $safeResult = \stream_get_contents($stream);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets a line from the given handle.
 *
 * Reading ends when length bytes have been read, when
 * the non-empty string specified by ending is found (which is
 * not included in the return value), or on EOF
 * (whichever comes first).
 *
 * This function is nearly identical to fgets except in
 * that it allows end of line delimiters other than the standard \n, \r, and
 * \r\n, and does not return the delimiter itself.
 *
 * @param resource $stream A valid file handle.
 * @param int $length The maximum number of bytes to read from the handle.
 * Negative values are not supported.
 * Zero (0) means the default socket chunk size,
 * i.e. 8192 bytes.
 * @param string $ending An optional string delimiter.
 * @return string Returns a string of up to length bytes read from the file
 * pointed to by stream.
 * @throws StreamException
 *
 */
function stream_get_line($stream, int $length, string $ending = ""): string
{
    error_clear_last();
    $safeResult = \stream_get_line($stream, $length, $ending);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Determines if stream stream refers to a valid terminal type device.
 * This is a more portable version of posix_isatty, since it works on Windows systems too.
 *
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
 * Resolve filename against the include path according to the same rules as fopen/include.
 *
 * @param string $filename The filename to resolve.
 * @return string Returns a string containing the resolved absolute filename.
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
 * Sets blocking or non-blocking mode on a stream.
 *
 * This function works for any stream that supports non-blocking mode
 * (currently, regular files and socket streams).
 *
 * @param resource $stream The stream.
 * @param bool $enable If enable is FALSE, the given stream
 * will be switched to non-blocking mode, and if TRUE, it
 * will be switched to blocking mode.  This affects calls like
 * fgets and fread
 * that read from the stream.  In non-blocking mode an
 * fgets call will always return right away
 * while in blocking mode it will wait for data to become available
 * on the stream.
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
 * Sets the timeout value on stream,
 * expressed in the sum of seconds and
 * microseconds.
 *
 * When the stream times out, the 'timed_out' key of the array returned by
 * stream_get_meta_data is set to TRUE, although no
 * error/warning is generated.
 *
 * @param resource $stream The target stream.
 * @param int $seconds The seconds part of the timeout to be set.
 * @param int $microseconds The microseconds part of the timeout to be set.
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
 * Accept a connection on a socket previously created by
 * stream_socket_server.
 *
 * @param resource $socket The server socket to accept a connection from.
 * @param float $timeout Override the default socket accept timeout. Time should be given in
 * seconds. By default, default_socket_timeout
 * is used.
 * @param string|null $peer_name Will be set to the name (address) of the client which connected, if
 * included and available from the selected transport.
 *
 * Can also be determined later using
 * stream_socket_get_name.
 * @return resource Returns a stream to the accepted socket connection.
 * @throws StreamException
 *
 */
function stream_socket_accept($socket, float $timeout = null, ?string &$peer_name = null)
{
    error_clear_last();
    if ($peer_name !== null) {
        $safeResult = \stream_socket_accept($socket, $timeout, $peer_name);
    } elseif ($timeout !== null) {
        $safeResult = \stream_socket_accept($socket, $timeout);
    } else {
        $safeResult = \stream_socket_accept($socket);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Initiates a stream or datagram connection to the destination specified
 * by address.  The type of socket created
 * is determined by the transport specified using standard URL formatting:
 * transport://target.  For Internet Domain sockets
 * (AF_INET) such as TCP and UDP, the target portion
 * of the address parameter should consist of
 * a hostname or IP address followed by a colon and a port number.  For Unix
 * domain sockets, the target portion should point
 * to the socket file on the filesystem.
 *
 * @param string $address Address to the socket to connect to.
 * @param int|null $error_code Will be set to the system level error number if connection fails.
 * @param string|null $error_message Will be set to the system level error message if the connection fails.
 * @param float $timeout Number of seconds until the connect() system call
 * should timeout. By default, default_socket_timeout
 * is used.
 *
 *
 * This parameter only applies when not making asynchronous
 * connection attempts.
 *
 *
 *
 *
 * To set a timeout for reading/writing data over the socket, use the
 * stream_set_timeout, as the
 * timeout only applies while making connecting
 * the socket.
 *
 *
 *
 * To set a timeout for reading/writing data over the socket, use the
 * stream_set_timeout, as the
 * timeout only applies while making connecting
 * the socket.
 * @param int $flags Bitmask field which may be set to any combination of connection flags.
 * Currently the select of connection flags is limited to
 * STREAM_CLIENT_CONNECT (default),
 * STREAM_CLIENT_ASYNC_CONNECT and
 * STREAM_CLIENT_PERSISTENT.
 * @param resource $context A valid context resource created with stream_context_create.
 * @return resource On success a stream resource is returned which may
 * be used together with the other file functions (such as
 * fgets, fgetss,
 * fwrite, fclose, and
 * feof), FALSE on failure.
 * @throws StreamException
 *
 */
function stream_socket_client(string $address, ?int &$error_code = null, ?string &$error_message = null, float $timeout = null, int $flags = STREAM_CLIENT_CONNECT, $context = null)
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \stream_socket_client($address, $error_code, $error_message, $timeout, $flags, $context);
    } elseif ($flags !== STREAM_CLIENT_CONNECT) {
        $safeResult = \stream_socket_client($address, $error_code, $error_message, $timeout, $flags);
    } elseif ($timeout !== null) {
        $safeResult = \stream_socket_client($address, $error_code, $error_message, $timeout);
    } else {
        $safeResult = \stream_socket_client($address, $error_code, $error_message);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the local or remote name of a given socket connection.
 *
 * @param resource $socket The socket to get the name of.
 * @param bool $remote If set to TRUE the remote socket name will be returned, if set
 * to FALSE the local socket name will be returned.
 * @return string The name of the socket.
 * @throws StreamException
 *
 */
function stream_socket_get_name($socket, bool $remote): string
{
    error_clear_last();
    $safeResult = \stream_socket_get_name($socket, $remote);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * stream_socket_pair creates a pair of connected,
 * indistinguishable socket streams. This function is commonly used in IPC
 * (Inter-Process Communication).
 *
 * @param int $domain The protocol family to be used: STREAM_PF_INET,
 * STREAM_PF_INET6 or
 * STREAM_PF_UNIX
 * @param int $type The type of communication to be used:
 * STREAM_SOCK_DGRAM,
 * STREAM_SOCK_RAW,
 * STREAM_SOCK_RDM,
 * STREAM_SOCK_SEQPACKET or
 * STREAM_SOCK_STREAM
 * @param int $protocol The protocol to be used: STREAM_IPPROTO_ICMP,
 * STREAM_IPPROTO_IP,
 * STREAM_IPPROTO_RAW,
 * STREAM_IPPROTO_TCP or
 * STREAM_IPPROTO_UDP
 * @return resource[] Returns an array with the two socket resources on success.
 * @throws StreamException
 *
 */
function stream_socket_pair(int $domain, int $type, int $protocol): iterable
{
    error_clear_last();
    $safeResult = \stream_socket_pair($domain, $type, $protocol);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * stream_socket_recvfrom accepts
 * data from a remote socket up to length bytes.
 *
 * @param resource $socket The remote socket.
 * @param int $length The number of bytes to receive from the socket.
 * @param int $flags The value of flags can be any combination
 * of the following:
 *
 * Possible values for flags
 *
 *
 *
 * STREAM_OOB
 *
 * Process OOB (out-of-band) data.
 *
 *
 *
 * STREAM_PEEK
 *
 * Retrieve data from the socket, but do not consume the buffer.
 * Subsequent calls to fread or
 * stream_socket_recvfrom will see
 * the same data.
 *
 *
 *
 *
 *
 * @param string|null $address If address is provided it will be populated with
 * the address of the remote socket.
 * @return string Returns the read data, as a string.
 * @throws StreamException
 *
 */
function stream_socket_recvfrom($socket, int $length, int $flags = 0, ?string &$address = null): string
{
    error_clear_last();
    $safeResult = \stream_socket_recvfrom($socket, $length, $flags, $address);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Sends the specified data through the
 * socket.
 *
 * @param resource $socket The socket to send data to.
 * @param string $data The data to be sent.
 * @param int $flags The value of flags can be any combination
 * of the following:
 *
 * possible values for flags
 *
 *
 *
 * STREAM_OOB
 *
 * Process OOB (out-of-band) data.
 *
 *
 *
 *
 *
 * @param string $address The address specified when the socket stream was created will be used
 * unless an alternate address is specified in address.
 *
 * If specified, it must be in dotted quad (or [ipv6]) format.
 * @return int Returns a result code, as an integer.
 * @throws StreamException
 *
 */
function stream_socket_sendto($socket, string $data, int $flags = 0, string $address = ""): int
{
    error_clear_last();
    $safeResult = \stream_socket_sendto($socket, $data, $flags, $address);
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a stream or datagram socket on the specified
 * address.
 *
 * This function only creates a socket, to begin accepting connections
 * use stream_socket_accept.
 *
 * @param string $address The type of socket created is determined by the transport specified
 * using standard URL formatting: transport://target.
 *
 * For Internet Domain sockets (AF_INET) such as TCP and UDP, the
 * target portion of the
 * remote_socket parameter should consist of a
 * hostname or IP address followed by a colon and a port number.  For
 * Unix domain sockets, the target portion should
 * point to the socket file on the filesystem.
 *
 * Depending on the environment, Unix domain sockets may not be available.
 * A list of available transports can be retrieved using
 * stream_get_transports. See
 * for a list of bulitin transports.
 * @param int|null $error_code If the optional error_code and error_message
 * arguments are present they will be set to indicate the actual system
 * level error that occurred in the system-level socket(),
 * bind(), and listen() calls. If
 * the value returned in error_code is
 * 0 and the function returned FALSE, it is an
 * indication that the error occurred before the bind()
 * call. This is most likely due to a problem initializing the socket.
 * Note that the error_code and
 * error_message arguments will always be passed by reference.
 * @param string|null $error_message See error_code description.
 * @param int $flags A bitmask field which may be set to any combination of socket creation
 * flags.
 *
 * For UDP sockets, you must use STREAM_SERVER_BIND as
 * the flags parameter.
 * @param resource $context
 * @return resource Returns the created stream.
 * @throws StreamException
 *
 */
function stream_socket_server(string $address, ?int &$error_code = null, ?string &$error_message = null, int $flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, $context = null)
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \stream_socket_server($address, $error_code, $error_message, $flags, $context);
    } else {
        $safeResult = \stream_socket_server($address, $error_code, $error_message, $flags);
    }
    if ($safeResult === false) {
        throw StreamException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Shutdowns (partially or not) a full-duplex connection.
 *
 * @param resource $stream An open stream (opened with stream_socket_client,
 * for example)
 * @param int $mode One of the following constants: STREAM_SHUT_RD
 * (disable further receptions), STREAM_SHUT_WR
 * (disable further transmissions) or
 * STREAM_SHUT_RDWR (disable further receptions and
 * transmissions).
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
 * Tells whether the stream supports locking through
 * flock.
 *
 * @param resource $stream The stream to check.
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
 * Allows you to implement your own protocol handlers and streams for use
 * with all the other filesystem functions (such as fopen,
 * fread etc.).
 *
 * @param string $protocol The wrapper name to be registered.
 * Valid protocol names must contain alphanumerics, dots (.), plusses (+), or hyphens (-) only.
 * @param string $class The classname which implements the protocol.
 * @param int $flags Should be set to STREAM_IS_URL if
 * protocol is a URL protocol. Default is 0, local
 * stream.
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
 * Restores a built-in wrapper previously unregistered with
 * stream_wrapper_unregister.
 *
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
 * Allows you to disable an already defined stream wrapper. Once the wrapper
 * has been disabled you may override it with a user-defined wrapper using
 * stream_wrapper_register or reenable it later on with
 * stream_wrapper_restore.
 *
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
