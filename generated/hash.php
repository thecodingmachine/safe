<?php

namespace Safe;

use Safe\Exceptions\HashException;

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

