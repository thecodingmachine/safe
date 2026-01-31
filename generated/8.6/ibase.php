<?php

namespace Safe;

use Safe\Exceptions\IbaseException;

/**
 * @param resource $blob_handle
 * @throws IbaseException
 *
 */
function fbird_blob_cancel($blob_handle): void
{
    error_clear_last();
    $safeResult = \fbird_blob_cancel($blob_handle);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $service_handle
 * @param string $user_name
 * @param string $password
 * @param string $first_name
 * @param string $middle_name
 * @param string $last_name
 * @throws IbaseException
 *
 */
function ibase_add_user($service_handle, string $user_name, string $password, ?string $first_name = null, ?string $middle_name = null, ?string $last_name = null): void
{
    error_clear_last();
    if ($last_name !== null) {
        $safeResult = \ibase_add_user($service_handle, $user_name, $password, $first_name, $middle_name, $last_name);
    } elseif ($middle_name !== null) {
        $safeResult = \ibase_add_user($service_handle, $user_name, $password, $first_name, $middle_name);
    } elseif ($first_name !== null) {
        $safeResult = \ibase_add_user($service_handle, $user_name, $password, $first_name);
    } else {
        $safeResult = \ibase_add_user($service_handle, $user_name, $password);
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $service_handle
 * @param string $source_db
 * @param string $dest_file
 * @param int $options
 * @param bool $verbose
 * @return mixed
 * @throws IbaseException
 *
 */
function ibase_backup($service_handle, string $source_db, string $dest_file, int $options = 0, bool $verbose = false)
{
    error_clear_last();
    $safeResult = \ibase_backup($service_handle, $source_db, $dest_file, $options, $verbose);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $blob_handle
 * @throws IbaseException
 *
 */
function ibase_blob_cancel($blob_handle): void
{
    error_clear_last();
    $safeResult = \ibase_blob_cancel($blob_handle);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param null|resource $link_identifier
 * @return resource
 * @throws IbaseException
 *
 */
function ibase_blob_create($link_identifier = null)
{
    error_clear_last();
    if ($link_identifier !== null) {
        $safeResult = \ibase_blob_create($link_identifier);
    } else {
        $safeResult = \ibase_blob_create();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $blob_handle
 * @param int $len
 * @return string
 * @throws IbaseException
 *
 */
function ibase_blob_get($blob_handle, int $len): string
{
    error_clear_last();
    $safeResult = \ibase_blob_get($blob_handle, $len);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $connection_id
 * @throws IbaseException
 *
 */
function ibase_close($connection_id = null): void
{
    error_clear_last();
    if ($connection_id !== null) {
        $safeResult = \ibase_close($connection_id);
    } else {
        $safeResult = \ibase_close();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param null|resource $link_or_trans_identifier
 * @throws IbaseException
 *
 */
function ibase_commit_ret($link_or_trans_identifier = null): void
{
    error_clear_last();
    if ($link_or_trans_identifier !== null) {
        $safeResult = \ibase_commit_ret($link_or_trans_identifier);
    } else {
        $safeResult = \ibase_commit_ret();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param null|resource $link_or_trans_identifier
 * @throws IbaseException
 *
 */
function ibase_commit($link_or_trans_identifier = null): void
{
    error_clear_last();
    if ($link_or_trans_identifier !== null) {
        $safeResult = \ibase_commit($link_or_trans_identifier);
    } else {
        $safeResult = \ibase_commit();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param string $database
 * @param string $username
 * @param string $password
 * @param string $charset
 * @param int $buffers
 * @param int $dialect
 * @param string $role
 * @param int $sync
 * @return resource
 * @throws IbaseException
 *
 */
function ibase_connect(?string $database = null, ?string $username = null, ?string $password = null, ?string $charset = null, ?int $buffers = null, ?int $dialect = null, ?string $role = null, ?int $sync = null)
{
    error_clear_last();
    if ($sync !== null) {
        $safeResult = \ibase_connect($database, $username, $password, $charset, $buffers, $dialect, $role, $sync);
    } elseif ($role !== null) {
        $safeResult = \ibase_connect($database, $username, $password, $charset, $buffers, $dialect, $role);
    } elseif ($dialect !== null) {
        $safeResult = \ibase_connect($database, $username, $password, $charset, $buffers, $dialect);
    } elseif ($buffers !== null) {
        $safeResult = \ibase_connect($database, $username, $password, $charset, $buffers);
    } elseif ($charset !== null) {
        $safeResult = \ibase_connect($database, $username, $password, $charset);
    } elseif ($password !== null) {
        $safeResult = \ibase_connect($database, $username, $password);
    } elseif ($username !== null) {
        $safeResult = \ibase_connect($database, $username);
    } elseif ($database !== null) {
        $safeResult = \ibase_connect($database);
    } else {
        $safeResult = \ibase_connect();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $service_handle
 * @param string $user_name
 * @throws IbaseException
 *
 */
function ibase_delete_user($service_handle, string $user_name): void
{
    error_clear_last();
    $safeResult = \ibase_delete_user($service_handle, $user_name);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param null|resource $connection
 * @throws IbaseException
 *
 */
function ibase_drop_db($connection = null): void
{
    error_clear_last();
    if ($connection !== null) {
        $safeResult = \ibase_drop_db($connection);
    } else {
        $safeResult = \ibase_drop_db();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $event
 * @throws IbaseException
 *
 */
function ibase_free_event_handler($event): void
{
    error_clear_last();
    $safeResult = \ibase_free_event_handler($event);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $query
 * @throws IbaseException
 *
 */
function ibase_free_query($query): void
{
    error_clear_last();
    $safeResult = \ibase_free_query($query);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $result_identifier
 * @throws IbaseException
 *
 */
function ibase_free_result($result_identifier): void
{
    error_clear_last();
    $safeResult = \ibase_free_result($result_identifier);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $service_handle
 * @param string $db
 * @param int $action
 * @param int $argument
 * @throws IbaseException
 *
 */
function ibase_maintain_db($service_handle, string $db, int $action, int $argument = 0): void
{
    error_clear_last();
    $safeResult = \ibase_maintain_db($service_handle, $db, $action, $argument);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $service_handle
 * @param string $user_name
 * @param string $password
 * @param string $first_name
 * @param string $middle_name
 * @param string $last_name
 * @throws IbaseException
 *
 */
function ibase_modify_user($service_handle, string $user_name, string $password, ?string $first_name = null, ?string $middle_name = null, ?string $last_name = null): void
{
    error_clear_last();
    if ($last_name !== null) {
        $safeResult = \ibase_modify_user($service_handle, $user_name, $password, $first_name, $middle_name, $last_name);
    } elseif ($middle_name !== null) {
        $safeResult = \ibase_modify_user($service_handle, $user_name, $password, $first_name, $middle_name);
    } elseif ($first_name !== null) {
        $safeResult = \ibase_modify_user($service_handle, $user_name, $password, $first_name);
    } else {
        $safeResult = \ibase_modify_user($service_handle, $user_name, $password);
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param resource $result
 * @param string $name
 * @throws IbaseException
 *
 */
function ibase_name_result($result, string $name): void
{
    error_clear_last();
    $safeResult = \ibase_name_result($result, $name);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param string $database
 * @param string $username
 * @param string $password
 * @param string $charset
 * @param int $buffers
 * @param int $dialect
 * @param string $role
 * @param int $sync
 * @return resource
 * @throws IbaseException
 *
 */
function ibase_pconnect(?string $database = null, ?string $username = null, ?string $password = null, ?string $charset = null, ?int $buffers = null, ?int $dialect = null, ?string $role = null, ?int $sync = null)
{
    error_clear_last();
    if ($sync !== null) {
        $safeResult = \ibase_pconnect($database, $username, $password, $charset, $buffers, $dialect, $role, $sync);
    } elseif ($role !== null) {
        $safeResult = \ibase_pconnect($database, $username, $password, $charset, $buffers, $dialect, $role);
    } elseif ($dialect !== null) {
        $safeResult = \ibase_pconnect($database, $username, $password, $charset, $buffers, $dialect);
    } elseif ($buffers !== null) {
        $safeResult = \ibase_pconnect($database, $username, $password, $charset, $buffers);
    } elseif ($charset !== null) {
        $safeResult = \ibase_pconnect($database, $username, $password, $charset);
    } elseif ($password !== null) {
        $safeResult = \ibase_pconnect($database, $username, $password);
    } elseif ($username !== null) {
        $safeResult = \ibase_pconnect($database, $username);
    } elseif ($database !== null) {
        $safeResult = \ibase_pconnect($database);
    } else {
        $safeResult = \ibase_pconnect();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $service_handle
 * @param string $source_file
 * @param string $dest_db
 * @param int $options
 * @param bool $verbose
 * @return mixed
 * @throws IbaseException
 *
 */
function ibase_restore($service_handle, string $source_file, string $dest_db, int $options = 0, bool $verbose = false)
{
    error_clear_last();
    $safeResult = \ibase_restore($service_handle, $source_file, $dest_db, $options, $verbose);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param null|resource $link_or_trans_identifier
 * @throws IbaseException
 *
 */
function ibase_rollback_ret($link_or_trans_identifier = null): void
{
    error_clear_last();
    if ($link_or_trans_identifier !== null) {
        $safeResult = \ibase_rollback_ret($link_or_trans_identifier);
    } else {
        $safeResult = \ibase_rollback_ret();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param null|resource $link_or_trans_identifier
 * @throws IbaseException
 *
 */
function ibase_rollback($link_or_trans_identifier = null): void
{
    error_clear_last();
    if ($link_or_trans_identifier !== null) {
        $safeResult = \ibase_rollback($link_or_trans_identifier);
    } else {
        $safeResult = \ibase_rollback();
    }
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}


/**
 * @param string $host
 * @param string $dba_username
 * @param string $dba_password
 * @return resource
 * @throws IbaseException
 *
 */
function ibase_service_attach(string $host, string $dba_username, string $dba_password)
{
    error_clear_last();
    $safeResult = \ibase_service_attach($host, $dba_username, $dba_password);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $service_handle
 * @throws IbaseException
 *
 */
function ibase_service_detach($service_handle): void
{
    error_clear_last();
    $safeResult = \ibase_service_detach($service_handle);
    if ($safeResult === false) {
        throw IbaseException::createFromPhpError();
    }
}
