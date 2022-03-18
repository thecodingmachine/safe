<?php

namespace Safe;

use Safe\Exceptions\UopzException;

/**
 * Makes class extend parent
 *
 * @param string $class The name of the class to extend
 * @param string $parent The name of the class to inherit
 * @throws UopzException
 *
 */
function uopz_extend(string $class, string $parent): void
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
    $result = \uopz_extend($class, $parent);
    restore_error_handler();

    if ($result === false) {
        throw UopzException::createFromPhpError($error);
    }
}


/**
 * Makes class implement interface
 *
 * @param string $class
 * @param string $interface
 * @throws UopzException
 *
 */
function uopz_implement(string $class, string $interface): void
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
    $result = \uopz_implement($class, $interface);
    restore_error_handler();

    if ($result === false) {
        throw UopzException::createFromPhpError($error);
    }
}
