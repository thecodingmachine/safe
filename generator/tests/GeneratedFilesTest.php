<?php

namespace Safe;

use const E_WARNING;
use function error_reporting;
use PHPUnit\Framework\TestCase;
use function restore_error_handler;
use Safe\Exceptions\StringsException;

/**
 * This test must be called AFTER generation of files has occurred
 */
class GeneratedFilesTest extends TestCase
{
    public function testSprintf()
    {
        require_once __DIR__.'/../../generated/strings.php';
        require_once __DIR__.'/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__.'/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__.'/../../generated/Exceptions/StringsException.php';

        $this->assertSame('foo', sprintf('foo'));
        $this->assertSame('foobar', sprintf('foo%s', 'bar'));
        $this->assertSame('foobarbaz', sprintf('foo%s%s', 'bar', 'baz'));

        set_error_handler(function() {});
        try {
            $this->expectException(StringsException::class);
            sprintf('foo%s%s', 'bar');
        } finally {
            restore_error_handler();
        }
    }
}
