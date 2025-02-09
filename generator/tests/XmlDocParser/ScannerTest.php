<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\OutputInterface;

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
        $scanner = new Scanner(DocPage::findReferenceDir() . '/');
        $paths = $scanner->getMethodsPaths();

        $this->assertArrayNotHasKey(DocPage::findReferenceDir() . '/filesystem/functions/chmod.xml', $paths);
        $this->assertArrayHasKey(DocPage::findReferenceDir() . '/spl/appenditerator/getarrayiterator.xml', $paths);
    }

    public function testGetMethods(): void
    {
        $scanner = new Scanner(DocPage::findReferenceDir());
        $functions = $scanner->getFunctionsPaths();
        $testFunctions = [];
        foreach ($functions as $name => $info) {
            // check various branches:
            // - array = regular module
            // - bbcode = ignored module
            // - image = module with overloaded functions
            if (str_contains($name, "array") || str_contains($name, "bbcode") || str_contains($name, "image")) {
                $testFunctions[$name] = $info;
            }
        }
        $output = $this->createMock(OutputInterface::class);
        $response = $scanner->getMethods($testFunctions, $output);
        $this->assertNotEmpty($response->methods);
    }
}
