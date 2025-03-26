<?php

/**
 * This file contains all the functions that could not be dealt with automatically using the code generator.
 * If you add a function in this list, do not forget to add it in the generator/config/specialCasesFunctions.php
 *
 */

namespace Safe;

use Safe\Exceptions\MiscException;
use Safe\Exceptions\PosixException;
use Safe\Exceptions\SocketsException;
use Safe\Exceptions\ApcuException;
use Safe\Exceptions\JsonException;
use Safe\Exceptions\OpensslException;
use Safe\Exceptions\PcreException;
use Safe\Exceptions\SimplexmlException;
use Safe\Exceptions\FilesystemException;

use const PREG_NO_ERROR;

/**
 * Wrapper for json_decode that throws when an error occurs.
 *
 * @param string $json    JSON data to parse
 * @param bool|null $associative  true for arrays, false for objects, null to defer to $flags
 * @param int<1, max> $depth   User specified recursion depth.
 * @param int $flags Bitmask of JSON decode options.
 *
 * @return mixed
 * @throws JsonException if the JSON cannot be decoded.
 * @link http://www.php.net/manual/en/function.json-decode.php
 */
function json_decode(string $json, ?bool $associative = null, int $depth = 512, int $flags = 0): mixed
{
    $data = \json_decode($json, $associative, $depth, $flags);
    if (!($flags & JSON_THROW_ON_ERROR) && JSON_ERROR_NONE !== json_last_error()) {
        throw JsonException::createFromPhpError();
    }
    return $data;
}

/**
 * Fetches an entry from the cache.
 *
 * @param string|string[] $key The key used to store the value (with
 * apcu_store). If an array is passed then each
 * element is fetched and returned.
 * @return mixed The stored variable or array of variables on success
 * @throws ApcuException
 *
 */
function apcu_fetch($key)
{
    error_clear_last();
    $result = \apcu_fetch($key, $success);
    if ($success === false) {
        throw ApcuException::createFromPhpError();
    }
    return $result;
}

/**
 * Searches subject for matches to
 * pattern and replaces them with
 * replacement.
 *
 * @param string[]|string $pattern The pattern to search for. It can be either a string or an array with
 * strings.
 *
 * Several PCRE modifiers
 * are also available.
 * @param string[]|string $replacement The string or an array with strings to replace. If this parameter is a
 * string and the pattern parameter is an array,
 * all patterns will be replaced by that string. If both
 * pattern and replacement
 * parameters are arrays, each pattern will be
 * replaced by the replacement counterpart. If
 * there are fewer elements in the replacement
 * array than in the pattern array, any extra
 * patterns will be replaced by an empty string.
 *
 * replacement may contain references of the form
 * \\n or
 * $n, with the latter form
 * being the preferred one. Every such reference will be replaced by the text
 * captured by the n'th parenthesized pattern.
 * n can be from 0 to 99, and
 * \\0 or $0 refers to the text matched
 * by the whole pattern. Opening parentheses are counted from left to right
 * (starting from 1) to obtain the number of the capturing subpattern.
 * To use backslash in replacement, it must be doubled
 * ("\\\\" PHP string).
 *
 * When working with a replacement pattern where a backreference is
 * immediately followed by another number (i.e.: placing a literal number
 * immediately after a matched pattern), you cannot use the familiar
 * \\1 notation for your backreference.
 * \\11, for example, would confuse
 * preg_replace since it does not know whether you
 * want the \\1 backreference followed by a literal
 * 1, or the \\11 backreference
 * followed by nothing.  In this case the solution is to use
 * ${1}1.  This creates an isolated
 * $1 backreference, leaving the 1
 * as a literal.
 *
 * When using the deprecated e modifier, this function escapes
 * some characters (namely ', ",
 * \ and NULL) in the strings that replace the
 * backreferences. This is done to ensure that no syntax errors arise
 * from backreference usage with either single or double quotes (e.g.
 * 'strlen(\'$1\')+strlen("$2")'). Make sure you are
 * aware of PHP's string
 * syntax to know exactly how the interpreted string will look.
 * @param string|array|string[] $subject The string or an array with strings to search and replace.
 *
 * If subject is an array, then the search and
 * replace is performed on every entry of subject,
 * and the return value is an array as well.
 * @param int $limit The maximum possible replacements for each pattern in each
 * subject string. Defaults to
 * -1 (no limit).
 * @param int $count If specified, this variable will be filled with the number of
 * replacements done.
 * @param-out int $count
 *
 * @return string|array|string[] preg_replace returns an array if the
 * subject parameter is an array, or a string
 * otherwise.
 *
 * If matches are found, the new subject will
 * be returned, otherwise subject will be
 * returned unchanged.
 *
 * @throws PcreException
 *
 */
