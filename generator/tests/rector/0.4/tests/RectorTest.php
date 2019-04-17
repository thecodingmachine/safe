<?php


use PHPUnit\Framework\TestCase;

class RectorTest extends TestCase
{
    public function testRectorSucceeded()
    {
        $content = file_get_contents(__DIR__.'/../src/test.php');
        $this->assertContains('Safe', $content);
    }
}
