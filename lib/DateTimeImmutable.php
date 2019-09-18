<?php

namespace Safe;

use DateInterval;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Safe\Exceptions\DatetimeException;

//this class is used to implement a safe version of the DatetimeImmutable class
class DateTimeImmutable extends \DateTimeImmutable
{
    //switch from regular datetime to safe version
    private static function createFromRegular(\DateTimeImmutable $datetime): self
    {
        return new self($datetime->format('Y-m-d H:i:s'), $datetime->getTimezone());
    }

    public static function createFromFormat($format, $time, DateTimeZone $timezone = null): self
    {
        $datetime = parent::createFromFormat($format, $time, $timezone);
        if ($datetime === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($datetime);
    }

    public function format($format): string
    {
        $result = parent::format($format);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return $result;
    }

    /**
     * @param DateTimeInterface $datetime2 <p>The date to compare to.</p>
     * @param bool $absolute [optional] <p>Should the interval be forced to be positive?</p>
     * @return DateInterval
     */
    public function diff($datetime2, $absolute = false): DateInterval
    {
        /** @var \DateInterval|false $result */
        $result = parent::diff($datetime2, $absolute);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return $result;
    }

    /**
     * @param string $modify  <p>A date/time string. Valid formats are explained in
     * {@link https://secure.php.net/manual/en/datetime.formats.php Date and Time Formats}.</p>
     * @return DateTimeImmutable
     */
    public function modify($modify): self
    {
        /** @var \DateTimeImmutable|false $result */
        $result = parent::modify($modify);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($result); //we have to recreate a safe datetime because modify create a new instance of \DateTimeImmutable
    }

    /**
     * @param int $year <p>Year of the date.</p>
     * @param int $month <p>Month of the date.</p>
     * @param int $day <p>Day of the date.</p>
     * @return DateTimeImmutable
     *
     */
    public function setDate($year, $month, $day): self
    {
        /** @var \DateTimeImmutable|false $result */
        $result = parent::setDate($year, $month, $day);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($result); //we have to recreate a safe datetime because modify create a new instance of \DateTimeImmutable
    }

    public function setISODate($year, $week, $day = 1): self
    {
        /** @var \DateTimeImmutable|false $result */
        $result = parent::setISODate($year, $week, $day);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($result); //we have to recreate a safe datetime because modify create a new instance of \DateTimeImmutable
    }

    public function setTime($hour, $minute, $second = 0, $microseconds = 0): self
    {
        /** @var \DateTimeImmutable|false $result */
        $result = parent::setTime($hour, $minute, $second, $microseconds);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($result);
    }

    public function setTimestamp($unixtimestamp): self
    {
        /** @var \DateTimeImmutable|false $result */
        $result = parent::setTimestamp($unixtimestamp);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($result);
    }

    public function setTimezone($timezone): self
    {
        /** @var \DateTimeImmutable|false $result */
       $result = parent::setTimezone($timezone);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($result);
    }

    public function sub($interval): self
    {
        /** @var \DateTimeImmutable|false $result */
        $result = parent::sub($interval);
        if ($result === false) {
            throw DatetimeException::createFromPhpError();
        }
        return self::createFromRegular($result);
    }

    //theses functions are overload to actually return a safe instance, since datetimeimmutable re-instante itself

    public function add($interval): self
    {
        return self::createFromRegular(parent::add($interval));
    }

    public static function createFromMutable($dateTime): self
    {
        return self::createFromRegular(parent::createFromMutable($dateTime));
    }

    public static function __set_state(array $array): self
    {
        return self::createFromRegular(parent::__set_state($array));
    }
}
