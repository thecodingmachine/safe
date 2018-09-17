<?php

namespace Safe;

use PHPUnit\Framework\TestCase;

class ScannerTest extends TestCase
{

    public function testGetMethodsPaths()
    {
        $scanner = new Scanner(__DIR__ . '/../doc/doc-en/en/reference/');
        $paths = $scanner->getFunctionsPaths();

        $this->assertArrayHasKey(__DIR__.'/../doc/doc-en/en/reference/filesystem/functions/chmod.xml', $paths);
        $this->assertArrayNotHasKey(__DIR__.'/../doc/doc-en/en/reference/spl/appenditerator/getarrayiterator.xml', $paths);
    }

    public function testGetFunctionsPaths()
    {
        $scanner = new Scanner(__DIR__ . '/../doc/doc-en/en/reference/');
        $paths = $scanner->getMethodsPaths();

        $this->assertArrayNotHasKey(__DIR__.'/../doc/doc-en/en/reference/filesystem/functions/chmod.xml', $paths);
        $this->assertArrayHasKey(__DIR__.'/../doc/doc-en/en/reference/spl/appenditerator/getarrayiterator.xml', $paths);
    }
}
