<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DateTimeImmutableTest extends TestCase
{
    public function testCreateFromMutable(): void
    {
        $unsafeDate = new \DateTime('2021-10-16T12:30:16+00:00');
        $safeImmutableDate = \Safe\DateTimeImmutable::createFromMutable($unsafeDate);

        self::assertSame($unsafeDate->format(\DateTimeInterface::ATOM), $safeImmutableDate->format(\DateTimeInterface::ATOM));

        $safeDate = new \Safe\DateTime('2021-10-16T12:30:16+00:00');
        $safeImmutableDate = \Safe\DateTimeImmutable::createFromMutable($safeDate);

        self::assertSame($safeDate->format(\DateTimeInterface::ATOM), $safeImmutableDate->format(\DateTimeInterface::ATOM));
    }

    /**
     * @dataProvider createFromInterfaces
     */
    public function testCreateFromInterface(\DateTimeInterface $dateTime): void
    {
        $safeImmutableDate = \Safe\DateTimeImmutable::createFromInterface($dateTime);

        self::assertSame($dateTime->format(\DATE_ATOM), $safeImmutableDate->format(\DATE_ATOM));
    }

    /**
     * @return array<array<\DateTimeInterface>>
     */
    public static function createFromInterfaces(): array
    {
        return [
            [new \DateTime('2022-11-29T14:17:34+00:00')],
            [new \Safe\DateTime('2022-11-29T14:17:34+00:00')],
            [new \DateTimeImmutable('2022-11-29T14:17:34+00:00')],
            [new \Safe\DateTimeImmutable('2022-11-29T14:17:34+00:00')],
        ];
    }

    public function testCreateFromFormatCrashOnError(): void
    {
        $this->expectException(\Safe\Exceptions\DatetimeException::class);
        $datetime = \Safe\DateTimeImmutable::createFromFormat('lol', 'super');
    }

    public function testConstructorPreserveTimeAndTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = new \Safe\DateTimeImmutable('now', $timezone);
        $this->assertInstanceOf(DateTimeImmutable::class, $datetime);
        $this->assertEquals($timezone, $datetime->getTimezone());
    }

    public function testCreateFromFormatPreserveTimeAndTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = \Safe\DateTimeImmutable::createFromFormat('d-m-Y', '20-03-2006', $timezone);
        $this->assertInstanceOf(DateTimeImmutable::class, $datetime);
        $this->assertEquals('20-03-2006', $datetime->format('d-m-Y'));
        $this->assertEquals($timezone, $datetime->getTimezone());
    }

    public function testSafeDatetimeImmutableIsImmutable(): void
    {
        $datetime1 = new \Safe\DateTimeImmutable();
        $datetime2 = $datetime1->add(new \DateInterval('P1W'));

        $this->assertNotSame($datetime1, $datetime2);
    }

    public function testSetDate(): void
    {
        $datetime = new \DateTimeImmutable();
        $safeDatetime = new \Safe\DateTimeImmutable();
        $datetime = $datetime->setDate(2017, 4, 6);
        $safeDatetime = $safeDatetime->setDate(2017, 4, 6);
        $this->assertInstanceOf(DateTimeImmutable::class, $safeDatetime);
        $this->assertEquals($datetime->format('Y-m-d'), $safeDatetime->format('Y-m-d'));
    }

    public function testSetIsoDate(): void
    {
        $datetime = new \DateTimeImmutable();
        $safeDatetime = new \Safe\DateTimeImmutable();
        $datetime = $datetime->setISODate(2017, 4, 6);
        $safeDatetime = $safeDatetime->setISODate(2017, 4, 6);
        $this->assertInstanceOf(DateTimeImmutable::class, $safeDatetime);
        $this->assertEquals($datetime->format('Y-m-d'), $safeDatetime->format('Y-m-d'));
    }

    public function testModify(): void
    {
        $datetime = new \DateTimeImmutable();
        $datetime = $datetime->setDate(2017, 4, 6);
        $datetime = $datetime->modify('+1 day');
        $safeDatime = new \Safe\DateTimeImmutable();
        $safeDatime = $safeDatime->setDate(2017, 4, 6);
        $safeDatime = $safeDatime->modify('+1 day');
        $this->assertInstanceOf(DateTimeImmutable::class, $safeDatime);
        $this->assertEquals($datetime->format('j-n-Y'), $safeDatime->format('j-n-Y'));
    }

    public function testSetTimestamp(): void
    {
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new \Safe\DateTimeImmutable('2000-01-01');
        $datetime = $datetime = $datetime->setTimestamp(12);
        $safeDatime = $safeDatime->setTimestamp(12);

        $this->assertEquals($datetime->getTimestamp(), $safeDatime->getTimestamp());
    }

    public function testSetTimezone(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new \Safe\DateTimeImmutable('2000-01-01');
        $datetime = $datetime->setTimezone($timezone);
        $safeDatime = $safeDatime->setTimezone($timezone);

        $this->assertEquals($datetime->getTimezone(), $safeDatime->getTimezone());
    }

    public function testSetTime(): void
    {
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new \Safe\DateTimeImmutable('2000-01-01');
        $datetime = $datetime->setTime(2, 3, 1, 5);
        $safeDatime = $safeDatime->setTime(2, 3, 1, 5);

        $this->assertEquals($datetime->format('H-i-s-u'), $safeDatime->format('H-i-s-u'));
    }

    public function testAdd(): void
    {
        $interval = new \DateInterval('P1M');
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new \Safe\DateTimeImmutable('2000-01-01');
        $datetime = $datetime->add($interval);
        $safeDatime = $safeDatime->add($interval);

        $this->assertEquals($datetime->getTimestamp(), $safeDatime->getTimestamp());
    }

    public function testSub(): void
    {
        $interval = new \DateInterval('P1M');
        $datetime = new \DateTimeImmutable('2000-01-01');
        $safeDatime = new \Safe\DateTimeImmutable('2000-01-01');
        $datetime = $datetime->sub($interval);
        $safeDatime = $safeDatime->sub($interval);

        $this->assertEquals($datetime->getTimestamp(), $safeDatime->getTimestamp());
    }

    public function testSerialize(): void
    {
        $timezone = new \DateTimeZone('Pacific/Chatham');
        $safeDatetime = \Safe\DateTimeImmutable::createFromFormat('d-m-Y', '20-03-2006', $timezone);
        /** @var DateTimeImmutable $newDatetime */
        $newDatetime = unserialize(serialize($safeDatetime));

        $this->assertEquals($safeDatetime->getTimestamp(), $newDatetime->getTimestamp());
        $this->assertEquals($safeDatetime->getTimezone(), $newDatetime->getTimezone());
    }

    public function testComparaison(): void
    {
        $safeDateTime = new \Safe\DateTimeImmutable();
        $phpDateTime = new \DateTimeImmutable();
        $timeLimit = \DateInterval::createFromDateString('2 hours');

        $a = $safeDateTime->modify('+3 hours') < $safeDateTime->add($timeLimit);
        $b = $phpDateTime->modify('+3 hours') < $phpDateTime->add($timeLimit);
        $this->assertEquals($b, $a);
    }

    public function testEquals(): void
    {
        $phpDateTime = new \DateTimeImmutable();

        $safeDateTime1 = \Safe\DateTimeImmutable::createFromFormat('Y-m-d H:i:s.u', $phpDateTime->format('Y-m-d H:i:s.u'));
        $safeDateTime2 = new \Safe\DateTimeImmutable($safeDateTime1->format('Y-m-d H:i:s.u'));

        $this->assertEquals($phpDateTime, $safeDateTime1);
        $this->assertEquals($phpDateTime, $safeDateTime2);
        $this->assertEquals($safeDateTime1, $safeDateTime2);
    }

    //DatePeriod corrupts our DateTimeImmutable by setting their inner to null.
    //This bug cannot be solved without editing DatePeriod itself.
    public function testDatePeriodBug(): void
    {
        $start = new \Safe\DateTimeImmutable('2020-01-01');
        $end = (new \Safe\DateTimeImmutable('2020-01-03'))->modify('+1 day');
        $datePeriod = new \DatePeriod($start, new \DateInterval('P1D'), $end);

        /** @var \Safe\DateTimeImmutable $date */
        foreach ($datePeriod as $date) {
            $this->expectException(\Error::class);
            $date->getInnerDateTime();
        }

    }

    public function testSwitchBetweenRegularAndSafe(): void
    {
        $d = new \DateTimeImmutable('2019-01-01');
        $d2 = \Safe\DateTimeImmutable::createFromRegular($d);
        $d3 = $d2->getInnerDateTime();
        $this->assertSame($d->format('Y-m-d H:i:s.u'), $d3->format('Y-m-d H:i:s.u'));
    }

    public function testSwitchBetweenRegularAndSafe2(): void
    {
        $d = new \Safe\DateTimeImmutable('2019-01-01');
        $d2 = \Safe\DateTimeImmutable::createFromRegular($d->getInnerDateTime());
        $this->assertSame($d->format('Y-m-d H:i:s.u'), $d2->format('Y-m-d H:i:s.u'));
    }
}
