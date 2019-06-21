<?php

namespace Safe;

use PHPUnit\Framework\TestCase;

class DocPageTest extends TestCase
{
    public function testDetectFalsyFunction()
    {
        $pregMatch = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $implode = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/implode.xml');
        $getCwd = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/dir/functions/getcwd.xml');
        $setTime = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/datetime/datetime/settime.xml');
        $filesize = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/filesystem/functions/filesize.xml');
        $sessionRegister = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/session/functions/session-register.xml');
        $mcryptDecrypt = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/mcrypt/functions/mcrypt-decrypt.xml');
        $fsockopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/network/functions/fsockopen.xml');

        $this->assertTrue($pregMatch->detectFalsyFunction());
        $this->assertFalse($implode->detectFalsyFunction());
        $this->assertTrue($getCwd->detectFalsyFunction());
        $this->assertTrue($setTime->detectFalsyFunction());
        $this->assertTrue($filesize->detectFalsyFunction());
        $this->assertFalse($sessionRegister->detectFalsyFunction());
        $this->assertTrue($mcryptDecrypt->detectFalsyFunction());
        $this->assertTrue($fsockopen->detectFalsyFunction());
    }

    public function testDetectNullsyFunction()
    {
        $pregMatch = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/array/functions/array-flip.xml');
        $implode = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/implode.xml');

        $this->assertTrue($pregMatch->detectNullsyFunction());
        $this->assertFalse($implode->detectNullsyFunction());
    }
}
