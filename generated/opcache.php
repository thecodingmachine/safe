<?php

namespace Safe;

use Safe\Exceptions\OpcacheException;

/**
 * This function compiles a PHP script and adds it to the opcode cache without
 * executing it. This can be used to prime the cache after a Web server
 * restart by pre-caching files that will be included in later requests.
 * 
 * @param string $filename The path to the PHP script to be compiled.
 * @throws OpcacheException
 * 
 */
function opcache_compile_file(string $filename): void
{
    error_clear_last();
    $result = \opcache_compile_file($filename);
    if ($result === false) {
        throw OpcacheException::createFromPhpError();
    }
}


/**
 * This function returns state information about the cache instance
 * 
 * @param bool $include_scripts Include script specific state information
 * @return array Returns an array of information, optionally containing script specific state information.
 * @throws OpcacheException
 * 
 */
function opcache_get_status(bool $include_scripts = true): array
{
    error_clear_last();
    $result = \opcache_get_status($include_scripts);
    if ($result === false) {
        throw OpcacheException::createFromPhpError();
    }
    return $result;
}


