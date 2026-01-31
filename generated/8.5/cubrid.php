<?php

namespace Safe;

use Safe\Exceptions\CubridException;

/**
 * @param resource $req_identifier
 * @param int $bind_index
 * @param mixed $bind_value
 * @param string $bind_value_type
 * @throws CubridException
 *
 */
function cubrid_bind($req_identifier, int $bind_index, $bind_value, ?string $bind_value_type = null): void
{
    error_clear_last();
    if ($bind_value_type !== null) {
        $safeResult = \cubrid_bind($req_identifier, $bind_index, $bind_value, $bind_value_type);
    } else {
        $safeResult = \cubrid_bind($req_identifier, $bind_index, $bind_value);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @return int
 * @throws CubridException
 *
 */
function cubrid_col_size($conn_identifier, string $oid, string $attr_name): int
{
    error_clear_last();
    $safeResult = \cubrid_col_size($conn_identifier, $oid, $attr_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $req_identifier
 * @return array
 * @throws CubridException
 *
 */
function cubrid_column_names($req_identifier): array
{
    error_clear_last();
    $safeResult = \cubrid_column_names($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $req_identifier
 * @return array
 * @throws CubridException
 *
 */
function cubrid_column_types($req_identifier): array
{
    error_clear_last();
    $safeResult = \cubrid_column_types($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @throws CubridException
 *
 */
function cubrid_commit($conn_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_commit($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param string $conn_url
 * @param string $userid
 * @param string $passwd
 * @param bool $new_link
 * @return resource
 * @throws CubridException
 *
 */
function cubrid_connect_with_url(string $conn_url, ?string $userid = null, ?string $passwd = null, bool $new_link = false)
{
    error_clear_last();
    if ($new_link !== false) {
        $safeResult = \cubrid_connect_with_url($conn_url, $userid, $passwd, $new_link);
    } elseif ($passwd !== null) {
        $safeResult = \cubrid_connect_with_url($conn_url, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_connect_with_url($conn_url, $userid);
    } else {
        $safeResult = \cubrid_connect_with_url($conn_url);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $host
 * @param int $port
 * @param string $dbname
 * @param string $userid
 * @param string $passwd
 * @param bool $new_link
 * @return resource
 * @throws CubridException
 *
 */
function cubrid_connect(string $host, int $port, string $dbname, ?string $userid = null, ?string $passwd = null, bool $new_link = false)
{
    error_clear_last();
    if ($new_link !== false) {
        $safeResult = \cubrid_connect($host, $port, $dbname, $userid, $passwd, $new_link);
    } elseif ($passwd !== null) {
        $safeResult = \cubrid_connect($host, $port, $dbname, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_connect($host, $port, $dbname, $userid);
    } else {
        $safeResult = \cubrid_connect($host, $port, $dbname);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $req_identifier
 * @return string
 * @throws CubridException
 *
 */
function cubrid_current_oid($req_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_current_oid($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @throws CubridException
 *
 */
function cubrid_disconnect($conn_identifier = null): void
{
    error_clear_last();
    if ($conn_identifier !== null) {
        $safeResult = \cubrid_disconnect($conn_identifier);
    } else {
        $safeResult = \cubrid_disconnect();
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @throws CubridException
 *
 */
function cubrid_drop($conn_identifier, string $oid): void
{
    error_clear_last();
    $safeResult = \cubrid_drop($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $req_identifier
 * @throws CubridException
 *
 */
function cubrid_free_result($req_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_free_result($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @return string
 * @throws CubridException
 *
 */
function cubrid_get_charset($conn_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_get_charset($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @return string
 * @throws CubridException
 *
 */
function cubrid_get_class_name($conn_identifier, string $oid): string
{
    error_clear_last();
    $safeResult = \cubrid_get_class_name($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return string
 * @throws CubridException
 *
 */
function cubrid_get_client_info(): string
{
    error_clear_last();
    $safeResult = \cubrid_get_client_info();
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @return array
 * @throws CubridException
 *
 */
function cubrid_get_db_parameter($conn_identifier): array
{
    error_clear_last();
    $safeResult = \cubrid_get_db_parameter($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $req_identifier
 * @return int
 * @throws CubridException
 *
 */
function cubrid_get_query_timeout($req_identifier): int
{
    error_clear_last();
    $safeResult = \cubrid_get_query_timeout($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @return string
 * @throws CubridException
 *
 */
function cubrid_get_server_info($conn_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_get_server_info($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @return string
 * @throws CubridException
 *
 */
function cubrid_insert_id($conn_identifier = null): string
{
    error_clear_last();
    if ($conn_identifier !== null) {
        $safeResult = \cubrid_insert_id($conn_identifier);
    } else {
        $safeResult = \cubrid_insert_id();
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param array $lob_identifier_array
 * @throws CubridException
 *
 */
function cubrid_lob_close(array $lob_identifier_array): void
{
    error_clear_last();
    $safeResult = \cubrid_lob_close($lob_identifier_array);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param resource $lob_identifier
 * @param string $path_name
 * @throws CubridException
 *
 */
function cubrid_lob_export($conn_identifier, $lob_identifier, string $path_name): void
{
    error_clear_last();
    $safeResult = \cubrid_lob_export($conn_identifier, $lob_identifier, $path_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $sql
 * @return array
 * @throws CubridException
 *
 */
function cubrid_lob_get($conn_identifier, string $sql): array
{
    error_clear_last();
    $safeResult = \cubrid_lob_get($conn_identifier, $sql);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @param resource $lob_identifier
 * @throws CubridException
 *
 */
function cubrid_lob_send($conn_identifier, $lob_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_lob_send($conn_identifier, $lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $lob_identifier
 * @return string
 * @throws CubridException
 *
 */
function cubrid_lob_size($lob_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_lob_size($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $req_identifier
 * @param int $bind_index
 * @param mixed $bind_value
 * @param string $bind_value_type
 * @throws CubridException
 *
 */
function cubrid_lob2_bind($req_identifier, int $bind_index, $bind_value, ?string $bind_value_type = null): void
{
    error_clear_last();
    if ($bind_value_type !== null) {
        $safeResult = \cubrid_lob2_bind($req_identifier, $bind_index, $bind_value, $bind_value_type);
    } else {
        $safeResult = \cubrid_lob2_bind($req_identifier, $bind_index, $bind_value);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $lob_identifier
 * @throws CubridException
 *
 */
function cubrid_lob2_close($lob_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_close($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $lob_identifier
 * @param string $file_name
 * @throws CubridException
 *
 */
function cubrid_lob2_export($lob_identifier, string $file_name): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_export($lob_identifier, $file_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $lob_identifier
 * @param string $file_name
 * @throws CubridException
 *
 */
function cubrid_lob2_import($lob_identifier, string $file_name): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_import($lob_identifier, $file_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $type
 * @return resource
 * @throws CubridException
 *
 */
function cubrid_lob2_new($conn_identifier = null, string $type = "BLOB")
{
    error_clear_last();
    if ($type !== "BLOB") {
        $safeResult = \cubrid_lob2_new($conn_identifier, $type);
    } elseif ($conn_identifier !== null) {
        $safeResult = \cubrid_lob2_new($conn_identifier);
    } else {
        $safeResult = \cubrid_lob2_new();
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $lob_identifier
 * @param int $len
 * @return string
 * @throws CubridException
 *
 */
function cubrid_lob2_read($lob_identifier, int $len): string
{
    error_clear_last();
    $safeResult = \cubrid_lob2_read($lob_identifier, $len);
    if ($safeResult === null) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $lob_identifier
 * @param int $offset
 * @param int $origin
 * @throws CubridException
 *
 */
function cubrid_lob2_seek($lob_identifier, int $offset, int $origin = CUBRID_CURSOR_CURRENT): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_seek($lob_identifier, $offset, $origin);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $lob_identifier
 * @param string $offset
 * @param int $origin
 * @throws CubridException
 *
 */
function cubrid_lob2_seek64($lob_identifier, string $offset, int $origin = CUBRID_CURSOR_CURRENT): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_seek64($lob_identifier, $offset, $origin);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $lob_identifier
 * @return int
 * @throws CubridException
 *
 */
function cubrid_lob2_size($lob_identifier): int
{
    error_clear_last();
    $safeResult = \cubrid_lob2_size($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $lob_identifier
 * @return string
 * @throws CubridException
 *
 */
function cubrid_lob2_size64($lob_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_lob2_size64($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $lob_identifier
 * @return int
 * @throws CubridException
 *
 */
function cubrid_lob2_tell($lob_identifier): int
{
    error_clear_last();
    $safeResult = \cubrid_lob2_tell($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $lob_identifier
 * @return string
 * @throws CubridException
 *
 */
function cubrid_lob2_tell64($lob_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_lob2_tell64($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $lob_identifier
 * @param string $buf
 * @throws CubridException
 *
 */
function cubrid_lob2_write($lob_identifier, string $buf): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_write($lob_identifier, $buf);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @throws CubridException
 *
 */
function cubrid_lock_read($conn_identifier, string $oid): void
{
    error_clear_last();
    $safeResult = \cubrid_lock_read($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @throws CubridException
 *
 */
function cubrid_lock_write($conn_identifier, string $oid): void
{
    error_clear_last();
    $safeResult = \cubrid_lock_write($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $req_identifier
 * @param int $offset
 * @param int $origin
 * @return int
 * @throws CubridException
 *
 */
function cubrid_move_cursor($req_identifier, int $offset, int $origin = CUBRID_CURSOR_CURRENT): int
{
    error_clear_last();
    $safeResult = \cubrid_move_cursor($req_identifier, $offset, $origin);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @throws CubridException
 *
 */
function cubrid_next_result($result): void
{
    error_clear_last();
    $safeResult = \cubrid_next_result($result);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param string $conn_url
 * @param string $userid
 * @param string $passwd
 * @return resource
 * @throws CubridException
 *
 */
function cubrid_pconnect_with_url(string $conn_url, ?string $userid = null, ?string $passwd = null)
{
    error_clear_last();
    if ($passwd !== null) {
        $safeResult = \cubrid_pconnect_with_url($conn_url, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_pconnect_with_url($conn_url, $userid);
    } else {
        $safeResult = \cubrid_pconnect_with_url($conn_url);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $host
 * @param int $port
 * @param string $dbname
 * @param string $userid
 * @param string $passwd
 * @return resource
 * @throws CubridException
 *
 */
function cubrid_pconnect(string $host, int $port, string $dbname, ?string $userid = null, ?string $passwd = null)
{
    error_clear_last();
    if ($passwd !== null) {
        $safeResult = \cubrid_pconnect($host, $port, $dbname, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_pconnect($host, $port, $dbname, $userid);
    } else {
        $safeResult = \cubrid_pconnect($host, $port, $dbname);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @param string $prepare_stmt
 * @param int $option
 * @return resource
 * @throws CubridException
 *
 */
function cubrid_prepare($conn_identifier, string $prepare_stmt, int $option = 0)
{
    error_clear_last();
    $safeResult = \cubrid_prepare($conn_identifier, $prepare_stmt, $option);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr
 * @param mixed $value
 * @throws CubridException
 *
 */
function cubrid_put($conn_identifier, string $oid, ?string $attr = null, $value = null): void
{
    error_clear_last();
    if ($value !== null) {
        $safeResult = \cubrid_put($conn_identifier, $oid, $attr, $value);
    } elseif ($attr !== null) {
        $safeResult = \cubrid_put($conn_identifier, $oid, $attr);
    } else {
        $safeResult = \cubrid_put($conn_identifier, $oid);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @throws CubridException
 *
 */
function cubrid_rollback($conn_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_rollback($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param int $schema_type
 * @param string $class_name
 * @param string $attr_name
 * @return array
 * @throws CubridException
 *
 */
function cubrid_schema($conn_identifier, int $schema_type, ?string $class_name = null, ?string $attr_name = null): array
{
    error_clear_last();
    if ($attr_name !== null) {
        $safeResult = \cubrid_schema($conn_identifier, $schema_type, $class_name, $attr_name);
    } elseif ($class_name !== null) {
        $safeResult = \cubrid_schema($conn_identifier, $schema_type, $class_name);
    } else {
        $safeResult = \cubrid_schema($conn_identifier, $schema_type);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param int $index
 * @throws CubridException
 *
 */
function cubrid_seq_drop($conn_identifier, string $oid, string $attr_name, int $index): void
{
    error_clear_last();
    $safeResult = \cubrid_seq_drop($conn_identifier, $oid, $attr_name, $index);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param int $index
 * @param string $seq_element
 * @throws CubridException
 *
 */
function cubrid_seq_insert($conn_identifier, string $oid, string $attr_name, int $index, string $seq_element): void
{
    error_clear_last();
    $safeResult = \cubrid_seq_insert($conn_identifier, $oid, $attr_name, $index, $seq_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param int $index
 * @param string $seq_element
 * @throws CubridException
 *
 */
function cubrid_seq_put($conn_identifier, string $oid, string $attr_name, int $index, string $seq_element): void
{
    error_clear_last();
    $safeResult = \cubrid_seq_put($conn_identifier, $oid, $attr_name, $index, $seq_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param string $set_element
 * @throws CubridException
 *
 */
function cubrid_set_add($conn_identifier, string $oid, string $attr_name, string $set_element): void
{
    error_clear_last();
    $safeResult = \cubrid_set_add($conn_identifier, $oid, $attr_name, $set_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param bool $mode
 * @throws CubridException
 *
 */
function cubrid_set_autocommit($conn_identifier, bool $mode): void
{
    error_clear_last();
    $safeResult = \cubrid_set_autocommit($conn_identifier, $mode);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param int $param_type
 * @param int $param_value
 * @throws CubridException
 *
 */
function cubrid_set_db_parameter($conn_identifier, int $param_type, int $param_value): void
{
    error_clear_last();
    $safeResult = \cubrid_set_db_parameter($conn_identifier, $param_type, $param_value);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $conn_identifier
 * @param string $oid
 * @param string $attr_name
 * @param string $set_element
 * @throws CubridException
 *
 */
function cubrid_set_drop($conn_identifier, string $oid, string $attr_name, string $set_element): void
{
    error_clear_last();
    $safeResult = \cubrid_set_drop($conn_identifier, $oid, $attr_name, $set_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * @param resource $req_identifier
 * @param int $timeout
 * @throws CubridException
 *
 */
function cubrid_set_query_timeout($req_identifier, int $timeout): void
{
    error_clear_last();
    $safeResult = \cubrid_set_query_timeout($req_identifier, $timeout);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}
