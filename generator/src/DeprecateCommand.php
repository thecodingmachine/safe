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

        $exceptionFilePath = self::GENERATE_DIRECTORY.$this->getExceptionFilePath($moduleName);
        $moveException = false;
        if (\file_exists($exceptionFilePath)) {
            $moveException = true;
            $output->writeln("Move exception file to deprecated");
            $success = \rename($exceptionFilePath, self::DEPRECATE_DIRECTORY.$this->getExceptionFilePath($moduleName));
            if (!$success) {
                throw new \RuntimeException("Could not move the file.");
            }
        }

        $output->writeln('Editing composer.json');
        $this->editComposerFile($moduleName, $moveException);

        $generatedListFile = self::GENERATE_DIRECTORY.'functionsList.php';
        $deprecatedListFile = self::DEPRECATE_DIRECTORY.'functionsList.php';
        $output->writeln("Don't forget to edit $generatedListFile and $deprecatedListFile !");
        
        return 0;
    }
    
    public static function getExceptionFilePath(string $moduleName): string
    {
        return "Exceptions/".ucfirst($moduleName)."Exception.php";
    }


    private function editComposerFile(string $moduleName, bool $moveException): void
    {
        
        $composerContent = file_get_contents(__DIR__.'/../../composer.json');
        if ($composerContent === false) {
            throw new \RuntimeException('Error while loading composer.json file for edition.');
        }
        $composerJson = \json_decode($composerContent, true);
        $composerJson['autoload']['files'] = self::editFileList($composerJson['autoload']['files'], $moduleName);

        $newContent = json_encode($composerJson, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES);
        \file_put_contents(__DIR__.'/../../composer.json', $newContent);
    }

    /**
     * @param string[] $fileList
     * @return string[]
     */
    public static function editFileList(array $fileList, string $moduleName): array
    {
        $newList = [];
        foreach ($fileList as $fileName) {
            if ($fileName === "generated/$moduleName.php") {
                $newList[] = "deprecated/$moduleName.php";
            //} else if($fileName === self::GENERATE_DIRECTORY.self::getExceptionFilePath($moduleName)) {
            //    $newList[] = self::DEPRECATE_DIRECTORY.self::getExceptionFilePath($moduleName);
            } else {
                $newList[] = $fileName;
            }
        }
        
        return $newList;
    }

}