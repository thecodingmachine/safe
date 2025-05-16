<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\DocPage;
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
        $scanner = new Scanner(DocPage::referenceDir());

        $paths = $scanner->getMethodsPaths();

        $res = $scanner->getMethods($paths, [], $output);

        foreach ($res->methods as $function) {
            $name = $function->getFunctionName();
            $output->writeln('Found method '.$name);
        }

        $output->writeln('These methods are overloaded: '.\implode(', ', $res->overloadedFunctions));
        return 0;
    }
}
