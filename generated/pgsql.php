<?php

namespace Safe;

use Safe\Exceptions\PgsqlException;

/**
 * pg_cancel_query cancels an asynchronous query sent with
 * pg_send_query, pg_send_query_params
 * or pg_send_execute. You cannot cancel a query executed using
 * pg_query.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @throws PgsqlException
 *
 */
function pg_cancel_query($connection): void
{
    error_clear_last();
    $safeResult = \pg_cancel_query($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_connect opens a connection to a
 * PostgreSQL database specified by the
 * connection_string.
 *
 * If a second call is made to pg_connect with
 * the same connection_string as an existing connection, the
 * existing connection will be returned unless you pass
 * PGSQL_CONNECT_FORCE_NEW as
 * flags.
 *
 * The old syntax with multiple parameters
 * $conn = pg_connect("host", "port", "options", "tty", "dbname")
 * has been deprecated.
 *
 * @param string $connection_string The connection_string can be empty to use all default parameters, or it
 * can contain one or more parameter settings separated by whitespace.
 * Each parameter setting is in the form keyword = value. Spaces around
 * the equal sign are optional. To write an empty value or a value
 * containing spaces, surround it with single quotes, e.g., keyword =
 * 'a value'. Single quotes and backslashes within the value must be
 * escaped with a backslash, i.e., \' and \\.
 *
 * The currently recognized parameter keywords are:
 * host, hostaddr, port,
 * dbname (defaults to value of user),
 * user,
 * password, connect_timeout,
 * options, tty (ignored), sslmode,
 * requiressl (deprecated in favor of sslmode), and
 * service.  Which of these arguments exist depends
 * on your PostgreSQL version.
 *
 * The options parameter can be used to set command line parameters
 * to be invoked by the server.
 * @param int $flags If PGSQL_CONNECT_FORCE_NEW is passed, then a new connection
 * is created, even if the connection_string is identical to
 * an existing connection.
 *
 * If PGSQL_CONNECT_ASYNC is given, then the
 * connection is established asynchronously. The state of the connection
 * can then be checked via pg_connect_poll or
 * pg_connection_status.
 * @return resource Returns an PgSql\Connection instance on success.
 * @throws PgsqlException
 *
 */
function pg_connect(string $connection_string, int $flags = 0)
{
    error_clear_last();
    $safeResult = \pg_connect($connection_string, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_connection_reset resets the connection.
 * It is useful for error recovery.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @throws PgsqlException
 *
 */
function pg_connection_reset($connection): void
{
    error_clear_last();
    $safeResult = \pg_connection_reset($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_convert checks and converts the values in
 * values into suitable values for use in an SQL
 * statement. Precondition for pg_convert is the
 * existence of a table table_name which has at least
 * as many columns as values has elements. The
 * fieldnames in table_name must match the indices in
 * values and the corresponding datatypes must be
 * compatible. Returns an array with the converted values on success, FALSE
 * otherwise.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name Name of the table against which to convert types.
 * @param array $values Data to be converted.
 * @param int $flags Any number of PGSQL_CONV_IGNORE_DEFAULT,
 * PGSQL_CONV_FORCE_NULL or
 * PGSQL_CONV_IGNORE_NOT_NULL, combined.
 * @return array An array of converted values.
 * @throws PgsqlException
 *
 */
function pg_convert($connection, string $table_name, array $values, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \pg_convert($connection, $table_name, $values, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_copy_from inserts records into a table from
 * rows. It issues a COPY FROM SQL command
 * internally to insert records.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name Name of the table into which to copy the rows.
 * @param array $rows An array of data to be copied into table_name.
 * Each value in rows becomes a row in table_name.
 * Each value in rows should be a delimited string of the values
 * to insert into each field.  Values should be linefeed terminated.
 * @param string $separator The token that separates values for each field in each element of
 * rows.  Default is \t.
 * @param string $null_as How SQL NULL values are represented in the
 * rows.  Default is \\N ("\\\\N").
 * @throws PgsqlException
 *
 */
function pg_copy_from($connection, string $table_name, array $rows, string $separator = "\t", string $null_as = "\\\\N"): void
{
    error_clear_last();
    $safeResult = \pg_copy_from($connection, $table_name, $rows, $separator, $null_as);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_copy_to copies a table to an array. It
 * issues COPY TO SQL command internally to
 * retrieve records.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name Name of the table from which to copy the data into rows.
 * @param string $separator The token that separates values for each field in each element of
 * rows.  Default is \t.
 * @param string $null_as How SQL NULL values are represented in the
 * rows.  Default is \\N ("\\\\N").
 * @return array An array with one element for each line of COPY data.
 * @throws PgsqlException
 *
 */
function pg_copy_to($connection, string $table_name, string $separator = "\t", string $null_as = "\\\\N"): array
{
    error_clear_last();
    $safeResult = \pg_copy_to($connection, $table_name, $separator, $null_as);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_delete deletes records from a table
 * specified by the keys and values in conditions.
 *
 * If flags is specified,
 * pg_convert is applied to
 * conditions with the specified flags.
 *
 * By default pg_delete passes raw values.
 * Values must be escaped or the PGSQL_DML_ESCAPE flag
 * must be specified in flags.
 * PGSQL_DML_ESCAPE quotes and escapes parameters/identifiers.
 * Therefore, table/column names become case sensitive.
 *
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name Name of the table from which to delete rows.
 * @param array $conditions An array whose keys are field names in the table table_name,
 * and whose values are the values of those fields that are to be deleted.
 * @param int $flags Any number of PGSQL_CONV_FORCE_NULL,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * flags then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @return mixed Returns TRUE on success.  Returns string if PGSQL_DML_STRING is passed
 * via flags.
 * @throws PgsqlException
 *
 */
function pg_delete($connection, string $table_name, array $conditions, int $flags = PGSQL_DML_EXEC)
{
    error_clear_last();
    $safeResult = \pg_delete($connection, $table_name, $conditions, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_end_copy syncs the PostgreSQL frontend
 * (usually a web server process) with the PostgreSQL server after
 * doing a copy operation performed by
 * pg_put_line. pg_end_copy
 * must be issued, otherwise the PostgreSQL server may get out of
 * sync with the frontend and will report an error.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is NULL, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @throws PgsqlException
 *
 */
function pg_end_copy($connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $safeResult = \pg_end_copy($connection);
    } else {
        $safeResult = \pg_end_copy();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * Sends a request to execute a prepared statement with given parameters, and
 * waits for the result.
 *
 * pg_execute is like pg_query_params,
 * but the command to be executed is
 * specified by naming a previously-prepared statement, instead of giving a
 * query string. This feature allows commands that will be used repeatedly to
 * be parsed and planned just once, rather than each time they are executed.
 * The statement must have been prepared previously in the current session.
 * pg_execute is supported only against PostgreSQL 7.4 or
 * higher connections; it will fail when using earlier versions.
 *
 * The parameters are identical to pg_query_params, except that the name of a
 * prepared statement is given instead of a query string.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param string $stmtname The name of the prepared statement to execute.  if
 * "" is specified, then the unnamed statement is executed.  The name must have
 * been previously prepared using pg_prepare,
 * pg_send_prepare or a PREPARE SQL
 * command.
 * @param array $params An array of parameter values to substitute for the $1, $2, etc. placeholders
 * in the original prepared query string.  The number of elements in the array
 * must match the number of placeholders.
 *
 * Elements are converted to strings by calling this function.
 * @return resource An PgSql\Result instance on success.
 * @throws PgsqlException
 *
 */
function pg_execute($connection = null, string $stmtname = null, array $params = null)
{
    error_clear_last();
    if ($params !== null) {
        $safeResult = \pg_execute($connection, $stmtname, $params);
    } elseif ($stmtname !== null) {
        $safeResult = \pg_execute($connection, $stmtname);
    } elseif ($connection !== null) {
        $safeResult = \pg_execute($connection);
    } else {
        $safeResult = \pg_execute();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_field_table returns the name of the table that field
 * belongs to, or the table's oid if oid_only is TRUE.
 *
 * @param resource $result An PgSql\Result instance, returned by pg_query,
 * pg_query_params or pg_execute(among others).
 * @param int $field Field number, starting from 0.
 * @param bool $oid_only By default the tables name that field belongs to is returned but
 * if oid_only is set to TRUE, then the
 * oid will instead be returned.
 * @return mixed On success either the fields table name or oid.
 * @throws PgsqlException
 *
 */
function pg_field_table($result, int $field, bool $oid_only = false)
{
    error_clear_last();
    $safeResult = \pg_field_table($result, $field, $oid_only);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_flush flushes any outbound query data waiting to be
 * sent on the connection.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @return mixed Returns TRUE if the flush was successful or no data was waiting to be
 * flushed, 0 if part of the pending data was flushed but
 * more remains.
 * @throws PgsqlException
 *
 */
function pg_flush($connection)
{
    error_clear_last();
    $safeResult = \pg_flush($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_free_result frees the memory and data associated with the
 * specified PgSql\Result instance.
 *
 * This function need only be called if memory
 * consumption during script execution is a problem.   Otherwise, all result memory will
 * be automatically freed when the script ends.
 *
 * @param resource $result An PgSql\Result instance, returned by pg_query,
 * pg_query_params or pg_execute(among others).
 * @throws PgsqlException
 *
 */
function pg_free_result($result): void
{
    error_clear_last();
    $safeResult = \pg_free_result($result);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_host returns the host name of the given
 * PostgreSQL connection instance is
 * connected to.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is NULL, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @return string A string containing the name of the host the
 * connection is to.
 * @throws PgsqlException
 *
 */
function pg_host($connection = null): string
{
    error_clear_last();
    if ($connection !== null) {
        $safeResult = \pg_host($connection);
    } else {
        $safeResult = \pg_host();
    }
    if ($safeResult === '') {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_insert inserts the values
 * of values into the table specified
 * by table_name.
 *
 * If flags is specified,
 * pg_convert is applied to
 * values with the specified flags.
 *
 * By default pg_insert passes raw values.
 * Values must be escaped or the PGSQL_DML_ESCAPE flag
 * must be specified in flags.
 * PGSQL_DML_ESCAPE quotes and escapes parameters/identifiers.
 * Therefore, table/column names become case sensitive.
 *
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name Name of the table into which to insert rows.  The table table_name must at least
 * have as many columns as values has elements.
 * @param array $values An array whose keys are field names in the table table_name,
 * and whose values are the values of those fields that are to be inserted.
 * @param int $flags Any number of PGSQL_CONV_OPTS,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * flags then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @return mixed Returns TRUE on success.. Or returns a string on success if PGSQL_DML_STRING is passed
 * via flags.
 * @throws PgsqlException
 *
 */
function pg_insert($connection, string $table_name, array $values, int $flags = PGSQL_DML_EXEC)
{
    error_clear_last();
    $safeResult = \pg_insert($connection, $table_name, $values, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_last_oid is used to retrieve the
 * OID assigned to an inserted row.
 *
 * OID field became an optional field from PostgreSQL 7.2 and will
 * not be present by default in PostgreSQL 8.1. When the
 * OID field is not present in a table, the programmer must use
 * pg_result_status to check for successful
 * insertion.
 *
 * To get the value of a SERIAL field in an inserted
 * row, it is necessary to use the PostgreSQL CURRVAL
 * function, naming the sequence whose last value is required.  If the
 * name of the sequence is unknown, the pg_get_serial_sequence
 * PostgreSQL 8.0 function is necessary.
 *
 * PostgreSQL 8.1 has a function LASTVAL that returns
 * the value of the most recently used sequence in the session.  This avoids
 * the need for naming the sequence, table or column altogether.
 *
 * @param resource $result An PgSql\Result instance, returned by pg_query,
 * pg_query_params or pg_execute(among others).
 * @return string An int or string containing the OID assigned to the most recently inserted
 * row in the specified connection or
 * no available OID.
 * @throws PgsqlException
 *
 */
function pg_last_oid($result): string
{
    error_clear_last();
    $safeResult = \pg_last_oid($result);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_lo_close closes a large object.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $lob An PgSql\Lob instance, returned by pg_lo_open.
 * @throws PgsqlException
 *
 */
function pg_lo_close($lob): void
{
    error_clear_last();
    $safeResult = \pg_lo_close($lob);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_export takes a large object in a
 * PostgreSQL database and saves its contents to a file on the local
 * filesystem.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param int $oid The OID of the large object in the database.
 * @param string $pathname The full path and file name of the file in which to write the
 * large object on the client filesystem.
 * @throws PgsqlException
 *
 */
function pg_lo_export($connection = null, int $oid = null, string $pathname = null): void
{
    error_clear_last();
    if ($pathname !== null) {
        $safeResult = \pg_lo_export($connection, $oid, $pathname);
    } elseif ($oid !== null) {
        $safeResult = \pg_lo_export($connection, $oid);
    } elseif ($connection !== null) {
        $safeResult = \pg_lo_export($connection);
    } else {
        $safeResult = \pg_lo_export();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_import creates a new large object
 * in the database using a file on the filesystem as its data
 * source.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param string $pathname The full path and file name of the file on the client
 * filesystem from which to read the large object data.
 * @param  $object_id If an object_id is given the function
 * will try to create a large object with this id, else a free
 * object id is assigned by the server. The parameter
 * relies on functionality that first
 * appeared in PostgreSQL 8.1.
 * @return int The OID of the newly created large object.
 * @throws PgsqlException
 *
 */
function pg_lo_import($connection = null, string $pathname = null, $object_id = null): int
{
    error_clear_last();
    if ($object_id !== null) {
        $safeResult = \pg_lo_import($connection, $pathname, $object_id);
    } elseif ($pathname !== null) {
        $safeResult = \pg_lo_import($connection, $pathname);
    } elseif ($connection !== null) {
        $safeResult = \pg_lo_import($connection);
    } else {
        $safeResult = \pg_lo_import();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_lo_open opens a large object in the database
 * and returns an PgSql\Lob instance so that it can be manipulated.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param int $oid The OID of the large object in the database.
 * @param string $mode Can be either "r" for read-only, "w" for write only or "rw" for read and
 * write.
 * @return resource An PgSql\Lob instance.
 * @throws PgsqlException
 *
 */
function pg_lo_open($connection, int $oid, string $mode)
{
    error_clear_last();
    $safeResult = \pg_lo_open($connection, $oid, $mode);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_lo_read reads at most
 * length bytes from a large object and
 * returns it as a string.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $lob An PgSql\Lob instance, returned by pg_lo_open.
 * @param int $length An optional maximum number of bytes to return.
 * @return string A string containing length bytes from the
 * large object.
 * @throws PgsqlException
 *
 */
function pg_lo_read($lob, int $length = 8192): string
{
    error_clear_last();
    $safeResult = \pg_lo_read($lob, $length);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_lo_seek seeks a position within an PgSql\Lob instance.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $lob An PgSql\Lob instance, returned by pg_lo_open.
 * @param int $offset The number of bytes to seek.
 * @param int $whence One of the constants PGSQL_SEEK_SET (seek from object start),
 * PGSQL_SEEK_CUR (seek from current position)
 * or PGSQL_SEEK_END (seek from object end) .
 * @throws PgsqlException
 *
 */
function pg_lo_seek($lob, int $offset, int $whence = SEEK_CUR): void
{
    error_clear_last();
    $safeResult = \pg_lo_seek($lob, $offset, $whence);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_truncate truncates an PgSql\Lob instance.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $lob An PgSql\Lob instance, returned by pg_lo_open.
 * @param int $size The number of bytes to truncate.
 * @throws PgsqlException
 *
 */
function pg_lo_truncate($lob, int $size): void
{
    error_clear_last();
    $safeResult = \pg_lo_truncate($lob, $size);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_unlink deletes a large object with the
 * oid. Returns TRUE on success.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param int $oid The OID of the large object in the database.
 * @throws PgsqlException
 *
 */
function pg_lo_unlink($connection, int $oid): void
{
    error_clear_last();
    $safeResult = \pg_lo_unlink($connection, $oid);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_write writes data into a large object
 * at the current seek position.
 *
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 *
 * @param resource $lob An PgSql\Lob instance, returned by pg_lo_open.
 * @param string $data The data to be written to the large object.  If length is
 * an int and is less than the length of data, only
 * length bytes will be written.
 * @param int $length An optional maximum number of bytes to write.  Must be greater than zero
 * and no greater than the length of data.  Defaults to
 * the length of data.
 * @return int The number of bytes written to the large object.
 * @throws PgsqlException
 *
 */
function pg_lo_write($lob, string $data, int $length = null): int
{
    error_clear_last();
    if ($length !== null) {
        $safeResult = \pg_lo_write($lob, $data, $length);
    } else {
        $safeResult = \pg_lo_write($lob, $data);
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_meta_data returns table definition for
 * table_name as an array.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name The name of the table.
 * @param bool $extended Flag for returning extended meta data. Default to FALSE.
 * @return array An array of the table definition.
 * @throws PgsqlException
 *
 */
function pg_meta_data($connection, string $table_name, bool $extended = false): array
{
    error_clear_last();
    $safeResult = \pg_meta_data($connection, $table_name, $extended);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Looks up a current parameter setting of the server.
 *
 * Certain parameter values are reported by the server automatically at
 * connection startup or whenever their values change. pg_parameter_status can be
 * used to interrogate these settings. It returns the current value of a
 * parameter if known, or FALSE if the parameter is not known.
 *
 * Parameters reported as of PostgreSQL 8.0 include server_version,
 * server_encoding, client_encoding,
 * is_superuser, session_authorization,
 * DateStyle, TimeZone, and integer_datetimes.
 * (server_encoding, TimeZone, and
 * integer_datetimes were not reported by releases before 8.0.) Note that
 * server_version, server_encoding and integer_datetimes
 * cannot change after PostgreSQL startup.
 *
 * PostgreSQL 7.3 or lower servers do not report parameter settings,
 * pg_parameter_status
 * includes logic to obtain values for server_version and
 * client_encoding
 * anyway. Applications are encouraged to use pg_parameter_status rather than ad
 * hoc code to determine these values.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param string $param_name Possible param_name values include server_version,
 * server_encoding, client_encoding,
 * is_superuser, session_authorization,
 * DateStyle, TimeZone, and
 * integer_datetimes.  Note that this value is case-sensitive.
 * @return string A string containing the value of the parameter, FALSE on failure or invalid
 * param_name.
 * @throws PgsqlException
 *
 */
function pg_parameter_status($connection = null, string $param_name = null): string
{
    error_clear_last();
    if ($param_name !== null) {
        $safeResult = \pg_parameter_status($connection, $param_name);
    } elseif ($connection !== null) {
        $safeResult = \pg_parameter_status($connection);
    } else {
        $safeResult = \pg_parameter_status();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_pconnect opens a connection to a
 * PostgreSQL database. It returns an PgSql\Connection instance that is
 * needed by other PostgreSQL functions.
 *
 * If a second call is made to pg_pconnect with
 * the same connection_string as an existing connection, the
 * existing connection will be returned unless you pass
 * PGSQL_CONNECT_FORCE_NEW as
 * flags.
 *
 * To enable persistent connection, the pgsql.allow_persistent
 * php.ini directive must be set to "On" (which is the default).
 * The maximum number of persistent connection can be defined with the pgsql.max_persistent
 * php.ini directive (defaults to -1 for no limit). The total number
 * of connections can be set with the pgsql.max_links
 * php.ini directive.
 *
 * pg_close will not close persistent links
 * generated by pg_pconnect.
 *
 * @param string $connection_string The connection_string can be empty to use all default parameters, or it
 * can contain one or more parameter settings separated by whitespace.
 * Each parameter setting is in the form keyword = value. Spaces around
 * the equal sign are optional. To write an empty value or a value
 * containing spaces, surround it with single quotes, e.g., keyword =
 * 'a value'. Single quotes and backslashes within the value must be
 * escaped with a backslash, i.e., \' and \\.
 *
 * The currently recognized parameter keywords are:
 * host, hostaddr, port,
 * dbname, user,
 * password, connect_timeout,
 * options, tty (ignored), sslmode,
 * requiressl (deprecated in favor of sslmode), and
 * service.  Which of these arguments exist depends
 * on your PostgreSQL version.
 * @param int $flags If PGSQL_CONNECT_FORCE_NEW is passed, then a new connection
 * is created, even if the connection_string is identical to
 * an existing connection.
 * @return resource Returns an PgSql\Connection instance on success.
 * @throws PgsqlException
 *
 */
function pg_pconnect(string $connection_string, int $flags = 0)
{
    error_clear_last();
    $safeResult = \pg_pconnect($connection_string, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_ping pings a database connection and tries to
 * reconnect it if it is broken.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is NULL, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @throws PgsqlException
 *
 */
function pg_ping($connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $safeResult = \pg_ping($connection);
    } else {
        $safeResult = \pg_ping();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_prepare creates a prepared statement for later execution with
 * pg_execute or pg_send_execute.
 * This feature allows commands that will be used repeatedly to
 * be parsed and planned just once, rather than each time they are executed.
 * pg_prepare is supported only against PostgreSQL 7.4 or
 * higher connections; it will fail when using earlier versions.
 *
 * The function creates a prepared statement named stmtname from the query
 * string, which must contain a single SQL command. stmtname may be "" to
 * create an unnamed statement, in which case any pre-existing unnamed
 * statement is automatically replaced; otherwise it is an error if the
 * statement name is already defined in the current session. If any parameters
 * are used, they are referred to in the query as $1, $2, etc.
 *
 * Prepared statements for use with pg_prepare can also be created by
 * executing SQL PREPARE statements. (But pg_prepare is more flexible since it
 * does not require parameter types to be pre-specified.) Also, although there
 * is no PHP function for deleting a prepared statement, the SQL DEALLOCATE
 * statement can be used for that purpose.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param string $stmtname The name to give the prepared statement.  Must be unique per-connection.  If
 * "" is specified, then an unnamed statement is created, overwriting any
 * previously defined unnamed statement.
 * @param string $query The parameterized SQL statement.  Must contain only a single statement.
 * (multiple statements separated by semi-colons are not allowed.)  If any parameters
 * are used, they are referred to as $1, $2, etc.
 * @return resource An PgSql\Result instance on success.
 * @throws PgsqlException
 *
 */
function pg_prepare($connection = null, string $stmtname = null, string $query = null)
{
    error_clear_last();
    if ($query !== null) {
        $safeResult = \pg_prepare($connection, $stmtname, $query);
    } elseif ($stmtname !== null) {
        $safeResult = \pg_prepare($connection, $stmtname);
    } elseif ($connection !== null) {
        $safeResult = \pg_prepare($connection);
    } else {
        $safeResult = \pg_prepare();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_put_line sends a NULL-terminated string
 * to the PostgreSQL backend server.  This is needed in conjunction
 * with PostgreSQL's COPY FROM command.
 *
 * COPY is a high-speed data loading interface
 * supported by PostgreSQL.  Data is passed in without being parsed,
 * and in a single transaction.
 *
 * An alternative to using raw pg_put_line commands
 * is to use pg_copy_from.  This is a far simpler
 * interface.
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param string $data A line of text to be sent directly to the PostgreSQL backend.  A NULL
 * terminator is added automatically.
 * @throws PgsqlException
 *
 */
function pg_put_line($connection = null, string $data = null): void
{
    error_clear_last();
    if ($data !== null) {
        $safeResult = \pg_put_line($connection, $data);
    } elseif ($connection !== null) {
        $safeResult = \pg_put_line($connection);
    } else {
        $safeResult = \pg_put_line();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * Submits a command to the server and waits for the result, with the ability
 * to pass parameters separately from the SQL command text.
 *
 * pg_query_params is like pg_query,
 * but offers additional functionality: parameter
 * values can be specified separately from the command string proper.
 * pg_query_params is supported only against PostgreSQL 7.4 or
 * higher connections; it will fail when using earlier versions.
 *
 * If parameters are used, they are referred to in the
 * query string as $1, $2, etc. The same parameter may
 * appear more than once in the query; the same value
 * will be used in that case. params specifies the
 * actual values of the parameters. A NULL value in this array means the
 * corresponding parameter is SQL NULL.
 *
 * The primary advantage of pg_query_params over pg_query
 * is that parameter values
 * may be separated from the query string, thus avoiding the need for tedious
 * and error-prone quoting and escaping. Unlike pg_query,
 * pg_query_params allows at
 * most one SQL command in the given string. (There can be semicolons in it,
 * but not more than one nonempty command.)
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param string $query The parameterized SQL statement.  Must contain only a single statement.
 * (multiple statements separated by semi-colons are not allowed.)  If any parameters
 * are used, they are referred to as $1, $2, etc.
 *
 * User-supplied values should always be passed as parameters, not
 * interpolated into the query string, where they form possible
 * SQL injection
 * attack vectors and introduce bugs when handling data containing quotes.
 * If for some reason you cannot use a parameter, ensure that interpolated
 * values are properly escaped.
 * @param array $params An array of parameter values to substitute for the $1, $2, etc. placeholders
 * in the original prepared query string.  The number of elements in the array
 * must match the number of placeholders.
 *
 * Values intended for bytea fields are not supported as
 * parameters. Use pg_escape_bytea instead, or use the
 * large object functions.
 * @return resource An PgSql\Result instance on success.
 * @throws PgsqlException
 *
 */
function pg_query_params($connection = null, string $query = null, array $params = null)
{
    error_clear_last();
    if ($params !== null) {
        $safeResult = \pg_query_params($connection, $query, $params);
    } elseif ($query !== null) {
        $safeResult = \pg_query_params($connection, $query);
    } elseif ($connection !== null) {
        $safeResult = \pg_query_params($connection);
    } else {
        $safeResult = \pg_query_params();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_query executes the query
 * on the specified database connection.
 * pg_query_params should be preferred
 * in most cases.
 *
 * If an error occurs, and FALSE is returned, details of the error can
 * be retrieved using the pg_last_error
 * function if the connection is valid.
 *
 *
 *
 * Although connection can be omitted, it
 * is not recommended, since it can be the cause of hard to find
 * bugs in scripts.
 *
 *
 *
 * @param resource $connection An PgSql\Connection instance.
 * When connection is unspecified, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @param string $query The SQL statement or statements to be executed. When multiple statements are passed to the function,
 * they are automatically executed as one transaction, unless there are explicit BEGIN/COMMIT commands
 * included in the query string. However, using multiple transactions in one function call is not recommended.
 *
 * String interpolation of user-supplied data is extremely dangerous and is
 * likely to lead to SQL
 * injection vulnerabilities. In most cases
 * pg_query_params should be preferred, passing
 * user-supplied values as parameters rather than substituting them into
 * the query string.
 *
 * Any user-supplied data substituted directly into a query string should
 * be properly escaped.
 * @return resource An PgSql\Result instance on success.
 * @throws PgsqlException
 *
 */
function pg_query($connection = null, string $query = null)
{
    error_clear_last();
    if ($query !== null) {
        $safeResult = \pg_query($connection, $query);
    } elseif ($connection !== null) {
        $safeResult = \pg_query($connection);
    } else {
        $safeResult = \pg_query();
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_result_error_field returns one of the detailed error message
 * fields associated with result instance. It is only available
 * against a PostgreSQL 7.4 or above server.  The error field is specified by
 * the field_code.
 *
 * Because pg_query and pg_query_params return FALSE if the query fails,
 * you must use pg_send_query and
 * pg_get_result to get the result handle.
 *
 * If you need to get additional error information from failed pg_query queries,
 * use pg_set_error_verbosity and pg_last_error
 * and then parse the result.
 *
 * @param resource $result An PgSql\Result instance, returned by pg_query,
 * pg_query_params or pg_execute(among others).
 * @param int $field_code Possible field_code values are: PGSQL_DIAG_SEVERITY,
 * PGSQL_DIAG_SQLSTATE, PGSQL_DIAG_MESSAGE_PRIMARY,
 * PGSQL_DIAG_MESSAGE_DETAIL,
 * PGSQL_DIAG_MESSAGE_HINT, PGSQL_DIAG_STATEMENT_POSITION,
 * PGSQL_DIAG_INTERNAL_POSITION (PostgreSQL 8.0+ only),
 * PGSQL_DIAG_INTERNAL_QUERY (PostgreSQL 8.0+ only),
 * PGSQL_DIAG_CONTEXT, PGSQL_DIAG_SOURCE_FILE,
 * PGSQL_DIAG_SOURCE_LINE or
 * PGSQL_DIAG_SOURCE_FUNCTION.
 * @return string|null A string containing the contents of the error field, NULL if the field does not exist.
 * @throws PgsqlException
 *
 */
function pg_result_error_field($result, int $field_code): ?string
{
    error_clear_last();
    $safeResult = \pg_result_error_field($result, $field_code);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_result_seek sets the internal row offset in
 * the result instance.
 *
 * @param resource $result An PgSql\Result instance, returned by pg_query,
 * pg_query_params or pg_execute(among others).
 * @param int $row Row to move the internal offset to in the PgSql\Result instance.
 * Rows are numbered starting from zero.
 * @throws PgsqlException
 *
 */
function pg_result_seek($result, int $row): void
{
    error_clear_last();
    $safeResult = \pg_result_seek($result, $row);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_select selects records specified by
 * conditions which has
 * field=&gt;value. For a successful query, it returns an
 * array containing all records and fields that match the condition
 * specified by conditions.
 *
 * If flags is specified,
 * pg_convert is applied to
 * conditions with the specified flags.
 *
 * By default pg_select passes raw values. Values
 * must be escaped or PGSQL_DML_ESCAPE option must be
 * specified. PGSQL_DML_ESCAPE quotes and escapes
 * parameters/identifiers. Therefore, table/column names became case
 * sensitive.
 *
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name Name of the table from which to select rows.
 * @param array $conditions An array whose keys are field names in the table table_name,
 * and whose values are the conditions that a row must meet to be retrieved.
 * @param int $flags Any number of PGSQL_CONV_FORCE_NULL,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * flags then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @param int $mode
 * @return mixed Returns string if PGSQL_DML_STRING is passed
 * via flags, otherwise it returns an array on success.
 * @throws PgsqlException
 *
 */
function pg_select($connection, string $table_name, array $conditions, int $flags = PGSQL_DML_EXEC, int $mode = PGSQL_ASSOC)
{
    error_clear_last();
    $safeResult = \pg_select($connection, $table_name, $conditions, $flags, $mode);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_socket returns a read only resource
 * corresponding to the socket underlying the given PostgreSQL connection.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @return resource A socket resource on success.
 * @throws PgsqlException
 *
 */
function pg_socket($connection)
{
    error_clear_last();
    $safeResult = \pg_socket($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * pg_trace enables tracing of the PostgreSQL
 * frontend/backend communication to a file. To fully understand the results,
 * one needs to be familiar with the internals of PostgreSQL
 * communication protocol.
 *
 * For those who are not, it can still be
 * useful for tracing errors in queries sent to the server, you
 * could do for example grep '^To backend'
 * trace.log and see what queries actually were sent to the
 * PostgreSQL server. For more information, refer to the
 * PostgreSQL Documentation.
 *
 * @param string $filename The full path and file name of the file in which to write the
 * trace log.  Same as in fopen.
 * @param string $mode An optional file access mode, same as for fopen.
 * @param resource $connection An PgSql\Connection instance.
 * When connection is NULL, the default connection is used.
 * The default connection is the last connection made by pg_connect
 * or pg_pconnect.
 * As of PHP 8.1.0, using the default connection is deprecated.
 * @throws PgsqlException
 *
 */
function pg_trace(string $filename, string $mode = "w", $connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $safeResult = \pg_trace($filename, $mode, $connection);
    } else {
        $safeResult = \pg_trace($filename, $mode);
    }
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * pg_update updates records that matches
 * conditions with values.
 *
 * If flags is specified,
 * pg_convert is applied to
 * values with the specified flags.
 *
 * By default pg_update passes raw values.
 * Values must be escaped or the PGSQL_DML_ESCAPE flag
 * must be specified in flags.
 * PGSQL_DML_ESCAPE quotes and escapes parameters/identifiers.
 * Therefore, table/column names become case sensitive.
 *
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 *
 * @param resource $connection An PgSql\Connection instance.
 * @param string $table_name Name of the table into which to update rows.
 * @param array $values An array whose keys are field names in the table table_name,
 * and whose values are what matched rows are to be updated to.
 * @param array $conditions An array whose keys are field names in the table table_name,
 * and whose values are the conditions that a row must meet to be updated.
 * @param int $flags Any number of PGSQL_CONV_FORCE_NULL,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * flags then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @return mixed Returns TRUE on success.  Returns string if PGSQL_DML_STRING is passed
 * via flags.
 * @throws PgsqlException
 *
 */
function pg_update($connection, string $table_name, array $values, array $conditions, int $flags = PGSQL_DML_EXEC)
{
    error_clear_last();
    $safeResult = \pg_update($connection, $table_name, $values, $conditions, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}
