<?php

namespace Safe;

use Safe\Exceptions\PgsqlException;

/**
 * @param \PgSql\Connection $connection
 * @throws PgsqlException
 *
 */
function pg_cancel_query(\PgSql\Connection $connection): void
{
    error_clear_last();
    $safeResult = \pg_cancel_query($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param string $connection_string
 * @param int $flags
 * @return \PgSql\Connection
 * @throws PgsqlException
 *
 */
function pg_connect(string $connection_string, int $flags = 0): \PgSql\Connection
{
    error_clear_last();
    $safeResult = \pg_connect($connection_string, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection $connection
 * @throws PgsqlException
 *
 */
function pg_connection_reset(\PgSql\Connection $connection): void
{
    error_clear_last();
    $safeResult = \pg_connection_reset($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param array $values
 * @param int $flags
 * @return array
 * @throws PgsqlException
 *
 */
function pg_convert(\PgSql\Connection $connection, string $table_name, array $values, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \pg_convert($connection, $table_name, $values, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param array $rows
 * @param string $separator
 * @param string $null_as
 * @throws PgsqlException
 *
 */
function pg_copy_from(\PgSql\Connection $connection, string $table_name, array $rows, string $separator = "\t", string $null_as = "\\\\N"): void
{
    error_clear_last();
    $safeResult = \pg_copy_from($connection, $table_name, $rows, $separator, $null_as);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param string $separator
 * @param string $null_as
 * @return array
 * @throws PgsqlException
 *
 */
function pg_copy_to(\PgSql\Connection $connection, string $table_name, string $separator = "\t", string $null_as = "\\\\N"): array
{
    error_clear_last();
    $safeResult = \pg_copy_to($connection, $table_name, $separator, $null_as);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param array $conditions
 * @param int $flags
 * @return mixed
 * @throws PgsqlException
 *
 */
function pg_delete(\PgSql\Connection $connection, string $table_name, array $conditions, int $flags = PGSQL_DML_EXEC)
{
    error_clear_last();
    $safeResult = \pg_delete($connection, $table_name, $conditions, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection|null $connection
 * @throws PgsqlException
 *
 */
function pg_end_copy(?\PgSql\Connection $connection = null): void
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
 * @param \PgSql\Connection $connection
 * @param string $stmtname
 * @param array $params
 * @return \PgSql\Result
 * @throws PgsqlException
 *
 */
function pg_execute(?\PgSql\Connection $connection = null, ?string $stmtname = null, ?array $params = null): \PgSql\Result
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
 * @param \PgSql\Result $result
 * @param string $field
 * @return int
 * @throws PgsqlException
 *
 */
function pg_field_num(\PgSql\Result $result, string $field): int
{
    error_clear_last();
    $safeResult = \pg_field_num($result, $field);
    if ($safeResult === -1) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Result $result
 * @param int $field
 * @param bool $oid_only
 * @return mixed
 * @throws PgsqlException
 *
 */
function pg_field_table(\PgSql\Result $result, int $field, bool $oid_only = false)
{
    error_clear_last();
    $safeResult = \pg_field_table($result, $field, $oid_only);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection $connection
 * @return mixed
 * @throws PgsqlException
 *
 */
function pg_flush(\PgSql\Connection $connection)
{
    error_clear_last();
    $safeResult = \pg_flush($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Result $result
 * @throws PgsqlException
 *
 */
function pg_free_result(\PgSql\Result $result): void
{
    error_clear_last();
    $safeResult = \pg_free_result($result);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Connection|null $connection
 * @return string
 * @throws PgsqlException
 *
 */
function pg_host(?\PgSql\Connection $connection = null): string
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
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param array $values
 * @param int $flags
 * @return mixed
 * @throws PgsqlException
 *
 */
function pg_insert(\PgSql\Connection $connection, string $table_name, array $values, int $flags = PGSQL_DML_EXEC)
{
    error_clear_last();
    $safeResult = \pg_insert($connection, $table_name, $values, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Result $result
 * @return string
 * @throws PgsqlException
 *
 */
function pg_last_oid(\PgSql\Result $result): string
{
    error_clear_last();
    $safeResult = \pg_last_oid($result);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Lob $lob
 * @throws PgsqlException
 *
 */
function pg_lo_close(\PgSql\Lob $lob): void
{
    error_clear_last();
    $safeResult = \pg_lo_close($lob);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Connection $connection
 * @param int $oid
 * @param string $pathname
 * @throws PgsqlException
 *
 */
function pg_lo_export(?\PgSql\Connection $connection = null, ?int $oid = null, ?string $pathname = null): void
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
 * @param \PgSql\Connection $connection
 * @param string $pathname
 * @param  $object_id
 * @return int
 * @throws PgsqlException
 *
 */
function pg_lo_import(?\PgSql\Connection $connection = null, ?string $pathname = null, $object_id = null): int
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
 * @param \PgSql\Connection $connection
 * @param int $oid
 * @param string $mode
 * @return \PgSql\Lob
 * @throws PgsqlException
 *
 */
function pg_lo_open(\PgSql\Connection $connection, int $oid, string $mode): \PgSql\Lob
{
    error_clear_last();
    $safeResult = \pg_lo_open($connection, $oid, $mode);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Lob $lob
 * @param int $length
 * @return string
 * @throws PgsqlException
 *
 */
function pg_lo_read(\PgSql\Lob $lob, int $length = 8192): string
{
    error_clear_last();
    $safeResult = \pg_lo_read($lob, $length);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Lob $lob
 * @param int $offset
 * @param int $whence
 * @throws PgsqlException
 *
 */
function pg_lo_seek(\PgSql\Lob $lob, int $offset, int $whence = SEEK_CUR): void
{
    error_clear_last();
    $safeResult = \pg_lo_seek($lob, $offset, $whence);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Lob $lob
 * @param int $size
 * @throws PgsqlException
 *
 */
function pg_lo_truncate(\PgSql\Lob $lob, int $size): void
{
    error_clear_last();
    $safeResult = \pg_lo_truncate($lob, $size);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Connection $connection
 * @param int $oid
 * @throws PgsqlException
 *
 */
function pg_lo_unlink(\PgSql\Connection $connection, int $oid): void
{
    error_clear_last();
    $safeResult = \pg_lo_unlink($connection, $oid);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Lob $lob
 * @param string $data
 * @param int|null $length
 * @return int
 * @throws PgsqlException
 *
 */
function pg_lo_write(\PgSql\Lob $lob, string $data, ?int $length = null): int
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
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param bool $extended
 * @return array
 * @throws PgsqlException
 *
 */
function pg_meta_data(\PgSql\Connection $connection, string $table_name, bool $extended = false): array
{
    error_clear_last();
    $safeResult = \pg_meta_data($connection, $table_name, $extended);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection $connection
 * @param string $param_name
 * @return string
 * @throws PgsqlException
 *
 */
function pg_parameter_status(?\PgSql\Connection $connection = null, ?string $param_name = null): string
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
 * @param string $connection_string
 * @param int $flags
 * @return \PgSql\Connection
 * @throws PgsqlException
 *
 */
function pg_pconnect(string $connection_string, int $flags = 0): \PgSql\Connection
{
    error_clear_last();
    $safeResult = \pg_pconnect($connection_string, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection|null $connection
 * @throws PgsqlException
 *
 */
function pg_ping(?\PgSql\Connection $connection = null): void
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
 * @param \PgSql\Connection $connection
 * @param string $stmtname
 * @param string $query
 * @return \PgSql\Result
 * @throws PgsqlException
 *
 */
function pg_prepare(?\PgSql\Connection $connection = null, ?string $stmtname = null, ?string $query = null): \PgSql\Result
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
 * @param \PgSql\Connection $connection
 * @param string $data
 * @throws PgsqlException
 *
 */
function pg_put_line(?\PgSql\Connection $connection = null, ?string $data = null): void
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
 * @param \PgSql\Connection $connection
 * @param string $query
 * @param array $params
 * @return \PgSql\Result
 * @throws PgsqlException
 *
 */
function pg_query_params(?\PgSql\Connection $connection = null, ?string $query = null, ?array $params = null): \PgSql\Result
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
 * @param \PgSql\Connection $connection
 * @param string $query
 * @return \PgSql\Result
 * @throws PgsqlException
 *
 */
function pg_query(?\PgSql\Connection $connection = null, ?string $query = null): \PgSql\Result
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
 * @param \PgSql\Result $result
 * @param int $field_code
 * @return null|string
 * @throws PgsqlException
 *
 */
function pg_result_error_field(\PgSql\Result $result, int $field_code): ?string
{
    error_clear_last();
    $safeResult = \pg_result_error_field($result, $field_code);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Result $result
 * @param int $row
 * @throws PgsqlException
 *
 */
function pg_result_seek(\PgSql\Result $result, int $row): void
{
    error_clear_last();
    $safeResult = \pg_result_seek($result, $row);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
}


/**
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param array $conditions
 * @param int $flags
 * @param int $mode
 * @return mixed
 * @throws PgsqlException
 *
 */
function pg_select(\PgSql\Connection $connection, string $table_name, array $conditions, int $flags = PGSQL_DML_EXEC, int $mode = PGSQL_ASSOC)
{
    error_clear_last();
    $safeResult = \pg_select($connection, $table_name, $conditions, $flags, $mode);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \PgSql\Connection $connection
 * @return resource
 * @throws PgsqlException
 *
 */
function pg_socket(\PgSql\Connection $connection)
{
    error_clear_last();
    $safeResult = \pg_socket($connection);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param string $mode
 * @param \PgSql\Connection|null $connection
 * @throws PgsqlException
 *
 */
function pg_trace(string $filename, string $mode = "w", ?\PgSql\Connection $connection = null): void
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
 * @param \PgSql\Connection $connection
 * @param string $table_name
 * @param array $values
 * @param array $conditions
 * @param int $flags
 * @return mixed
 * @throws PgsqlException
 *
 */
function pg_update(\PgSql\Connection $connection, string $table_name, array $values, array $conditions, int $flags = PGSQL_DML_EXEC)
{
    error_clear_last();
    $safeResult = \pg_update($connection, $table_name, $values, $conditions, $flags);
    if ($safeResult === false) {
        throw PgsqlException::createFromPhpError();
    }
    return $safeResult;
}
