<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;

use PHPUnit\Framework\TestCase;

class PhpStanFunctionMapReaderTest extends TestCase
{
    public function testHas(): void
    {
        $phpStanFunctionMapReader = new PhpStanFunctionMapReader();
        $this->assertTrue($phpStanFunctionMapReader->hasFunction('strpos'));
        $this->assertFalse($phpStanFunctionMapReader->hasFunction('foobar'));
    }

    public function testGet(): void
    {
        $phpStanFunctionMapReader = new PhpStanFunctionMapReader();
        $phpStanFunction = $phpStanFunctionMapReader->getFunction('apcu_fetch');


        // 'apcu_fetch' => ['mixed', 'key'=>'string|string[]', '&w_success='=>'bool'],
        $this->assertSame('mixed', $phpStanFunction->getReturnType()->getDocBlockType());
        $parameters = $phpStanFunction->getParameters();
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
