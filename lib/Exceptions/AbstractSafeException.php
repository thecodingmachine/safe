<?php


namespace Safe\Exceptions;

abstract class AbstractSafeException extends \ErrorException implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        $error = error_get_last();

        return new static($error['message'], 0, $error['type']);
    }
}
