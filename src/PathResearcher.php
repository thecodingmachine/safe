<?php

namespace Safe;

class PathResearcher
{
    /*
     * @var string
     */
    private $path;

    /*
     * @parameter string
     */
    public function __construct(string $_path)
    {
        $this->path = $_path;
    }

    /**
     * @return string[]
     */
    public function getPaths(): array
    {
        $incompletePaths = glob($this->path);

        foreach ($incompletePaths as $incompletePath) {
            $paths[] = glob($incompletePath.'/functions/*');
        }
        $paths = $this->arrayFlatten($paths);
        return ($paths);
    }

    /**
     * @parameter string[][]
     * @return string[]
     */
    private function arrayFlatten(array $array): array  {
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->arrayFlatten($value));
            }
            else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}

