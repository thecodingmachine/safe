<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;

use Safe\Type;

class PhpStanParameter
{
    private readonly string $name;

    private readonly \Safe\PhpStanFunctions\PhpStanType $phpStanType;

    public function __construct(string $name, string $type)
    {
        $writeOnly = false;
        if (str_contains($name, '&w_')) {
            $writeOnly = true;
        }

        $name = \str_replace(['&rw_', '&w_'], '', $name);
        $name = trim($name, '=.&');

        $this->name = $name;

        $this->phpStanType = new PhpStanType($type, $writeOnly);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): PhpStanType
    {
        return $this->phpStanType;
    }
}
