<?php


namespace Safe\Exceptions;

class PcreException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        $errorConstantMap = [
            PREG_INTERNAL_ERROR => 'PREG_INTERNAL_ERROR',
            PREG_BACKTRACK_LIMIT_ERROR => 'PREG_BACKTRACK_LIMIT_ERROR',
            PREG_RECURSION_LIMIT_ERROR => 'PREG_RECURSION_LIMIT_ERROR',
            PREG_BAD_UTF8_ERROR => 'PREG_BAD_UTF8_ERROR',
            PREG_BAD_UTF8_OFFSET_ERROR => 'PREG_BAD_UTF8_OFFSET_ERROR',
            PREG_JIT_STACKLIMIT_ERROR => 'PREG_JIT_STACKLIMIT_ERROR',
        ];

        return new self(($errorConstantMap[\preg_last_error()] ?? 'Unknown Error') . ': ' . \preg_last_error_msg(), \preg_last_error());
    }
}
