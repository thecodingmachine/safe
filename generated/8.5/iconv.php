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
    $safeResult = \iconv_get_encoding($type);
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Decodes a MIME header field.
 *
 * @param string $string The encoded header, as a string.
 * @param int $mode mode determines the behaviour in the event
 * iconv_mime_decode encounters a malformed
 * MIME header field. You can specify any combination
 * of the following bitmasks.
 *
 * Bitmasks acceptable to iconv_mime_decode
 *
 *
 *
 * Value
 * Constant
 * Description
 *
 *
 *
 *
 * 1
 * ICONV_MIME_DECODE_STRICT
 *
 * If set, the given header is decoded in full conformance with the
 * standards defined in RFC2047.
 * This option is disabled by default because there are a lot of
 * broken mail user agents that don't follow the specification and don't
 * produce correct MIME headers.
 *
 *
 *
 * 2
 * ICONV_MIME_DECODE_CONTINUE_ON_ERROR
 *
 * If set, iconv_mime_decode_headers
 * attempts to ignore any grammatical errors and continue to process
 * a given header.
 *
 *
 *
 *
 *
 * @param null|string $encoding The optional encoding parameter specifies the
 * character set to represent the result by. If omitted or NULL,
 * iconv.internal_encoding
 * will be used.
 * @return string Returns a decoded MIME field on success,
 * or FALSE if an error occurs during the decoding.
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
 * Composes and returns a string that represents a valid MIME
 * header field, which looks like the following:
 *
 *
 *
 * In the above example, "Subject" is the field name and the portion that
 * begins with "=?ISO-8859-1?..." is the field value.
 *
 * @param string $field_name The field name.
 * @param string $field_value The field value.
 * @param array $options You can control the behaviour of iconv_mime_encode
 * by specifying an associative array that contains configuration items
 * to the optional third parameter options.
 * The items supported by iconv_mime_encode are
 * listed below. Note that item names are treated case-sensitive.
 *
 * Configuration items supported by iconv_mime_encode
 *
 *
 *
 * Item
 * Type
 * Description
 * Default value
 * Example
 *
 *
 *
 *
 * scheme
 * string
 *
 * Specifies the method to encode a field value by. The value of
 * this item may be either "B" or "Q", where "B" stands for
 * base64 encoding scheme and "Q" stands for
 * quoted-printable encoding scheme.
 *
 * B
 * B
 *
 *
 * input-charset
 * string
 *
 * Specifies the character set in which the first parameter
 * field_name and the second parameter
 * field_value are presented. If not given,
 * iconv_mime_encode assumes those parameters
 * are presented to it in the
 * iconv.internal_encoding
 * ini setting.
 *
 *
 * iconv.internal_encoding
 *
 * ISO-8859-1
 *
 *
 * output-charset
 * string
 *
 * Specifies the character set to use to compose the
 * MIME header.
 *
 *
 * iconv.internal_encoding
 *
 * UTF-8
 *
 *
 * line-length
 * int
 *
 * Specifies the maximum length of the header lines. The resulting
 * header is "folded" to a set of multiple lines in case
 * the resulting header field would be longer than the value of this
 * parameter, according to
 * RFC2822 - Internet Message Format.
 * If not given, the length will be limited to 76 characters.
 *
 * 76
 * 996
 *
 *
 * line-break-chars
 * string
 *
 * Specifies the sequence of characters to append to each line
 * as an end-of-line sign when "folding" is performed on a long header
 * field. If not given, this defaults to "\r\n"
 * (CR LF). Note that
 * this parameter is always treated as an ASCII string regardless
 * of the value of input-charset.
 *
 * \r\n
 * \n
 *
 *
 *
 *
 * @return string Returns an encoded MIME field on success,
 * or FALSE if an error occurs during the encoding.
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
    $safeResult = \iconv_set_encoding($type, $encoding);
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
}


/**
 * In contrast to strlen,
 * iconv_strlen counts the occurrences of characters
 * in the given byte sequence string on the basis of
 * the specified character set, the result of which is not necessarily
 * identical to the length of the string in bytes.
 *
 * @param string $string The string.
 * @param null|string $encoding If encoding parameter is omitted or NULL,
 * string is assumed to be encoded in
 * iconv.internal_encoding.
 * @return 0|positive-int Returns the character count of string, as an integer,
 * or FALSE if an error occurs during the encoding.
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
 * Converts string from from_encoding
 * to to_encoding.
 *
 * @param string $from_encoding The current encoding used to interpret string.
 * @param string $to_encoding The desired encoding of the result.
 *
 * If the string //TRANSLIT is appended to
 * to_encoding, then transliteration is activated. This
 * means that when a character can't be represented in the target charset,
 * it may be approximated through one or several similarly looking
 * characters. If the string //IGNORE is appended,
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
    $safeResult = \iconv($from_encoding, $to_encoding, $string);
    if ($safeResult === false) {
        throw IconvException::createFromPhpError();
    }
    return $safeResult;
}
