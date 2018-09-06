<?php

namespace Safe;

/**
 * Creates an alias named alias
 * based on the user defined class original.
 * The aliased class is exactly the same as the original class.
 * 
 * @param string $original The original class.
 * @param string $alias The alias name for the class.
 * @param bool $autoload Whether to autoload if the original class is not found.
 * @throws Exceptions\ClassobjException
 * 
 */
function class_alias(string $original, string $alias, bool $autoload = true): void
{
    error_clear_last();
    $result = \class_alias($original, $alias, $autoload);
    if ($result === FALSE) {
        throw Exceptions\ClassobjException::createFromPhpError();
    }
}


