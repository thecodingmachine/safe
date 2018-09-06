<?php


namespace Safe;

/**
 * This class will edit the main composer.json file to add the list of files generated from modules.
 */
class ComposerJsonEditor
{
    /**
     * @param string[] $modules A list of modules
     */
    public static function editFiles(array $modules): void
    {
        $files = \array_map(function (string $module) {
            return 'generated/'.lcfirst($module).'.php';
        }, $modules);
        $composerContent = file_get_contents(__DIR__.'/../../composer.json');
        if ($composerContent === false) {
            throw new \RuntimeException('Error while loading composer.json file for edition.');
        }
        $composerJson = \json_decode($composerContent, true);
        $composerJson['autoload']['files'] = $files;

        $newContent = json_encode($composerJson, \JSON_PRETTY_PRINT);
        \file_put_contents(__DIR__.'/../../composer.json', $newContent);
    }
}
