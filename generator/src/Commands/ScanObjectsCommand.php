<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\Domain\MethodDefinition;
use Safe\XmlDocParser\Method;
use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\DocPage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ScanObjectsCommand extends Command
{
    private SymfonyStyle $io;
    private Scanner $scanner;

    protected function configure(): void
    {
        $this
            ->setName('scan-objects')
            ->setDescription('Displays all methods of all objects not handled yet by Safe.')
        ;
    }

    public function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
        $this->scanner = new Scanner(DocPage::referenceDir());
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io->title($this->getDescription());

        $result = $this->scanner->getMethods($this->scanner->getMethodsPaths(), [], $output);

        $this->io->table(
            ['Method', 'Error Type', 'Safe'],
            \array_merge(
                \array_map(static fn(Method $method) => [$method->getFunctionName(), $method->getErrorType()->name, '✅'], $result->methods),
                \array_map(static fn(MethodDefinition $method) => [$method->name, $method->errorType->name, '❌'], $result->overloadedFunctions),
            ),
        );

        return self::SUCCESS;
    }
}
