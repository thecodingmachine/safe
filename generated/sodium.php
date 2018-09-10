<?php

namespace Safe;

use Safe\Exceptions\SodiumException;

/**
 *
 *
 * @param int $length integer; The length of the password hash to generate, in bytes.
 * @param string $password string; The password to generate a hash for.
 * @param string $salt string A salt to add to the password before hashing. The salt should be unpredictable, ideally generated from a good random mumber source such as random_bytes, and have a length of at least SODIUM_CRYPTO_PWHASH_SALTBYTES bytes.
 * @param int $opslimit Represents a maximum amount of computations to perform. Raising this number will make the function require more CPU cycles to compute a key. There are some constants available to set the operations limit to appropriate values depending on intended use, in order of strength: SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE and SODIUM_CRYPTO_PWHASH_OPSLIMIT_SENSITIVE.
 * @param int $memlimit The maximum amount of RAM that the function will use, in bytes. There are constants to help you choose an appropriate value, in order of size: SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE, and SODIUM_CRYPTO_PWHASH_MEMLIMIT_SENSITIVE. Typically these should be paired with the matching opslimit values.
 * @param int $alg integer A number indicating the hash algorithm to use. By default SODIUM_CRYPTO_PWHASH_ALG_DEFAULT (the currently recommended algorithm, which can change from one version of libsodium to another), or explicitly using SODIUM_CRYPTO_PWHASH_ALG_ARGON2I13, representing the Argon2id algorithm version 1.3.
 * @return string Returns the hashed password,  .
 *
 * The used algorithm, opslimit, memlimit and salt are embedded within the hash, so
 * all information needed to verify the hash is included. This allows
 * the password_verify function to verify the hash without
 * needing separate storage for the salt or algorithm information.
 * @throws SodiumException
 *
 */
function sodium_crypto_pwhash(int $length, string $password, string $salt, int $opslimit, int $memlimit, int $alg = null): string
{
    error_clear_last();
    if ($alg !== null) {
        $result = \sodium_crypto_pwhash($length, $password, $salt, $opslimit, $memlimit, $alg);
    } else {
        $result = \sodium_crypto_pwhash($length, $password, $salt, $opslimit, $memlimit);
    }
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}
