<?php


namespace Safe\Exceptions;

class PcreException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        return new self(\preg_last_error_msg(), \preg_last_error());
    }
}
