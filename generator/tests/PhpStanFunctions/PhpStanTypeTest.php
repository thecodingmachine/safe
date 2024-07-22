<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;


use PHPUnit\Framework\TestCase;
use Safe\Method;

class PhpStanTypeTest extends TestCase
{
    public function testMixedTypes(): void 
    {
        $phpStanType = new PhpStanType('array|string|int');
        $this->assertEquals('array|string|int', $phpStanType->getDocBlockType());
        $this->assertEquals('', $phpStanType->getSignatureType());
    }

    public function testCallable(): void
    {
        $phpStanType = new PhpStanType('callable(string): void');
        $this->assertEquals('callable(string): void', $phpStanType->getDocBlockType());
        $this->assertEquals('callable', $phpStanType->getSignatureType());
    }

    public function testGenerics(): void
    {
        $param = new PhpStanType('string[]');
        $this->assertEquals('string[]', $param->getDocBlockType());
        $this->assertEquals('iterable', $param->getSignatureType());

        $param = new PhpStanType('int[]');
        $this->assertEquals('int[]', $param->getDocBlockType());
        $this->assertEquals('iterable', $param->getSignatureType());

        $param = new PhpStanType('array<string,mixed>');
        $this->assertEquals('array<string,mixed>', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());

        $param = new PhpStanType('array<string,mixed>|array<int,string>');
        $this->assertEquals('array<string,mixed>|array<int,string>', $param->getDocBlockType());
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
        $this->assertEquals(true, $param->isNullable());
        $this->assertEquals('array|null', $param->getDocBlockType());
        $this->assertEquals('?array', $param->getSignatureType());

        $param = new PhpStanType('?int|?string');
        $this->assertEquals(true, $param->isNullable());
        $this->assertEquals('int|string|null', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());

        $param = new PhpStanType('?string');
        $this->assertEquals(true, $param->isNullable());
        $this->assertEquals('string|null', $param->getDocBlockType());
        $this->assertEquals('?string', $param->getSignatureType());

        $param = new PhpStanType('?HashContext');
        $this->assertEquals(true, $param->isNullable());
        $this->assertEquals('\HashContext|null', $param->getDocBlockType());
        $this->assertEquals('?\HashContext', $param->getSignatureType());
    }
    
    public function testParenthesisOutsideOfCallable(): void 
    {
        $phpStanType = new PhpStanType('(?int)|(?string)');
        $this->assertEquals(true, $phpStanType->isNullable());
        $this->assertEquals('int|string|null', $phpStanType->getDocBlockType());
        $this->assertEquals('', $phpStanType->getSignatureType());
    }

    public function testFalsable(): void
    {
        $phpStanType = new PhpStanType('string|false');
        $this->assertEquals(true, $phpStanType->isFalsable());
        $this->assertEquals('string|false', $phpStanType->getDocBlockType());
        $this->assertEquals('string', $phpStanType->getSignatureType());
    }
    
    public function testResource(): void 
    {
        $phpStanType = new PhpStanType('resource');
        $this->assertEquals('resource', $phpStanType->getDocBlockType());
        $this->assertEquals('', $phpStanType->getSignatureType());
    }

    public function testNamespace(): void
    {
        $phpStanType = new PhpStanType('GMP');
        $this->assertEquals('\GMP', $phpStanType->getDocBlockType());
        $this->assertEquals('\GMP', $phpStanType->getSignatureType());
    }
    
    public function testVoid(): void 
    {
        $param = new PhpStanType('');
        $this->assertEquals('', $param->getDocBlockType());
        $this->assertEquals('void', $param->getSignatureType());

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
        $this->assertEquals('void', $param->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('void', $param->getSignatureType(Method::FALSY_TYPE));
        
        //int|false => int if the method is falsy
        $param = new PhpStanType('int|false');
        $this->assertEquals('int', $param->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('int', $param->getSignatureType(Method::FALSY_TYPE));

        //int|null => int if the method is nullsy
        $param = new PhpStanType('int|null');
        $this->assertEquals('int', $param->getDocBlockType(Method::NULLSY_TYPE));
        $this->assertEquals('int', $param->getSignatureType(Method::NULLSY_TYPE));

        $param = new PhpStanType('array|false|null');
        $this->assertEquals('array|null', $param->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('?array', $param->getSignatureType(Method::FALSY_TYPE));
    }
    
    public function testDuplicateType(): void 
    {
        $phpStanType = new PhpStanType('array<string,string>|array<string,false>|array<string,array<int,mixed>>');
        $this->assertEquals('array<string,string>|array<string,false>|array<string,array<int,mixed>>', $phpStanType->getDocBlockType());
        $this->assertEquals('array', $phpStanType->getSignatureType());
    }

    public function testNullOrFalseBecomingNull(): void
    {
        $phpStanType = new PhpStanType('null|false');
        $this->assertEquals('null', $phpStanType->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('', $phpStanType->getSignatureType(Method::FALSY_TYPE));
    }

    public function testNotEmptyStringBecomingString(): void
    {
        $phpStanType = new PhpStanType('non-empty-string|false');
        $this->assertEquals('string', $phpStanType->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('string', $phpStanType->getSignatureType(Method::FALSY_TYPE));
    }

    public function testPositiveIntBecomingInt(): void
    {
        $phpStanType = new PhpStanType('positive-int');
        $this->assertEquals('int', $phpStanType->getDocBlockType());
        $this->assertEquals('int', $phpStanType->getSignatureType());
    }

    public function testListBecomingArray(): void
    {
        $phpStanType = new PhpStanType('list<string>|false');
        $this->assertEquals('array<string>', $phpStanType->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('array', $phpStanType->getSignatureType(Method::FALSY_TYPE));
    }

    public function testNumbersAreRemoved(): void
    {
        $phpStanType = new PhpStanType('0|positive-int');
        $this->assertEquals('int', $phpStanType->getDocBlockType());
        $this->assertEquals('int', $phpStanType->getSignatureType());
    }

}
