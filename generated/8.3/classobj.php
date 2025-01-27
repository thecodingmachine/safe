<?php

namespace Safe;

use Safe\Exceptions\ClassobjException;

/**
 * Creates an alias named alias
 * based on the user defined class class.
 * The aliased class is exactly the same as the original class.
 *
 * @param string $class The original class.
 * @param string $alias The alias name for the class.
 * @param bool $autoload Whether to autoload if the original class is not found.
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
