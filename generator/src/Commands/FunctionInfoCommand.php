<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\XmlDocParser\Method;
use Safe\XmlDocParser\DocPage;
use Safe\PhpStanFunctions\PhpStanFunctionMapReader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

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
        $target = $input->getArgument("function");
        $targetFilename = str_replace("_", "-", $target) . ".xml";

        $phpStanFunctionMapReader = new PhpStanFunctionMapReader();

        $finder = new Finder();
        $finder->in(DocPage::findReferenceDir())->name($targetFilename)->sortByName();

        foreach ($finder as $file) {
            $docPage = new DocPage($file->getPathname());
            $isFalsy = $docPage->detectFalsyFunction();
            $isNullsy = $docPage->detectNullsyFunction();
            $isEmpty = $docPage->detectEmptyFunction();
            $errorType = $isFalsy ? Method::FALSY_TYPE : ($isNullsy ? Method::NULLSY_TYPE : Method::EMPTY_TYPE);

            $functionObjects = $docPage->getMethodSynopsis();
            $rootEntity = $docPage->loadAndResolveFile();
            foreach ($functionObjects as $functionObject) {
                $function = new Method($functionObject, $rootEntity, $docPage->getModule(), $phpStanFunctionMapReader, $errorType);
                $output->writeln((string)$function);
            }
        }

        return 0;
    }
}
