<?php

namespace Safe;

/**
 * dba_delete deletes the specified entry from the database.
 * 
 * @param string $key The key of the entry which is deleted.
 * @param resource $handle The database handler, returned by dba_open or
 * dba_popen.
 * @throws Exceptions\DbaException
 * 
 */
function dba_delete(string $key, $handle): void
{
    error_clear_last();
    $result = \dba_delete($key, $handle);
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
}


/**
 * dba_firstkey returns the first key of the database
 * and resets the internal key pointer. This permits a linear search through
 * the whole database.
 * 
 * @param resource $handle The database handler, returned by dba_open or
 * dba_popen.
 * @return string Returns the key on success .
 * @throws Exceptions\DbaException
 * 
 */
function dba_firstkey($handle): string
{
    error_clear_last();
    $result = \dba_firstkey($handle);
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
    return $result;
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
 * @param resource $handle The database handler, returned by dba_open or
 * dba_popen.
 * @throws Exceptions\DbaException
 * 
 */
function dba_insert(string $key, string $value, $handle): void
{
    error_clear_last();
    $result = \dba_insert($key, $value, $handle);
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
}


/**
 * dba_nextkey returns the next key of the database
 * and advances the internal key pointer.
 * 
 * @param resource $handle The database handler, returned by dba_open or
 * dba_popen.
 * @return string Returns the key on success .
 * @throws Exceptions\DbaException
 * 
 */
function dba_nextkey($handle): string
{
    error_clear_last();
    $result = \dba_nextkey($handle);
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
    return $result;
}


/**
 * dba_open establishes a database instance for
 * path with mode using
 * handler.
 * 
 * @param string $path Commonly a regular path in your filesystem.
 * @param string $mode It is r for read access, w for
 * read/write access to an already existing database, c
 * for read/write access and database creation if it doesn't currently exist,
 * and n for create, truncate and read/write access.
 * The database is created in BTree mode, other modes (like Hash or Queue)
 * are not supported.
 * 
 * Additionally you can set the database lock method with the next char. 
 * Use l to lock the database with a .lck
 * file or d to lock the databasefile itself. It is 
 * important that all of your applications do this consistently.
 * 
 * If you want to test the access and do not want to wait for the lock 
 * you can add t as third character. When you are 
 * absolutely sure that you do not require database locking you can do 
 * so by using - instead of l or
 * d. When none of d, 
 * l or - is used, dba will lock
 * on the database file as it would with d.
 * 
 * There can only be one writer for one database file. When you use dba on 
 * a web server and more than one request requires write operations they can
 * only be done one after another. Also read during write is not allowed.
 * The dba extension uses locks to prevent this. See the following table:
 * 
 * DBA locking
 * 
 * 
 * 
 * already open
 * mode = "rl"
 * mode = "rlt"
 * mode = "wl"
 * mode = "wlt"
 * mode = "rd"
 * mode = "rdt"
 * mode = "wd"
 * mode = "wdt"
 * 
 * 
 * 
 * 
 * not open
 * ok
 * ok
 * ok
 * ok
 * ok
 * ok
 * ok
 * ok
 * 
 * 
 * mode = "rl"
 * ok
 * ok
 * wait
 * false
 * illegal
 * illegal
 * illegal
 * illegal
 * 
 * 
 * mode = "wl"
 * wait
 * false
 * wait
 * false
 * illegal
 * illegal
 * illegal
 * illegal
 * 
 * 
 * mode = "rd"
 * illegal
 * illegal
 * illegal
 * illegal
 * ok
 * ok
 * wait
 * false
 * 
 * 
 * mode = "wd"
 * illegal
 * illegal
 * illegal
 * illegal
 * wait
 * false
 * wait
 * false
 * 
 * 
 * 
 * 
 * 
 * ok: the second call will be successfull.
 * wait: the second call waits until dba_close is called for the first.
 * false: the second call returns false.
 * illegal: you must not mix "l" and "d" modifiers for mode parameter.
 * 
 * @param string $handler The name of the handler which
 * shall be used for accessing path. It is passed 
 * all optional parameters given to dba_open and 
 * can act on behalf of them.
 * @param mixed $params 
 * @return resource Returns a positive handle on success .
 * @throws Exceptions\DbaException
 * 
 */
function dba_open(string $path, string $mode, string $handler,  ...$params)
{
    error_clear_last();
    if ($params !== null) {
        $result = \dba_open($path, $mode, $handler, $params);
    } elseif ($handler !== null) {
        $result = \dba_open($path, $mode, $handler);
    }else {
        $result = \dba_open($path, $mode);
    }
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
    return $result;
}


/**
 * dba_optimize optimizes the underlying database.
 * 
 * @param resource $handle The database handler, returned by dba_open or
 * dba_popen.
 * @throws Exceptions\DbaException
 * 
 */
function dba_optimize($handle): void
{
    error_clear_last();
    $result = \dba_optimize($handle);
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
}


/**
 * dba_popen establishes a persistent database instance
 * for path with mode using
 * handler.
 * 
 * @param string $path Commonly a regular path in your filesystem.
 * @param string $mode It is r for read access, w for
 * read/write access to an already existing database, c
 * for read/write access and database creation if it doesn't currently exist,
 * and n for create, truncate and read/write access.
 * @param string $handler The name of the handler which
 * shall be used for accessing path. It is passed 
 * all optional parameters given to dba_popen and 
 * can act on behalf of them.
 * @param mixed $params 
 * @return resource Returns a positive handle on success .
 * @throws Exceptions\DbaException
 * 
 */
function dba_popen(string $path, string $mode, string $handler,  ...$params)
{
    error_clear_last();
    if ($params !== null) {
        $result = \dba_popen($path, $mode, $handler, $params);
    } elseif ($handler !== null) {
        $result = \dba_popen($path, $mode, $handler);
    }else {
        $result = \dba_popen($path, $mode);
    }
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
    return $result;
}


/**
 * dba_replace replaces or inserts the entry described
 * with key and value into the
 * database specified by handle.
 * 
 * @param string $key The key of the entry to be replaced.
 * @param string $value The value to be replaced.
 * @param resource $handle The database handler, returned by dba_open or
 * dba_popen.
 * @throws Exceptions\DbaException
 * 
 */
function dba_replace(string $key, string $value, $handle): void
{
    error_clear_last();
    $result = \dba_replace($key, $value, $handle);
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
}


/**
 * dba_sync synchronizes the database. This will probably 
 * trigger a physical write to the disk, if supported.
 * 
 * @param resource $handle The database handler, returned by dba_open or
 * dba_popen.
 * @throws Exceptions\DbaException
 * 
 */
function dba_sync($handle): void
{
    error_clear_last();
    $result = \dba_sync($handle);
    if ($result === FALSE) {
        throw Exceptions\DbaException::createFromPhpError();
    }
}


