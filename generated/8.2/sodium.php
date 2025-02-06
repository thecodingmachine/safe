<?php

namespace Safe;

use Safe\Exceptions\SodiumException;

/**
 * Verify then decrypt with AES-256-GCM.
 * Only available if sodium_crypto_aead_aes256gcm_is_available returns TRUE.
 *
 * @param string $ciphertext Must be in the format provided by sodium_crypto_aead_aes256gcm_encrypt
 * (ciphertext and tag, concatenated).
 * @param string $additional_data Additional, authenticated data. This is used in the verification of the authentication tag
 * appended to the ciphertext, but it is not encrypted or stored in the ciphertext.
 * @param string $nonce A number that must be only used once, per message. 12 bytes long.
 * @param string $key Encryption key (256-bit).
 * @return string Returns the plaintext on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_aes256gcm_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_aead_aes256gcm_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Verify then decrypt with ChaCha20-Poly1305.
 *
 * @param string $ciphertext Must be in the format provided by sodium_crypto_aead_chacha20poly1305_encrypt
 * (ciphertext and tag, concatenated).
 * @param string $additional_data Additional, authenticated data. This is used in the verification of the authentication tag
 * appended to the ciphertext, but it is not encrypted or stored in the ciphertext.
 * @param string $nonce A number that must be only used once, per message. 8 bytes long.
 * @param string $key Encryption key (256-bit).
 * @return string Returns the plaintext on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_chacha20poly1305_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_aead_chacha20poly1305_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Encrypt then authenticate with ChaCha20-Poly1305.
 *
 * @param string $message The plaintext message to encrypt.
 * @param string $additional_data Additional, authenticated data. This is used in the verification of the authentication tag
 * appended to the ciphertext, but it is not encrypted or stored in the ciphertext.
 * @param string $nonce A number that must be only used once, per message. 8 bytes long.
 * @param string $key Encryption key (256-bit).
 * @return string Returns the ciphertext and tag on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_chacha20poly1305_encrypt(string $message, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_aead_chacha20poly1305_encrypt($message, $additional_data, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Verify then decrypt with ChaCha20-Poly1305 (IETF variant).
 *
 * The IETF variant uses 96-bit nonces and 32-bit internal counters, instead of 64-bit for both.
 *
 * @param string $ciphertext Must be in the format provided by sodium_crypto_aead_chacha20poly1305_ietf_encrypt
 * (ciphertext and tag, concatenated).
 * @param string $additional_data Additional, authenticated data. This is used in the verification of the authentication tag
 * appended to the ciphertext, but it is not encrypted or stored in the ciphertext.
 * @param string $nonce A number that must be only used once, per message. 12 bytes long.
 * @param string $key Encryption key (256-bit).
 * @return string Returns the plaintext on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_chacha20poly1305_ietf_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_aead_chacha20poly1305_ietf_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Encrypt then authenticate with ChaCha20-Poly1305 (IETF variant).
 *
 * The IETF variant uses 96-bit nonces and 32-bit internal counters, instead of 64-bit for both.
 *
 * @param string $message The plaintext message to encrypt.
 * @param string $additional_data Additional, authenticated data. This is used in the verification of the authentication tag
 * appended to the ciphertext, but it is not encrypted or stored in the ciphertext.
 * @param string $nonce A number that must be only used once, per message. 12 bytes long.
 * @param string $key Encryption key (256-bit).
 * @return string Returns the ciphertext and tag on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_chacha20poly1305_ietf_encrypt(string $message, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_aead_chacha20poly1305_ietf_encrypt($message, $additional_data, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Verify then decrypt with ChaCha20-Poly1305 (eXtended-nonce variant).
 *
 * Generally, XChaCha20-Poly1305 is the best of the provided AEAD modes to use.
 *
 * @param string $ciphertext Must be in the format provided by sodium_crypto_aead_chacha20poly1305_ietf_encrypt
 * (ciphertext and tag, concatenated).
 * @param string $additional_data Additional, authenticated data. This is used in the verification of the authentication tag
 * appended to the ciphertext, but it is not encrypted or stored in the ciphertext.
 * @param string $nonce A number that must be only used once, per message. 24 bytes long.
 * This is a large enough bound to generate randomly (i.e. random_bytes).
 * @param string $key Encryption key (256-bit).
 * @return string Returns the plaintext on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_xchacha20poly1305_ietf_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Encrypt then authenticate with XChaCha20-Poly1305 (eXtended-nonce variant).
 *
 * Generally, XChaCha20-Poly1305 is the best of the provided AEAD modes to use.
 *
 * @param string $message The plaintext message to encrypt.
 * @param string $additional_data Additional, authenticated data. This is used in the verification of the authentication tag
 * appended to the ciphertext, but it is not encrypted or stored in the ciphertext.
 * @param string $nonce A number that must be only used once, per message. 24 bytes long.
 * This is a large enough bound to generate randomly (i.e. random_bytes).
 * @param string $key Encryption key (256-bit).
 * @return string Returns the ciphertext and tag on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(string $message, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_aead_xchacha20poly1305_ietf_encrypt($message, $additional_data, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Verify the authentication tag is valid for a given message and key.
 *
 * Unlike with digital signatures (e.g. sodium_crypto_sign_verify_detached),
 * any party capable of verifying a message is also capable of authenticating
 * their own messages. (Hence, symmetric authentication.)
 *
 * @param string $mac Authentication tag produced by sodium_crypto_auth
 * @param string $message Message
 * @param string $key Authentication key
 * @throws SodiumException
 *
 */
