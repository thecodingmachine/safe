<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use Safe\Domain\MethodDefinition;
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
    private ?array $ignoredModules = null;

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
            assert(!is_null($this->ignoredModules));
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
     * Get a list of functions defined in special_cases.php so that we
     * can ignore them in the main list.
     *
     * @return string[]
     */
    public static function getHiddenFunctions(): array
    {
        return require FileCreator::getSafeRootDir() . '/generator/config/hiddenFunctions.php';
    }

    /**
     * @param SplFileInfo[] $paths
     * @param string[] $pastFunctionNames
     */
    public function getMethods(array $paths, array $pastFunctionNames, OutputInterface $output): ScannerResponse
    {
        /** @var Method[] $functions */
        $functions = [];
        /** @var MethodDefinition[] $overloadedFunctions */
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

            // If this function was unsafe in the past, but is safe now,
            // then we need a pass-through stub to keep compatibility
            $guessedMethod = $path->getFilename();
            $guessedMethod = \str_replace('.xml', '', $guessedMethod);
            $guessedMethod = \str_replace('-', '_', $guessedMethod);
            $wasThisFunctionUnsafe = in_array($guessedMethod, $pastFunctionNames);

            $errorType = $docPage->getErrorType();
            if ($errorType !== ErrorType::UNKNOWN || $wasThisFunctionUnsafe) {
                $functionObjects = $docPage->getMethodSynopsis();
                if (count($functionObjects) > 1) {
                    $overloadedFunctions = \array_merge($overloadedFunctions, \array_map(static fn(\SimpleXMLElement $functionObject) => new MethodDefinition((string) $functionObject->methodname, $errorType), $functionObjects));
                    $overloadedFunctions = \array_filter($overloadedFunctions, static fn(MethodDefinition $method) => !\array_key_exists($method->name, $ignoredFunctions));

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
