<?php

namespace Safe;

use Safe\Exceptions\MhashException;

/**
 * Generates a key according to the given algo, using an user
 * provided password.
 *
 * This is the Salted S2K algorithm as specified in the OpenPGP
 * document (RFC 2440).
 *
 * Keep in mind that user supplied passwords are not really suitable
 * to be used as keys in cryptographic algorithms, since users normally
 * choose keys they can write on keyboard. These passwords use
 * only 6 to 7 bits per character (or less). It is highly recommended
 * to use some kind of transformation (like this function) to the user
 * supplied key.
 *
 * @param int $algo The hash ID used to create the key.
 * One of the MHASH_hashname constants.
 * @param string $password An user supplied password.
 * @param string $salt Must be different and random enough for every key you generate in
 * order to create different keys. Because salt
 * must be known when you check the keys, it is a good idea to append
 * the key to it. Salt has a fixed length of 8 bytes and will be padded
 * with zeros if you supply less bytes.
 * @param int $length The key length, in bytes.
 * @return string Returns the generated key as a string.
 * @throws MhashException
 *
 */
function mhash_keygen_s2k(int $algo, string $password, string $salt, int $length): string
{
    error_clear_last();
    $safeResult = \mhash_keygen_s2k($algo, $password, $salt, $length);
    if ($safeResult === false) {
        throw MhashException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * mhash applies a hash function specified by
 * algo to the data.
 *
 * @param int $algo The hash ID. One of the MHASH_hashname constants.
 * @param string $data The user input, as a string.
 * @param string $key If specified, the function will return the resulting HMAC instead.
 * HMAC is keyed hashing for message authentication, or simply a message
 * digest that depends on the specified key. Not all algorithms
 * supported in mhash can be used in HMAC mode.
 * @return string Returns the resulting hash (also called digest) or HMAC as a string.
 * @throws MhashException
 *
 */
function mhash(int $algo, string $data, string $key = null): string
{
    error_clear_last();
    if ($key !== null) {
        $safeResult = \mhash($algo, $data, $key);
    } else {
        $safeResult = \mhash($algo, $data);
    }
    if ($safeResult === false) {
        throw MhashException::createFromPhpError();
    }
    return $safeResult;
}
