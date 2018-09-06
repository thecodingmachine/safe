<?php

namespace Safe;

/**
 * This function takes a node of a DOM
 * document and makes it into a SimpleXML node. This new object can
 * then be used as a native SimpleXML element.
 * 
 * @param DOMNode $node A DOM Element node
 * @param string $class_name You may use this optional parameter so that
 * simplexml_import_dom will return an object of 
 * the specified class. That class should extend the 
 * SimpleXMLElement class.
 * @return SimpleXMLElement Returns a SimpleXMLElement .
 * @throws Exceptions\SimplexmlException
 * 
 */
function simplexml_import_dom(DOMNode $node, string $class_name = "SimpleXMLElement"): SimpleXMLElement
{
    error_clear_last();
    $result = \simplexml_import_dom($node, $class_name);
    if ($result === FALSE) {
        throw Exceptions\SimplexmlException::createFromPhpError();
    }
    return $result;
}


