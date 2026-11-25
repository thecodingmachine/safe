<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\Filesystem\PathHelper;
use Safe\VersionManager;
use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\DocPage;
use Safe\Generator\FileCreator;
use Safe\Generator\ComposerJsonEditor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class GenerateCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('generate')
            ->setDescription('Generates the PHP file with all functions.')
            ->addArgument('version', InputArgument::OPTIONAL, 'The version of PHP to generate for.')
        ;
    }

    protected function execute(
        // These aren't actually sensitive, they just fill the
        // stack traces with tons of useless information.
        #[\SensitiveParameter] InputInterface $input,
        #[\SensitiveParameter] OutputInterface $output
    ): int {
        $this->rmGenerated();

        $allVersions = VersionManager::load();
        $latestVersion = VersionManager::latestVersion($allVersions);
        $versions = $allVersions;

        $version = $input->getArgument("version");
        if ($version) {
            if (!isset($versions[$version])) {
                throw new \InvalidArgumentException("Unknown PHP version: $version");
            }
            $versions = [$version => $versions[$version]];
        }

        // Keep a track of which modules we have seen across all versions,
        // so that we can generate version splitters and exceptions for them.
        $modules = [];

        // Keep track of all functions that we have generated wrappers for
        // in the past, so if we stop needing a safe-wrapper, we can start
        // generating no-op wrappers instead.
        $pastFunctionNames = [];
        $fileCreator = new FileCreator();

        foreach ($versions as $version => $commits) {
            $commit = $commits['doc-en'];
            $docBaseCommit = $commits['doc-base'];
            $output->writeln('===============================================');
            $output->writeln('Generating safe wrappers for PHP ' . $version);
            $output->writeln('===============================================');

            // Scan the documentation for a given PHP version and find all
            // functions that we need to generate safe wrappers for.
            $this->checkout(DocPage::referenceDir(), $commit);
            $this->checkout(PathHelper::docsDirectory() . '/php/doc-base', $docBaseCommit);

            $scanner = new Scanner(DocPage::referenceDir());
            $res = $scanner->getMethods($scanner->getFunctionsPaths(), $pastFunctionNames, $output);
            $output->writeln(
                'Functions have been ignored and must be dealt with manually: ' .
                ($output->isVerbose() ?
                    implode(', ', $res->overloadedFunctions) :
                    count($res->overloadedFunctions) . ' functions'
                )
            );

            foreach ($res->methods as $function) {
                $pastFunctionNames[] = $function->getFunctionName();
                $modules[$function->getModuleName()] = true;
            }

            $genDir = FileCreator::getSafeRootDir() . "/generated/$version";
            $fileCreator->generatePhpFile($res->methods, "$genDir/");
            $fileCreator->generateFunctionsList($res->methods, "$genDir/functionsList.php");
            $fileCreator->generateRectorFile($res->methods, "$genDir/rector-migrate.php");
        }

        // always reset docs to the latest tracked commits, even if the most-recently-supported-version
        // in $versions is pinned to a specific commit - this is so that at the end
        // of a `generate` run, we don't have docs stuck in the past
        $this->checkout(DocPage::referenceDir(), $allVersions[$latestVersion]['doc-en']);
        $this->checkout(PathHelper::docsDirectory() . '/php/doc-base', $allVersions[$latestVersion]['doc-base']);

        foreach (\array_keys($modules) as $moduleName) {
            $fileCreator->deduplicateAndGenerateVersionSplitters($moduleName, FileCreator::getSafeRootDir() . "/generated/", \array_keys($versions));
            $fileCreator->createExceptionFile((string) $moduleName);
        }
        $fileCreator->deduplicateAndGenerateVersionSplitters("functionsList", FileCreator::getSafeRootDir() . "/generated/", \array_keys($versions), true);

        // Edit the composer.json file
        $output->writeln('Editing composer.json');
        \ksort($modules);
        ComposerJsonEditor::editComposerFileForGeneration(\array_keys($modules));

        // Regenerate the autoloader to account for any generated/*.php files being
        // added or removed (files can get removed if you for example only generate
        // for a subset of versions), otherwise phpcbf will fail
        $output->writeln('Running composer install');
        $this->runComposerInstall();

        // Format the generated files
        $this->runCsFix($output);

        return 0;
    }

    private function checkout(string $dir, string $commit): void
    {
        $process = new Process(['git', 'clean', '-fdx'], $dir);
        $process->setTimeout(10);
        $code = $process->run();
        if ($code !== 0) {
            throw new \RuntimeException("Failed to git-clean in $dir (exit $code):\n{$process->getErrorOutput()}");
        }

        $process = new Process(['git', 'checkout', $commit], $dir);
        $process->setTimeout(10);
        $code = $process->run();
        if ($code !== 0) {
            throw new \RuntimeException("Failed to checkout $commit in $dir (exit $code):\n{$process->getErrorOutput()}");
        }
    }

    private function rmGenerated(): void
    {
        if (\file_exists(FileCreator::getSafeRootDir() . "/generated")) {
            $finder = new Finder();
            $finder->in(FileCreator::getSafeRootDir() . "/generated");
            foreach ($finder as $file) {
                if ($file->isFile()) {
                    \unlink($file->getPathname());
                }
            }
        }
    }

    private function runComposerInstall(): void
    {
        $process = new Process(['composer', 'install'], FileCreator::getSafeRootDir());
        $process->setTimeout(10);
        $code = $process->run();
        if ($code !== 0) {
            throw new \RuntimeException("Failed to run composer install in " . FileCreator::getSafeRootDir() . " (exit $code):\n{$process->getErrorOutput()}");
        }
    }

    private function runCsFix(OutputInterface $output): void
    {
        $process = new Process(['vendor/bin/phpcbf'], FileCreator::getSafeRootDir());
        $process->setTimeout(600);
        $process->run(function ($type, $buffer) use ($output) {
            if (Process::ERR === $type) {
                $output->write('<error>'.$buffer.'</error>');
            } else {
                $output->write($buffer);
            }
        });
    }
}
