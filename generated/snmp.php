<?php

namespace Safe;

use Safe\Exceptions\SnmpException;

/**
 * This function is used to load additional, e.g. vendor specific, MIBs so that
 * human readable OIDs like VENDOR-MIB::foo.1 instead of error prone numeric OIDs
 * can be used.
 *
 * The order in which the MIBs are loaded does matter as the underlying Net-SNMP
 * library will print warnings if referenced objects cannot be resolved.
 *
 * @param string $filename The filename of the MIB.
 * @throws SnmpException
 *
 */
function snmp_read_mib(string $filename): void
{
    error_clear_last();
    $safeResult = \snmp_read_mib($filename);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
}


/**
 * The snmp2_get function is used to read the
 * value of an SNMP object specified by the
 * object_id.
 *
 * @param string $hostname The SNMP agent.
 * @param string $community The read community.
 * @param string $object_id The SNMP object.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return string Returns SNMP object value on success.
 * @throws SnmpException
 *
 */
function snmp2_get(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): string
{
    error_clear_last();
    $safeResult = \snmp2_get($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The snmp2_get_next function is used to read the
 * value of the SNMP object that follows the specified
 * object_id.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $community The read community.
 * @param string $object_id The SNMP object id which precedes the wanted one.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return string Returns SNMP object value on success.
 * In case of an error, an E_WARNING message is shown.
 * @throws SnmpException
 *
 */
function snmp2_getnext(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): string
{
    error_clear_last();
    $safeResult = \snmp2_getnext($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The snmp2_real_walk function is used to traverse over a number
 * of SNMP objects starting from object_id
 * and return not only their values but also their object ids.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $community The read community.
 * @param string $object_id The SNMP object id which precedes the wanted one.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return array Returns an associative array of the SNMP object ids and their values on success.
 * In case of an error, an E_WARNING message is shown.
 * @throws SnmpException
 *
 */
function snmp2_real_walk(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): array
{
    error_clear_last();
    $safeResult = \snmp2_real_walk($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * snmp2_set is used to set the value of an SNMP object
 * specified by the object_id.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $community The write community.
 * @param string $object_id The SNMP object id.
 * @param string $type
 * The MIB defines the type of each object id. It has to be specified as a single character from the below list.
 *
 *
 * If OPAQUE_SPECIAL_TYPES was defined while compiling the SNMP library, the following are also valid:
 *
 *
 * Most of these will use the obvious corresponding ASN.1 type.  's', 'x', 'd' and 'b' are all different ways of specifying an OCTET STRING value, and
 * the 'u' unsigned type is also used for handling Gauge32 values.
 *
 *
 * If the MIB-Files are loaded by into the MIB Tree with "snmp_read_mib" or by specifying it in the libsnmp config, '=' may be used as
 * the type parameter for all object ids as the type can then be automatically read from the MIB.
 *
 *
 * Note that there are two ways to set a variable of the type BITS like e.g.
 * "SYNTAX    BITS {telnet(0), ftp(1), http(2), icmp(3), snmp(4), ssh(5), https(6)}":
 *
 *
 * See examples section for more details.
 * @param string $value The new value.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @throws SnmpException
 *
 */
function snmp2_set(string $hostname, string $community, string $object_id, string $type, string $value, int $timeout = -1, int $retries = -1): void
{
    error_clear_last();
    $safeResult = \snmp2_set($hostname, $community, $object_id, $type, $value, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
}


/**
 * snmp2_walk function is used to read all the values from
 * an SNMP agent specified by the hostname.
 *
 * @param string $hostname The SNMP agent (server).
 * @param string $community The read community.
 * @param string $object_id If NULL, object_id is taken as the root of
 * the SNMP objects tree and all objects under that tree are returned as
 * an array.
 *
 * If object_id is specified, all the SNMP objects
 * below that object_id are returned.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return array Returns an array of SNMP object values starting from the
 * object_id as root.
 * @throws SnmpException
 *
 */
function snmp2_walk(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): array
{
    error_clear_last();
    $safeResult = \snmp2_walk($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The snmp3_get function is used to read the
 * value of an SNMP object specified by the
 * object_id.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $security_name the security name, usually some kind of username
 * @param string $security_level the security level (noAuthNoPriv|authNoPriv|authPriv)
 * @param string $auth_protocol the authentication protocol ("MD5", "SHA",
 * "SHA256", or "SHA512")
 * @param string $auth_passphrase the authentication pass phrase
 * @param string $privacy_protocol the privacy protocol (DES or AES)
 * @param string $privacy_passphrase the privacy pass phrase
 * @param string $object_id The SNMP object id.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return string Returns SNMP object value on success.
 * @throws SnmpException
 *
 */
function snmp3_get(string $hostname, string $security_name, string $security_level, string $auth_protocol, string $auth_passphrase, string $privacy_protocol, string $privacy_passphrase, string $object_id, int $timeout = -1, int $retries = -1): string
{
    error_clear_last();
    $safeResult = \snmp3_get($hostname, $security_name, $security_level, $auth_protocol, $auth_passphrase, $privacy_protocol, $privacy_passphrase, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The snmp3_getnext function is used to read the
 * value of the SNMP object that follows the specified
 * object_id.
 *
 * @param string $hostname The hostname of the
 * SNMP agent (server).
 * @param string $security_name the security name, usually some kind of username
 * @param string $security_level the security level (noAuthNoPriv|authNoPriv|authPriv)
 * @param string $auth_protocol the authentication protocol ("MD5", "SHA",
 * "SHA256", or "SHA512")
 * @param string $auth_passphrase the authentication pass phrase
 * @param string $privacy_protocol the privacy protocol (DES or AES)
 * @param string $privacy_passphrase the privacy pass phrase
 * @param string $object_id The SNMP object id.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return string Returns SNMP object value on success.
 * In case of an error, an E_WARNING message is shown.
 * @throws SnmpException
 *
 */
function snmp3_getnext(string $hostname, string $security_name, string $security_level, string $auth_protocol, string $auth_passphrase, string $privacy_protocol, string $privacy_passphrase, string $object_id, int $timeout = -1, int $retries = -1): string
{
    error_clear_last();
    $safeResult = \snmp3_getnext($hostname, $security_name, $security_level, $auth_protocol, $auth_passphrase, $privacy_protocol, $privacy_passphrase, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The
 * snmp3_real_walk function is used to traverse over a number
 * of
 * SNMP objects starting from
 * object_id
 * and return not only their values but also their object ids.
 *
 * @param string $hostname The hostname of the
 * SNMP agent (server).
 * @param string $security_name the security name, usually some kind of username
 * @param string $security_level the security level (noAuthNoPriv|authNoPriv|authPriv)
 * @param string $auth_protocol the authentication protocol (MD5 or SHA)
 * @param string $auth_passphrase the authentication pass phrase
 * @param string $privacy_protocol the authentication protocol ("MD5", "SHA",
 * "SHA256", or "SHA512")
 * @param string $privacy_passphrase the privacy pass phrase
 * @param string $object_id The SNMP object id.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return array Returns an associative array of the
 * SNMP object ids and their values on success.
 * In case of an error, an E_WARNING message is shown.
 * @throws SnmpException
 *
 */
function snmp3_real_walk(string $hostname, string $security_name, string $security_level, string $auth_protocol, string $auth_passphrase, string $privacy_protocol, string $privacy_passphrase, string $object_id, int $timeout = -1, int $retries = -1): array
{
    error_clear_last();
    $safeResult = \snmp3_real_walk($hostname, $security_name, $security_level, $auth_protocol, $auth_passphrase, $privacy_protocol, $privacy_passphrase, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * snmp3_set is used to set the value of an SNMP object
 * specified by the object_id.
 *
 * Even if the security level does not use an auth or priv protocol/password valid values have to be specified.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $security_name the security name, usually some kind of username
 * @param string $security_level the security level (noAuthNoPriv|authNoPriv|authPriv)
 * @param string $auth_protocol the authentication protocol (MD5 or SHA)
 * @param string $auth_passphrase the authentication pass phrase
 * @param string $privacy_protocol the privacy protocol (DES or AES)
 * @param string $privacy_passphrase the privacy pass phrase
 * @param string $object_id The SNMP object id.
 * @param string $type
 * The MIB defines the type of each object id. It has to be specified as a single character from the below list.
 *
 *
 * If OPAQUE_SPECIAL_TYPES was defined while compiling the SNMP library, the following are also valid:
 *
 *
 * Most of these will use the obvious corresponding ASN.1 type.  's', 'x', 'd' and 'b' are all different ways of specifying an OCTET STRING value, and
 * the 'u' unsigned type is also used for handling Gauge32 values.
 *
 *
 * If the MIB-Files are loaded by into the MIB Tree with "snmp_read_mib" or by specifying it in the libsnmp config, '=' may be used as
 * the type parameter for all object ids as the type can then be automatically read from the MIB.
 *
 *
 * Note that there are two ways to set a variable of the type BITS like e.g.
 * "SYNTAX    BITS {telnet(0), ftp(1), http(2), icmp(3), snmp(4), ssh(5), https(6)}":
 *
 *
 * See examples section for more details.
 * @param string $value The new value
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @throws SnmpException
 *
 */
function snmp3_set(string $hostname, string $security_name, string $security_level, string $auth_protocol, string $auth_passphrase, string $privacy_protocol, string $privacy_passphrase, string $object_id, string $type, string $value, int $timeout = -1, int $retries = -1): void
{
    error_clear_last();
    $safeResult = \snmp3_set($hostname, $security_name, $security_level, $auth_protocol, $auth_passphrase, $privacy_protocol, $privacy_passphrase, $object_id, $type, $value, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
}


/**
 * snmp3_walk function is used to read all the values from
 * an SNMP agent specified by the hostname.
 *
 * Even if the security level does not use an auth or priv protocol/password valid values have to be specified.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $security_name the security name, usually some kind of username
 * @param string $security_level the security level (noAuthNoPriv|authNoPriv|authPriv)
 * @param string $auth_protocol the authentication protocol ("MD5", "SHA",
 * "SHA256", or "SHA512")
 * @param string $auth_passphrase the authentication pass phrase
 * @param string $privacy_protocol the privacy protocol (DES or AES)
 * @param string $privacy_passphrase the privacy pass phrase
 * @param string $object_id If NULL, object_id is taken as the root of
 * the SNMP objects tree and all objects under that tree are returned as
 * an array.
 *
 * If object_id is specified, all the SNMP objects
 * below that object_id are returned.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return array Returns an array of SNMP object values starting from the
 * object_id as root.
 * @throws SnmpException
 *
 */
function snmp3_walk(string $hostname, string $security_name, string $security_level, string $auth_protocol, string $auth_passphrase, string $privacy_protocol, string $privacy_passphrase, string $object_id, int $timeout = -1, int $retries = -1): array
{
    error_clear_last();
    $safeResult = \snmp3_walk($hostname, $security_name, $security_level, $auth_protocol, $auth_passphrase, $privacy_protocol, $privacy_passphrase, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The snmpget function is used to read the
 * value of an SNMP object specified by the
 * object_id.
 *
 * @param string $hostname The SNMP agent.
 * @param string $community The read community.
 * @param string $object_id The SNMP object.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return string Returns SNMP object value on success.
 * @throws SnmpException
 *
 */
function snmpget(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): string
{
    error_clear_last();
    $safeResult = \snmpget($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The snmpgetnext function is used to read the
 * value of the SNMP object that follows the specified
 * object_id.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $community The read community.
 * @param string $object_id The SNMP object id which precedes the wanted one.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return string Returns SNMP object value on success.
 * In case of an error, an E_WARNING message is shown.
 * @throws SnmpException
 *
 */
function snmpgetnext(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): string
{
    error_clear_last();
    $safeResult = \snmpgetnext($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The snmprealwalk function is used to traverse over a number
 * of SNMP objects starting from object_id
 * and return not only their values but also their object ids.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $community The read community.
 * @param string $object_id The SNMP object id which precedes the wanted one.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return array Returns an associative array of the SNMP object ids and their values on success.
 * In case of an error, an E_WARNING message is shown.
 * @throws SnmpException
 *
 */
function snmprealwalk(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): array
{
    error_clear_last();
    $safeResult = \snmprealwalk($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * snmpset is used to set the value of an SNMP object
 * specified by the object_id.
 *
 * @param string $hostname The hostname of the SNMP agent (server).
 * @param string $community The write community.
 * @param string $object_id The SNMP object id.
 * @param string $type
 * The MIB defines the type of each object id. It has to be specified as a single character from the below list.
 *
 *
 * If OPAQUE_SPECIAL_TYPES was defined while compiling the SNMP library, the following are also valid:
 *
 *
 * Most of these will use the obvious corresponding ASN.1 type.  's', 'x', 'd' and 'b' are all different ways of specifying an OCTET STRING value, and
 * the 'u' unsigned type is also used for handling Gauge32 values.
 *
 *
 * If the MIB-Files are loaded by into the MIB Tree with "snmp_read_mib" or by specifying it in the libsnmp config, '=' may be used as
 * the type parameter for all object ids as the type can then be automatically read from the MIB.
 *
 *
 * Note that there are two ways to set a variable of the type BITS like e.g.
 * "SYNTAX    BITS {telnet(0), ftp(1), http(2), icmp(3), snmp(4), ssh(5), https(6)}":
 *
 *
 * See examples section for more details.
 * @param mixed $value The new value.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @throws SnmpException
 *
 */
function snmpset(string $hostname, string $community, string $object_id, string $type, $value, int $timeout = -1, int $retries = -1): void
{
    error_clear_last();
    $safeResult = \snmpset($hostname, $community, $object_id, $type, $value, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
}


/**
 * snmpwalk function is used to read all the values from
 * an SNMP agent specified by the hostname.
 *
 * @param string $hostname The SNMP agent (server).
 * @param string $community The read community.
 * @param string $object_id If NULL, object_id is taken as the root of
 * the SNMP objects tree and all objects under that tree are returned as
 * an array.
 *
 * If object_id is specified, all the SNMP objects
 * below that object_id are returned.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return array Returns an array of SNMP object values starting from the
 * object_id as root.
 * @throws SnmpException
 *
 */
function snmpwalk(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): array
{
    error_clear_last();
    $safeResult = \snmpwalk($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * snmpwalkoid function is used to read all object ids
 * and their respective values from an SNMP agent specified by
 * hostname.
 *
 * The existence of snmpwalkoid and
 * snmpwalk has historical reasons.  Both
 * functions are provided for backward compatibility.
 * Use snmprealwalk instead.
 *
 * @param string $hostname The SNMP agent.
 * @param string $community The read community.
 * @param string $object_id If NULL, object_id is taken as the root of
 * the SNMP objects tree and all objects under that tree are returned as
 * an array.
 *
 * If object_id is specified, all the SNMP objects
 * below that object_id are returned.
 * @param int $timeout The number of microseconds until the first timeout.
 * @param int $retries The number of times to retry if timeouts occur.
 * @return array Returns an associative array with object ids and their respective
 * object value starting from the object_id
 * as root.
 * @throws SnmpException
 *
 */
function snmpwalkoid(string $hostname, string $community, string $object_id, int $timeout = -1, int $retries = -1): array
{
    error_clear_last();
    $safeResult = \snmpwalkoid($hostname, $community, $object_id, $timeout, $retries);
    if ($safeResult === false) {
        throw SnmpException::createFromPhpError();
    }
    return $safeResult;
}
