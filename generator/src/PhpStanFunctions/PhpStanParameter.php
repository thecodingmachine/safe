<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;

use Safe\Type;

class PhpStanParameter
{
    private readonly string $name;
    private readonly PhpStanType $type;

    public function __construct(string $name, string $type)
    {
        $writeOnly = false;
        if (\strpos($name, '&w_') !== false) {
            $writeOnly = true;
        }
        $name = \str_replace(['&rw_', '&w_'], '', $name);
        $name = trim($name, '=.&');

        $this->name = $name;
        $this->type = new PhpStanType($type, $writeOnly);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): PhpStanType
    {
        return $this->type;
    }
}
