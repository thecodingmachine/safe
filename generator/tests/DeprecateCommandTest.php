<?php

declare(strict_types=1);

namespace Safe;


use PHPUnit\Framework\TestCase;

class DeprecateCommandTest extends TestCase
{
    public function testExceptionName(): void
    {
        $this->assertEquals('Exceptions/ApcException.php', DeprecateCommand::getExceptionFilePath('apc'));
    }

}
