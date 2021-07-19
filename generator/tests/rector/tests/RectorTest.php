<?php

use PHPUnit\Framework\TestCase;

final class RectorTest extends TestCase
{
    public function testRectorSucceeded()
    {
        $content = file_get_contents(__DIR__.'/../src/test.php');

        self::assertStringContainsString('Safe', $content);
    }
}
