<?php

namespace Safe;

use Safe\Exceptions\OpensslException;

/**
 * @param string $cipher_algo
 * @return int
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
 * @param string $input_filename
 * @param string $output_filename
 * @param \OpenSSLCertificate|string $certificate
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|null|string $private_key
 * @param int $encoding
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
 * @param string $input_filename
 * @param string $output_filename
 * @param \OpenSSLCertificate|array|string $certificate
 * @param array|null $headers
 * @param int $flags
 * @param int $encoding
 * @param int $cipher_algo
 * @throws OpensslException
 *
 */
function openssl_cms_encrypt(string $input_filename, string $output_filename, $certificate, ?array $headers, int $flags = 0, int $encoding = OPENSSL_ENCODING_SMIME, int $cipher_algo = OPENSSL_CIPHER_RC2_40): void
{
    error_clear_last();
    $safeResult = \openssl_cms_encrypt($input_filename, $output_filename, $certificate, $headers, $flags, $encoding, $cipher_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
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
 * @param string $input_filename
 * @param string $output_filename
 * @param \OpenSSLCertificate|string $certificate
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param array|null $headers
 * @param int $flags
 * @param int $encoding
 * @param null|string $untrusted_certificates_filename
 * @throws OpensslException
 *
 */
function openssl_cms_sign(string $input_filename, string $output_filename, $certificate, $private_key, ?array $headers, int $flags = 0, int $encoding = OPENSSL_ENCODING_SMIME, ?string $untrusted_certificates_filename = null): void
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
 * @param string $input_filename
 * @param int $flags
 * @param null|string $certificates
 * @param array $ca_info
 * @param null|string $untrusted_certificates_filename
 * @param null|string $content
 * @param null|string $pk7
 * @param null|string $sigfile
 * @param int $encoding
 * @throws OpensslException
 *
 */
function openssl_cms_verify(string $input_filename, int $flags = 0, ?string $certificates = null, array $ca_info = [], ?string $untrusted_certificates_filename = null, ?string $content = null, ?string $pk7 = null, ?string $sigfile = null, int $encoding = OPENSSL_ENCODING_SMIME): void
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
 * @param \OpenSSLCertificateSigningRequest|string $csr
 * @param string $output_filename
 * @param bool $no_text
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
 * @param \OpenSSLCertificateSigningRequest|string $csr
 * @param null|string $output
 * @param bool $no_text
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
 * @param \OpenSSLCertificateSigningRequest|string $csr
 * @param bool $short_names
 * @return \OpenSSLAsymmetricKey
 * @throws OpensslException
 *
 */
function openssl_csr_get_public_key($csr, bool $short_names = true): \OpenSSLAsymmetricKey
{
    error_clear_last();
    $safeResult = \openssl_csr_get_public_key($csr, $short_names);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \OpenSSLCertificateSigningRequest|string $csr
 * @param bool $short_names
 * @return array
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
 * @param array $distinguished_names
 * @param \OpenSSLAsymmetricKey $private_key
 * @param array|null $options
 * @param array|null $extra_attributes
 * @return \OpenSSLCertificateSigningRequest
 * @throws OpensslException
 *
 */
function openssl_csr_new(array $distinguished_names, \OpenSSLAsymmetricKey &$private_key, ?array $options = null, ?array $extra_attributes = null): \OpenSSLCertificateSigningRequest
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
 * @param \OpenSSLCertificateSigningRequest|string $csr
 * @param \OpenSSLCertificate|null|string $ca_certificate
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param int $days
 * @param array|null $options
 * @param int $serial
 * @return \OpenSSLCertificate
 * @throws OpensslException
 *
 */
function openssl_csr_sign($csr, $ca_certificate, $private_key, int $days, ?array $options = null, int $serial = 0): \OpenSSLCertificate
{
    error_clear_last();
    if ($serial !== 0) {
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
 * @param string $data
 * @param string $cipher_algo
 * @param string $passphrase
 * @param int $options
 * @param string $iv
 * @param string $tag
 * @param string $aad
 * @return string
 * @throws OpensslException
 *
 */
function openssl_decrypt(string $data, string $cipher_algo, string $passphrase, int $options = 0, string $iv = "", string $tag = "", string $aad = ""): string
{
    error_clear_last();
    $safeResult = \openssl_decrypt($data, $cipher_algo, $passphrase, $options, $iv, $tag, $aad);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $public_key
 * @param \OpenSSLAsymmetricKey $private_key
 * @return string
 * @throws OpensslException
 *
 */
function openssl_dh_compute_key(string $public_key, \OpenSSLAsymmetricKey $private_key): string
{
    error_clear_last();
    $safeResult = \openssl_dh_compute_key($public_key, $private_key);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param string $digest_algo
 * @param bool $binary
 * @return string
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
 * @return list
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
 * @param string $data
 * @param null|string $output
 * @param string $encrypted_key
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param string $cipher_algo
 * @param null|string $iv
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
 * @param string $password
 * @param string $salt
 * @param int $key_length
 * @param int $iterations
 * @param string $digest_algo
 * @return string
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
 * @param \OpenSSLCertificate|string $certificate
 * @param string $output_filename
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param string $passphrase
 * @param array $options
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
 * @param \OpenSSLCertificate|string $certificate
 * @param null|string $output
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param string $passphrase
 * @param array $options
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
 * @param string $pkcs12
 * @param array|null $certificates
 * @param string $passphrase
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
 * @param string $input_filename
 * @param string $output_filename
 * @param \OpenSSLCertificate|string $certificate
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|null|string $private_key
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
 * @param string $input_filename
 * @param string $output_filename
 * @param \OpenSSLCertificate|array|string $certificate
 * @param array $headers
 * @param int $flags
 * @param int $cipher_algo
 * @throws OpensslException
 *
 */
function openssl_pkcs7_encrypt(string $input_filename, string $output_filename, $certificate, array $headers, int $flags = 0, int $cipher_algo = OPENSSL_CIPHER_RC2_40): void
{
    error_clear_last();
    $safeResult = \openssl_pkcs7_encrypt($input_filename, $output_filename, $certificate, $headers, $flags, $cipher_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
}


/**
 * @param string $data
 * @param array|null $certificates
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
 * @param string $input_filename
 * @param string $output_filename
 * @param \OpenSSLCertificate|string $certificate
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param array $headers
 * @param int $flags
 * @param null|string $untrusted_certificates_filename
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
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $public_key
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param int $key_length
 * @return string
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
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $key
 * @param string $output_filename
 * @param null|string $passphrase
 * @param array|null $options
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
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $key
 * @param null|string $output
 * @param null|string $passphrase
 * @param array|null $options
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
 * @param \OpenSSLAsymmetricKey $key
 * @return array
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
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param null|string $passphrase
 * @return \OpenSSLAsymmetricKey
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
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $public_key
 * @return \OpenSSLAsymmetricKey
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
 * @param array|null $options
 * @return \OpenSSLAsymmetricKey
 * @throws OpensslException
 *
 */
function openssl_pkey_new(?array $options = null): \OpenSSLAsymmetricKey
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
 * @param string $data
 * @param null|string $decrypted_data
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param int $padding
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
 * @param string $data
 * @param null|string $encrypted_data
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param int $padding
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
 * @param string $data
 * @param null|string $decrypted_data
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $public_key
 * @param int $padding
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
 * @param string $data
 * @param null|string $encrypted_data
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $public_key
 * @param int $padding
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
 * @param int $length
 * @param bool|null $strong_result
 * @return string
 * @throws OpensslException
 *
 */
function openssl_random_pseudo_bytes(int $length, ?bool &$strong_result = null): string
{
    error_clear_last();
    $safeResult = \openssl_random_pseudo_bytes($length, $strong_result);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param null|string $sealed_data
 * @param array|null $encrypted_keys
 * @param array $public_key
 * @param string $cipher_algo
 * @param null|string $iv
 * @return int
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
 * @param string $data
 * @param null|string $signature
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $private_key
 * @param int|string $algorithm
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
 * @param string $spki
 * @return null|string
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
 * @param string $spki
 * @return null|string
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
 * @param \OpenSSLAsymmetricKey $private_key
 * @param string $challenge
 * @param int $digest_algo
 * @return null|string
 * @throws OpensslException
 *
 */
function openssl_spki_new(\OpenSSLAsymmetricKey $private_key, string $challenge, int $digest_algo = OPENSSL_ALGO_MD5): ?string
{
    error_clear_last();
    $safeResult = \openssl_spki_new($private_key, $challenge, $digest_algo);
    if ($safeResult === false) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $spki
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
 * @param string $data
 * @param string $signature
 * @param \OpenSSLAsymmetricKey|\OpenSSLCertificate|array|string $public_key
 * @param int|string $algorithm
 * @return -1|0|1
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
 * @param \OpenSSLCertificate|string $certificate
 * @param int $purpose
 * @param array $ca_info
 * @param null|string $untrusted_certificates_file
 * @return bool|int
 * @throws OpensslException
 *
 */
function openssl_x509_checkpurpose($certificate, int $purpose, array $ca_info = [], ?string $untrusted_certificates_file = null)
{
    error_clear_last();
    if ($untrusted_certificates_file !== null) {
        $safeResult = \openssl_x509_checkpurpose($certificate, $purpose, $ca_info, $untrusted_certificates_file);
    } else {
        $safeResult = \openssl_x509_checkpurpose($certificate, $purpose, $ca_info);
    }
    if ($safeResult === -1) {
        throw OpensslException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \OpenSSLCertificate|string $certificate
 * @param string $output_filename
 * @param bool $no_text
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
 * @param \OpenSSLCertificate|string $certificate
 * @param null|string $output
 * @param bool $no_text
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
 * @param \OpenSSLCertificate|string $certificate
 * @param string $digest_algo
 * @param bool $binary
 * @return string
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
 * @param \OpenSSLCertificate|string $certificate
 * @return \OpenSSLCertificate
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
