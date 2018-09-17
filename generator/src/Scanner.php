<?php

namespace Safe;

use function array_merge;
use function iterator_to_array;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;
use Symfony\Component\Finder\Finder;
use SplFileInfo;

class Scanner
{
    /*
     * @var string
     */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return array<string, SplFileInfo>
     */
    public function getFunctionsPaths(): array
    {
        $finder = new Finder();
        $finder->in($this->path.'*/functions/')->name('*.xml')->sortByName();

        return iterator_to_array($finder);
    }

    /**
     * @return array<string, SplFileInfo>
     */
    public function getMethodsPaths(): array
    {
        $finder = new Finder();
        $finder->in($this->path)->notPath('functions')->name('*.xml')->sortByName();

        return iterator_to_array($finder);
    }

    private $ignoredFunctions;

    /**
     * Returns the list of functions that must be ignored.
     * @return string[]
     */
    private function getIgnoredFunctions(): array
    {
        if ($this->ignoredFunctions === null) {
            $ignoredFunctions = require __DIR__.'/../config/ignoredFunctions.php';
            $specialCaseFunctions = require __DIR__.'/../config/specialCasesFunctions.php';

            $this->ignoredFunctions = array_merge($ignoredFunctions, $specialCaseFunctions);
        }
        return $this->ignoredFunctions;
    }

    private $ignoredModules;

    /**
     * Returns the list of modules that must be ignored.
     * @return string[]
     */
    private function getIgnoredModules(): array
    {
        if ($this->ignoredModules === null) {
            $this->ignoredModules = require __DIR__.'/../config/ignoredModules.php';
        }
        return $this->ignoredModules;
    }

    /**
     * @param SplFileInfo[] $paths
     * @return mixed[] Structure: ['functions'=>Method[], 'overloadedFunctions'=>string[]]
     */
    public function getMethods(array $paths): array
    {
        $functions = [];
        $overloadedFunctions = [];

        $phpStanFunctionMapReader = new PhpStanFunctionMapReader();
        $ignoredFunctions = $this->getIgnoredFunctions();
        $ignoredFunctions = \array_combine($ignoredFunctions, $ignoredFunctions);
        $ignoredModules = $this->getIgnoredModules();
        $ignoredModules = \array_combine($ignoredModules, $ignoredModules);
        foreach ($paths as $path) {
            $module = \basename(\dirname($path, 2));
            if (isset($ignoredModules[$module])) {
                continue;
            }

            $docPage = new DocPage($path);
            if ($docPage->detectFalsyFunction()) {
                $functionObjects = $docPage->getMethodSynopsis();
                if (count($functionObjects) > 1) {
                    $overloadedFunctions = array_merge($overloadedFunctions, \array_map(function ($functionObject) {
                        return $functionObject->methodname->__toString();
                    }, $functionObjects));
                    $overloadedFunctions = \array_filter($overloadedFunctions, function (string $functionName) use ($ignoredFunctions) {
                        return !isset($ignoredFunctions[$functionName]);
                    });
                    continue;
                }
                $rootEntity = $docPage->loadAndResolveFile();
                foreach ($functionObjects as $functionObject) {
                    $function = new Method($functionObject, $rootEntity, $docPage->getModule(), $phpStanFunctionMapReader);
                    if (isset($ignoredFunctions[$function->getFunctionName()])) {
                        continue;
                    }
                    $functions[] = $function;
                }
            }
        }

        return [
            'functions' => $functions,
            'overloadedFunctions' => \array_unique($overloadedFunctions)
        ];
    }
}
