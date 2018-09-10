<?php

namespace Safe;

use Safe\Exceptions\ApcuException;

/**
 * apcu_cas updates an already existing integer value if the
 * old parameter matches the currently stored value
 * with the value of the new parameter.
 *
 * @param string $key The key of the value being updated.
 * @param int $old The old value (the value currently stored).
 * @param int $new The new value to update to.
 * @throws ApcuException
 *
 */
function apcu_cas(string $key, int $old, int $new): void
{
    error_clear_last();
    $result = \apcu_cas($key, $old, $new);
    if ($result === false) {
        throw ApcuException::createFromPhpError();
    }
}


/**
 * Decreases a stored integer value.
 *
 * @param string $key The key of the value being decreased.
 * @param int $step The step, or value to decrease.
 * @param bool $success Optionally pass the success or fail boolean value to
 * this referenced variable.
 * @return int Returns the current value of key's value on success,
 *
 * @throws ApcuException
 *
 */
function apcu_dec(string $key, int $step = 1, bool &$success = null): int
{
    error_clear_last();
    if ($success !== null) {
        $result = \apcu_dec($key, $step, $success);
    } else {
        $result = \apcu_dec($key, $step);
    }
    if ($result === false) {
        throw ApcuException::createFromPhpError();
    }
    return $result;
}


/**
 * Removes a stored variable from the cache.
 *
 * @param string|string[]|APCUIterator $key A key used to store the value as a
 * string for a single key,
 * or as an array of strings for several keys,
 * or as an APCUIterator object.
 * @return bool|array Returns TRUE on success .
 * @throws ApcuException
 *
 */
function apcu_delete($key): void
{
    error_clear_last();
    $result = \apcu_delete($key);
    if ($result === false) {
        throw ApcuException::createFromPhpError();
    }
}


/**
 * Increases a stored number.
 *
 * @param string $key The key of the value being increased.
 * @param int $step The step, or value to increase.
 * @param bool $success Optionally pass the success or fail boolean value to
 * this referenced variable.
 * @return int Returns the current value of key's value on success,
 *
 * @throws ApcuException
 *
 */
function apcu_inc(string $key, int $step = 1, bool &$success = null): int
{
    error_clear_last();
    if ($success !== null) {
        $result = \apcu_inc($key, $step, $success);
    } else {
        $result = \apcu_inc($key, $step);
    }
    if ($result === false) {
        throw ApcuException::createFromPhpError();
    }
    return $result;
}
