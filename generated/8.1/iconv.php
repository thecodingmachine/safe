<?php

namespace Safe;

use Safe\Exceptions\IconvException;

/**
 * @param string $type
 * @return mixed
 * @throws IconvException
 *
 */
function iconv_get_encoding(string $type = "all")
{
    error_clear_last();
    $safeResult = \iconv_get_encoding($type);
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $string
 * @param int $mode
 * @param null|string $encoding
 * @return string
 * @throws IconvException
 *
 */
function iconv_mime_decode(string $string, int $mode = 0, ?string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \iconv_mime_decode($string, $mode, $encoding);
    } else {
        $safeResult = \iconv_mime_decode($string, $mode);
    }
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $field_name
 * @param string $field_value
 * @param array $options
 * @return string
 * @throws IconvException
 *
 */
function iconv_mime_encode(string $field_name, string $field_value, array $options = []): string
{
    error_clear_last();
    $safeResult = \iconv_mime_encode($field_name, $field_value, $options);
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $type
 * @param string $encoding
 * @throws IconvException
 *
 */
function iconv_set_encoding(string $type, string $encoding): void
{
    error_clear_last();
    $safeResult = \iconv_set_encoding($type, $encoding);
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
}


/**
 * @param string $string
 * @param null|string $encoding
 * @return 0|positive-int
 * @throws IconvException
 *
 */
function iconv_strlen(string $string, ?string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \iconv_strlen($string, $encoding);
    } else {
        $safeResult = \iconv_strlen($string);
    }
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $from_encoding
 * @param string $to_encoding
 * @param string $string
 * @return string
 * @throws IconvException
 *
 */
function iconv(string $from_encoding, string $to_encoding, string $string): string
{
    error_clear_last();
    $safeResult = \iconv($from_encoding, $to_encoding, $string);
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
    return $safeResult;
}
