<?php
/**
 * This file contains all the functions that could not be dealt with automatically using the code generator.
 * If you add a function in this list, do not forget to add it in the generator/config/specialCasesFunctions.php
 *
 */

namespace Safe;

use const PREG_NO_ERROR;
use Safe\Exceptions\ApcException;
use Safe\Exceptions\ApcuException;
use Safe\Exceptions\JsonException;
use Safe\Exceptions\PcreException;

/**
 * Wrapper for json_decode that throws when an error occurs.
 *
 * @param string $json    JSON data to parse
 * @param bool $assoc     When true, returned objects will be converted
 *                        into associative arrays.
 * @param int $depth   User specified recursion depth.
 * @param int $options Bitmask of JSON decode options.
 *
 * @return mixed
 * @throws JsonException if the JSON cannot be decoded.
 * @link http://www.php.net/manual/en/function.json-decode.php
 */
function json_decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0)
{
    $data = \json_decode($json, $assoc, $depth, $options);
    if (JSON_ERROR_NONE !== json_last_error()) {
        throw JsonException::createFromPhpError();
    }
    return $data;
}


/**
 * Fetchs a stored variable from the cache.
 *
 * @param mixed $key The key used to store the value (with
 * apc_store). If an array is passed then each
 * element is fetched and returned.
 * @return mixed The stored variable or array of variables on success; FALSE on failure
 * @throws ApcException
 *
 */
function apc_fetch($key)
{
    error_clear_last();
    $result = \apc_fetch($key, $success);
    if ($success === false) {
        throw ApcException::createFromPhpError();
    }
    return $result;
}

/**
 * Fetchs an entry from the cache.
 *
 * @param string|string[] $key The key used to store the value (with
 * apcu_store). If an array is passed then each
 * element is fetched and returned.
 * @return mixed The stored variable or array of variables on success; FALSE on failure
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
 * @param mixed $pattern The pattern to search for. It can be either a string or an array with
 * strings.
 *
 * Several PCRE modifiers
 * are also available.
 * @param mixed $replacement The string or an array with strings to replace. If this parameter is a
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
 * @param string|array $subject The string or an array with strings to search and replace.
 *
 * If subject is an array, then the search and
 * replace is performed on every entry of subject,
 * and the return value is an array as well.
 * @param int $limit The maximum possible replacements for each pattern in each
 * subject string. Defaults to
 * -1 (no limit).
 * @param int $count If specified, this variable will be filled with the number of
 * replacements done.
 * @return string|array|null preg_replace returns an array if the
 * subject parameter is an array, or a string
 * otherwise.
 *
 * If matches are found, the new subject will
 * be returned, otherwise subject will be
 * returned unchanged.
 *
 * Returns a file pointer resource on success, .
 * @throws PcreException
 *
 */
function preg_replace($pattern, $replacement, $subject, int $limit = -1, int &$count = null)
{
    error_clear_last();
    $result = \preg_replace($pattern, $replacement, $subject, $limit, $count);
    if (preg_last_error() !== PREG_NO_ERROR) {
        throw PcreException::createFromPhpError();
    }
    return $result;
}
