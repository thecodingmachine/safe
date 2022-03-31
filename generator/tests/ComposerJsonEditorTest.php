<?php


namespace Safe;

use PHPUnit\Framework\TestCase;

class ComposerJsonEditorTest extends TestCase
{
    public function testFileListEditionForGeneration()
    {
        $oldList = [
            "deprecated/apc_func.php",
            "lib/special_cases.php",
            "generated/apache_func.php",
        ];
        $modules = [
            'apache',
            'mysql'
        ];

        $newList = ComposerJsonEditor::editFilesListForGeneration($oldList, $modules);

        $this->assertEquals([
            "deprecated/apc_func.php",
            "lib/special_cases.php",
            "generated/apache_func.php",
            "generated/mysql_func.php",
        ], $newList);
    }


    public function testFileListEditionForDeprecation()
    {
        $oldList = [
            "generated/apache_func.php",
            "generated/apc_func.php",
        ];

        $newList = ComposerJsonEditor::editFileListForDeprecation($oldList, 'apc');

        $this->assertEquals([
            "generated/apache_func.php",
            "deprecated/apc_func.php",
        ], $newList);
    }
}
