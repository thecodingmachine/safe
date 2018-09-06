<?php

namespace Safe;

/**
 * pg_cancel_query cancels an asynchronous query sent with 
 * pg_send_query, pg_send_query_params
 * or pg_send_execute. You cannot cancel a query executed using 
 * pg_query.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_cancel_query($connection): void
{
    error_clear_last();
    $result = \pg_cancel_query($connection);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * PostgreSQL supports automatic character set conversion between 
 * server and client for certain character sets.
 * pg_client_encoding returns the client
 * encoding as a string. The returned string will be one of the
 * standard PostgreSQL encoding identifiers.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return string The client encoding, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_client_encoding($connection = null): string
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_client_encoding($connection);
    }else {
        $result = \pg_client_encoding();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_close closes the non-persistent
 * connection to a PostgreSQL database associated with the given
 * connection resource.
 * 
 * If there is open large object resource on the connection, do not
 * close the connection before closing all large object resources.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_close($connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_close($connection);
    }else {
        $result = \pg_close();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_connection_reset resets the connection.
 * It is useful for error recovery.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_connection_reset($connection): void
{
    error_clear_last();
    $result = \pg_connection_reset($connection);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_convert checks and converts the values in
 * assoc_array into suitable values for use in an SQL
 * statement. Precondition for pg_convert is the 
 * existence of a table table_name which has at least
 * as many columns as assoc_array has elements. The
 * fieldnames in table_name must match the indices in
 * assoc_array and the corresponding datatypes must be
 * compatible. Returns an array with the converted values on success, FALSE
 * otherwise.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $table_name Name of the table against which to convert types.
 * @param array $assoc_array Data to be converted.
 * @param int $options Any number of PGSQL_CONV_IGNORE_DEFAULT,
 * PGSQL_CONV_FORCE_NULL or
 * PGSQL_CONV_IGNORE_NOT_NULL, combined.
 * @return array An array of converted values, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_convert($connection, string $table_name, array $assoc_array, int $options = 0): array
{
    error_clear_last();
    $result = \pg_convert($connection, $table_name, $assoc_array, $options);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_copy_from inserts records into a table from 
 * rows. It issues a COPY FROM SQL command 
 * internally to insert records.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $table_name Name of the table into which to copy the rows.
 * @param array $rows An array of data to be copied into table_name.
 * Each value in rows becomes a row in table_name.
 * Each value in rows should be a delimited string of the values
 * to insert into each field.  Values should be linefeed terminated.
 * @param string $delimiter The token that separates values for each field in each element of
 * rows.  Default is TAB.
 * @param string $null_as How SQL NULL values are represented in the
 * rows.  Default is \N ("\\N").
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_copy_from($connection, string $table_name, array $rows, string $delimiter = null, string $null_as = null): void
{
    error_clear_last();
    if ($null_as !== null) {
        $result = \pg_copy_from($connection, $table_name, $rows, $delimiter, $null_as);
    } elseif ($delimiter !== null) {
        $result = \pg_copy_from($connection, $table_name, $rows, $delimiter);
    }else {
        $result = \pg_copy_from($connection, $table_name, $rows);
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_dbname returns the name of the database
 * that the given PostgreSQL connection
 * resource.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return string A string containing the name of the database the 
 * connection is to, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_dbname($connection = null): string
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_dbname($connection);
    }else {
        $result = \pg_dbname();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_delete deletes records from a table
 * specified by the keys and values
 * in assoc_array. If options
 * is specified, pg_convert is applied
 * to assoc_array with the specified options.
 * 
 * If options is specified,
 * pg_convert is applied to
 * assoc_array with the specified flags.
 * 
 * By default pg_delete passes raw values. Values
 * must be escaped or PGSQL_DML_ESCAPE option must be
 * specified. PGSQL_DML_ESCAPE quotes and escapes
 * paramters/identifiers. Therefore, table/column names became case
 * sensitive.
 * 
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $table_name Name of the table from which to delete rows.
 * @param array $assoc_array An array whose keys are field names in the table table_name,
 * and whose values are the values of those fields that are to be deleted.
 * @param int $options Any number of PGSQL_CONV_FORCE_NULL,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * options then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @return mixed Returns TRUE on success .  Returns string if PGSQL_DML_STRING is passed
 * via options.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_delete($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC)
{
    error_clear_last();
    $result = \pg_delete($connection, $table_name, $assoc_array, $options);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_end_copy syncs the PostgreSQL frontend
 * (usually a web server process) with the PostgreSQL server after
 * doing a copy operation performed by
 * pg_put_line. pg_end_copy
 * must be issued, otherwise the PostgreSQL server may get out of
 * sync with the frontend and will report an error.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_end_copy($connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_end_copy($connection);
    }else {
        $result = \pg_end_copy();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
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
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
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
 * @return resource A query result resource on success .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_execute($connection = null, string $stmtname = null, array $params = null)
{
    error_clear_last();
    if ($params !== null) {
        $result = \pg_execute($connection, $stmtname, $params);
    } elseif ($stmtname !== null) {
        $result = \pg_execute($connection, $stmtname);
    } elseif ($connection !== null) {
        $result = \pg_execute($connection);
    }else {
        $result = \pg_execute();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_field_name returns the name of the field
 * occupying the given field_number in the
 * given PostgreSQL result resource.  Field
 * numbering starts from 0.
 * 
 * @param resource $result PostgreSQL query result resource, returned by pg_query,
 * pg_query_params or pg_execute
 * (among others).
 * @param int $field_number Field number, starting from 0.
 * @return string The field name, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_field_name($result, int $field_number): string
{
    error_clear_last();
    $result = \pg_field_name($result, $field_number);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_field_type returns a string containing the
 * base type name of the given field_number in the
 * given PostgreSQL result resource.
 * 
 * @param resource $result PostgreSQL query result resource, returned by pg_query,
 * pg_query_params or pg_execute
 * (among others).
 * @param int $field_number Field number, starting from 0.
 * @return string A string containing the base name of the field's type, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_field_type($result, int $field_number): string
{
    error_clear_last();
    $result = \pg_field_type($result, $field_number);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_flush flushes any outbound query data waiting to be
 * sent on the connection.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @return mixed Returns TRUE if the flush was successful or no data was waiting to be
 * flushed, 0 if part of the pending data was flushed but
 * more remains .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_flush($connection)
{
    error_clear_last();
    $result = \pg_flush($connection);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_free_result frees the memory and data associated with the
 * specified PostgreSQL query result resource.
 * 
 * This function need only be called if memory
 * consumption during script execution is a problem.   Otherwise, all result memory will 
 * be automatically freed when the script ends.
 * 
 * @param resource $result PostgreSQL query result resource, returned by pg_query,
 * pg_query_params or pg_execute
 * (among others).
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_free_result($result): void
{
    error_clear_last();
    $result = \pg_free_result($result);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_host returns the host name of the given
 * PostgreSQL connection resource is
 * connected to.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return string A string containing the name of the host the 
 * connection is to, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_host($connection = null): string
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_host($connection);
    }else {
        $result = \pg_host();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_insert inserts the values
 * of assoc_array into the table specified
 * by table_name. If options
 * is specified, pg_convert is applied
 * to assoc_array with the specified options.
 * 
 * If options is specified,
 * pg_convert is applied to
 * assoc_array with the specified flags.
 * 
 * By default pg_insert passes raw values. Values
 * must be escaped or PGSQL_DML_ESCAPE option must be
 * specified. PGSQL_DML_ESCAPE quotes and escapes
 * paramters/identifiers. Therefore, table/column names became case
 * sensitive.
 * 
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $table_name Name of the table into which to insert rows.  The table table_name must at least
 * have as many columns as assoc_array has elements.
 * @param array $assoc_array An array whose keys are field names in the table table_name,
 * and whose values are the values of those fields that are to be inserted.
 * @param int $options Any number of PGSQL_CONV_OPTS,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * options then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @return mixed Returns the connection resource on success,  . Returns string if PGSQL_DML_STRING is passed
 * via options.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_insert($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC)
{
    error_clear_last();
    $result = \pg_insert($connection, $table_name, $assoc_array, $options);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_last_error returns the last error message
 * for a given connection.
 * 
 * Error messages may be overwritten by internal PostgreSQL (libpq)
 * function calls. It may not return an appropriate error message if
 * multiple errors occur inside a PostgreSQL module function.
 * 
 * Use pg_result_error, pg_result_error_field,
 * pg_result_status and
 * pg_connection_status for better error handling.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return string A string containing the last error message on the 
 * given connection, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_last_error($connection = null): string
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_last_error($connection);
    }else {
        $result = \pg_last_error();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_last_notice returns the last notice
 * message from the PostgreSQL server on the specified
 * connection. The PostgreSQL server sends notice
 * messages in several cases, for instance when creating a SERIAL
 * column in a table.
 * 
 * With pg_last_notice, you can avoid issuing useless
 * queries by checking whether or not the notice is related to your transaction.
 * 
 * Notice message tracking can be set to optional by setting 1 for
 * pgsql.ignore_notice in php.ini.
 * 
 * Notice message logging can be set to optional by setting 0 for
 * pgsql.log_notice in php.ini.
 * Unless pgsql.ignore_notice is set
 * to 0, notice message cannot be logged.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param int $option One of PGSQL_NOTICE_LAST (to return last notice),
 * PGSQL_NOTICE_ALL (to return all notices),
 * or PGSQL_NOTICE_CLEAR (to clear notices).
 * @return string A string containing the last notice on the 
 * given connection with
 * PGSQL_NOTICE_LAST,
 * an array with PGSQL_NOTICE_ALL,
 * a boolean with PGSQL_NOTICE_CLEAR,
 * .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_last_notice($connection, int $option = PGSQL_NOTICE_LAST)
{
    error_clear_last();
    $result = \pg_last_notice($connection, $option);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
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
 * @param resource $result PostgreSQL query result resource, returned by pg_query,
 * pg_query_params or pg_execute
 * (among others).
 * @return string A string containing the OID assigned to the most recently inserted
 * row in the specified connection,  or
 * no available OID.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_last_oid($result): string
{
    error_clear_last();
    $result = \pg_last_oid($result);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_lo_close closes a large
 * object. large_object is a resource for the
 * large object from pg_lo_open.
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $large_object PostgreSQL large object (LOB) resource, returned by pg_lo_open.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_close($large_object): void
{
    error_clear_last();
    $result = \pg_lo_close($large_object);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
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
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @param int $oid The OID of the large object in the database.
 * @param string $pathname The full path and file name of the file in which to write the
 * large object on the client filesystem.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_export($connection = null, int $oid = null, string $pathname = null): void
{
    error_clear_last();
    if ($pathname !== null) {
        $result = \pg_lo_export($connection, $oid, $pathname);
    } elseif ($oid !== null) {
        $result = \pg_lo_export($connection, $oid);
    } elseif ($connection !== null) {
        $result = \pg_lo_export($connection);
    }else {
        $result = \pg_lo_export();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_open opens a large object in the database
 * and returns large object resource so that it can be manipulated.
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @param int $oid The OID of the large object in the database.
 * @param string $mode Can be either "r" for read-only, "w" for write only or "rw" for read and 
 * write.
 * @return resource A large object resource .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_open($connection, int $oid, string $mode)
{
    error_clear_last();
    $result = \pg_lo_open($connection, $oid, $mode);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_lo_read_all reads a large object and passes
 * it straight through to the browser after sending all pending
 * headers. Mainly intended for sending binary data like images or
 * sound.
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $large_object PostgreSQL large object (LOB) resource, returned by pg_lo_open.
 * @return int Number of bytes read .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_read_all($large_object): int
{
    error_clear_last();
    $result = \pg_lo_read_all($large_object);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_lo_read reads at most
 * len bytes from a large object and
 * returns it as a string.
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $large_object PostgreSQL large object (LOB) resource, returned by pg_lo_open.
 * @param int $len An optional maximum number of bytes to return.
 * @return string A string containing len bytes from the
 * large object, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_read($large_object, int $len = 8192): string
{
    error_clear_last();
    $result = \pg_lo_read($large_object, $len);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_lo_seek seeks a position within a large object
 * resource.
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $large_object PostgreSQL large object (LOB) resource, returned by pg_lo_open.
 * @param int $offset The number of bytes to seek.
 * @param int $whence One of the constants PGSQL_SEEK_SET (seek from object start), 
 * PGSQL_SEEK_CUR (seek from current position)
 * or PGSQL_SEEK_END (seek from object end) .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_seek($large_object, int $offset, int $whence = PGSQL_SEEK_CUR): void
{
    error_clear_last();
    $result = \pg_lo_seek($large_object, $offset, $whence);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_truncate truncates a large object
 * resource.
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $large_object PostgreSQL large object (LOB) resource, returned by pg_lo_open.
 * @param int $size The number of bytes to truncate.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_truncate($large_object, int $size): void
{
    error_clear_last();
    $result = \pg_lo_truncate($large_object, $size);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_unlink deletes a large object with the
 * oid. Returns TRUE on success .
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @param int $oid The OID of the large object in the database.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_unlink($connection, int $oid): void
{
    error_clear_last();
    $result = \pg_lo_unlink($connection, $oid);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_lo_write writes data into a large object
 * at the current seek position.
 * 
 * To use the large object interface, it is necessary to
 * enclose it within a transaction block.
 * 
 * @param resource $large_object PostgreSQL large object (LOB) resource, returned by pg_lo_open.
 * @param string $data The data to be written to the large object.  If len is
 * specified and is less than the length of data, only
 * len bytes will be written.
 * @param int $len An optional maximum number of bytes to write.  Must be greater than zero
 * and no greater than the length of data.  Defaults to
 * the length of data.
 * @return int The number of bytes written to the large object, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_lo_write($large_object, string $data, int $len = null): int
{
    error_clear_last();
    if ($len !== null) {
        $result = \pg_lo_write($large_object, $data, $len);
    }else {
        $result = \pg_lo_write($large_object, $data);
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_meta_data returns table definition for
 * table_name as an array.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $table_name The name of the table.
 * @param bool $extended Flag for returning extended meta data. Default to FALSE.
 * @return array An array of the table definition, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_meta_data($connection, string $table_name, bool $extended = false): array
{
    error_clear_last();
    $result = \pg_meta_data($connection, $table_name, $extended);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_options will return a string containing
 * the options specified on the given PostgreSQL
 * connection resource.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return string A string containing the connection
 * options, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_options($connection = null): string
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_options($connection);
    }else {
        $result = \pg_options();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_ping pings a database connection and tries to
 * reconnect it if it is broken.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_ping($connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_ping($connection);
    }else {
        $result = \pg_ping();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_port returns the port number that the
 * given PostgreSQL connection resource is
 * connected to.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return int An int containing the port number of the database
 * server the connection is to, 
 * .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_port($connection = null): int
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_port($connection);
    }else {
        $result = \pg_port();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
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
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @param string $stmtname The name to give the prepared statement.  Must be unique per-connection.  If
 * "" is specified, then an unnamed statement is created, overwriting any
 * previously defined unnamed statement.
 * @param string $query The parameterized SQL statement.  Must contain only a single statement.
 * (multiple statements separated by semi-colons are not allowed.)  If any parameters 
 * are used, they are referred to as $1, $2, etc.
 * @return resource A query result resource on success .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_prepare($connection = null, string $stmtname = null, string $query = null)
{
    error_clear_last();
    if ($query !== null) {
        $result = \pg_prepare($connection, $stmtname, $query);
    } elseif ($stmtname !== null) {
        $result = \pg_prepare($connection, $stmtname);
    } elseif ($connection !== null) {
        $result = \pg_prepare($connection);
    }else {
        $result = \pg_prepare();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
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
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @param string $data A line of text to be sent directly to the PostgreSQL backend.  A NULL
 * terminator is added automatically.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_put_line($connection = null, string $data = null): void
{
    error_clear_last();
    if ($data !== null) {
        $result = \pg_put_line($connection, $data);
    } elseif ($connection !== null) {
        $result = \pg_put_line($connection);
    }else {
        $result = \pg_put_line();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
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
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
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
 * @return resource A query result resource on success .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_query_params($connection = null, string $query = null, array $params = null)
{
    error_clear_last();
    if ($params !== null) {
        $result = \pg_query_params($connection, $query, $params);
    } elseif ($query !== null) {
        $result = \pg_query_params($connection, $query);
    } elseif ($connection !== null) {
        $result = \pg_query_params($connection);
    }else {
        $result = \pg_query_params();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
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
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
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
 * @return resource A query result resource on success .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_query($connection = null, string $query = null)
{
    error_clear_last();
    if ($query !== null) {
        $result = \pg_query($connection, $query);
    } elseif ($connection !== null) {
        $result = \pg_query($connection);
    }else {
        $result = \pg_query();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_result_seek sets the internal row offset in
 * a result resource.
 * 
 * @param resource $result PostgreSQL query result resource, returned by pg_query,
 * pg_query_params or pg_execute
 * (among others).
 * @param int $offset Row to move the internal offset to in the result resource.
 * Rows are numbered starting from zero.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_result_seek($result, int $offset): void
{
    error_clear_last();
    $result = \pg_result_seek($result, $offset);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_select selects records specified by
 * assoc_array which has
 * field=&gt;value. For a successful query, it returns an
 * array containing all records and fields that match the condition
 * specified by assoc_array.
 * 
 * If options is specified,
 * pg_convert is applied to
 * assoc_array with the specified flags.
 * 
 * By default pg_select passes raw values. Values
 * must be escaped or PGSQL_DML_ESCAPE option must be
 * specified. PGSQL_DML_ESCAPE quotes and escapes
 * paramters/identifiers. Therefore, table/column names became case
 * sensitive.
 * 
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $table_name Name of the table from which to select rows.
 * @param array $assoc_array An array whose keys are field names in the table table_name,
 * and whose values are the conditions that a row must meet to be retrieved.
 * @param int $options Any number of PGSQL_CONV_FORCE_NULL,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * options then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @param int $result_type 
 * @return mixed Returns TRUE on success .  Returns string if PGSQL_DML_STRING is passed
 * via options.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_select($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC, int $result_type = PGSQL_ASSOC)
{
    error_clear_last();
    $result = \pg_select($connection, $table_name, $assoc_array, $options, $result_type);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Submits a command and separate parameters to the server without 
 * waiting for the result(s).
 * 
 * This is equivalent to pg_send_query except that query 
 * parameters can be specified separately from the 
 * query string. The function's parameters are 
 * handled identically to pg_query_params. Like 
 * pg_query_params, it will not work on pre-7.4 PostgreSQL 
 * connections, and it allows only one command in the query string.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $query The parameterized SQL statement.  Must contain only a single statement.
 * (multiple statements separated by semi-colons are not allowed.)  If any parameters 
 * are used, they are referred to as $1, $2, etc.
 * @param array $params An array of parameter values to substitute for the $1, $2, etc. placeholders
 * in the original prepared query string.  The number of elements in the array
 * must match the number of placeholders.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_send_query_params($connection, string $query, array $params): void
{
    error_clear_last();
    $result = \pg_send_query_params($connection, $query, $params);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_send_query sends a query or queries asynchronously to the
 * connection. Unlike
 * pg_query, it can send multiple queries at once to
 * PostgreSQL and get the results one by one using
 * pg_get_result.
 * 
 * Script execution is not blocked while the queries are executing. Use
 * pg_connection_busy to check if the connection is
 * busy (i.e. the query is executing). Queries may be cancelled using
 * pg_cancel_query.
 * 
 * Although the user can send multiple queries at once, multiple queries
 * cannot be sent over a busy connection. If a query is sent while
 * the connection is busy, it waits until the last query is finished and
 * discards all its results.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $query The SQL statement or statements to be executed.
 * 
 * Data inside the query should be properly escaped.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_send_query($connection, string $query): void
{
    error_clear_last();
    $result = \pg_send_query($connection, $query);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_socket returns a read only resource
 * corresponding to the socket underlying the given PostgreSQL connection.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @return resource A socket resource on success .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_socket($connection)
{
    error_clear_last();
    $result = \pg_socket($connection);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
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
 * @param string $pathname The full path and file name of the file in which to write the
 * trace log.  Same as in fopen.
 * @param string $mode An optional file access mode, same as for fopen.
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_trace(string $pathname, string $mode = "w", $connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_trace($pathname, $mode, $connection);
    }else {
        $result = \pg_trace($pathname, $mode);
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
}


/**
 * pg_tty returns the TTY name that server
 * side debugging output is sent to on the given PostgreSQL
 * connection resource.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return string A string containing the debug TTY of 
 * the connection, .
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_tty($connection = null): string
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_tty($connection);
    }else {
        $result = \pg_tty();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_update updates records that matches
 * condition with data. If
 * options is specified,
 * pg_convert is applied to
 * data with specified options.
 * 
 * pg_update updates records specified by
 * assoc_array which has
 * field=&gt;value.
 * 
 * If options is specified,
 * pg_convert is applied to
 * assoc_array with the specified flags.
 * 
 * By default pg_update passes raw values. Values
 * must be escaped or PGSQL_DML_ESCAPE option must be
 * specified. PGSQL_DML_ESCAPE quotes and escapes
 * paramters/identifiers. Therefore, table/column names became case
 * sensitive.
 * 
 * Note that neither escape nor prepared query can protect LIKE query,
 * JSON, Array, Regex, etc. These parameters should be handled
 * according to their contexts. i.e. Escape/validate values.
 * 
 * @param resource $connection PostgreSQL database connection resource.
 * @param string $table_name Name of the table into which to update rows.
 * @param array $data An array whose keys are field names in the table table_name,
 * and whose values are what matched rows are to be updated to.
 * @param array $condition An array whose keys are field names in the table table_name,
 * and whose values are the conditions that a row must meet to be updated.
 * @param int $options Any number of PGSQL_CONV_FORCE_NULL,
 * PGSQL_DML_NO_CONV,
 * PGSQL_DML_ESCAPE,
 * PGSQL_DML_EXEC,
 * PGSQL_DML_ASYNC or
 * PGSQL_DML_STRING combined. If PGSQL_DML_STRING is part of the
 * options then query string is returned. When PGSQL_DML_NO_CONV
 * or PGSQL_DML_ESCAPE is set, it does not call pg_convert internally.
 * @return mixed Returns TRUE on success .  Returns string if PGSQL_DML_STRING is passed
 * via options.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_update($connection, string $table_name, array $data, array $condition, int $options = PGSQL_DML_EXEC)
{
    error_clear_last();
    $result = \pg_update($connection, $table_name, $data, $condition, $options);
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * pg_version returns an array with the client, protocol
 * and server version. Protocol and server versions are only available if PHP
 * was compiled with PostgreSQL 7.4 or later.
 * 
 * For more detailed server information, use pg_parameter_status.
 * 
 * @param resource $connection PostgreSQL database connection resource.  When 
 * connection is not present, the default connection 
 * is used. The default connection is the last connection made by 
 * pg_connect or pg_pconnect.
 * @return array Returns an array with client, protocol 
 * and server keys and values (if available).  Returns
 * FALSE on error or invalid connection.
 * @throws Exceptions\PgsqlException
 * 
 */
function pg_version($connection = null): array
{
    error_clear_last();
    if ($connection !== null) {
        $result = \pg_version($connection);
    }else {
        $result = \pg_version();
    }
    if ($result === FALSE) {
        throw Exceptions\PgsqlException::createFromPhpError();
    }
    return $result;
}


