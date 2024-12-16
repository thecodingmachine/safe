<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;

class MethodTest extends TestCase
{
    public function testGetFunctionName(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $name = $method->getFunctionName();
        $this->assertEquals('preg_match', $name);
    }

    public function testGetFunctionType(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $type = $method->getSignatureReturnType();
        $this->assertEquals('int', $type);
    }

    public function testGetFunctionParam(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getSignatureType());
        $this->assertEquals('pattern', $params[0]->getParameterName());
    }

    public function testGetTypeHintFromResource(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/strings/functions/sprintf.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getDocBlockType());
        $this->assertEquals('string', $params[0]->getSignatureType());
        $this->assertEquals('string|int|float|bool|null', $params[1]->getDocBlockType());
        $this->assertTrue($params[1]->isVariadic());
        $this->assertEquals('', $params[1]->getSignatureType());

        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/mbstring/functions/mb-ereg-replace-callback.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getDocBlockType());
        $this->assertEquals('callable(array<int|string, string>):string', $params[1]->getDocBlockType());
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
    }
    
    public function testImapOpen5Parameter(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/imap/functions/imap-open.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $params = $method->getParams();
        $this->assertEquals('array', $params[5]->getDocBlockType());
        $this->assertEquals('array', $params[5]->getSignatureType());        
    }

    public function testGetInitializer(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/apache/functions/apache-getenv.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);

        $params = $method->getParams();
        $this->assertEquals('', $params[0]->getDefaultValue());
        $this->assertEquals('false', $params[1]->getDefaultValue());
    }
    
    public function testGetReturnDocBlock(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/array/functions/array-replace.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::NULLSY_TYPE);
        $this->assertEquals("@return array Returns an array.\n", $method->getReturnDocBlock());

        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/shmop/functions/shmop-delete.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $this->assertEquals('', $method->getReturnDocBlock());
        $this->assertEquals('void', $method->getSignatureReturnType());

        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/sqlsrv/functions/sqlsrv-next-result.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $this->assertEquals("@return bool|null Returns TRUE if the next result was successfully retrieved, FALSE if an error \n   occurred, and NULL if there are no more results to retrieve.\n", $method->getReturnDocBlock());
        $this->assertEquals('?bool', $method->getSignatureReturnType());
    }

    public function testOpensslCipherKeyLengthUnionTypeReturnDocBlocks(): void
    {
        $docPage = new DocPage(__DIR__ . '/../doc/doc-en/en/reference/openssl/functions/openssl-cipher-key-length.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), Method::FALSY_TYPE);
        $this->assertEquals("@return int Returns the cipher length on success,  or false on failure.\n", $method->getReturnDocBlock());
    }
}
