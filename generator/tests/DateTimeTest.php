<?php


namespace Safe;


use PHPUnit\Framework\TestCase;
use Safe\Exceptions\DatetimeException;

class DateTimeTest extends TestCase
{
    protected function setUp()
    {
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__ . '/../../generated/Exceptions/DatetimeException.php';
        require_once __DIR__ . '/../../lib/DateTime.php';
    }

    public function testSafeDatetimeCrashOnError(): void
    {
        $this->expectException(DatetimeException::class);
        $datetime = DateTime::createFromFormat('lol', 'super');
    }

    public function testSafeDatetimePreserveTimeAndTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = DateTime::createFromFormat('d-m-Y', '20-03-2006', $timezone);
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals('20-03-2006', $datetime->format('d-m-Y'));
        $this->assertEquals($timezone, $datetime->getTimezone());
    }

    public function testSafeDatetimeSetDate(): void
    {
        $datetime = new DateTime();
        $datetime = $datetime->setDate(2017, 4, 6);
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals(2017, $datetime->format('Y'));
        $this->assertEquals(4, $datetime->format('n'));
        $this->assertEquals(6, $datetime->format('j'));

        //todo: test an error case
    }

    public function testSafeDatetimeModify(): void
    {
        $datetime = new DateTime();
        $datetime = $datetime->setDate(2017, 4, 6);
        $datetime = $datetime->modify('+1 day');
        $this->assertInstanceOf(DateTime::class, $datetime);
        $this->assertEquals('7-4-2017', $datetime->format('j-n-Y'));
    }
}