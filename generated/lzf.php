<?php

namespace Safe;

/**
 * lzf_compress compresses the given
 * data string using LZF encoding.
 * 
 * @param string $data The string to compress.
 * @return string Returns the compressed data .
 * @throws Exceptions\LzfException
 * 
 */
function lzf_compress(string $data): string
{
    error_clear_last();
    $result = \lzf_compress($data);
    if ($result === FALSE) {
        throw Exceptions\LzfException::createFromPhpError();
    }
    return $result;
}


/**
 * lzf_compress decompresses the given
 * data string containing lzf encoded data.
 * 
 * @param string $data The compressed string.
 * @return string Returns the decompressed data .
 * @throws Exceptions\LzfException
 * 
 */
function lzf_decompress(string $data): string
{
    error_clear_last();
    $result = \lzf_decompress($data);
    if ($result === FALSE) {
        throw Exceptions\LzfException::createFromPhpError();
    }
    return $result;
}


