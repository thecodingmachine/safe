<?php
namespace Safe\Exceptions;

class IbaseException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        return new self(\json_last_error_msg(), \json_last_error());
    }
}
