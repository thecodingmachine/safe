<?php

namespace Safe;

use Safe\Exceptions\DomException;

/**
 * This function takes the node node of class
 * SimpleXML and makes it into a
 * DOMElement node. This new object can then be used
 * as a native DOMElement node.
 *
 * @param \SimpleXMLElement $node The SimpleXMLElement node.
 * @return \DOMElement|false The DOMElement node added.
 * @throws DomException
 *
 */
function dom_import_simplexml(\SimpleXMLElement $node): \DOMElement
{
    error_clear_last();
    $result = \dom_import_simplexml($node);
    if ($result === null) {
        throw DomException::createFromPhpError();
    }
    return $result;
}
