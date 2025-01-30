<?php

declare(strict_types=1);

namespace Safe;

use PHPUnit\Framework\TestCase;

class ComposerJsonEditorTest extends TestCase
{
    public function testFileListEditionForGeneration(): void
    {
        $oldList = [
            "lib/special_cases.php",
            "generated/apache.php",
        ];
        $modules = [
            'apache',
            'mysql'
        ];

        $newList = ComposerJsonEditor::editFilesListForGeneration($oldList, $modules);

        $this->assertEquals([
            "lib/special_cases.php",
            "generated/apache.php",
            "generated/mysql.php",
        ], $newList);
    }
}
