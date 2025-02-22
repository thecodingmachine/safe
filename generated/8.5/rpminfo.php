<?php

namespace Safe;

use Safe\Exceptions\RpminfoException;

/**
 *
 *
 * @param int $tag
 * @throws RpminfoException
 *
 */
function rpmaddtag(int $tag): void
{
    error_clear_last();
    $safeResult = \rpmaddtag($tag);
    if ($safeResult === false) {
        throw RpminfoException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $text
 * @throws RpminfoException
 *
 */
function rpmdefine(string $text): void
{
    error_clear_last();
    $safeResult = \rpmdefine($text);
    if ($safeResult === false) {
        throw RpminfoException::createFromPhpError();
    }
}
