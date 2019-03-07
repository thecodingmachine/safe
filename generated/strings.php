<?php

namespace Safe;

use Safe\Exceptions\StringsException;

/**
 * convert_uudecode decodes a uuencoded string.
 *
 * @param string $data The uuencoded data.
 * @return string Returns the decoded data as a string.
 * @throws StringsException
 *
 */
function convert_uudecode(string $data): string
{
    error_clear_last();
    $result = \convert_uudecode($data);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * convert_uuencode encodes a string using the uuencode
 * algorithm.
 *
 * Uuencode translates all strings (including binary data) into printable
 * characters, making them safe for network transmissions. Uuencoded data is
 * about 35% larger than the original.
 *
 * @param string $data The data to be encoded.
 * @return string Returns the uuencoded data.
 * @throws StringsException
 *
 */
function convert_uuencode(string $data): string
{
    error_clear_last();
    $result = \convert_uuencode($data);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Decodes a hexadecimally encoded binary string.
 *
 * @param string $data Hexadecimal representation of data.
 * @return string Returns the binary representation of the given data.
 * @throws StringsException
 *
 */
function hex2bin(string $data): string
{
    error_clear_last();
    $result = \hex2bin($data);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Calculates the MD5 hash of the file specified by the
 * filename parameter using the
 * RSA Data Security, Inc.
 * MD5 Message-Digest Algorithm, and returns that hash.
 * The hash is a 32-character hexadecimal number.
 *
 * @param string $filename The filename
 * @param bool $raw_output When TRUE, returns the digest in raw binary format with a length of
 * 16.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function md5_file(string $filename, bool $raw_output = false): string
{
    error_clear_last();
    $result = \md5_file($filename, $raw_output);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Calculates the metaphone key of str.
 *
 * Similar to soundex metaphone creates the same key for
 * similar sounding words. It's more accurate than
 * soundex as it knows the basic rules of English
 * pronunciation.  The metaphone generated keys are of variable length.
 *
 * Metaphone was developed by Lawrence Philips
 * &lt;lphilips at verity dot com&gt;. It is described in ["Practical
 * Algorithms for Programmers", Binstock &amp; Rex, Addison Wesley,
 * 1995].
 *
 * @param string $str The input string.
 * @param int $phonemes This parameter restricts the returned metaphone key to
 * phonemes characters in length.
 * The default value of 0 means no restriction.
 * @return string Returns the metaphone key as a string.
 * @throws StringsException
 *
 */
function metaphone(string $str, int $phonemes = 0): string
{
    error_clear_last();
    $result = \metaphone($str, $phonemes);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $filename The filename of the file to hash.
 * @param bool $raw_output When TRUE, returns the digest in raw binary format with a length of
 * 20.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function sha1_file(string $filename, bool $raw_output = false): string
{
    error_clear_last();
    $result = \sha1_file($filename, $raw_output);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns a string produced according to the formatting string
 * format.
 *
 * @param string $format The format string is composed of zero or more directives:
 * ordinary characters (excluding %) that are
 * copied directly to the result and conversion
 * specifications, each of which results in fetching its
 * own parameter.  This applies to both sprintf
 * and printf.
 *
 * Each conversion specification consists of a percent sign
 * (%), followed by one or more of these
 * elements, in order:
 *
 *
 *
 * An optional sign specifier that forces a sign
 * (- or +) to be used on a number. By default, only the - sign is used
 * on a number if it's negative. This specifier forces positive numbers
 * to have the + sign attached as well.
 *
 *
 *
 *
 * An optional padding specifier that says
 * what character will be used for padding the results to the
 * right string size.  This may be a space character or a
 * 0 (zero character).  The default is to pad
 * with spaces.  An alternate padding character can be specified
 * by prefixing it with a single quote (').
 * See the examples below.
 *
 *
 *
 *
 * An optional alignment specifier that says
 * if the result should be left-justified or right-justified.
 * The default is right-justified; a -
 * character here will make it left-justified.
 *
 *
 *
 *
 * An optional number, a width specifier
 * that says how many characters (minimum) this conversion should
 * result in.
 *
 *
 *
 *
 * An optional precision specifier in the form
 * of a period (.) followed by an optional decimal digit string
 * that says how many decimal digits should be displayed for
 * floating-point numbers. When using this specifier on a string,
 * it acts as a cutoff point, setting a maximum character limit to
 * the string. Additionally, the character to use when padding a
 * number may optionally be specified between the period and the
 * digit.
 *
 *
 *
 *
 * A type specifier that says what type the
 * argument data should be treated as.  Possible types:
 *
 *
 * % - a literal percent character. No
 * argument is required.
 *
 *
 * b - the argument is treated as an
 * integer and presented as a binary number.
 *
 *
 * c - the argument is treated as an
 * integer and presented as the character with that ASCII
 * value.
 *
 *
 * d - the argument is treated as an
 * integer and presented as a (signed) decimal number.
 *
 *
 * e - the argument is treated as scientific
 * notation (e.g. 1.2e+2).
 * The precision specifier stands for the number of digits after the
 * decimal point since PHP 5.2.1. In earlier versions, it was taken as
 * number of significant digits (one less).
 *
 *
 * E - like %e but uses
 * uppercase letter (e.g. 1.2E+2).
 *
 *
 * f - the argument is treated as a
 * float and presented as a floating-point number (locale aware).
 *
 *
 * F - the argument is treated as a
 * float and presented as a floating-point number (non-locale aware).
 * Available since PHP 5.0.3.
 *
 *
 * g - shorter of %e and
 * %f.
 *
 *
 * G - shorter of %E and
 * %F.
 *
 *
 * o - the argument is treated as an
 * integer and presented as an octal number.
 *
 *
 * s - the argument is treated as and
 * presented as a string.
 *
 *
 * u - the argument is treated as an
 * integer and presented as an unsigned decimal number.
 *
 *
 * x - the argument is treated as an integer
 * and presented as a hexadecimal number (with lowercase
 * letters).
 *
 *
 * X - the argument is treated as an integer
 * and presented as a hexadecimal number (with uppercase
 * letters).
 *
 *
 *
 *
 *
 *
 * A type specifier that says what type the
 * argument data should be treated as.  Possible types:
 *
 *
 * % - a literal percent character. No
 * argument is required.
 *
 *
 * b - the argument is treated as an
 * integer and presented as a binary number.
 *
 *
 * c - the argument is treated as an
 * integer and presented as the character with that ASCII
 * value.
 *
 *
 * d - the argument is treated as an
 * integer and presented as a (signed) decimal number.
 *
 *
 * e - the argument is treated as scientific
 * notation (e.g. 1.2e+2).
 * The precision specifier stands for the number of digits after the
 * decimal point since PHP 5.2.1. In earlier versions, it was taken as
 * number of significant digits (one less).
 *
 *
 * E - like %e but uses
 * uppercase letter (e.g. 1.2E+2).
 *
 *
 * f - the argument is treated as a
 * float and presented as a floating-point number (locale aware).
 *
 *
 * F - the argument is treated as a
 * float and presented as a floating-point number (non-locale aware).
 * Available since PHP 5.0.3.
 *
 *
 * g - shorter of %e and
 * %f.
 *
 *
 * G - shorter of %E and
 * %F.
 *
 *
 * o - the argument is treated as an
 * integer and presented as an octal number.
 *
 *
 * s - the argument is treated as and
 * presented as a string.
 *
 *
 * u - the argument is treated as an
 * integer and presented as an unsigned decimal number.
 *
 *
 * x - the argument is treated as an integer
 * and presented as a hexadecimal number (with lowercase
 * letters).
 *
 *
 * X - the argument is treated as an integer
 * and presented as a hexadecimal number (with uppercase
 * letters).
 *
 *
 *
 * Variables will be co-erced to a suitable type for the specifier:
 *
 * Type Handling
 *
 *
 *
 * Type
 * Specifiers
 *
 *
 *
 *
 * string
 * s
 *
 *
 * integer
 *
 * d,
 * u,
 * c,
 * o,
 * x,
 * X,
 * b
 *
 *
 *
 * double
 *
 * g,
 * G,
 * e,
 * E,
 * f,
 * F
 *
 *
 *
 *
 *
 *
 * Attempting to use a combination of the string and width specifiers with character sets that require more than one byte per character may result in unexpected results
 *
 * The format string supports argument numbering/swapping.  Here is an
 * example:
 *
 * Argument swapping
 *
 *
 * ]]>
 *
 *
 * This will output "There are 5 monkeys in the tree".  But
 * imagine we are creating a format string in a separate file,
 * commonly because we would like to internationalize it and we
 * rewrite it as:
 *
 * Argument swapping
 *
 *
 * ]]>
 *
 *
 * We now have a problem.  The order of the placeholders in the
 * format string does not match the order of the arguments in the
 * code.  We would like to leave the code as is and simply indicate
 * in the format string which arguments the placeholders refer to.
 * We would write the format string like this instead:
 *
 * Argument swapping
 *
 *
 * ]]>
 *
 *
 * An added benefit here is that you can repeat the placeholders without
 * adding more arguments in the code.  For example:
 *
 * Argument swapping
 *
 *
 * ]]>
 *
 *
 * When using argument swapping, the n$
 * position specifier must come immediately
 * after the percent sign (%), before any other
 * specifiers, as shown in the example below.
 *
 * Specifying padding character
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 *
 *
 *
 *
 * Position specifier with other specifiers
 *
 *
 * ]]>
 *
 * The above example will output:
 *
 *
 *
 *
 *
 * The above example will output:
 *
 * The above example will output:
 *
 * Attempting to use a position specifier greater than
 * PHP_INT_MAX will result in
 * sprintf generating warnings.
 *
 * The c type specifier ignores padding and width
 * @param mixed $params
 * @return string Returns a string produced according to the formatting string
 * format.
 * @throws StringsException
 *
 */
