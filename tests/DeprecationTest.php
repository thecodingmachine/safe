<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DeprecationTest extends TestCase
{
    public function testDeprecatedFunction(): void
    {
        // imap_close was non-safe in 8.3, so we generate a safe wrapper,
        // but it is safe in 8.4, so we should generate a no-op wrapper;
        // either way, Safe\imap_close should _exist_ in both versions.
        $this->assertTrue(function_exists('Safe\imap_close'));
    }
}
