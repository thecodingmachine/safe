<?php

namespace Safe;

use Safe\Exceptions\UodbcException;

/**
 * Toggles autocommit behaviour.
 *
 * By default, auto-commit is on for a connection.  Disabling
 * auto-commit is equivalent with starting a transaction.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param bool|null $enable If enable is TRUE, auto-commit is enabled, if
 * it is FALSE auto-commit is disabled.
 * If NULL is passed, this function returns the auto-commit status for
 * odbc.
 * @return mixed With a NULL enable parameter, this function returns
 * auto-commit status for odbc. Non-zero is
 * returned if auto-commit is on, 0 if it is off, or FALSE if an error
 * occurs.
 *
 * If enable is non-null, this function returns TRUE on
 * success.
 * @throws UodbcException
 *
 */
function odbc_autocommit(\Odbc\Connection $odbc, ?bool $enable = null)
{
    error_clear_last();
    if ($enable !== null) {
        $safeResult = \odbc_autocommit($odbc, $enable);
    } else {
        $safeResult = \odbc_autocommit($odbc);
    }
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Controls handling of binary column data. ODBC SQL types affected are
 * BINARY, VARBINARY, and
 * LONGVARBINARY.
 * The default mode can be set using the
 * uodbc.defaultbinmode php.ini directive.
 *
 * When binary SQL data is converted to character C data (ODBC_BINMODE_CONVERT), each byte
 * (8 bits) of source data is represented as two ASCII characters.
 * These characters are the ASCII character representation of the
 * number in its hexadecimal form. For example, a binary
 * 00000001 is converted to
 * "01" and a binary 11111111
 * is converted to "FF".
 *
 * While the handling of BINARY and VARBINARY
 * columns only depend on the binmode, the handling of LONGVARBINARY
 * columns also depends on the longreadlen as well:
 *
 * LONGVARBINARY handling
 *
 *
 *
 * binmode
 * longreadlen
 * result
 *
 *
 *
 *
 * ODBC_BINMODE_PASSTHRU
 * 0
 * passthru
 *
 *
 * ODBC_BINMODE_RETURN
 * 0
 * passthru
 *
 *
 * ODBC_BINMODE_CONVERT
 * 0
 * passthru
 *
 *
 * ODBC_BINMODE_PASSTHRU
 * &gt;0
 * passthru
 *
 *
 * ODBC_BINMODE_RETURN
 * &gt;0
 * return as is
 *
 *
 * ODBC_BINMODE_CONVERT
 * &gt;0
 * return as char
 *
 *
 *
 *
 *
 * If odbc_fetch_into is used, passthru means that an
 * empty string is returned for these columns.
 * If odbc_result is used, passthru means that the data are
 * sent directly to the client (i.e. printed).
 *
 * @param int $statement The ODBC result object.
 * @param int $mode Possible values for mode are:
 *
 *
 *
 * ODBC_BINMODE_PASSTHRU: Passthru BINARY data
 *
 *
 *
 *
 * ODBC_BINMODE_RETURN: Return as is
 *
 *
 *
 *
 * ODBC_BINMODE_CONVERT: Convert to char and return
 *
 *
 *
 *
 *
 * Handling of binary long
 * columns is also affected by odbc_longreadlen.
 *
 *
 * @return bool Always returns TRUE.
 *
 */
function odbc_binmode(int $statement, int $mode): bool
{
    error_clear_last();
    $safeResult = \odbc_binmode($statement, $mode);
    return $safeResult;
}


/**
 * Lists columns and associated privileges for the given table.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param string $schema The schema ('owner' in ODBC 2 parlance).
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param string $table The table name.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param string $column The column name.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 * This result object can be used to fetch a list of columns and
 * associated privileges.
 *
 * The result set has the following columns:
 *
 * TABLE_CAT
 * TABLE_SCHEM
 * TABLE_NAME
 * COLUMN_NAME
 * GRANTOR
 * GRANTEE
 * PRIVILEGE
 * IS_GRANTABLE
 *
 * Drivers can report additional columns.
 *
 */
function odbc_columnprivileges(\Odbc\Connection $odbc, string $catalog, string $schema, string $table, string $column)
{
    error_clear_last();
    $safeResult = \odbc_columnprivileges($odbc, $catalog, $schema, $table, $column);
    return $safeResult;
}


/**
 * Lists all columns in the requested range.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param null|string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param null|string $schema The schema ('owner' in ODBC 2 parlance).
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param null|string $table The table name.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param null|string $column The column name.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * TABLE_CAT
 * TABLE_SCHEM
 * TABLE_NAME
 * COLUMN_NAME
 * DATA_TYPE
 * TYPE_NAME
 * COLUMN_SIZE
 * BUFFER_LENGTH
 * DECIMAL_DIGITS
 * NUM_PREC_RADIX
 * NULLABLE
 * REMARKS
 * COLUMN_DEF
 * SQL_DATA_TYPE
 * SQL_DATETIME_SUB
 * CHAR_OCTET_LENGTH
 * ORDINAL_POSITION
 * IS_NULLABLE
 *
 * Drivers can report additional columns.
 *
 */
function odbc_columns(\Odbc\Connection $odbc, ?string $catalog = null, ?string $schema = null, ?string $table = null, ?string $column = null)
{
    error_clear_last();
    if ($column !== null) {
        $safeResult = \odbc_columns($odbc, $catalog, $schema, $table, $column);
    } elseif ($table !== null) {
        $safeResult = \odbc_columns($odbc, $catalog, $schema, $table);
    } elseif ($schema !== null) {
        $safeResult = \odbc_columns($odbc, $catalog, $schema);
    } elseif ($catalog !== null) {
        $safeResult = \odbc_columns($odbc, $catalog);
    } else {
        $safeResult = \odbc_columns($odbc);
    }
    return $safeResult;
}


/**
 * Commits all pending transactions on the connection.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @throws UodbcException
 *
 */
function odbc_commit(\Odbc\Connection $odbc): void
{
    error_clear_last();
    $safeResult = \odbc_commit($odbc);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $dsn The database source name for the connection. Alternatively, a
 * DSN-less connection string can be used.
 * @param null|string $user The username.
 * This parameter is ignored if dsn contains uid.
 * To connect without specifying a user,
 * use NULL.
 * @param null|string $password The password.
 * This parameter is ignored if dsn contains pwd.
 * To connect without specifying a password,
 * use NULL.
 * @param int $cursor_option This sets the type of cursor to be used
 * for this connection. This parameter is not normally needed, but
 * can be useful for working around problems with some ODBC drivers.
 *
 *
 *
 *
 * SQL_CUR_USE_IF_NEEDED
 *
 *
 *
 *
 * SQL_CUR_USE_ODBC
 *
 *
 *
 *
 * SQL_CUR_USE_DRIVER
 *
 *
 *
 * @return \Odbc\Connection Returns an ODBC connection.
 * @throws UodbcException
 *
 */
function odbc_connect(string $dsn, ?string $user = null, ?string $password = null, int $cursor_option = SQL_CUR_USE_DRIVER): \Odbc\Connection
{
    error_clear_last();
    if ($cursor_option !== SQL_CUR_USE_DRIVER) {
        $safeResult = \odbc_connect($dsn, $user, $password, $cursor_option);
    } elseif ($password !== null) {
        $safeResult = \odbc_connect($dsn, $user, $password);
    } elseif ($user !== null) {
        $safeResult = \odbc_connect($dsn, $user);
    } else {
        $safeResult = \odbc_connect($dsn);
    }
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the cursorname for the given result_id.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @return string Returns the cursor name, as a string.
 * @throws UodbcException
 *
 */
function odbc_cursor(\Odbc\Result $statement): string
{
    error_clear_last();
    $safeResult = \odbc_cursor($statement);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function will return the list of available DSN (after calling it
 * several times).
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param int $fetch_type The fetch_type can be one of two constant types:
 * SQL_FETCH_FIRST, SQL_FETCH_NEXT.
 * Use SQL_FETCH_FIRST the first time this function is
 * called, thereafter use the SQL_FETCH_NEXT.
 * @return array Returns FALSE on error, an array upon success, and NULL after fetching
 * the last available DSN.
 * @throws UodbcException
 *
 */
function odbc_data_source(\Odbc\Connection $odbc, int $fetch_type): array
{
    error_clear_last();
    $safeResult = \odbc_data_source($odbc, $fetch_type);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Sends an SQL statement to the database server.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param string $query The SQL statement.
 * @return \Odbc\Result Returns an ODBC result object if the SQL command was executed
 * successfully.
 * @throws UodbcException
 *
 */
function odbc_exec(\Odbc\Connection $odbc, string $query): \Odbc\Result
{
    error_clear_last();
    $safeResult = \odbc_exec($odbc, $query);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Executes a statement prepared with odbc_prepare.
 *
 * @param \Odbc\Result $statement The ODBC result object from odbc_prepare.
 * @param array $params Parameters in params will be
 * substituted for placeholders in the prepared statement in order.
 * Elements of this array will be converted to strings by calling this
 * function.
 *
 * Any parameters in params which
 * start and end with single quotes will be taken as the name of a
 * file to read and send to the database server as the data for the
 * appropriate placeholder.
 * @throws UodbcException
 *
 */
function odbc_execute(\Odbc\Result $statement, array $params = []): void
{
    error_clear_last();
    $safeResult = \odbc_execute($statement, $params);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * Fetch one result row into array.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param array|null $array The result array
 * that can be of any type since it will be converted to type
 * array. The array will contain the column values starting at array
 * index 0.
 * @param int|null $row The row number.
 * @return int Returns the number of columns in the result;
 * FALSE on error.
 * @throws UodbcException
 *
 */
function odbc_fetch_into(\Odbc\Result $statement, ?array &$array, ?int $row = null): int
{
    error_clear_last();
    if ($row !== null) {
        $safeResult = \odbc_fetch_into($statement, $array, $row);
    } else {
        $safeResult = \odbc_fetch_into($statement, $array);
    }
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the length of the field referenced by number in the given result
 * identifier.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param int $field The field number. Field numbering starts at 1.
 * @return int Returns the field length.
 * @throws UodbcException
 *
 */
function odbc_field_len(\Odbc\Result $statement, int $field): int
{
    error_clear_last();
    $safeResult = \odbc_field_len($statement, $field);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the name of the field occupying the given column number in the given
 * result object.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param int $field The field number. Field numbering starts at 1.
 * @return string Returns the field name as a string.
 * @throws UodbcException
 *
 */
function odbc_field_name(\Odbc\Result $statement, int $field): string
{
    error_clear_last();
    $safeResult = \odbc_field_name($statement, $field);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the number of the column slot that corresponds to the named field in
 * the given result object.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param string $field The field name.
 * @return int Returns the field number as a integer.
 * Field numbering starts at 1.
 * @throws UodbcException
 *
 */
function odbc_field_num(\Odbc\Result $statement, string $field): int
{
    error_clear_last();
    $safeResult = \odbc_field_num($statement, $field);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the scale of the field referenced by number in the given result
 * identifier.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param int $field The field number. Field numbering starts at 1.
 * @return int Returns the field scale as a integer.
 * @throws UodbcException
 *
 */
function odbc_field_scale(\Odbc\Result $statement, int $field): int
{
    error_clear_last();
    $safeResult = \odbc_field_scale($statement, $field);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the SQL type of the field referenced by number in the given result
 * identifier.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param int $field The field number. Field numbering starts at 1.
 * @return string Returns the field type as a string.
 * @throws UodbcException
 *
 */
function odbc_field_type(\Odbc\Result $statement, int $field): string
{
    error_clear_last();
    $safeResult = \odbc_field_type($statement, $field);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Retrieves a list of foreign keys in the specified table or a list of
 * foreign keys in other tables that refer to the primary key in the
 * specified table
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param string $pk_catalog The catalog ('qualifier' in ODBC 2 parlance) of the primary key table.
 * @param string $pk_schema The schema ('owner' in ODBC 2 parlance) of the primary key table.
 * @param string $pk_table The primary key table.
 * @param string $fk_catalog The catalog ('qualifier' in ODBC 2 parlance) of the foreign key table.
 * @param string $fk_schema The schema ('owner' in ODBC 2 parlance) of the foreign key table.
 * @param string $fk_table The foreign key table.
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * PKTABLE_CAT
 * PKTABLE_SCHEM
 * PKTABLE_NAME
 * PKCOLUMN_NAME
 * FKTABLE_CAT
 * FKTABLE_SCHEM
 * FKTABLE_NAME
 * FKCOLUMN_NAME
 * KEY_SEQ
 * UPDATE_RULE
 * DELETE_RULE
 * FK_NAME
 * PK_NAME
 * DEFERRABILITY
 *
 * Drivers can report additional columns.
 *
 */
function odbc_foreignkeys(\Odbc\Connection $odbc, string $pk_catalog, string $pk_schema, string $pk_table, string $fk_catalog, string $fk_schema, string $fk_table)
{
    error_clear_last();
    $safeResult = \odbc_foreignkeys($odbc, $pk_catalog, $pk_schema, $pk_table, $fk_catalog, $fk_schema, $fk_table);
    return $safeResult;
}


/**
 * Retrieves information about data types supported by the data source.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param int $data_type The data type, which can be used to restrict the information to a
 * single data type.
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * TYPE_NAME
 * DATA_TYPE
 * PRECISION
 * LITERAL_PREFIX
 * LITERAL_SUFFIX
 * CREATE_PARAMS
 * NULLABLE
 * CASE_SENSITIVE
 * SEARCHABLE
 * UNSIGNED_ATTRIBUTE
 * MONEY
 * AUTO_INCREMENT
 * LOCAL_TYPE_NAME
 * MINIMUM_SCALE
 * MAXIMUM_SCALE
 *
 *
 * The result set is ordered by DATA_TYPE and TYPE_NAME.
 *
 */
function odbc_gettypeinfo(\Odbc\Connection $odbc, int $data_type = 0)
{
    error_clear_last();
    $safeResult = \odbc_gettypeinfo($odbc, $data_type);
    return $safeResult;
}


/**
 * Controls handling of LONG, LONGVARCHAR and LONGVARBINARY columns.
 * The default length can be set using the
 * uodbc.defaultlrl php.ini directive.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param int $length The number of bytes returned to PHP is controlled by the parameter
 * length. If it is set to 0, long column data is passed through to the
 * client (i.e. printed) when retrieved with odbc_result.
 * @return bool Always returns TRUE.
 *
 */
function odbc_longreadlen(\Odbc\Result $statement, int $length): bool
{
    error_clear_last();
    $safeResult = \odbc_longreadlen($statement, $length);
    return $safeResult;
}


/**
 * Gets the number of fields (columns) in an ODBC result.
 *
 * @param \Odbc\Result $statement The ODBC result object returned by odbc_exec.
 * @return int Returns the number of fields.
 * @throws UodbcException
 *
 */
function odbc_num_fields(\Odbc\Result $statement): int
{
    error_clear_last();
    $safeResult = \odbc_num_fields($statement);
    if ($safeResult === -1) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Opens a persistent database connection.
 *
 * This function is much like
 * odbc_connect, except that the connection is
 * not really closed when the script has finished.  Future requests
 * for a connection with the same dsn,
 * user, password
 * combination (via odbc_connect and
 * odbc_pconnect) can reuse the persistent
 * connection.
 *
 * @param string $dsn
 * @param null|string $user
 * @param null|string $password
 * @param int $cursor_option
 * @return \Odbc\Connection Returns an ODBC connection.
 * @throws UodbcException
 *
 */
function odbc_pconnect(string $dsn, ?string $user = null, ?string $password = null, int $cursor_option = SQL_CUR_USE_DRIVER): \Odbc\Connection
{
    error_clear_last();
    if ($cursor_option !== SQL_CUR_USE_DRIVER) {
        $safeResult = \odbc_pconnect($dsn, $user, $password, $cursor_option);
    } elseif ($password !== null) {
        $safeResult = \odbc_pconnect($dsn, $user, $password);
    } elseif ($user !== null) {
        $safeResult = \odbc_pconnect($dsn, $user);
    } else {
        $safeResult = \odbc_pconnect($dsn);
    }
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Prepares a statement for execution. The ODBC result object can be used
 * later to execute the statement with odbc_execute.
 *
 * Some databases (such as IBM DB2, MS SQL Server, and Oracle) support
 * stored procedures that accept parameters of type IN, INOUT, and OUT as
 * defined by the ODBC specification.  However, the Unified ODBC driver
 * currently only supports parameters of type IN to stored procedures.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param string $query The query string statement being prepared.
 * @return \Odbc\Result Returns an ODBC result object if the SQL command was prepared
 * successfully.
 * @throws UodbcException
 *
 */
function odbc_prepare(\Odbc\Connection $odbc, string $query): \Odbc\Result
{
    error_clear_last();
    $safeResult = \odbc_prepare($odbc, $query);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns a result object that can be used to fetch the column names
 * that comprise the primary key for a table.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param string $schema The schema ('owner' in ODBC 2 parlance).
 * @param string $table
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * TABLE_CAT
 * TABLE_SCHEM
 * TABLE_NAME
 * COLUMN_NAME
 * KEY_SEQ
 * PK_NAME
 *
 * Drivers can report additional columns.
 *
 */
function odbc_primarykeys(\Odbc\Connection $odbc, string $catalog, string $schema, string $table)
{
    error_clear_last();
    $safeResult = \odbc_primarykeys($odbc, $catalog, $schema, $table);
    return $safeResult;
}


/**
 * Retrieve information about parameters to procedures.
 *
 * @param  $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param null|string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param null|string $schema The schema ('owner' in ODBC 2 parlance).
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param null|string $procedure The proc.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param null|string $column The column.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @return \Odbc\Result|false Returns the list of input and output parameters, as well as the
 * columns that make up the result set for the specified procedures.
 * Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * PROCEDURE_CAT
 * PROCEDURE_SCHEM
 * PROCEDURE_NAME
 * COLUMN_NAME
 * COLUMN_TYPE
 * DATA_TYPE
 * TYPE_NAME
 * COLUMN_SIZE
 * BUFFER_LENGTH
 * DECIMAL_DIGITS
 * NUM_PREC_RADIX
 * NULLABLE
 * REMARKS
 * COLUMN_DEF
 * SQL_DATA_TYPE
 * SQL_DATETIME_SUB
 * CHAR_OCTET_LENGTH
 * ORDINAL_POSITION
 * IS_NULLABLE
 *
 * Drivers can report additional columns.
 *
 */
function odbc_procedurecolumns($odbc, ?string $catalog = null, ?string $schema = null, ?string $procedure = null, ?string $column = null)
{
    error_clear_last();
    if ($column !== null) {
        $safeResult = \odbc_procedurecolumns($odbc, $catalog, $schema, $procedure, $column);
    } elseif ($procedure !== null) {
        $safeResult = \odbc_procedurecolumns($odbc, $catalog, $schema, $procedure);
    } elseif ($schema !== null) {
        $safeResult = \odbc_procedurecolumns($odbc, $catalog, $schema);
    } elseif ($catalog !== null) {
        $safeResult = \odbc_procedurecolumns($odbc, $catalog);
    } else {
        $safeResult = \odbc_procedurecolumns($odbc);
    }
    return $safeResult;
}


/**
 * Lists all procedures in the requested range.
 *
 * @param  $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param null|string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param null|string $schema The schema ('owner' in ODBC 2 parlance).
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param null|string $procedure The name.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @return \Odbc\Result Returns an ODBC result object containing the information.
 *
 * The result set has the following columns:
 *
 * PROCEDURE_CAT
 * PROCEDURE_SCHEM
 * PROCEDURE_NAME
 * NUM_INPUT_PARAMS
 * NUM_OUTPUT_PARAMS
 * NUM_RESULT_SETS
 * REMARKS
 * PROCEDURE_TYPE
 *
 * Drivers can report additional columns.
 * @throws UodbcException
 *
 */
function odbc_procedures($odbc, ?string $catalog = null, ?string $schema = null, ?string $procedure = null): \Odbc\Result
{
    error_clear_last();
    if ($procedure !== null) {
        $safeResult = \odbc_procedures($odbc, $catalog, $schema, $procedure);
    } elseif ($schema !== null) {
        $safeResult = \odbc_procedures($odbc, $catalog, $schema);
    } elseif ($catalog !== null) {
        $safeResult = \odbc_procedures($odbc, $catalog);
    } else {
        $safeResult = \odbc_procedures($odbc);
    }
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Prints all rows from a result object produced by
 * odbc_exec. The result is printed in HTML table format.
 * The data is not escaped.
 *
 * This function is not supposed to be used in production environments; it is
 * merely meant for development purposes, to get a result set quickly rendered.
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param string $format Additional overall table formatting.
 * @return int Returns the number of rows in the result.
 * @throws UodbcException
 *
 */
function odbc_result_all(\Odbc\Result $statement, string $format = ""): int
{
    error_clear_last();
    $safeResult = \odbc_result_all($statement, $format);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get result data
 *
 * @param \Odbc\Result $statement The ODBC result object.
 * @param mixed $field The field name being retrieved. It can either be an integer containing
 * the column number of the field you want; or it can be a string
 * containing the name of the field.
 * @return mixed Returns the string contents of the field, FALSE on error, NULL for
 * NULL data, or TRUE for binary data.
 * @throws UodbcException
 *
 */
function odbc_result(\Odbc\Result $statement, $field)
{
    error_clear_last();
    $safeResult = \odbc_result($statement, $field);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Rolls back all pending statements on the connection.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @throws UodbcException
 *
 */
function odbc_rollback(\Odbc\Connection $odbc): void
{
    error_clear_last();
    $safeResult = \odbc_rollback($odbc);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * This function allows fiddling with the ODBC options for a
 * particular connection or query result.  It was written to help
 * find work around to problems in quirky ODBC drivers.  You should
 * probably only use this function if you are an ODBC programmer and
 * understand the effects the various options will have.  You will
 * certainly need a good ODBC reference to explain all the different
 * options and values that can be used.  Different driver versions
 * support different options.
 *
 * Because the effects may vary depending on the ODBC driver, use of
 * this function in scripts to be made publicly available is
 * strongly discouraged.  Also, some ODBC options are not available
 * to this function because they must be set before the connection
 * is established or the query is prepared.  However, if on a
 * particular job it can make PHP work so your boss doesn't tell you
 * to use a commercial product, that's all that really
 * matters.
 *
 * @param \Odbc\Connection|\Odbc\Result $odbc Is a connection id or result id on which to change the settings.
 * For SQLSetConnectOption(), this is a connection id.
 * For SQLSetStmtOption(), this is a result id.
 * @param int $which Is the ODBC function to use. The value should be
 * 1 for SQLSetConnectOption() and
 * 2 for SQLSetStmtOption().
 * @param int $option The option to set.
 * @param int $value The value for the given option.
 * @throws UodbcException
 *
 */
function odbc_setoption($odbc, int $which, int $option, int $value): void
{
    error_clear_last();
    $safeResult = \odbc_setoption($odbc, $which, $option, $value);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * Retrieves either the optimal set of columns that uniquely identifies a
 * row in the table, or columns that are automatically updated when any
 * value in the row is updated by a transaction.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param int $type
 * @param string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param string $schema The schema ('owner' in ODBC 2 parlance).
 * @param string $table The table.
 * @param int $scope The scope, which orders the result set.
 * One of SQL_SCOPE_CURROW, SQL_SCOPE_TRANSACTION
 * or SQL_SCOPE_SESSION.
 * @param int $nullable Determines whether to return special columns that can have a NULL value.
 * One of SQL_NO_NULLS or SQL_NULLABLE.
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * SCOPE
 * COLUMN_NAME
 * DATA_TYPE
 * TYPE_NAME
 * COLUMN_SIZE
 * BUFFER_LENGTH
 * DECIMAL_DIGITS
 * PSEUDO_COLUMN
 *
 * Drivers can report additional columns.
 *
 */
function odbc_specialcolumns(\Odbc\Connection $odbc, int $type, string $catalog, string $schema, string $table, int $scope, int $nullable)
{
    error_clear_last();
    $safeResult = \odbc_specialcolumns($odbc, $type, $catalog, $schema, $table, $scope, $nullable);
    return $safeResult;
}


/**
 * Get statistics about a table and its indexes.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param string $schema The schema ('owner' in ODBC 2 parlance).
 * @param string $table The table name.
 * @param int $unique The type of the index.
 * One of SQL_INDEX_UNIQUE or SQL_INDEX_ALL.
 * @param int $accuracy One of SQL_ENSURE or SQL_QUICK.
 * The latter requests that the driver retrieve the CARDINALITY and
 * PAGES only if they are readily available from the server.
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * TABLE_CAT
 * TABLE_SCHEM
 * TABLE_NAME
 * NON_UNIQUE
 * INDEX_QUALIFIER
 * INDEX_NAME
 * TYPE
 * ORDINAL_POSITION
 * COLUMN_NAME
 * ASC_OR_DESC
 * CARDINALITY
 * PAGES
 * FILTER_CONDITION
 *
 * Drivers can report additional columns.
 *
 */
function odbc_statistics(\Odbc\Connection $odbc, string $catalog, string $schema, string $table, int $unique, int $accuracy)
{
    error_clear_last();
    $safeResult = \odbc_statistics($odbc, $catalog, $schema, $table, $unique, $accuracy);
    return $safeResult;
}


/**
 * Lists tables in the requested range and the privileges associated
 * with each table.
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param string $schema The schema ('owner' in ODBC 2 parlance).
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param string $table The name.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @return \Odbc\Result|false Returns an ODBC result object or FALSE on failure.
 *
 * The result set has the following columns:
 *
 * TABLE_CAT
 * TABLE_SCHEM
 * TABLE_NAME
 * GRANTOR
 * GRANTEE
 * PRIVILEGE
 * IS_GRANTABLE
 *
 * Drivers can report additional columns.
 *
 */
function odbc_tableprivileges(\Odbc\Connection $odbc, string $catalog, string $schema, string $table)
{
    error_clear_last();
    $safeResult = \odbc_tableprivileges($odbc, $catalog, $schema, $table);
    return $safeResult;
}


/**
 * Lists all tables in the requested range.
 *
 * To support enumeration of qualifiers, owners, and table types,
 * the following special semantics for the
 * catalog, schema,
 * table, and
 * table_type are available:
 *
 *
 *
 * If catalog is a single percent
 * character (%) and schema and
 * table are empty strings, then the result
 * set contains a list of valid qualifiers for the data
 * source. (All columns except the TABLE_QUALIFIER column contain
 * NULLs.)
 *
 *
 *
 *
 * If schema is a single percent character
 * (%) and catalog and
 * table are empty strings, then the result
 * set contains a list of valid owners for the data source. (All
 * columns except the TABLE_OWNER column contain
 * NULLs.)
 *
 *
 *
 *
 * If table_type is a single percent
 * character (%) and catalog,
 * schema and table
 * are empty strings, then the result set contains a list of
 * valid table types for the data source. (All columns except the
 * TABLE_TYPE column contain NULLs.)
 *
 *
 *
 *
 * @param \Odbc\Connection $odbc The ODBC connection object,
 * see odbc_connect for details.
 * @param null|string $catalog The catalog ('qualifier' in ODBC 2 parlance).
 * @param null|string $schema The schema ('owner' in ODBC 2 parlance).
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param null|string $table The name.
 * This parameter accepts the following search patterns:
 * % to match zero or more characters,
 * and _ to match a single character.
 * @param null|string $types If table_type is not an empty string, it
 * must contain a list of comma-separated values for the types of
 * interest; each value may be enclosed in single quotes (') or
 * unquoted. For example, 'TABLE','VIEW' or TABLE, VIEW.  If the
 * data source does not support a specified table type,
 * odbc_tables does not return any results for
 * that type.
 * @return \Odbc\Result Returns an ODBC result object containing the information.
 *
 * The result set has the following columns:
 *
 * TABLE_CAT
 * TABLE_SCHEM
 * TABLE_NAME
 * TABLE_TYPE
 * REMARKS
 *
 * Drivers can report additional columns.
 * @throws UodbcException
 *
 */
function odbc_tables(\Odbc\Connection $odbc, ?string $catalog = null, ?string $schema = null, ?string $table = null, ?string $types = null): \Odbc\Result
{
    error_clear_last();
    if ($types !== null) {
        $safeResult = \odbc_tables($odbc, $catalog, $schema, $table, $types);
    } elseif ($table !== null) {
        $safeResult = \odbc_tables($odbc, $catalog, $schema, $table);
    } elseif ($schema !== null) {
        $safeResult = \odbc_tables($odbc, $catalog, $schema);
    } elseif ($catalog !== null) {
        $safeResult = \odbc_tables($odbc, $catalog);
    } else {
        $safeResult = \odbc_tables($odbc);
    }
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}
