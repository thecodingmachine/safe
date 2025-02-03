<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;

class DocPageTest extends TestCase
{
    public function testDetectFalsyFunction(): void
    {
        $pregMatch = new DocPage(DocPage::findReferenceDir() . '/pcre/functions/preg-match.xml');
        $implode = new DocPage(DocPage::findReferenceDir() . '/strings/functions/implode.xml');
        $getCwd = new DocPage(DocPage::findReferenceDir() . '/dir/functions/getcwd.xml');
        $createFromFormat = new DocPage(DocPage::findReferenceDir() . '/datetime/datetime/createfromformat.xml');
        $filesize = new DocPage(DocPage::findReferenceDir() . '/filesystem/functions/filesize.xml');
        $fsockopen = new DocPage(DocPage::findReferenceDir() . '/network/functions/fsockopen.xml');
        $arrayReplace = new DocPage(DocPage::findReferenceDir() . '/array/functions/array-replace.xml');
        $classImplement = new DocPage(DocPage::findReferenceDir() . '/spl/functions/class-implements.xml');
        $getHeaders = new DocPage(DocPage::findReferenceDir() . '/url/functions/get-headers.xml');
        $gzopen = new DocPage(DocPage::findReferenceDir() . '/zlib/functions/gzopen.xml');
        $fopen = new DocPage(DocPage::findReferenceDir() . '/image/functions/imagecreatefromstring.xml');

        $this->assertTrue($pregMatch->detectFalsyFunction());
        $this->assertFalse($implode->detectFalsyFunction());
        $this->assertTrue($getCwd->detectFalsyFunction());
        $this->assertTrue($createFromFormat->detectFalsyFunction());
        $this->assertTrue($filesize->detectFalsyFunction());
        $this->assertTrue($fsockopen->detectFalsyFunction());
        $this->assertFalse($arrayReplace->detectFalsyFunction());
        $this->assertTrue($classImplement->detectFalsyFunction());
        $this->assertTrue($getHeaders->detectFalsyFunction());
        $this->assertTrue($gzopen->detectFalsyFunction());
        $this->assertTrue($fopen->detectFalsyFunction());
    }

    public function testDetectNullsyFunction(): void
    {
        $implode = new DocPage(DocPage::findReferenceDir() . '/strings/functions/implode.xml');

        $this->assertFalse($implode->detectNullsyFunction());
    }

    public function testDetectEmptyFunction(): void
    {
        $pgHost = new DocPage(DocPage::findReferenceDir() . '/pgsql/functions/pg-host.xml');

        $this->assertTrue($pgHost->detectEmptyFunction());
    }
}
