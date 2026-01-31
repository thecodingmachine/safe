<?php

namespace Safe;

use Safe\Exceptions\IbmDb2Exception;

/**
 * @param resource $connection
 * @param \DB2_AUTOCOMMIT_OFF|\DB2_AUTOCOMMIT_ON $value
 * @return \DB2_AUTOCOMMIT_OFF|\DB2_AUTOCOMMIT_ON|bool
 * @throws IbmDb2Exception
 *
 */
function db2_autocommit($connection, $value = null)
{
    error_clear_last();
    if ($value !== null) {
        $safeResult = \db2_autocommit($connection, $value);
    } else {
        $safeResult = \db2_autocommit($connection);
    }
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @param int $parameter_number
 * @param string $variable_name
 * @param int $parameter_type
 * @param int $data_type
 * @param int $precision
 * @param int $scale
 * @throws IbmDb2Exception
 *
 */
function db2_bind_param($stmt, int $parameter_number, string $variable_name, int $parameter_type = DB2_PARAM_IN, int $data_type = 0, int $precision = -1, int $scale = 0): void
{
    error_clear_last();
    $safeResult = \db2_bind_param($stmt, $parameter_number, $variable_name, $parameter_type, $data_type, $precision, $scale);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $connection
 * @return \stdClass
 * @throws IbmDb2Exception
 *
 */
function db2_client_info($connection): \stdClass
{
    error_clear_last();
    $safeResult = \db2_client_info($connection);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $connection
 * @throws IbmDb2Exception
 *
 */
function db2_close($connection): void
{
    error_clear_last();
    $safeResult = \db2_close($connection);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $connection
 * @throws IbmDb2Exception
 *
 */
function db2_commit($connection): void
{
    error_clear_last();
    $safeResult = \db2_commit($connection);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $stmt
 * @param array $parameters
 * @throws IbmDb2Exception
 *
 */
function db2_execute($stmt, array $parameters = []): void
{
    error_clear_last();
    $safeResult = \db2_execute($stmt, $parameters);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $stmt
 * @throws IbmDb2Exception
 *
 */
function db2_free_result($stmt): void
{
    error_clear_last();
    $safeResult = \db2_free_result($stmt);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $stmt
 * @throws IbmDb2Exception
 *
 */
function db2_free_stmt($stmt): void
{
    error_clear_last();
    $safeResult = \db2_free_stmt($stmt);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $resource
 * @param string $option
 * @return string
 * @throws IbmDb2Exception
 *
 */
function db2_get_option($resource, string $option): string
{
    error_clear_last();
    $safeResult = \db2_get_option($resource, $option);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @return 0|positive-int
 * @throws IbmDb2Exception
 *
 */
function db2_num_rows($stmt): int
{
    error_clear_last();
    $safeResult = \db2_num_rows($stmt);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $connection
 * @throws IbmDb2Exception
 *
 */
function db2_pclose($connection): void
{
    error_clear_last();
    $safeResult = \db2_pclose($connection);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $connection
 * @throws IbmDb2Exception
 *
 */
function db2_rollback($connection): void
{
    error_clear_last();
    $safeResult = \db2_rollback($connection);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}


/**
 * @param resource $connection
 * @return \stdClass
 * @throws IbmDb2Exception
 *
 */
function db2_server_info($connection): \stdClass
{
    error_clear_last();
    $safeResult = \db2_server_info($connection);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $resource
 * @param array $options
 * @param int $type
 * @throws IbmDb2Exception
 *
 */
function db2_set_option($resource, array $options, int $type): void
{
    error_clear_last();
    $safeResult = \db2_set_option($resource, $options, $type);
    if ($safeResult === false) {
        throw IbmDb2Exception::createFromPhpError();
    }
}
