<?php

namespace Safe;

use Safe\Exceptions\OpcacheException;

/**
 * @param string $filename
 * @throws OpcacheException
 *
 */
function opcache_compile_file(string $filename): void
{
    error_clear_last();
    $safeResult = \opcache_compile_file($filename);
    if ($safeResult === false) {
        throw OpcacheException::createFromPhpError();
    }
}


/**
 * @param bool $include_scripts
 * @return array
 * @throws OpcacheException
 *
 */
function opcache_get_status(bool $include_scripts = true): array
{
    error_clear_last();
    $safeResult = \opcache_get_status($include_scripts);
    if ($safeResult === false) {
        throw OpcacheException::createFromPhpError();
    }
    return $safeResult;
}
