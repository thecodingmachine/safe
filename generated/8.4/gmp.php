<?php

namespace Safe;

use Safe\Exceptions\GmpException;

/**
 *
 *
 * @param \GMP|int|string $seed The seed to be set for the gmp_random,
 * gmp_random_bits, and
 * gmp_random_range functions.
 *
 *
 * A GMP object, an integer,
 * or a string that can be interpreted as a number following the same logic
 * as if the string was used in gmp_init with automatic
 * base detection (i.e. when base is equal to 0).
 *
 */
function gmp_random_seed($seed): void
{
    error_clear_last();
    $safeResult = \gmp_random_seed($seed);
}
