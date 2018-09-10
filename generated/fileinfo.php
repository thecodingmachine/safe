<?php

namespace Safe;

use Safe\Exceptions\FileinfoException;

/**
 * This function closes the resource opened by finfo_open.
 *
 * @param resource $finfo Fileinfo resource returned by finfo_open.
 * @throws FileinfoException
 *
 */
function finfo_close($finfo): void
{
    error_clear_last();
    $result = \finfo_close($finfo);
    if ($result === false) {
        throw FileinfoException::createFromPhpError();
    }
}


/**
 * Returns the MIME content type for a file as determined by using
 * information from the magic.mime file.
 *
 * @param string $filename Path to the tested file.
 * @return string Returns the content type in MIME format, like
 * text/plain or application/octet-stream,
 * .
 * @throws FileinfoException
 *
 */
function mime_content_type(string $filename): string
{
    error_clear_last();
    $result = \mime_content_type($filename);
    if ($result === false) {
        throw FileinfoException::createFromPhpError();
    }
    return $result;
}
