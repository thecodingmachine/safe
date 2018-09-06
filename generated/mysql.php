<?php

namespace Safe;

/**
 * mysql_close closes the non-persistent connection to 
 * the MySQL server that's associated with the specified link identifier. If 
 * link_identifier isn't specified, the last opened 
 * link is used.
 * 
 * 
 * Open non-persistent MySQL connections and result sets are automatically destroyed when a 
 * PHP script finishes its execution. So, while explicitly closing open 
 * connections and freeing result sets is optional, doing so is recommended. 
 * This will immediately return resources to PHP and MySQL, which can 
 * improve performance. For related information, see 
 * freeing resources
 * 
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no connection is found or
 * established, an E_WARNING level error is
 * generated.
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_close($link_identifier = NULL): void
{
    error_clear_last();
    $result = \mysql_close($link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
}


/**
 * mysql_drop_db attempts to drop (remove) an
 * entire database from the server associated with the specified
 * link identifier. This function is deprecated, it is preferable to use 
 * mysql_query to issue an sql 
 * DROP DATABASE statement instead.
 * 
 * @param string $database_name The name of the database that will be deleted.
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no such link is found, it
 * will try to create one as if mysql_connect had been called
 * with no arguments. If no connection is found or established, an
 * E_WARNING level error is generated.
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_drop_db(string $database_name, $link_identifier = NULL): void
{
    error_clear_last();
    $result = \mysql_drop_db($database_name, $link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
}


/**
 * Retrieves the MySQL protocol.
 * 
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no such link is found, it
 * will try to create one as if mysql_connect had been called
 * with no arguments. If no connection is found or established, an
 * E_WARNING level error is generated.
 * @return int Returns the MySQL protocol on success .
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_get_proto_info($link_identifier = NULL): int
{
    error_clear_last();
    $result = \mysql_get_proto_info($link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves the current MySQL server threads.
 * 
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no such link is found, it
 * will try to create one as if mysql_connect had been called
 * with no arguments. If no connection is found or established, an
 * E_WARNING level error is generated.
 * @return resource A result pointer resource on success .
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_list_processes($link_identifier = NULL)
{
    error_clear_last();
    $result = \mysql_list_processes($link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves a list of table names from a MySQL database.
 * 
 * This function is deprecated. It is preferable to use 
 * mysql_query to issue an SQL SHOW TABLES 
 * [FROM db_name] [LIKE 'pattern'] statement instead.
 * 
 * @param string $database The name of the database
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no such link is found, it
 * will try to create one as if mysql_connect had been called
 * with no arguments. If no connection is found or established, an
 * E_WARNING level error is generated.
 * @return resource A result pointer resource on success .
 * 
 * Use the mysql_tablename function to
 * traverse this result pointer, or any function for result tables,
 * such as mysql_fetch_array.
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_list_tables(string $database, $link_identifier = NULL)
{
    error_clear_last();
    $result = \mysql_list_tables($database, $link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Sets the default character set for the current connection.
 * 
 * @param string $charset A valid character set name.
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no such link is found, it
 * will try to create one as if mysql_connect had been called
 * with no arguments. If no connection is found or established, an
 * E_WARNING level error is generated.
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_set_charset(string $charset, $link_identifier = NULL): void
{
    error_clear_last();
    $result = \mysql_set_charset($charset, $link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
}


/**
 * Retrieves the table name from a result.
 * 
 * This function is deprecated. It is preferable to use 
 * mysql_query to issue an SQL SHOW TABLES 
 * [FROM db_name] [LIKE 'pattern'] statement instead.
 * 
 * @param resource $result A result pointer resource that's returned from  
 * mysql_list_tables.
 * @param int $i The integer index (row/table number)
 * @return string The name of the table on success .
 * 
 * Use the mysql_tablename function to
 * traverse this result pointer, or any function for result tables,
 * such as mysql_fetch_array.
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_tablename($result, int $i): string
{
    error_clear_last();
    $result = \mysql_tablename($result, $i);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves the current thread ID. If the connection is lost, and a reconnect 
 * with mysql_ping is executed, the thread ID will 
 * change. This means only retrieve the thread ID when needed.
 * 
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no such link is found, it
 * will try to create one as if mysql_connect had been called
 * with no arguments. If no connection is found or established, an
 * E_WARNING level error is generated.
 * @return int The thread ID on success .
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_thread_id($link_identifier = NULL): int
{
    error_clear_last();
    $result = \mysql_thread_id($link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
    return $result;
}


/**
 * mysql_unbuffered_query sends the SQL query
 * query to MySQL without automatically
 * fetching and buffering the result rows as
 * mysql_query does.  This saves a considerable
 * amount of memory with SQL queries that produce large result sets,
 * and you can start working on the result set immediately after the
 * first row has been retrieved as you don't have to wait until the
 * complete SQL query has been performed.  To use
 * mysql_unbuffered_query while multiple database
 * connections are open, you must specify the optional parameter
 * link_identifier to identify which connection
 * you want to use.
 * 
 * @param string $query The SQL query to execute.
 * 
 * Data inside the query should be properly escaped.
 * @param resource $link_identifier The MySQL connection. If the
 * link identifier is not specified, the last link opened by
 * mysql_connect is assumed. If no such link is found, it
 * will try to create one as if mysql_connect had been called
 * with no arguments. If no connection is found or established, an
 * E_WARNING level error is generated.
 * @return resource For SELECT, SHOW, DESCRIBE or EXPLAIN statements,
 * mysql_unbuffered_query 
 * returns a resource on success, .
 * 
 * For other type of SQL statements, UPDATE, DELETE, DROP, etc,
 * mysql_unbuffered_query returns TRUE on success
 * .
 * @throws Exceptions\MysqlException
 * 
 */
function mysql_unbuffered_query(string $query, $link_identifier = NULL)
{
    error_clear_last();
    $result = \mysql_unbuffered_query($query, $link_identifier);
    if ($result === FALSE) {
        throw Exceptions\MysqlException::createFromPhpError();
    }
    return $result;
}


