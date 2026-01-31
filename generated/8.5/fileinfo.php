<?php

namespace Safe;

use Safe\Exceptions\FileinfoException;

/**
 * @param \finfo $finfo
 * @throws FileinfoException
 *
 */
function finfo_close(\finfo $finfo): void
{
    error_clear_last();
    $safeResult = \finfo_close($finfo);
    if ($safeResult === false) {
        throw FileinfoException::createFromPhpError();
    }
}


/**
 * @param int $flags
 * @param null|string $magic_database
 * @return \finfo
 * @throws FileinfoException
 *
 */
function finfo_open(int $flags = FILEINFO_NONE, ?string $magic_database = null): \finfo
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
 * @param resource|string $filename
 * @return string
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
