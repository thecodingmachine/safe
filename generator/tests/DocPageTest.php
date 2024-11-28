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
        $createFromFormat = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/datetime/datetime/createfromformat.xml');
        $filesize = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/filesystem/functions/filesize.xml');
        $mcryptDecrypt = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/mcrypt/functions/mcrypt-decrypt.xml');
        $fsockopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/network/functions/fsockopen.xml');
        $arrayReplace = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/array/functions/array-replace.xml');
        $classImplement = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/spl/functions/class-implements.xml');
        $getHeaders = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/url/functions/get-headers.xml');
        $gzopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/zlib/functions/gzopen.xml');
        $fopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/image/functions/imagecreatefromstring.xml');

        $this->assertTrue($pregMatch->detectFalsyFunction());
        $this->assertFalse($implode->detectFalsyFunction());
        $this->assertTrue($getCwd->detectFalsyFunction());
        $this->assertTrue($createFromFormat->detectFalsyFunction());
        $this->assertTrue($filesize->detectFalsyFunction());
        $this->assertTrue($mcryptDecrypt->detectFalsyFunction());
        $this->assertTrue($fsockopen->detectFalsyFunction());
        $this->assertFalse($arrayReplace->detectFalsyFunction());
        $this->assertTrue($classImplement->detectFalsyFunction());
        $this->assertTrue($getHeaders->detectFalsyFunction());
        $this->assertTrue($gzopen->detectFalsyFunction());
        $this->assertTrue($fopen->detectFalsyFunction());
    }

    public function testDetectNullsyFunction()
    {
        $implode = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/implode.xml');

        $this->assertFalse($implode->detectNullsyFunction());
    }

    public function testDetectEmptyFunction()
    {
        $pgHost = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pgsql/functions/pg-host.xml');

        $this->assertTrue($pgHost->detectEmptyFunction());
    }
}
