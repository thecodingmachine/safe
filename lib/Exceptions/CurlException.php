<?php


namespace Safe\Exceptions;

class CurlException extends AbstractSafeException
{
    /**
     * @param resource $ch
     */
    public static function createFromCurlResource($ch): self
    {
        return new static(\curl_error($ch), \curl_errno($ch));
    }
}
