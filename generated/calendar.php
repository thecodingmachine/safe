<?php

namespace Safe;

use Safe\Exceptions\CalendarException;

/**
 * This function will return a Unix timestamp corresponding to the
 * Julian Day given in julian_day. The time returned is
 * UTC.
 *
 * @param int $julian_day A julian day number between 2440588 and 106751993607888
 * on 64bit systems, or between 2440588 and 2465443 on 32bit systems.
 * @return int The unix timestamp for the start (midnight, not noon) of the given Julian day
 * @throws CalendarException
 *
 */
function jdtounix(int $julian_day): int
{
    error_clear_last();
    $result = \jdtounix($julian_day);
    if ($result === false) {
        throw CalendarException::createFromPhpError();
    }
    return $result;
}


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
    error_clear_last();
    if ($timestamp !== null) {
        $result = \unixtojd($timestamp);
    }else {
        $result = \unixtojd();
    }
    if ($result === false) {
        throw CalendarException::createFromPhpError();
    }
    return $result;
}

