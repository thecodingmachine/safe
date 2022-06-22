<?php

namespace Safe;

use Safe\Exceptions\GmpException;

/**
 *
 *
 * @param \GMP|string|int $seed The seed to be set for the gmp_random,
 * gmp_random_bits, and
 * gmp_random_range functions.
 *
 * A GMP object, an integer or a numeric string.
 * @throws GmpException
 *
 */
function gmp_random_seed($seed): void
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
    $result = \gmp_random_seed($seed);
    restore_error_handler();

    if ($result === false) {
        throw GmpException::createFromPhpError($error);
    }
}
