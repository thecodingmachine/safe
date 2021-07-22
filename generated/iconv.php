<?php

namespace Safe;

use Safe\Exceptions\IconvException;

/**
 * Retrieve internal configuration variables of iconv extension.
 *
 * @param string $type The value of the optional type can be:
 *
 * all
 * input_encoding
 * output_encoding
 * internal_encoding
 *
 * @return mixed Returns the current value of the internal configuration variable if
 * successful.
 *
 * If type is omitted or set to "all",
 * iconv_get_encoding returns an array that
 * stores all these variables.
 * @throws IconvException
 *
 */
function iconv_get_encoding(string $type = "all")
{
    error_clear_last();
    $result = \iconv_get_encoding($type);
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Changes the value of the internal configuration variable specified by
 * type to encoding.
 *
 * @param string $type The value of type can be any one of these:
 *
 * input_encoding
 * output_encoding
 * internal_encoding
 *
 * @param string $encoding The character set.
 * @throws IconvException
 *
 */
function iconv_set_encoding(string $type, string $encoding): void
{
    error_clear_last();
    $result = \iconv_set_encoding($type, $encoding);
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
}


/**
 * Performs a character set conversion on the string
 * string from from_encoding
 * to to_encoding.
 *
 * @param string $from_encoding The input charset.
 * @param string $to_encoding The output charset.
 *
 * If you append the string //TRANSLIT to
 * to_encoding transliteration is activated. This
 * means that when a character can't be represented in the target charset,
 * it can be approximated through one or several similarly looking
 * characters. If you append the string //IGNORE,
 * characters that cannot be represented in the target charset are silently
 * discarded. Otherwise, E_NOTICE is generated and the function
 * will return FALSE.
 *
 * If and how //TRANSLIT works exactly depends on the
 * system's iconv() implementation (cf. ICONV_IMPL).
 * Some implementations are known to ignore //TRANSLIT,
 * so the conversion is likely to fail for characters which are illegal for
 * the to_encoding.
 * @param string $string The string to be converted.
 * @return string Returns the converted string.
 * @throws IconvException
 *
 */
function iconv(string $from_encoding, string $to_encoding, string $string): string
{
    error_clear_last();
    $result = \iconv($from_encoding, $to_encoding, $string);
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}

