<?php


namespace Safe;

/**
 * This class will edit the main composer.json file to add the list of files generated from modules.
 */
class ComposerJsonEditor
{
    private const COMPOSER_FILEPATH = __DIR__.'/../../composer.json';
    
    public static function editComposerFileForDeprecation(string $moduleName): void
    {

        $composerContent = file_get_contents(self::COMPOSER_FILEPATH);
        if ($composerContent === false) {
            throw new \RuntimeException('Error while loading composer.json file for edition.');
        }
        /** @var array<string, array<string, string[]>> $composerJson */
        $composerJson = \json_decode($composerContent, true);
        $composerJson['autoload']['files'] = self::editFileListForDeprecation($composerJson['autoload']['files'], $moduleName);

        $newContent = \json_encode($composerJson, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES);
        \file_put_contents(self::COMPOSER_FILEPATH, $newContent);
    }

    /**
     * @param string[] $modules A list of modules
     */
    public static function editComposerFileForGeneration(array $modules): void
    {
        
        $composerContent = file_get_contents(self::COMPOSER_FILEPATH);
        if ($composerContent === false) {
            throw new \RuntimeException('Error while loading composer.json file for edition.');
        }
        /** @var array<string, array<string, string[]>> $composerJson */
        $composerJson = \json_decode($composerContent, true);
        $composerJson['autoload']['files'] = self::editFilesListForGeneration($composerJson['autoload']['files'], $modules);

        $newContent = \json_encode($composerJson, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES);
        \file_put_contents(self::COMPOSER_FILEPATH, $newContent);
    }
    
    
    
    
    /**
     * @param string[] $oldFiles
     * @param string[] $modules A list of modules
     * @return string[]
     */
    public static function editFilesListForGeneration(array $oldFiles, array $modules): array
    {
        $files = array_values(array_filter($oldFiles, function ($file) {
            return strpos($file, 'generated/') === false;
        }));
        foreach ($modules as $module) {
            $files[] = 'generated/'.lcfirst($module).'_func.php';
        }
        return $files;
    }

    /**
     * @param string[] $fileList
     * @return string[]
     */
    public static function editFileListForDeprecation(array $fileList, string $moduleName): array
    {
        $newList = [];

        foreach ($fileList as $fileName) {
            if ($fileName === "generated/{$moduleName}_func.php") {
                $newList[] = "deprecated/{$moduleName}_func.php";
            } else {
                $newList[] = $fileName;
            }
        }

        return $newList;
    }
}
