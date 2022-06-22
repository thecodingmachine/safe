<?php

namespace Safe;

use Safe\Exceptions\CalendarException;

/**
 * Return the Julian Day for a Unix timestamp
 * (seconds since 1.1.1970), or for the current day if no
 * timestamp is given. Either way, the time is regarded
 * as local time (not UTC).
 *
 * @param int $timestamp A unix timestamp to convert.
 * @return int A julian day number as integer.
 * @throws CalendarException
 *
 */
function unixtojd(int $timestamp = null): int
{
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    if ($timestamp !== null) {
        $result = \unixtojd($timestamp);
    } else {
        $result = \unixtojd();
    }
    restore_error_handler();

    if ($result === false) {
        throw CalendarException::createFromPhpError($error);
    }
    return $result;
}
