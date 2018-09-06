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

        $phpFunctions = [];
        foreach ($functions as $function) {
            $writePhpFunction = new WritePhpFunction($function);
            $phpFunctions[] = $writePhpFunction->getPhpFunctionalFunction();
        }

        $fileCreator = new FileCreator();
        //$fileCreator->generateXlsFile($protoFunctions, __DIR__ . '/../generated/lib.xls');
        $fileCreator->generatePhpFile($phpFunctions, __DIR__ . '/../generated/lib.php');
        $fileCreator->generateFunctionsList($functions, __DIR__ . '/../generated/functionsList.php');


        $modules = [];
        foreach ($functions as $function) {
            $modules[$function->getModuleName()] = true;
        }

        foreach ($modules as $moduleName => $foo) {
            $fileCreator->createExceptionFile($moduleName);
        }

        // Finally, let's require the generated file to check there is no error.
        require __DIR__.'/../generated/lib.php';
    }

    private function rmGenerated(): void
    {
        $exceptions = \glob(__DIR__.'/../generated/Exceptions/*.php');

        foreach ($exceptions as $exception) {
            \unlink($exception);
        }

        if (\file_exists(__DIR__.'/../generated/lib.php')) {
            \unlink(__DIR__.'/../generated/lib.php');
        }
    }
}
