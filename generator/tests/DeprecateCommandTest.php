<?php


namespace Safe;


use PHPUnit\Framework\TestCase;

class DeprecateCommandTest extends TestCase
{
    public function testExceptionName()
    {
        $this->assertEquals('Exceptions/ApcException.php', DeprecateCommand::getExceptionFilePath('apc'));
    }

    public function testFileListEdition()
    {
        $oldList = [
            "generated/apache.php",
            "generated/apc.php",
        ];
        
        $newList = DeprecateCommand::editFileList($oldList, 'apc');
        
        $this->assertEquals([
            "generated/apache.php",
            "deprecated/apc.php",
        ], $newList);
    }

}