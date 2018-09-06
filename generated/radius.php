<?php

namespace Safe;

/**
 * 
 * 
 * @return resource Returns a handle on success, FALSE on error. This function only fails if
 * insufficient memory is available.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_acct_open()
{
    error_clear_last();
    $result = \radius_acct_open();
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * radius_add_server may be called multiple times, and it
 * may be used together with radius_config. At most 10
 * servers may be specified. When multiple servers are given, they are tried
 * in round-robin fashion until a valid response is received, or until each
 * server's max_tries limit has been reached.
 * 
 * @param resource $radius_handle 
 * @param string $hostname The hostname parameter specifies the server host,
 * either as a fully qualified domain name or as a dotted-quad IP address
 * in text form.
 * @param int $port The port specifies the UDP port to contact on
 * the server. If port is given as 0, the library looks up the
 * radius/udp or
 * radacct/udp service in the
 * network services database, and uses the port found there.  If no entry
 * is found, the library uses the standard Radius ports, 1812 for
 * authentication and 1813 for accounting.
 * @param string $secret The shared secret for the server host is passed to the
 * secret parameter. The Radius protocol ignores
 * all but the leading 128 bytes of the shared secret.
 * @param int $timeout The timeout for receiving replies from the server is passed to the
 * timeout parameter, in units of seconds.
 * @param int $max_tries The maximum number of repeated requests to make before giving up is
 * passed into the max_tries.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_add_server($radius_handle, string $hostname, int $port, string $secret, int $timeout, int $max_tries): void
{
    error_clear_last();
    $result = \radius_add_server($radius_handle, $hostname, $port, $secret, $timeout, $max_tries);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @return resource Returns a handle on success, FALSE on error. This function only fails if
 * insufficient memory is available.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_auth_open()
{
    error_clear_last();
    $result = \radius_auth_open();
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * It is not needed to call this function because php frees all resources at
 * the end of each request.
 * 
 * @param resource $radius_handle 
 * @throws Exceptions\RadiusException
 * 
 */
