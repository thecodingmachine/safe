<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;
use Safe\Exceptions\DatetimeException;

class DateTimeTest extends TestCase
{
    public function testSafeDatetimeCrashOnError(): void
    {
        $this->expectException(DatetimeException::class);
        \Safe\DateTime::createFromFormat('lol', 'super');
    }

    public function testCreateFromFormatPreserveTimeAndTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = \Safe\DateTime::createFromFormat('d-m-Y', '20-03-2006', $timezone);
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals('20-03-2006', $datetime->format('d-m-Y'));
        $this->assertEquals($timezone, $datetime->getTimezone());
    }

    public function testModify(): void
    {
        $datetime = new \Safe\DateTime();
        $datetime = $datetime->setDate(2017, 4, 6);
        $datetime = $datetime->modify('+1 day');
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals('7-4-2017', $datetime->format('j-n-Y'));
    }

    public function testModifyThrowsExceptionOnInvalidInput(): void
    {
        // In php 8.1/8.2 this is \Safe\DatetimeException
        // In php 8.3+ this is \DateMalformedStringException
        // TODO: find some way to get phpstan to check the above
        $this->expectException(\Throwable::class);
        (new \Safe\DateTime())->modify('invalid date');
    }
}
