<?php

namespace Safe;

use PHPUnit\Framework\TestCase;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;

class MethodTest extends TestCase
{
    public function testGetFunctionName() {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader());
        $name = $method->getFunctionName();
        $this->assertEquals('preg_match', $name);
    }

    public function  testGetFunctionType() {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader());
        $type = $method->getFunctionType();
        $this->assertEquals('int', $type);
    }

    public function testGetFunctionParam() {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader());
        $params = $method->getFunctionParam();
        $this->assertEquals('string', $params[0]->getType());
        $this->assertEquals('pattern', $params[0]->getParameter());
    }
}
