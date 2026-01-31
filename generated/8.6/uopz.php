<?php

namespace Safe;

use Safe\Exceptions\UopzException;

/**
 * @param string $class
 * @param string $parent
 * @throws UopzException
 *
 */
function uopz_extend(string $class, string $parent): void
{
    error_clear_last();
    $safeResult = \uopz_extend($class, $parent);
    if ($safeResult === false) {
        throw UopzException::createFromPhpError();
    }
}


/**
 * @param string $class
 * @param string $interface
 * @throws UopzException
 *
 */
function uopz_implement(string $class, string $interface): void
{
    error_clear_last();
    $safeResult = \uopz_implement($class, $interface);
    if ($safeResult === false) {
        throw UopzException::createFromPhpError();
    }
}
