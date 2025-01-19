<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GeneratedFilesTest extends TestCase
{
    public function testRequireModules(): void
    {
        self::expectNotToPerformAssertions();

        $files = \glob(__DIR__.'/../generated/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated file');
        }

        foreach ($files as $file) {
            require_once($file);
        }
    }

    public function testRequireExceptions(): void
    {
        self::expectNotToPerformAssertions();

        $files = \glob(__DIR__.'/../generated/Exceptions/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated exception file');
        }
        foreach ($files as $file) {
            require_once($file);
        }
    }

    public function testRequireExceptionInterface(): void
    {
        self::expectNotToPerformAssertions();

        require_once __DIR__.'/../lib/Exceptions/SafeExceptionInterface.php';
    }
}
