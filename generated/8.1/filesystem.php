<?php

namespace Safe;

use Safe\Exceptions\FilesystemException;

/**
 * @param string $filename
 * @param int|string $group
 * @throws FilesystemException
 *
 */
function chgrp(string $filename, $group): void
{
    error_clear_last();
    $safeResult = \chgrp($filename, $group);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param int $permissions
 * @throws FilesystemException
 *
 */
function chmod(string $filename, int $permissions): void
{
    error_clear_last();
    $safeResult = \chmod($filename, $permissions);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param int|string $user
 * @throws FilesystemException
 *
 */
function chown(string $filename, $user): void
{
    error_clear_last();
    $safeResult = \chown($filename, $user);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $source
 * @param string $dest
 * @param resource $context
 * @throws FilesystemException
 *
 */
function copy(string $source, string $dest, $context = null): void
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \copy($source, $dest, $context);
    } else {
        $safeResult = \copy($source, $dest);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $directory
 * @return float
 * @throws FilesystemException
 *
 */
function disk_free_space(string $directory): float
{
    error_clear_last();
    $safeResult = \disk_free_space($directory);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $directory
 * @return float
 * @throws FilesystemException
 *
 */
function disk_total_space(string $directory): float
{
    error_clear_last();
    $safeResult = \disk_total_space($directory);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @throws FilesystemException
 *
 */
function fclose($stream): void
{
    error_clear_last();
    $safeResult = \fclose($stream);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @throws FilesystemException
 *
 */
function fdatasync($stream): void
{
    error_clear_last();
    $safeResult = \fdatasync($stream);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @throws FilesystemException
 *
 */
function fflush($stream): void
{
    error_clear_last();
    $safeResult = \fflush($stream);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param bool $use_include_path
 * @param null|resource $context
 * @param int $offset
 * @param 0|positive-int $length
 * @return string
 * @throws FilesystemException
 *
 */
function file_get_contents(string $filename, bool $use_include_path = false, $context = null, int $offset = 0, ?int $length = null): string
{
    error_clear_last();
    if ($length !== null) {
        $safeResult = \file_get_contents($filename, $use_include_path, $context, $offset, $length);
    } elseif ($offset !== 0) {
        $safeResult = \file_get_contents($filename, $use_include_path, $context, $offset);
    } elseif ($context !== null) {
        $safeResult = \file_get_contents($filename, $use_include_path, $context);
    } else {
        $safeResult = \file_get_contents($filename, $use_include_path);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param mixed $data
 * @param int $flags
 * @param null|resource $context
 * @return 0|positive-int
 * @throws FilesystemException
 *
 */
function file_put_contents(string $filename, $data, int $flags = 0, $context = null): int
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \file_put_contents($filename, $data, $flags, $context);
    } else {
        $safeResult = \file_put_contents($filename, $data, $flags);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param int-mask $flags
 * @param resource $context
 * @return list
 * @throws FilesystemException
 *
 */
function file(string $filename, int $flags = 0, $context = null): array
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \file($filename, $flags, $context);
    } else {
        $safeResult = \file($filename, $flags);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return int
 * @throws FilesystemException
 *
 */
function fileatime(string $filename): int
{
    error_clear_last();
    $safeResult = \fileatime($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return int
 * @throws FilesystemException
 *
 */
function filectime(string $filename): int
{
    error_clear_last();
    $safeResult = \filectime($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return int
 * @throws FilesystemException
 *
 */
function fileinode(string $filename): int
{
    error_clear_last();
    $safeResult = \fileinode($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return int
 * @throws FilesystemException
 *
 */
function filemtime(string $filename): int
{
    error_clear_last();
    $safeResult = \filemtime($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return int
 * @throws FilesystemException
 *
 */
function fileowner(string $filename): int
{
    error_clear_last();
    $safeResult = \fileowner($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return int
 * @throws FilesystemException
 *
 */
function fileperms(string $filename): int
{
    error_clear_last();
    $safeResult = \fileperms($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return 0|positive-int
 * @throws FilesystemException
 *
 */
function filesize(string $filename): int
{
    error_clear_last();
    $safeResult = \filesize($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return string
 * @throws FilesystemException
 *
 */
function filetype(string $filename): string
{
    error_clear_last();
    $safeResult = \filetype($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param int-mask $operation
 * @param 0|1|null $would_block
 * @throws FilesystemException
 *
 */
function flock($stream, int $operation, ?int &$would_block = null): void
{
    error_clear_last();
    $safeResult = \flock($stream, $operation, $would_block);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param string $mode
 * @param bool $use_include_path
 * @param null|resource $context
 * @return resource
 * @throws FilesystemException
 *
 */
function fopen(string $filename, string $mode, bool $use_include_path = false, $context = null)
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \fopen($filename, $mode, $use_include_path, $context);
    } else {
        $safeResult = \fopen($filename, $mode, $use_include_path);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param positive-int $length
 * @return string
 * @throws FilesystemException
 *
 */
function fread($stream, int $length): string
{
    error_clear_last();
    $safeResult = \fread($stream, $length);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @return array
 * @throws FilesystemException
 *
 */
function fstat($stream): array
{
    error_clear_last();
    $safeResult = \fstat($stream);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @throws FilesystemException
 *
 */
function fsync($stream): void
{
    error_clear_last();
    $safeResult = \fsync($stream);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @return int
 * @throws FilesystemException
 *
 */
function ftell($stream): int
{
    error_clear_last();
    $safeResult = \ftell($stream);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param 0|positive-int $size
 * @throws FilesystemException
 *
 */
function ftruncate($stream, int $size): void
{
    error_clear_last();
    $safeResult = \ftruncate($stream, $size);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param resource $handle
 * @param string $string
 * @param 0|positive-int $length
 * @return 0|positive-int
 * @throws FilesystemException
 *
 */
function fwrite($handle, string $string, ?int $length = null): int
{
    error_clear_last();
    if ($length !== null) {
        $safeResult = \fwrite($handle, $string, $length);
    } else {
        $safeResult = \fwrite($handle, $string);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $pattern
 * @param int $flags
 * @return list
 * @throws FilesystemException
 *
 */
function glob(string $pattern, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \glob($pattern, $flags);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param int|string $group
 * @throws FilesystemException
 *
 */
function lchgrp(string $filename, $group): void
{
    error_clear_last();
    $safeResult = \lchgrp($filename, $group);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param int|string $user
 * @throws FilesystemException
 *
 */
function lchown(string $filename, $user): void
{
    error_clear_last();
    $safeResult = \lchown($filename, $user);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $target
 * @param string $link
 * @throws FilesystemException
 *
 */
function link(string $target, string $link): void
{
    error_clear_last();
    $safeResult = \link($target, $link);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @return array
 * @throws FilesystemException
 *
 */
function lstat(string $filename): array
{
    error_clear_last();
    $safeResult = \lstat($filename);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $directory
 * @param int $permissions
 * @param bool $recursive
 * @param resource $context
 * @throws FilesystemException
 *
 */
function mkdir(string $directory, int $permissions = 0777, bool $recursive = false, $context = null): void
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \mkdir($directory, $permissions, $recursive, $context);
    } else {
        $safeResult = \mkdir($directory, $permissions, $recursive);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param bool $process_sections
 * @param int $scanner_mode
 * @return array
 * @throws FilesystemException
 *
 */
function parse_ini_file(string $filename, bool $process_sections = false, int $scanner_mode = INI_SCANNER_NORMAL): array
{
    error_clear_last();
    $safeResult = \parse_ini_file($filename, $process_sections, $scanner_mode);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $ini_string
 * @param bool $process_sections
 * @param int $scanner_mode
 * @return array
 * @throws FilesystemException
 *
 */
function parse_ini_string(string $ini_string, bool $process_sections = false, int $scanner_mode = INI_SCANNER_NORMAL): array
{
    error_clear_last();
    $safeResult = \parse_ini_string($ini_string, $process_sections, $scanner_mode);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $handle
 * @return int
 * @throws FilesystemException
 *
 */
function pclose($handle): int
{
    error_clear_last();
    $safeResult = \pclose($handle);
    if ($safeResult === -1) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $command
 * @param string $mode
 * @return resource
 * @throws FilesystemException
 *
 */
function popen(string $command, string $mode)
{
    error_clear_last();
    $safeResult = \popen($command, $mode);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param bool $use_include_path
 * @param resource $context
 * @return 0|positive-int
 * @throws FilesystemException
 *
 */
function readfile(string $filename, bool $use_include_path = false, $context = null): int
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \readfile($filename, $use_include_path, $context);
    } else {
        $safeResult = \readfile($filename, $use_include_path);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $path
 * @return string
 * @throws FilesystemException
 *
 */
function readlink(string $path): string
{
    error_clear_last();
    $safeResult = \readlink($path);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $path
 * @return non-empty-string
 * @throws FilesystemException
 *
 */
function realpath(string $path): string
{
    error_clear_last();
    $safeResult = \realpath($path);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $oldname
 * @param string $newname
 * @param resource $context
 * @throws FilesystemException
 *
 */
function rename(string $oldname, string $newname, $context = null): void
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \rename($oldname, $newname, $context);
    } else {
        $safeResult = \rename($oldname, $newname);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @throws FilesystemException
 *
 */
function rewind($stream): void
{
    error_clear_last();
    $safeResult = \rewind($stream);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $directory
 * @param resource $context
 * @throws FilesystemException
 *
 */
function rmdir(string $directory, $context = null): void
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \rmdir($directory, $context);
    } else {
        $safeResult = \rmdir($directory);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $target
 * @param string $link
 * @throws FilesystemException
 *
 */
function symlink(string $target, string $link): void
{
    error_clear_last();
    $safeResult = \symlink($target, $link);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $directory
 * @param string $prefix
 * @return non-falsy-string
 * @throws FilesystemException
 *
 */
function tempnam(string $directory, string $prefix): string
{
    error_clear_last();
    $safeResult = \tempnam($directory, $prefix);
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return resource
 * @throws FilesystemException
 *
 */
function tmpfile()
{
    error_clear_last();
    $safeResult = \tmpfile();
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param int $time
 * @param int $atime
 * @throws FilesystemException
 *
 */
function touch(string $filename, ?int $time = null, ?int $atime = null): void
{
    error_clear_last();
    if ($atime !== null) {
        $safeResult = \touch($filename, $time, $atime);
    } elseif ($time !== null) {
        $safeResult = \touch($filename, $time);
    } else {
        $safeResult = \touch($filename);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param resource $context
 * @throws FilesystemException
 *
 */
function unlink(string $filename, $context = null): void
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \unlink($filename, $context);
    } else {
        $safeResult = \unlink($filename);
    }
    if ($safeResult === false) {
        throw FilesystemException::createFromPhpError();
    }
}
