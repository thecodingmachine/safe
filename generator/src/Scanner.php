<?php

namespace Safe;

use function array_merge;
use function iterator_to_array;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;
use Symfony\Component\Finder\Finder;
use SplFileInfo;

class Scanner
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string[]
     */
    private $ignoredFunctions;

    /**
     * @var string[]
     */
    private $ignoredModules;

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

    /**
     * Returns the list of functions that must be ignored.
     * @return string[]
     */
    private function getIgnoredFunctions(): array
    {
        if ($this->ignoredFunctions === null) {
            $ignoredFunctions = require __DIR__ . '/../config/ignoredFunctions.php';
            $specialCaseFunctions = require __DIR__ . '/../config/specialCasesFunctions.php';

            $this->ignoredFunctions = array_merge($ignoredFunctions, $specialCaseFunctions);
        }
        return $this->ignoredFunctions;
    }

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
     */
    public function getMethods(array $paths): ScannerResponse
    {
        /** @var Method[] $functions */
        $functions = [];
        /** @var string[] $overloadedFunctions */
        $overloadedFunctions = [];

        $phpStanFunctionMapReader = new PhpStanFunctionMapReader();
        $ignoredFunctions = $this->getIgnoredFunctions();
        $ignoredFunctions = \array_combine($ignoredFunctions, $ignoredFunctions);
        $ignoredModules = $this->getIgnoredModules();
        $ignoredModules = \array_combine($ignoredModules, $ignoredModules);
        foreach ($paths as $path) {
            $module = \basename(\dirname($path->getPath()));

            if (isset($ignoredModules[$module])) {
                continue;
            }

            $docPage = new DocPage($path->getPathname());
            $isFalsy = $docPage->detectFalsyFunction();
            $isNullsy = $docPage->detectNullsyFunction();
            $isEmpty = $docPage->detectEmptyFunction();
            if ($isFalsy || $isNullsy || $isEmpty) {
                $errorType = $isFalsy ? Method::FALSY_TYPE : ($isNullsy ? Method::NULLSY_TYPE : Method::EMPTY_TYPE);

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
                    $function = new Method($functionObject, $rootEntity, $docPage->getModule(), $phpStanFunctionMapReader, $errorType);
                    if (isset($ignoredFunctions[$function->getFunctionName()])) {
                        continue;
                    }
                    $functions[] = $function;
                }
            }
        }

        return new ScannerResponse($functions, $overloadedFunctions);
    }
}
