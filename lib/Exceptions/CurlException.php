<?php


namespace Safe\Exceptions;

class CurlException extends \Exception implements SafeExceptionInterface
{
    /**
     * @param \CurlHandle $ch
     */
    public static function createFromPhpError($ch): self
    {
        return new self(\curl_error($ch), \curl_errno($ch));
    }
}
