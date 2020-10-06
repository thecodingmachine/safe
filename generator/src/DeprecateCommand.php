<?php


namespace Safe;


use http\Exception\RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeprecateCommand extends Command
{
    public const GENERATE_DIRECTORY = __DIR__ . '/../../generated/';
    public const DEPRECATE_DIRECTORY = __DIR__ . '/../../deprecated/';
    
    protected function configure(): void
    {
        $this
            ->setName('deprecate')
            ->setDescription('Flag a module as deprecated and save it into the deprecated directory')
            ->addArgument('module', InputArgument::REQUIRED, 'the module to deprecate')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $moduleName = $input->getArgument('module');
        
        $moduleFilePath = self::GENERATE_DIRECTORY."$moduleName.php";
        if (!\file_exists($moduleFilePath)) {
            throw new \RuntimeException("Module $moduleName is not maintained!");
        }

        $output->writeln("Move $moduleName.php to deprecated");
        $success = \rename($moduleFilePath, self::DEPRECATE_DIRECTORY."$moduleName.php");
        if (!$success) {
            throw new \RuntimeException("Could not move the file.");
        }

        $exceptionFilePath = self::GENERATE_DIRECTORY.self::getExceptionFilePath($moduleName);
        if (\file_exists($exceptionFilePath)) {
            $output->writeln("Move exception file to deprecated");
            $success = \rename($exceptionFilePath, self::DEPRECATE_DIRECTORY.self::getExceptionFilePath($moduleName));
            if (!$success) {
                throw new \RuntimeException("Could not move the file.");
            }
        }

        $output->writeln('Editing composer.json');
        ComposerJsonEditor::editComposerFileForDeprecation($moduleName);

        $generatedListFile = self::GENERATE_DIRECTORY.'functionsList.php';
        $deprecatedListFile = self::DEPRECATE_DIRECTORY.'functionsList.php';
        $output->writeln("Don't forget to edit $generatedListFile and $deprecatedListFile !");
        
        return 0;
    }
    
    public static function getExceptionFilePath(string $moduleName): string
    {
        return "Exceptions/".ucfirst($moduleName)."Exception.php";
    }

}