<?php

namespace Safe;

/**
 * Generates a key according to the given hash, using an user
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
 * @param int $hash The hash ID used to create the key.
 * One of the MHASH_hashname constants.
 * @param string $password An user supplied password.
 * @param string $salt Must be different and random enough for every key you generate in
 * order to create different keys. Because salt
 * must be known when you check the keys, it is a good idea to append
 * the key to it. Salt has a fixed length of 8 bytes and will be padded
 * with zeros if you supply less bytes.
 * @param int $bytes The key length, in bytes.
 * @return string Returns the generated key as a string, .
 * @throws Exceptions\MhashException
 * 
 */
function mhash_keygen_s2k(int $hash, string $password, string $salt, int $bytes): string
{
    error_clear_last();
    $result = \mhash_keygen_s2k($hash, $password, $salt, $bytes);
    if ($result === FALSE) {
        throw Exceptions\MhashException::createFromPhpError();
    }
    return $result;
}


/**
 * mhash applies a hash function specified by
 * hash to the data.
 * 
 * @param int $hash The hash ID. One of the MHASH_hashname constants.
 * @param string $data The user input, as a string.
 * @param string $key If specified, the function will return the resulting HMAC instead.
 * HMAC is keyed hashing for message authentication, or simply a message
 * digest that depends on the specified key. Not all algorithms 
 * supported in mhash can be used in HMAC mode.
 * @return string Returns the resulting hash (also called digest) or HMAC as a string, .
 * @throws Exceptions\MhashException
 * 
 */
function mhash(int $hash, string $data, string $key = null): string
{
    error_clear_last();
    if ($key !== null) {
        $result = \mhash($hash, $data, $key);
    }else {
        $result = \mhash($hash, $data);
    }
    if ($result === FALSE) {
        throw Exceptions\MhashException::createFromPhpError();
    }
    return $result;
}


