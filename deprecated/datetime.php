<?php

namespace Safe;

use Safe\Exceptions\DatetimeException;

/**
 * Identical to the date function except that
 * the time returned is Greenwich Mean Time (GMT).
 *
 * @param string $format The format of the outputted date string. See the formatting
 * options for the date function.
 * @param int $timestamp The optional timestamp parameter is an
 * integer Unix timestamp that defaults to the current
 * local time if a timestamp is not given. In other
 * words, it defaults to the value of time.
 * @return string Returns a formatted date string. If a non-numeric value is used for
 * timestamp, FALSE is returned and an
 * E_WARNING level error is emitted.
 * @throws DatetimeException
 * @deprecated The Safe version of this function is no longer needed in PHP 8.0+
 *
 */
function gmdate(string $format, int $timestamp = null): string
{
    error_clear_last();
    if ($timestamp !== null) {
        $result = \gmdate($format, $timestamp);
    } else {
        $result = \gmdate($format);
    }
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
}
