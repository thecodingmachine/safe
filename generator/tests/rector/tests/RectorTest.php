<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RectorTest extends TestCase
{
    public function testRectorSucceeded(): void
    {
        $content = file_get_contents(__DIR__.'/../src/test.php');

        self::assertStringContainsString('Safe', $content);
    }
}
