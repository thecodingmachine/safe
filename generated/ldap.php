<?php

namespace Safe;

use Safe\Exceptions\LdapException;

/**
 * Translate ISO-8859 characters to t61
 * characters.
 *
 * This function is useful if you have to talk to a legacy
 * LDAPv2 server.
 *
 * @param string $value The text to be translated.
 * @return string Return the t61 translation of
 * value.
 * @throws LdapException
 *
 */
function ldap_8859_to_t61(string $value): string
{
    error_clear_last();
    $safeResult = \ldap_8859_to_t61($value);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Add entries in the LDAP directory.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $dn The distinguished name of an LDAP entity.
 * @param array $entry An array that specifies the information about the entry. The values in
 * the entries are indexed by individual attributes.
 * In case of multiple values for an attribute, they are indexed using
 * integers starting with 0.
 *
 *
 *
 * ]]>
 *
 *
 * @param array $controls Array of LDAP Controls to send with the request.
 * @throws LdapException
 *
 */
function ldap_add($ldap, string $dn, array $entry, array $controls = null): void
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_add($ldap, $dn, $entry, $controls);
    } else {
        $safeResult = \ldap_add($ldap, $dn, $entry);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Binds to the LDAP directory with specified RDN and password.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string|null $dn
 * @param string|null $password
 * @throws LdapException
 *
 */
function ldap_bind($ldap, ?string $dn = null, ?string $password = null): void
{
    error_clear_last();
    if ($password !== null) {
        $safeResult = \ldap_bind($ldap, $dn, $password);
    } elseif ($dn !== null) {
        $safeResult = \ldap_bind($ldap, $dn);
    } else {
        $safeResult = \ldap_bind($ldap);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Retrieve the pagination information send by the server.
 *
 * @param resource $link An LDAP resource, returned by ldap_connect.
 * @param resource $result
 * @param string|null $cookie An opaque structure sent by the server.
 * @param int|null $estimated The estimated number of entries to retrieve.
 * @throws LdapException
 *
 */
function ldap_control_paged_result_response($link, $result, ?string &$cookie = null, ?int &$estimated = null): void
{
    error_clear_last();
    $safeResult = \ldap_control_paged_result_response($link, $result, $cookie, $estimated);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Enable LDAP pagination by sending the pagination control (page size, cookie...).
 *
 * @param resource $link An LDAP resource, returned by ldap_connect.
 * @param int $pagesize The number of entries by page.
 * @param bool $iscritical Indicates whether the pagination is critical or not.
 * If true and if the server doesn't support pagination, the search
 * will return no result.
 * @param string $cookie An opaque structure sent by the server
 * (ldap_control_paged_result_response).
 * @throws LdapException
 *
 */
function ldap_control_paged_result($link, int $pagesize, bool $iscritical = false, string $cookie = ""): void
{
    error_clear_last();
    $safeResult = \ldap_control_paged_result($link, $pagesize, $iscritical, $cookie);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Returns the number of entries stored in the result of previous search
 * operations.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $result An LDAP\Result instance, returned by ldap_list or ldap_search.
 * @return int Returns number of entries in the result.
 * @throws LdapException
 *
 */
function ldap_count_entries($ldap, $result): int
{
    error_clear_last();
    $safeResult = \ldap_count_entries($ldap, $result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Deletes a particular entry in LDAP directory.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $dn The distinguished name of an LDAP entity.
 * @param array $controls Array of LDAP Controls to send with the request.
 * @throws LdapException
 *
 */
function ldap_delete($ldap, string $dn, array $controls = null): void
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_delete($ldap, $dn, $controls);
    } else {
        $safeResult = \ldap_delete($ldap, $dn);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Turns the specified dn, into a more user-friendly
 * form, stripping off type names.
 *
 * @param string $dn The distinguished name of an LDAP entity.
 * @return string Returns the user friendly name.
 * @throws LdapException
 *
 */
function ldap_dn2ufn(string $dn): string
{
    error_clear_last();
    $safeResult = \ldap_dn2ufn($dn);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Performs a PASSWD extended operation.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $user dn of the user to change the password of.
 * @param string $old_password The old password of this user. May be ommited depending of server configuration.
 * @param string $new_password The new password for this user. May be omitted or empty to have a generated password.
 * @param array $controls If provided, a password policy request control is send with the request and this is
 * filled with an array of LDAP Controls
 * returned with the request.
 * @return string|bool Returns the generated password if new_password is empty or omitted.
 * Otherwise returns TRUE on success.
 * @throws LdapException
 *
 */
function ldap_exop_passwd($ldap, string $user = "", string $old_password = "", string $new_password = "", array &$controls = null)
{
    error_clear_last();
    $safeResult = \ldap_exop_passwd($ldap, $user, $old_password, $new_password, $controls);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Performs a WHOAMI extended operation and returns the data.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @return string|bool The data returned by the server.
 * @throws LdapException
 *
 */
function ldap_exop_whoami($ldap)
{
    error_clear_last();
    $safeResult = \ldap_exop_whoami($ldap);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Performs an extended operation on the specified ldap with
 * request_oid the OID of the operation and
 * request_data the data.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $request_oid The extended operation request OID. You may use one of LDAP_EXOP_START_TLS, LDAP_EXOP_MODIFY_PASSWD, LDAP_EXOP_REFRESH, LDAP_EXOP_WHO_AM_I, LDAP_EXOP_TURN, or a string with the OID of the operation you want to send.
 * @param string $request_data The extended operation request data. May be NULL for some operations like LDAP_EXOP_WHO_AM_I, may also need to be BER encoded.
 * @param array|null $controls Array of LDAP Controls to send with the request.
 * @param string|null $response_data Will be filled with the extended operation response data if provided.
 * If not provided you may use ldap_parse_exop on the result object
 * later to get this data.
 * @param string|null $response_oid Will be filled with the response OID if provided, usually equal to the request OID.
 * @return resource|bool When used with response_data, returns TRUE on success.
 * When used without response_data, returns a result identifier.
 * @throws LdapException
 *
 */
function ldap_exop($ldap, string $request_oid, string $request_data = null, ?array $controls = null, ?string &$response_data = null, ?string &$response_oid = null)
{
    error_clear_last();
    if ($response_oid !== null) {
        $safeResult = \ldap_exop($ldap, $request_oid, $request_data, $controls, $response_data, $response_oid);
    } elseif ($response_data !== null) {
        $safeResult = \ldap_exop($ldap, $request_oid, $request_data, $controls, $response_data);
    } elseif ($controls !== null) {
        $safeResult = \ldap_exop($ldap, $request_oid, $request_data, $controls);
    } elseif ($request_data !== null) {
        $safeResult = \ldap_exop($ldap, $request_oid, $request_data);
    } else {
        $safeResult = \ldap_exop($ldap, $request_oid);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Splits the DN returned by ldap_get_dn and breaks it
 * up into its component parts. Each part is known as Relative Distinguished
 * Name, or RDN.
 *
 * @param string $dn The distinguished name of an LDAP entity.
 * @param int $with_attrib Used to request if the RDNs are returned with only values or their
 * attributes as well.  To get RDNs with the attributes (i.e. in
 * attribute=value format) set with_attrib to 0
 * and to get only values set it to 1.
 * @return array Returns an array of all DN components.
 * The first element in the array has count key and
 * represents the number of returned values, next elements are numerically
 * indexed DN components.
 * @throws LdapException
 *
 */
function ldap_explode_dn(string $dn, int $with_attrib): array
{
    error_clear_last();
    $safeResult = \ldap_explode_dn($dn, $with_attrib);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the first attribute in the given entry. Remaining attributes are
 * retrieved by calling ldap_next_attribute successively.
 *
 * Similar to reading entries, attributes are also read one by one from a
 * particular entry.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $entry An LDAP\ResultEntry instance.
 * @return string Returns the first attribute in the entry on success and FALSE on
 * error.
 * @throws LdapException
 *
 */
function ldap_first_attribute($ldap, $entry): string
{
    error_clear_last();
    $safeResult = \ldap_first_attribute($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the entry identifier for first entry in the result. This entry
 * identifier is then supplied to ldap_next_entry
 * routine to get successive entries from the result.
 *
 * Entries in the LDAP result are read sequentially using the
 * ldap_first_entry and
 * ldap_next_entry functions.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $result An LDAP\Result instance, returned by ldap_list or ldap_search.
 * @return resource Returns an LDAP\ResultEntry instance.
 * @throws LdapException
 *
 */
function ldap_first_entry($ldap, $result)
{
    error_clear_last();
    $safeResult = \ldap_first_entry($ldap, $result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Frees up the memory allocated internally to store the result. All result
 * memory will be automatically freed when the script terminates.
 *
 * Typically all the memory allocated for the LDAP result gets freed at the
 * end of the script. In case the script is making successive searches which
 * return large result sets, ldap_free_result could be
 * called to keep the runtime memory usage by the script low.
 *
 * @param resource $result An LDAP\Result instance, returned by ldap_list or ldap_search.
 * @throws LdapException
 *
 */
function ldap_free_result($result): void
{
    error_clear_last();
    $safeResult = \ldap_free_result($result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Reads attributes and values from an entry in the search result.
 *
 * Having located a specific entry in the directory, you can find out what
 * information is held for that entry by using this call. You would use this
 * call for an application which "browses" directory entries and/or where you
 * do not know the structure of the directory entries. In many applications
 * you will be searching for a specific attribute such as an email address or
 * a surname, and won't care what other data is held.
 *
 *
 *
 *
 *
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $entry An LDAP\ResultEntry instance.
 * @return array Returns a complete entry information in a multi-dimensional array
 * on success and FALSE on error.
 * @throws LdapException
 *
 */
function ldap_get_attributes($ldap, $entry): array
{
    error_clear_last();
    $safeResult = \ldap_get_attributes($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Finds out the DN of an entry in the result.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $entry An LDAP\ResultEntry instance.
 * @return string Returns the DN of the result entry and FALSE on error.
 * @throws LdapException
 *
 */
function ldap_get_dn($ldap, $entry): string
{
    error_clear_last();
    $safeResult = \ldap_get_dn($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Reads multiple entries from the given result, and then reading the
 * attributes and multiple values.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $result An LDAP\Result instance, returned by ldap_list or ldap_search.
 * @return array Returns a complete result information in a multi-dimensional array on
 * success.
 *
 * The structure of the array is as follows.
 * The attribute index is converted to lowercase. (Attributes are
 * case-insensitive for directory servers, but not when used as
 * array indices.)
 *
 *
 *
 *
 *
 * @throws LdapException
 *
 */
function ldap_get_entries($ldap, $result): array
{
    error_clear_last();
    $safeResult = \ldap_get_entries($ldap, $result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Sets value to the value of the specified option.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param int $option The parameter option can be one of:
 *
 *
 *
 *
 * Option
 * Type
 * since
 *
 *
 *
 *
 * LDAP_OPT_DEREF
 * int
 *
 *
 *
 * LDAP_OPT_SIZELIMIT
 * int
 *
 *
 *
 * LDAP_OPT_TIMELIMIT
 * int
 *
 *
 *
 * LDAP_OPT_NETWORK_TIMEOUT
 * int
 *
 *
 *
 * LDAP_OPT_PROTOCOL_VERSION
 * int
 *
 *
 *
 * LDAP_OPT_ERROR_NUMBER
 * int
 *
 *
 *
 * LDAP_OPT_DIAGNOSTIC_MESSAGE
 * string
 *
 *
 *
 * LDAP_OPT_REFERRALS
 * int
 *
 *
 *
 * LDAP_OPT_RESTART
 * int
 *
 *
 *
 * LDAP_OPT_HOST_NAME
 * string
 *
 *
 *
 * LDAP_OPT_ERROR_STRING
 * string
 *
 *
 *
 * LDAP_OPT_MATCHED_DN
 * string
 *
 *
 *
 * LDAP_OPT_SERVER_CONTROLS
 * array
 *
 *
 *
 * LDAP_OPT_CLIENT_CONTROLS
 * array
 *
 *
 *
 * LDAP_OPT_X_KEEPALIVE_IDLE
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_KEEPALIVE_PROBES
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_KEEPALIVE_INTERVAL
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CACERTDIR
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CACERTFILE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CERTFILE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CIPHER_SUITE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CRLCHECK
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CRL_NONE
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CRL_PEER
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CRL_ALL
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_CRLFILE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_DHFILE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_KEYFILE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_PACKAGE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_PROTOCOL_MIN
 * int
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_RANDOM_FILE
 * string
 * 7.1
 *
 *
 * LDAP_OPT_X_TLS_REQUIRE_CERT
 * int
 *
 *
 *
 *
 *
 * @param mixed $value This will be set to the option value.
 * @throws LdapException
 *
 */
function ldap_get_option($ldap, int $option, &$value = null): void
{
    error_clear_last();
    $safeResult = \ldap_get_option($ldap, $option, $value);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Reads all the values of the attribute in the entry in the result.
 *
 * This function is used exactly like ldap_get_values
 * except that it handles binary data and not string data.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $entry An LDAP\ResultEntry instance.
 * @param string $attribute
 * @return array Returns an array of values for the attribute on success and FALSE on
 * error. Individual values are accessed by integer index in the array. The
 * first index is 0. The number of values can be found by indexing "count"
 * in the resultant array.
 * @throws LdapException
 *
 */
function ldap_get_values_len($ldap, $entry, string $attribute): array
{
    error_clear_last();
    $safeResult = \ldap_get_values_len($ldap, $entry, $attribute);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Reads all the values of the attribute in the entry in the result.
 *
 * This call needs a entry,
 * so needs to be preceded by one of the ldap search calls and one
 * of the calls to get an individual entry.
 *
 * You application will either be hard coded to look for certain
 * attributes (such as "surname" or "mail") or you will have to use
 * the ldap_get_attributes call to work out
 * what attributes exist for a given entry.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $entry An LDAP\ResultEntry instance.
 * @param string $attribute
 * @return array Returns an array of values for the attribute on success and FALSE on
 * error. The number of values can be found by indexing "count" in the
 * resultant array. Individual values are accessed by integer index in the
 * array.  The first index is 0.
 *
 * LDAP allows more than one entry for an attribute, so it can, for example,
 * store a number of email addresses for one person's directory entry all
 * labeled with the attribute "mail"
 *
 *
 * return_value["count"] = number of values for attribute
 * return_value[0] = first value of attribute
 * return_value[i] = ith value of attribute
 *
 *
 * @throws LdapException
 *
 */
function ldap_get_values($ldap, $entry, string $attribute): array
{
    error_clear_last();
    $safeResult = \ldap_get_values($ldap, $entry, $attribute);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Adds one or more attribute values to the specified dn.
 * To add a whole new object see ldap_add function.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $dn The distinguished name of an LDAP entity.
 * @param array $entry An associative array listing the attirbute values to add. If an attribute was not existing yet it will be added. If an attribute is existing you can only add values to it if it supports multiple values.
 * @param array $controls Array of LDAP Controls to send with the request.
 * @throws LdapException
 *
 */
function ldap_mod_add($ldap, string $dn, array $entry, array $controls = null): void
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_mod_add($ldap, $dn, $entry, $controls);
    } else {
        $safeResult = \ldap_mod_add($ldap, $dn, $entry);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Removes one or more attribute values from the specified dn.
 * Object deletions are done by the
 * ldap_delete function.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $dn The distinguished name of an LDAP entity.
 * @param array $entry
 * @param array $controls Array of LDAP Controls to send with the request.
 * @throws LdapException
 *
 */
function ldap_mod_del($ldap, string $dn, array $entry, array $controls = null): void
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_mod_del($ldap, $dn, $entry, $controls);
    } else {
        $safeResult = \ldap_mod_del($ldap, $dn, $entry);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Replaces one or more attributes from the specified dn.
 * It may also add or remove attributes.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $dn The distinguished name of an LDAP entity.
 * @param array $entry An associative array listing the attributes to replace. Sending an empty array as value will remove the attribute, while sending an attribute not existing yet on this entry will add it.
 * @param array $controls Array of LDAP Controls to send with the request.
 * @throws LdapException
 *
 */
function ldap_mod_replace($ldap, string $dn, array $entry, array $controls = null): void
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_mod_replace($ldap, $dn, $entry, $controls);
    } else {
        $safeResult = \ldap_mod_replace($ldap, $dn, $entry);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Modifies an existing entry in the LDAP directory. Allows detailed
 * specification of the modifications to perform.
 *
 * @param resource $ldap An LDAP resource, returned by ldap_connect.
 * @param string $dn The distinguished name of an LDAP entity.
 * @param array $modifications_info An array that specifies the modifications to make. Each entry in this
 * array is an associative array with two or three keys:
 * attrib maps to the name of the attribute to modify,
 * modtype maps to the type of modification to perform,
 * and (depending on the type of modification) values
 * maps to an array of attribute values relevant to the modification.
 *
 * Possible values for modtype include:
 *
 *
 * LDAP_MODIFY_BATCH_ADD
 *
 *
 * Each value specified through values is added (as
 * an additional value) to the attribute named by
 * attrib.
 *
 *
 *
 *
 * LDAP_MODIFY_BATCH_REMOVE
 *
 *
 * Each value specified through values is removed
 * from the attribute named by attrib. Any value of
 * the attribute not contained in the values array
 * will remain untouched.
 *
 *
 *
 *
 * LDAP_MODIFY_BATCH_REMOVE_ALL
 *
 *
 * All values are removed from the attribute named by
 * attrib. A values entry must
 * not be provided.
 *
 *
 *
 *
 * LDAP_MODIFY_BATCH_REPLACE
 *
 *
 * All current values of the attribute named by
 * attrib are replaced with the values specified
 * through values.
 *
 *
 *
 *
 *
 * Each value specified through values is added (as
 * an additional value) to the attribute named by
 * attrib.
 *
 * Each value specified through values is removed
 * from the attribute named by attrib. Any value of
 * the attribute not contained in the values array
 * will remain untouched.
 *
 * All values are removed from the attribute named by
 * attrib. A values entry must
 * not be provided.
 *
 * All current values of the attribute named by
 * attrib are replaced with the values specified
 * through values.
 *
 * Note that any value for attrib must be a string, any
 * value for values must be an array of strings, and
 * any value for modtype must be one of the
 * LDAP_MODIFY_BATCH_* constants listed above.
 * @param array $controls Each value specified through values is added (as
 * an additional value) to the attribute named by
 * attrib.
 * @throws LdapException
 *
 */
function ldap_modify_batch($ldap, string $dn, array $modifications_info, array $controls = null): void
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_modify_batch($ldap, $dn, $modifications_info, $controls);
    } else {
        $safeResult = \ldap_modify_batch($ldap, $dn, $modifications_info);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Retrieves the attributes in an entry. The first call to
 * ldap_next_attribute is made with the
 * entry returned from
 * ldap_first_attribute.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $entry An LDAP\ResultEntry instance.
 * @return string Returns the next attribute in an entry on success and FALSE on
 * error.
 * @throws LdapException
 *
 */
function ldap_next_attribute($ldap, $entry): string
{
    error_clear_last();
    $safeResult = \ldap_next_attribute($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Parse LDAP extended operation data from result object result
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $result An LDAP\Result instance, returned by ldap_list or ldap_search.
 * @param string|null $response_data Will be filled by the response data.
 * @param string|null $response_oid Will be filled by the response OID.
 * @throws LdapException
 *
 */
function ldap_parse_exop($ldap, $result, ?string &$response_data = null, ?string &$response_oid = null): void
{
    error_clear_last();
    $safeResult = \ldap_parse_exop($ldap, $result, $response_data, $response_oid);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Parses an LDAP search result.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param resource $result An LDAP\Result instance, returned by ldap_list or ldap_search.
 * @param int|null $error_code A reference to a variable that will be set to the LDAP error code in
 * the result, or 0 if no error occurred.
 * @param string|null $matched_dn A reference to a variable that will be set to a matched DN if one was
 * recognised within the request, otherwise it will be set to NULL.
 * @param string|null $error_message A reference to a variable that will be set to the LDAP error message in
 * the result, or an empty string if no error occurred.
 * @param array|null $referrals A reference to a variable that will be set to an array set
 * to all of the referral strings in the result, or an empty array if no
 * referrals were returned.
 * @param array|null $controls An array of LDAP Controls which have been sent with the response.
 * @throws LdapException
 *
 */
function ldap_parse_result($ldap, $result, ?int &$error_code, ?string &$matched_dn = null, ?string &$error_message = null, ?array &$referrals = null, ?array &$controls = null): void
{
    error_clear_last();
    $safeResult = \ldap_parse_result($ldap, $result, $error_code, $matched_dn, $error_message, $referrals, $controls);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * The entry specified by dn is renamed/moved.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @param string $dn The distinguished name of an LDAP entity.
 * @param string $new_rdn The new RDN.
 * @param string $new_parent The new parent/superior entry.
 * @param bool $delete_old_rdn If TRUE the old RDN value(s) is removed, else the old RDN value(s)
 * is retained as non-distinguished values of the entry.
 * @param array $controls Array of LDAP Controls to send with the request.
 * @throws LdapException
 *
 */
function ldap_rename($ldap, string $dn, string $new_rdn, string $new_parent, bool $delete_old_rdn, array $controls = null): void
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_rename($ldap, $dn, $new_rdn, $new_parent, $delete_old_rdn, $controls);
    } else {
        $safeResult = \ldap_rename($ldap, $dn, $new_rdn, $new_parent, $delete_old_rdn);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $ldap
 * @param string $dn
 * @param string $password
 * @param string $mech
 * @param string $realm
 * @param string $authc_id
 * @param string $authz_id
 * @param string $props
 * @throws LdapException
 *
 */
function ldap_sasl_bind($ldap, string $dn = null, string $password = null, string $mech = null, string $realm = null, string $authc_id = null, string $authz_id = null, string $props = null): void
{
    error_clear_last();
    if ($props !== null) {
        $safeResult = \ldap_sasl_bind($ldap, $dn, $password, $mech, $realm, $authc_id, $authz_id, $props);
    } elseif ($authz_id !== null) {
        $safeResult = \ldap_sasl_bind($ldap, $dn, $password, $mech, $realm, $authc_id, $authz_id);
    } elseif ($authc_id !== null) {
        $safeResult = \ldap_sasl_bind($ldap, $dn, $password, $mech, $realm, $authc_id);
    } elseif ($realm !== null) {
        $safeResult = \ldap_sasl_bind($ldap, $dn, $password, $mech, $realm);
    } elseif ($mech !== null) {
        $safeResult = \ldap_sasl_bind($ldap, $dn, $password, $mech);
    } elseif ($password !== null) {
        $safeResult = \ldap_sasl_bind($ldap, $dn, $password);
    } elseif ($dn !== null) {
        $safeResult = \ldap_sasl_bind($ldap, $dn);
    } else {
        $safeResult = \ldap_sasl_bind($ldap);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Sets the value of the specified option to be value.
 *
 * @param resource|null $ldap Either an LDAP\Connection instance, returned by
 * ldap_connect, to set the option for that connection,
 * or NULL to set the option globally.
 * @param int $option The parameter option can be one of:
 *
 *
 *
 *
 * Option
 * Type
 * Available since
 *
 *
 *
 *
 * LDAP_OPT_DEREF
 * int
 *
 *
 *
 * LDAP_OPT_SIZELIMIT
 * int
 *
 *
 *
 * LDAP_OPT_TIMELIMIT
 * int
 *
 *
 *
 * LDAP_OPT_NETWORK_TIMEOUT
 * int
 *
 *
 *
 * LDAP_OPT_PROTOCOL_VERSION
 * int
 *
 *
 *
 * LDAP_OPT_ERROR_NUMBER
 * int
 *
 *
 *
 * LDAP_OPT_REFERRALS
 * bool
 *
 *
 *
 * LDAP_OPT_RESTART
 * bool
 *
 *
 *
 * LDAP_OPT_HOST_NAME
 * string
 *
 *
 *
 * LDAP_OPT_ERROR_STRING
 * string
 *
 *
 *
 * LDAP_OPT_DIAGNOSTIC_MESSAGE
 * string
 *
 *
 *
 * LDAP_OPT_MATCHED_DN
 * string
 *
 *
 *
 * LDAP_OPT_SERVER_CONTROLS
 * array
 *
 *
 *
 * LDAP_OPT_CLIENT_CONTROLS
 * array
 *
 *
 *
 * LDAP_OPT_X_KEEPALIVE_IDLE
 * int
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_KEEPALIVE_PROBES
 * int
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_KEEPALIVE_INTERVAL
 * int
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_CACERTDIR
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_CACERTFILE
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_CERTFILE
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_CIPHER_SUITE
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_CRLCHECK
 * int
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_CRLFILE
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_DHFILE
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_KEYFILE
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_PROTOCOL_MIN
 * int
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_RANDOM_FILE
 * string
 * PHP 7.1.0
 *
 *
 * LDAP_OPT_X_TLS_REQUIRE_CERT
 * int
 * PHP 7.0.5
 *
 *
 *
 *
 *
 * LDAP_OPT_SERVER_CONTROLS and
 * LDAP_OPT_CLIENT_CONTROLS require a list of
 * controls, this means that the value must be an array of controls. A
 * control consists of an oid identifying the control,
 * an optional value, and an optional flag for
 * criticality. In PHP a control is given by an
 * array containing an element with the key oid
 * and string value, and two optional elements. The optional
 * elements are key value with string value
 * and key iscritical with boolean value.
 * iscritical defaults to FALSE
 * if not supplied. See draft-ietf-ldapext-ldap-c-api-xx.txt
 * for details. See also the second example below.
 * @param mixed $value The new value for the specified option.
 * @throws LdapException
 *
 */
function ldap_set_option($ldap, int $option, $value): void
{
    error_clear_last();
    $safeResult = \ldap_set_option($ldap, $option, $value);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * Unbinds from the LDAP directory.
 *
 * @param resource $ldap An LDAP\Connection instance, returned by ldap_connect.
 * @throws LdapException
 *
 */
function ldap_unbind($ldap): void
{
    error_clear_last();
    $safeResult = \ldap_unbind($ldap);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}
