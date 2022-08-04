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
