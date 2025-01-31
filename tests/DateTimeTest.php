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
        $datetime = \Safe\DateTime::createFromFormat('lol', 'super');
    }

    public function testCreateFromFormatPreserveTimeAndTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = \Safe\DateTime::createFromFormat('d-m-Y', '20-03-2006', $timezone);
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals('20-03-2006', $datetime->format('d-m-Y'));
        $this->assertEquals($timezone, $datetime->getTimezone());
    }

    public function testSetDate(): void
    {
        $datetime = new \Safe\DateTime();
        $datetime = $datetime->setDate(2017, 4, 6);
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals(2017, $datetime->format('Y'));
        $this->assertEquals(4, $datetime->format('n'));
        $this->assertEquals(6, $datetime->format('j'));

        //todo: test an error case
    }

    public function testModify(): void
    {
        $datetime = new \Safe\DateTime();
        $datetime = $datetime->setDate(2017, 4, 6);
        $datetime = $datetime->modify('+1 day');
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals('7-4-2017', $datetime->format('j-n-Y'));
    }
}
