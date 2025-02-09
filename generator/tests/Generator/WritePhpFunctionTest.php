<?php

declare(strict_types=1);

namespace Safe\Generator;

use PHPUnit\Framework\TestCase;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;
use Safe\XmlDocParser\ErrorType;
use Safe\XmlDocParser\DocPage;
use Safe\XmlDocParser\Method;

class WritePhpFunctionTest extends TestCase
{
    public function testGetPhpPrototypeFunctionRegular(): void
    {
        $docPage = new DocPage(DocPage::findReferenceDir() . '/pcre/functions/preg-match.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);

        $writePhpFunction = new WritePhpFunction($method);
        $funcStr = $writePhpFunction->getPhpFunctionalFunction();
        $this->assertStringContainsString('function preg_match(string $pattern', $funcStr);
    }

    public function testGetPhpPrototypeFunctionOverloaded(): void
    {
        $docPage = new DocPage(DocPage::findReferenceDir() . '/filesystem/functions/file-get-contents.xml');
        $xmlObject = $docPage->getMethodSynopsis();
        $method = new Method($xmlObject[0], $docPage->loadAndResolveFile(), $docPage->getModule(), new PhpStanFunctionMapReader(), ErrorType::FALSY);

        $writePhpFunction = new WritePhpFunction($method);
        $funcStr = $writePhpFunction->getPhpFunctionalFunction();
        $this->assertStringContainsString('} else {', $funcStr);
    }
}
