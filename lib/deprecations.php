<?php

declare(strict_types=1);

use Safe\Exceptions\StringsException;

function trigger_php8_deprecation(string $reason): void {
    trigger_error(
        'Using this function from the safe library is not necessary when using PHP 8 because "' . $reason . '".',
        E_USER_DEPRECATED
    );
}

/**
 * Calculates the soundex key of str.
 *
 * Soundex keys have the property that words pronounced similarly
 * produce the same soundex key, and can thus be used to simplify
 * searches in databases where you know the pronunciation but not
 * the spelling. This soundex function returns a string 4 characters
 * long, starting with a letter.
 *
 * This particular soundex function is one described by Donald Knuth
 * in "The Art Of Computer Programming, vol. 3: Sorting And
 * Searching", Addison-Wesley (1973), pp. 391-392.
 *
 * @param string $str The input string.
 * @return string Returns the soundex key as a string.
 * @throws StringsException
 */
function soundex(string $str): string
{
    if (PHP_MAJOR_VERSION >= 8) {
        trigger_php8_deprecation('This function does not return false anymore.');

        return \soundex($str);
    }

    error_clear_last();
    $result = \soundex($str);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}
