<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

class Type
{
    /**
     * Returns true if the type passed in parameter is a class, false if it is scalar or resource
     */
    private static function isClass(string $type): bool
    {
        if ($type === '') {
            return false;
        }

        // Non-standard lowercase classes
        if (in_array($type, ['stdClass', 'finfo'])) {
            return true;
        }

        // Classes start with uppercase letters. Otherwise, it's most likely a scalar.
        if ($type[0] === strtoupper($type[0])) {
            return true;
        }
        return false;
    }

    /**
     * Put classes in the root namespace
     */
    public static function toRootNamespace(string $type): string
    {
        if (self::isClass($type)) {
            return '\\'.$type;
        }
        return $type;
    }
}
