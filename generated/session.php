<?php

namespace Safe;

use Safe\Exceptions\SessionException;

/**
 * session_abort finishes session without saving
 * data. Thus the original values in session data are kept.
 *
 * @throws SessionException
 *
 */
function session_abort(): void
{
    error_clear_last();
    $result = \session_abort();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_decode decodes the serialized session data provided in
 * $data, and populates the $_SESSION superglobal
 * with the result.
 *
 * By default, the unserialization method used is internal to PHP, and is not the same as unserialize.
 * The serialization method can be set using session.serialize_handler.
 *
 * @param string $data The encoded data to be stored.
 * @throws SessionException
 *
 */
function session_decode(string $data): void
{
    error_clear_last();
    $result = \session_decode($data);
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * In order to kill the session altogether, the
 * session ID must also be unset. If a cookie is used to propagate the
 * session ID (default behavior), then the session cookie must be deleted.
 * setcookie may be used for that.
 *
 * When session.use_strict_mode
 * is enabled. You do not have to remove obsolete session ID cookie because
 * session module will not accept session ID cookie when there is no
 * data associated to the session ID and set new session ID cookie.
 * Enabling session.use_strict_mode
 * is recommended for all sites.
 *
 * @throws SessionException
 *
 */
function session_destroy(): void
{
    error_clear_last();
    $result = \session_destroy();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_regenerate_id will replace the current
 * session id with a new one, and keep the current session information.
 *
 * When session.use_trans_sid
 * is enabled, output must be started after session_regenerate_id
 * call. Otherwise, old session ID is used.
 *
 * @param bool $delete_old_session Whether to delete the old associated session file or not.
 * You should not delete old session if you need to avoid
 * races caused by deletion or detect/avoid session hijack
 * attacks.
 * @throws SessionException
 *
 */
function session_regenerate_id(bool $delete_old_session = false): void
{
    error_clear_last();
    $result = \session_regenerate_id($delete_old_session);
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_register accepts a variable number of
 * arguments, any of which can be either a string holding the name of a
 * variable or an array consisting of variable names or other arrays. For
 * each name, session_register registers the global
 * variable with that name in the current session.
 *
 * You can also create a session variable by simply setting the
 * appropriate member of the $_SESSION array.
 *
 *
 *
 * ]]>
 *
 *
 *
 * If session_start was not called before this function
 * is called, an implicit call to session_start with no
 * parameters will be made.  $_SESSION does not mimic
 * this behavior and requires session_start before use.
 *
 * @param mixed $name A string holding the name of a variable or an array consisting of
 * variable names or other arrays.
 * @param mixed $params
 * @throws SessionException
 *
 */
function session_register($name, ...$params): void
{
    error_clear_last();
    if ($params !== []) {
        $result = \session_register($name, ...$params);
    } else {
        $result = \session_register($name);
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_reset reinitializes a session with
 * original values stored in session storage. This function requires an active session and
 * discards changes in $_SESSION.
 *
 * @throws SessionException
 *
 */
function session_reset(): void
{
    error_clear_last();
    $result = \session_reset();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * Set cookie parameters defined in the php.ini file. The effect of this
 * function only lasts for the duration of the script. Thus, you need to
 * call session_set_cookie_params for every request and
 * before session_start is called.
 *
 * This function updates the runtime ini values of the corresponding PHP ini configuration
 * keys which can be retrieved with the ini_get.
 *
 * @param int $lifetime Lifetime of the
 * session cookie, defined in seconds.
 * @param string $path Path on the domain where
 * the cookie will work. Use a single slash ('/') for all paths on the
 * domain.
 * @param string|null $domain Cookie domain, for
 * example 'www.php.net'. To make cookies visible on all subdomains then
 * the domain must be prefixed with a dot like '.php.net'.
 * @param bool $secure If TRUE cookie will only be sent over
 * secure connections.
 * @param bool $httponly If set to TRUE then PHP will attempt to send the
 * httponly
 * flag when setting the session cookie.
 * @throws SessionException
 *
 */
function session_set_cookie_params(int $lifetime, string $path = null, string $domain = null, bool $secure = false, bool $httponly = false): void
{
    error_clear_last();
    if ($httponly !== false) {
        $result = \session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
    } elseif ($secure !== false) {
        $result = \session_set_cookie_params($lifetime, $path, $domain, $secure);
    } elseif ($domain !== null) {
        $result = \session_set_cookie_params($lifetime, $path, $domain);
    } elseif ($path !== null) {
        $result = \session_set_cookie_params($lifetime, $path);
    } else {
        $result = \session_set_cookie_params($lifetime);
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_unregister unregisters the global variable
 * named name from the current session.
 *
 * @param string $name The variable name.
 * @throws SessionException
 *
 */
function session_unregister(string $name): void
{
    error_clear_last();
    $result = \session_unregister($name);
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * The session_unset function frees all session variables
 * currently registered.
 *
 * @throws SessionException
 *
 */
function session_unset(): void
{
    error_clear_last();
    $result = \session_unset();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * End the current session and store session data.
 *
 * Session data is usually stored after your script terminated without the
 * need to call session_write_close, but as session data
 * is locked to prevent concurrent writes only one script may operate on a
 * session at any time. When using framesets together with sessions you will
 * experience the frames loading one by one due to this locking. You can
 * reduce the time needed to load all the frames by ending the session as
 * soon as all changes to session variables are done.
 *
 * @throws SessionException
 *
 */
function session_write_close(): void
{
    error_clear_last();
    $result = \session_write_close();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}
