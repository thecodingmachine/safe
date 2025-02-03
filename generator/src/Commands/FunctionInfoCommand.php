<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\DocPage;
use Safe\Generator\WritePhpFunction;
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
                $output->writeln("Params: ");
                foreach ($function->getParams() as $param) {
                    $output->writeln("  " . $param->getParameterName());
                    $output->writeln("    ParameterType: " . $param->getParameterType());
                    $output->writeln("    SignatureType: " . $param->getSignatureType());
                    $output->writeln("    DocBlockType:  " . $param->getDocBlockType());
                }
                $writePhpFunction = new WritePhpFunction($function);
                $output->writeln($writePhpFunction->getPhpFunctionalFunction());
                break;
            }
        }

        return 0;
    }
}
