<?php

namespace Safe;

/**
 * Creates an initialization vector (IV) from a random source.
 * 
 * The IV is only meant to give an alternative seed to the encryption
 * routines. This IV does not need to be secret at all, though it can be
 * desirable. You even can send it along with your ciphertext without
 * losing security.
 * 
 * @param int $size The size of the IV.
 * @param int $source The source of the IV. The source can be
 * MCRYPT_RAND (system random number generator),
 * MCRYPT_DEV_RANDOM (read data from
 * /dev/random) and
 * MCRYPT_DEV_URANDOM (read data from
 * /dev/urandom). Prior to 5.3.0,
 * MCRYPT_RAND was the only one supported on Windows.
 * 
 * Note that the default value of this parameter was
 * MCRYPT_DEV_RANDOM prior to PHP 5.6.0.
 * @return string Returns the initialization vector, .
 * @throws Exceptions\McryptException
 * 
 */
function mcrypt_create_iv(int $size, int $source = MCRYPT_DEV_URANDOM): string
{
    error_clear_last();
    $result = \mcrypt_create_iv($size, $source);
    if ($result === FALSE) {
        throw Exceptions\McryptException::createFromPhpError();
    }
    return $result;
}


/**
 * Decrypts the data and returns the unencrypted data.
 * 
 * @param string $cipher One of the MCRYPT_ciphername constants, or the name of the algorithm as string.
 * @param string $key The key with which the data was encrypted. If the provided key size is
 * not supported by the cipher, the function will emit a warning and return FALSE
 * @param string $data The data that will be decrypted with the given cipher
 * and mode. If the size of the data is not n * blocksize,
 * the data will be padded with '\0'.
 * @param string $mode One of the MCRYPT_MODE_modename constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".
 * @param string $iv Used for the initialization in CBC, CFB, OFB modes, and in some algorithms in STREAM mode. If the provided IV size is not supported by the chaining mode or no IV was provided, but the chaining mode requires one, the function will emit a warning and return FALSE.
 * @return string Returns the decrypted data as a string  .
 * @throws Exceptions\McryptException
 * 
 */
function mcrypt_decrypt(string $cipher, string $key, string $data, string $mode, string $iv): string
{
    error_clear_last();
    if ($iv !== null) {
        $result = \mcrypt_decrypt($cipher, $key, $data, $mode, $iv);
    }else {
        $result = \mcrypt_decrypt($cipher, $key, $data, $mode);
    }
    if ($result === FALSE) {
        throw Exceptions\McryptException::createFromPhpError();
    }
    return $result;
}


/**
 * Encrypts the data and returns it.
 * 
 * @param string $cipher One of the MCRYPT_ciphername constants, or the name of the algorithm as string.
 * @param string $key The key with which the data will be encrypted. If the provided key size is
 * not supported by the cipher, the function will emit a warning and return FALSE
 * @param string $data The data that will be encrypted with the given cipher
 * and mode. If the size of the data is not n * blocksize,
 * the data will be padded with '\0'.
 * 
 * The returned crypttext can be larger than the size of the data that was
 * given by data.
 * @param string $mode One of the MCRYPT_MODE_modename constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".
 * @param string $iv Used for the initialization in CBC, CFB, OFB modes, and in some algorithms in STREAM mode. If the provided IV size is not supported by the chaining mode or no IV was provided, but the chaining mode requires one, the function will emit a warning and return FALSE.
 * @return string Returns the encrypted data as a string  .
 * @throws Exceptions\McryptException
 * 
 */
function mcrypt_encrypt(string $cipher, string $key, string $data, string $mode, string $iv): string
{
    error_clear_last();
    if ($iv !== null) {
        $result = \mcrypt_encrypt($cipher, $key, $data, $mode, $iv);
    }else {
        $result = \mcrypt_encrypt($cipher, $key, $data, $mode);
    }
    if ($result === FALSE) {
        throw Exceptions\McryptException::createFromPhpError();
    }
    return $result;
}


/**
 * This function terminates encryption specified by the encryption
 * descriptor (td). It clears all buffers, but does
 * not close the module.  You need to call
 * mcrypt_module_close yourself. (But PHP does this for
 * you at the end of the script.)
 * 
 * @param resource $td The encryption descriptor.
 * @throws Exceptions\McryptException
 * 
 */
function mcrypt_generic_deinit($td): void
{
    error_clear_last();
    $result = \mcrypt_generic_deinit($td);
    if ($result === FALSE) {
        throw Exceptions\McryptException::createFromPhpError();
    }
}


/**
 * 
 * 
 * mcrypt_generic_deinit should be used instead of this
 * function, as it can cause crashes when used with
 * mcrypt_module_close due to multiple buffer frees.
 * 
 * 
 * 
 * This function terminates encryption specified by the encryption
 * descriptor (td). Actually it clears all buffers,
 * and closes all the modules used. Returns FALSE on error, or TRUE on
 * success.
 * 
 * @param resource $td 
 * @throws Exceptions\McryptException
 * 
 */
function mcrypt_generic_end($td): void
{
    error_clear_last();
    $result = \mcrypt_generic_end($td);
    if ($result === FALSE) {
        throw Exceptions\McryptException::createFromPhpError();
    }
}


/**
 * Closes the specified encryption handle.
 * 
 * @param resource $td The encryption descriptor.
 * @throws Exceptions\McryptException
 * 
 */
function mcrypt_module_close($td): void
{
    error_clear_last();
    $result = \mcrypt_module_close($td);
    if ($result === FALSE) {
        throw Exceptions\McryptException::createFromPhpError();
    }
}


/**
 * This function opens the module of the algorithm and the mode to be used.
 * The name of the algorithm is specified in algorithm, e.g. "twofish" or is
 * one of the MCRYPT_ciphername constants.  The module is closed by calling
 * mcrypt_module_close.
 * 
 * @param string $algorithm One of the MCRYPT_ciphername constants, or the name of the algorithm as string.
 * @param string $algorithm_directory The algorithm_directory parameter is used to locate
 * the encryption module. When you supply a directory name, it is used.  When
 * you set it to an empty string (""), the value set by the
 * mcrypt.algorithms_dir php.ini directive is used. When
 * it is not set, the default directory that is used is the one that was compiled
 * into libmcrypt (usually /usr/local/lib/libmcrypt).
 * @param string $mode One of the MCRYPT_MODE_modename constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".
 * @param string $mode_directory The mode_directory parameter is used to locate
 * the encryption module. When you supply a directory name, it is used.  When
 * you set it to an empty string (""), the value set by the
 * mcrypt.modes_dir php.ini directive is used. When
 * it is not set, the default directory that is used is the one that was compiled-in
 * into libmcrypt (usually /usr/local/lib/libmcrypt).
 * @return resource Normally it returns an encryption descriptor, .
 * @throws Exceptions\McryptException
 * 
 */
function mcrypt_module_open(string $algorithm, string $algorithm_directory, string $mode, string $mode_directory)
{
    error_clear_last();
    $result = \mcrypt_module_open($algorithm, $algorithm_directory, $mode, $mode_directory);
    if ($result === FALSE) {
        throw Exceptions\McryptException::createFromPhpError();
    }
    return $result;
}


