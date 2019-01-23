<?php


namespace Safe;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ScanObjectsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('scan-objects')
            ->setDescription('Displays all methods of all objects not handled yet by Safe.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $scanner = new Scanner(__DIR__ . '/../doc/doc-en/en/reference/');

        $paths = $scanner->getMethodsPaths();

        [
            'functions' => $functions,
            'overloadedFunctions' => $overloadedFunctions
        ] = $scanner->getMethods($paths);

        foreach ($functions as $function) {
            $name = $function->getFunctionName();
            $output->writeln('Found method '.$name);
        }

        $output->writeln('These methods are overloaded: '.\implode(', ', $overloadedFunctions));
    }
}
