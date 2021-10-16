<?php

namespace Safe;

use Safe\Exceptions\StringsException;

/**
 * convert_uudecode decodes a uuencoded string.
 *
 * @param string $string The uuencoded data.
 * @return string Returns the decoded data as a string.
 * @throws StringsException
 *
 */
function convert_uudecode(string $string): string
{
    error_clear_last();
    $result = \convert_uudecode($string);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Counts the number of occurrences of every byte-value (0..255) in
 * string and returns it in various ways.
 *
 * @param string $string The examined string.
 * @param int $mode See return values.
 * @return mixed Depending on mode
 * count_chars returns one of the following:
 *
 *
 *
 * 0 - an array with the byte-value as key and the frequency of
 * every byte as value.
 *
 *
 *
 *
 * 1 - same as 0 but only byte-values with a frequency greater
 * than zero are listed.
 *
 *
 *
 *
 * 2 - same as 0 but only byte-values with a frequency equal to
 * zero are listed.
 *
 *
 *
 *
 * 3 - a string containing all unique characters is returned.
 *
 *
 *
 *
 * 4 - a string containing all not used characters is returned.
 *
 *
 *
 * @throws StringsException
 *
 */
function count_chars(string $string, int $mode = 0)
{
    error_clear_last();
    $result = \count_chars($string, $mode);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Decodes a hexadecimally encoded binary string.
 *
 * @param string $string Hexadecimal representation of data.
 * @return string Returns the binary representation of the given data.
 * @throws StringsException
 *
 */
function hex2bin(string $string): string
{
    error_clear_last();
    $result = \hex2bin($string);
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
 * @param bool $binary When TRUE, returns the digest in raw binary format with a length of
 * 16.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function md5_file(string $filename, bool $binary = false): string
{
    error_clear_last();
    $result = \md5_file($filename, $binary);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Calculates the metaphone key of string.
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
 * @param string $string The input string.
 * @param int $max_phonemes This parameter restricts the returned metaphone key to
 * max_phonemes characters in length.
 * However, the resulting phonemes are always transcribed completely, so the
 * resulting string length may be slightly longer than max_phonemes.
 * The default value of 0 means no restriction.
 * @return string Returns the metaphone key as a string.
 * @throws StringsException
 *
 */
function metaphone(string $string, int $max_phonemes = 0): string
{
    error_clear_last();
    $result = \metaphone($string, $max_phonemes);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $filename The filename of the file to hash.
 * @param bool $binary When TRUE, returns the digest in raw binary format with a length of
 * 20.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function sha1_file(string $filename, bool $binary = false): string
{
    error_clear_last();
    $result = \sha1_file($filename, $binary);
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
 * own parameter.
 *
 * A conversion specification follows this prototype:
 * %[argnum$][flags][width][.precision]specifier.
 *
 * An integer followed by a dollar sign $,
 * to specify which number argument to treat in the conversion.
 *
 *
 * Flags
 *
 *
 *
 * Flag
 * Description
 *
 *
 *
 *
 * -
 *
 * Left-justify within the given field width;
 * Right justification is the default
 *
 *
 *
 * +
 *
 * Prefix positive numbers with a plus sign
 * +; Default only negative
 * are prefixed with a negative sign.
 *
 *
 *
 * (space)
 *
 * Pads the result with spaces.
 * This is the default.
 *
 *
 *
 * 0
 *
 * Only left-pads numbers with zeros.
 * With s specifiers this can
 * also right-pad with zeros.
 *
 *
 *
 * '(char)
 *
 * Pads the result with the character (char).
 *
 *
 *
 *
 *
 *
 * An integer that says how many characters (minimum)
 * this conversion should result in.
 *
 * A period . followed by an integer
 * who's meaning depends on the specifier:
 *
 *
 *
 * For e, E,
 * f and F
 * specifiers: this is the number of digits to be printed
 * after the decimal point (by default, this is 6).
 *
 *
 *
 *
 * For g, G,
 * h and H
 * specifiers: this is the maximum number of significant
 * digits to be printed.
 *
 *
 *
 *
 * For s specifier: it acts as a cutoff point,
 * setting a maximum character limit to the string.
 *
 *
 *
 *
 *
 * If the period is specified without an explicit value for precision,
 * 0 is assumed.
 *
 *
 *
 *
 * Specifiers
 *
 *
 *
 * Specifier
 * Description
 *
 *
 *
 *
 * %
 *
 * A literal percent character. No argument is required.
 *
 *
 *
 * b
 *
 * The argument is treated as an integer and presented
 * as a binary number.
 *
 *
 *
 * c
 *
 * The argument is treated as an integer and presented
 * as the character with that ASCII.
 *
 *
 *
 * d
 *
 * The argument is treated as an integer and presented
 * as a (signed) decimal number.
 *
 *
 *
 * e
 *
 * The argument is treated as scientific notation (e.g. 1.2e+2).
 *
 *
 *
 * E
 *
 * Like the e specifier but uses
 * uppercase letter (e.g. 1.2E+2).
 *
 *
 *
 * f
 *
 * The argument is treated as a float and presented
 * as a floating-point number (locale aware).
 *
 *
 *
 * F
 *
 * The argument is treated as a float and presented
 * as a floating-point number (non-locale aware).
 *
 *
 *
 * g
 *
 *
 * General format.
 *
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 *
 *
 *
 * G
 *
 * Like the g specifier but uses
 * E and f.
 *
 *
 *
 * h
 *
 * Like the g specifier but uses F.
 * Available as of PHP 8.0.0.
 *
 *
 *
 * H
 *
 * Like the g specifier but uses
 * E and F. Available as of PHP 8.0.0.
 *
 *
 *
 * o
 *
 * The argument is treated as an integer and presented
 * as an octal number.
 *
 *
 *
 * s
 *
 * The argument is treated and presented as a string.
 *
 *
 *
 * u
 *
 * The argument is treated as an integer and presented
 * as an unsigned decimal number.
 *
 *
 *
 * x
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with lowercase letters).
 *
 *
 *
 * X
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with uppercase letters).
 *
 *
 *
 *
 *
 *
 * General format.
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 * The c type specifier ignores padding and width
 *
 * Attempting to use a combination of the string and width specifiers with character sets that require more than one byte per character may result in unexpected results
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
 * int
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
 * float
 *
 * e,
 * E,
 * f,
 * F,
 * g,
 * G,
 * h,
 * H
 *
 *
 *
 *
 *
 * @param string|int|float|bool $values
 * @return string Returns a string produced according to the formatting string
 * format.
 * @throws StringsException
 *
 */
function sprintf(string $format,   ...$values): string
{
    error_clear_last();
    if ($values !== []) {
        $result = \sprintf($format, ...$values);
    }else {
        $result = \sprintf($format);
    }
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Operates as sprintf but accepts an array of
 * arguments, rather than a variable number of arguments.
 *
 * @param string $format The format string is composed of zero or more directives:
 * ordinary characters (excluding %) that are
 * copied directly to the result and conversion
 * specifications, each of which results in fetching its
 * own parameter.
 *
 * A conversion specification follows this prototype:
 * %[argnum$][flags][width][.precision]specifier.
 *
 * An integer followed by a dollar sign $,
 * to specify which number argument to treat in the conversion.
 *
 *
 * Flags
 *
 *
 *
 * Flag
 * Description
 *
 *
 *
 *
 * -
 *
 * Left-justify within the given field width;
 * Right justification is the default
 *
 *
 *
 * +
 *
 * Prefix positive numbers with a plus sign
 * +; Default only negative
 * are prefixed with a negative sign.
 *
 *
 *
 * (space)
 *
 * Pads the result with spaces.
 * This is the default.
 *
 *
 *
 * 0
 *
 * Only left-pads numbers with zeros.
 * With s specifiers this can
 * also right-pad with zeros.
 *
 *
 *
 * '(char)
 *
 * Pads the result with the character (char).
 *
 *
 *
 *
 *
 *
 * An integer that says how many characters (minimum)
 * this conversion should result in.
 *
 * A period . followed by an integer
 * who's meaning depends on the specifier:
 *
 *
 *
 * For e, E,
 * f and F
 * specifiers: this is the number of digits to be printed
 * after the decimal point (by default, this is 6).
 *
 *
 *
 *
 * For g, G,
 * h and H
 * specifiers: this is the maximum number of significant
 * digits to be printed.
 *
 *
 *
 *
 * For s specifier: it acts as a cutoff point,
 * setting a maximum character limit to the string.
 *
 *
 *
 *
 *
 * If the period is specified without an explicit value for precision,
 * 0 is assumed.
 *
 *
 *
 *
 * Specifiers
 *
 *
 *
 * Specifier
 * Description
 *
 *
 *
 *
 * %
 *
 * A literal percent character. No argument is required.
 *
 *
 *
 * b
 *
 * The argument is treated as an integer and presented
 * as a binary number.
 *
 *
 *
 * c
 *
 * The argument is treated as an integer and presented
 * as the character with that ASCII.
 *
 *
 *
 * d
 *
 * The argument is treated as an integer and presented
 * as a (signed) decimal number.
 *
 *
 *
 * e
 *
 * The argument is treated as scientific notation (e.g. 1.2e+2).
 *
 *
 *
 * E
 *
 * Like the e specifier but uses
 * uppercase letter (e.g. 1.2E+2).
 *
 *
 *
 * f
 *
 * The argument is treated as a float and presented
 * as a floating-point number (locale aware).
 *
 *
 *
 * F
 *
 * The argument is treated as a float and presented
 * as a floating-point number (non-locale aware).
 *
 *
 *
 * g
 *
 *
 * General format.
 *
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 *
 *
 *
 * G
 *
 * Like the g specifier but uses
 * E and f.
 *
 *
 *
 * h
 *
 * Like the g specifier but uses F.
 * Available as of PHP 8.0.0.
 *
 *
 *
 * H
 *
 * Like the g specifier but uses
 * E and F. Available as of PHP 8.0.0.
 *
 *
 *
 * o
 *
 * The argument is treated as an integer and presented
 * as an octal number.
 *
 *
 *
 * s
 *
 * The argument is treated and presented as a string.
 *
 *
 *
 * u
 *
 * The argument is treated as an integer and presented
 * as an unsigned decimal number.
 *
 *
 *
 * x
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with lowercase letters).
 *
 *
 *
 * X
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with uppercase letters).
 *
 *
 *
 *
 *
 *
 * General format.
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 * The c type specifier ignores padding and width
 *
 * Attempting to use a combination of the string and width specifiers with character sets that require more than one byte per character may result in unexpected results
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
 * int
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
 * float
 *
 * e,
 * E,
 * f,
 * F,
 * g,
 * G,
 * h,
 * H
 *
 *
 *
 *
 *
 * @param array $values
 * @return string Return array values as a formatted string according to
 * format.
 * @throws StringsException
 *
 */
function vsprintf(string $format, array $values): string
{
    error_clear_last();
    $result = \vsprintf($format, $values);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}

