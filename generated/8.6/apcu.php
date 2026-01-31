<?php

namespace Safe;

use Safe\Exceptions\ApcuException;

/**
 * @param bool $limited
 * @return array
 * @throws ApcuException
 *
 */
function apcu_cache_info(bool $limited = false): array
{
    error_clear_last();
    $safeResult = \apcu_cache_info($limited);
    if ($safeResult === false) {
        throw ApcuException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $key
 * @param int $old
 * @param int $new
 * @throws ApcuException
 *
 */
function apcu_cas(string $key, int $old, int $new): void
{
    error_clear_last();
    $safeResult = \apcu_cas($key, $old, $new);
    if ($safeResult === false) {
        throw ApcuException::createFromPhpError();
    }
}


/**
 * @param string $key
 * @param int $step
 * @param bool|null $success
 * @param int $ttl
 * @return int
 * @throws ApcuException
 *
 */
function apcu_dec(string $key, int $step = 1, ?bool &$success = null, int $ttl = 0): int
{
    error_clear_last();
    $safeResult = \apcu_dec($key, $step, $success, $ttl);
    if ($safeResult === false) {
        throw ApcuException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $key
 * @param int $step
 * @param bool|null $success
 * @param int $ttl
 * @return int
 * @throws ApcuException
 *
 */
function apcu_inc(string $key, int $step = 1, ?bool &$success = null, int $ttl = 0): int
{
    error_clear_last();
    $safeResult = \apcu_inc($key, $step, $success, $ttl);
    if ($safeResult === false) {
        throw ApcuException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param bool $limited
 * @return array
 * @throws ApcuException
 *
 */
function apcu_sma_info(bool $limited = false): array
{
    error_clear_last();
    $safeResult = \apcu_sma_info($limited);
    if ($safeResult === false) {
        throw ApcuException::createFromPhpError();
    }
    return $safeResult;
}
