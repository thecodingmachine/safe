<?php

namespace Safe;

use Safe\Exceptions\SsdeepException;

/**
 * @param string $signature1
 * @param string $signature2
 * @return int
 * @throws SsdeepException
 *
 */
function ssdeep_fuzzy_compare(string $signature1, string $signature2): int
{
    error_clear_last();
    $safeResult = \ssdeep_fuzzy_compare($signature1, $signature2);
    if ($safeResult === false) {
        throw SsdeepException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $file_name
 * @return string
 * @throws SsdeepException
 *
 */
function ssdeep_fuzzy_hash_filename(string $file_name): string
{
    error_clear_last();
    $safeResult = \ssdeep_fuzzy_hash_filename($file_name);
    if ($safeResult === false) {
        throw SsdeepException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $to_hash
 * @return string
 * @throws SsdeepException
 *
 */
function ssdeep_fuzzy_hash(string $to_hash): string
{
    error_clear_last();
    $safeResult = \ssdeep_fuzzy_hash($to_hash);
    if ($safeResult === false) {
        throw SsdeepException::createFromPhpError();
    }
    return $safeResult;
}
