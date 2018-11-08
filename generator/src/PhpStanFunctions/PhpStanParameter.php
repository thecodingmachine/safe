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
     * @var string
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
     * @var bool
     */
    private $nullable = false;

    public function __construct(string $name, string $type)
    {
        if (\strpos($name, '=') !== false) {
            $this->optional = true;
        }
        if (\strpos($name, '...') !== false) {
            $this->variadic = true;
        }
        if (\strpos($name, '&') !== false) {
            $this->byReference = true;
        }
        $name = \str_replace(['&rw_', '&w_'], '', $name);
        $name = trim($name, '=.&');

        $this->name = $name;

        if (\strpos($type, '?') !== false) {
            $type = \str_replace('?', '', $type).'|null';
            $this->nullable = true;
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return Type::toRootNamespace($this->type);
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
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }
}
