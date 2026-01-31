<?php

namespace Safe;

use Safe\Exceptions\FtpException;

/**
 * @param \FTP\Connection $ftp
 * @param int $size
 * @param null|string $response
 * @throws FtpException
 *
 */
function ftp_alloc(\FTP\Connection $ftp, int $size, ?string &$response = null): void
{
    error_clear_last();
    $safeResult = \ftp_alloc($ftp, $size, $response);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $remote_filename
 * @param string $local_filename
 * @param FTP_ASCII|FTP_BINARY $mode
 * @throws FtpException
 *
 */
function ftp_append(\FTP\Connection $ftp, string $remote_filename, string $local_filename, int $mode = FTP_BINARY): void
{
    error_clear_last();
    $safeResult = \ftp_append($ftp, $remote_filename, $local_filename, $mode);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @throws FtpException
 *
 */
function ftp_cdup(\FTP\Connection $ftp): void
{
    error_clear_last();
    $safeResult = \ftp_cdup($ftp);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $directory
 * @throws FtpException
 *
 */
function ftp_chdir(\FTP\Connection $ftp, string $directory): void
{
    error_clear_last();
    $safeResult = \ftp_chdir($ftp, $directory);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param int $permissions
 * @param string $filename
 * @return int
 * @throws FtpException
 *
 */
function ftp_chmod(\FTP\Connection $ftp, int $permissions, string $filename): int
{
    error_clear_last();
    $safeResult = \ftp_chmod($ftp, $permissions, $filename);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @throws FtpException
 *
 */
function ftp_close(\FTP\Connection $ftp): void
{
    error_clear_last();
    $safeResult = \ftp_close($ftp);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param string $hostname
 * @param int $port
 * @param int $timeout
 * @return \FTP\Connection
 * @throws FtpException
 *
 */
function ftp_connect(string $hostname, int $port = 21, int $timeout = 90): \FTP\Connection
{
    error_clear_last();
    $safeResult = \ftp_connect($hostname, $port, $timeout);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @param string $filename
 * @throws FtpException
 *
 */
function ftp_delete(\FTP\Connection $ftp, string $filename): void
{
    error_clear_last();
    $safeResult = \ftp_delete($ftp, $filename);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param resource $stream
 * @param string $remote_filename
 * @param FTP_ASCII|FTP_BINARY $mode
 * @param int $offset
 * @throws FtpException
 *
 */
function ftp_fget(\FTP\Connection $ftp, $stream, string $remote_filename, int $mode = FTP_BINARY, int $offset = 0): void
{
    error_clear_last();
    $safeResult = \ftp_fget($ftp, $stream, $remote_filename, $mode, $offset);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $remote_filename
 * @param resource $stream
 * @param FTP_ASCII|FTP_BINARY $mode
 * @param int $offset
 * @throws FtpException
 *
 */
function ftp_fput(\FTP\Connection $ftp, string $remote_filename, $stream, int $mode = FTP_BINARY, int $offset = 0): void
{
    error_clear_last();
    $safeResult = \ftp_fput($ftp, $remote_filename, $stream, $mode, $offset);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $local_filename
 * @param string $remote_filename
 * @param FTP_ASCII|FTP_BINARY $mode
 * @param int $offset
 * @throws FtpException
 *
 */
function ftp_get(\FTP\Connection $ftp, string $local_filename, string $remote_filename, int $mode = FTP_BINARY, int $offset = 0): void
{
    error_clear_last();
    $safeResult = \ftp_get($ftp, $local_filename, $remote_filename, $mode, $offset);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $username
 * @param string $password
 * @throws FtpException
 *
 */
function ftp_login(\FTP\Connection $ftp, string $username, string $password): void
{
    error_clear_last();
    $safeResult = \ftp_login($ftp, $username, $password);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $directory
 * @return string
 * @throws FtpException
 *
 */
function ftp_mkdir(\FTP\Connection $ftp, string $directory): string
{
    error_clear_last();
    $safeResult = \ftp_mkdir($ftp, $directory);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @param string $directory
 * @return array
 * @throws FtpException
 *
 */
function ftp_mlsd(\FTP\Connection $ftp, string $directory): array
{
    error_clear_last();
    $safeResult = \ftp_mlsd($ftp, $directory);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @param string $remote_filename
 * @param string $local_filename
 * @param FTP_ASCII|FTP_BINARY $mode
 * @param int $offset
 * @return int
 * @throws FtpException
 *
 */
function ftp_nb_put(\FTP\Connection $ftp, string $remote_filename, string $local_filename, int $mode = FTP_BINARY, int $offset = 0): int
{
    error_clear_last();
    $safeResult = \ftp_nb_put($ftp, $remote_filename, $local_filename, $mode, $offset);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @param string $directory
 * @return array
 * @throws FtpException
 *
 */
function ftp_nlist(\FTP\Connection $ftp, string $directory): array
{
    error_clear_last();
    $safeResult = \ftp_nlist($ftp, $directory);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @param bool $enable
 * @throws FtpException
 *
 */
function ftp_pasv(\FTP\Connection $ftp, bool $enable): void
{
    error_clear_last();
    $safeResult = \ftp_pasv($ftp, $enable);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $remote_filename
 * @param string $local_filename
 * @param FTP_ASCII|FTP_BINARY $mode
 * @param int $offset
 * @throws FtpException
 *
 */
function ftp_put(\FTP\Connection $ftp, string $remote_filename, string $local_filename, int $mode = FTP_BINARY, int $offset = 0): void
{
    error_clear_last();
    $safeResult = \ftp_put($ftp, $remote_filename, $local_filename, $mode, $offset);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @return string
 * @throws FtpException
 *
 */
function ftp_pwd(\FTP\Connection $ftp): string
{
    error_clear_last();
    $safeResult = \ftp_pwd($ftp);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @param string $from
 * @param string $to
 * @throws FtpException
 *
 */
function ftp_rename(\FTP\Connection $ftp, string $from, string $to): void
{
    error_clear_last();
    $safeResult = \ftp_rename($ftp, $from, $to);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $directory
 * @throws FtpException
 *
 */
function ftp_rmdir(\FTP\Connection $ftp, string $directory): void
{
    error_clear_last();
    $safeResult = \ftp_rmdir($ftp, $directory);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $command
 * @throws FtpException
 *
 */
function ftp_site(\FTP\Connection $ftp, string $command): void
{
    error_clear_last();
    $safeResult = \ftp_site($ftp, $command);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
}


/**
 * @param \FTP\Connection $ftp
 * @param string $filename
 * @return int
 * @throws FtpException
 *
 */
function ftp_size(\FTP\Connection $ftp, string $filename): int
{
    error_clear_last();
    $safeResult = \ftp_size($ftp, $filename);
    if ($safeResult === -1) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $hostname
 * @param int $port
 * @param int $timeout
 * @return \FTP\Connection
 * @throws FtpException
 *
 */
function ftp_ssl_connect(string $hostname, int $port = 21, int $timeout = 90): \FTP\Connection
{
    error_clear_last();
    $safeResult = \ftp_ssl_connect($hostname, $port, $timeout);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \FTP\Connection $ftp
 * @return string
 * @throws FtpException
 *
 */
function ftp_systype(\FTP\Connection $ftp): string
{
    error_clear_last();
    $safeResult = \ftp_systype($ftp);
    if ($safeResult === false) {
        throw FtpException::createFromPhpError();
    }
    return $safeResult;
}
