<?php

declare(strict_types=1);

namespace Safe;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ScanObjectsCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('scan-objects')
            ->setDescription('Displays all methods of all objects not handled yet by Safe.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $scanner = new Scanner(__DIR__ . '/../doc/doc-en/en/reference/');

        $paths = $scanner->getMethodsPaths();

        $scannerResponse = $scanner->getMethods($paths);

        foreach ($scannerResponse->methods as $function) {
            $name = $function->getFunctionName();
            $output->writeln('Found method ' . $name);
        }

        $output->writeln('These methods are overloaded: ' . \implode(', ', $scannerResponse->overloadedFunctions));
        return 0;
    }
}
