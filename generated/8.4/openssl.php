<?php

namespace Safe;

use Safe\Exceptions\OpensslException;

/**
 * Gets the cipher initialization vector (iv) length.
 *
 * @param string $cipher_algo The cipher method, see openssl_get_cipher_methods for a list of potential values.
 * @return int Returns the cipher length on success.
 * @throws OpensslException
 *
 */
function openssl_cipher_iv_length(string $cipher_algo): int
{
    error_clear_last();
    $safeResult = \openssl_cipher_iv_length($cipher_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the cipher key length.
 *
 * @param string $cipher_algo The cipher method, see openssl_get_cipher_methods for a list of potential values.
 * @return  Returns the cipher length on success.
 * @throws OpensslException
 *
 */
function openssl_cipher_key_length(string $cipher_algo): void
{
    error_clear_last();
    $safeResult = \openssl_cipher_key_length($cipher_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * Decrypts a CMS message.
 *
 * @param string $input_filename The name of a file containing encrypted content.
 * @param string $output_filename The name of the file to deposit the decrypted content.
 * @param  $certificate The name of the file containing a certificate of the recipient.
 * @param  $private_key The name of the file containing a PKCS#8 key.
 * @param int $encoding The encoding of the input file. One of OPENSSL_ENCODING_SMIME,
 * OPENSSL_ENCODING_DER or OPENSSL_ENCODING_PEM.
 * @throws OpensslException
 *
 */
function openssl_cms_decrypt(string $input_filename, string $output_filename, $certificate, $private_key = null, int $encoding = OPENSSL_ENCODING_SMIME): void
{
    error_clear_last();
    if ($encoding !== OPENSSL_ENCODING_SMIME) {
        $safeResult = \openssl_cms_decrypt($input_filename, $output_filename, $certificate, $private_key, $encoding);
    } elseif ($private_key !== null) {
        $safeResult = \openssl_cms_decrypt($input_filename, $output_filename, $certificate, $private_key);
    } else {
        $safeResult = \openssl_cms_decrypt($input_filename, $output_filename, $certificate);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * This function encrypts content to one or more recipients,
 * based on the certificates that are passed to it.
 *
 * @param string $input_filename The file to be encrypted.
 * @param string $output_filename The output file.
 * @param  $certificate Recipients to encrypt to.
 * @param  $headers Headers to include when S/MIME is used.
 * @param int $flags Flags to be passed to CMS_sign.
 * @param int $encoding An encoding to output. One of OPENSSL_ENCODING_SMIME,
 * OPENSSL_ENCODING_DER or OPENSSL_ENCODING_PEM.
 * @param int $cipher_algo A cypher to use.
 * @throws OpensslException
 *
 */
function openssl_cms_encrypt(string $input_filename, string $output_filename, $certificate, $headers, int $flags = 0, int $encoding = OPENSSL_ENCODING_SMIME, int $cipher_algo = OPENSSL_CIPHER_AES_128_CBC): void
{
    error_clear_last();
    $safeResult = \openssl_cms_encrypt($input_filename, $output_filename, $certificate, $headers, $flags, $encoding, $cipher_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * Performs the exact analog to openssl_pkcs7_read.
 *
 * @param string $input_filename
 * @param array $certificates
 * @throws OpensslException
 *
 */
function openssl_cms_read(string $input_filename, array &$certificates): void
{
    error_clear_last();
    $safeResult = \openssl_cms_read($input_filename, $certificates);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * This function signs a file with an X.509 certificate and key.
 *
 * @param string $input_filename The name of the file to be signed.
 * @param string $output_filename The name of the file to deposit the results.
 * @param  $certificate The signing certificate.
 * See Key/Certificate parameters for a list of valid values.
 * @param  $private_key The key associated with certificate.
 * See Key/Certificate parameters for a list of valid values.
 * @param  $headers An array of headers to be included in S/MIME output.
 * @param int $flags Flags to be passed to cms_sign.
 * @param int $encoding The encoding of the output file. One of OPENSSL_ENCODING_SMIME,
 * OPENSSL_ENCODING_DER or OPENSSL_ENCODING_PEM.
 * @param  $untrusted_certificates_filename Intermediate certificates to be included in the signature.
 * @throws OpensslException
 *
 */
function openssl_cms_sign(string $input_filename, string $output_filename, $certificate, $private_key, $headers, int $flags = 0, int $encoding = OPENSSL_ENCODING_SMIME, $untrusted_certificates_filename = null): void
{
    error_clear_last();
    if ($untrusted_certificates_filename !== null) {
        $safeResult = \openssl_cms_sign($input_filename, $output_filename, $certificate, $private_key, $headers, $flags, $encoding, $untrusted_certificates_filename);
    } else {
        $safeResult = \openssl_cms_sign($input_filename, $output_filename, $certificate, $private_key, $headers, $flags, $encoding);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * This function verifies a CMS signature, either attached or detached, with the specified encoding.
 *
 * @param string $input_filename The input file.
 * @param int $flags Flags to pass to cms_verify.
 * @param  $certificates A file with the signer certificate and optionally intermediate certificates.
 * @param array $ca_info An array containing self-signed certificate authority certificates.
 * @param  $untrusted_certificates_filename A file containing additional intermediate certificates.
 * @param  $content A file pointing to the content when signatures are detached.
 * @param  $pk7
 * @param  $sigfile A file to save the signature to.
 * @param int $encoding The encoding of the input file. One of OPENSSL_ENCODING_SMIME,
 * OPENSSL_ENCODING_DER or OPENSSL_ENCODING_PEM.
 * @throws OpensslException
 *
 */
function openssl_cms_verify(string $input_filename, int $flags = 0, $certificates = null, array $ca_info = [], $untrusted_certificates_filename = null, $content = null, $pk7 = null, $sigfile = null, int $encoding = OPENSSL_ENCODING_SMIME): void
{
    error_clear_last();
    if ($encoding !== OPENSSL_ENCODING_SMIME) {
        $safeResult = \openssl_cms_verify($input_filename, $flags, $certificates, $ca_info, $untrusted_certificates_filename, $content, $pk7, $sigfile, $encoding);
    } elseif ($sigfile !== null) {
        $safeResult = \openssl_cms_verify($input_filename, $flags, $certificates, $ca_info, $untrusted_certificates_filename, $content, $pk7, $sigfile);
    } elseif ($pk7 !== null) {
        $safeResult = \openssl_cms_verify($input_filename, $flags, $certificates, $ca_info, $untrusted_certificates_filename, $content, $pk7);
    } elseif ($content !== null) {
        $safeResult = \openssl_cms_verify($input_filename, $flags, $certificates, $ca_info, $untrusted_certificates_filename, $content);
    } elseif ($untrusted_certificates_filename !== null) {
        $safeResult = \openssl_cms_verify($input_filename, $flags, $certificates, $ca_info, $untrusted_certificates_filename);
    } elseif ($ca_info !== []) {
        $safeResult = \openssl_cms_verify($input_filename, $flags, $certificates, $ca_info);
    } elseif ($certificates !== null) {
        $safeResult = \openssl_cms_verify($input_filename, $flags, $certificates);
    } else {
        $safeResult = \openssl_cms_verify($input_filename, $flags);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_csr_export_to_file takes the Certificate
 * Signing Request represented by csr and saves it
 * in PEM format into the file named by
 * output_filename.
 *
 * @param string|resource $csr See CSR parameters for a list of valid values.
 * @param string $output_filename Path to the output file.
 * @param bool $no_text
 * The optional parameter notext affects
 * the verbosity of the output; if it is FALSE, then additional human-readable
 * information is included in the output. The default value of
 * notext is TRUE.
 * @throws OpensslException
 *
 */
function openssl_csr_export_to_file($csr, string $output_filename, bool $no_text = true): void
{
    error_clear_last();
    $safeResult = \openssl_csr_export_to_file($csr, $output_filename, $no_text);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_csr_export takes the Certificate Signing
 * Request represented by csr and stores it in
 * PEM format in output, which is passed by
 * reference.
 *
 * @param string|resource $csr See CSR parameters for a list of valid values.
 * @param string|null $output on success, this string will contain the PEM
 * encoded CSR
 * @param bool $no_text
 * The optional parameter notext affects
 * the verbosity of the output; if it is FALSE, then additional human-readable
 * information is included in the output. The default value of
 * notext is TRUE.
 * @throws OpensslException
 *
 */
function openssl_csr_export($csr, ?string &$output, bool $no_text = true): void
{
    error_clear_last();
    $safeResult = \openssl_csr_export($csr, $output, $no_text);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_csr_get_public_key extracts the public key
 * from csr and prepares it for use by other functions.
 *
 * @param string|resource $csr See CSR parameters for a list of valid values.
 * @param bool $short_names This parameter is ignored
 * @return resource Returns an OpenSSLAsymmetricKey on success.
 * @throws OpensslException
 *
 */
function openssl_csr_get_public_key($csr, bool $short_names = true)
{
    error_clear_last();
    $safeResult = \openssl_csr_get_public_key($csr, $short_names);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_csr_get_subject returns subject
 * distinguished name information encoded in the csr
 * including fields commonName (CN), organizationName (O), countryName (C) etc.
 *
 * @param string|resource $csr See CSR parameters for a list of valid values.
 * @param bool $short_names short_names controls how the data is indexed in the
 * array - if short_names is TRUE (the default) then
 * fields will be indexed with the short name form, otherwise, the long name
 * form will be used - e.g.: CN is the shortname form of commonName.
 * @return array Returns an associative array with subject description.
 * @throws OpensslException
 *
 */
function openssl_csr_get_subject($csr, bool $short_names = true): array
{
    error_clear_last();
    $safeResult = \openssl_csr_get_subject($csr, $short_names);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_csr_new generates a new CSR
 * based on the information provided by distinguished_names.
 *
 * @param array $distinguished_names The Distinguished Name or subject fields to be used in the certificate.
 * @param resource $private_key private_key should be set to a private key that
 * was previously generated by openssl_pkey_new (or
 * otherwise obtained from the other openssl_pkey family of functions), or
 * NULL variable. If its value is NULL variable, a new private key is
 * generated based on the supplied options and
 * assigned to supplied variable. The corresponding public portion of the
 * key will be used to sign the CSR.
 * @param array $options By default, the information in your system openssl.conf
 * is used to initialize the request; you can specify a configuration file
 * section by setting the config_section_section key in
 * options.  You can also specify an alternative
 * OpenSSL configuration file by setting the value of the
 * config key to the path of the file you want to use.
 * The following keys, if present in options
 * behave as their equivalents in the openssl.conf, as
 * listed in the table below.
 *
 * Configuration overrides
 *
 *
 *
 * options key
 * type
 * openssl.conf equivalent
 * description
 *
 *
 *
 *
 * digest_alg
 * string
 * default_md
 * Digest method or signature hash, usually one of openssl_get_md_methods
 *
 *
 * x509_extensions
 * string
 * x509_extensions
 * Selects which extensions should be used when creating an x509
 * certificate
 *
 *
 * req_extensions
 * string
 * req_extensions
 * Selects which extensions should be used when creating a CSR
 *
 *
 * private_key_bits
 * int
 * default_bits
 * Specifies how many bits should be used to generate a private key
 *
 *
 * private_key_type
 * int
 * none
 * Specifies the type of private key to create.  This can be one
 * of OPENSSL_KEYTYPE_DSA,
 * OPENSSL_KEYTYPE_DH,
 * OPENSSL_KEYTYPE_RSA or
 * OPENSSL_KEYTYPE_EC.
 * The default value is OPENSSL_KEYTYPE_RSA.
 *
 *
 *
 * encrypt_key
 * bool
 * encrypt_key
 * Should an exported key (with passphrase) be encrypted?
 *
 *
 * encrypt_key_cipher
 * int
 * none
 *
 * One of cipher constants.
 *
 *
 *
 * curve_name
 * string
 * none
 *
 * One of openssl_get_curve_names.
 *
 *
 *
 * config
 * string
 * N/A
 *
 * Path to your own alternative openssl.conf file.
 *
 *
 *
 *
 *
 * @param array $extra_attributes extra_attributes is used to specify additional
 * configuration options for the CSR.  Both
 * distinguished_names and
 * extra_attributes are associative arrays, whose keys
 * are converted to OIDs and applied to the relevant part of the request.
 * @return resource Returns the CSR on success, TRUE if CSR creation is
 * successful but signing fails.
 * @throws OpensslException
 *
 */
function openssl_csr_new(array $distinguished_names, &$private_key, ?array $options = null, ?array $extra_attributes = null)
{
    error_clear_last();
    if ($extra_attributes !== null) {
        $safeResult = \openssl_csr_new($distinguished_names, $private_key, $options, $extra_attributes);
    } elseif ($options !== null) {
        $safeResult = \openssl_csr_new($distinguished_names, $private_key, $options);
    } else {
        $safeResult = \openssl_csr_new($distinguished_names, $private_key);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_csr_sign generates an x509 certificate from the given CSR.
 *
 * @param string|resource $csr A CSR previously generated by openssl_csr_new.
 * It can also be the path to a PEM encoded CSR when specified as
 * file://path/to/csr or an exported string generated
 * by openssl_csr_export.
 * @param string|resource|null $ca_certificate The generated certificate will be signed by ca_certificate.
 * If ca_certificate is NULL, the generated certificate
 * will be a self-signed certificate.
 * @param string|resource|array $private_key private_key is the private key that corresponds to
 * ca_certificate.
 * @param int $days days specifies the length of time for which the
 * generated certificate will be valid, in days.
 * @param array $options You can finetune the CSR signing by options.
 * See openssl_csr_new for more information about
 * options.
 * @param int $serial An optional the serial number of issued certificate. If not specified
 * it will default to 0.
 * @param  $serial_hex
 * @return resource Returns an OpenSSLCertificate on success, FALSE on failure.
 * @throws OpensslException
 *
 */
function openssl_csr_sign($csr, $ca_certificate, $private_key, int $days, ?array $options = null, int $serial = 0, $serial_hex = null)
{
    error_clear_last();
    if ($serial_hex !== null) {
        $safeResult = \openssl_csr_sign($csr, $ca_certificate, $private_key, $days, $options, $serial, $serial_hex);
    } elseif ($serial !== 0) {
        $safeResult = \openssl_csr_sign($csr, $ca_certificate, $private_key, $days, $options, $serial);
    } elseif ($options !== null) {
        $safeResult = \openssl_csr_sign($csr, $ca_certificate, $private_key, $days, $options);
    } else {
        $safeResult = \openssl_csr_sign($csr, $ca_certificate, $private_key, $days);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Takes a raw or base64 encoded string and decrypts it using a given method and passphrase.
 *
 * @param string $data The encrypted message to be decrypted.
 * @param string $cipher_algo The cipher method. For a list of available cipher methods, use
 * openssl_get_cipher_methods.
 * @param string $passphrase The passphrase. If the passphrase is shorter than expected, it is silently padded with
 * NUL characters; if the passphrase is longer than expected, it is
 * silently truncated.
 * @param int $options options can be one of
 * OPENSSL_RAW_DATA,
 * OPENSSL_ZERO_PADDING
 * or OPENSSL_DONT_ZERO_PAD_KEY.
 * @param string $iv A non-NULL Initialization Vector. If the IV is shorter than expected, it is padded with
 * NUL characters and warning is emitted; if the passphrase is longer
 * than expected, it is truncated and warning is emitted.
 * @param string $tag The authentication tag in AEAD cipher mode. If it is incorrect, the authentication fails and the function returns FALSE.
 * @param string $aad Additional authenticated data.
 * @return string The decrypted string on success.
 * @throws OpensslException
 *
 */
function openssl_decrypt(string $data, string $cipher_algo, string $passphrase, int $options = 0, string $iv = "", ?string $tag = null, string $aad = ""): string
{
    error_clear_last();
    if ($aad !== "") {
        $safeResult = \openssl_decrypt($data, $cipher_algo, $passphrase, $options, $iv, $tag, $aad);
    } elseif ($tag !== null) {
        $safeResult = \openssl_decrypt($data, $cipher_algo, $passphrase, $options, $iv, $tag);
    } else {
        $safeResult = \openssl_decrypt($data, $cipher_algo, $passphrase, $options, $iv);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The shared secret returned by openssl_dh_compute_key is
 * often used as an encryption key to secretly communicate with a remote party.
 * This is known as the Diffie-Hellman key exchange.
 *
 * @param string $public_key DH Public key of the remote party.
 * @param resource $private_key A local DH private key, corresponding to the public key to be shared with the remote party.
 * @return string Returns shared secret on success.
 * @throws OpensslException
 *
 */
function openssl_dh_compute_key(string $public_key, $private_key): string
{
    error_clear_last();
    $safeResult = \openssl_dh_compute_key($public_key, $private_key);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Computes a digest hash value for the given data using a given method,
 * and returns a raw or binhex encoded string.
 *
 * @param string $data The data.
 * @param string $digest_algo The digest method to use, e.g. "sha256", see openssl_get_md_methods for a list of available digest methods.
 * @param bool $binary Setting to TRUE will return as raw output data, otherwise the return
 * value is binhex encoded.
 * @return string Returns the digested hash value on success.
 * @throws OpensslException
 *
 */
function openssl_digest(string $data, string $digest_algo, bool $binary = false): string
{
    error_clear_last();
    $safeResult = \openssl_digest($data, $digest_algo, $binary);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the list of available curve names for use in Elliptic curve
 * cryptography (ECC) for public/private key operations. The two most widely
 * standardized/supported curves are prime256v1
 * (NIST P-256) and secp384r1 (NIST P-384).
 *
 * Approximate Equivalancies of AES, RSA, DSA and ECC Keysizes
 *
 *
 *
 * AES Symmetric Keysize (Bits)
 * RSA and DSA Keysize (Bits)
 * ECC Keysize (Bits)
 *
 *
 *
 *
 * 80
 * 1024
 * 160
 *
 *
 * 112
 * 2048
 * 224
 *
 *
 * 128
 * 3072
 * 256
 *
 *
 * 192
 * 7680
 * 384
 *
 *
 * 256
 * 15360
 * 512
 *
 *
 *
 *
 * NIST
 * recommends using ECC curves with at least 256 bits.
 *
 * @return array An array of available curve names.
 * @throws OpensslException
 *
 */
function openssl_get_curve_names(): array
{
    error_clear_last();
    $safeResult = \openssl_get_curve_names();
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_open opens (decrypts) data using an envelope
 * key that is decrypted from encrypted_key using
 * private_key. The decryption is done using
 * cipher_algo and iv. The IV is required only if the
 * cipher method requires it. The function fills output with the decrypted
 * data. The envelope key is usually generated when the data are sealed using a public key that is
 * associated with the private key. See openssl_seal for more information.
 *
 * @param string $data The sealed data.
 * @param string|null $output If the call is successful the opened data is returned in this parameter.
 * @param string $encrypted_key The encrypted symmetric key that can be decrypted using private_key.
 * @param string|array|resource $private_key The private key used for decrypting encrypted_key.
 * @param string $cipher_algo The cipher method used for decryption of data.
 *
 *
 * The default value for PHP versions prior to 8.0 is ('RC4') which is
 * considered insecure. It is strongly recommended to explicitly specify a secure cipher
 * method.
 *
 *
 * @param string $iv The initialization vector used for decryption of data. It is required
 * if the cipher method requires IV. This can be found out by calling
 * openssl_cipher_iv_length with cipher_algo.
 * @throws OpensslException
 *
 */
function openssl_open(string $data, ?string &$output, string $encrypted_key, $private_key, string $cipher_algo, ?string $iv = null): void
{
    error_clear_last();
    if ($iv !== null) {
        $safeResult = \openssl_open($data, $output, $encrypted_key, $private_key, $cipher_algo, $iv);
    } else {
        $safeResult = \openssl_open($data, $output, $encrypted_key, $private_key, $cipher_algo);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_pbkdf2 computes PBKDF2 (Password-Based Key Derivation Function 2),
 * a key derivation function defined in PKCS5 v2.
 *
 * @param string $password Password from which the derived key is generated.
 * @param string $salt PBKDF2 recommends a crytographic salt of at least 128 bits (16 bytes).
 * @param int $key_length Length of desired output key.
 * @param int $iterations The number of iterations desired.
 * NIST
 * recommends at least 1,000. As of 2023, OWASP recommends 600,000 iterations for
 * PBKDF2-HMAC-SHA256 and 210,000 for PBKDF2-HMAC-SHA512.
 * @param string $digest_algo Optional hash or digest algorithm from openssl_get_md_methods.  Defaults
 * to SHA-1. It is recommended to set it to SHA-256 or SHA-512.
 * @return string Returns raw binary string.
 * @throws OpensslException
 *
 */
function openssl_pbkdf2(string $password, string $salt, int $key_length, int $iterations, string $digest_algo = "sha1"): string
{
    error_clear_last();
    $safeResult = \openssl_pbkdf2($password, $salt, $key_length, $iterations, $digest_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_pkcs12_export_to_file stores
 * certificate into a file named by
 * output_filename in a PKCS#12 file format.
 *
 * @param string|resource $certificate See Key/Certificate parameters for a list of valid values.
 * @param string $output_filename Path to the output file.
 * @param string|array|resource $private_key Private key component of PKCS#12 file.
 * See Public/Private Key parameters for a list of valid values.
 * @param string $passphrase Encryption password for unlocking the PKCS#12 file.
 * @param array $options Optional array, other keys will be ignored.
 *
 *
 *
 *
 * Key
 * Description
 *
 *
 *
 *
 * "extracerts"
 * array of extra certificates or a single certificate to be included in the PKCS#12 file.
 *
 *
 * "friendly_name"
 * string to be used for the supplied certificate and key
 *
 *
 *
 *
 * @throws OpensslException
 *
 */
function openssl_pkcs12_export_to_file($certificate, string $output_filename, $private_key, string $passphrase, array $options = []): void
{
    error_clear_last();
    $safeResult = \openssl_pkcs12_export_to_file($certificate, $output_filename, $private_key, $passphrase, $options);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_pkcs12_export stores
 * certificate into a string named by
 * output in a PKCS#12 file format.
 *
 * @param string|resource $certificate See Key/Certificate parameters for a list of valid values.
 * @param string|null $output On success, this will hold the PKCS#12.
 * @param string|array|resource $private_key Private key component of PKCS#12 file.
 * See Public/Private Key parameters for a list of valid values.
 * @param string $passphrase Encryption password for unlocking the PKCS#12 file.
 * @param array $options Optional array, other keys will be ignored.
 *
 *
 *
 *
 * Key
 * Description
 *
 *
 *
 *
 * "extracerts"
 * array of extra certificates or a single certificate to be included in the PKCS#12 file.
 *
 *
 * "friendly_name"
 * string to be used for the supplied certificate and key
 *
 *
 *
 *
 * @throws OpensslException
 *
 */
function openssl_pkcs12_export($certificate, ?string &$output, $private_key, string $passphrase, array $options = []): void
{
    error_clear_last();
    $safeResult = \openssl_pkcs12_export($certificate, $output, $private_key, $passphrase, $options);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_pkcs12_read parses the PKCS#12 certificate store supplied by
 * pkcs12 into a array named
 * certificates.
 *
 * @param string $pkcs12 The certificate store contents, not its file name.
 * @param array|null $certificates On success, this will hold the Certificate Store Data.
 * @param string $passphrase Encryption password for unlocking the PKCS#12 file.
 * @throws OpensslException
 *
 */
function openssl_pkcs12_read(string $pkcs12, ?array &$certificates, string $passphrase): void
{
    error_clear_last();
    $safeResult = \openssl_pkcs12_read($pkcs12, $certificates, $passphrase);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * Decrypts the S/MIME encrypted message contained in the file specified by
 * input_filename using the certificate and its
 * associated private key specified by certificate and
 * private_key.
 *
 * @param string $input_filename
 * @param string $output_filename The decrypted message is written to the file specified by
 * output_filename.
 * @param string|resource $certificate
 * @param string|resource|array $private_key
 * @throws OpensslException
 *
 */
function openssl_pkcs7_decrypt(string $input_filename, string $output_filename, $certificate, $private_key = null): void
{
    error_clear_last();
    if ($private_key !== null) {
        $safeResult = \openssl_pkcs7_decrypt($input_filename, $output_filename, $certificate, $private_key);
    } else {
        $safeResult = \openssl_pkcs7_decrypt($input_filename, $output_filename, $certificate);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_pkcs7_encrypt takes the contents of the
 * file named input_filename and encrypts them using an RC2
 * 40-bit cipher so that they can only be read by the intended recipients
 * specified by certificate.
 *
 * @param string $input_filename
 * @param string $output_filename
 * @param string|resource|array $certificate Either a lone X.509 certificate, or an array of X.509 certificates.
 * @param array $headers headers is an array of headers that
 * will be prepended to the data after it has been encrypted.
 *
 * headers can be either an associative array
 * keyed by header name, or an indexed array, where each element contains
 * a single header line.
 * @param int $flags flags can be used to specify options that affect
 * the encoding process - see PKCS7
 * constants.
 * @param int $cipher_algo One of cipher constants.
 * @throws OpensslException
 *
 */
function openssl_pkcs7_encrypt(string $input_filename, string $output_filename, $certificate, array $headers, int $flags = 0, int $cipher_algo = OPENSSL_CIPHER_AES_128_CBC): void
{
    error_clear_last();
    $safeResult = \openssl_pkcs7_encrypt($input_filename, $output_filename, $certificate, $headers, $flags, $cipher_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $data The string of data you wish to parse (p7b format).
 * @param array|null $certificates The array of PEM certificates from the p7b input data.
 * @throws OpensslException
 *
 */
function openssl_pkcs7_read(string $data, ?array &$certificates): void
{
    error_clear_last();
    $safeResult = \openssl_pkcs7_read($data, $certificates);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_pkcs7_sign takes the contents of the file
 * named input_filename and signs them using the
 * certificate and its matching private key specified by
 * certificate and private_key
 * parameters.
 *
 * @param string $input_filename The input file you are intending to digitally sign.
 * @param string $output_filename The file which the digital signature will be written to.
 * @param string|resource $certificate The X.509 certificate used to digitally sign input_filename.
 * See Key/Certificate parameters for a list of valid values.
 * @param string|resource|array $private_key private_key is the private key corresponding to certificate.
 * See Public/Private Key parameters for a list of valid values.
 * @param array $headers headers is an array of headers that
 * will be prepended to the data after it has been signed (see
 * openssl_pkcs7_encrypt for more information about
 * the format of this parameter).
 * @param int $flags flags can be used to alter the output - see PKCS7 constants.
 * @param string $untrusted_certificates_filename untrusted_certificates_filename specifies the name of a file containing
 * a bunch of extra certificates to include in the signature which can for
 * example be used to help the recipient to verify the certificate that you used.
 * @throws OpensslException
 *
 */
function openssl_pkcs7_sign(string $input_filename, string $output_filename, $certificate, $private_key, array $headers, int $flags = PKCS7_DETACHED, ?string $untrusted_certificates_filename = null): void
{
    error_clear_last();
    if ($untrusted_certificates_filename !== null) {
        $safeResult = \openssl_pkcs7_sign($input_filename, $output_filename, $certificate, $private_key, $headers, $flags, $untrusted_certificates_filename);
    } else {
        $safeResult = \openssl_pkcs7_sign($input_filename, $output_filename, $certificate, $private_key, $headers, $flags);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_pkey_derive takes a set of a public_key
 * and private_key and derives a shared secret, for either DH or EC keys.
 *
 * @param resource $public_key public_key is the public key for the derivation.
 * See Public/Private Key parameters for a list of valid values.
 * @param resource $private_key private_key is the private key for the derivation.
 * See Public/Private Key parameters for a list of valid values.
 * @param int $key_length If not zero, will attempt to set the desired length of the derived secret.
 * @return string The derived secret on success.
 * @throws OpensslException
 *
 */
function openssl_pkey_derive($public_key, $private_key, int $key_length = 0): string
{
    error_clear_last();
    $safeResult = \openssl_pkey_derive($public_key, $private_key, $key_length);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_pkey_export_to_file saves an ascii-armoured
 * (PEM encoded) rendition of key into the file named
 * by output_filename.
 *
 * @param resource|string|array $key
 * @param string $output_filename Path to the output file.
 * @param string|null $passphrase The key can be optionally protected by a
 * passphrase.
 * @param array $options options can be used to fine-tune the export
 * process by specifying and/or overriding options for the openssl
 * configuration file. See openssl_csr_new for more
 * information about options.
 * @throws OpensslException
 *
 */
function openssl_pkey_export_to_file($key, string $output_filename, ?string $passphrase = null, ?array $options = null): void
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \openssl_pkey_export_to_file($key, $output_filename, $passphrase, $options);
    } elseif ($passphrase !== null) {
        $safeResult = \openssl_pkey_export_to_file($key, $output_filename, $passphrase);
    } else {
        $safeResult = \openssl_pkey_export_to_file($key, $output_filename);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_pkey_export exports
 * key as a PEM encoded string and stores it into
 * output (which is passed by reference).
 *
 * @param resource $key
 * @param string|null $output
 * @param string|null $passphrase The key is optionally protected by passphrase.
 * @param array $options options can be used to fine-tune the export
 * process by specifying and/or overriding options for the openssl
 * configuration file.  See openssl_csr_new for more
 * information about options.
 * @throws OpensslException
 *
 */
function openssl_pkey_export($key, ?string &$output, ?string $passphrase = null, ?array $options = null): void
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \openssl_pkey_export($key, $output, $passphrase, $options);
    } elseif ($passphrase !== null) {
        $safeResult = \openssl_pkey_export($key, $output, $passphrase);
    } else {
        $safeResult = \openssl_pkey_export($key, $output);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * This function returns the key details (bits, key, type).
 *
 * @param \OpenSSLAsymmetricKey $key Resource holding the key.
 * @return array Returns an array with the key details on success.
 * Returned array has indexes bits (number of bits),
 * key (string representation of the public key) and
 * type (type of the key which is one of
 * OPENSSL_KEYTYPE_RSA,
 * OPENSSL_KEYTYPE_DSA,
 * OPENSSL_KEYTYPE_DH,
 * OPENSSL_KEYTYPE_EC or -1 meaning unknown).
 *
 * Depending on the key type used, additional details may be returned. Note that
 * some elements may not always be available.
 * @throws OpensslException
 *
 */
function openssl_pkey_get_details(\OpenSSLAsymmetricKey $key): array
{
    error_clear_last();
    $safeResult = \openssl_pkey_get_details($key);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_pkey_get_private parses
 * private_key and prepares it for use by other functions.
 *
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key private_key can be one of the following:
 *
 * a string having the format
 * file://path/to/file.pem. The named file must
 * contain a PEM encoded certificate/private key (it may contain both).
 *
 *
 * A PEM formatted private key.
 *
 * @param string|null $passphrase The optional parameter passphrase must be used
 * if the specified key is encrypted (protected by a passphrase).
 * @return \OpenSSLAsymmetricKey Returns an OpenSSLAsymmetricKey instance on success.
 * @throws OpensslException
 *
 */
function openssl_pkey_get_private($private_key, ?string $passphrase = null): \OpenSSLAsymmetricKey
{
    error_clear_last();
    if ($passphrase !== null) {
        $safeResult = \openssl_pkey_get_private($private_key, $passphrase);
    } else {
        $safeResult = \openssl_pkey_get_private($private_key);
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_pkey_get_public extracts the public key from
 * public_key and prepares it for use by other
 * functions.
 *
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $public_key public_key can be one of the following:
 *
 * an OpenSSLAsymmetricKey instance
 * a string having the format
 * file://path/to/file.pem. The named file must
 * contain a PEM encoded certificate/public key (it may contain both).
 *
 *
 * A PEM formatted public key.
 *
 * @return \OpenSSLAsymmetricKey Returns an OpenSSLAsymmetricKey instance on success.
 * @throws OpensslException
 *
 */
function openssl_pkey_get_public($public_key): \OpenSSLAsymmetricKey
{
    error_clear_last();
    $safeResult = \openssl_pkey_get_public($public_key);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_pkey_new generates a new private
 * key.
 * How to obtain the public component of the key is shown in an example below.
 *
 * @param array $options You can finetune the key generation (such as specifying the number of
 * bits) using options.  See
 * openssl_csr_new for more information about
 * options.
 * @return resource Returns an OpenSSLAsymmetricKey instance for
 * the pkey on success.
 * @throws OpensslException
 *
 */
function openssl_pkey_new(?array $options = null)
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \openssl_pkey_new($options);
    } else {
        $safeResult = \openssl_pkey_new();
    }
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_private_decrypt decrypts
 * data that was previously encrypted via
 * openssl_public_encrypt and stores the result into
 * decrypted_data.
 *
 * You can use this function e.g. to decrypt data which is supposed to only be available to you.
 *
 * @param string $data
 * @param string|null $decrypted_data
 * @param string|resource|array $private_key private_key must be the private key that corresponds
 * to the public key that was used to encrypt the data.
 * @param int $padding padding can be one of
 * OPENSSL_PKCS1_PADDING,
 * OPENSSL_SSLV23_PADDING,
 * OPENSSL_PKCS1_OAEP_PADDING,
 * OPENSSL_NO_PADDING.
 * @throws OpensslException
 *
 */
function openssl_private_decrypt(string $data, ?string &$decrypted_data, $private_key, int $padding = OPENSSL_PKCS1_PADDING): void
{
    error_clear_last();
    $safeResult = \openssl_private_decrypt($data, $decrypted_data, $private_key, $padding);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_private_encrypt encrypts data
 * with private private_key and stores the result into
 * encrypted_data. Encrypted data can be decrypted via
 * openssl_public_decrypt.
 *
 * This function can be used e.g. to sign data (or its hash) to prove that it
 * is not written by someone else.
 *
 * @param string $data
 * @param string|null $encrypted_data
 * @param string|resource|array $private_key private_key must be the private key that corresponds
 * to the public key that will be used to decrypt the data.
 * @param int $padding padding can be one of
 * OPENSSL_PKCS1_PADDING,
 * OPENSSL_NO_PADDING.
 * @throws OpensslException
 *
 */
function openssl_private_encrypt(string $data, ?string &$encrypted_data, $private_key, int $padding = OPENSSL_PKCS1_PADDING): void
{
    error_clear_last();
    $safeResult = \openssl_private_encrypt($data, $encrypted_data, $private_key, $padding);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_public_decrypt decrypts
 * data that was previous encrypted via
 * openssl_private_encrypt and stores the result into
 * decrypted_data.
 *
 * You can use this function e.g. to check if the message was written by the
 * owner of the private key.
 *
 * @param string $data
 * @param string|null $decrypted_data
 * @param string|resource $public_key public_key must be the public key that corresponds
 * to the private key that was used to encrypt the data.
 * @param int $padding padding can be one of
 * OPENSSL_PKCS1_PADDING,
 * OPENSSL_NO_PADDING.
 * @throws OpensslException
 *
 */
function openssl_public_decrypt(string $data, ?string &$decrypted_data, $public_key, int $padding = OPENSSL_PKCS1_PADDING): void
{
    error_clear_last();
    $safeResult = \openssl_public_decrypt($data, $decrypted_data, $public_key, $padding);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_public_encrypt encrypts data
 * with public public_key and stores the result into
 * encrypted_data. Encrypted data can be decrypted via
 * openssl_private_decrypt.
 *
 * This function can be used e.g. to encrypt message which can be then read
 * only by owner of the private key. It can be also used to store secure data
 * in database.
 *
 * @param string $data
 * @param string|null $encrypted_data This will hold the result of the encryption.
 * @param string|resource $public_key public_key must be the public key that corresponds
 * to the private key that will be used to decrypt the data.
 * @param int $padding padding can be one of
 * OPENSSL_PKCS1_PADDING,
 * OPENSSL_SSLV23_PADDING,
 * OPENSSL_PKCS1_OAEP_PADDING,
 * OPENSSL_NO_PADDING.
 * @throws OpensslException
 *
 */
function openssl_public_encrypt(string $data, ?string &$encrypted_data, $public_key, int $padding = OPENSSL_PKCS1_PADDING): void
{
    error_clear_last();
    $safeResult = \openssl_public_encrypt($data, $encrypted_data, $public_key, $padding);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_seal seals (encrypts) data using the
 * specified cipher_algo with a randomly generated secret key. The key is
 * then encrypted with each of the public keys in public_key array,
 * and each encrypted envelope key is returned in encrypted_keys. This allows
 * sealed data to be sent to multiple recipients (provided their public keys are available). Each
 * recipient must receive both the sealed data and the envelope key that was encrypted with the
 * recipient's public key. The IV (Initialization Vector) is generated, and its value is returned in
 * iv.
 *
 * @param string $data The data to seal.
 * @param string|null $sealed_data The sealed data.
 * @param array|null $encrypted_keys Array of encrypted keys.
 * @param array $public_key Array of OpenSSLAsymmetricKey instances containing public keys.
 * @param string $cipher_algo The cipher method.
 *
 *
 * The default value for PHP versions prior to 8.0 is ('RC4') which is
 * considered insecure. It is strongly recommended to explicitly specify a secure cipher
 * method.
 *
 *
 * @param string|null $iv The initialization vector for decryption of data. It is required if
 * the cipher method requires IV. This can be found out by calling
 * openssl_cipher_iv_length with cipher_algo.
 * @return int Returns the length of the sealed data on success.
 * If successful the sealed data is returned in
 * sealed_data, and the envelope keys in
 * encrypted_keys.
 * @throws OpensslException
 *
 */
function openssl_seal(string $data, ?string &$sealed_data, ?array &$encrypted_keys, array $public_key, string $cipher_algo, ?string &$iv = null): int
{
    error_clear_last();
    $safeResult = \openssl_seal($data, $sealed_data, $encrypted_keys, $public_key, $cipher_algo, $iv);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_sign computes a signature for the
 * specified data by generating a cryptographic
 * digital signature using the private key associated with
 * private_key. Note that the data itself is
 * not encrypted.
 *
 * @param string $data The string of data you wish to sign
 * @param string|null $signature If the call was successful the signature is returned in
 * signature.
 * @param resource|string $private_key OpenSSLAsymmetricKey - a key, returned by openssl_get_privatekey
 *
 * string - a PEM formatted key
 * @param int|string $algorithm int - one of these Signature Algorithms.
 *
 * string - a valid string returned by openssl_get_md_methods example, "sha256WithRSAEncryption" or "sha384".
 * @throws OpensslException
 *
 */
function openssl_sign(string $data, ?string &$signature, $private_key, $algorithm = OPENSSL_ALGO_SHA1): void
{
    error_clear_last();
    $safeResult = \openssl_sign($data, $signature, $private_key, $algorithm);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * Exports challenge from encoded signed public key and challenge
 *
 * @param string $spki Expects a valid signed public key and challenge
 * @return string|null Returns the associated challenge string.
 * @throws OpensslException
 *
 */
function openssl_spki_export_challenge(string $spki): ?string
{
    error_clear_last();
    $safeResult = \openssl_spki_export_challenge($spki);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Exports PEM formatted public key from encoded signed public key and challenge
 *
 * @param string $spki Expects a valid signed public key and challenge
 * @return string|null Returns the associated PEM formatted public key.
 * @throws OpensslException
 *
 */
function openssl_spki_export(string $spki): ?string
{
    error_clear_last();
    $safeResult = \openssl_spki_export($spki);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Generates a signed public key and challenge using specified hashing algorithm
 *
 * @param resource $private_key private_key should be set to a private key that was
 * previously generated by openssl_pkey_new (or
 * otherwise obtained from the other openssl_pkey family of functions).
 * The corresponding public portion of the key will be used to sign the
 * CSR.
 * @param string $challenge The challenge associated to associate with the SPKAC
 * @param int $digest_algo The digest algorithm. See openssl_get_md_method().
 * @return string|null Returns a signed public key and challenge string.
 * @throws OpensslException
 *
 */
function openssl_spki_new($private_key, string $challenge, int $digest_algo = OPENSSL_ALGO_MD5): ?string
{
    error_clear_last();
    $safeResult = \openssl_spki_new($private_key, $challenge, $digest_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Validates the supplied signed public key and challenge
 *
 * @param string $spki Expects a valid signed public key and challenge
 * @throws OpensslException
 *
 */
function openssl_spki_verify(string $spki): void
{
    error_clear_last();
    $safeResult = \openssl_spki_verify($spki);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_verify verifies that the
 * signature is correct for the specified
 * data using the public key associated with
 * public_key. This must be the public key
 * corresponding to the private key used for signing.
 *
 * @param string $data The string of data used to generate the signature previously
 * @param string $signature A raw binary string, generated by openssl_sign or similar means
 * @param \ OpenSSLAsymmetricKey|\OpenSSLCertificate|string $public_key OpenSSLAsymmetricKey - a key, returned by openssl_get_publickey
 *
 * string - a PEM formatted key (e.g. -----BEGIN PUBLIC KEY-----
 * MIIBCgK...)
 * @param int|string $algorithm int - one of these Signature Algorithms.
 *
 * string - a valid string returned by openssl_get_md_methods example, "sha1WithRSAEncryption" or "sha512".
 * @return int Returns 1 if the signature is correct, 0 if it is incorrect, and
 * -1.
 * @throws OpensslException
 *
 */
function openssl_verify(string $data, string $signature, $public_key, $algorithm = OPENSSL_ALGO_SHA1): int
{
    error_clear_last();
    $safeResult = \openssl_verify($data, $signature, $public_key, $algorithm);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_x509_export_to_file stores
 * certificate into a file named by
 * output_filename in a PEM encoded format.
 *
 * @param string|\OpenSSLCertificate $certificate See Key/Certificate parameters for a list of valid values.
 * @param string $output_filename Path to the output file.
 * @param bool $no_text
 * The optional parameter notext affects
 * the verbosity of the output; if it is FALSE, then additional human-readable
 * information is included in the output. The default value of
 * notext is TRUE.
 * @throws OpensslException
 *
 */
function openssl_x509_export_to_file($certificate, string $output_filename, bool $no_text = true): void
{
    error_clear_last();
    $safeResult = \openssl_x509_export_to_file($certificate, $output_filename, $no_text);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_x509_export stores
 * certificate into a string named by
 * output in a PEM encoded format.
 *
 * @param string|\OpenSSLCertificate $certificate See Key/Certificate parameters for a list of valid values.
 * @param string|null $output On success, this will hold the PEM.
 * @param bool $no_text
 * The optional parameter notext affects
 * the verbosity of the output; if it is FALSE, then additional human-readable
 * information is included in the output. The default value of
 * notext is TRUE.
 * @throws OpensslException
 *
 */
function openssl_x509_export($certificate, ?string &$output, bool $no_text = true): void
{
    error_clear_last();
    $safeResult = \openssl_x509_export($certificate, $output, $no_text);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * openssl_x509_fingerprint returns the digest of
 * certificate as a string.
 *
 * @param string|\OpenSSLCertificate $certificate See Key/Certificate parameters for a list of valid values.
 * @param string $digest_algo The digest method or hash algorithm to use, e.g. "sha256", one of openssl_get_md_methods.
 * @param bool $binary When set to TRUE, outputs raw binary data. FALSE outputs lowercase hexits.
 * @return string Returns a string containing the calculated certificate fingerprint as lowercase hexits unless binary is set to TRUE in which case the raw binary representation of the message digest is returned.
 *
 * Returns FALSE on failure.
 * @throws OpensslException
 *
 */
function openssl_x509_fingerprint($certificate, string $digest_algo = "sha1", bool $binary = false): string
{
    error_clear_last();
    $safeResult = \openssl_x509_fingerprint($certificate, $digest_algo, $binary);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * openssl_x509_read parses the certificate supplied by
 * certificate and returns an OpenSSLCertificate object for
 * it.
 *
 * @param \OpenSSLCertificate|string $certificate X509 certificate. See Key/Certificate parameters for a list of valid values.
 * @return \OpenSSLCertificate Returns an OpenSSLCertificate on success.
 * @throws OpensslException
 *
 */
function openssl_x509_read($certificate): \OpenSSLCertificate
{
    error_clear_last();
    $safeResult = \openssl_x509_read($certificate);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}
