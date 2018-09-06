<?php

namespace Safe;

/**
 * Returns the size of the given BLOB.
 * 
 * @param string $blob_handle A BLOB handle, returned by fbsql_create_blob.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @return int Returns the BLOB size as an integer, .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_blob_size(string $blob_handle, $link_identifier): int
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_blob_size($blob_handle, $link_identifier);
    }else {
        $result = \fbsql_blob_size($blob_handle);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * fbsql_change_user changes the logged in user of the
 * specified connection. If the new user and password authorization fails, 
 * the current connected user stays active.
 * 
 * @param string $user The new user name.
 * @param string $password The new user password.
 * @param string $database If specified, this will be the default or current database after the
 * user has been changed.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_change_user(string $user, string $password, string $database, $link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_change_user($user, $password, $database, $link_identifier);
    } elseif ($database !== null) {
        $result = \fbsql_change_user($user, $password, $database);
    }else {
        $result = \fbsql_change_user($user, $password);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Returns the size of the given CLOB.
 * 
 * @param string $clob_handle A CLOB handle, returned by fbsql_create_clob.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @return int Returns the CLOB size as an integer, .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_clob_size(string $clob_handle, $link_identifier): int
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_clob_size($clob_handle, $link_identifier);
    }else {
        $result = \fbsql_clob_size($clob_handle);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Closes the connection to the FrontBase server that's associated with the
 * specified link identifier.
 * 
 * Using fbsql_close isn't usually necessary,
 * as non-persistent open links are automatically closed at the end
 * of the script's execution.
 * 
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_close($link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_close($link_identifier);
    }else {
        $result = \fbsql_close();
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Ends the current transaction by writing all inserts, updates and deletes
 * to the disk and unlocking all row and table locks held by the transaction.
 * This command is only needed if autocommit is set to false.
 * 
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_commit($link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_commit($link_identifier);
    }else {
        $result = \fbsql_commit();
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * fbsql_connect establishes a connection to a
 * FrontBase server.
 * 
 * If a second call is made to fbsql_connect
 * with the same arguments, no new link will be established, but
 * instead, the link identifier of the already opened link will be
 * returned.
 * 
 * The link to the server will be closed as soon as the execution of
 * the script ends, unless it's closed earlier by explicitly calling
 * fbsql_close.
 * 
 * @param string $hostname The server host name.
 * @param string $username The user name for the connection.
 * @param string $password The password for the connection.
 * @return resource Returns a positive FrontBase link identifier on success, s.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_connect(string $hostname = null, string $username = null, string $password = null)
{
    error_clear_last();
    $result = \fbsql_connect($hostname, $username, $password);
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Attempts to create a new database on the specified server.
 * 
 * @param string $database_name The database name, as a string.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @param string $database_options 
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_create_db(string $database_name, $link_identifier, string $database_options): void
{
    error_clear_last();
    if ($database_options !== null) {
        $result = \fbsql_create_db($database_name, $link_identifier, $database_options);
    } elseif ($link_identifier !== null) {
        $result = \fbsql_create_db($database_name, $link_identifier);
    }else {
        $result = \fbsql_create_db($database_name);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Moves the internal row pointer of the FrontBase result associated with the
 * specified result identifier to point to the specified row number.
 * 
 * The next call to fbsql_fetch_row would return that 
 * row.
 * 
 * @param resource $result A result identifier
 * returned by fbsql_query or
 * fbsql_db_query.
 * @param int $row_number The row number. Starts at 0.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_data_seek($result, int $row_number): void
{
    error_clear_last();
    $result = \fbsql_data_seek($result, $row_number);
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Selects a database and executes a query on it.
 * 
 * @param string $database The database to be selected.
 * @param string $query The SQL query to be executed.
 * 
 * The query string shall always end with a semicolon.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @return resource Returns a positive FrontBase result identifier to the query result, .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_db_query(string $database, string $query, $link_identifier)
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_db_query($database, $query, $link_identifier);
    }else {
        $result = \fbsql_db_query($database, $query);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * fbsql_drop_db attempts to drop (remove) an entire
 * database from the server associated with the specified link identifier.
 * 
 * @param string $database_name The database name, as a string.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_drop_db(string $database_name, $link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_drop_db($database_name, $link_identifier);
    }else {
        $result = \fbsql_drop_db($database_name);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Used in order to obtain information about fields in a certain query result.
 * 
 * @param resource $result A result identifier
 * returned by fbsql_query or
 * fbsql_db_query.
 * @param int $field_offset The numerical offset of the field. The field index starts at 0.
 * If not specified, the next field that wasn't yet retrieved by 
 * fbsql_fetch_field is retrieved.
 * @return object Returns an object containing field information, s.
 * 
 * The properties of the object are:
 * 
 * 
 * 
 * name - column name
 * 
 * 
 * 
 * 
 * table - name of the table the column belongs to
 * 
 * 
 * 
 * 
 * max_length - maximum length of the column
 * 
 * 
 * 
 * 
 * not_null - 1 if the column cannot be NULL
 * 
 * 
 * 
 * 
 * type - the type of the column
 * 
 * 
 * 
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_fetch_field($result, int $field_offset): object
{
    error_clear_last();
    if ($field_offset !== null) {
        $result = \fbsql_fetch_field($result, $field_offset);
    }else {
        $result = \fbsql_fetch_field($result);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Stores the lengths of each result column in the last row returned by
 * fbsql_fetch_row, 
 * fbsql_fetch_array and
 * fbsql_fetch_object in an array.
 * 
 * @param resource $result A result identifier
 * returned by fbsql_query or
 * fbsql_db_query.
 * @return array Returns an array, starting at offset 0, that corresponds to the lengths of
 * each field in the last row fetched by fbsql_fetch_row,
 * .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_fetch_lengths($result): array
{
    error_clear_last();
    $result = \fbsql_fetch_lengths($result);
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Seeks to the specified field offset. If the next call to
 * fbsql_fetch_field doesn't include a field
 * offset, the field offset specified in
 * fbsql_field_seek will be returned.
 * 
 * @param resource $result A result identifier
 * returned by fbsql_query or
 * fbsql_db_query.
 * @param int $field_offset The numerical offset of the field. The field index starts at 0.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_field_seek($result, int $field_offset): void
{
    error_clear_last();
    if ($field_offset !== null) {
        $result = \fbsql_field_seek($result, $field_offset);
    }else {
        $result = \fbsql_field_seek($result);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Frees all memory associated with the given result
 * identifier.
 * 
 * fbsql_free_result only needs to be called if
 * you are concerned about how much memory is being used for queries
 * that return large result sets.  All associated result memory is
 * automatically freed at the end of the script's execution.
 * 
 * @param resource $result A result identifier
 * returned by fbsql_query or
 * fbsql_db_query.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_free_result($result): void
{
    error_clear_last();
    $result = \fbsql_free_result($result);
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Return a result pointer containing the databases available from the
 * current fbsql daemon. Use the fbsql_tablename to
 * traverse this result pointer.
 * 
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @return resource Returns a result pointer .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_list_dbs($link_identifier)
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_list_dbs($link_identifier);
    }else {
        $result = \fbsql_list_dbs();
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about the given table.
 * 
 * @param string $database_name The database name.
 * @param string $table_name The table name.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @return resource Returns a result pointer which can be used with the
 * fbsql_field_xxx functions, .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_list_fields(string $database_name, string $table_name, $link_identifier)
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_list_fields($database_name, $table_name, $link_identifier);
    }else {
        $result = \fbsql_list_fields($database_name, $table_name);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns a result pointer describing the database.
 * 
 * @param string $database The database name.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @return resource Returns a result pointer which can be used with the
 * fbsql_tablename function to read the actual table
 * names, .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_list_tables(string $database, $link_identifier)
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_list_tables($database, $link_identifier);
    }else {
        $result = \fbsql_list_tables($database);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Establishes a persistent connection to a FrontBase server.
 * 
 * To set the server port number, use fbsql_select_db.
 * 
 * fbsql_pconnect acts very much like
 * fbsql_connect with two major differences:
 * 
 * First, when connecting, the function would first try to find a
 * (persistent) link that's already open with the same host,
 * username and password.  If one is found, an identifier for it
 * will be returned instead of opening a new connection.
 * 
 * Second, the connection to the SQL server will not be closed when
 * the execution of the script ends.  Instead, the link will remain
 * open for future use.
 * 
 * This type of links is therefore called 'persistent'.
 * 
 * @param string $hostname The server host name.
 * @param string $username The user name for the connection.
 * @param string $password The password for the connection.
 * @return resource Returns a positive FrontBase persistent link identifier on success, .
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_pconnect(string $hostname = null, string $username = null, string $password = null)
{
    error_clear_last();
    $result = \fbsql_pconnect($hostname, $username, $password);
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
    return $result;
}


/**
 * Ends the current transaction by rolling back all statements issued since
 * last commit.
 * 
 * This command is only needed if autocommit is set to false.
 * 
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_rollback($link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_rollback($link_identifier);
    }else {
        $result = \fbsql_rollback();
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Sets the current active database on the given link identifier.
 * 
 * The client contacts FBExec to obtain the port number to use for
 * the connection to the database. If the database name is a number
 * the system will use that as a port number and it will not ask
 * FBExec for the port number.  The FrontBase server can be stared
 * as FRontBase -FBExec=No -port=&lt;port number&gt; &lt;database
 * name&gt;.
 * 
 * Every subsequent call to fbsql_query will be
 * made on the active database.
 * 
 * @param string $database_name The name of the database to be selected.
 * 
 * If the database is protected with a database password, the you must
 * call fbsql_database_password before selecting the
 * database.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_select_db(string $database_name, $link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_select_db($database_name, $link_identifier);
    } elseif ($database_name !== null) {
        $result = \fbsql_select_db($database_name);
    }else {
        $result = \fbsql_select_db();
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Sets the mode for retrieving LOB data from the database.
 * 
 * When BLOB and CLOB data is retrieved in FrontBase it can be retrieved 
 * direct or indirect.  Direct retrieved LOB data will always be fetched no
 * matter the setting of the lob mode. If the LOB data is less than 512 bytes
 * it will always be retrieved directly.
 * 
 * @param resource $result A result identifier
 * returned by fbsql_query or
 * fbsql_db_query.
 * @param int $lob_mode Can be one of:
 * 
 * 
 * 
 * FBSQL_LOB_DIRECT - LOB data is retrieved
 * directly. When data is fetched from the database with
 * fbsql_fetch_row, and other fetch functions,
 * all CLOB and BLOB columns will be returned as ordinary columns.
 * This is the default value on a new FrontBase result.
 * 
 * 
 * 
 * 
 * FBSQL_LOB_HANDLE - LOB data is retrieved as
 * handles to the data.  When data is fetched from the database with
 * fbsql_fetch_row, and other fetch functions,
 * LOB data will be returned as a handle to the data if the data is
 * stored indirect or the data if it is stored direct.  If a handle
 * is returned it will be a 27 byte string formatted as 
 * @'000000000000000000000000'.
 * 
 * 
 * 
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_set_lob_mode($result, int $lob_mode): void
{
    error_clear_last();
    $result = \fbsql_set_lob_mode($result, $lob_mode);
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Changes the password for the given user.
 * 
 * @param resource $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @param string $user The user name.
 * @param string $password The new password to be set.
 * @param string $old_password The old password to be replaced.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_set_password($link_identifier, string $user, string $password, string $old_password): void
{
    error_clear_last();
    $result = \fbsql_set_password($link_identifier, $user, $password, $old_password);
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Start a database on local or remote server.
 * 
 * @param string $database_name The database name.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @param string $database_options 
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_start_db(string $database_name, $link_identifier, string $database_options): void
{
    error_clear_last();
    if ($database_options !== null) {
        $result = \fbsql_start_db($database_name, $link_identifier, $database_options);
    } elseif ($link_identifier !== null) {
        $result = \fbsql_start_db($database_name, $link_identifier);
    }else {
        $result = \fbsql_start_db($database_name);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


/**
 * Stops a database on local or remote server.
 * 
 * @param string $database_name The database name.
 * @param resource|null $link_identifier A FrontBase link identifier
 * returned by fbsql_connect or
 * fbsql_pconnect.
 * 
 * If optional and not specified,
 * the function will try to find an open link to the FrontBase server and if no
 * such link is found it will try to create one as if
 * fbsql_connect was called with no arguments.
 * @throws Exceptions\FbsqlException
 * 
 */
function fbsql_stop_db(string $database_name, $link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \fbsql_stop_db($database_name, $link_identifier);
    }else {
        $result = \fbsql_stop_db($database_name);
    }
    if ($result === FALSE) {
        throw Exceptions\FbsqlException::createFromPhpError();
    }
}


