<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use PHPUnit\Framework\TestCase;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;

class MethodTest extends TestCase
{
    public function testToString(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $this->assertStringContainsString('Error type: FALSY', (string)$method);
    }

    public function testGetFunctionName(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $name = $method->getFunctionName();
        $this->assertEquals('preg_match', $name);
    }

    public function testGetFunctionType(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $type = $method->getSignatureReturnType();
        $this->assertEquals('int', $type);
        $errorType = $method->getErrorType();
        $this->assertEquals(ErrorType::FALSY, $errorType);
    }

    public function testGetFunctionParam(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getSignatureType());
        $this->assertEquals('pattern', $params[0]->getParameterName());
    }

    public function testGetTypeHintFromResource(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/strings/functions/sprintf.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getDocBlockType());
        $this->assertEquals('string', $params[0]->getSignatureType());
        $this->assertEquals('bool|float|int|null|string', $params[1]->getDocBlockType());
        $this->assertTrue($params[1]->isVariadic());
        $this->assertEquals('', $params[1]->getSignatureType());

        $docPage = new DocPage(DocPage::referenceDir() . '/mbstring/functions/mb-ereg-replace-callback.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $params = $method->getParams();
        $this->assertEquals('string', $params[0]->getDocBlockType());
        $this->assertEquals('callable(array<int|string, string>):string', $params[1]->getDocBlockType());
        $this->assertEquals('string', $params[0]->getSignatureType());
        $this->assertEquals('callable', $params[1]->getSignatureType());


        $docPage = new DocPage(DocPage::referenceDir() . '/gmp/functions/gmp-export.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $params = $method->getParams();
        $this->assertEquals('\GMP|int|string', $params[0]->getDocBlockType());
        $this->assertEquals('', $params[0]->getSignatureType());
        $this->assertEquals('int', $params[1]->getDocBlockType());
        $this->assertEquals('int', $params[1]->getSignatureType());

        $docPage = new DocPage(DocPage::referenceDir() . '/hash/functions/hash-update.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $params = $method->getParams();
        $this->assertEquals('\HashContext', $params[0]->getDocBlockType());
        $this->assertEquals('\HashContext', $params[0]->getSignatureType());
    }

    public function testImapOpen5Parameter(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/imap/functions/imap-open.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $params = $method->getParams();
        $this->assertEquals('array', $params[5]->getDocBlockType());
        $this->assertEquals('array', $params[5]->getSignatureType());
    }

    public function testGetInitializer(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/apache/functions/apache-getenv.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);

        $params = $method->getParams();
        $this->assertEquals('', $params[0]->getDefaultValue());
        $this->assertEquals('false', $params[1]->getDefaultValue());
    }

    public function testGetReturnDocBlock(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/array/functions/array-replace.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::NULLSY);
        // $this->assertEquals("@return array Returns an array.\n", $method->getReturnDocBlock());
        $this->assertEquals("@return array\n", $method->getReturnDocBlock());

        $docPage = new DocPage(DocPage::referenceDir() . '/shmop/functions/shmop-delete.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        $this->assertEquals('', $method->getReturnDocBlock());
        $this->assertEquals('void', $method->getSignatureReturnType());

        $docPage = new DocPage(DocPage::referenceDir() . '/sqlsrv/functions/sqlsrv-next-result.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        // $this->assertEquals("@return bool|null Returns TRUE if the next result was successfully retrieved, FALSE if an error\n   occurred, and NULL if there are no more results to retrieve.\n", $method->getReturnDocBlock());
        $this->assertEquals("@return bool|null\n", $method->getReturnDocBlock());
        $this->assertEquals('?bool', $method->getSignatureReturnType());
    }

    public function testGetPhpDoc(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/array/functions/array-replace.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::NULLSY);
        $this->assertStringContainsString('@param array $array', $method->getPhpDoc());
    }

    public function testIsOverloaded(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/array/functions/array-all.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::NULLSY);
        $this->assertFalse($method->isOverloaded());

        $docPage = new DocPage(DocPage::referenceDir() . '/filesystem/functions/file-get-contents.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::NULLSY);
        $this->assertTrue($method->isOverloaded());
    }

    public function testOpensslCipherKeyLengthUnionTypeReturnDocBlocks(): void
    {
        $docPage = new DocPage(DocPage::referenceDir() . '/openssl/functions/openssl-cipher-key-length.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);
        // $this->assertEquals("@return int Returns the cipher length on success.\n", $method->getReturnDocBlock());
        $this->assertEquals("@return int\n", $method->getReturnDocBlock());
    }
}
