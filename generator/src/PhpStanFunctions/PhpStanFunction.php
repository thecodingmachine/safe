<?php


namespace Safe\PhpStanFunctions;

class PhpStanFunction
{
    /**
     * @var PhpStanType
     */
    private $returnType;

    /**
     * @var PhpStanParameter[]
     */
    private $parameters = [];

    /**
     * @param string[] $signature
     */
    public function __construct(array $signature)
    {
        if (count($signature) < 1) {
            throw new \RuntimeException('Invalid signatures');
        }
        $this->returnType = new PhpStanType(\array_shift($signature), false, true);
        foreach ($signature as $name => $type) {
            $param = new PhpStanParameter($name, $type);
            $this->parameters[$param->getName()] = $param;
        }
    }
    
    public function getReturnType(): PhpStanType
    {
        return $this->returnType;
    }

    /**
     * @return array<string,PhpStanParameter>
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getParameter(string $name, int $position): ?PhpStanParameter
    {
        return $this->parameters[$name] ?? array_values($this->parameters)[$position] ?? null;
    }
}
