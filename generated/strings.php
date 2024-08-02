<?php

namespace Safe;

use Safe\Exceptions\StringsException;

/**
 * convert_uudecode decodes a uuencoded string.
 *
 * @param string $string The uuencoded data.
 * @return string Returns the decoded data as a string.
 * @throws StringsException
 *
 */
function convert_uudecode(string $string): string
{
    error_clear_last();
    $safeResult = \convert_uudecode($string);
    if ($safeResult === false) {
        throw StringsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Decodes a hexadecimally encoded binary string.
 *
 * @param string $string Hexadecimal representation of data.
 * @return string Returns the binary representation of the given data.
 * @throws StringsException
 *
 */
function hex2bin(string $string): string
{
    error_clear_last();
    $safeResult = \hex2bin($string);
    if ($safeResult === false) {
        throw StringsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Calculates the MD5 hash of the file specified by the
 * filename parameter using the
 * RSA Data Security, Inc.
 * MD5 Message-Digest Algorithm, and returns that hash.
 * The hash is a 32-character hexadecimal number.
 *
 * @param string $filename The filename
 * @param bool $binary When TRUE, returns the digest in raw binary format with a length of
 * 16.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function md5_file(string $filename, bool $binary = false): string
{
    error_clear_last();
    $safeResult = \md5_file($filename, $binary);
    if ($safeResult === false) {
        throw StringsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param string $filename The filename of the file to hash.
 * @param bool $binary When TRUE, returns the digest in raw binary format with a length of
 * 20.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function sha1_file(string $filename, bool $binary = false): string
{
    error_clear_last();
    $safeResult = \sha1_file($filename, $binary);
    if ($safeResult === false) {
        throw StringsException::createFromPhpError();
    }
    return $safeResult;
}
