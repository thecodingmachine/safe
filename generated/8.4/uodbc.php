<?php

namespace Safe;

use Safe\Exceptions\UodbcException;

/**
 * @param \Odbc\Connection $odbc
 * @param bool|null $enable
 * @return mixed
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
 * @param int $statement
 * @param int $mode
 * @return bool
 *
 */
function odbc_binmode(int $statement, int $mode): bool
{
    error_clear_last();
    $safeResult = \odbc_binmode($statement, $mode);
    return $safeResult;
}


/**
 * @param \Odbc\Connection $odbc
 * @param string $catalog
 * @param string $schema
 * @param string $table
 * @param string $column
 * @return \Odbc\Result|false
 *
 */
function odbc_columnprivileges(\Odbc\Connection $odbc, string $catalog, string $schema, string $table, string $column)
{
    error_clear_last();
    $safeResult = \odbc_columnprivileges($odbc, $catalog, $schema, $table, $column);
    return $safeResult;
}


/**
 * @param \Odbc\Connection $odbc
 * @param null|string $catalog
 * @param null|string $schema
 * @param null|string $table
 * @param null|string $column
 * @return \Odbc\Result|false
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
 * @param \Odbc\Connection $odbc
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
 * @param string $dsn
 * @param string $user
 * @param string $password
 * @param int $cursor_option
 * @return \Odbc\Connection
 * @throws UodbcException
 *
 */
function odbc_connect(string $dsn, string $user, string $password, int $cursor_option = SQL_CUR_USE_DRIVER): \Odbc\Connection
{
    error_clear_last();
    $safeResult = \odbc_connect($dsn, $user, $password, $cursor_option);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Odbc\Result $statement
 * @return string
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
 * @param \Odbc\Connection $odbc
 * @param int $fetch_type
 * @return array
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
 * @param \Odbc\Connection $odbc
 * @param string $query
 * @return \Odbc\Result
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
 * @param \Odbc\Result $statement
 * @param array $params
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
 * @param \Odbc\Result $statement
 * @param array|null $array
 * @param int|null $row
 * @return int
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
 * @param \Odbc\Result $statement
 * @param int $field
 * @return int
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
 * @param \Odbc\Result $statement
 * @param int $field
 * @return string
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
 * @param \Odbc\Result $statement
 * @param string $field
 * @return int
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
 * @param \Odbc\Result $statement
 * @param int $field
 * @return int
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
 * @param \Odbc\Result $statement
 * @param int $field
 * @return string
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
 * @param \Odbc\Connection $odbc
 * @param string $pk_catalog
 * @param string $pk_schema
 * @param string $pk_table
 * @param string $fk_catalog
 * @param string $fk_schema
 * @param string $fk_table
 * @return \Odbc\Result|false
 *
 */
function odbc_foreignkeys(\Odbc\Connection $odbc, string $pk_catalog, string $pk_schema, string $pk_table, string $fk_catalog, string $fk_schema, string $fk_table)
{
    error_clear_last();
    $safeResult = \odbc_foreignkeys($odbc, $pk_catalog, $pk_schema, $pk_table, $fk_catalog, $fk_schema, $fk_table);
    return $safeResult;
}


/**
 * @param \Odbc\Connection $odbc
 * @param int $data_type
 * @return \Odbc\Result|false
 *
 */
function odbc_gettypeinfo(\Odbc\Connection $odbc, int $data_type = 0)
{
    error_clear_last();
    $safeResult = \odbc_gettypeinfo($odbc, $data_type);
    return $safeResult;
}


/**
 * @param \Odbc\Result $statement
 * @param int $length
 * @return bool
 *
 */
function odbc_longreadlen(\Odbc\Result $statement, int $length): bool
{
    error_clear_last();
    $safeResult = \odbc_longreadlen($statement, $length);
    return $safeResult;
}


/**
 * @param \Odbc\Result $statement
 * @return int
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
 * @param string $dsn
 * @param string $user
 * @param string $password
 * @param int $cursor_option
 * @return \Odbc\Connection
 * @throws UodbcException
 *
 */
function odbc_pconnect(string $dsn, string $user, string $password, int $cursor_option = SQL_CUR_USE_DRIVER): \Odbc\Connection
{
    error_clear_last();
    $safeResult = \odbc_pconnect($dsn, $user, $password, $cursor_option);
    if ($safeResult === false) {
        throw UodbcException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \Odbc\Connection $odbc
 * @param string $query
 * @return \Odbc\Result
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
 * @param \Odbc\Connection $odbc
 * @param string $catalog
 * @param string $schema
 * @param string $table
 * @return \Odbc\Result|false
 *
 */
function odbc_primarykeys(\Odbc\Connection $odbc, string $catalog, string $schema, string $table)
{
    error_clear_last();
    $safeResult = \odbc_primarykeys($odbc, $catalog, $schema, $table);
    return $safeResult;
}


/**
 * @param  $odbc
 * @param null|string $catalog
 * @param null|string $schema
 * @param null|string $procedure
 * @param null|string $column
 * @return \Odbc\Result|false
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
 * @param  $odbc
 * @param null|string $catalog
 * @param null|string $schema
 * @param null|string $procedure
 * @return \Odbc\Result
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
 * @param \Odbc\Result $statement
 * @param string $format
 * @return int
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
 * @param \Odbc\Result $statement
 * @param mixed $field
 * @return mixed
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
 * @param \Odbc\Connection $odbc
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
 * @param \Odbc\Connection|\Odbc\Result $odbc
 * @param int $which
 * @param int $option
 * @param int $value
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
 * @param \Odbc\Connection $odbc
 * @param int $type
 * @param string $catalog
 * @param string $schema
 * @param string $table
 * @param int $scope
 * @param int $nullable
 * @return \Odbc\Result|false
 *
 */
function odbc_specialcolumns(\Odbc\Connection $odbc, int $type, string $catalog, string $schema, string $table, int $scope, int $nullable)
{
    error_clear_last();
    $safeResult = \odbc_specialcolumns($odbc, $type, $catalog, $schema, $table, $scope, $nullable);
    return $safeResult;
}


/**
 * @param \Odbc\Connection $odbc
 * @param string $catalog
 * @param string $schema
 * @param string $table
 * @param int $unique
 * @param int $accuracy
 * @return \Odbc\Result|false
 *
 */
function odbc_statistics(\Odbc\Connection $odbc, string $catalog, string $schema, string $table, int $unique, int $accuracy)
{
    error_clear_last();
    $safeResult = \odbc_statistics($odbc, $catalog, $schema, $table, $unique, $accuracy);
    return $safeResult;
}


/**
 * @param \Odbc\Connection $odbc
 * @param string $catalog
 * @param string $schema
 * @param string $table
 * @return \Odbc\Result|false
 *
 */
function odbc_tableprivileges(\Odbc\Connection $odbc, string $catalog, string $schema, string $table)
{
    error_clear_last();
    $safeResult = \odbc_tableprivileges($odbc, $catalog, $schema, $table);
    return $safeResult;
}


/**
 * @param \Odbc\Connection $odbc
 * @param null|string $catalog
 * @param null|string $schema
 * @param null|string $table
 * @param null|string $types
 * @return \Odbc\Result
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
