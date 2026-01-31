<?php

namespace Safe;

use Safe\Exceptions\MysqlException;

/**
 * @param null|resource $link_identifier
 * @throws MysqlException
 *
 */
function mysql_close($link_identifier = null): void
{
    error_clear_last();
    $safeResult = \mysql_close($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param string $server
 * @param string $username
 * @param string $password
 * @param bool $new_link
 * @param int $client_flags
 * @return resource
 * @throws MysqlException
 *
 */
function mysql_connect(?string $server = null, ?string $username = null, ?string $password = null, bool $new_link = false, int $client_flags = 0)
{
    error_clear_last();
    if ($client_flags !== 0) {
        $safeResult = \mysql_connect($server, $username, $password, $new_link, $client_flags);
    } elseif ($new_link !== false) {
        $safeResult = \mysql_connect($server, $username, $password, $new_link);
    } elseif ($password !== null) {
        $safeResult = \mysql_connect($server, $username, $password);
    } elseif ($username !== null) {
        $safeResult = \mysql_connect($server, $username);
    } elseif ($server !== null) {
        $safeResult = \mysql_connect($server);
    } else {
        $safeResult = \mysql_connect();
    }
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $database_name
 * @param null|resource $link_identifier
 * @throws MysqlException
 *
 */
function mysql_create_db(string $database_name, $link_identifier = null): void
{
    error_clear_last();
    $safeResult = \mysql_create_db($database_name, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param resource $result
 * @param int $row_number
 * @throws MysqlException
 *
 */
function mysql_data_seek($result, int $row_number): void
{
    error_clear_last();
    $safeResult = \mysql_data_seek($result, $row_number);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param resource $result
 * @param int $row
 * @param mixed $field
 * @return string
 * @throws MysqlException
 *
 */
function mysql_db_name($result, int $row, $field = null): string
{
    error_clear_last();
    $safeResult = \mysql_db_name($result, $row, $field);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $database
 * @param string $query
 * @param null|resource $link_identifier
 * @return bool|resource
 * @throws MysqlException
 *
 */
function mysql_db_query(string $database, string $query, $link_identifier = null)
{
    error_clear_last();
    $safeResult = \mysql_db_query($database, $query, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $database_name
 * @param null|resource $link_identifier
 * @throws MysqlException
 *
 */
function mysql_drop_db(string $database_name, $link_identifier = null): void
{
    error_clear_last();
    $safeResult = \mysql_drop_db($database_name, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param resource $result
 * @return array
 * @throws MysqlException
 *
 */
function mysql_fetch_lengths($result): array
{
    error_clear_last();
    $safeResult = \mysql_fetch_lengths($result);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 * @throws MysqlException
 *
 */
function mysql_field_flags($result, int $field_offset): string
{
    error_clear_last();
    $safeResult = \mysql_field_flags($result, $field_offset);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @param int $field_offset
 * @return int
 * @throws MysqlException
 *
 */
function mysql_field_len($result, int $field_offset): int
{
    error_clear_last();
    $safeResult = \mysql_field_len($result, $field_offset);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @param int $field_offset
 * @return string
 * @throws MysqlException
 *
 */
function mysql_field_name($result, int $field_offset): string
{
    error_clear_last();
    $safeResult = \mysql_field_name($result, $field_offset);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @param int $field_offset
 * @throws MysqlException
 *
 */
function mysql_field_seek($result, int $field_offset): void
{
    error_clear_last();
    $safeResult = \mysql_field_seek($result, $field_offset);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param resource $result
 * @throws MysqlException
 *
 */
function mysql_free_result($result): void
{
    error_clear_last();
    $safeResult = \mysql_free_result($result);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param null|resource $link_identifier
 * @return string
 * @throws MysqlException
 *
 */
function mysql_get_host_info($link_identifier = null): string
{
    error_clear_last();
    $safeResult = \mysql_get_host_info($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $link_identifier
 * @return int
 * @throws MysqlException
 *
 */
function mysql_get_proto_info($link_identifier = null): int
{
    error_clear_last();
    $safeResult = \mysql_get_proto_info($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $link_identifier
 * @return string
 * @throws MysqlException
 *
 */
function mysql_get_server_info($link_identifier = null): string
{
    error_clear_last();
    $safeResult = \mysql_get_server_info($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $link_identifier
 * @return string
 * @throws MysqlException
 *
 */
function mysql_info($link_identifier = null): string
{
    error_clear_last();
    $safeResult = \mysql_info($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $link_identifier
 * @return resource
 * @throws MysqlException
 *
 */
function mysql_list_dbs($link_identifier = null)
{
    error_clear_last();
    $safeResult = \mysql_list_dbs($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $database_name
 * @param string $table_name
 * @param null|resource $link_identifier
 * @return resource
 * @throws MysqlException
 *
 */
function mysql_list_fields(string $database_name, string $table_name, $link_identifier = null)
{
    error_clear_last();
    $safeResult = \mysql_list_fields($database_name, $table_name, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $link_identifier
 * @return resource
 * @throws MysqlException
 *
 */
function mysql_list_processes($link_identifier = null)
{
    error_clear_last();
    $safeResult = \mysql_list_processes($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $database
 * @param null|resource $link_identifier
 * @return resource
 * @throws MysqlException
 *
 */
function mysql_list_tables(string $database, $link_identifier = null)
{
    error_clear_last();
    $safeResult = \mysql_list_tables($database, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @return int
 * @throws MysqlException
 *
 */
function mysql_num_fields($result): int
{
    error_clear_last();
    $safeResult = \mysql_num_fields($result);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @return int
 * @throws MysqlException
 *
 */
function mysql_num_rows($result): int
{
    error_clear_last();
    $safeResult = \mysql_num_rows($result);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $query
 * @param null|resource $link_identifier
 * @return bool|resource
 * @throws MysqlException
 *
 */
function mysql_query(string $query, $link_identifier = null)
{
    error_clear_last();
    $safeResult = \mysql_query($query, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $unescaped_string
 * @param null|resource $link_identifier
 * @return string
 * @throws MysqlException
 *
 */
function mysql_real_escape_string(string $unescaped_string, $link_identifier = null): string
{
    error_clear_last();
    $safeResult = \mysql_real_escape_string($unescaped_string, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $result
 * @param int $row
 * @param mixed $field
 * @return string
 * @throws MysqlException
 *
 */
function mysql_result($result, int $row, $field = 0): string
{
    error_clear_last();
    $safeResult = \mysql_result($result, $row, $field);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $database_name
 * @param null|resource $link_identifier
 * @throws MysqlException
 *
 */
function mysql_select_db(string $database_name, $link_identifier = null): void
{
    error_clear_last();
    $safeResult = \mysql_select_db($database_name, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param string $charset
 * @param null|resource $link_identifier
 * @throws MysqlException
 *
 */
function mysql_set_charset(string $charset, $link_identifier = null): void
{
    error_clear_last();
    $safeResult = \mysql_set_charset($charset, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
}


/**
 * @param resource $result
 * @param int $i
 * @return string
 * @throws MysqlException
 *
 */
function mysql_tablename($result, int $i): string
{
    error_clear_last();
    $safeResult = \mysql_tablename($result, $i);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $link_identifier
 * @return int
 * @throws MysqlException
 *
 */
function mysql_thread_id($link_identifier = null): int
{
    error_clear_last();
    $safeResult = \mysql_thread_id($link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $query
 * @param null|resource $link_identifier
 * @return bool|resource
 * @throws MysqlException
 *
 */
function mysql_unbuffered_query(string $query, $link_identifier = null)
{
    error_clear_last();
    $safeResult = \mysql_unbuffered_query($query, $link_identifier);
    if ($safeResult === false) {
        throw MysqlException::createFromPhpError();
    }
    return $safeResult;
}
