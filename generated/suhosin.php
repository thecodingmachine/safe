<?php

namespace Safe;

/**
 * 
 * 
 * @param string $filename Name of the file.
 * @param bool $raw_output Whether to return raw binary format (32 bytes).
 * @return string Returns the hash .
 * @throws Exceptions\SuhosinException
 * 
 */
function sha256_file(string $filename, bool $raw_output): string
{
    error_clear_last();
    if ($raw_output !== null) {
        $result = \sha256_file($filename, $raw_output);
    }else {
        $result = \sha256_file($filename);
    }
    if ($result === FALSE) {
        throw Exceptions\SuhosinException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param string $str The string.
 * @param bool $raw_output Whether to return raw binary format (32 bytes).
 * @return string Returns the hash .
 * @throws Exceptions\SuhosinException
 * 
 */
function sha256(string $str, bool $raw_output): string
{
    error_clear_last();
    if ($raw_output !== null) {
        $result = \sha256($str, $raw_output);
    }else {
        $result = \sha256($str);
    }
    if ($result === FALSE) {
        throw Exceptions\SuhosinException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param string $name Cookie name.
 * @param string $value Cookie value.
 * @return string Returns the encrypted string .
 * @throws Exceptions\SuhosinException
 * 
 */
function suhosin_encrypt_cookie(string $name, string $value): string
{
    error_clear_last();
    $result = \suhosin_encrypt_cookie($name, $value);
    if ($result === FALSE) {
        throw Exceptions\SuhosinException::createFromPhpError();
    }
    return $result;
}


