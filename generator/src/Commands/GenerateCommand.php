<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\DocPage;
use Safe\Generator\FileCreator;
use Safe\Generator\ComposerJsonEditor;

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
        $scanner = new Scanner(DocPage::findReferenceDir());

        $paths = $scanner->getFunctionsPaths();

        $res = $scanner->getMethods($paths, $output);
        $functions = $res->methods;
        $overloadedFunctions = $res->overloadedFunctions;

        $output->writeln('These functions have been ignored and must be dealt with manually: '.\implode(', ', $overloadedFunctions));

        $fileCreator = new FileCreator();
        $fileCreator->generatePhpFile($functions, __DIR__ . '/../../../generated/');
        $fileCreator->generateFunctionsList($functions, __DIR__ . '/../../../generated/functionsList.php');
        $fileCreator->generateRectorFile($functions, __DIR__ . '/../../../rector-migrate.php');


        $modules = [];
        foreach ($functions as $function) {
            $moduleName = $function->getModuleName();
            $modules[$moduleName] = $moduleName;
        }

        foreach ($modules as $moduleName => $foo) {
            $fileCreator->createExceptionFile((string) $moduleName);
        }

        $this->runCsFix($output);

        // Finally, let's edit the composer.json file
        $output->writeln('Editing composer.json');
        ComposerJsonEditor::editComposerFileForGeneration(\array_values($modules));

        return 0;
    }

    private function rmGenerated(): void
    {
        $exceptions = \glob(__DIR__.'/../../../generated/Exceptions/*.php');
        if ($exceptions === false) {
            throw new \RuntimeException('Failed to require the generated exception files');
        }

        foreach ($exceptions as $exception) {
            \unlink($exception);
        }

        $files = \glob(__DIR__.'/../../../generated/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated files');
        }

        foreach ($files as $file) {
            \unlink($file);
        }

        if (\file_exists(DocPage::findDocDir() . '/entities/generated.ent')) {
            \unlink(DocPage::findDocDir() . '/entities/generated.ent');
        }
    }

    private function runCsFix(OutputInterface $output): void
    {
        $process = new Process(['vendor/bin/phpcbf'], __DIR__.'/../../..');
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
