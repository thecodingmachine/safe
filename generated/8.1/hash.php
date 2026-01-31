<?php

namespace Safe;

use Safe\Exceptions\HashException;

/**
 * @param string $algo
 * @param string $key
 * @param int $length
 * @param string $info
 * @param string $salt
 * @return non-falsy-string
 * @throws HashException
 *
 */
function hash_hkdf(string $algo, string $key, int $length = 0, string $info = "", string $salt = ""): string
{
    error_clear_last();
    $safeResult = \hash_hkdf($algo, $key, $length, $info, $salt);
    if ($safeResult === false) {
        throw HashException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \HashContext $context
 * @param string $filename
 * @param \HashContext|null $stream_context
 * @throws HashException
 *
 */
function hash_update_file(\HashContext $context, string $filename, ?\HashContext $stream_context = null): void
{
    error_clear_last();
    if ($stream_context !== null) {
        $safeResult = \hash_update_file($context, $filename, $stream_context);
    } else {
        $safeResult = \hash_update_file($context, $filename);
    }
    if ($safeResult === false) {
        throw HashException::createFromPhpError();
    }
}
