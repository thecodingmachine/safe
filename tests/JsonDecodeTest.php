<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class JsonDecodeTest extends TestCase
{
    public function testJsonLastErrorIsNotCheckedIfFlagIsSet(): void
    {
        \json_decode('{');
        self::assertNotSame(JSON_ERROR_NONE, \json_last_error());

        \Safe\json_decode('[]', flags: \JSON_THROW_ON_ERROR);
    }
}
