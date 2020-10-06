<?php

namespace Safe;

use Safe\Exceptions\DatetimeException;

/**
 * Returns associative array with detailed info about given date/time.
 * 
 * @param string $format Format accepted by DateTime::createFromFormat.
 * @param string $datetime String representing the date/time.
 * @return array Returns associative array with detailed info about given date/time.
 * @throws DatetimeException
 * 
 */
function date_parse_from_format(string $format, string $datetime): array
{
    error_clear_last();
    $result = \date_parse_from_format($format, $datetime);
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param string $datetime Date/time in format accepted by
 * DateTimeImmutable::__construct.
 * @return array Returns array with information about the parsed date/time
 * on success.
 * @throws DatetimeException
 * 
 */
function date_parse(string $datetime): array
{
    error_clear_last();
    $result = \date_parse($datetime);
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param int $timestamp Unix timestamp.
 * @param float $latitude Latitude in degrees.
 * @param float $longitude Longitude in degrees.
 * @return array Returns array on success.
 * The structure of the array is detailed in the following list:
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
 * The start of the civil dawn (zenith angle = 96°). It ends at sunrise.
 * 
 * 
 * 
 * 
 * civil_twilight_end
 * 
 * 
 * The end of the civil dusk (zenith angle = 96°). It starts at sunset.
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
 * @throws DatetimeException
 * 
 */
function date_sun_info(int $timestamp, float $latitude, float $longitude): array
{
    error_clear_last();
    $result = \date_sun_info($timestamp, $latitude, $longitude);
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
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
 * returns the result as integer (timestamp)
 * 1095034606
 * 
 * 
 * 
 * 
 * @param float $latitude Defaults to North, pass in a negative value for South.
 * See also: date.default_latitude
 * @param float $longitude Defaults to East, pass in a negative value for West.
 * See also: date.default_longitude
 * @param float $zenith zenith is the angle between the center of the sun
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
 * @param float $utcOffset Specified in hours.
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
function date_sunrise(int $timestamp, int $returnFormat = SUNFUNCS_RET_STRING, float $latitude = null, float $longitude = null, float $zenith = null, float $utcOffset = 0)
{
    error_clear_last();
    if ($utcOffset !== 0) {
        $result = \date_sunrise($timestamp, $returnFormat, $latitude, $longitude, $zenith, $utcOffset);
    } elseif ($zenith !== null) {
        $result = \date_sunrise($timestamp, $returnFormat, $latitude, $longitude, $zenith);
    } elseif ($longitude !== null) {
        $result = \date_sunrise($timestamp, $returnFormat, $latitude, $longitude);
    } elseif ($latitude !== null) {
        $result = \date_sunrise($timestamp, $returnFormat, $latitude);
    }else {
        $result = \date_sunrise($timestamp, $returnFormat);
    }
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
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
 * returns the result as integer (timestamp)
 * 1095034606
 * 
 * 
 * 
 * 
 * @param float $latitude Defaults to North, pass in a negative value for South.
 * See also: date.default_latitude
 * @param float $longitude Defaults to East, pass in a negative value for West.
 * See also: date.default_longitude
 * @param float $zenith zenith is the angle between the center of the sun
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
 * @param float $utcOffset Specified in hours.
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
function date_sunset(int $timestamp, int $returnFormat = SUNFUNCS_RET_STRING, float $latitude = null, float $longitude = null, float $zenith = null, float $utcOffset = 0)
{
    error_clear_last();
    if ($utcOffset !== 0) {
        $result = \date_sunset($timestamp, $returnFormat, $latitude, $longitude, $zenith, $utcOffset);
    } elseif ($zenith !== null) {
        $result = \date_sunset($timestamp, $returnFormat, $latitude, $longitude, $zenith);
    } elseif ($longitude !== null) {
        $result = \date_sunset($timestamp, $returnFormat, $latitude, $longitude);
    } elseif ($latitude !== null) {
        $result = \date_sunset($timestamp, $returnFormat, $latitude);
    }else {
        $result = \date_sunset($timestamp, $returnFormat);
    }
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
}


/**
 * strptime returns an array with the
 * date parsed.
 * 
 * Month and weekday names and other language dependent strings respect the
 * current locale set with setlocale (LC_TIME).
 * 
 * @param string $date The string to parse (e.g. returned from strftime).
 * @param string $format The format used in date (e.g. the same as
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
 * the date part which was not
 * recognized using the specified format
 * 
 * 
 * 
 * 
 * @throws DatetimeException
 * 
 */
function strptime(string $date, string $format): array
{
    error_clear_last();
    $result = \strptime($date, $format);
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
}


/**
 * Each parameter of this function uses the default time zone unless a
 * time zone is specified in that parameter.  Be careful not to use
 * different time zones in each parameter unless that is intended.
 * See date_default_timezone_get on the various
 * ways to define the default time zone.
 * 
 * @param string $datetime A date/time string. Valid formats are explained in Date and Time Formats.
 * @param int $now The timestamp which is used as a base for the calculation of relative
 * dates.
 * @return int Returns a timestamp on success, FALSE otherwise. Previous to PHP 5.1.0,
 * this function would return -1 on failure.
 * @throws DatetimeException
 * 
 */
function strtotime(string $datetime, int $now = null): int
{
    error_clear_last();
    if ($now !== null) {
        $result = \strtotime($datetime, $now);
    }else {
        $result = \strtotime($datetime);
    }
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
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
    $result = \timezone_name_from_abbr($abbr, $utcOffset, $isDST);
    if ($result === false) {
        throw DatetimeException::createFromPhpError();
    }
    return $result;
}


