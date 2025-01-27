<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DeprecationTest extends TestCase
{
    public function testDeprecatedFunction(): void
    {
        // In 8.3, imap_close is non-safe, so we generate a safe wrapper.
        // In 8.4, imap_close is safe, so we don't need to generate a
        // safe wrapper -- but if we simply delete Safe\imap_close, then
        // that will break backwards-compatibility. So we need to generate
        // a no-op wrapper for imap_close in 8.4.
        // Either way, the function should _exist_ in all versions from
        // when it was introduced onwards.
        // FIXME: If the function was _introduced_ in 8.3, then it shouldn't
        // have a wrapper (neither safe wrapper nor no-op wrapper) in 8.1.
        // imap_close happens to exist in 8.1-8.4, but we should also add
        // a test for a function that was introduced in 8.3 to make sure that
        // no deprecated wrapper is generated for it in 8.1-8.2.
        $this->assertTrue(function_exists('Safe\imap_close'));
    }
}
