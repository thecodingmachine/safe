<?php

namespace Safe;

use Safe\Exceptions\GettextException;

/**
 * The bindtextdomain function sets or gets the path
 * for a domain.
 *
 * @param string $domain The domain.
 * @param string $directory The directory path.
 * An empty string means the current directory.
 * If NULL, the currently set directory is returned.
 * @return string The full pathname for the domain currently being set.
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
