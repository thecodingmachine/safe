<?php

namespace Safe;

use PHPUnit\Framework\TestCase;
use Safe\Exceptions\PcreException;

class SpecialCasesTest extends TestCase
{

    public function testPregReplace()
    {
        require_once __DIR__.'/../../lib/special_cases.php';
        require_once __DIR__.'/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__.'/../../lib/Exceptions/PcreException.php';

        $this->expectException(PcreException::class);
        $this->expectExceptionMessage('PREG_BAD_UTF8_ERROR: Malformed UTF-8 characters, possibly incorrectly encoded');
        preg_replace("/([\s,]+)/u", "foo", "\xc3\x28");
    }
}
