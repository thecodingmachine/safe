<?php

namespace Safe;

use Safe\Exceptions\SimplexmlException;

/**
 * This function takes a node of a DOM
 * document and makes it into a SimpleXML node. This new object can
 * then be used as a native SimpleXML element.
 *
 * @param \DOMNode $node A DOM Element node
 * @param string $class_name You may use this optional parameter so that
 * simplexml_import_dom will return an object of
 * the specified class. That class should extend the
 * SimpleXMLElement class.
 * @return \SimpleXMLElement Returns a SimpleXMLElement.
 * @throws SimplexmlException
 *
 */
function simplexml_import_dom(\DOMNode $node, string $class_name = SimpleXMLElement::class): \SimpleXMLElement
{
    error_clear_last();
    $result = \simplexml_import_dom($node, $class_name);
    if ($result === null) {
        throw SimplexmlException::createFromPhpError();
    }
    return $result;
}


/**
 * Convert the well-formed XML document in the given file to an object.
 *
 * @param string $filename Path to the XML file
 * @param string $class_name You may use this optional parameter so that
 * simplexml_load_file will return an object of
 * the specified class. That class should extend the
 * SimpleXMLElement class.
 * @param int $options Since Libxml 2.6.0, you may also use the
 * options parameter to specify additional Libxml parameters.
 * @param string $namespace_or_prefix Namespace prefix or URI.
 * @param bool $is_prefix TRUE if namespace_or_prefix is a prefix, FALSE if it's a URI;
 * defaults to FALSE.
 * @return \SimpleXMLElement Returns an object of class SimpleXMLElement with
 * properties containing the data held within the XML document.
 * @throws SimplexmlException
 *
 */
function simplexml_load_file(string $filename, string $class_name = SimpleXMLElement::class, int $options = 0, string $namespace_or_prefix = "", bool $is_prefix = false): \SimpleXMLElement
{
    error_clear_last();
    $result = \simplexml_load_file($filename, $class_name, $options, $namespace_or_prefix, $is_prefix);
    if ($result === false) {
        throw SimplexmlException::createFromPhpError();
    }
    return $result;
}


/**
 * Takes a well-formed XML string and returns it as an object.
 *
 * @param string $data A well-formed XML string
 * @param string $class_name You may use this optional parameter so that
 * simplexml_load_string will return an object of
 * the specified class. That class should extend the
 * SimpleXMLElement class.
 * @param int $options Since Libxml 2.6.0, you may also use the
 * options parameter to specify additional Libxml parameters.
 * @param string $namespace_or_prefix Namespace prefix or URI.
 * @param bool $is_prefix TRUE if namespace_or_prefix is a prefix, FALSE if it's a URI;
 * defaults to FALSE.
 * @return \SimpleXMLElement Returns an object of class SimpleXMLElement with
 * properties containing the data held within the xml document.
 * @throws SimplexmlException
 *
 */
function simplexml_load_string(string $data, string $class_name = SimpleXMLElement::class, int $options = 0, string $namespace_or_prefix = "", bool $is_prefix = false): \SimpleXMLElement
{
    error_clear_last();
    $result = \simplexml_load_string($data, $class_name, $options, $namespace_or_prefix, $is_prefix);
    if ($result === false) {
        throw SimplexmlException::createFromPhpError();
    }
    return $result;
}
