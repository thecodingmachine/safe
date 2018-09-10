<?php

namespace Safe;

use Safe\Exceptions\HashException;

/**
 * 
 * 
 * @param HashContext $hcontext Hashing context returned by hash_init.
 * @param string $filename URL describing location of file to be hashed; Supports fopen wrappers.
 * @param HashContext|null $scontext Stream context as returned by stream_context_create.
 * @throws HashException
 * 
 */
function hash_update_file(HashContext $hcontext, string $filename, $scontext = null): void
{
    error_clear_last();
    $result = \hash_update_file($hcontext, $filename, $scontext);
    if ($result === FALSE) {
        throw HashException::createFromPhpError();
    }
}


