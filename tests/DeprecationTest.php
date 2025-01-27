<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DeprecationTest extends TestCase
{
    public function testFunctionWhichBecameSafe(): void
    {
        // In 8.3, imap_close is non-safe, so we generate a safe wrapper.
        // In 8.4, imap_close is safe, so we don't need to generate a
        // safe wrapper -- but if we simply delete Safe\imap_close, then
        // that will break backwards-compatibility. So we need to generate
        // a no-op wrapper for imap_close in 8.4.
        // Either way, the function should _exist_ in all versions from
        // when it was introduced onwards.
        $this->assertTrue(
            function_exists('Safe\imap_close'),
            "Safe\imap_close should exist, even in php 8.4 (where it is safe natively), because it was unsafe in the past"
        );
    }

    public function testIntroducedFunction(): void
    {
        // This function was introduced in php 8.2, so we should only
        // generate wrappers for it in 8.2 and later
        if (strpos(PHP_VERSION, "8.1.") === 0) {
            $this->assertFalse(
                function_exists('Safe\openssl_cipher_key_length'),
                "openssl_cipher_key_length was introduced in php 8.2, so it should not exist in php 8.1"
            );
        } else {
            $this->assertTrue(
                function_exists('Safe\openssl_cipher_key_length'),
                "openssl_cipher_key_length was introduced in php 8.2, so it should exist in php 8.2 and later"
            );
        }
    }
}
