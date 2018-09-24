<?php

namespace Safe;

use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function testIsClass()
    {
        $this->assertSame('\\stdClass', Type::toRootNamespace('stdClass'));
        $this->assertSame('\\SimpleXMLElement', Type::toRootNamespace('SimpleXMLElement'));
        $this->assertSame('bool', Type::toRootNamespace('bool'));
        $this->assertSame('int', Type::toRootNamespace('int'));
    }
}
