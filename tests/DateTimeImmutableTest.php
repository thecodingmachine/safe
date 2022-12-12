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

    public function createFromInterfaces(): array
    {
        return [
            [new \DateTime('2022-11-29T14:17:34+00:00')],
            [new \Safe\DateTime('2022-11-29T14:17:34+00:00')],
            [new \DateTimeImmutable('2022-11-29T14:17:34+00:00')],
            [new \Safe\DateTimeImmutable('2022-11-29T14:17:34+00:00')],
        ];
    }
}
