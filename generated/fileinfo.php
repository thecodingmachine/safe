<?php

namespace Safe;

use Safe\Exceptions\FileinfoException;

/**
 * This function closes the instance opened by finfo_open.
 *
 * @param resource $finfo An finfo instance, returned by finfo_open.
 * @throws FileinfoException
 *
 */
function finfo_close($finfo): void
{
    error_clear_last();
    $safeResult = \finfo_close($finfo);
    if ($safeResult === false) {
        throw FileinfoException::createFromPhpError();
    }
}


/**
 * Procedural style
 *
 * Object-oriented style (constructor):
 *
 * This function opens a magic database and returns its instance.
 *
 * @param int $flags One or disjunction of more Fileinfo
 * constants.
 * @param string $magic_database Name of a magic database file, usually something like
 * /path/to/magic.mime. If not specified, the
 * MAGIC environment variable is used. If the
 * environment variable isn't set, then PHP's bundled magic database will
 * be used.
 *
 * Passing NULL or an empty string will be equivalent to the default
 * value.
 * @return resource (Procedural style only)
 * Returns an finfo instance on success.
 * @throws FileinfoException
 *
 */
function finfo_open(int $flags = FILEINFO_NONE, string $magic_database = null)
{
    error_clear_last();
    if ($magic_database !== null) {
        $safeResult = \finfo_open($flags, $magic_database);
    } else {
        $safeResult = \finfo_open($flags);
    }
    if ($safeResult === false) {
        throw FileinfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the MIME content type for a file as determined by using
 * information from the magic.mime file.
 *
 * @param string|resource $filename Path to the tested file.
 * @return string Returns the content type in MIME format, like
 * text/plain or application/octet-stream.
 * @throws FileinfoException
 *
 */
function mime_content_type($filename): string
{
    error_clear_last();
    $safeResult = \mime_content_type($filename);
    if ($safeResult === false) {
        throw FileinfoException::createFromPhpError();
    }
    return $safeResult;
}
