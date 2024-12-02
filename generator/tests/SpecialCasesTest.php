<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;
use Safe\Exceptions\FilesystemException;
use Safe\Exceptions\PcreException;

class SpecialCasesTest extends TestCase
{

    public function testPregReplace(): void
    {
        require_once __DIR__.'/../../lib/special_cases.php';
        require_once __DIR__.'/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__.'/../../lib/Exceptions/PcreException.php';

        $this->expectException(PcreException::class);
        $this->expectExceptionMessage('PREG_BAD_UTF8_ERROR: Invalid UTF8 character');
        preg_replace("/([\s,]+)/u", "foo", "\xc3\x28");
    }

    public function testFgetcsvWithTrailingNewline(): void
    {
        require_once __DIR__.'/../../lib/special_cases.php';
        require_once __DIR__.'/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__.'/../../generated/Exceptions/FilesystemException.php';


        if (($handle = \fopen(__DIR__."/csv/test.csv", "r")) === false) {
            throw new \RuntimeException('Test file could not be opened.');
        }

        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $this->assertEquals(['test', 'test'], $data);
        }
        \fclose($handle);
    }

    public function testFgetcsvReturnFalseonEndOfFile(): void
    {
        require_once __DIR__.'/../../lib/special_cases.php';
        require_once __DIR__.'/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__.'/../../generated/Exceptions/FilesystemException.php';


        if (($handle = \fopen(__DIR__."/csv/test2.csv", "r")) === false) {
            throw new \RuntimeException('Test file could not be opened.');
        }

        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $this->assertEquals(['test', 'test'], $data);
        }
        $this->assertEquals(false, $data); 
        \fclose($handle);
    }

    /*public function testFgetcsvThrowsOnError()
    {
        require_once __DIR__.'/../../lib/special_cases.php';
        require_once __DIR__.'/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__.'/../../generated/Exceptions/FilesystemException.php';

        if (($handle = \fopen(__DIR__."/csv/test3.csv", "r")) === false) {
            throw new \RuntimeException('Test file could not be opened.');
        }

        $this->expectException(FilesystemException::class);
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            echo var_export($data, true);
        }
    }*/
}
