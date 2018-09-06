<?php

namespace Safe;

/**
 * Opens a connection to a database.
 * 
 * @param mixed $module The module parameter can be either a string or a
 * constant, though the latter form is preferred. The possible values are 
 * given below, but keep in mind that they only work if the module is 
 * actually loaded.
 * 
 * 
 * 
 * 
 * DBX_MYSQL or "mysql"
 * 
 * 
 * 
 * 
 * DBX_ODBC or "odbc"
 * 
 * 
 * 
 * 
 * DBX_PGSQL or "pgsql"
 * 
 * 
 * 
 * 
 * DBX_MSSQL or "mssql"
 * 
 * 
 * 
 * 
 * DBX_FBSQL or "fbsql"
 * 
 * 
 * 
 * 
 * DBX_SYBASECT or "sybase_ct"
 * 
 * 
 * 
 * 
 * DBX_OCI8 or "oci8"
 * 
 * 
 * 
 * 
 * DBX_SQLITE or "sqlite"
 * 
 * 
 * 
 * @param string $host The SQL server host
 * @param string $database The database name
 * @param string $username The username
 * @param string $password The password
 * @param int $persistent The persistent parameter can be set to 
 * DBX_PERSISTENT, if so, a persistent connection
 * will be created.
 * @return object Returns an object on success, FALSE on error. If a connection has been
 * made but the database could not be selected, the connection is closed and
 * FALSE is returned.
 * 
 * The returned object has three properties:
 * 
 * 
 * 
 * database
 * 
 * 
 * 
 * It is the name of the currently selected database. 
 * 
 * 
 * 
 * 
 * 
 * handle
 * 
 * 
 * 
 * It is a valid handle for the connected database, and as such it can be
 * used in module-specific functions (if required).
 * 
 * 
 * handle); // dbx_close($link) would be better here
 * ?>
 * ]]>
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * module
 * 
 * 
 * 
 * It is used internally by dbx only, and is actually the module number
 * mentioned above.
 * 
 * 
 * 
 * 
 * @throws Exceptions\DbxException
 * 
 */
function dbx_connect($module, string $host, string $database, string $username, string $password, int $persistent = null): object
{
    error_clear_last();
    if ($persistent !== null) {
        $result = \dbx_connect($module, $host, $database, $username, $password, $persistent);
    }else {
        $result = \dbx_connect($module, $host, $database, $username, $password);
    }
    if ($result === FALSE) {
        throw Exceptions\DbxException::createFromPhpError();
    }
    return $result;
}


/**
 * Sort a result from a dbx_query call with a custom sort
 * function.
 * 
 * @param object $result A result set returned by dbx_query.
 * @param string $user_compare_function The user-defined comparison function. It must accept two arguments and
 * return an integer less than, equal to, or greater than zero if the 
 * first argument is considered to be respectively less than, equal to, 
 * or greater than the second.
 * @throws Exceptions\DbxException
 * 
 */
function dbx_sort(object $result, string $user_compare_function): void
{
    error_clear_last();
    $result = \dbx_sort($result, $user_compare_function);
    if ($result === FALSE) {
        throw Exceptions\DbxException::createFromPhpError();
    }
}


