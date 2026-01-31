<?php

namespace Safe;

use Safe\Exceptions\SwooleException;

/**
 * @param string $hostname
 * @param callable $callback
 * @throws SwooleException
 *
 */
function swoole_async_dns_lookup(string $hostname, callable $callback): void
{
    error_clear_last();
    $safeResult = \swoole_async_dns_lookup($hostname, $callback);
    if ($safeResult === false) {
        throw SwooleException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param string $callback
 * @throws SwooleException
 *
 */
function swoole_async_readfile(string $filename, string $callback): void
{
    error_clear_last();
    $safeResult = \swoole_async_readfile($filename, $callback);
    if ($safeResult === false) {
        throw SwooleException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param string $content
 * @param int $offset
 * @param callable $callback
 * @throws SwooleException
 *
 */
function swoole_async_write(string $filename, string $content, ?int $offset = null, ?callable $callback = null): void
{
    error_clear_last();
    if ($callback !== null) {
        $safeResult = \swoole_async_write($filename, $content, $offset, $callback);
    } elseif ($offset !== null) {
        $safeResult = \swoole_async_write($filename, $content, $offset);
    } else {
        $safeResult = \swoole_async_write($filename, $content);
    }
    if ($safeResult === false) {
        throw SwooleException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param string $content
 * @param callable $callback
 * @param int $flags
 * @throws SwooleException
 *
 */
function swoole_async_writefile(string $filename, string $content, ?callable $callback = null, int $flags = 0): void
{
    error_clear_last();
    if ($flags !== 0) {
        $safeResult = \swoole_async_writefile($filename, $content, $callback, $flags);
    } elseif ($callback !== null) {
        $safeResult = \swoole_async_writefile($filename, $content, $callback);
    } else {
        $safeResult = \swoole_async_writefile($filename, $content);
    }
    if ($safeResult === false) {
        throw SwooleException::createFromPhpError();
    }
}


/**
 * @param callable $callback
 * @throws SwooleException
 *
 */
function swoole_event_defer(callable $callback): void
{
    error_clear_last();
    $safeResult = \swoole_event_defer($callback);
    if ($safeResult === false) {
        throw SwooleException::createFromPhpError();
    }
}


/**
 * @param int $fd
 * @throws SwooleException
 *
 */
function swoole_event_del(int $fd): void
{
    error_clear_last();
    $safeResult = \swoole_event_del($fd);
    if ($safeResult === false) {
        throw SwooleException::createFromPhpError();
    }
}


/**
 * @param int $fd
 * @param string $data
 * @throws SwooleException
 *
 */
function swoole_event_write(int $fd, string $data): void
{
    error_clear_last();
    $safeResult = \swoole_event_write($fd, $data);
    if ($safeResult === false) {
        throw SwooleException::createFromPhpError();
    }
}
