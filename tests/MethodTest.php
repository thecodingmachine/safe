<?php

namespace Safe;

use PHPUnit\Framework\TestCase;

class MethodTest extends TestCase
{
    public function testGetFunctionName() {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject);
        $name = $method->getFunctionName();
        $this->assertEquals(0, strcmp('preg_match', $name[0]));
    }

    public function  testGetFunctionType() {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject);
        $type = $method->getFunctionType();
        $this->assertEquals(0, strcmp('int', $type[0]));
    }

    public function testGetFunctionParam() {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject);
        $params = $method->getFunctionParam();
        $this->assertEquals(0, strcmp('string', $params[0]['type']));
        $this->assertEquals(0, strcmp('pattern', $params[0]['parameter']));
    }
}
