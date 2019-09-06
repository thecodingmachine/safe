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
        $this->assertEquals('string', $params[0]->getSignatureType());
        $this->assertEquals('pattern', $params[0]->getParameter());
    }

    public function testGetTypeHintFromRessource()
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/mbstring/functions/mb-ereg-replace-callback.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getDocBlockType());
        $this->assertEquals('callable', $params[1]->getDocBlockType());
        $this->assertEquals('string', $params[0]->getSignatureType());
        $this->assertEquals('callable', $params[1]->getSignatureType());


        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/gmp/functions/gmp-export.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('\GMP|string|int', $params[0]->getDocBlockType());
        $this->assertEquals('', $params[0]->getSignatureType());
        $this->assertEquals('int', $params[1]->getDocBlockType());
        $this->assertEquals('int', $params[1]->getSignatureType());
        
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/hash/functions/hash-update.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('\HashContext', $params[0]->getDocBlockType());
        $this->assertEquals('\HashContext', $params[0]->getSignatureType());        
        
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/imap/functions/imap-open.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('array|null', $params[5]->getDocBlockType());
        $this->assertEquals('?array', $params[5]->getSignatureType());
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
