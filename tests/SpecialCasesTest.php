<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SpecialCasesTest extends TestCase
{
    public function testJsonDecodeThrowsNoErrorOnValidJson(): void
    {
      \json_decode('throws an error');
      \Safe\json_decode('[]');
    }
}
