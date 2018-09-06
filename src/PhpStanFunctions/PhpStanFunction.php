<?php


namespace Safe\PhpStanFunctions;

class PhpStanFunction
{
    /**
     * @var string
     */
    private $returnType;

    /**
     * @var PhpStanParameter[]
     */
    private $parameters = [];

    /**
     * @param mixed[] $signature
     */
    public function __construct(array $signature)
    {
        $this->returnType = \array_shift($signature);
        foreach ($signature as $name => $type) {
            $param = new PhpStanParameter($name, $type);
            $this->parameters[$param->getName()] = $param;
        }
    }

    /**
     * @return string
     */
    public function getReturnType(): string
    {
        if ($this->returnType === 'bool') {
            $this->returnType = 'void';
        }
        return \str_replace(['|bool', '|false'], '', $this->returnType);
    }

    /**
     * @return array<string,PhpStanParameter>
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getParameter(string $name): ?PhpStanParameter
    {
        return $this->parameters[$name] ?? null;
    }
}
