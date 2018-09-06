<?php

namespace Safe;

/**
 * 
 * 
 * @param int $flags One of the MAXDB_REPORT_XXX constants.
 * @throws Exceptions\MaxdbException
 * 
 */
function maxdb_report(int $flags): void
{
    error_clear_last();
    $result = \maxdb_report($flags);
    if ($result === FALSE) {
        throw Exceptions\MaxdbException::createFromPhpError();
    }
}


