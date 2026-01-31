<?php

namespace Safe;

use Safe\Exceptions\DatetimeException;

/**
 * This is the procedural version of
 * DateTimeImmutable::__construct.
 *
 * Unlike the DateTimeImmutable constructor, it will return
 * FALSE instead of an exception if the passed in
 * datetime string is invalid.
 *
 * @param string $datetime
 * @param \DateTimeZone|null $timezone
 * @return \DateTimeImmutable Returns a new DateTimeImmutable instance
 * @throws DatetimeException
 *
 */
function date_create_immutable(string $datetime = "now", ?\DateTimeZone $timezone = null): \DateTimeImmutable
{
    error_clear_last();
    if ($timezone !== null) {
        $safeResult = \date_create_immutable($datetime, $timezone);
    } else {
        $safeResult = \date_create_immutable($datetime);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This is the procedural version of
 * DateTime::__construct.
 *
 * Unlike the DateTime constructor, it will return
 * FALSE instead of an exception if the passed in
 * datetime string is invalid.
 *
 * @param null|string $datetime
 * @param \DateTimeZone|null $timezone
 * @return \DateTime Returns a new DateTime instance
 * @throws DatetimeException
 *
 */
function date_create(?string $datetime = "now", ?\DateTimeZone $timezone = null): \DateTime
{
    error_clear_last();
    if ($timezone !== null) {
        $safeResult = \date_create($datetime, $timezone);
    } else {
        $safeResult = \date_create($datetime);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns associative array with detailed info about given date/time.
 *
 * @param string $format Documentation on how the format is used, please
 * refer to the documentation of
 * DateTimeImmutable::createFromFormat. The same
 * rules apply.
 * @param string $datetime String representing the date/time.
 * @return array{year: int|false, month: int|false, day: int|false, hour: int|false, minute: int|false, second: int|false, fraction: float|false, warning_count: int, warnings: string[], error_count: int, errors: string[], is_localtime: bool, zone_type: int|bool, zone: int|bool, is_dst: bool, tz_abbr: string, tz_id: string, relative: array{year: int, month: int, day: int, hour: int, minute: int, second: int, weekday: int, weekdays: int, first_day_of_month: bool, last_day_of_month: bool}}|null Returns associative array with detailed info about given date/time.
 *
 * The returned array has keys for year,
 * month, day, hour,
 * minute, second,
 * fraction, and is_localtime.
 *
 * If is_localtime is present then
 * zone_type indicates the type of timezone. For type
 * 1 (UTC offset) the zone,
 * is_dst fields are added; for type 2
 * (abbreviation) the fields tz_abbr,
 * is_dst are added; and for type 3
 * (timezone identifier) the tz_abbr,
 * tz_id are added.
 *
 * The array includes warning_count and
 * warnings fields. The first one indicate how many
 * warnings there were.
 * The keys of elements warnings array indicate the
 * position in the given datetime where the warning
 * occurred, with the string value describing the warning itself. An example
 * below shows such a warning.
 *
 * The array also contains error_count and
 * errors fields. The first one indicate how many errors
 * were found.
 * The keys of elements errors array indicate the
 * position in the given datetime where the error
 * occurred, with the string value describing the error itself. An example
 * below shows such an error.
 * @throws DatetimeException
 *
 */
function date_parse_from_format(string $format, string $datetime): ?array
{
    error_clear_last();
    $safeResult = \date_parse_from_format($format, $datetime);
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * date_parse parses the given
 * datetime string according to the same rules as
 * strtotime and
 * DateTimeImmutable::__construct. Instead of returning a
 * Unix timestamp (with strtotime) or a
 * DateTimeImmutable object (with
 * DateTimeImmutable::__construct), it returns an
 * associative array with the information that it could detect in the given
 * datetime string.
 *
 * If no information about a certain group of elements can be found, these
 * array elements will be set to FALSE or are missing. If needed for
 * constructing a timestamp or DateTimeImmutable object from
 * the same datetime string, more fields can be set to
 * a non-FALSE value. See the examples for cases where that happens.
 *
 * @param string $datetime Date/time in format accepted by
 * DateTimeImmutable::__construct.
 * @return array{year: int|false, month: int|false, day: int|false, hour: int|false, minute: int|false, second: int|false, fraction: float|false, warning_count: int, warnings: string[], error_count: int, errors: string[], is_localtime: bool, zone_type: int|bool, zone: int|bool, is_dst: bool, tz_abbr: string, tz_id: string, relative: array{year: int, month: int, day: int, hour: int, minute: int, second: int, weekday: int, weekdays: int, first_day_of_month: bool, last_day_of_month: bool}}|null Returns array with information about the parsed date/time.
 *
 * The returned array has keys for year,
 * month, day, hour,
 * minute, second,
 * fraction, and is_localtime.
 *
 * If is_localtime is present then
 * zone_type indicates the type of timezone. For type
 * 1 (UTC offset) the zone,
 * is_dst fields are added; for type 2
 * (abbreviation) the fields tz_abbr,
 * is_dst are added; and for type 3
 * (timezone identifier) the tz_abbr,
 * tz_id are added.
 *
 * If relative time elements are present in the
 * datetime string such as +3 days,
 * the then returned array includes a nested array with the key
 * relative. This array then contains the keys
 * year, month, day,
 * hour, minute,
 * second, and if necessary weekday, and
 * weekdays, depending on the string that was passed in.
 *
 * The array includes warning_count and
 * warnings fields. The first one indicate how many
 * warnings there were.
 * The keys of elements warnings array indicate the
 * position in the given datetime where the warning
 * occurred, with the string value describing the warning itself.
 *
 * The array also contains error_count and
 * errors fields. The first one indicate how many errors
 * were found.
 * The keys of elements errors array indicate the
 * position in the given datetime where the error
 * occurred, with the string value describing the error itself.
 *
 */
function date_parse(string $datetime): ?array
{
    error_clear_last();
    $safeResult = \date_parse($datetime);
    return $safeResult;
}


/**
 *
 *
 * @param int $timestamp Unix timestamp.
 * @param float $latitude Latitude in degrees.
 * @param float $longitude Longitude in degrees.
 * @return array{sunrise: int|bool,sunset: int|bool,transit: int|bool,civil_twilight_begin: int|bool,civil_twilight_end: int|bool,nautical_twilight_begin: int|bool,nautical_twilight_end: int|bool,astronomical_twilight_begin: int|bool,astronomical_twilight_end: int|bool}|false Returns an array whose structure is detailed in the following list:
 *
 *
 *
 * sunrise
 *
 *
 * The timestamp of the sunrise (zenith angle = 90°35').
 *
 *
 *
 *
 * sunset
 *
 *
 * The timestamp of the sunset (zenith angle = 90°35').
 *
 *
 *
 *
 * transit
 *
 *
 * The timestamp when the sun is at its zenith, i.e. has reached its topmost
 * point.
 *
 *
 *
 *
 * civil_twilight_begin
 *
 *
 * The start of the civil dawn (zenith angle = 96°). It ends at
 * sunrise.
 *
 *
 *
 *
 * civil_twilight_end
 *
 *
 * The end of the civil dusk (zenith angle = 96°). It starts at
 * sunset.
 *
 *
 *
 *
 * nautical_twilight_begin
 *
 *
 * The start of the nautical dawn (zenith angle = 102°). It ends at
 * civil_twilight_begin.
 *
 *
 *
 *
 * nautical_twilight_end
 *
 *
 * The end of the nautical dusk (zenith angle = 102°). It starts at
 * civil_twilight_end.
 *
 *
 *
 *
 * astronomical_twilight_begin
 *
 *
 * The start of the astronomical dawn (zenith angle = 108°). It ends at
 * nautical_twilight_begin.
 *
 *
 *
 *
 * astronomical_twilight_end
 *
 *
 * The end of the astronomical dusk (zenith angle = 108°). It starts at
 * nautical_twilight_end.
 *
 *
 *
 *
 *
 * The values of the array elements are either UNIX timestamps, FALSE if the
 * sun is below the respective zenith for the whole day, or TRUE if the sun is
 * above the respective zenith for the whole day.
 *
 */
function date_sun_info(int $timestamp, float $latitude, float $longitude)
{
    error_clear_last();
    $safeResult = \date_sun_info($timestamp, $latitude, $longitude);
    return $safeResult;
}


/**
 * date_sunrise returns the sunrise time for a given
 * day (specified as a timestamp) and location.
 *
 * @param int $timestamp The timestamp of the day from which the sunrise
 * time is taken.
 * @param int $returnFormat
 * returnFormat constants
 *
 *
 *
 * constant
 * description
 * example
 *
 *
 *
 *
 * SUNFUNCS_RET_STRING
 * returns the result as string
 * 16:46
 *
 *
 * SUNFUNCS_RET_DOUBLE
 * returns the result as float
 * 16.78243132
 *
 *
 * SUNFUNCS_RET_TIMESTAMP
 * returns the result as int (timestamp)
 * 1095034606
 *
 *
 *
 *
 * @param float|null $latitude Defaults to North, pass in a negative value for South.
 * See also: date.default_latitude
 * @param float|null $longitude Defaults to East, pass in a negative value for West.
 * See also: date.default_longitude
 * @param float|null $zenith zenith is the angle between the center of the sun
 * and a line perpendicular to earth's surface. It defaults to
 * date.sunrise_zenith
 *
 * Common zenith angles
 *
 *
 *
 * Angle
 * Description
 *
 *
 *
 *
 * 90°50'
 * Sunrise: the point where the sun becomes visible.
 *
 *
 * 96°
 * Civil twilight: conventionally used to signify the start of dawn.
 *
 *
 * 102°
 * Nautical twilight: the point at which the horizon starts being visible at sea.
 *
 *
 * 108°
 * Astronomical twilight: the point at which the sun starts being the source of any illumination.
 *
 *
 *
 *
 * @param float|null $utcOffset Specified in hours.
 * The utcOffset is ignored, if
 * returnFormat is
 * SUNFUNCS_RET_TIMESTAMP.
 * @return mixed Returns the sunrise time in a specified returnFormat on
 * success. One potential reason for failure is that the
 * sun does not rise at all, which happens inside the polar circles for part of
 * the year.
 * @throws DatetimeException
 *
 */
function date_sunrise(int $timestamp, int $returnFormat = SUNFUNCS_RET_STRING, ?float $latitude = null, ?float $longitude = null, ?float $zenith = null, ?float $utcOffset = null)
{
    error_clear_last();
    if ($utcOffset !== null) {
        $safeResult = \date_sunrise($timestamp, $returnFormat, $latitude, $longitude, $zenith, $utcOffset);
    } elseif ($zenith !== null) {
        $safeResult = \date_sunrise($timestamp, $returnFormat, $latitude, $longitude, $zenith);
    } elseif ($longitude !== null) {
        $safeResult = \date_sunrise($timestamp, $returnFormat, $latitude, $longitude);
    } elseif ($latitude !== null) {
        $safeResult = \date_sunrise($timestamp, $returnFormat, $latitude);
    } else {
        $safeResult = \date_sunrise($timestamp, $returnFormat);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * date_sunset returns the sunset time for a given
 * day (specified as a timestamp) and location.
 *
 * @param int $timestamp The timestamp of the day from which the sunset
 * time is taken.
 * @param int $returnFormat
 * returnFormat constants
 *
 *
 *
 * constant
 * description
 * example
 *
 *
 *
 *
 * SUNFUNCS_RET_STRING
 * returns the result as string
 * 16:46
 *
 *
 * SUNFUNCS_RET_DOUBLE
 * returns the result as float
 * 16.78243132
 *
 *
 * SUNFUNCS_RET_TIMESTAMP
 * returns the result as int (timestamp)
 * 1095034606
 *
 *
 *
 *
 * @param float|null $latitude Defaults to North, pass in a negative value for South.
 * See also: date.default_latitude
 * @param float|null $longitude Defaults to East, pass in a negative value for West.
 * See also: date.default_longitude
 * @param float|null $zenith zenith is the angle between the center of the sun
 * and a line perpendicular to earth's surface. It defaults to
 * date.sunset_zenith
 *
 * Common zenith angles
 *
 *
 *
 * Angle
 * Description
 *
 *
 *
 *
 * 90°50'
 * Sunset: the point where the sun becomes invisible.
 *
 *
 * 96°
 * Civil twilight: conventionally used to signify the end of dusk.
 *
 *
 * 102°
 * Nautical twilight: the point at which the horizon ends being visible at sea.
 *
 *
 * 108°
 * Astronomical twilight: the point at which the sun ends being the source of any illumination.
 *
 *
 *
 *
 * @param float|null $utcOffset Specified in hours.
 * The utcOffset is ignored, if
 * returnFormat is
 * SUNFUNCS_RET_TIMESTAMP.
 * @return mixed Returns the sunset time in a specified returnFormat on
 * success. One potential reason for failure is that the
 * sun does not set at all, which happens inside the polar circles for part of
 * the year.
 * @throws DatetimeException
 *
 */
function date_sunset(int $timestamp, int $returnFormat = SUNFUNCS_RET_STRING, ?float $latitude = null, ?float $longitude = null, ?float $zenith = null, ?float $utcOffset = null)
{
    error_clear_last();
    if ($utcOffset !== null) {
        $safeResult = \date_sunset($timestamp, $returnFormat, $latitude, $longitude, $zenith, $utcOffset);
    } elseif ($zenith !== null) {
        $safeResult = \date_sunset($timestamp, $returnFormat, $latitude, $longitude, $zenith);
    } elseif ($longitude !== null) {
        $safeResult = \date_sunset($timestamp, $returnFormat, $latitude, $longitude);
    } elseif ($latitude !== null) {
        $safeResult = \date_sunset($timestamp, $returnFormat, $latitude);
    } else {
        $safeResult = \date_sunset($timestamp, $returnFormat);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns a string formatted according to the given format string using the
 * given integer timestamp (Unix timestamp) or the current time
 * if no timestamp is given. In other words, timestamp
 * is optional and defaults to the value of time.
 *
 * @param string $format Format accepted by DateTimeInterface::format.
 * @param int|null $timestamp The optional timestamp parameter is an
 * int Unix timestamp that defaults to the current
 * local time if timestamp is omitted or NULL. In other
 * words, it defaults to the value of time.
 * @return string Returns a formatted date string.
 *
 */
function date(string $format, ?int $timestamp = null): string
{
    error_clear_last();
    if ($timestamp !== null) {
        $safeResult = \date($format, $timestamp);
    } else {
        $safeResult = \date($format);
    }
    return $safeResult;
}


/**
 * Identical to mktime except the passed parameters represents a
 * GMT date. gmmktime internally uses mktime
 * so only times valid in derived local time can be used.
 *
 * Like mktime, optional arguments may be left out in
 * order from right to left, with any omitted arguments being set to the
 * current corresponding GMT value.
 *
 * @param int $hour The number of the hour relative to the start of the day determined by
 * month, day and year.
 * Negative values reference the hour before midnight of the day in question.
 * Values greater than 23 reference the appropriate hour in the following day(s).
 * @param int|null $minute The number of the minute relative to the start of the hour.
 * Negative values reference the minute in the previous hour.
 * Values greater than 59 reference the appropriate minute in the following hour(s).
 * @param int|null $second The number of seconds relative to the start of the minute.
 * Negative values reference the second in the previous minute.
 * Values greater than 59 reference the appropriate second in the following minute(s).
 * @param int|null $month The number of the month relative to the end of the previous year.
 * Values 1 to 12 reference the normal calendar months of the year in question.
 * Values less than 1 (including negative values) reference the months in the previous year in reverse order, so 0 is December, -1 is November, etc.
 * Values greater than 12 reference the appropriate month in the following year(s).
 * @param int|null $day The number of the day relative to the end of the previous month.
 * Values 1 to 28, 29, 30 or 31 (depending upon the month) reference the normal days in the relevant month.
 * Values less than 1 (including negative values) reference the days in the previous month, so 0 is the last day of the previous month, -1 is the day before that, etc.
 * Values greater than the number of days in the relevant month reference the appropriate day in the following month(s).
 * @param int|null $year The year
 * @return int Returns a int Unix timestamp on success, or FALSE if the
 * timestamp doesn't fit in a PHP integer.
 * @throws DatetimeException
 *
 */
function gmmktime(int $hour, ?int $minute = null, ?int $second = null, ?int $month = null, ?int $day = null, ?int $year = null): int
{
    error_clear_last();
    if ($year !== null) {
        $safeResult = \gmmktime($hour, $minute, $second, $month, $day, $year);
    } elseif ($day !== null) {
        $safeResult = \gmmktime($hour, $minute, $second, $month, $day);
    } elseif ($month !== null) {
        $safeResult = \gmmktime($hour, $minute, $second, $month);
    } elseif ($second !== null) {
        $safeResult = \gmmktime($hour, $minute, $second);
    } elseif ($minute !== null) {
        $safeResult = \gmmktime($hour, $minute);
    } else {
        $safeResult = \gmmktime($hour);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Behaves the same as strftime except that the
 * time returned is Greenwich Mean Time (GMT). For example, when run
 * in Eastern Standard Time (GMT -0500), the first line below prints
 * "Dec 31 1998 20:00:00", while the second prints "Jan 01 1999
 * 01:00:00".
 *
 * @param string $format See description in strftime.
 * @param int|null $timestamp The optional timestamp parameter is an
 * int Unix timestamp that defaults to the current
 * local time if timestamp is omitted or NULL. In other
 * words, it defaults to the value of time.
 * @return string Returns a string formatted according to the given format string
 * using the given timestamp or the current
 * local time if no timestamp is given.  Month and weekday names and
 * other language dependent strings respect the current locale set
 * with setlocale.
 * On failure, FALSE is returned.
 * @throws DatetimeException
 *
 */
function gmstrftime(string $format, ?int $timestamp = null): string
{
    error_clear_last();
    if ($timestamp !== null) {
        $safeResult = \gmstrftime($format, $timestamp);
    } else {
        $safeResult = \gmstrftime($format);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns a number formatted according to the given format string using the
 * given integer timestamp or the current local time
 * if no timestamp is given. In other words, timestamp
 * is optional and defaults to the value of time.
 *
 * Unlike the function date, idate
 * accepts just one char in the format parameter.
 *
 * @param string $format
 * The following characters are recognized in the
 * format parameter string
 *
 *
 *
 * format character
 * Description
 *
 *
 *
 *
 * B
 * Swatch Beat/Internet Time
 *
 *
 * d
 * Day of the month
 *
 *
 * h
 * Hour (12 hour format)
 *
 *
 * H
 * Hour (24 hour format)
 *
 *
 * i
 * Minutes
 *
 *
 * I (uppercase i)
 * returns 1 if DST is activated,
 * 0 otherwise
 *
 *
 * L (uppercase l)
 * returns 1 for leap year,
 * 0 otherwise
 *
 *
 * m
 * Month number
 *
 *
 * N
 * ISO-8601 day of the week (1 for Monday
 * through 7 for Sunday)
 *
 *
 * o
 * ISO-8601 year (4 digits)
 *
 *
 * s
 * Seconds
 *
 *
 * t
 * Days in current month
 *
 *
 * U
 * Seconds since the Unix Epoch - January 1 1970 00:00:00 UTC -
 * this is the same as time
 *
 *
 * w
 * Day of the week (0 on Sunday)
 *
 *
 * W
 * ISO-8601 week number of year, weeks starting on
 * Monday
 *
 *
 * y
 * Year (1 or 2 digits - check note below)
 *
 *
 * Y
 * Year (4 digits)
 *
 *
 * z
 * Day of the year
 *
 *
 * Z
 * Timezone offset in seconds
 *
 *
 *
 *
 * @param int|null $timestamp The optional timestamp parameter is an
 * int Unix timestamp that defaults to the current
 * local time if timestamp is omitted or NULL. In other
 * words, it defaults to the value of time.
 * @return int Returns an int on success.
 *
 * As idate always returns an int and
 * as they can't start with a "0", idate may return
 * fewer digits than you would expect. See the example below.
 * @throws DatetimeException
 *
 */
function idate(string $format, ?int $timestamp = null): int
{
    error_clear_last();
    if ($timestamp !== null) {
        $safeResult = \idate($format, $timestamp);
    } else {
        $safeResult = \idate($format);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the Unix timestamp corresponding to the arguments
 * given. This timestamp is a long integer containing the number of
 * seconds between the Unix Epoch (January 1 1970 00:00:00 GMT) and the time
 * specified.
 *
 * Any optional
 * arguments omitted or NULL will be set to the current value according
 * to the local date and time.
 *
 * @param int $hour The number of the hour relative to the start of the day determined by
 * month, day and year.
 * Negative values reference the hour before midnight of the day in question.
 * Values greater than 23 reference the appropriate hour in the following day(s).
 * @param int|null $minute The number of the minute relative to the start of the hour.
 * Negative values reference the minute in the previous hour.
 * Values greater than 59 reference the appropriate minute in the following hour(s).
 * @param int|null $second The number of seconds relative to the start of the minute.
 * Negative values reference the second in the previous minute.
 * Values greater than 59 reference the appropriate second in the following minute(s).
 * @param int|null $month The number of the month relative to the end of the previous year.
 * Values 1 to 12 reference the normal calendar months of the year in question.
 * Values less than 1 (including negative values) reference the months in the previous year in reverse order, so 0 is December, -1 is November, etc.
 * Values greater than 12 reference the appropriate month in the following year(s).
 * @param int|null $day The number of the day relative to the end of the previous month.
 * Values 1 to 28, 29, 30 or 31 (depending upon the month) reference the normal days in the relevant month.
 * Values less than 1 (including negative values) reference the days in the previous month, so 0 is the last day of the previous month, -1 is the day before that, etc.
 * Values greater than the number of days in the relevant month reference the appropriate day in the following month(s).
 * @param int|null $year The number of the year, may be a two or four digit value,
 * with values between 0-69 mapping to 2000-2069 and 70-100 to
 * 1970-2000. On systems where time_t is a 32bit signed integer, as
 * most common today, the valid range for year
 * is somewhere between 1901 and 2038.
 * @return int mktime returns the Unix timestamp of the arguments
 * given, or FALSE if the timestamp doesn't fit in a PHP integer.
 * @throws DatetimeException
 *
 */
function mktime(int $hour, ?int $minute = null, ?int $second = null, ?int $month = null, ?int $day = null, ?int $year = null): int
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


/**
 * Format the time and/or date according to locale settings. Month and weekday
 * names and other language-dependent strings respect the current locale set
 * with setlocale.
 *
 * @param string $format
 * The following characters are recognized in the
 * format parameter string
 *
 *
 *
 * format
 * Description
 * Example returned values
 *
 *
 *
 *
 * Day
 * ---
 * ---
 *
 *
 * %a
 * An abbreviated textual representation of the day
 * Sun through Sat
 *
 *
 * %A
 * A full textual representation of the day
 * Sunday through Saturday
 *
 *
 * %d
 * Two-digit day of the month (with leading zeros)
 * 01 to 31
 *
 *
 * %e
 *
 * Day of the month, with a space preceding single digits. Not
 * implemented as described on Windows. See below for more information.
 *
 * 1 to 31
 *
 *
 * %j
 * Day of the year, 3 digits with leading zeros
 * 001 to 366
 *
 *
 * %u
 * ISO-8601 numeric representation of the day of the week
 * 1 (for Monday) through 7 (for Sunday)
 *
 *
 * %w
 * Numeric representation of the day of the week
 * 0 (for Sunday) through 6 (for Saturday)
 *
 *
 * Week
 * ---
 * ---
 *
 *
 * %U
 * Week number of the given year, starting with the first
 * Sunday as the first week
 * 13 (for the 13th full week of the year)
 *
 *
 * %V
 * ISO-8601:1988 week number of the given year, starting with
 * the first week of the year with at least 4 weekdays, with Monday
 * being the start of the week
 * 01 through 53 (where 53
 * accounts for an overlapping week)
 *
 *
 * %W
 * A numeric representation of the week of the year, starting
 * with the first Monday as the first week
 * 46 (for the 46th week of the year beginning
 * with a Monday)
 *
 *
 * Month
 * ---
 * ---
 *
 *
 * %b
 * Abbreviated month name, based on the locale
 * Jan through Dec
 *
 *
 * %B
 * Full month name, based on the locale
 * January through December
 *
 *
 * %h
 * Abbreviated month name, based on the locale (an alias of %b)
 * Jan through Dec
 *
 *
 * %m
 * Two digit representation of the month
 * 01 (for January) through 12 (for December)
 *
 *
 * Year
 * ---
 * ---
 *
 *
 * %C
 * Two digit representation of the century (year divided by 100, truncated to an integer)
 * 19 for the 20th Century
 *
 *
 * %g
 * Two digit representation of the year going by ISO-8601:1988 standards (see %V)
 * Example: 09 for the week of January 6, 2009
 *
 *
 * %G
 * The full four-digit version of %g
 * Example: 2008 for the week of January 3, 2009
 *
 *
 * %y
 * Two digit representation of the year
 * Example: 09 for 2009, 79 for 1979
 *
 *
 * %Y
 * Four digit representation for the year
 * Example: 2038
 *
 *
 * Time
 * ---
 * ---
 *
 *
 * %H
 * Two digit representation of the hour in 24-hour format
 * 00 through 23
 *
 *
 * %k
 * Hour in 24-hour format, with a space preceding single digits
 * 0 through 23
 *
 *
 * %I
 * Two digit representation of the hour in 12-hour format
 * 01 through 12
 *
 *
 * %l (lower-case 'L')
 * Hour in 12-hour format, with a space preceding single digits
 * 1 through 12
 *
 *
 * %M
 * Two digit representation of the minute
 * 00 through 59
 *
 *
 * %p
 * UPPER-CASE 'AM' or 'PM' based on the given time
 * Example: AM for 00:31,
 * PM for 22:23. The exact result depends on the
 * Operating System, and they can also return lower-case variants, or
 * variants with dots (such as a.m.).
 *
 *
 * %P
 * lower-case 'am' or 'pm' based on the given time
 * Example: am for 00:31,
 * pm for 22:23. Not supported by all Operating
 * Systems.
 *
 *
 * %r
 * Same as "%I:%M:%S %p"
 * Example: 09:34:17 PM for 21:34:17
 *
 *
 * %R
 * Same as "%H:%M"
 * Example: 00:35 for 12:35 AM, 16:44 for 4:44 PM
 *
 *
 * %S
 * Two digit representation of the second
 * 00 through 59
 *
 *
 * %T
 * Same as "%H:%M:%S"
 * Example: 21:34:17 for 09:34:17 PM
 *
 *
 * %X
 * Preferred time representation based on locale, without the date
 * Example: 03:59:16 or 15:59:16
 *
 *
 * %z
 * The time zone offset. Not implemented as described on
 * Windows. See below for more information.
 * Example: -0500 for US Eastern Time
 *
 *
 * %Z
 * The time zone abbreviation. Not implemented as described on
 * Windows. See below for more information.
 * Example: EST for Eastern Time
 *
 *
 * Time and Date Stamps
 * ---
 * ---
 *
 *
 * %c
 * Preferred date and time stamp based on locale
 * Example: Tue Feb  5 00:45:10 2009 for
 * February 5, 2009 at 12:45:10 AM
 *
 *
 * %D
 * Same as "%m/%d/%y"
 * Example: 02/05/09 for February 5, 2009
 *
 *
 * %F
 * Same as "%Y-%m-%d" (commonly used in database datestamps)
 * Example: 2009-02-05 for February 5, 2009
 *
 *
 * %s
 * Unix Epoch Time timestamp (same as the time
 * function)
 * Example: 305815200 for September 10, 1979 08:40:00 AM
 *
 *
 * %x
 * Preferred date representation based on locale, without the time
 * Example: 02/05/09 for February 5, 2009
 *
 *
 * Miscellaneous
 * ---
 * ---
 *
 *
 * %n
 * A newline character ("\n")
 * ---
 *
 *
 * %t
 * A Tab character ("\t")
 * ---
 *
 *
 * %%
 * A literal percentage character ("%")
 * ---
 *
 *
 *
 *
 *
 * Windows only:
 *
 * The %e modifier is not supported in the Windows
 * implementation of this function. To achieve this value, the
 * %#d modifier can be used instead. The example below
 * illustrates how to write a cross platform compatible function.
 *
 * The %z and %Z modifiers both
 * return the time zone name instead of the offset or abbreviation.
 * @param int|null $timestamp The optional timestamp parameter is an
 * int Unix timestamp that defaults to the current
 * local time if timestamp is omitted or NULL. In other
 * words, it defaults to the value of time.
 * @return string Returns a string formatted according format
 * using the given timestamp or the current
 * local time if no timestamp is given.  Month and weekday names and
 * other language-dependent strings respect the current locale set
 * with setlocale.
 * The function returns FALSE if format is empty, contains unsupported
 * conversion specifiers, or if the length of the returned string would be greater than
 * 4095.
 * @throws DatetimeException
 *
 */
function strftime(string $format, ?int $timestamp = null): string
{
    error_clear_last();
    if ($timestamp !== null) {
        $safeResult = \strftime($format, $timestamp);
    } else {
        $safeResult = \strftime($format);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * strptime returns an array with the
 * timestamp parsed.
 *
 * Month and weekday names and other language dependent strings respect the
 * current locale set with setlocale (LC_TIME).
 *
 * @param string $timestamp The string to parse (e.g. returned from strftime).
 * @param string $format The format used in timestamp (e.g. the same as
 * used in strftime). Note that some of the format
 * options available to strftime may not have any
 * effect within strptime; the exact subset that are
 * supported will vary based on the operating system and C library in
 * use.
 *
 * For more information about the format options, read the
 * strftime page.
 * @return array Returns an array.
 *
 *
 * The following parameters are returned in the array
 *
 *
 *
 * parameters
 * Description
 *
 *
 *
 *
 * "tm_sec"
 * Seconds after the minute (0-61)
 *
 *
 * "tm_min"
 * Minutes after the hour (0-59)
 *
 *
 * "tm_hour"
 * Hour since midnight (0-23)
 *
 *
 * "tm_mday"
 * Day of the month (1-31)
 *
 *
 * "tm_mon"
 * Months since January (0-11)
 *
 *
 * "tm_year"
 * Years since 1900
 *
 *
 * "tm_wday"
 * Days since Sunday (0-6)
 *
 *
 * "tm_yday"
 * Days since January 1 (0-365)
 *
 *
 * "unparsed"
 * the timestamp part which was not
 * recognized using the specified format
 *
 *
 *
 *
 * @throws DatetimeException
 *
 */
function strptime(string $timestamp, string $format): array
{
    error_clear_last();
    $safeResult = \strptime($timestamp, $format);
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Each parameter of this function uses the default time zone unless a
 * time zone is specified in that parameter.  Be careful not to use
 * different time zones in each parameter unless that is intended.
 * See date_default_timezone_get on the various
 * ways to define the default time zone.
 *
 * @param string $datetime A date/time string. Valid formats are explained in Date and Time Formats.
 * @param int|null $baseTimestamp The timestamp which is used as a base for the calculation of relative
 * dates.
 * @return int Returns a timestamp on success.
 * @throws DatetimeException
 *
 */
function strtotime(string $datetime, ?int $baseTimestamp = null): int
{
    error_clear_last();
    if ($baseTimestamp !== null) {
        $safeResult = \strtotime($datetime, $baseTimestamp);
    } else {
        $safeResult = \strtotime($datetime);
    }
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param string $abbr Time zone abbreviation.
 * @param int $utcOffset Offset from GMT in seconds. Defaults to -1 which means that first found
 * time zone corresponding to abbr is returned.
 * Otherwise exact offset is searched and only if not found then the first
 * time zone with any offset is returned.
 * @param int $isDST Daylight saving time indicator. Defaults to -1, which means that
 * whether the time zone has daylight saving or not is not taken into
 * consideration when searching. If this is set to 1, then the
 * utcOffset is assumed to be an offset with
 * daylight saving in effect; if 0, then utcOffset
 * is assumed to be an offset without daylight saving in effect. If
 * abbr doesn't exist then the time zone is
 * searched solely by the utcOffset and
 * isDST.
 * @return string Returns time zone name on success.
 * @throws DatetimeException
 *
 */
function timezone_name_from_abbr(string $abbr, int $utcOffset = -1, int $isDST = -1): string
{
    error_clear_last();
    $safeResult = \timezone_name_from_abbr($abbr, $utcOffset, $isDST);
    if ($safeResult === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $safeResult;
}
