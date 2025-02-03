<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;

class ScannerTest extends TestCase
{

    public function testGetMethodsPaths(): void
    {
        $scanner = new Scanner(DocPage::findReferenceDir());
        $paths = $scanner->getFunctionsPaths();

        $this->assertArrayHasKey(DocPage::findReferenceDir() . '/filesystem/functions/chmod.xml', $paths);
        $this->assertArrayNotHasKey(DocPage::findReferenceDir() . '/spl/appenditerator/getarrayiterator.xml', $paths);
    }

    public function testGetFunctionsPaths(): void
    {
        $scanner = new Scanner(DocPage::findReferenceDir());
        $paths = $scanner->getMethodsPaths();

        $this->assertArrayNotHasKey(DocPage::findReferenceDir() . '/filesystem/functions/chmod.xml', $paths);
        $this->assertArrayHasKey(DocPage::findReferenceDir() . '/spl/appenditerator/getarrayiterator.xml', $paths);
    }
}
