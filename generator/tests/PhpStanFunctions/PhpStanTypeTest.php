<?php


namespace Safe\PhpStanFunctions;


use PHPUnit\Framework\TestCase;
use Safe\Method;

class PhpStanTypeTest extends TestCase
{
    public function testMixedTypes(): void 
    {
        $param = new PhpStanType('array|string|int');
        $this->assertEquals('array|string|int', $param->getDocBlockType());
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
        $param = new PhpStanType('(?int)|(?string)');
        $this->assertEquals(true, $param->isNullable());
        $this->assertEquals('int|string|null', $param->getDocBlockType());
        $this->assertEquals('', $param->getSignatureType());
    }

    public function testFalsable(): void
    {
        $param = new PhpStanType('string|false');
        $this->assertEquals(true, $param->isFalsable());
        $this->assertEquals('string|false', $param->getDocBlockType());
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
        $param = new PhpStanType('array<string,string>|array<string,false>|array<string,array<int,mixed>>');
        $this->assertEquals('array<string,string>|array<string,false>|array<string,array<int,mixed>>', $param->getDocBlockType());
        $this->assertEquals('array', $param->getSignatureType());
    }

    public function testNullOrFalseBecomingNull(): void
    {
        $param = new PhpStanType('null|false');
        $this->assertEquals('null', $param->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('', $param->getSignatureType(Method::FALSY_TYPE));
    }

    public function testNotEmptyStringBecomingString(): void
    {
        $param = new PhpStanType('non-empty-string|false');
        $this->assertEquals('string', $param->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('string', $param->getSignatureType(Method::FALSY_TYPE));
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
        $this->assertEquals('array<string>', $param->getDocBlockType(Method::FALSY_TYPE));
        $this->assertEquals('array', $param->getSignatureType(Method::FALSY_TYPE));
    }

    public function testNumbersAreRemoved(): void
    {
        $param = new PhpStanType('0|positive-int');
        $this->assertEquals('int', $param->getDocBlockType());
        $this->assertEquals('int', $param->getSignatureType());
    }

}
