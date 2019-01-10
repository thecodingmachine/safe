<?php


namespace Safe\Exceptions;

class PcreException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        $errMsg = array_flip(get_defined_constants(true)['pcre'])[preg_last_error()];
        return new static($errMsg, \preg_last_error());
    }
}
