<?php

namespace Safe;

use Safe\Exceptions\VarException;

/**
 * @param mixed $var
 * @param string $type
 * @return bool
 *
 */
function settype(&$var, string $type): bool
{
    error_clear_last();
    $safeResult = \settype($var, $type);
    return $safeResult;
}
