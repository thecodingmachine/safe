<?php


namespace Safe\Exceptions;


abstract class AbstractSafeException extends \Exception implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        $error = error_get_last();
        $type = $error['type'];
        $map = [
            1 => 'Error: ',
            2 => 'Warning: ',
            4 => 'Parse: ',
            8 => 'Notice: ',
            2048 => 'Strict: ',
            4096 => 'Recoverable error: ',
            8192 => 'Deprecated: '
        ];
        $typeMsg = $map[$type] ?? '';

        throw new static($typeMsg.$error['message'], $type);
    }
}
