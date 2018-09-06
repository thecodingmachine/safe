<?php

namespace Safe;

use PHPUnit\Framework\TestCase;

class DocPageTest extends TestCase
{
    public function testDetectFalsyFunction() {
        $shouldBeTrue = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $shouldBeFalse = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/implode.xml');

        $this->assertTrue($shouldBeTrue->detectFalsyFunction());
        $this->assertFalse($shouldBeFalse->detectFalsyFunction());
    }
}
