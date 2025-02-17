<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DeprecationTest extends TestCase
{
    public function testFunctionWhichBecameSafe(): void
    {
        // In 8.1, array_flip is non-safe, so we generate a safe wrapper.
        // In 8.2, array_flip is safe, so we don't need to generate a
        // safe wrapper -- but if we simply delete the `Safe` function, then
        // that will break backwards-compatibility. So we need to generate
        // a no-op wrapper for newer versions.
        // Either way, the function should _exist_ in all versions from
        // when it was introduced onwards.
        $this->assertTrue(
            function_exists('Safe\array_flip'),
            "Safe\array_flip should exist, even in php 8.4 (where it ".
            "is safe natively), because it was unsafe in 8.1"
        );
        $this->assertEquals(
            \Safe\array_flip([1 => 'a', 2 => 'b']),
            ['a' => 1, 'b' => 2],
            "Safe\array_flip should work as expected, whether safe-wrapper or no-op-wrapper"
        );
    }

    public function testFunctionWhichBecameSafeWithReferences(): void
    {
        // array_walk_recursive is unsafe in 8.3 and safe in 8.4, and one of
        // the parameters is a reference, which wasn't handled by the original
        // no-op wrapper
        $this->assertTrue(
            function_exists('Safe\array_walk_recursive'),
            "Safe\array_walk_recursive should exist, even in php 8.4 (where it ".
            "is safe natively), because it was unsafe in 8.1"
        );
        $data = [
            ['foo', 'far'],
            ['bar', 'baz'],
        ];
        array_walk_recursive($data, static function (&$item) {
            $item = 111;
        });
        $this->assertEquals(
            $data,
            [[111, 111], [111, 111]]
        );
    }

    public function testIntroducedFunction(): void
    {
        // This function was introduced in php 8.2, so we should only
        // generate wrappers for it in 8.2 and later
        if (strpos(PHP_VERSION, "8.1.") === 0) {
            $this->assertFalse(
                function_exists('Safe\openssl_cipher_key_length'),
                "openssl_cipher_key_length was introduced in php 8.2, ".
                "so it should not exist in php 8.1"
            );
        } else {
            $this->assertTrue(
                function_exists('Safe\openssl_cipher_key_length'),
                "openssl_cipher_key_length was introduced in php 8.2, ".
                "so it should exist in php 8.2 and later"
            );
        }
    }
}
