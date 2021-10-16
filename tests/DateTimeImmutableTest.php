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
}
