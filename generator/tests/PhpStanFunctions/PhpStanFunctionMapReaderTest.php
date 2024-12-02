<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;

use PHPUnit\Framework\TestCase;

class PhpStanFunctionMapReaderTest extends TestCase
{
    public function testHas(): void
    {
        $mapReader = new PhpStanFunctionMapReader();
        $this->assertTrue($mapReader->hasFunction('strpos'));
        $this->assertFalse($mapReader->hasFunction('foobar'));
    }

    public function testGet(): void
    {
        $mapReader = new PhpStanFunctionMapReader();
        $function = $mapReader->getFunction('apcu_fetch');


        // 'apcu_fetch' => ['mixed', 'key'=>'string|string[]', '&w_success='=>'bool'],
        $this->assertSame('mixed', $function->getReturnType()->getDocBlockType());
        $parameters = $function->getParameters();
        $this->assertCount(2, $parameters);
        $this->assertSame('success', $parameters['success']->getName());
        $this->assertSame('bool|null', $parameters['success']->getType()->getDocBlockType());
    }
    
    //todo: find a way to test custom map
    /*public function testCustomMapThrowExceptionIfOutdated()
    {
        $mapReader = new PhpStanFunctionMapReader();
    }*/
}
