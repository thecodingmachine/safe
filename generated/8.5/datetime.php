<?php

namespace Safe;

use Safe\Exceptions\DatetimeException;

/**
 * @param string $datetime
 * @param \DateTimeZone|null $timezone
 * @return \DateTimeImmutable
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
 * @param null|string $datetime
 * @param \DateTimeZone|null $timezone
 * @return \DateTime
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
 * @param string $format
 * @param string $datetime
 * @return array{year: int|false, month: int|false, day: int|false, hour: int|false, minute: int|false, second: int|false, fraction: float|false, warning_count: int, warnings: string[], error_count: int, errors: string[], is_localtime: bool, zone_type: int|bool, zone: int|bool, is_dst: bool, tz_abbr: string, tz_id: string, relative: array{year: int, month: int, day: int, hour: int, minute: int, second: int, weekday: int, weekdays: int, first_day_of_month: bool, last_day_of_month: bool}}|null
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
 * @param string $datetime
 * @return array{year: int|false, month: int|false, day: int|false, hour: int|false, minute: int|false, second: int|false, fraction: float|false, warning_count: int, warnings: string[], error_count: int, errors: string[], is_localtime: bool, zone_type: int|bool, zone: int|bool, is_dst: bool, tz_abbr: string, tz_id: string, relative: array{year: int, month: int, day: int, hour: int, minute: int, second: int, weekday: int, weekdays: int, first_day_of_month: bool, last_day_of_month: bool}}|null
 *
 */
function date_parse(string $datetime): ?array
{
    error_clear_last();
    $safeResult = \date_parse($datetime);
    return $safeResult;
}


/**
 * @param int $timestamp
 * @param float $latitude
 * @param float $longitude
 * @return array{sunrise: int|bool,sunset: int|bool,transit: int|bool,civil_twilight_begin: int|bool,civil_twilight_end: int|bool,nautical_twilight_begin: int|bool,nautical_twilight_end: int|bool,astronomical_twilight_begin: int|bool,astronomical_twilight_end: int|bool}|false
 *
 */
function date_sun_info(int $timestamp, float $latitude, float $longitude)
{
    error_clear_last();
    $safeResult = \date_sun_info($timestamp, $latitude, $longitude);
    return $safeResult;
}


/**
 * @param int $timestamp
 * @param int $returnFormat
 * @param float|null $latitude
 * @param float|null $longitude
 * @param float|null $zenith
 * @param float|null $utcOffset
 * @return mixed
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
 * @param int $timestamp
 * @param int $returnFormat
 * @param float|null $latitude
 * @param float|null $longitude
 * @param float|null $zenith
 * @param float|null $utcOffset
 * @return mixed
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
 * @param string $format
 * @param int|null $timestamp
 * @return string
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
 * @param int $hour
 * @param int|null $minute
 * @param int|null $second
 * @param int|null $month
 * @param int|null $day
 * @param int|null $year
 * @return int
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
 * @param string $format
 * @param int|null $timestamp
 * @return string
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
 * @param string $format
 * @param int|null $timestamp
 * @return int
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
 * @param int $hour
 * @param int|null $minute
 * @param int|null $second
 * @param int|null $month
 * @param int|null $day
 * @param int|null $year
 * @return int
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
 * @param string $format
 * @param int|null $timestamp
 * @return string
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
 * @param string $timestamp
 * @param string $format
 * @return array
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
 * @param string $datetime
 * @param int|null $baseTimestamp
 * @return int
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
 * @param string $abbr
 * @param int $utcOffset
 * @param int $isDST
 * @return string
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
