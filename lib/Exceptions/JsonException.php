<?php


namespace Safe\Exceptions;


class JsonException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        throw new static(\json_last_error_msg(), \json_last_error());
    }
}
