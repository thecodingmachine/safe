<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\DocPage;
use Safe\Generator\FileCreator;
use Safe\Generator\ComposerJsonEditor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class GenerateCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('generate')
            ->setDescription('Generates the PHP file with all functions.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $this->rmGenerated();

        // Let's build the DTD necessary to load the XML files.
        $this->checkout(DocPage::findReferenceDir(), "master");
        DocPage::buildEntities();

        // PHP documentation is a living document, which broadly reflects
        // "the current state of PHP". There is no guarantee that any version
        // of the documentation accurately reflects the state of PHP at any
        // given time, but these are some best-guess commits that approximately
        // match the state of PHP at the time of writing.
        $versions = [
            "8.1" => "9097ea48f608dbbbf795235a31af82b85bd94430",
            "8.2" => "8f4e8cf3de08208e71eb0117f1c970c27e9120c9",
            "8.3" => "7453a50321f0834421cebea8edade14deef5466b",
            "8.4" => "d553fa36940639b0889ec4358fa3bbb92f123b69",
            "8.5" => "master",
        ];

        // Keep a track of which modules we have seen across all versions,
        // so that we can generate version splitters and exceptions for them.
        $modules = [];

        // Keep track of all functions that we have generated wrappers for
        // in the past, so if we stop needing a safe-wrapper, we can start
        // generating no-op wrappers instead.
        $allFunctionsByName = [];

        foreach ($versions as $version => $commit) {
            $output->writeln('===============================================');
            $output->writeln('Generating safe wrappers for PHP ' . $version);
            $output->writeln('===============================================');

            // Scan the documentation for a given PHP version and find all
            // functions that we need to generate safe wrappers for.
            $this->checkout(DocPage::findReferenceDir(), $commit);
            $scanner = new Scanner(DocPage::findReferenceDir());
            $res = $scanner->getMethods($scanner->getFunctionsPaths(), $output);
            $output->writeln(
                'Functions have been ignored and must be dealt with manually: ' .
                ($output->isVerbose() ?
                    implode(', ', $res->overloadedFunctions) :
                    count($res->overloadedFunctions) . ' functions'
                )
            );

            $currentFunctionsByName = [];
            foreach ($res->methods as $function) {
                $currentFunctionsByName[$function->getFunctionName()] = $function;
                $allFunctionsByName[$function->getFunctionName()] = $function;
                $modules[$function->getModuleName()] = true;
            }

            // Keep track of which functions we have generated wrappers for
            // in the past, but not in the current version - mark those as
            // "missing" so that we can generate no-op wrappers for them in
            // order to keep backwards compatibility.
            $missingMethods = [];
            foreach ($allFunctionsByName as $oldFunctionName => $oldFunction) {
                if (!\array_key_exists($oldFunctionName, $currentFunctionsByName)) {
                    $missingMethods[] = $oldFunction;
                }
            }
            $output->writeln(
                'Functions no longer need safe wrappers in ' . $version . ': ' .
                ($output->isVerbose() ?
                    \implode(', ', \array_map(fn($m) => $m->getFunctionName(), $missingMethods)) :
                    count($missingMethods) . ' functions'
                )
            );

            $genDir = FileCreator::getSafeRootDir() . "/generated/$version";
            $fileCreator = new FileCreator();
            $fileCreator->generatePhpFile($res->methods, $missingMethods, "$genDir/");
            $fileCreator->generateFunctionsList($res->methods, "$genDir/functionsList.php");
            $fileCreator->generateRectorFile($res->methods, "$genDir/rector-migrate.php");
        }

        foreach (\array_keys($modules) as $moduleName) {
            $fileCreator->generateVersionSplitters($moduleName, FileCreator::getSafeRootDir() . "/generated/", \array_keys($versions));
            $fileCreator->createExceptionFile((string) $moduleName);
        }
        $fileCreator->generateVersionSplitters("functionsList", FileCreator::getSafeRootDir() . "/generated/", \array_keys($versions), true);

        $this->runCsFix($output);

        // Finally, let's edit the composer.json file
        $output->writeln('Editing composer.json');
        \ksort($modules);
        ComposerJsonEditor::editComposerFileForGeneration(\array_keys($modules));

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
        $finder = new Finder();
        $finder->in(FileCreator::getSafeRootDir() . "/generated");
        foreach ($finder as $file) {
            if($file->isFile()) {
                \unlink($file->getPathname());
            }
        }

        if (\file_exists(DocPage::findDocDir() . '/entities/generated.ent')) {
            \unlink(DocPage::findDocDir() . '/entities/generated.ent');
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
