<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\DocPage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class FunctionInfoCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('function-info')
            ->setDescription('Displays parsed info about a function.')
            ->addArgument('function', InputArgument::REQUIRED, 'The function name to display info about.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $scanner = new Scanner(DocPage::findReferenceDir());
        $res = $scanner->getMethods($scanner->getFunctionsPaths(), $output);

        foreach ($res->methods as $function) {
            $name = $function->getFunctionName();
            if ($name == $input->getArgument("function")) {
                $output->writeln((string)$function);
                break;
            }
        }

        return 0;
    }
}
