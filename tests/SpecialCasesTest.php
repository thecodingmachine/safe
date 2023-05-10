<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SpecialCasesTest extends TestCase
{
    public function testJsonDecodeThrowsNoErrorOnValidJson(): void
    {
        \json_decode('throws an error');
        $array = \Safe\json_decode('[]', false, 512, JSON_THROW_ON_ERROR);
        $this->assertSame([], $array);
    }
}
