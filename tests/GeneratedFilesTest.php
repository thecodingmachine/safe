<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GeneratedFilesTest extends TestCase
{
    public function testImport(): void
    {
        self::expectNotToPerformAssertions();

        $files = \glob(__DIR__.'/../generated/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated file');
        }

        foreach ($files as $file) {
            require($file);
        }
    }
}
