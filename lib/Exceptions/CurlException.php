<?php


namespace Safe\Exceptions;

use CurlHandle;
use CurlMultiHandle;
use CurlShareHandle;

class CurlException extends \Exception implements SafeExceptionInterface
{
    /**
     *
     * @param array<string, string> $error
     * @return \Safe\Exceptions\CurlException
     */
    public static function createFromPhpError(array $error = []): self
    {
        return new self(
            $error['message'] ?? 'An error occured',
        );
    }

    /**
     * @param \CurlHandle $handle
     */
    public static function createFromCurlHandle(CurlHandle $handle): self
    {
        return new self(\curl_error($handle), \curl_errno($handle));
    }

    public static function createFromCurlMultiHandle(CurlMultiHandle $multiHandle) : self
    {
        return new self(\curl_multi_strerror(\curl_multi_errno($multiHandle)) ?? '', \curl_multi_errno($multiHandle));
    }

    public static function createFromCurlShareHandle(CurlShareHandle $shareHandle) : self
    {
        return new self(\curl_share_strerror(\curl_share_errno($shareHandle)) ?? '', \curl_share_errno($shareHandle));
    }
}
