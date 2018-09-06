<?php

namespace Safe;

use Safe\PhpStanFunctions\PhpStanFunctionMapReader;

class Scanner
{
    /*
     * @var string
     */
    private $path;
    /**
     * @var array
     */
    private $excludedModules;

    /**
     * Scanner constructor.
     * @param string $_path
     * @param string[] $excludedModules
     */
    public function __construct(string $_path, array $excludedModules)
    {
        $this->path = $_path;
        $this->excludedModules = $excludedModules;
    }

    /**
     * @return string[]
     */
    public function getPaths(): array
    {
        $incompletePaths = glob($this->path, GLOB_ONLYDIR);

        $paths = [];
        foreach ($incompletePaths as $incompletePath) {
            $paths = array_merge($paths, glob($incompletePath.'/functions/*.xml'));
        }
        return $paths;
    }

    /**
     * @return mixed[]
     */
    public function getMethods(): array
    {
        $functions = [];
        $overloadedFunctions = [];
        $paths = $this->getPaths();
        $phpStanFunctionMapReader = new PhpStanFunctionMapReader();
        foreach ($paths as $path) {
            $module = \basename(\dirname($path, 2));
            if (\in_array($module, $this->excludedModules)) {
                continue;
            }

            $docPage = new DocPage($path);
            if ($docPage->detectFalsyFunction()) {
                $functionObjects = $docPage->getMethodSynopsis();
                if (count($functionObjects) > 1) {
                    $overloadedFunctions = array_merge($overloadedFunctions, \array_map(function ($functionObject) {
                        return $functionObject->methodname->__toString();
                    }, $functionObjects));
                    continue;
                }
                $rootEntity = $docPage->loadAndResolveFile();
                foreach ($functionObjects as $functionObject) {
                    $functions[] = new Method($functionObject, $rootEntity, $docPage->getModule(), $phpStanFunctionMapReader);
                }
            }
        }

        return [
            'functions' => $functions,
            'overloadedFunctions' => \array_unique($overloadedFunctions)
        ];
    }
}
