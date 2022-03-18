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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \lzf_compress($data);
    restore_error_handler();

    if ($result === false) {
        throw LzfException::createFromPhpError($error);
    }
    return $result;
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
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \lzf_decompress($data);
    restore_error_handler();

    if ($result === false) {
        throw LzfException::createFromPhpError($error);
    }
    return $result;
}
