<?php

namespace Safe;

use Safe\Exceptions\GettextException;

/**
 * @param string $domain
 * @param string $directory
 * @return string
 * @throws GettextException
 *
 */
function bindtextdomain(string $domain, string $directory): string
{
    error_clear_last();
    $safeResult = \bindtextdomain($domain, $directory);
    if ($safeResult === false) {
        throw GettextException::createFromPhpError();
    }
    return $safeResult;
}
