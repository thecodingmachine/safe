<?php

namespace Safe;

use Safe\Exceptions\UrlException;

/**
 * Decodes a base64 encoded string.
 *
 * @param string $string The encoded data.
 * @param bool $strict If the strict parameter is set to TRUE
 * then the base64_decode function will return
 * FALSE if the input contains character from outside the base64
 * alphabet. Otherwise invalid characters will be silently discarded.
 * @return string Returns the decoded data. The returned data may be
 * binary.
 * @throws UrlException
 *
 */
function base64_decode(string $string, bool $strict = false): string
{
    error_clear_last();
    $result = \base64_decode($string, $strict);
    if ($result === false) {
        throw UrlException::createFromPhpError();
    }
    return $result;
}


/**
 * Opens filename and parses it line by line for
 * &lt;meta&gt; tags in the file. The parsing stops at
 * &lt;/head&gt;.
 *
 * @param string $filename The path to the HTML file, as a string. This can be a local file or an
 * URL.
 *
 *
 * What get_meta_tags parses
 *
 *
 *
 *
 *
 *
 * ]]>
 *
 *
 * (pay attention to line endings - PHP uses a native function to
 * parse the input, so a Mac file won't work on Unix).
 * @param bool $use_include_path Setting use_include_path to TRUE will result
 * in PHP trying to open the file along the standard include path as per
 * the include_path directive.
 * This is used for local files, not URLs.
 * @return array Returns an array with all the parsed meta tags.
 *
 * The value of the name property becomes the key, the value of the content
 * property becomes the value of the returned array, so you can easily use
 * standard array functions to traverse it or access single values.
 * Special characters in the value of the name property are substituted with
 * '_', the rest is converted to lower case.  If two meta tags have the same
 * name, only the last one is returned.
 *
 * Returns FALSE on failure.
 * @throws UrlException
 *
 */
function get_meta_tags(string $filename, bool $use_include_path = false): array
{
    error_clear_last();
    $result = \get_meta_tags($filename, $use_include_path);
    if ($result === false) {
        throw UrlException::createFromPhpError();
    }
    return $result;
}


/**
 * This function parses a URL and returns an associative array containing any
 * of the various components of the URL that are present.
 * The values of the array elements are not URL decoded.
 *
 * This function is not meant to validate
 * the given URL, it only breaks it up into the above listed parts. Partial and invalid
 * URLs are also accepted, parse_url tries its best to
 * parse them correctly.
 *
 * @param string $url The URL to parse.
 * @param int $component Specify one of PHP_URL_SCHEME,
 * PHP_URL_HOST, PHP_URL_PORT,
 * PHP_URL_USER, PHP_URL_PASS,
 * PHP_URL_PATH, PHP_URL_QUERY
 * or PHP_URL_FRAGMENT to retrieve just a specific
 * URL component as a string (except when
 * PHP_URL_PORT is given, in which case the return
 * value will be an int).
 * @return mixed On seriously malformed URLs, parse_url.
 *
 * If the component parameter is omitted, an
 * associative array is returned. At least one element will be
 * present within the array. Potential keys within this array are:
 *
 *
 *
 * scheme - e.g. http
 *
 *
 *
 *
 * host
 *
 *
 *
 *
 * port
 *
 *
 *
 *
 * user
 *
 *
 *
 *
 * pass
 *
 *
 *
 *
 * path
 *
 *
 *
 *
 * query - after the question mark ?
 *
 *
 *
 *
 * fragment - after the hashmark #
 *
 *
 *
 *
 * If the component parameter is specified,
 * parse_url returns a string (or an
 * int, in the case of PHP_URL_PORT)
 * instead of an array. If the requested component doesn't exist
 * within the given URL, NULL will be returned.
 * As of PHP 8.0.0, parse_url distinguishes absent and empty
 * queries and fragments:
 *
 *
 *
 *
 *
 *
 *
 * Previously all cases resulted in query and fragment being NULL.
 *
 * Note that control characters (cf. ctype_cntrl) in the
 * components are replaced with underscores (_).
 * @throws UrlException
 *
 */
function parse_url(string $url, int $component = -1)
{
    error_clear_last();
    $result = \parse_url($url, $component);
    if ($result === false) {
        throw UrlException::createFromPhpError();
    }
    return $result;
}

