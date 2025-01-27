<?php

namespace Safe;

use Safe\Exceptions\SolrException;

/**
 * This function returns the current version of the extension as a string.
 *
 * @return string It returns a string on success.
 * @throws SolrException
 *
 */
function solr_get_version(): string
{
    error_clear_last();
    $safeResult = \solr_get_version();
    if ($safeResult === false) {
        throw SolrException::createFromPhpError();
    }
    return $safeResult;
}
