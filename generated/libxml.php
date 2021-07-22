<?php

namespace Safe;

use Safe\Exceptions\LibxmlException;

/**
 * Retrieve last error from libxml.
 *
 * @return \LibXMLError Returns a LibXMLError object if there is any error in the
 * buffer, FALSE otherwise.
 * @throws LibxmlException
 *
 */
function libxml_get_last_error(): \LibXMLError
{
    error_clear_last();
    $result = \libxml_get_last_error();
    if ($result === false) {
        throw LibxmlException::createFromPhpError();
    }
    return $result;
}

