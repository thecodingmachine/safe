<?php
namespace Safe\Exceptions;

class ApcException extends \ErrorException implements SafeExceptionInterface
{
    public static function createFromPhpError(array $error = []): self
    {
        return new self($error['message'] ?? 'An error occured', 0, $error['type'] ?? 1);
    }
}
