<?php
namespace Safe\Exceptions;

class PcntlException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        return new self(\json_last_error_msg(), \json_last_error());
    }
}
