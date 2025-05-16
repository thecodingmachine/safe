<?php

declare(strict_types=1);

namespace Safe\Domain;

use Safe\XmlDocParser\ErrorType;

final class MethodDefinition implements \Stringable
{
    public function __construct(
        public readonly string $name,
        public readonly ErrorType $errorType,
    ) {
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
