<?php


namespace Safe;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class GenerateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate')
            ->setDescription('Generates the PHP file with all functions.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->rmGenerated();
        // Let's build the DTD necessary to load the XML files.
        DocPage::buildEntities();
        $scanner = new Scanner(__DIR__ . '/../doc/doc-en/en/reference/');

        $paths = $scanner->getFunctionsPaths();

        [
            'functions' => $functions,
            'overloadedFunctions' => $overloadedFunctions
        ] = $scanner->getMethods($paths);

        $output->writeln('These functions have been ignored and must be dealt with manually: '.\implode(', ', $overloadedFunctions));

        $fileCreator = new FileCreator();
        //$fileCreator->generateXlsFile($protoFunctions, __DIR__ . '/../generated/lib.xls');
        $fileCreator->generatePhpFile($functions, __DIR__ . '/../../generated/');
        $fileCreator->generateFunctionsList($functions, __DIR__ . '/../../generated/functionsList.php');
        $fileCreator->generateRectorFile($functions, __DIR__ . '/../../rector-migrate.yml');


        $modules = [];
        foreach ($functions as $function) {
            $modules[$function->getModuleName()] = $function->getModuleName();
        }

        foreach ($modules as $moduleName => $foo) {
            $fileCreator->createExceptionFile($moduleName);
        }

        $this->runCsFix($output);

        // Let's require the generated file to check there is no error.
        $files = \glob(__DIR__.'/../../generated/*.php');

        foreach ($files as $file) {
            require($file);
        }

        $files = \glob(__DIR__.'/../../generated/Exceptions/*.php');

        require_once __DIR__.'/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__.'/../../lib/Exceptions/AbstractSafeException.php';
        foreach ($files as $file) {
            require($file);
        }

        // Finally, let's edit the composer.json file
        $output->writeln('Editing composer.json');
        ComposerJsonEditor::editFiles(\array_values($modules));
    }

    private function rmGenerated(): void
    {
        $exceptions = \glob(__DIR__.'/../../generated/Exceptions/*.php');

        foreach ($exceptions as $exception) {
            \unlink($exception);
        }

        $files = \glob(__DIR__.'/../../generated/*.php');

        foreach ($files as $file) {
            \unlink($file);
        }

        if (\file_exists(__DIR__.'/../doc/entities/generated.ent')) {
            \unlink(__DIR__.'/../doc/entities/generated.ent');
        }
    }

    private function runCsFix(OutputInterface $output): void
    {
        $process = new Process('vendor/bin/phpcbf', __DIR__.'/../..');
        $process->setTimeout(600);
        $process->run(function ($type, $buffer) use ($output) {
            if (Process::ERR === $type) {
                echo $output->write('<error>'.$buffer.'</error>');
            } else {
                echo $output->write($buffer);
            }
        });
    }
}
