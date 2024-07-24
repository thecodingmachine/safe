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
        $scanner = new Scanner(dirname(__DIR__) . '/doc/doc-en/en/reference/');

        $paths = $scanner->getFunctionsPaths();

        $scannerResponse = $scanner->getMethods($paths);
        $functions = $scannerResponse->methods;
        $overloadedFunctions = $scannerResponse->overloadedFunctions;

        $output->writeln('These functions have been ignored and must be dealt with manually: ' . \implode(', ', $overloadedFunctions));

        $fileCreator = new FileCreator();
        $fileCreator->generatePhpFile($functions, dirname(dirname(__DIR__)) . '/generated/');
        $fileCreator->generateFunctionsList($functions, dirname(dirname(__DIR__)) . '/generated/functionsList.php');
        $fileCreator->generateRectorFile($functions, dirname(dirname(__DIR__)) . '/rector-migrate.php');


        $modules = [];
        foreach ($functions as $function) {
            $moduleName = $function->getModuleName();
            $modules[$moduleName] = $moduleName;
        }

        foreach (array_keys($modules) as $moduleName) {
            $fileCreator->createExceptionFile((string) $moduleName);
        }

        $this->runCsFix($output);

        // Let's require the generated file to check there is no error.
        $files = \glob(dirname(dirname(__DIR__)) . '/generated/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated file');
        }

        foreach ($files as $file) {
            require($file);
        }

        $files = \glob(dirname(dirname(__DIR__)) . '/generated/Exceptions/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated exception file');
        }

        require_once dirname(dirname(__DIR__)) . '/lib/Exceptions/SafeExceptionInterface.php';
        foreach ($files as $file) {
            require($file);
        }

        // Finally, let's edit the composer.json file
        $output->writeln('Editing composer.json');
        ComposerJsonEditor::editComposerFileForGeneration(\array_values($modules));

        return 0;
    }

    private function rmGenerated(): void
    {
        $exceptions = \glob(dirname(dirname(__DIR__)) . '/generated/Exceptions/*.php');
        if ($exceptions === false) {
            throw new \RuntimeException('Failed to require the generated exception files');
        }

        foreach ($exceptions as $exception) {
            \unlink($exception);
        }

        $files = \glob(dirname(dirname(__DIR__)) . '/generated/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated files');
        }

        foreach ($files as $file) {
            \unlink($file);
        }

        if (\file_exists(dirname(dirname(__DIR__)) . '/doc/entities/generated.ent')) {
            \unlink(dirname(dirname(__DIR__)) . '/doc/entities/generated.ent');
        }
    }

    private function runCsFix(OutputInterface $output): void
    {
        $process = new Process(['vendor/bin/phpcbf'], dirname(dirname(__DIR__)) . '/');
        $process->setTimeout(600);
        $process->run(function ($type, string $buffer) use ($output): void {
            if (Process::ERR === $type) {
                $output->write('<error>' . $buffer . '</error>');
            } else {
                $output->write($buffer);
            }
        });
    }
}
