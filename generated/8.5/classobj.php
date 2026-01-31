<?php

namespace Safe;

use Safe\Exceptions\ClassobjException;

/**
 * @param string $class
 * @param string $alias
 * @param bool $autoload
 * @throws ClassobjException
 *
 */
function class_alias(string $class, string $alias, bool $autoload = true): void
{
    error_clear_last();
    $safeResult = \class_alias($class, $alias, $autoload);
    if ($safeResult === false) {
        throw ClassobjException::createFromPhpError();
    }
}
