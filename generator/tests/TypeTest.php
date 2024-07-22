<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function testIsClass(): void
    {
        $this->assertSame('\\stdClass', Type::toRootNamespace('stdClass'));
        $this->assertSame('\\SimpleXMLElement', Type::toRootNamespace('SimpleXMLElement'));
        $this->assertSame('bool', Type::toRootNamespace('bool'));
        $this->assertSame('int', Type::toRootNamespace('int'));
    }
}
