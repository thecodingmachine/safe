<?php

namespace Safe\Exceptions;

class EioException extends \ErrorException implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        $error = error_get_last();
        return new self($error['message'] ?? 'An error occurred', 0, $error['type'] ?? 1);
    }
}