function sodium_crypto_auth_verify(string $mac, string $message, string $key): void
{
    error_clear_last();
    $safeResult = \sodium_crypto_auth_verify($mac, $message, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
}


/**
 * Decrypt a message using asymmetric (public key) cryptography.
 *
 * @param string $ciphertext The encrypted message to attempt to decrypt.
 * @param string $nonce A number that must be only used once, per message. 24 bytes long.
 * This is a large enough bound to generate randomly (i.e. random_bytes).
 * @param string $key_pair See sodium_crypto_box_keypair_from_secretkey_and_publickey.
 * This should include the sender's public key and the recipient's secret key.
 * @return string Returns the plaintext message on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_box_open(string $ciphertext, string $nonce, string $key_pair): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_box_open($ciphertext, $nonce, $key_pair);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Decrypt a message that was encrypted with sodium_crypto_box_seal
 *
 * @param string $ciphertext The encrypted message
 * @param string $key_pair The keypair of the recipient. Must include the secret key.
 * @return string The plaintext on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_box_seal_open(string $ciphertext, string $key_pair): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_box_seal_open($ciphertext, $key_pair);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Appends a message to the internal hash state.
 *
 * @param non-empty-string $state The return value of sodium_crypto_generichash_init.
 * @param string $message Data to append to the hashing state.
 * @throws SodiumException
 *
 */
function sodium_crypto_generichash_update(string &$state, string $message): void
{
    error_clear_last();
    $safeResult = \sodium_crypto_generichash_update($state, $message);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
}


/**
 * Decrypt an encrypted message with a symmetric (shared) key.
 *
 * @param string $ciphertext Must be in the format provided by sodium_crypto_secretbox
 * (ciphertext and tag, concatenated).
 * @param string $nonce A number that must be only used once, per message. 24 bytes long.
 * This is a large enough bound to generate randomly (i.e. random_bytes).
 * @param string $key Encryption key (256-bit).
 * @return string The decrypted string on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_secretbox_open(string $ciphertext, string $nonce, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Verify the signature attached to a message and return the message
 *
 * @param string $signed_message A message signed with sodium_crypto_sign
 * @param non-empty-string $public_key An Ed25519 public key
 * @return string Returns the original signed message on success.
 * @throws SodiumException
 *
 */
function sodium_crypto_sign_open(string $signed_message, string $public_key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_sign_open($signed_message, $public_key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Verify signature for the message
 *
 * @param non-empty-string $signature The cryptographic signature obtained from sodium_crypto_sign_detached
 * @param string $message The message being verified
 * @param non-empty-string $public_key Ed25519 public key
 * @throws SodiumException
 *
 */
function sodium_crypto_sign_verify_detached(string $signature, string $message, string $public_key): void
{
    error_clear_last();
    $safeResult = \sodium_crypto_sign_verify_detached($signature, $message, $public_key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
}


/**
 * The function is similar to sodium_crypto_stream_xchacha20_xor
 * but adds the ability to set the initial value of the block counter to a non-zero value.
 * This permits direct access to any block without having to compute the previous ones.
 *
 * @param string $message The message to encrypt.
 * @param string $nonce 24-byte nonce.
 * @param int $counter The initial value of the block counter.
 * @param string $key Key, possibly generated from sodium_crypto_stream_xchacha20_keygen.
 * @return string Encrypted message.
 * @throws SodiumException
 *
 */
function sodium_crypto_stream_xchacha20_xor_ic(string $message, string $nonce, int $counter, string $key): string
{
    error_clear_last();
    $safeResult = \sodium_crypto_stream_xchacha20_xor_ic($message, $nonce, $counter, $key);
    if ($safeResult === false) {
        throw SodiumException::createFromPhpError();
    }
    return $safeResult;
}
