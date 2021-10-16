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
        $mcryptDecrypt = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/mcrypt/functions/mcrypt-decrypt.xml');
        $fsockopen = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/network/functions/fsockopen.xml');
        $arrayReplace = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/array/functions/array-replace.xml');
        $mktime = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/datetime/functions/mktime.xml');
        $date = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/datetime/functions/date.xml');
        $classImplement = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/spl/functions/class-implements.xml');
        $getHeaders = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/url/functions/get-headers.xml');
        $ldapSearch = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/ldap/functions/ldap-search.xml');

        $this->assertTrue($pregMatch->detectFalsyFunction());
        $this->assertFalse($implode->detectFalsyFunction());
        $this->assertTrue($getCwd->detectFalsyFunction());
        $this->assertTrue($setTime->detectFalsyFunction());
        $this->assertTrue($filesize->detectFalsyFunction());
        $this->assertTrue($mcryptDecrypt->detectFalsyFunction());
        $this->assertTrue($fsockopen->detectFalsyFunction());
        $this->assertFalse($arrayReplace->detectFalsyFunction());
        $this->assertTrue($mktime->detectFalsyFunction());
        $this->assertTrue($date->detectFalsyFunction());
        $this->assertTrue($classImplement->detectFalsyFunction());
        $this->assertTrue($getHeaders->detectFalsyFunction());
        $this->assertTrue($ldapSearch->detectFalsyFunction());
    }

    public function testDetectNullsyFunction()
    {
        $pregMatch = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/array/functions/array-flip.xml');
        $implode = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/implode.xml');
        $arrayReplace = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/array/functions/array-replace.xml');

        $this->assertTrue($pregMatch->detectNullsyFunction());
        $this->assertFalse($implode->detectNullsyFunction());
        $this->assertTrue($arrayReplace->detectNullsyFunction());
    }
}
