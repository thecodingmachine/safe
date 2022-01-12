<?php

namespace Safe;

use Safe\Exceptions\StringsException;

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
 * For g and G
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
 * The precision specifier stands for the number of digits after the
 * decimal point since PHP 5.2.1. In earlier versions, it was taken as
 * number of significant digits (one less).
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
 * Available as of PHP 5.0.3.
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
 * @param mixed $params
 * @return string Returns a string produced according to the formatting string
 * format.
 * @throws StringsException
 * @deprecated The Safe version of this function is no longer needed in PHP 8.0+
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
 * @param string $string The input string.
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
 * @deprecated The Safe version of this function is no longer needed in PHP 8.0+
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
 * For g and G
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
 * The precision specifier stands for the number of digits after the
 * decimal point since PHP 5.2.1. In earlier versions, it was taken as
 * number of significant digits (one less).
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
 * Available as of PHP 5.0.3.
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
 * @param array $args
 * @return string Return array values as a formatted string according to
 * format.
 * @throws StringsException
 * @deprecated The Safe version of this function is no longer needed in PHP 8.0+
 */
function vsprintf(string $format, array $args): string
{
    error_clear_last();
    $result = \vsprintf($format, $args);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}
