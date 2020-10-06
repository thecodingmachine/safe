<?php


namespace Safe;


use PHPUnit\Framework\TestCase;

class ComposerJsonEditorTest extends TestCase
{
    public function testFileListEditionForGeneration()
    {
        $oldList = [
            "deprecated/apc.php",
            "lib/special_cases.php",
            "generated/apache.php",
        ];
        $modules = [
            'apache',
            'mysql'
        ];

        $newList = ComposerJsonEditor::editFilesListForGeneration($oldList, $modules);

        $this->assertEquals([
            "deprecated/apc.php",
            "lib/special_cases.php",
            "generated/apache.php",
            "generated/mysql.php",
        ], $newList);
    }
    
    
    public function testFileListEditionForDeprecation()
    {
        $oldList = [
            "generated/apache.php",
            "generated/apc.php",
        ];

        $newList = ComposerJsonEditor::editFileListForDeprecation($oldList, 'apc');

        $this->assertEquals([
            "generated/apache.php",
            "deprecated/apc.php",
        ], $newList);
    }
}