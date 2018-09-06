<?php


namespace Safe;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
        $excludedModules = [
            'snmp'
        ];
        $scanner = new Scanner(__DIR__ . '/../doc/doc-en/en/reference/*', $excludedModules);

        [
            'functions' => $functions,
            'overloadedFunctions' => $overloadedFunctions
        ] = $scanner->getMethods();

        $output->writeln('These functions have been ignored and must be dealt with manually: '.\implode(', ', $overloadedFunctions));

        $fileCreator = new FileCreator();
        //$fileCreator->generateXlsFile($protoFunctions, __DIR__ . '/../generated/lib.xls');
        $fileCreator->generatePhpFile($functions, __DIR__ . '/../../generated/');
        $fileCreator->generateFunctionsList($functions, __DIR__ . '/../../generated/functionsList.php');


        $modules = [];
        foreach ($functions as $function) {
            $modules[$function->getModuleName()] = $function->getModuleName();
        }

        foreach ($modules as $moduleName => $foo) {
            $fileCreator->createExceptionFile($moduleName);
        }

        // Finally, let's require the generated file to check there is no error.
        $files = \glob(__DIR__.'/../../generated/*.php');

        foreach ($files as $file) {
            require($file);
        }

        // Finally, let's edit the composer.json file
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
}
