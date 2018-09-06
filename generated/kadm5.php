<?php

namespace Safe;

/**
 * kadm5_chpass_principal sets the new password
 * password for the principal.
 * 
 * @param resource $handle A KADM5 handle.
 * @param string $principal The principal.
 * @param string $password The new password.
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_chpass_principal($handle, string $principal, string $password): void
{
    error_clear_last();
    $result = \kadm5_chpass_principal($handle, $principal, $password);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
}


/**
 * Creates a principal with the given
 * password.
 * 
 * @param resource $handle A KADM5 handle.
 * @param string $principal The principal.
 * @param string $password If password is omitted or is NULL, a random
 * key will be generated.
 * @param array $options It is possible to specify several optional parameters within the
 * array options. Allowed are the following options:
 * KADM5_PRINC_EXPIRE_TIME,
 * KADM5_PW_EXPIRATION,
 * KADM5_ATTRIBUTES,
 * KADM5_MAX_LIFE,
 * KADM5_KVNO,
 * KADM5_POLICY,
 * KADM5_CLEARPOLICY,
 * KADM5_MAX_RLIFE.
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_create_principal($handle, string $principal, string $password = null, array $options = null): void
{
    error_clear_last();
    if ($options !== null) {
        $result = \kadm5_create_principal($handle, $principal, $password, $options);
    } elseif ($password !== null) {
        $result = \kadm5_create_principal($handle, $principal, $password);
    }else {
        $result = \kadm5_create_principal($handle, $principal);
    }
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
}


/**
 * Removes the principal from the Kerberos database.
 * 
 * @param resource $handle A KADM5 handle.
 * @param string $principal The removed principal.
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_delete_principal($handle, string $principal): void
{
    error_clear_last();
    $result = \kadm5_delete_principal($handle, $principal);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
}


/**
 * Closes the connection to the admin server and releases all related
 * resources.
 * 
 * @param resource $handle A KADM5 handle.
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_destroy($handle): void
{
    error_clear_last();
    $result = \kadm5_destroy($handle);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
}


/**
 * Flush all changes to the Kerberos database, leaving the connection to the
 * Kerberos admin server open.
 * 
 * @param resource $handle A KADM5 handle.
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_flush($handle): void
{
    error_clear_last();
    $result = \kadm5_flush($handle);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
}


/**
 * Gets an array containing the policies's names.
 * 
 * @param resource $handle A KADM5 handle.
 * @return array Returns array of policies on success .
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_get_policies($handle): array
{
    error_clear_last();
    $result = \kadm5_get_policies($handle);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the principal's entries from the Kerberos database.
 * 
 * @param resource $handle A KADM5 handle.
 * @param string $principal The principal.
 * @return array Returns array of options containing the following keys: KADM5_PRINCIPAL,
 * KADM5_PRINC_EXPIRE_TIME, KADM5_PW_EXPIRATION, KADM5_ATTRIBUTES,
 * KADM5_MAX_LIFE, KADM5_MOD_NAME, KADM5_MOD_TIME, KADM5_KVNO, KADM5_POLICY,
 * KADM5_MAX_RLIFE, KADM5_LAST_SUCCESS, KADM5_LAST_FAILED,
 * KADM5_FAIL_AUTH_COUNT on success .
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_get_principal($handle, string $principal): array
{
    error_clear_last();
    $result = \kadm5_get_principal($handle, $principal);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
    return $result;
}


/**
 * kadm5_get_principals returns an array containing the
 * principals's names.
 * 
 * @param resource $handle A KADM5 handle.
 * @return array Returns array of principals on success .
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_get_principals($handle): array
{
    error_clear_last();
    $result = \kadm5_get_principals($handle);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
    return $result;
}


/**
 * Opens a connection with the KADM5 library using the
 * principal and the given
 * password to obtain initial credentials from the
 * admin_server.
 * 
 * @param string $admin_server The server.
 * @param string $realm Defines the authentication domain for the connection.
 * @param string $principal The principal.
 * @param string $password If password is omitted or is NULL, a random
 * key will be generated.
 * @return resource Returns a KADM5 handle on success .
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_init_with_password(string $admin_server, string $realm, string $principal, string $password)
{
    error_clear_last();
    $result = \kadm5_init_with_password($admin_server, $realm, $principal, $password);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
    return $result;
}


/**
 * Modifies a principal according to the given
 * options.
 * 
 * @param resource $handle A KADM5 handle.
 * @param string $principal The principal.
 * @param array $options It is possible to specify several optional parameters within the
 * array options. Allowed are the following options:
 * KADM5_PRINC_EXPIRE_TIME,
 * KADM5_PW_EXPIRATION,
 * KADM5_ATTRIBUTES,
 * KADM5_MAX_LIFE,
 * KADM5_KVNO,
 * KADM5_POLICY,
 * KADM5_CLEARPOLICY,
 * KADM5_MAX_RLIFE.
 * KADM5_FAIL_AUTH_COUNT.
 * @throws Exceptions\Kadm5Exception
 * 
 */
function kadm5_modify_principal($handle, string $principal, array $options): void
{
    error_clear_last();
    $result = \kadm5_modify_principal($handle, $principal, $options);
    if ($result === FALSE) {
        throw Exceptions\Kadm5Exception::createFromPhpError();
    }
}


