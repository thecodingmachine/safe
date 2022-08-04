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
    error_clear_last();
    $safeResult = \gmp_random_seed($seed);
    if ($safeResult === false) {
        throw GmpException::createFromPhpError();
    }
}
