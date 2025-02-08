<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use function array_merge;
use function iterator_to_array;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;
use Safe\Generator\FileCreator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;
use SplFileInfo;

class Scanner
{
    /**
     * @var string[]
     */
    private ?array $ignoredFunctions = null;

    /**
     * @var string[]
     */
    private $ignoredModules;

    public function __construct(private readonly string $path)
    {
    }

    /**
     * @return array<string, SplFileInfo>
     */
    public function getFunctionsPaths(): array
    {
        $finder = new Finder();
        $finder->in($this->path.'/*/functions/')->name('*.xml')->sortByName();

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
            $ignoredFunctions = require FileCreator::getSafeRootDir() . '/generator/config/ignoredFunctions.php';
            $specialCaseFunctions = $this->getSpecialCases();

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
            $this->ignoredModules = require FileCreator::getSafeRootDir() . '/generator/config/ignoredModules.php';
        }
        return $this->ignoredModules;
    }

    /**
     * Get a list of functions defined in special_cases.php so that we
     * can ignore them in the main list.
     *
     * @return string[]
     */
    public static function getSpecialCases(): array
    {
        $data = file_get_contents(FileCreator::getSafeRootDir() . '/lib/special_cases.php');
        if ($data === false) {
            throw new \RuntimeException('Unable to read special cases');
        }
        $matches = [];
        preg_match_all('/function\s+([\w_]+)\(/', $data, $matches);
        return $matches[1];
    }

    /**
     * @param SplFileInfo[] $paths
     */
    public function getMethods(array $paths, OutputInterface $output): ScannerResponse
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

        ProgressBar::setFormatDefinition('custom', ' %current%/%max% [%bar%] %message%');
        $progressBar = new ProgressBar($output, count($paths));
        $progressBar->setFormat("custom");
        foreach ($paths as $path) {
            $module = \basename(\dirname($path->getPath()));
            $progressBar->setMessage($path->getFilename());
            $progressBar->advance();

            if (isset($ignoredModules[$module])) {
                continue;
            }

            $docPage = new DocPage($path->getPathname());
            $errorType = $docPage->getErrorType();
            if ($errorType !== ErrorType::UNKNOWN) {
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
        $progressBar->finish();
        $output->writeln("");

        return new ScannerResponse($functions, $overloadedFunctions);
    }
}
