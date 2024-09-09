<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;

class DocPageTest extends TestCase
{
    public function testDetectFalsyFunction(): void
    {
        $pregMatch = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $implode = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/implode.xml');
        $getCwd = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/dir/functions/getcwd.xml');
        $setTime = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/datetime/datetime/settime.xml');
        $filesize = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/filesystem/functions/filesize.xml');
        $mcryptDecrypt = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/mcrypt/functions/mcrypt-decrypt.xml');
        $fsockopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/network/functions/fsockopen.xml');
        $arrayReplace = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/array/functions/array-replace.xml');
        $date = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/datetime/functions/date.xml');
        $classImplement = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/spl/functions/class-implements.xml');
        $getHeaders = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/url/functions/get-headers.xml');
        $gzopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/zlib/functions/gzopen.xml');
        $fopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/image/functions/imagecreatefromstring.xml');

        $this->assertTrue($pregMatch->detectFalsyFunction());
        $this->assertFalse($implode->detectFalsyFunction());
        $this->assertTrue($getCwd->detectFalsyFunction());
        $this->assertFalse($setTime->detectFalsyFunction());
        $this->assertTrue($filesize->detectFalsyFunction());
        $this->assertTrue($mcryptDecrypt->detectFalsyFunction());
        $this->assertTrue($fsockopen->detectFalsyFunction());
        $this->assertFalse($arrayReplace->detectFalsyFunction());
        $this->assertFalse($date->detectFalsyFunction());
        $this->assertTrue($classImplement->detectFalsyFunction());
        $this->assertTrue($getHeaders->detectFalsyFunction());
        $this->assertTrue($gzopen->detectFalsyFunction());
        $this->assertTrue($fopen->detectFalsyFunction());
    }

    public function testDetectNullsyFunction(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/implode.xml');

        $this->assertFalse($docPage->detectNullsyFunction());
    }

    public function testDetectEmptyFunction(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pgsql/functions/pg-host.xml');

        $this->assertTrue($docPage->detectEmptyFunction());
    }
}
