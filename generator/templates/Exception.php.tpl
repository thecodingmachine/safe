<?php

declare(strict_types=1);

namespace Safe\Exceptions;

class {{exceptionName}} extends \ErrorException implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        $error = error_get_last();

        return new self($error['message'] ?? 'An error occurred', 0, $error['type'] ?? 1);
    }
}
