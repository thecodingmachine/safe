<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;

use PHPUnit\Framework\TestCase;
use Safe\XmlDocParser\ErrorType;

class PhpStanTypeTest extends TestCase
{
    public function testMixedTypes(): void
    {
        $param = new PhpStanType('array|int|string');
        $this->assertEquals('array|int|string', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());
    }

    public function testCallable(): void
    {
        $param = new PhpStanType('callable(string): void');
        $this->assertEquals('callable(string): void', $param->getDocBlockType());
        $this->assertEquals('callable', $param->getSignatureType());
    }

    public function testGenerics(): void
    {
        $param = new PhpStanType('string[]');
        $this->assertEquals('string[]', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());

        $param = new PhpStanType('int[]');
        $this->assertEquals('int[]', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());

        $param = new PhpStanType('array<string,mixed>');
        $this->assertEquals('array<string,mixed>', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());

        $param = new PhpStanType('array<int,string>|array<string,mixed>');
        $this->assertEquals('array<int,string>|array<string,mixed>', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());

        $param = new PhpStanType('array<int|string,object|bool>');
        $this->assertEquals('array<int|string,object|bool>', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());

        $param = new PhpStanType('array<int|string,array<int|string>>|array{1: int, 2: string}');
        $this->assertEquals('array<int|string,array<int|string>>|array{1: int, 2: string}', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());

        $param = new PhpStanType('array{0:float,1:float,2:float,3:float,4:float,5:float}');
        $this->assertEquals('array{0:float,1:float,2:float,3:float,4:float,5:float}', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());
    }

    public function testNullable(): void
    {
        $param = new PhpStanType('array|null');
        $this->assertEquals('array|null', $param->getDocBlockType());
        $this->assertEquals('?array', $param->getSignatureType());

        $param = new PhpStanType('?int|?string');
        $this->assertEquals('int|null|string', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());

        $param = new PhpStanType('?string');
        $this->assertEquals('null|string', $param->getDocBlockType());
        $this->assertEquals('?string', $param->getSignatureType());

        $param = new PhpStanType('?HashContext');
        $this->assertEquals('\HashContext|null', $param->getDocBlockType());
        $this->assertEquals('?\HashContext', $param->getSignatureType());
    }

    public function testParenthesisOutsideOfCallable(): void
    {
        $param = new PhpStanType('(?int)|(?string)');
        $this->assertEquals('int|null|string', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());
    }

    public function testFalsable(): void
    {
        $param = new PhpStanType('string|false');
        $this->assertEquals('false|string', $param->getDocBlockType());
        $this->assertEquals('string', $param->getSignatureType());
    }

    public function testResource(): void
    {
        $param = new PhpStanType('resource');
        $this->assertEquals('resource', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());
    }

    public function testNamespace(): void
    {
        $param = new PhpStanType('GMP');
        $this->assertEquals('\GMP', $param->getDocBlockType());
        $this->assertEquals('\GMP', $param->getSignatureType());
    }

    public function testVoid(): void
    {
        $param = new PhpStanType('');
        $this->assertEquals('', $param->getDocBlockType());
        if (PHP_VERSION_ID >= 80200) {
            $this->assertEquals('void', $param->getSignatureType());
        } else {
            $this->assertEquals('', $param->getSignatureType());
        }

        $param = new PhpStanType('void');
        $this->assertEquals('void', $param->getDocBlockType());
        $this->assertEquals('void', $param->getSignatureType());
    }

    public function testOciSpecialCases(): void
    {
        $param = new PhpStanType('OCI-Collection');
        $this->assertEquals('\OCI-Collection', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());

        $param = new PhpStanType('OCI-Lob');
        $this->assertEquals('\OCI-Lob', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());
    }