function sprintf(string $format, ...$params): string
{
    error_clear_last();
    if ($params !== []) {
        $result = \sprintf($format, ...$params);
    } else {
        $result = \sprintf($format);
    }
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the portion of string specified by the
 * start and length parameters.
 *
 * @param string $string The input string. Must be one character or longer.
 * @param int $start If start is non-negative, the returned string
 * will start at the start'th position in
 * string, counting from zero. For instance,
 * in the string 'abcdef', the character at
 * position 0 is 'a', the
 * character at position 2 is
 * 'c', and so forth.
 *
 * If start is negative, the returned string
 * will start at the start'th character
 * from the end of string.
 *
 * If string is less than
 * start characters long, FALSE will be returned.
 *
 *
 * Using a negative start
 *
 *
 * ]]>
 *
 *
 * @param int $length If length is given and is positive, the string
 * returned will contain at most length characters
 * beginning from start (depending on the length of
 * string).
 *
 * If length is given and is negative, then that many
 * characters will be omitted from the end of string
 * (after the start position has been calculated when a
 * start is negative).  If
 * start denotes the position of this truncation or
 * beyond, FALSE will be returned.
 *
 * If length is given and is 0,
 * FALSE or NULL, an empty string will be returned.
 *
 * If length is omitted, the substring starting from
 * start until the end of the string will be
 * returned.
 * @return string Returns the extracted part of string;, or
 * an empty string.
 * @throws StringsException
 *
 */
function substr(string $string, int $start, int $length = null): string
{
    error_clear_last();
    if ($length !== null) {
        $result = \substr($string, $start, $length);
    } else {
        $result = \substr($string, $start);
    }
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}
