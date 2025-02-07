<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Safe\Exceptions\ExecException;
use Safe\Exceptions\FilesystemException;
use Safe\Exceptions\PcreException;

class SpecialCasesTest extends TestCase
{

    public function testPregReplace(): void
    {
        $this->expectException(PcreException::class);
        $this->expectExceptionMessage('PREG_BAD_UTF8_ERROR: Invalid UTF8 character');
        \Safe\preg_replace("/([\s,]+)/u", "foo", "\xc3\x28");
    }

    public function testFgetcsvWithTrailingNewline(): void
    {
        if (($handle = \fopen(__DIR__."/csv/test.csv", "r")) === false) {
            throw new \RuntimeException('Test file could not be opened.');
        }

        while (($data = \Safe\fgetcsv($handle, 1000, ",")) !== false) {
            $this->assertEquals(['test', 'test'], $data);
        }
        \fclose($handle);
    }

    public function testFgetcsvReturnFalseonEndOfFile(): void
    {
        if (($handle = \fopen(__DIR__."/csv/test2.csv", "r")) === false) {
            throw new \RuntimeException('Test file could not be opened.');
        }

        while (($data = \Safe\fgetcsv($handle, 1000, ",")) !== false) {
            $this->assertEquals(['test', 'test'], $data);
        }
        $this->assertEquals(false, $data);
        \fclose($handle);
    }

    /*public function testFgetcsvThrowsOnError()
    {
        if (($handle = \fopen(__DIR__."/csv/test3.csv", "r")) === false) {
            throw new \RuntimeException('Test file could not be opened.');
        }

        $this->expectException(FilesystemException::class);
        while (($data = \Safe\fgetcsv($handle, 1000, ",")) !== false) {
            echo var_export($data, true);
        }
    }*/

	public function testProcClose(): void
	{
		$proc = \Safe\proc_open("false", [], $pipes);
		$exitCode = \Safe\proc_close($proc);
		$this->assertEquals($exitCode, 1);
	}
}
