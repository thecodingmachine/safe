<?php

namespace Safe;

/**
 * This function closes the resource opened by finfo_open.
 * 
 * @param resource $finfo Fileinfo resource returned by finfo_open.
 * @throws Exceptions\FileinfoException
 * 
 */
function finfo_close($finfo): void
{
    error_clear_last();
    $result = \finfo_close($finfo);
    if ($result === FALSE) {
        throw Exceptions\FileinfoException::createFromPhpError();
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
 * @throws Exceptions\FileinfoException
 * 
 */
function mime_content_type(string $filename): string
{
    error_clear_last();
    $result = \mime_content_type($filename);
    if ($result === FALSE) {
        throw Exceptions\FileinfoException::createFromPhpError();
    }
    return $result;
}


