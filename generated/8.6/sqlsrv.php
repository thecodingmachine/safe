<?php

namespace Safe;

use Safe\Exceptions\SqlsrvException;

/**
 * @param resource $conn
 * @throws SqlsrvException
 *
 */
function sqlsrv_begin_transaction($conn): void
{
    error_clear_last();
    $safeResult = \sqlsrv_begin_transaction($conn);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}


/**
 * @param resource $stmt
 * @throws SqlsrvException
 *
 */
function sqlsrv_cancel($stmt): void
{
    error_clear_last();
    $safeResult = \sqlsrv_cancel($stmt);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}


/**
 * @param resource $conn
 * @return array
 * @throws SqlsrvException
 *
 */
function sqlsrv_client_info($conn): array
{
    error_clear_last();
    $safeResult = \sqlsrv_client_info($conn);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn
 * @throws SqlsrvException
 *
 */
function sqlsrv_close($conn): void
{
    error_clear_last();
    $safeResult = \sqlsrv_close($conn);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}


/**
 * @param resource $conn
 * @throws SqlsrvException
 *
 */
function sqlsrv_commit($conn): void
{
    error_clear_last();
    $safeResult = \sqlsrv_commit($conn);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}


/**
 * @param string $setting
 * @param mixed $value
 * @throws SqlsrvException
 *
 */
function sqlsrv_configure(string $setting, $value): void
{
    error_clear_last();
    $safeResult = \sqlsrv_configure($setting, $value);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}


/**
 * @param resource $stmt
 * @throws SqlsrvException
 *
 */
function sqlsrv_execute($stmt): void
{
    error_clear_last();
    $safeResult = \sqlsrv_execute($stmt);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}


/**
 * @param resource $stmt
 * @param int $fetchType
 * @param int $row
 * @param int $offset
 * @return array|null
 * @throws SqlsrvException
 *
 */
function sqlsrv_fetch_array($stmt, ?int $fetchType = null, ?int $row = null, ?int $offset = null): ?array
{
    error_clear_last();
    if ($offset !== null) {
        $safeResult = \sqlsrv_fetch_array($stmt, $fetchType, $row, $offset);
    } elseif ($row !== null) {
        $safeResult = \sqlsrv_fetch_array($stmt, $fetchType, $row);
    } elseif ($fetchType !== null) {
        $safeResult = \sqlsrv_fetch_array($stmt, $fetchType);
    } else {
        $safeResult = \sqlsrv_fetch_array($stmt);
    }
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @param string $className
 * @param array $ctorParams
 * @param int $row
 * @param int $offset
 * @return null|object
 * @throws SqlsrvException
 *
 */
function sqlsrv_fetch_object($stmt, ?string $className = null, ?array $ctorParams = null, ?int $row = null, ?int $offset = null): ?object
{
    error_clear_last();
    if ($offset !== null) {
        $safeResult = \sqlsrv_fetch_object($stmt, $className, $ctorParams, $row, $offset);
    } elseif ($row !== null) {
        $safeResult = \sqlsrv_fetch_object($stmt, $className, $ctorParams, $row);
    } elseif ($ctorParams !== null) {
        $safeResult = \sqlsrv_fetch_object($stmt, $className, $ctorParams);
    } elseif ($className !== null) {
        $safeResult = \sqlsrv_fetch_object($stmt, $className);
    } else {
        $safeResult = \sqlsrv_fetch_object($stmt);
    }
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @param int $row
 * @param int $offset
 * @return bool|null
 * @throws SqlsrvException
 *
 */
function sqlsrv_fetch($stmt, ?int $row = null, ?int $offset = null): ?bool
{
    error_clear_last();
    if ($offset !== null) {
        $safeResult = \sqlsrv_fetch($stmt, $row, $offset);
    } elseif ($row !== null) {
        $safeResult = \sqlsrv_fetch($stmt, $row);
    } else {
        $safeResult = \sqlsrv_fetch($stmt);
    }
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @throws SqlsrvException
 *
 */
function sqlsrv_free_stmt($stmt): void
{
    error_clear_last();
    $safeResult = \sqlsrv_free_stmt($stmt);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}


/**
 * @param resource $stmt
 * @param int $fieldIndex
 * @param int $getAsType
 * @return mixed
 * @throws SqlsrvException
 *
 */
function sqlsrv_get_field($stmt, int $fieldIndex, ?int $getAsType = null)
{
    error_clear_last();
    if ($getAsType !== null) {
        $safeResult = \sqlsrv_get_field($stmt, $fieldIndex, $getAsType);
    } else {
        $safeResult = \sqlsrv_get_field($stmt, $fieldIndex);
    }
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @return bool|null
 * @throws SqlsrvException
 *
 */
function sqlsrv_next_result($stmt): ?bool
{
    error_clear_last();
    $safeResult = \sqlsrv_next_result($stmt);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @return int
 * @throws SqlsrvException
 *
 */
function sqlsrv_num_fields($stmt): int
{
    error_clear_last();
    $safeResult = \sqlsrv_num_fields($stmt);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stmt
 * @return int
 * @throws SqlsrvException
 *
 */
function sqlsrv_num_rows($stmt): int
{
    error_clear_last();
    $safeResult = \sqlsrv_num_rows($stmt);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn
 * @param string $sql
 * @param array $params
 * @param array $options
 * @return mixed
 * @throws SqlsrvException
 *
 */
function sqlsrv_prepare($conn, string $sql, ?array $params = null, ?array $options = null)
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \sqlsrv_prepare($conn, $sql, $params, $options);
    } elseif ($params !== null) {
        $safeResult = \sqlsrv_prepare($conn, $sql, $params);
    } else {
        $safeResult = \sqlsrv_prepare($conn, $sql);
    }
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn
 * @param string $sql
 * @param array $params
 * @param array $options
 * @return mixed
 * @throws SqlsrvException
 *
 */
function sqlsrv_query($conn, string $sql, ?array $params = null, ?array $options = null)
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \sqlsrv_query($conn, $sql, $params, $options);
    } elseif ($params !== null) {
        $safeResult = \sqlsrv_query($conn, $sql, $params);
    } else {
        $safeResult = \sqlsrv_query($conn, $sql);
    }
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $conn
 * @throws SqlsrvException
 *
 */
function sqlsrv_rollback($conn): void
{
    error_clear_last();
    $safeResult = \sqlsrv_rollback($conn);
    if ($safeResult === false) {
        throw SqlsrvException::createFromPhpError();
    }
}
