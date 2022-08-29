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

/**
 * Returns the Unix timestamp corresponding to the arguments
 * given. This timestamp is a long integer containing the number of
 * seconds between the Unix Epoch (January 1 1970 00:00:00 GMT) and the time
 * specified.
 *
 * Arguments may be left out in order from right to left; any
 * arguments thus omitted will be set to the current value according
 * to the local date and time.
 *
 * @param int $hour The number of the hour relative to the start of the day determined by
 * month, day and year.
 * Negative values reference the hour before midnight of the day in question.
 * Values greater than 23 reference the appropriate hour in the following day(s).
 * @param int $minute The number of the minute relative to the start of the hour.
 * Negative values reference the minute in the previous hour.
 * Values greater than 59 reference the appropriate minute in the following hour(s).
 * @param int $second The number of seconds relative to the start of the minute.
 * Negative values reference the second in the previous minute.
 * Values greater than 59 reference the appropriate second in the following minute(s).
 * @param int $month The number of the month relative to the end of the previous year.
 * Values 1 to 12 reference the normal calendar months of the year in question.
 * Values less than 1 (including negative values) reference the months in the previous year in reverse order, so 0 is December, -1 is November, etc.
 * Values greater than 12 reference the appropriate month in the following year(s).
 * @param int $day The number of the day relative to the end of the previous month.
 * Values 1 to 28, 29, 30 or 31 (depending upon the month) reference the normal days in the relevant month.
 * Values less than 1 (including negative values) reference the days in the previous month, so 0 is the last day of the previous month, -1 is the day before that, etc.
 * Values greater than the number of days in the relevant month reference the appropriate day in the following month(s).
 * @param int $year The number of the year, may be a two or four digit value,
 * with values between 0-69 mapping to 2000-2069 and 70-100 to
 * 1970-2000. On systems where time_t is a 32bit signed integer, as
 * most common today, the valid range for year
 * is somewhere between 1901 and 2038.
 * @return int mktime returns the Unix timestamp of the arguments
 * given.
 * If the arguments are invalid, the function returns FALSE.
 * @throws DatetimeException
 * @deprecated The Safe version of this function is no longer needed in PHP 8.0+
 *
 */
function mktime(int $hour, int $minute = null, int $second = null, int $month = null, int $day = null, int $year = null): int
{
    error_clear_last();
    if ($year !== null) {
        $safeResult = \mktime($hour, $minute, $second, $month, $day, $year);
    } elseif ($day !== null) {
        $safeResult = \mktime($hour, $minute, $second, $month, $day);
    } elseif ($month !== null) {
        $safeResult = \mktime($hour, $minute, $second, $month);
    } elseif ($second !== null) {
        $safeResult = \mktime($hour, $minute, $second);
    } elseif ($minute !== null) {
        $safeResult = \mktime($hour, $minute);
    } else {
        $safeResult = \mktime($hour);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}
