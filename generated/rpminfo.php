<?php

namespace Safe;

use Safe\Exceptions\RpminfoException;

if (! function_exists('\\Safe\\rpmaddtag')) {
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
        $result = \rpmaddtag($tag);
        if ($result === false) {
            throw RpminfoException::createFromPhpError();
        }
    }
}
