<?php

namespace Safe;

use Safe\Exceptions\DbaException;

/**
 * dba_delete deletes the specified entry from the database.
 *
 * @param string $key The key of the entry which is deleted.
 * @param resource $dba The database handler, returned by dba_open or
 * dba_popen.
 * @throws DbaException
 *
 */
function dba_delete(string $key, $dba): void
{
    error_clear_last();
    $safeResult = \dba_delete($key, $dba);
    if ($safeResult === false) {
        throw DbaException::createFromPhpError();
    }
}


/**
 * dba_firstkey returns the first key of the database
 * and resets the internal key pointer. This permits a linear search through
 * the whole database.
 *
 * @param resource $dba The database handler, returned by dba_open or
 * dba_popen.
 * @return string Returns the key on success.
 * @throws DbaException
 *
 */
function dba_firstkey($dba): string
{
    error_clear_last();
    $safeResult = \dba_firstkey($dba);
    if ($safeResult === false) {
        throw DbaException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * dba_insert inserts the entry described with
 * key and value into the
 * database.
 *
 * @param string $key The key of the entry to be inserted. If this key already exist in the
 * database, this function will fail. Use dba_replace
 * if you need to replace an existent key.
 * @param string $value The value to be inserted.
 * @param resource $dba The database handler, returned by dba_open or
 * dba_popen.
 * @throws DbaException
 *
 */
function dba_insert(string $key, string $value, $dba): void
{
    error_clear_last();
    $safeResult = \dba_insert($key, $value, $dba);
    if ($safeResult === false) {
        throw DbaException::createFromPhpError();
    }
}


/**
 * dba_nextkey returns the next key of the database
 * and advances the internal key pointer.
 *
 * @param resource $dba The database handler, returned by dba_open or
 * dba_popen.
 * @return string Returns the key on success.
 * @throws DbaException
 *
 */
function dba_nextkey($dba): string
{
    error_clear_last();
    $safeResult = \dba_nextkey($dba);
    if ($safeResult === false) {
        throw DbaException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * dba_optimize optimizes the underlying database.
 *
 * @param resource $dba The database handler, returned by dba_open or
 * dba_popen.
 * @throws DbaException
 *
 */
function dba_optimize($dba): void
{
    error_clear_last();
    $safeResult = \dba_optimize($dba);
    if ($safeResult === false) {
        throw DbaException::createFromPhpError();
    }
}


/**
 * dba_replace replaces or inserts the entry described
 * with key and value into the
 * database specified by dba.
 *
 * @param string $key The key of the entry to be replaced.
 * @param string $value The value to be replaced.
 * @param resource $dba The database handler, returned by dba_open or
 * dba_popen.
 * @throws DbaException
 *
 */
function dba_replace(string $key, string $value, $dba): void
{
    error_clear_last();
    $safeResult = \dba_replace($key, $value, $dba);
    if ($safeResult === false) {
        throw DbaException::createFromPhpError();
    }
}


/**
 * dba_sync synchronizes the database. This will probably
 * trigger a physical write to the disk, if supported.
 *
 * @param resource $dba The database handler, returned by dba_open or
 * dba_popen.
 * @throws DbaException
 *
 */
function dba_sync($dba): void
{
    error_clear_last();
    $safeResult = \dba_sync($dba);
    if ($safeResult === false) {
        throw DbaException::createFromPhpError();
    }
}
