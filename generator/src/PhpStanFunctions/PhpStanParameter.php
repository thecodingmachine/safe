<?php


namespace Safe\PhpStanFunctions;

use Safe\Type;

class PhpStanParameter
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var PhpStanType
     */
    private $type;

    /**
     * @var bool
     */
    private $optional = false;
    /**
     * @var bool
     */
    private $variadic = false;
    /**
     * @var bool
     */
    private $byReference = false;
    /**
     * Whether the parameter is "write only" (applies only to "by reference" parameters)
     * @var bool
     */
    private $writeOnly = false;

    public function __construct(string $name, string $type)
    {
        $writeOnly = false;
        if (\strpos($name, '=') !== false) {
            $this->optional = true;
        }
        if (\strpos($name, '...') !== false) {
            $this->variadic = true;
        }
        if (\strpos($name, '&') !== false) {
            $this->byReference = true;
        }
        if (\strpos($name, '&w_') !== false) {
            $writeOnly = true;
        }
        $name = \str_replace(['&rw_', '&w_'], '', $name);
        $name = trim($name, '=.&');

        $this->name = $name;
        $this->type = new PhpStanType($type, $writeOnly);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): PhpStanType
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isOptional(): bool
    {
        return $this->optional;
    }

    /**
     * @return bool
     */
    public function isVariadic(): bool
    {
        return $this->variadic;
    }

    /**
     * @return bool
     */
    public function isByReference(): bool
    {
        return $this->byReference;
    }

    /**
     * Whether the parameter is "write only" (applies only to "by reference" parameters)
     * @return bool
     */
    public function isWriteOnly(): bool
    {
        return $this->writeOnly;
    }

    public function isNullable(): bool
    {
        return $this->type->isNullable();
    }
}