function preg_replace($pattern, $replacement, $subject, int $limit = -1, ?int &$count = null)
{
    error_clear_last();
    $result = \preg_replace($pattern, $replacement, $subject, $limit, $count);
    if (preg_last_error() !== PREG_NO_ERROR || $result === null) {
        throw PcreException::createFromPhpError();
    }
    return $result;
}

/**
 * Encrypts given data with given method and key, returns a raw
 * or base64 encoded string
 *
 * @param string $data The plaintext message data to be encrypted.
 * @param string $method The cipher method. For a list of available cipher methods, use openssl_get_cipher_methods.
 * @param string $key The key.
 * @param int $options options is a bitwise disjunction of the flags
 * OPENSSL_RAW_DATA and
 * OPENSSL_ZERO_PADDING.
 * @param string $iv A non-NULL Initialization Vector.
 * @param string $tag The authentication tag passed by reference when using AEAD cipher mode (GCM or CCM).
 * @param string $aad Additional authentication data.
 * @param int $tag_length The length of the authentication tag. Its value can be between 4 and 16 for GCM mode.
 * @return string Returns the encrypted string.
 * @throws OpensslException
 *
 */
function openssl_encrypt(string $data, string $method, string $key, int $options = 0, string $iv = "", ?string &$tag = "", string $aad = "", int $tag_length = 16): string
{
    error_clear_last();
    // The $tag parameter is handled in a weird way by openssl_encrypt. It cannot be provided unless encoding is AEAD
    if (func_num_args() <= 5) {
        $result = \openssl_encrypt($data, $method, $key, $options, $iv);
    } else {
        $result = \openssl_encrypt($data, $method, $key, $options, $iv, $tag, $aad, $tag_length);
    }
    if ($result === false) {
        throw OpensslException::createFromPhpError();
    }
    return $result;
}

/**
 * The function socket_write writes to the
 * socket from the given
 * buffer.
 *
 * @param \Socket $socket
 * @param string $buffer The buffer to be written.
 * @param int $length The optional parameter length can specify an
 * alternate length of bytes written to the socket. If this length is
 * greater than the buffer length, it is silently truncated to the length
 * of the buffer.
 * @return int Returns the number of bytes successfully written to the socket.
 * The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 * @throws SocketsException
 *
 */
function socket_write(\Socket $socket, string $buffer, int $length = 0): int
{
    error_clear_last();
    $result = $length === 0 ? \socket_write($socket, $buffer) : \socket_write($socket, $buffer, $length);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}

/**
 * This function takes a node of a DOM
 * document and makes it into a SimpleXML node. This new object can
 * then be used as a native SimpleXML element.
 *
 * @param \DOMNode $node A DOM Element node
 * @param string $class_name You may use this optional parameter so that
 * simplexml_import_dom will return an object of
 * the specified class. That class should extend the
 * SimpleXMLElement class.
 * @return \SimpleXMLElement Returns a SimpleXMLElement.
 * @throws SimplexmlException
 *
 */
function simplexml_import_dom(\DOMNode $node, string $class_name = \SimpleXMLElement::class): \SimpleXMLElement
{
    error_clear_last();
    $result = \simplexml_import_dom($node, $class_name);
    if ($result === null) {
        throw SimplexmlException::createFromPhpError();
    }
    return $result;
}

/**
 * Convert the well-formed XML document in the given file to an object.
 *
 * @param string $filename Path to the XML file
 * @param string $class_name You may use this optional parameter so that
 * simplexml_load_file will return an object of
 * the specified class. That class should extend the
 * SimpleXMLElement class.
 * @param int $options Since Libxml 2.6.0, you may also use the
 * options parameter to specify additional Libxml parameters.
 * @param string $namespace_or_prefix Namespace prefix or URI.
 * @param bool $is_prefix TRUE if namespace_or_prefix is a prefix, FALSE if it's a URI;
 * defaults to FALSE.
 * @return \SimpleXMLElement Returns an object of class SimpleXMLElement with
 * properties containing the data held within the XML document.
 * @throws SimplexmlException
 *
 */
function simplexml_load_file(string $filename, string $class_name = \SimpleXMLElement::class, int $options = 0, string $namespace_or_prefix = "", bool $is_prefix = false): \SimpleXMLElement
{
    error_clear_last();
    $result = \simplexml_load_file($filename, $class_name, $options, $namespace_or_prefix, $is_prefix);
    if ($result === false) {
        throw SimplexmlException::createFromPhpError();
    }
    return $result;
}


