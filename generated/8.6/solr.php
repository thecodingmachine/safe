<?php

namespace Safe;

use Safe\Exceptions\SolrException;

/**
 * @return string
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