    public function testErrorTypeInteraction(): void
    {
        //bool => void if the method is falsy
        $param = new PhpStanType('bool');
        $this->assertEquals('void', $param->getDocBlockType(ErrorType::FALSY));
        $this->assertEquals('void', $param->getSignatureType(ErrorType::FALSY));

        //int|false => int if the method is falsy
        $param = new PhpStanType('int|false');
        $this->assertEquals('int', $param->getDocBlockType(ErrorType::FALSY));
        $this->assertEquals('int', $param->getSignatureType(ErrorType::FALSY));

        //int|null => int if the method is nullsy
        $param = new PhpStanType('int|null');
        $this->assertEquals('int', $param->getDocBlockType(ErrorType::NULLSY));
        $this->assertEquals('int', $param->getSignatureType(ErrorType::NULLSY));

        $param = new PhpStanType('array|false|null');
        $this->assertEquals('array|null', $param->getDocBlockType(ErrorType::FALSY));
        $this->assertEquals('?array', $param->getSignatureType(ErrorType::FALSY));
    }

    public function testDuplicateType(): void
    {
        $param = new PhpStanType('array<string,string>|array<string,false>|array<string,array<int,mixed>>');
        $this->assertEquals('array<string,array<int,mixed>>|array<string,false>|array<string,string>', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());
    }

    public function testNullOrFalseBecomingNull(): void
    {
        $param = new PhpStanType('null|false');
        $this->assertEquals('null', $param->getDocBlockType(ErrorType::FALSY));
        $this->assertEquals('', $param->getSignatureType(ErrorType::FALSY));
    }

    public function testNotEmptyStringBecomingString(): void
    {
        $param = new PhpStanType('non-empty-string|false');
        $this->assertEquals('non-empty-string', $param->getDocBlockType(ErrorType::FALSY));
        $this->assertEquals('string', $param->getSignatureType(ErrorType::FALSY));
    }

    public function testPositiveIntBecomingInt(): void
    {
        $param = new PhpStanType('positive-int');
        $this->assertEquals('int', $param->getDocBlockType());
        $this->assertEquals('int', $param->getSignatureType());
    }

    public function testListBecomingArray(): void
    {
        $param = new PhpStanType('list<string>|false');
        $this->assertEquals('array<string>', $param->getDocBlockType(ErrorType::FALSY));
        $this->assertEquals('array', $param->getSignatureType(ErrorType::FALSY));
    }

    public function testNumbersAreRemoved(): void
    {
        $param = new PhpStanType('0|positive-int');
        $this->assertEquals('int', $param->getDocBlockType());
        $this->assertEquals('int', $param->getSignatureType());
    }

    public function testIgnoreBenevolence(): void
    {
        $param = new PhpStanType('__benevolent<string|false>');
        $this->assertEquals('string', $param->getDocBlockType(ErrorType::FALSY));
        $this->assertEquals('string', $param->getSignatureType(ErrorType::FALSY));
    }

    public function testTypeFromXML(): void
    {
        $xml = \simplexml_load_string('<type>string</type>');
        $this->assertNotFalse($xml);
        $param = new PhpStanType($xml);
        $this->assertEquals('string', $param->getDocBlockType());
    }

    public function testUnionFromXML(): void
    {
        $xml = \simplexml_load_string('<type class="union"><type>OpenSSLCertificate</type><type>string</type></type>');
        $this->assertNotFalse($xml);
        $param = new PhpStanType($xml);
        $this->assertEquals('\OpenSSLCertificate|string', $param->getDocBlockType());
    }

    public function testSelectMostUsefulType(): void
    {
        // if phpstan doesn't know about the function, use phpdoc
        $this->assertEquals(
            'string',
            PhpStanType::selectMostUsefulType(
                null,
                new PhpStanType('string')
            )->getDocBlockType()
        );

        // if both have useful information, use phpstan
        $this->assertEquals(
            'int',
            PhpStanType::selectMostUsefulType(
                new PhpStanType('int'),
                new PhpStanType('string')
            )->getDocBlockType()
        );

        // if phpstan claims something is a resource, don't trust it
        $this->assertEquals(
            '\GdImage',
            PhpStanType::selectMostUsefulType(
                new PhpStanType('resource'),
                new PhpStanType('GdImage')
            )->getDocBlockType()
        );
    }
}
