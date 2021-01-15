<?php

namespace Safe;

use Safe\Exceptions\MbstringException;

/**
 * 
 * 
 * @param int $codepoint 
 * @param string $encoding 
 * @return string Returns a specific character.
 * @throws MbstringException
 * 
 */
function mb_chr(int $codepoint, string $encoding = null): string
{
    error_clear_last();
    $result = \mb_chr($codepoint, $encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Converts the character encoding of string
 * to to_encoding
 * from optionally from_encoding.
 * If string is an array, all its string values will be
 * converted recursively.
 * 
 * @param  $string The string or array being encoded.
 * @param string $to_encoding The type of encoding that string is being converted to.
 * @param mixed $from_encoding Is specified by character code names before conversion. It is either
 * an array, or a comma separated enumerated list.
 * If from_encoding is not specified, the internal 
 * encoding will be used.
 * 
 * 
 * See supported
 * encodings.
 * @return string The encoded string or array on success.
 * @throws MbstringException
 * 
 */
function mb_convert_encoding( $string, string $to_encoding,  $from_encoding = null): string
{
    error_clear_last();
    $result = \mb_convert_encoding($string, $to_encoding, $from_encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Sets the automatic character
 * encoding detection order to encoding.
 * 
 * @param  $encoding encoding is an array or 
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
 * @return bool|array When setting the encoding detection order, TRUE is returned on success.
 * 
 * When getting the encoding detection order, an ordered array of the encodings is returned.
 * @throws MbstringException
 * 
 */
function mb_detect_order( $encoding = null)
{
    error_clear_last();
    $result = \mb_detect_order($encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns an array of aliases for a known encoding type.
 * 
 * @param string $encoding The encoding type being checked, for aliases.
 * @return array Returns a numerically indexed array of encoding aliases on success
 * @throws MbstringException
 * 
 */
function mb_encoding_aliases(string $encoding): array
{
    error_clear_last();
    $result = \mb_encoding_aliases($encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
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
 * @param callable $callback A callback that will be called and passed an array of matched elements
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
 * @param  $options The search option. See mb_regex_set_options for explanation.
 * @return string The resultant string on success.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 * 
 */
function mb_ereg_replace_callback(string $pattern, callable $callback, string $string,  $options = null): string
{
    error_clear_last();
    $result = \mb_ereg_replace_callback($pattern, $callback, $string, $options);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param string $pattern The regular expression pattern.
 * 
 * Multibyte characters may be used in pattern.
 * @param string $replacement The replacement text.
 * @param string $string The string being checked.
 * @param  $options 
 * @return string The resultant string on success.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 * 
 */
function mb_ereg_replace(string $pattern, string $replacement, string $string,  $options = null): string
{
    error_clear_last();
    $result = \mb_ereg_replace($pattern, $replacement, $string, $options);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
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
    $result = \mb_ereg_search_getregs();
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
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
 * @param string $pattern The search pattern.
 * @param  $options The search option. See mb_regex_set_options for explanation.
 * @throws MbstringException
 * 
 */
function mb_ereg_search_init(string $string, string $pattern = null,  $options = null): void
{
    error_clear_last();
    $result = \mb_ereg_search_init($string, $pattern, $options);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * Returns the matched part of a multibyte regular expression.
 * 
 * @param string $pattern The search pattern.
 * @param  $options The search option. See mb_regex_set_options for explanation.
 * @return array 
 * @throws MbstringException
 * 
 */
function mb_ereg_search_regs(string $pattern = null,  $options = null): array
{
    error_clear_last();
    $result = \mb_ereg_search_regs($pattern, $options);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
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
    $result = \mb_ereg_search_setpos($offset);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param string $pattern The regular expression pattern.  Multibyte characters may be used. The case will be ignored.
 * @param string $replacement The replacement text.
 * @param string $string The searched string.
 * @param  $options 
 * @return string The resultant string. 
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 * 
 */
function mb_eregi_replace(string $pattern, string $replacement, string $string,  $options = null): string
{
    error_clear_last();
    $result = \mb_eregi_replace($pattern, $replacement, $string, $options);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param string $type If type isn't specified or is specified to
 * "all", an array having the elements "internal_encoding",
 * "http_output", "http_input", "func_overload", "mail_charset",
 * "mail_header_encoding", "mail_body_encoding" will be returned.
 * 
 * If type is specified as "http_output",
 * "http_input", "internal_encoding", "func_overload",
 * the specified setting parameter will be returned.
 * @return mixed An array of type information if type 
 * is not specified, otherwise a specific type.
 * @throws MbstringException
 * 
 */
function mb_get_info(string $type = "all")
{
    error_clear_last();
    $result = \mb_get_info($type);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Set/Get the HTTP output character encoding.
 * Output after this function is called will be converted from the set internal encoding to encoding.
 * 
 * @param string $encoding If encoding is set,
 * mb_http_output sets the HTTP output character
 * encoding to encoding.
 * 
 * If encoding is omitted,
 * mb_http_output returns the current HTTP output
 * character encoding.
 * @return string|bool If encoding is omitted,
 * mb_http_output returns the current HTTP output
 * character encoding. Otherwise, 
 * Returns TRUE on success.
 * @throws MbstringException
 * 
 */
function mb_http_output(string $encoding = null)
{
    error_clear_last();
    $result = \mb_http_output($encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Set/Get the internal character encoding
 * 
 * @param string $encoding encoding is the character encoding name 
 * used for the HTTP input character encoding conversion, HTTP output 
 * character encoding conversion, and the default character encoding 
 * for string functions defined by the mbstring module.
 * You should notice that the internal encoding is totally different from the one for multibyte regex.
 * @return string|bool If encoding is set, then 
 * Returns TRUE on success.
 * In this case, the character encoding for multibyte regex is NOT changed.
 * If encoding is omitted, then 
 * the current character encoding name is returned.
 * @throws MbstringException
 * 
 */
function mb_internal_encoding(string $encoding = null)
{
    error_clear_last();
    $result = \mb_internal_encoding($encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param string $string 
 * @param  $encoding 
 * @return int Returns a code point of character.
 * @throws MbstringException
 * 
 */
function mb_ord(string $string,  $encoding = null): int
{
    error_clear_last();
    $result = \mb_ord($string, $encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
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
    $result = \mb_parse_str($string, $result);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * Set/Get character encoding for a multibyte regex.
 * 
 * @param string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return string|bool 
 * @throws MbstringException
 * 
 */
function mb_regex_encoding(string $encoding = null)
{
    error_clear_last();
    $result = \mb_regex_encoding($encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
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
 * @param string|array|null $additional_headers String or array to be inserted at the end of the email header.
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
 * @param  $additional_params additional_params is a MTA command line
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
function mb_send_mail(string $to, string $subject, string $message,  $additional_headers = [],  $additional_params = null): void
{
    error_clear_last();
    $result = \mb_send_mail($to, $subject, $message, $additional_headers, $additional_params);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param string $pattern The regular expression pattern.
 * @param string $string The string being split.
 * @param int $limit 
 * @return array The result as an array.
 * @throws MbstringException
 * 
 */
function mb_split(string $pattern, string $string, int $limit = -1): array
{
    error_clear_last();
    $result = \mb_split($pattern, $string, $limit);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * This function will return an array of strings, it is a version of str_split with support for encodings of variable character size as well as fixed-size encodings of 1,2 or 4 byte characters.
 * If the length parameter is specified, the string is broken down into chunks of the specified length in characters (not bytes).
 * The encoding parameter can be optionally specified and it is good practice to do so.
 * 
 * @param string $string The string to split into characters or chunks.
 * @param int $length If specified, each element of the returned array will be composed of multiple characters instead of a single character.
 * @param  $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * 
 * A string specifying one of the supported encodings.
 * @return array mb_str_split returns an array of strings.
 * @throws MbstringException
 * 
 */
function mb_str_split(string $string, int $length = 1,  $encoding = null): array
{
    error_clear_last();
    $result = \mb_str_split($string, $length, $encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


