<?php

namespace Safe;

use PHPUnit\Framework\TestCase;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;

class MethodTest extends TestCase
{
    public function testGetFunctionName()
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $name = $method->getFunctionName();
        $this->assertEquals('preg_match', $name);
    }

    public function testGetFunctionType()
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $type = $method->getReturnType();
        $this->assertEquals('int', $type);
    }

    public function testGetFunctionParam()
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getType());
        $this->assertEquals('pattern', $params[0]->getParameter());
    }

    public function testGetInitializer()
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/apc/functions/apc-cache-info.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);

        $params = $method->getParams();
        $this->assertEquals('', $params[0]->getDefaultValue());
    }
}
