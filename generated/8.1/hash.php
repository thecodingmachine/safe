<?php

namespace Safe;

use Safe\Exceptions\HashException;

/**
 *
 *
 * @param string $algo Name of selected hashing algorithm (i.e. "sha256", "sha512", "haval160,4", etc..)
 * See hash_algos for a list of supported algorithms.
 *
 *
 * Non-cryptographic hash functions are not allowed.
 *
 *
 *
 * Non-cryptographic hash functions are not allowed.
 * @param string $key Input keying material (raw binary). Cannot be empty.
 * @param int $length Desired output length in bytes.
 * Cannot be greater than 255 times the chosen hash function size.
 *
 * If length is 0, the output length
 * will default to the chosen hash function size.
 * @param string $info Application/context-specific info string.
 * @param string $salt Salt to use during derivation.
 *
 * While optional, adding random salt significantly improves the strength of HKDF.
 * @return non-falsy-string Returns a string containing a raw binary representation of the derived key
 * (also known as output keying material - OKM);.
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
 *
 *
 * @param \HashContext $context Hashing context returned by hash_init.
 * @param string $filename URL describing location of file to be hashed; Supports fopen wrappers.
 * @param \HashContext|null $stream_context Stream context as returned by stream_context_create.
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