/**
 * Takes a well-formed XML string and returns it as an object.
 *
 * @param string $data A well-formed XML string
 * @param string $class_name You may use this optional parameter so that
 * simplexml_load_string will return an object of
 * the specified class. That class should extend the
 * SimpleXMLElement class.
 * @param int $options Since Libxml 2.6.0, you may also use the
 * options parameter to specify additional Libxml parameters.
 * @param string $namespace_or_prefix Namespace prefix or URI.
 * @param bool $is_prefix TRUE if namespace_or_prefix is a prefix, FALSE if it's a URI;
 * defaults to FALSE.
 * @return \SimpleXMLElement Returns an object of class SimpleXMLElement with
 * properties containing the data held within the xml document.
 * @throws SimplexmlException
 *
 */
function simplexml_load_string(string $data, string $class_name = \SimpleXMLElement::class, int $options = 0, string $namespace_or_prefix = "", bool $is_prefix = false): \SimpleXMLElement
{
    error_clear_last();
    $result = \simplexml_load_string($data, $class_name, $options, $namespace_or_prefix, $is_prefix);
    if ($result === false) {
        throw SimplexmlException::createFromPhpError();
    }
    return $result;
}

/**
 * Returns three samples representing the average system load
 * (the number of processes in the system run queue) over the last 1, 5 and 15
 * minutes, respectively. Returns FALSE on failure.
 *
 * @return array<int,float> Returns an array with three samples (last 1, 5 and 15
 * minutes).
 * @throws MiscException
 *
 */
function sys_getloadavg(): array
{
    error_clear_last();
    $result = \sys_getloadavg();
    if ($result === false) {
        throw MiscException::createFromPhpError();
    }
    return $result;
}

/**
 * Returns the process group identifier of the process
 * process_id.
 *
 * @param int $process_id The process id.
 * @return int Returns the identifier, as an int.
 * @throws PosixException
 *
 */
function posix_getpgid(int $process_id): int
{
    error_clear_last();
    $result = \posix_getpgid($process_id);
    if ($result === false) {
        throw PosixException::createFromPhpError();
    }
    return $result;
}


/**
 * fputcsv formats a line (passed as a
 * fields array) as CSV and writes it (terminated by a
 * newline) to the specified file stream.
 *
 * @param resource $stream The file pointer must be valid, and must point to
 * a file successfully opened by fopen or
 * fsockopen (and not yet closed by
 * fclose).
 * @phpstan-param (scalar|\Stringable|null)[] $fields
 * @param array $fields An array of strings.
 * @param string $separator The optional separator parameter sets the field
 * delimiter (one single-byte character only).
 * @param string $enclosure The optional enclosure parameter sets the field
 * enclosure (one single-byte character only).
 * @param string $escape The optional escape parameter sets the
 * escape character (at most one single-byte character).
 * An empty string ("") disables the proprietary escape mechanism.
 * @param string $eol The optional eol parameter sets
 * a custom End of Line sequence.
 * @return int Returns the length of the written string.
 * @throws FilesystemException
 *
 */
function fputcsv($stream, array $fields, string $separator = ",", string $enclosure = "\"", string $escape = "\\", string $eol = "\n"): int
{
    error_clear_last();
    $result = \fputcsv($stream, $fields, $separator, $enclosure, $escape, $eol);

    if ($result === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $result;
}

/**
 * Similar to fgets except that
 * fgetcsv parses the line it reads for fields in
 * CSV format and returns an array containing the fields
 * read.
 *
 * @param resource $stream A valid file pointer to a file successfully opened by
 * fopen, popen, or
 * fsockopen.
 * @param int<0, max>|null $length Must be greater than the longest line (in characters) to be found in
 * the CSV file (allowing for trailing line-end characters). Otherwise the
 * line is split in chunks of length characters,
 * unless the split would occur inside an enclosure.
 *
 * Omitting this parameter (or setting it to 0,
 * or NULL in PHP 8.0.0 or later) the maximum line length is not limited,
 * which is slightly slower.
 * @param string $separator The optional separator parameter sets the field separator (one single-byte character only).
 * @param string $enclosure The optional enclosure parameter sets the field enclosure character (one single-byte character only).
 * @param string $escape The optional escape parameter sets the escape character (at most one single-byte character).
 * An empty string ("") disables the proprietary escape mechanism.
 * @return mixed[]|false Returns an indexed array containing the fields read on success or false when there is no more lines.
 * @throws FilesystemException
 *
 */
function fgetcsv($stream, ?int $length = null, string $separator = ",", string $enclosure = "\"", string $escape = "\\"): array|false
{
    error_clear_last();
    $safeResult = \fgetcsv($stream, $length, $separator, $enclosure, $escape);
    if ($safeResult === false && \feof($stream) === false) {
        throw FilesystemException::createFromPhpError();
    }
    return $safeResult;
}
