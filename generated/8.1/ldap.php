<?php

namespace Safe;

use Safe\Exceptions\LdapException;

/**
 * @param string $value
 * @return string
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
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param array $entry
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_add(\LDAP\Connection $ldap, string $dn, array $entry, ?array $controls = null): void
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
 * @param \LDAP\Connection $ldap
 * @param null|string $dn
 * @param null|string $password
 * @throws LdapException
 *
 */
function ldap_bind(\LDAP\Connection $ldap, ?string $dn = null, ?string $password = null): void
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
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param string $attribute
 * @param string $value
 * @param array|null $controls
 * @return bool
 * @throws LdapException
 *
 */
function ldap_compare(\LDAP\Connection $ldap, string $dn, string $attribute, string $value, ?array $controls = null): bool
{
    error_clear_last();
    if ($controls !== null) {
        $safeResult = \ldap_compare($ldap, $dn, $attribute, $value, $controls);
    } else {
        $safeResult = \ldap_compare($ldap, $dn, $attribute, $value);
    }
    if ($safeResult === -1) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $link
 * @param resource $result
 * @param null|string $cookie
 * @param int|null $estimated
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
 * @param resource $link
 * @param int $pagesize
 * @param bool $iscritical
 * @param string $cookie
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
 * @param \LDAP\Connection $ldap
 * @param \LDAP\Result $result
 * @return int
 * @throws LdapException
 *
 */
function ldap_count_entries(\LDAP\Connection $ldap, \LDAP\Result $result): int
{
    error_clear_last();
    $safeResult = \ldap_count_entries($ldap, $result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_delete(\LDAP\Connection $ldap, string $dn, ?array $controls = null): void
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
 * @param string $dn
 * @return string
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
 * @param \LDAP\Connection $ldap
 * @param string $user
 * @param string $old_password
 * @param string $new_password
 * @param array|null $controls
 * @return bool|string
 * @throws LdapException
 *
 */
function ldap_exop_passwd(\LDAP\Connection $ldap, string $user = "", string $old_password = "", string $new_password = "", ?array &$controls = null)
{
    error_clear_last();
    $safeResult = \ldap_exop_passwd($ldap, $user, $old_password, $new_password, $controls);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @return bool|string
 * @throws LdapException
 *
 */
function ldap_exop_whoami(\LDAP\Connection $ldap)
{
    error_clear_last();
    $safeResult = \ldap_exop_whoami($ldap);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param string $reqoid
 * @param null|string $reqdata
 * @param array|null $serverctrls
 * @param null|string $retdata
 * @param null|string $retoid
 * @return bool|resource
 * @throws LdapException
 *
 */
function ldap_exop(\LDAP\Connection $ldap, string $reqoid, ?string $reqdata = null, ?array $serverctrls = null, ?string &$retdata = null, ?string &$retoid = null)
{
    error_clear_last();
    if ($retoid !== null) {
        $safeResult = \ldap_exop($ldap, $reqoid, $reqdata, $serverctrls, $retdata, $retoid);
    } elseif ($retdata !== null) {
        $safeResult = \ldap_exop($ldap, $reqoid, $reqdata, $serverctrls, $retdata);
    } elseif ($serverctrls !== null) {
        $safeResult = \ldap_exop($ldap, $reqoid, $reqdata, $serverctrls);
    } elseif ($reqdata !== null) {
        $safeResult = \ldap_exop($ldap, $reqoid, $reqdata);
    } else {
        $safeResult = \ldap_exop($ldap, $reqoid);
    }
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $dn
 * @param int $with_attrib
 * @return array
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
 * @param \LDAP\Connection $ldap
 * @param \LDAP\ResultEntry $entry
 * @return string
 * @throws LdapException
 *
 */
function ldap_first_attribute(\LDAP\Connection $ldap, \LDAP\ResultEntry $entry): string
{
    error_clear_last();
    $safeResult = \ldap_first_attribute($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\Result $result
 * @return \LDAP\ResultEntry
 * @throws LdapException
 *
 */
function ldap_first_entry(\LDAP\Connection $ldap, \LDAP\Result $result): \LDAP\ResultEntry
{
    error_clear_last();
    $safeResult = \ldap_first_entry($ldap, $result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Result $result
 * @throws LdapException
 *
 */
function ldap_free_result(\LDAP\Result $result): void
{
    error_clear_last();
    $safeResult = \ldap_free_result($result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\ResultEntry $entry
 * @return array
 * @throws LdapException
 *
 */
function ldap_get_attributes(\LDAP\Connection $ldap, \LDAP\ResultEntry $entry): array
{
    error_clear_last();
    $safeResult = \ldap_get_attributes($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\ResultEntry $entry
 * @return string
 * @throws LdapException
 *
 */
function ldap_get_dn(\LDAP\Connection $ldap, \LDAP\ResultEntry $entry): string
{
    error_clear_last();
    $safeResult = \ldap_get_dn($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\Result $result
 * @return array
 * @throws LdapException
 *
 */
function ldap_get_entries(\LDAP\Connection $ldap, \LDAP\Result $result): array
{
    error_clear_last();
    $safeResult = \ldap_get_entries($ldap, $result);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param int $option
 * @param mixed $value
 * @throws LdapException
 *
 */
function ldap_get_option(\LDAP\Connection $ldap, int $option, &$value = null): void
{
    error_clear_last();
    $safeResult = \ldap_get_option($ldap, $option, $value);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\ResultEntry $entry
 * @param string $attribute
 * @return array
 * @throws LdapException
 *
 */
function ldap_get_values_len(\LDAP\Connection $ldap, \LDAP\ResultEntry $entry, string $attribute): array
{
    error_clear_last();
    $safeResult = \ldap_get_values_len($ldap, $entry, $attribute);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\ResultEntry $entry
 * @param string $attribute
 * @return array
 * @throws LdapException
 *
 */
function ldap_get_values(\LDAP\Connection $ldap, \LDAP\ResultEntry $entry, string $attribute): array
{
    error_clear_last();
    $safeResult = \ldap_get_values($ldap, $entry, $attribute);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param array $entry
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_mod_add(\LDAP\Connection $ldap, string $dn, array $entry, ?array $controls = null): void
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
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param array $entry
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_mod_del(\LDAP\Connection $ldap, string $dn, array $entry, ?array $controls = null): void
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
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param array $entry
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_mod_replace(\LDAP\Connection $ldap, string $dn, array $entry, ?array $controls = null): void
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
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param array $modifications_info
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_modify_batch(\LDAP\Connection $ldap, string $dn, array $modifications_info, ?array $controls = null): void
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
 * @param \LDAP\Connection $ldap
 * @param \LDAP\ResultEntry $entry
 * @return string
 * @throws LdapException
 *
 */
function ldap_next_attribute(\LDAP\Connection $ldap, \LDAP\ResultEntry $entry): string
{
    error_clear_last();
    $safeResult = \ldap_next_attribute($ldap, $entry);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\Result $result
 * @param null|string $response_data
 * @param null|string $response_oid
 * @throws LdapException
 *
 */
function ldap_parse_exop(\LDAP\Connection $ldap, \LDAP\Result $result, ?string &$response_data = null, ?string &$response_oid = null): void
{
    error_clear_last();
    $safeResult = \ldap_parse_exop($ldap, $result, $response_data, $response_oid);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * @param \LDAP\Connection $ldap
 * @param \LDAP\Result $result
 * @param int|null $error_code
 * @param null|string $matched_dn
 * @param null|string $error_message
 * @param array|null $referrals
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_parse_result(\LDAP\Connection $ldap, \LDAP\Result $result, ?int &$error_code, ?string &$matched_dn = null, ?string &$error_message = null, ?array &$referrals = null, ?array &$controls = null): void
{
    error_clear_last();
    $safeResult = \ldap_parse_result($ldap, $result, $error_code, $matched_dn, $error_message, $referrals, $controls);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}


/**
 * @param \LDAP\Connection $ldap
 * @param string $dn
 * @param string $new_rdn
 * @param string $new_parent
 * @param bool $delete_old_rdn
 * @param array|null $controls
 * @throws LdapException
 *
 */
function ldap_rename(\LDAP\Connection $ldap, string $dn, string $new_rdn, string $new_parent, bool $delete_old_rdn, ?array $controls = null): void
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
 * @param \LDAP\Connection $ldap
 * @param null|string $dn
 * @param null|string $password
 * @param null|string $mech
 * @param null|string $realm
 * @param null|string $authc_id
 * @param null|string $authz_id
 * @param null|string $props
 * @throws LdapException
 *
 */
function ldap_sasl_bind(\LDAP\Connection $ldap, ?string $dn = null, ?string $password = null, ?string $mech = null, ?string $realm = null, ?string $authc_id = null, ?string $authz_id = null, ?string $props = null): void
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
 * @param null|resource $ldap
 * @param int $option
 * @param mixed $value
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
 * @param \LDAP\Connection $ldap
 * @throws LdapException
 *
 */
function ldap_unbind(\LDAP\Connection $ldap): void
{
    error_clear_last();
    $safeResult = \ldap_unbind($ldap);
    if ($safeResult === false) {
        throw LdapException::createFromPhpError();
    }
}
