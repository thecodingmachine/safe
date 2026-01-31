<?php

namespace Safe;

use Safe\Exceptions\VarException;

/**
 * @param mixed $var
 * @param string $type
 * @throws VarException
 *
 */
function settype(&$var, string $type): void
{
    error_clear_last();
    $safeResult = \settype($var, $type);
    if ($safeResult === false) {
        throw VarException::createFromPhpError();
    }
}
