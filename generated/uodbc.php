<?php

namespace Safe;

use Safe\Exceptions\UodbcException;

/**
 * Toggles autocommit behaviour.
 *
 * By default, auto-commit is on for a connection.  Disabling
 * auto-commit is equivalent with starting a transaction.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param bool $OnOff If OnOff is TRUE, auto-commit is enabled, if
 * it is FALSE auto-commit is disabled.
 * @return mixed Without the OnOff parameter, this function returns
 * auto-commit status for connection_id. Non-zero is
 * returned if auto-commit is on, 0 if it is off, or FALSE if an error
 * occurs.
 *
 * If OnOff is set, this function returns TRUE on
 * success.
 * @throws UodbcException
 *
 */
function odbc_autocommit($connection_id, bool $OnOff = false)
{
    error_clear_last();
    $result = \odbc_autocommit($connection_id, $OnOff);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Enables handling of binary column data. ODBC SQL types affected are
 * BINARY, VARBINARY, and
 * LONGVARBINARY.
 *
 * When binary SQL data is converted to character C data, each byte
 * (8 bits) of source data is represented as two ASCII characters.
 * These characters are the ASCII character representation of the
 * number in its hexadecimal form. For example, a binary
 * 00000001 is converted to
 * "01" and a binary 11111111
 * is converted to "FF".
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
 *
 * @param int $result_id The result identifier.
 *
 * If result_id is 0, the
 * settings apply as default for new results.
 *
 *
 * Default for longreadlen is 4096 and
 * mode defaults to
 * ODBC_BINMODE_RETURN. Handling of binary long
 * columns is also affected by odbc_longreadlen.
 *
 *
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
 * @throws UodbcException
 *
 */
function odbc_binmode(int $result_id, int $mode): void
{
    error_clear_last();
    $result = \odbc_binmode($result_id, $mode);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * Lists columns and associated privileges for the given table.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $qualifier The qualifier.
 * @param string $owner The owner.
 * @param string $table_name The table name.
 * @param string $column_name The column name.
 * @return resource Returns an ODBC result identifier.
 * This result identifier can be used to fetch a list of columns and
 * associated privileges.
 *
 * The result set has the following columns:
 *
 * TABLE_QUALIFIER
 * TABLE_OWNER
 * TABLE_NAME
 * GRANTOR
 * GRANTEE
 * PRIVILEGE
 * IS_GRANTABLE
 *
 *
 * The result set is ordered by TABLE_QUALIFIER, TABLE_OWNER and
 * TABLE_NAME.
 * @throws UodbcException
 *
 */
function odbc_columnprivileges($connection_id, string $qualifier, string $owner, string $table_name, string $column_name)
{
    error_clear_last();
    $result = \odbc_columnprivileges($connection_id, $qualifier, $owner, $table_name, $column_name);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Lists all columns in the requested range.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $qualifier The qualifier.
 * @param string $schema The owner.
 * @param string $table_name The table name.
 * @param string $column_name The column name.
 * @return resource Returns an ODBC result identifier.
 *
 * The result set has the following columns:
 *
 * TABLE_QUALIFIER
 * TABLE_SCHEM
 * TABLE_NAME
 * COLUMN_NAME
 * DATA_TYPE
 * TYPE_NAME
 * PRECISION
 * LENGTH
 * SCALE
 * RADIX
 * NULLABLE
 * REMARKS
 *
 *
 * The result set is ordered by TABLE_QUALIFIER, TABLE_SCHEM and
 * TABLE_NAME.
 * @throws UodbcException
 *
 */
function odbc_columns($connection_id, string $qualifier = null, string $schema = null, string $table_name = null, string $column_name = null)
{
    error_clear_last();
    if ($column_name !== null) {
        $result = \odbc_columns($connection_id, $qualifier, $schema, $table_name, $column_name);
    } elseif ($table_name !== null) {
        $result = \odbc_columns($connection_id, $qualifier, $schema, $table_name);
    } elseif ($schema !== null) {
        $result = \odbc_columns($connection_id, $qualifier, $schema);
    } elseif ($qualifier !== null) {
        $result = \odbc_columns($connection_id, $qualifier);
    } else {
        $result = \odbc_columns($connection_id);
    }
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Commits all pending transactions on the connection.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @throws UodbcException
 *
 */
function odbc_commit($connection_id): void
{
    error_clear_last();
    $result = \odbc_commit($connection_id);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * This function will return the list of available DSN (after calling it
 * several times).
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param int $fetch_type The fetch_type can be one of two constant types:
 * SQL_FETCH_FIRST, SQL_FETCH_NEXT.
 * Use SQL_FETCH_FIRST the first time this function is
 * called, thereafter use the SQL_FETCH_NEXT.
 * @return array Returns FALSE on error, and an array upon success.
 * @throws UodbcException
 *
 */
function odbc_data_source($connection_id, int $fetch_type): array
{
    error_clear_last();
    $result = \odbc_data_source($connection_id, $fetch_type);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Sends an SQL statement to the database server.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $query_string The SQL statement.
 * @param int $flags This parameter is currently not used.
 * @return resource Returns an ODBC result identifier if the SQL command was executed
 * successfully.
 * @throws UodbcException
 *
 */
function odbc_exec($connection_id, string $query_string, int $flags = null)
{
    error_clear_last();
    if ($flags !== null) {
        $result = \odbc_exec($connection_id, $query_string, $flags);
    } else {
        $result = \odbc_exec($connection_id, $query_string);
    }
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Executes a statement prepared with odbc_prepare.
 *
 * @param resource $result_id The result id resource, from odbc_prepare.
 * @param array $parameters_array Parameters in parameter_array will be
 * substituted for placeholders in the prepared statement in order.
 * Elements of this array will be converted to strings by calling this
 * function.
 *
 * Any parameters in parameter_array which
 * start and end with single quotes will be taken as the name of a
 * file to read and send to the database server as the data for the
 * appropriate placeholder.
 * @throws UodbcException
 *
 */
function odbc_execute($result_id, array $parameters_array = null): void
{
    error_clear_last();
    if ($parameters_array !== null) {
        $result = \odbc_execute($result_id, $parameters_array);
    } else {
        $result = \odbc_execute($result_id);
    }
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * Fetch one result row into array.
 *
 * @param resource $result_id The result resource.
 * @param array|null $result_array The result array
 * that can be of any type since it will be converted to type
 * array. The array will contain the column values starting at array
 * index 0.
 * @param int $rownumber The row number.
 * @return int Returns the number of columns in the result;
 * FALSE on error.
 * @throws UodbcException
 *
 */
function odbc_fetch_into($result_id, ?array &$result_array, int $rownumber = null): int
{
    error_clear_last();
    if ($rownumber !== null) {
        $result = \odbc_fetch_into($result_id, $result_array, $rownumber);
    } else {
        $result = \odbc_fetch_into($result_id, $result_array);
    }
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the length of the field referenced by number in the given result
 * identifier.
 *
 * @param resource $result_id The result identifier.
 * @param int $field_number The field number. Field numbering starts at 1.
 * @return int Returns the field length.
 * @throws UodbcException
 *
 */
function odbc_field_len($result_id, int $field_number): int
{
    error_clear_last();
    $result = \odbc_field_len($result_id, $field_number);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the name of the field occupying the given column number in the given
 * result identifier.
 *
 * @param resource $result_id The result identifier.
 * @param int $field_number The field number. Field numbering starts at 1.
 * @return string Returns the field name as a string.
 * @throws UodbcException
 *
 */
function odbc_field_name($result_id, int $field_number): string
{
    error_clear_last();
    $result = \odbc_field_name($result_id, $field_number);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the number of the column slot that corresponds to the named field in
 * the given result identifier.
 *
 * @param resource $result_id The result identifier.
 * @param string $field_name The field name.
 * @return int Returns the field number as a integer.
 * Field numbering starts at 1.
 * @throws UodbcException
 *
 */
function odbc_field_num($result_id, string $field_name): int
{
    error_clear_last();
    $result = \odbc_field_num($result_id, $field_name);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the scale of the field referenced by number in the given result
 * identifier.
 *
 * @param resource $result_id The result identifier.
 * @param int $field_number The field number. Field numbering starts at 1.
 * @return int Returns the field scale as a integer.
 * @throws UodbcException
 *
 */
function odbc_field_scale($result_id, int $field_number): int
{
    error_clear_last();
    $result = \odbc_field_scale($result_id, $field_number);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the SQL type of the field referenced by number in the given result
 * identifier.
 *
 * @param resource $result_id The result identifier.
 * @param int $field_number The field number. Field numbering starts at 1.
 * @return string Returns the field type as a string.
 * @throws UodbcException
 *
 */
function odbc_field_type($result_id, int $field_number): string
{
    error_clear_last();
    $result = \odbc_field_type($result_id, $field_number);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves a list of foreign keys in the specified table or a list of
 * foreign keys in other tables that refer to the primary key in the
 * specified table
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $pk_qualifier The primary key qualifier.
 * @param string $pk_owner The primary key owner.
 * @param string $pk_table The primary key table.
 * @param string $fk_qualifier The foreign key qualifier.
 * @param string $fk_owner The foreign key owner.
 * @param string $fk_table The foreign key table.
 * @return resource Returns an ODBC result identifier.
 *
 * The result set has the following columns:
 *
 * PKTABLE_QUALIFIER
 * PKTABLE_OWNER
 * PKTABLE_NAME
 * PKCOLUMN_NAME
 * FKTABLE_QUALIFIER
 * FKTABLE_OWNER
 * FKTABLE_NAME
 * FKCOLUMN_NAME
 * KEY_SEQ
 * UPDATE_RULE
 * DELETE_RULE
 * FK_NAME
 * PK_NAME
 *
 * @throws UodbcException
 *
 */
function odbc_foreignkeys($connection_id, string $pk_qualifier, string $pk_owner, string $pk_table, string $fk_qualifier, string $fk_owner, string $fk_table)
{
    error_clear_last();
    $result = \odbc_foreignkeys($connection_id, $pk_qualifier, $pk_owner, $pk_table, $fk_qualifier, $fk_owner, $fk_table);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about data types supported by the data source.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param int $data_type The data type, which can be used to restrict the information to a
 * single data type.
 * @return resource Returns an ODBC result identifier.
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
 * @throws UodbcException
 *
 */
function odbc_gettypeinfo($connection_id, int $data_type = null)
{
    error_clear_last();
    if ($data_type !== null) {
        $result = \odbc_gettypeinfo($connection_id, $data_type);
    } else {
        $result = \odbc_gettypeinfo($connection_id);
    }
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Enables handling of LONG and LONGVARBINARY columns.
 *
 * @param resource $result_id The result identifier.
 * @param int $length The number of bytes returned to PHP is controlled by the parameter
 * length. If it is set to 0, Long column data is passed through to the
 * client.
 * @throws UodbcException
 *
 */
function odbc_longreadlen($result_id, int $length): void
{
    error_clear_last();
    $result = \odbc_longreadlen($result_id, $length);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * Prepares a statement for execution. The result identifier can be used
 * later to execute the statement with odbc_execute.
 *
 * Some databases (such as IBM DB2, MS SQL Server, and Oracle) support
 * stored procedures that accept parameters of type IN, INOUT, and OUT as
 * defined by the ODBC specification.  However, the Unified ODBC driver
 * currently only supports parameters of type IN to stored procedures.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $query_string The query string statement being prepared.
 * @return resource Returns an ODBC result identifier if the SQL command was prepared
 * successfully.
 * @throws UodbcException
 *
 */
function odbc_prepare($connection_id, string $query_string)
{
    error_clear_last();
    $result = \odbc_prepare($connection_id, $query_string);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns a result identifier that can be used to fetch the column names
 * that comprise the primary key for a table.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $qualifier
 * @param string $owner
 * @param string $table
 * @return resource Returns an ODBC result identifier.
 *
 * The result set has the following columns:
 *
 * TABLE_QUALIFIER
 * TABLE_OWNER
 * TABLE_NAME
 * COLUMN_NAME
 * KEY_SEQ
 * PK_NAME
 *
 * @throws UodbcException
 *
 */
function odbc_primarykeys($connection_id, string $qualifier, string $owner, string $table)
{
    error_clear_last();
    $result = \odbc_primarykeys($connection_id, $qualifier, $owner, $table);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Prints all rows from a result identifier produced by
 * odbc_exec. The result is printed in HTML table format.
 *
 * @param resource $result_id The result identifier.
 * @param string $format Additional overall table formatting.
 * @return int Returns the number of rows in the result.
 * @throws UodbcException
 *
 */
function odbc_result_all($result_id, string $format = null): int
{
    error_clear_last();
    if ($format !== null) {
        $result = \odbc_result_all($result_id, $format);
    } else {
        $result = \odbc_result_all($result_id);
    }
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Get result data
 *
 * @param resource $result_id The ODBC resource.
 * @param mixed $field The field name being retrieved. It can either be an integer containing
 * the column number of the field you want; or it can be a string
 * containing the name of the field.
 * @return mixed Returns the string contents of the field, FALSE on error, NULL for
 * NULL data, or TRUE for binary data.
 * @throws UodbcException
 *
 */
function odbc_result($result_id, $field)
{
    error_clear_last();
    $result = \odbc_result($result_id, $field);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Rolls back all pending statements on the connection.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @throws UodbcException
 *
 */
function odbc_rollback($connection_id): void
{
    error_clear_last();
    $result = \odbc_rollback($connection_id);
    if ($result === false) {
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
 * @param resource $id Is a connection id or result id on which to change the settings.
 * For SQLSetConnectOption(), this is a connection id.
 * For SQLSetStmtOption(), this is a result id.
 * @param int $function Is the ODBC function to use. The value should be
 * 1 for SQLSetConnectOption() and
 * 2 for SQLSetStmtOption().
 * @param int $option The option to set.
 * @param int $param The value for the given option.
 * @throws UodbcException
 *
 */
function odbc_setoption($id, int $function, int $option, int $param): void
{
    error_clear_last();
    $result = \odbc_setoption($id, $function, $option, $param);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
}


/**
 * Retrieves either the optimal set of columns that uniquely identifies a
 * row in the table, or columns that are automatically updated when any
 * value in the row is updated by a transaction.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param int $type
 * @param string $qualifier The qualifier.
 * @param string $table The table.
 * @param int $scope The scope, which orders the result set.
 * @param int $nullable The nullable option.
 * @return resource Returns an ODBC result identifier.
 *
 * The result set has the following columns:
 *
 * SCOPE
 * COLUMN_NAME
 * DATA_TYPE
 * TYPE_NAME
 * PRECISION
 * LENGTH
 * SCALE
 * PSEUDO_COLUMN
 *
 * @throws UodbcException
 *
 */
function odbc_specialcolumns($connection_id, int $type, string $qualifier, string $table, int $scope, int $nullable)
{
    error_clear_last();
    $result = \odbc_specialcolumns($connection_id, $type, $qualifier, $table, $scope, $nullable);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Get statistics about a table and its indexes.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $qualifier The qualifier.
 * @param string $owner The owner.
 * @param string $table_name The table name.
 * @param int $unique The unique attribute.
 * @param int $accuracy The accuracy.
 * @return resource Returns an ODBC result identifier.
 *
 * The result set has the following columns:
 *
 * TABLE_QUALIFIER
 * TABLE_OWNER
 * TABLE_NAME
 * NON_UNIQUE
 * INDEX_QUALIFIER
 * INDEX_NAME
 * TYPE
 * SEQ_IN_INDEX
 * COLUMN_NAME
 * COLLATION
 * CARDINALITY
 * PAGES
 * FILTER_CONDITION
 *
 * @throws UodbcException
 *
 */
function odbc_statistics($connection_id, string $qualifier, string $owner, string $table_name, int $unique, int $accuracy)
{
    error_clear_last();
    $result = \odbc_statistics($connection_id, $qualifier, $owner, $table_name, $unique, $accuracy);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Lists tables in the requested range and the privileges associated
 * with each table.
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $qualifier The qualifier.
 * @param string $owner The owner. Accepts the following search patterns:
 * ('%' to match zero or more characters and '_' to match a single character)
 * @param string $name The name. Accepts the following search patterns:
 * ('%' to match zero or more characters and '_' to match a single character)
 * @return resource An ODBC result identifier.
 *
 * The result set has the following columns:
 *
 * TABLE_QUALIFIER
 * TABLE_OWNER
 * TABLE_NAME
 * GRANTOR
 * GRANTEE
 * PRIVILEGE
 * IS_GRANTABLE
 *
 * @throws UodbcException
 *
 */
function odbc_tableprivileges($connection_id, string $qualifier, string $owner, string $name)
{
    error_clear_last();
    $result = \odbc_tableprivileges($connection_id, $qualifier, $owner, $name);
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}


/**
 * Lists all tables in the requested range.
 *
 * To support enumeration of qualifiers, owners, and table types,
 * the following special semantics for the
 * qualifier, owner,
 * name, and
 * table_type are available:
 *
 *
 *
 * If qualifier is a single percent
 * character (%) and owner and
 * name are empty strings, then the result
 * set contains a list of valid qualifiers for the data
 * source. (All columns except the TABLE_QUALIFIER column contain
 * NULLs.)
 *
 *
 *
 *
 * If owner is a single percent character
 * (%) and qualifier and
 * name are empty strings, then the result
 * set contains a list of valid owners for the data source. (All
 * columns except the TABLE_OWNER column contain
 * NULLs.)
 *
 *
 *
 *
 * If table_type is a single percent
 * character (%) and qualifier,
 * owner and name
 * are empty strings, then the result set contains a list of
 * valid table types for the data source. (All columns except the
 * TABLE_TYPE column contain NULLs.)
 *
 *
 *
 *
 * @param resource $connection_id The ODBC connection identifier,
 * see odbc_connect for details.
 * @param string $qualifier The qualifier.
 * @param string $owner The owner. Accepts search patterns ('%' to match zero or more
 * characters and '_' to match a single character).
 * @param string $name The name. Accepts search patterns ('%' to match zero or more
 * characters and '_' to match a single character).
 * @param string $types If table_type is not an empty string, it
 * must contain a list of comma-separated values for the types of
 * interest; each value may be enclosed in single quotes (') or
 * unquoted. For example, "'TABLE','VIEW'" or "TABLE, VIEW".  If the
 * data source does not support a specified table type,
 * odbc_tables does not return any results for
 * that type.
 * @return resource Returns an ODBC result identifier containing the information.
 *
 * The result set has the following columns:
 *
 * TABLE_QUALIFIER
 * TABLE_OWNER
 * TABLE_NAME
 * TABLE_TYPE
 * REMARKS
 *
 * @throws UodbcException
 *
 */
function odbc_tables($connection_id, string $qualifier = null, string $owner = null, string $name = null, string $types = null)
{
    error_clear_last();
    if ($types !== null) {
        $result = \odbc_tables($connection_id, $qualifier, $owner, $name, $types);
    } elseif ($name !== null) {
        $result = \odbc_tables($connection_id, $qualifier, $owner, $name);
    } elseif ($owner !== null) {
        $result = \odbc_tables($connection_id, $qualifier, $owner);
    } elseif ($qualifier !== null) {
        $result = \odbc_tables($connection_id, $qualifier);
    } else {
        $result = \odbc_tables($connection_id);
    }
    if ($result === false) {
        throw UodbcException::createFromPhpError();
    }
    return $result;
}
