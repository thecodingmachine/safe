<?php

declare(strict_types=1);

namespace Safe;

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
        DocPage::buildEntities();

        $versions = [
            "8.1" => "9097ea48f608dbbbf795235a31af82b85bd94430",
            "8.2" => "8f4e8cf3de08208e71eb0117f1c970c27e9120c9",
            "8.3" => "7453a50321f0834421cebea8edade14deef5466b",
            "8.4" => "d553fa36940639b0889ec4358fa3bbb92f123b69",
            "8.5" => "master",
        ];
        $modules = [];
        $allFunctions = [];

        foreach ($versions as $version => $commit) {
            $refDir = __DIR__ . '/../doc/doc-en/en/reference/';
            (new Process(['git', "checkout", $commit], $refDir))->run();

            $scanner = new Scanner($refDir);
            $res = $scanner->getMethods($scanner->getFunctionsPaths());
            $output->writeln('These functions have been ignored and must be dealt with manually: '.\implode(', ', $res->overloadedFunctions));
            $allFunctions = \array_merge($allFunctions, $res->methods);
            foreach ($res->methods as $function) {
                $modules[$function->getModuleName()] = true;
            }

            // If a method needed a safe wrapper in eg 8.1, but 8.2 is safe natively,
            // we should add a no-op wrapper in 8.2 to keep backwards compatibility.
            $missingMethods = [];
            foreach ($allFunctions as $function) {
                $missingMethods[] = $function;
                $output->writeln('Method no longer needs safe wrapper in ' . $version . ': ' . $function->getFunctionName());
            }

            $genDir = __DIR__ . "/../../generated/$version";
            $fileCreator = new FileCreator();
            $fileCreator->generatePhpFile($res->methods, "$genDir/");
            $fileCreator->generateFunctionsList($res->methods, "$genDir/functionsList.php");
            $fileCreator->generateDeprecatedList($missingMethods, "$genDir/deprecated.php");
            $fileCreator->generateRectorFile($res->methods, "$genDir/rector-migrate.php");
        }

        foreach (\array_keys($modules) as $moduleName) {
            $fileCreator->generateVersionSplitters($moduleName, __DIR__ . "/../../generated/", \array_keys($versions));
            $fileCreator->createExceptionFile((string) $moduleName);
        }

        $fileCreator->generateVersionSplitters("deprecated", __DIR__ . "/../../generated/", \array_keys($versions));

        $this->runCsFix($output);

        // Finally, let's edit the composer.json file
        $output->writeln('Editing composer.json');
        ComposerJsonEditor::editComposerFileForGeneration(\array_keys($modules));

        return 0;
    }

    private function rmGenerated(): void
    {
        $exceptions = \glob(__DIR__.'/../../generated/Exceptions/*.php');
        if ($exceptions === false) {
            throw new \RuntimeException('Failed to require the generated exception files');
        }

        foreach ($exceptions as $exception) {
            \unlink($exception);
        }

        $files = \glob(__DIR__.'/../../generated/*/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated files');
        }

        foreach ($files as $file) {
            \unlink($file);
        }

        if (\file_exists(__DIR__.'/../doc/entities/generated.ent')) {
            \unlink(__DIR__.'/../doc/entities/generated.ent');
        }
    }

    private function runCsFix(OutputInterface $output): void
    {
        $process = new Process(['vendor/bin/phpcbf'], __DIR__.'/../..');
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
