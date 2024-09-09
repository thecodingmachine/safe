<?php

namespace Safe;

use Safe\Exceptions\ZipException;

/**
 * Closes the specified directory entry.
 *
 * @param resource $zip_entry A directory entry previously opened zip_entry_open.
 * @throws ZipException
 *
 */
function zip_entry_close($zip_entry): void
{
    error_clear_last();
    $safeResult = \zip_entry_close($zip_entry);
    if ($safeResult === false) {
        throw ZipException::createFromPhpError();
    }
}


/**
 * Returns the compressed size of the specified directory entry.
 *
 * @param resource $zip_entry A directory entry returned by zip_read.
 * @return int The compressed size.
 * @throws ZipException
 *
 */
function zip_entry_compressedsize($zip_entry): int
{
    error_clear_last();
    $safeResult = \zip_entry_compressedsize($zip_entry);
    if ($safeResult === false) {
        throw ZipException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the compression method of the directory entry specified
 * by zip_entry.
 *
 * @param resource $zip_entry A directory entry returned by zip_read.
 * @return string The compression method.
 * @throws ZipException
 *
 */
function zip_entry_compressionmethod($zip_entry): string
{
    error_clear_last();
    $safeResult = \zip_entry_compressionmethod($zip_entry);
    if ($safeResult === false) {
        throw ZipException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the actual size of the specified directory entry.
 *
 * @param resource $zip_entry A directory entry returned by zip_read.
 * @return int The size of the directory entry.
 * @throws ZipException
 *
 */
function zip_entry_filesize($zip_entry): int
{
    error_clear_last();
    $safeResult = \zip_entry_filesize($zip_entry);
    if ($safeResult === false) {
        throw ZipException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the name of the specified directory entry.
 *
 * @param resource $zip_entry A directory entry returned by zip_read.
 * @return string The name of the directory entry.
 * @throws ZipException
 *
 */
function zip_entry_name($zip_entry): string
{
    error_clear_last();
    $safeResult = \zip_entry_name($zip_entry);
    if ($safeResult === false) {
        throw ZipException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Opens a directory entry in a zip file for reading.
 *
 * @param resource $zip_dp A valid resource handle returned by zip_open.
 * @param resource $zip_entry A directory entry returned by zip_read.
 * @param string $mode Any of the modes specified in the documentation of
 * fopen.
 *
 * Currently, mode is ignored and is always
 * "rb". This is due to the fact that zip support
 * in PHP is read only access.
 * @throws ZipException
 *
 */
function zip_entry_open($zip_dp, $zip_entry, string $mode = "rb"): void
{
    error_clear_last();
    $safeResult = \zip_entry_open($zip_dp, $zip_entry, $mode);
    if ($safeResult === false) {
        throw ZipException::createFromPhpError();
    }
}


/**
 * Reads from an open directory entry.
 *
 * @param resource $zip_entry A directory entry returned by zip_read.
 * @param int $len The number of bytes to return.
 *
 * This should be the uncompressed length you wish to read.
 * @return string Returns the data read, empty string on end of a file.
 * @throws ZipException
 *
 */
function zip_entry_read($zip_entry, int $len = 1024): string
{
    error_clear_last();
    $safeResult = \zip_entry_read($zip_entry, $len);
    if ($safeResult === false) {
        throw ZipException::createFromPhpError();
    }
    return $safeResult;
}
