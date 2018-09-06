<?php

namespace Safe;

/**
 * 
 * 
 * @param int $error_level 
 * @param string $error_message 
 * @throws Exceptions\SessionPgsqlException
 * 
 */
function session_pgsql_add_error(int $error_level, string $error_message): void
{
    error_clear_last();
    if ($error_message !== null) {
        $result = \session_pgsql_add_error($error_level, $error_message);
    }else {
        $result = \session_pgsql_add_error($error_level);
    }
    if ($result === FALSE) {
        throw Exceptions\SessionPgsqlException::createFromPhpError();
    }
}


/**
 * Reset the connection to the session database servers.
 * 
 * @throws Exceptions\SessionPgsqlException
 * 
 */
function session_pgsql_reset(): void
{
    error_clear_last();
    $result = \session_pgsql_reset();
    if ($result === FALSE) {
        throw Exceptions\SessionPgsqlException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param string $value 
 * @throws Exceptions\SessionPgsqlException
 * 
 */
function session_pgsql_set_field(string $value): void
{
    error_clear_last();
    $result = \session_pgsql_set_field($value);
    if ($result === FALSE) {
        throw Exceptions\SessionPgsqlException::createFromPhpError();
    }
}


