<?php
namespace Safe\Exceptions;

class PsException extends \ErrorException implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        $error = error_get_last();
        return new self($error['message'] ?? 'An error occurred', 0, $error['type'] ?? 1);
    }
}
