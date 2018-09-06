<?php

namespace Safe;

/**
 * Converts a logical string to a visual one.
 * 
 * @param string $str The logical string.
 * @param string $direction One of  FRIBIDI_RTL, 
 * FRIBIDI_LTR or FRIBIDI_AUTO.
 * @param int $charset One of the FRIBIDI_CHARSET_XXX constants.
 * @return string Returns the visual string on success .
 * @throws Exceptions\FribidiException
 * 
 */
function fribidi_log2vis(string $str, string $direction, int $charset): string
{
    error_clear_last();
    $result = \fribidi_log2vis($str, $direction, $charset);
    if ($result === FALSE) {
        throw Exceptions\FribidiException::createFromPhpError();
    }
    return $result;
}