function radius_close($radius_handle): void
{
    error_clear_last();
    $result = \radius_close($radius_handle);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Before issuing any Radius requests, the library must be made aware of the
 * servers it can contact. The easiest way to configure the library is to
 * call radius_config. radius_config
 * causes the library to read a configuration file whose format is described
 * in radius.conf.
 * 
 * @param resource $radius_handle 
 * @param string $file The pathname of the configuration file is passed as the file argument
 * to radius_config. The library can also be
 * configured programmatically by calls to
 * radius_add_server.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_config($radius_handle, string $file): void
{
    error_clear_last();
    $result = \radius_config($radius_handle, $file);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * A Radius request consists of a code specifying the kind of request, and
 * zero or more attributes which provide additional information. To begin
 * constructing a new request, call radius_create_request.
 * 
 * @param resource $radius_handle 
 * @param int $type Type is RADIUS_ACCESS_REQUEST or
 * RADIUS_ACCOUNTING_REQUEST.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_create_request($radius_handle, int $type): void
{
    error_clear_last();
    $result = \radius_create_request($radius_handle, $type);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * When using MPPE with MS-CHAPv2, the send- and recv-keys are mangled
 * (see RFC 2548), however this function is
 * useless, because I don't think that there is or will be a PPTP-MPPE
 * implementation in PHP.
 * 
 * @param resource $radius_handle 
 * @param string $mangled 
 * @return string Returns the demangled string, .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_demangle_mppe_key($radius_handle, string $mangled): string
{
    error_clear_last();
    $result = \radius_demangle_mppe_key($radius_handle, $mangled);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * Some data (Passwords, MS-CHAPv1 MPPE-Keys) is mangled for security reasons,
 * and must be demangled before you can use them.
 * 
 * @param resource $radius_handle 
 * @param string $mangled 
 * @return string Returns the demangled string, .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_demangle($radius_handle, string $mangled): string
{
    error_clear_last();
    $result = \radius_demangle($radius_handle, $mangled);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * If a tagged attribute has been returned from
 * radius_get_attr,
 * radius_get_tagged_attr_data will return the data from
 * the attribute.
 * 
 * @param string $data The tagged attribute to be decoded.
 * @return string Returns the data from the tagged attribute  .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_get_tagged_attr_data(string $data): string
{
    error_clear_last();
    $result = \radius_get_tagged_attr_data($data);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * If a tagged attribute has been returned from
 * radius_get_attr,
 * radius_get_tagged_attr_data will return the tag from
 * the attribute.
 * 
 * @param string $data The tagged attribute to be decoded.
 * @return int Returns the tag from the tagged attribute  .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_get_tagged_attr_tag(string $data): int
{
    error_clear_last();
    $result = \radius_get_tagged_attr_tag($data);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * If radius_get_attr returns
 * RADIUS_VENDOR_SPECIFIC,
 * radius_get_vendor_attr may be called to determine the
 * vendor.
 * 
 * @param string $data 
 * @return array Returns an associative array containing the attribute-type, vendor and the
 * data, .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_get_vendor_attr(string $data): array
{
    error_clear_last();
    $result = \radius_get_vendor_attr($data);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * Attaches an IP address attribute to the current RADIUS request.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $type The attribute type.
 * @param string $addr An IPv4 address in string form, such as 10.0.0.1.
 * @param int $options A bitmask of the attribute options. The available options include RADIUS_OPTION_TAGGED and RADIUS_OPTION_SALT.
 * @param int $tag The attribute tag. This parameter is ignored unless the RADIUS_OPTION_TAGGED option is set.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_addr($radius_handle, int $type, string $addr, int $options = 0, int $tag = null): void
{
    error_clear_last();
    if ($tag !== null) {
        $result = \radius_put_addr($radius_handle, $type, $addr, $options, $tag);
    }else {
        $result = \radius_put_addr($radius_handle, $type, $addr, $options);
    }
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Attaches a binary attribute to the current RADIUS request.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $type The attribute type.
 * @param string $value The attribute value, which will be treated as a raw binary string.
 * @param int $options A bitmask of the attribute options. The available options include RADIUS_OPTION_TAGGED and RADIUS_OPTION_SALT.
 * @param int $tag The attribute tag. This parameter is ignored unless the RADIUS_OPTION_TAGGED option is set.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_attr($radius_handle, int $type, string $value, int $options = 0, int $tag = null): void
{
    error_clear_last();
    if ($tag !== null) {
        $result = \radius_put_attr($radius_handle, $type, $value, $options, $tag);
    }else {
        $result = \radius_put_attr($radius_handle, $type, $value, $options);
    }
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Attaches an integer attribute to the current RADIUS request.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $type The attribute type.
 * @param int $value The attribute value.
 * @param int $options A bitmask of the attribute options. The available options include RADIUS_OPTION_TAGGED and RADIUS_OPTION_SALT.
 * @param int $tag The attribute tag. This parameter is ignored unless the RADIUS_OPTION_TAGGED option is set.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_int($radius_handle, int $type, int $value, int $options = 0, int $tag = null): void
{
    error_clear_last();
    if ($tag !== null) {
        $result = \radius_put_int($radius_handle, $type, $value, $options, $tag);
    }else {
        $result = \radius_put_int($radius_handle, $type, $value, $options);
    }
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Attaches a string attribute to the current RADIUS request. In general,
 * radius_put_attr is a more useful function for
 * attaching string attributes, as it is binary safe.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $type The attribute type.
 * @param string $value The attribute value. This value is expected by the underlying library
 * to be null terminated, therefore this parameter is not binary safe.
 * @param int $options A bitmask of the attribute options. The available options include RADIUS_OPTION_TAGGED and RADIUS_OPTION_SALT.
 * @param int $tag The attribute tag. This parameter is ignored unless the RADIUS_OPTION_TAGGED option is set.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_string($radius_handle, int $type, string $value, int $options = 0, int $tag = null): void
{
    error_clear_last();
    if ($tag !== null) {
        $result = \radius_put_string($radius_handle, $type, $value, $options, $tag);
    }else {
        $result = \radius_put_string($radius_handle, $type, $value, $options);
    }
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Attaches an IP address vendor specific attribute to the current RADIUS
 * request.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $vendor The vendor ID.
 * @param int $type The attribute type.
 * @param string $addr An IPv4 address in string form, such as 10.0.0.1.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_vendor_addr($radius_handle, int $vendor, int $type, string $addr): void
{
    error_clear_last();
    $result = \radius_put_vendor_addr($radius_handle, $vendor, $type, $addr);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Attaches a vendor specific binary attribute to the current RADIUS request.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $vendor The vendor ID.
 * @param int $type The attribute type.
 * @param string $value The attribute value, which will be treated as a raw binary string.
 * @param int $options A bitmask of the attribute options. The available options include RADIUS_OPTION_TAGGED and RADIUS_OPTION_SALT.
 * @param int $tag The attribute tag. This parameter is ignored unless the RADIUS_OPTION_TAGGED option is set.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_vendor_attr($radius_handle, int $vendor, int $type, string $value, int $options = 0, int $tag = null): void
{
    error_clear_last();
    if ($tag !== null) {
        $result = \radius_put_vendor_attr($radius_handle, $vendor, $type, $value, $options, $tag);
    }else {
        $result = \radius_put_vendor_attr($radius_handle, $vendor, $type, $value, $options);
    }
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Attaches a vendor specific integer attribute to the current RADIUS request.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $vendor The vendor ID.
 * @param int $type The attribute type.
 * @param int $value The attribute value.
 * @param int $options A bitmask of the attribute options. The available options include RADIUS_OPTION_TAGGED and RADIUS_OPTION_SALT.
 * @param int $tag The attribute tag. This parameter is ignored unless the RADIUS_OPTION_TAGGED option is set.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_vendor_int($radius_handle, int $vendor, int $type, int $value, int $options = 0, int $tag = null): void
{
    error_clear_last();
    if ($tag !== null) {
        $result = \radius_put_vendor_int($radius_handle, $vendor, $type, $value, $options, $tag);
    }else {
        $result = \radius_put_vendor_int($radius_handle, $vendor, $type, $value, $options);
    }
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * Attaches a vendor specific string attribute to the current RADIUS request.
 * In general, radius_put_vendor_attr is a more useful
 * function for attaching string attributes, as it is binary safe.
 * 
 * @param resource $radius_handle The RADIUS resource.
 * @param int $vendor The vendor ID.
 * @param int $type The attribute type.
 * @param string $value The attribute value. This value is expected by the underlying library
 * to be null terminated, therefore this parameter is not binary safe.
 * @param int $options A bitmask of the attribute options. The available options include RADIUS_OPTION_TAGGED and RADIUS_OPTION_SALT.
 * @param int $tag The attribute tag. This parameter is ignored unless the RADIUS_OPTION_TAGGED option is set.
 * @throws Exceptions\RadiusException
 * 
 */
function radius_put_vendor_string($radius_handle, int $vendor, int $type, string $value, int $options = 0, int $tag = null): void
{
    error_clear_last();
    if ($tag !== null) {
        $result = \radius_put_vendor_string($radius_handle, $vendor, $type, $value, $options, $tag);
    }else {
        $result = \radius_put_vendor_string($radius_handle, $vendor, $type, $value, $options);
    }
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
}


/**
 * The request authenticator is needed for demangling mangled data like
 * passwords and encryption-keys.
 * 
 * @param resource $radius_handle 
 * @return string Returns the request authenticator as string, .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_request_authenticator($radius_handle): string
{
    error_clear_last();
    $result = \radius_request_authenticator($radius_handle);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * Applies the RADIUS salt-encryption algorithm to the given value.
 * 
 * In general, this is achieved automatically by providing the
 * RADIUS_OPTION_SALT option to an attribute setter
 * function, but this function can be used if low-level request construction
 * is required.
 * 
 * @param resource $radius_handle The data to be salt-encrypted.
 * @param string $data 
 * @return string Returns the salt-encrypted data  .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_salt_encrypt_attr($radius_handle, string $data): string
{
    error_clear_last();
    $result = \radius_salt_encrypt_attr($radius_handle, $data);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


/**
 * The shared secret is needed as salt for demangling mangled data like
 * passwords and encryption-keys.
 * 
 * @param resource $radius_handle 
 * @return string Returns the server's shared secret as string, .
 * @throws Exceptions\RadiusException
 * 
 */
function radius_server_secret($radius_handle): string
{
    error_clear_last();
    $result = \radius_server_secret($radius_handle);
    if ($result === FALSE) {
        throw Exceptions\RadiusException::createFromPhpError();
    }
    return $result;
}


