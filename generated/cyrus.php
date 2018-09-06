<?php

namespace Safe;

/**
 * Binds callbacks to a Cyrus IMAP connection.
 * 
 * @param resource $connection The connection handle.
 * @param array $callbacks An array of callbacks.
 * @throws Exceptions\CyrusException
 * 
 */
function cyrus_bind($connection, array $callbacks): void
{
    error_clear_last();
    $result = \cyrus_bind($connection, $callbacks);
    if ($result === FALSE) {
        throw Exceptions\CyrusException::createFromPhpError();
    }
}


/**
 * Closes the connection to a Cyrus IMAP server.
 * 
 * @param resource $connection The connection handle.
 * @throws Exceptions\CyrusException
 * 
 */
function cyrus_close($connection): void
{
    error_clear_last();
    $result = \cyrus_close($connection);
    if ($result === FALSE) {
        throw Exceptions\CyrusException::createFromPhpError();
    }
}


/**
 * Connects to a Cyrus IMAP server.
 * 
 * @param string $host The Cyrus IMAP host name.
 * @param string $port The port number.
 * @param int $flags 
 * @return resource Returns a connection handler on success .
 * @throws Exceptions\CyrusException
 * 
 */
function cyrus_connect(string $host, string $port, int $flags)
{
    error_clear_last();
    if ($flags !== null) {
        $result = \cyrus_connect($host, $port, $flags);
    } elseif ($port !== null) {
        $result = \cyrus_connect($host, $port);
    } elseif ($host !== null) {
        $result = \cyrus_connect($host);
    }else {
        $result = \cyrus_connect();
    }
    if ($result === FALSE) {
        throw Exceptions\CyrusException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param resource $connection The connection handle.
 * @param string $trigger_name The trigger name.
 * @throws Exceptions\CyrusException
 * 
 */
function cyrus_unbind($connection, string $trigger_name): void
{
    error_clear_last();
    $result = \cyrus_unbind($connection, $trigger_name);
    if ($result === FALSE) {
        throw Exceptions\CyrusException::createFromPhpError();
    }
}


