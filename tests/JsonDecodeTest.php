<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class JsonDecodeTest extends TestCase
{
    public function testJsonDecode()
    {
        // assert valid json
        $this->assertSame(
            [],
            \Safe\json_decode("[]"),
        );
    }

    public function testInvalidJsonDecode()
    {
        // create json error
        \json_decode("\00 invalid json");
        $this->assertGreaterThan(0, json_last_error());

        $this->expectException(\Safe\Exceptions\JsonException::class);
        \Safe\json_decode("\00 invalid json");

    }

    public function testJsonDecodeWithJsonThrowOnErrorFlag()
    {
        // create json error
        \json_decode("\00 invalid json");
        $this->assertGreaterThan(0, json_last_error());

        // assert valid json
        $this->assertSame(
            [],
            \Safe\json_decode("[]", true, 512, JSON_THROW_ON_ERROR),
        );
    }

    public function testInvalidJsonDecodeWithJsonThrowOnErrorFlag()
    {
        // create json error
        \json_decode("\00 invalid json");
        $this->assertGreaterThan(0, json_last_error());

        $this->expectException(\Safe\Exceptions\JsonException::class);
        \Safe\json_decode("\00 invalid json", true, 512, JSON_THROW_ON_ERROR);
    }
}