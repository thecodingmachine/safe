<?php

namespace Safe;

use Safe\Exceptions\LzfException;

/**
 * lzf_compress compresses the given
 * data string using LZF encoding.
 *
 * @param string $data The string to compress.
 * @return string Returns the compressed data.
 * @throws LzfException
 *
 */
function lzf_compress(string $data): string
{
    error_clear_last();
    $safeResult = \lzf_compress($data);
    if ($safeResult === false) {
        throw LzfException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * lzf_compress decompresses the given
 * data string containing lzf encoded data.
 *
 * @param string $data The compressed string.
 * @return string Returns the decompressed data.
 * @throws LzfException
 *
 */
function lzf_decompress(string $data): string
{
    error_clear_last();
    $safeResult = \lzf_decompress($data);
    if ($safeResult === false) {
        throw LzfException::createFromPhpError();
    }
    return $safeResult;
}
