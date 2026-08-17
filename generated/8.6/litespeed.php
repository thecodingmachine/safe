<?php

namespace Safe;

use Safe\Exceptions\LitespeedException;

/**
 * @throws LitespeedException
 *
 */
function litespeed_finish_request(): void
{
    error_clear_last();
    $safeResult = \litespeed_finish_request();
    if ($safeResult === false) {
        throw LitespeedException::createFromPhpError();
    }
}
