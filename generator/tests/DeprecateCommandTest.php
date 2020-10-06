<?php


namespace Safe;


use PHPUnit\Framework\TestCase;

class DeprecateCommandTest extends TestCase
{
    public function testExceptionName()
    {
        $this->assertEquals('Exceptions/ApcException.php', DeprecateCommand::getExceptionFilePath('apc'));
    }

}