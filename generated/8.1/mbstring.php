<?php

namespace Safe;

use Safe\Exceptions\MbstringException;

/**
 * Returns a string containing the character specified by the Unicode code point value,
 * encoded in the specified encoding.
 *
 * This function complements mb_ord.
 *
 * @param int $codepoint A Unicode codepoint value, e.g. 128024 for U+1F418 ELEPHANT
 * @param null|string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return string A string containing the requested character, if it can be represented in the specified
 * encoding.
 * @throws MbstringException
 *
 */
function mb_chr(int $codepoint, ?string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \mb_chr($codepoint, $encoding);
    } else {
        $safeResult = \mb_chr($codepoint);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Converts the character encoding of string
 * to to_encoding
 * from optionally from_encoding.
 * If string is an array, all its string values will be
 * converted recursively.
 *
 * @param array|string $string The string or array being encoded.
 * @param string $to_encoding The type of encoding that string is being converted to.
 * @param mixed $from_encoding Is specified by character code names before conversion. It is either
 * an array, or a comma separated enumerated list.
 * If from_encoding is not specified, the internal
 * encoding will be used.
 *
 *
 * See supported
 * encodings.
 * @return array|string The encoded string or array on success.
 * @throws MbstringException
 *
 */
function mb_convert_encoding($string, string $to_encoding, $from_encoding = null)
{
    error_clear_last();
    if ($from_encoding !== null) {
        $safeResult = \mb_convert_encoding($string, $to_encoding, $from_encoding);
    } else {
        $safeResult = \mb_convert_encoding($string, $to_encoding);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Converts
 * character encoding of variables var and vars in
 * encoding from_encoding to encoding
 * to_encoding.
 *
 * mb_convert_variables join strings in Array
 * or Object to detect encoding, since encoding detection tends to
 * fail for short strings. Therefore, it is impossible to mix
 * encoding in single array or object.
 *
 * @param string $to_encoding The encoding that the string is being converted to.
 * @param array|string $from_encoding from_encoding is specified as an array
 * or comma separated string, it tries to detect encoding from
 * from-coding. When from_encoding
 * is omitted, detect_order is used.
 * @param array|object|string $var var is the reference to the
 * variable being converted. String, Array and Object are accepted.
 * mb_convert_variables assumes all parameters
 * have the same encoding.
 * @param array|object|string $vars Additional vars.
 * @return string The character encoding before conversion for success.
 * @throws MbstringException
 *
 */
function mb_convert_variables(string $to_encoding, $from_encoding, &$var, ...$vars): string
{
    error_clear_last();
    $safeResult = \mb_convert_variables($to_encoding, $from_encoding, $var, ...$vars);
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Sets the automatic character
 * encoding detection order to encoding.
 *
 * @param non-empty-list|non-falsy-string|null $encoding encoding is an array or
 * comma separated list of character encoding. See supported encodings.
 *
 * If encoding is omitted or NULL, it returns
 * the current character encoding detection order as array.
 *
 * This setting affects mb_detect_encoding and
 * mb_send_mail.
 *
 * mbstring currently implements the following
 * encoding detection filters. If there is an invalid byte sequence
 * for the following encodings, encoding detection will fail.
 *
 * For ISO-8859-*, mbstring
 * always detects as ISO-8859-*.
 *
 * For UTF-16, UTF-32,
 * UCS2 and UCS4, encoding
 * detection will fail always.
 * @return bool|list When setting the encoding detection order, TRUE is returned on success.
 *
 * When getting the encoding detection order, an ordered array of the encodings is returned.
 * @throws MbstringException
 *
 */
function mb_detect_order($encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \mb_detect_order($encoding);
    } else {
        $safeResult = \mb_detect_order();
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns an array of aliases for a known encoding type.
 *
 * @param string $encoding The encoding type being checked, for aliases.
 * @return list Returns a numerically indexed array of encoding aliases on success
 * @throws MbstringException
 *
 */
function mb_encoding_aliases(string $encoding): array
{
    error_clear_last();
    $safeResult = \mb_encoding_aliases($encoding);
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Scans string for matches to
 * pattern, then replaces the matched text
 * with the output of callback function.
 *
 * The behavior of this function is almost identical to mb_ereg_replace,
 * except for the fact that instead of
 * replacement parameter, one should specify a
 * callback.
 *
 * @param string $pattern The regular expression pattern.
 *
 * Multibyte characters may be used in pattern.
 * @param callable(array):string $callback A callback that will be called and passed an array of matched elements
 * in the  subject string. The callback should
 * return the replacement string.
 *
 * You'll often need the callback function
 * for a mb_ereg_replace_callback in just one place.
 * In this case you can use an
 * anonymous function to
 * declare the callback within the call to
 * mb_ereg_replace_callback. By doing it this way
 * you have all information for the call in one place and do not
 * clutter the function namespace with a callback function's name
 * not used anywhere else.
 * @param string $string The string being checked.
 * @param null|string $options The search option. See mb_regex_set_options for explanation.
 * @return null|string The resultant string on success.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 *
 */
function mb_ereg_replace_callback(string $pattern, callable $callback, string $string, ?string $options = null): ?string
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \mb_ereg_replace_callback($pattern, $callback, $string, $options);
    } else {
        $safeResult = \mb_ereg_replace_callback($pattern, $callback, $string);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param string $pattern The regular expression pattern.
 *
 * Multibyte characters may be used in pattern.
 * @param string $replacement The replacement text.
 * @param string $string The string being checked.
 * @param null|string $options
 * @return null|string The resultant string on success.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 *
 */
function mb_ereg_replace(string $pattern, string $replacement, string $string, ?string $options = null): ?string
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \mb_ereg_replace($pattern, $replacement, $string, $options);
    } else {
        $safeResult = \mb_ereg_replace($pattern, $replacement, $string);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @return array
 * @throws MbstringException
 *
 */
function mb_ereg_search_getregs(): array
{
    error_clear_last();
    $safeResult = \mb_ereg_search_getregs();
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * mb_ereg_search_init sets
 * string and pattern
 * for a multibyte regular expression. These values are used for
 * mb_ereg_search,
 * mb_ereg_search_pos, and
 * mb_ereg_search_regs.
 *
 * @param string $string The search string.
 * @param null|string $pattern The search pattern.
 * @param null|string $options The search option. See mb_regex_set_options for explanation.
 * @throws MbstringException
 *
 */
function mb_ereg_search_init(string $string, ?string $pattern = null, ?string $options = null): void
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \mb_ereg_search_init($string, $pattern, $options);
    } elseif ($pattern !== null) {
        $safeResult = \mb_ereg_search_init($string, $pattern);
    } else {
        $safeResult = \mb_ereg_search_init($string);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * Returns the matched part of a multibyte regular expression.
 *
 * @param null|string $pattern The search pattern.
 * @param null|string $options The search option. See mb_regex_set_options for explanation.
 * @return array
 * @throws MbstringException
 *
 */
function mb_ereg_search_regs(?string $pattern = null, ?string $options = null): array
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \mb_ereg_search_regs($pattern, $options);
    } elseif ($pattern !== null) {
        $safeResult = \mb_ereg_search_regs($pattern);
    } else {
        $safeResult = \mb_ereg_search_regs();
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param int $offset The position to set. If it is negative, it counts from the end of the string.
 * @throws MbstringException
 *
 */
function mb_ereg_search_setpos(int $offset): void
{
    error_clear_last();
    $safeResult = \mb_ereg_search_setpos($offset);
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $pattern The regular expression pattern.  Multibyte characters may be used. The case will be ignored.
 * @param string $replacement The replacement text.
 * @param string $string The searched string.
 * @param null|string $options
 * @return string The resultant string.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 *
 */
function mb_eregi_replace(string $pattern, string $replacement, string $string, ?string $options = null): string
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \mb_eregi_replace($pattern, $replacement, $string, $options);
    } else {
        $safeResult = \mb_eregi_replace($pattern, $replacement, $string);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param string $type If type is not specified or is specified as "all",
 * "internal_encoding", "http_input",
 * "http_output", "http_output_conv_mimetypes",
 * "mail_charset", "mail_header_encoding",
 * "mail_body_encoding", "illegal_chars",
 * "encoding_translation", "language",
 * "detect_order", "substitute_character"
 * and "strict_detection"
 * will be returned.
 *
 * If type is specified as
 * "internal_encoding", "http_input",
 * "http_output", "http_output_conv_mimetypes",
 * "mail_charset", "mail_header_encoding",
 * "mail_body_encoding", "illegal_chars",
 * "encoding_translation", "language",
 * "detect_order", "substitute_character"
 * or "strict_detection"
 * the specified setting parameter will be returned.
 * @return mixed An array of type information if type
 * is not specified, otherwise a specific type.
 * @throws MbstringException
 *
 */
function mb_get_info(string $type = "all")
{
    error_clear_last();
    $safeResult = \mb_get_info($type);
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Set/Get the HTTP output character encoding.
 * Output after this function is called will be converted from the set internal encoding to encoding.
 *
 * @param null|string $encoding If encoding is set,
 * mb_http_output sets the HTTP output character
 * encoding to encoding.
 *
 * If encoding is omitted,
 * mb_http_output returns the current HTTP output
 * character encoding.
 * @return bool|string If encoding is omitted,
 * mb_http_output returns the current HTTP output
 * character encoding. Otherwise,
 * Returns TRUE on success.
 * @throws MbstringException
 *
 */
function mb_http_output(?string $encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \mb_http_output($encoding);
    } else {
        $safeResult = \mb_http_output();
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Set/Get the internal character encoding
 *
 * @param null|string $encoding encoding is the character encoding name
 * used for the HTTP input character encoding conversion, HTTP output
 * character encoding conversion, and the default character encoding
 * for string functions defined by the mbstring module.
 * You should notice that the internal encoding is totally different from the one for multibyte regex.
 * @return bool|string If encoding is set, then
 * Returns TRUE on success.
 * In this case, the character encoding for multibyte regex is NOT changed.
 * If encoding is omitted, then
 * the current character encoding name is returned.
 * @throws MbstringException
 *
 */
function mb_internal_encoding(?string $encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \mb_internal_encoding($encoding);
    } else {
        $safeResult = \mb_internal_encoding();
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the Unicode code point value of the given character.
 *
 * This function complements mb_chr.
 *
 * @param string $string A string
 * @param null|string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return int The Unicode code point for the first character of string.
 * @throws MbstringException
 *
 */
function mb_ord(string $string, ?string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \mb_ord($string, $encoding);
    } else {
        $safeResult = \mb_ord($string);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Parses GET/POST/COOKIE data and
 * sets global variables. Since PHP does not provide raw POST/COOKIE
 * data, it can only be used for GET data for now. It parses URL
 * encoded data, detects encoding, converts coding to internal
 * encoding and set values to the result array or
 * global variables.
 *
 * @param string $string The URL encoded data.
 * @param array|null $result An array containing decoded and character encoded converted values.
 * @throws MbstringException
 *
 */
function mb_parse_str(string $string, ?array &$result): void
{
    error_clear_last();
    $safeResult = \mb_parse_str($string, $result);
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * Set/Get character encoding for a multibyte regex.
 *
 * @param null|string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return bool|string
 * @throws MbstringException
 *
 */
function mb_regex_encoding(?string $encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $safeResult = \mb_regex_encoding($encoding);
    } else {
        $safeResult = \mb_regex_encoding();
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Sends email. Headers and messages are converted and encoded according
 * to the mb_language setting. It's a wrapper function
 * for mail, so see also mail for details.
 *
 * @param string $to The mail addresses being sent to. Multiple
 * recipients may be specified by putting a comma between each
 * address in to.
 * This parameter is not automatically encoded.
 * @param string $subject The subject of the mail.
 * @param string $message The message of the mail.
 * @param array|null|string $additional_headers String or array to be inserted at the end of the email header.
 *
 * This is typically used to add extra headers (From, Cc, and Bcc).
 * Multiple extra headers should be separated with a CRLF (\r\n).
 * Validate parameter not to be injected unwanted headers by attackers.
 *
 * If an array is passed, its keys are the header names and its
 * values are the respective header values.
 *
 * When sending mail, the mail must contain
 * a From header. This can be set with the
 * additional_headers parameter, or a default
 * can be set in php.ini.
 *
 * Failing to do this will result in an error
 * message similar to Warning: mail(): "sendmail_from" not
 * set in php.ini or custom "From:" header missing.
 * The From header sets also
 * Return-Path under Windows.
 *
 * If messages are not received, try using a LF (\n) only.
 * Some Unix mail transfer agents (most notably
 * qmail) replace LF by CRLF
 * automatically (which leads to doubling CR if CRLF is used).
 * This should be a last resort, as it does not comply with
 * RFC 2822.
 * @param null|string $additional_params additional_params is a MTA command line
 * parameter. It is useful when setting the correct Return-Path
 * header when using sendmail.
 *
 * This parameter is escaped by escapeshellcmd internally
 * to prevent command execution. escapeshellcmd prevents
 * command execution, but allows to add additional parameters. For security reason,
 * this parameter should be validated.
 *
 * Since escapeshellcmd is applied automatically, some characters
 * that are allowed as email addresses by internet RFCs cannot be used. Programs
 * that are required to use these characters mail cannot be used.
 *
 * The user that the webserver runs as should be added as a trusted user to the
 * sendmail configuration to prevent a 'X-Warning' header from being added
 * to the message when the envelope sender (-f) is set using this method.
 * For sendmail users, this file is /etc/mail/trusted-users.
 * @throws MbstringException
 *
 */
function mb_send_mail(string $to, string $subject, string $message, $additional_headers = [], ?string $additional_params = null): void
{
    error_clear_last();
    if ($additional_params !== null) {
        $safeResult = \mb_send_mail($to, $subject, $message, $additional_headers, $additional_params);
    } else {
        $safeResult = \mb_send_mail($to, $subject, $message, $additional_headers);
    }
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $pattern The regular expression pattern.
 * @param string $string The string being split.
 * @param int $limit
 * @return list The result as an array.
 * @throws MbstringException
 *
 */
function mb_split(string $pattern, string $string, int $limit = -1): array
{
    error_clear_last();
    $safeResult = \mb_split($pattern, $string, $limit);
    if ($safeResult === false) {
        throw MbstringException::createFromPhpError();
    }
    return $safeResult;
}
