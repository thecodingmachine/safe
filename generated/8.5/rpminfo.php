<?php

namespace Safe;

use Safe\Exceptions\RpminfoException;

/**
 * Add an additional retrieved tag in subsequent queries.
 *
 * @param int $tag One of RPMTAG_* constant, see the rpminfo constants page.
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
 * Define or change a RPM macro value.
 *
 * This can be used to select the database path and backend to use
 * instead of system default one.
 *
 * @param string $text Macro name, options, body.
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
