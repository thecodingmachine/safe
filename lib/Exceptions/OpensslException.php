<?php


namespace Safe\Exceptions;

class OpensslException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        return new static(\openssl_error_string(), 0);
    }
}
