<?php

namespace Safe;

use Safe\Exceptions\XmlException;

/**
 * Frees the given XML parser.
 *
 * @param \XMLParser $parser
 * @throws XmlException
 *
 */
function xml_parser_free(\XMLParser $parser): void
{
    error_clear_last();
    $safeResult = \xml_parser_free($parser);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the character data handler function for the XML parser
 * parser.
 *
 * @param \XMLParser $parser A reference to the XML parser to set up character data handler function.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept
 * two parameters:
 *
 * handler
 * XMLParserparser
 * stringdata
 *
 *
 *
 * parser
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 * data
 *
 *
 * The second parameter, data, contains
 * the character data as a string.
 *
 *
 *
 *
 *
 * Character data handler is called for every piece of a text in the XML
 * document. It can be called multiple times inside each fragment (e.g.
 * for non-ASCII strings).
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_character_data_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_character_data_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the default handler function for the XML parser
 * parser.
 *
 * @param \XMLParser $parser A reference to the XML parser to set up default handler function.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept
 * two parameters:
 *
 * handler
 * XMLParserparser
 * stringdata
 *
 *
 *
 *
 * parser
 *
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 *
 * data
 *
 *
 *
 * The second parameter, data, contains
 * the character data.This may be the XML declaration,
 * document type declaration, entities or other data for which
 * no other handler exists.
 *
 *
 *
 *
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_default_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_default_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the element handler functions for the XML parser.
 * start_handler and
 * end_handler are strings containing
 * the names of functions that must exist when xml_parse
 * is called for parser.
 *
 * @param \XMLParser $parser A reference to the XML parser to set up start and end element handler functions.
 * @param callable $start_handler The function named by start_handler
 * must accept three parameters:
 *
 * start_element_handler
 * XMLParserparser
 * stringname
 * arrayattribs
 *
 *
 *
 * parser
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 * name
 *
 *
 * The second parameter, name, contains the name
 * of the element for which this handler is called.If case-folding is in effect for this
 * parser, the element name will be in uppercase letters.
 *
 *
 *
 *
 * attribs
 *
 *
 * The third parameter, attribs, contains an
 * associative array with the element's attributes (if any).The keys
 * of this array are the attribute names, the values are the attribute
 * values.Attribute names are case-folded on the same criteria as
 * element names.Attribute values are not
 * case-folded.
 *
 *
 * The original order of the attributes can be retrieved by walking
 * through attribs the normal way, using
 * each.The first key in the array was the first
 * attribute, and so on.
 *
 *
 *
 *
 * @param callable $end_handler
 * @throws XmlException
 *
 */
function xml_set_element_handler(\XMLParser $parser, callable $start_handler, callable $end_handler): void
{
    error_clear_last();
    $safeResult = \xml_set_element_handler($parser, $start_handler, $end_handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Set a handler to be called when leaving the scope of a namespace
 * declaration. This will be called, for each namespace declaration, after
 * the handler for the end tag of the element in which the namespace was
 * declared.
 *
 * @param \XMLParser $parser A reference to the XML parser.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept
 * two parameters, and should return an integer value. If the
 * value returned from the handler is FALSE (which it will be if no
 * value is returned), the XML parser will stop parsing and
 * xml_get_error_code will return
 * XML_ERROR_EXTERNAL_ENTITY_HANDLING.
 *
 * handler
 * XMLParserparser
 * stringprefix
 *
 *
 *
 * parser
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 * prefix
 *
 *
 * The prefix is a string used to reference the namespace within an XML object.
 *
 *
 *
 *
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_end_namespace_decl_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_end_namespace_decl_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the external entity reference handler function for the XML parser
 * parser.
 *
 * @param \XMLParser $parser A reference to the XML parser to set up external entity reference handler function.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept
 * five parameters, and should return an integer value.If the
 * value returned from the handler is FALSE (which it will be if no
 * value is returned), the XML parser will stop parsing and
 * xml_get_error_code will return
 * XML_ERROR_EXTERNAL_ENTITY_HANDLING.
 *
 * handler
 * XMLParserparser
 * stringopen_entity_names
 * stringbase
 * stringsystem_id
 * stringpublic_id
 *
 *
 *
 * parser
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 * open_entity_names
 *
 *
 * The second parameter, open_entity_names, is a
 * space-separated list of the names of the entities that are open for
 * the parse of this entity (including the name of the referenced
 * entity).
 *
 *
 *
 *
 * base
 *
 *
 * This is the base for resolving the system identifier
 * (system_id) of the external entity.Currently
 * this parameter will always be set to an empty string.
 *
 *
 *
 *
 * system_id
 *
 *
 * The fourth parameter, system_id, is the
 * system identifier as specified in the entity declaration.
 *
 *
 *
 *
 * public_id
 *
 *
 * The fifth parameter, public_id, is the
 * public identifier as specified in the entity declaration, or
 * an empty string if none was specified; the whitespace in the
 * public identifier will have been normalized as required by
 * the XML spec.
 *
 *
 *
 *
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_external_entity_ref_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_external_entity_ref_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the notation declaration handler function for the XML parser
 * parser.
 *
 * A notation declaration is part of the document's DTD and has the
 * following format:
 *
 * name
 * { systemId | publicId?>
 * ]]>
 *
 * See section 4.7 of the XML 1.0
 * spec for the definition of notation declarations.
 *
 * @param \XMLParser $parser A reference to the XML parser to set up notation declaration handler function.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept
 * five parameters:
 *
 * handler
 * XMLParserparser
 * stringnotation_name
 * stringbase
 * stringsystem_id
 * stringpublic_id
 *
 *
 *
 *
 * parser
 *
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 * notation_name
 *
 *
 * This is the notation's name, as per
 * the notation format described above.
 *
 *
 *
 *
 *
 * base
 *
 *
 *
 * This is the base for resolving the system identifier
 * (system_id) of the notation declaration.
 * Currently this parameter will always be set to an empty string.
 *
 *
 *
 *
 * system_id
 *
 *
 * System identifier of the external notation declaration.
 *
 *
 *
 *
 *
 * public_id
 *
 *
 *
 * Public identifier of the external notation declaration.
 *
 *
 *
 *
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_notation_decl_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_notation_decl_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * This function allows to use parser inside
 * object. All callback functions could be set with
 * xml_set_element_handler etc and assumed to be
 * methods of object.
 *
 * @param \XMLParser $parser A reference to the XML parser to use inside the object.
 * @param object $object The object where to use the XML parser.
 * @throws XmlException
 *
 */
function xml_set_object(\XMLParser $parser, object $object): void
{
    error_clear_last();
    $safeResult = \xml_set_object($parser, $object);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the processing instruction (PI) handler function for the XML parser
 * parser.
 *
 * A processing instruction has the following format:
 *
 * &lt;?target
 * data?&gt;
 *
 *
 * You can put PHP code into such a tag, but be aware of one limitation: in
 * an XML PI, the PI end tag (?&gt;) can not be quoted,
 * so this character sequence should not appear in the PHP code you embed
 * with PIs in XML documents.If it does, the rest of the PHP code, as well
 * as the "real" PI end tag, will be treated as character data.
 *
 * @param \XMLParser $parser A reference to the XML parser to set up processing instruction (PI) handler function.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept
 * three parameters:
 *
 * handler
 * XMLParserparser
 * stringtarget
 * stringdata
 *
 *
 *
 * parser
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 * target
 *
 *
 * The second parameter, target, contains the PI
 * target.
 *
 *
 *
 *
 * data
 *
 *
 * The third parameter, data, contains the PI
 * data.
 *
 *
 *
 *
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_processing_instruction_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_processing_instruction_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Set a handler to be called when a namespace is declared. Namespace
 * declarations occur inside start tags. But the namespace declaration start
 * handler is called before the start tag handler for each namespace declared
 * in that start tag.
 *
 * @param \XMLParser $parser A reference to the XML parser.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept
 * three parameters, and should return an integer value. If the
 * value returned from the handler is FALSE (which it will be if no
 * value is returned), the XML parser will stop parsing and
 * xml_get_error_code will return
 * XML_ERROR_EXTERNAL_ENTITY_HANDLING.
 *
 * handler
 * XMLParserparser
 * stringprefix
 * stringuri
 *
 *
 *
 * parser
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the handler.
 *
 *
 *
 *
 * prefix
 *
 *
 * The prefix is a string used to reference the namespace within an XML object.
 *
 *
 *
 *
 * uri
 *
 *
 * Uniform Resource Identifier (URI) of namespace.
 *
 *
 *
 *
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_start_namespace_decl_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_start_namespace_decl_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the unparsed entity declaration handler function for the XML parser
 * parser.
 *
 * The handler will be called if the XML parser
 * encounters an external entity declaration with an NDATA declaration, like
 * the following:
 *
 * name {publicId | systemId}
 * NDATA notationName
 * ]]>
 *
 *
 * See section 4.2.2 of
 * the XML 1.0 spec for the definition of notation declared
 * external entities.
 *
 * @param \XMLParser $parser A reference to the XML parser to set up unparsed entity declaration handler function.
 * @param callable $handler handler is a string containing the name of a
 * function that must exist when xml_parse is called
 * for parser.
 *
 * The function named by handler must accept six
 * parameters:
 *
 * handler
 * XMLParserparser
 * stringentity_name
 * stringbase
 * stringsystem_id
 * stringpublic_id
 * stringnotation_name
 *
 *
 *
 * parser
 *
 *
 * The first parameter, parser, is a
 * reference to the XML parser calling the
 * handler.
 *
 *
 *
 *
 * entity_name
 *
 *
 * The name of the entity that is about to be defined.
 *
 *
 *
 *
 * base
 *
 *
 * This is the base for resolving the system identifier
 * (systemId) of the external entity.Currently
 * this parameter will always be set to an empty string.
 *
 *
 *
 *
 * system_id
 *
 *
 * System identifier for the external entity.
 *
 *
 *
 *
 * public_id
 *
 *
 * Public identifier for the external entity.
 *
 *
 *
 *
 * notation_name
 *
 *
 * Name of the notation of this entity (see
 * xml_set_notation_decl_handler).
 *
 *
 *
 *
 *
 * If a handler function is set to an empty string, or FALSE, the handler
 * in question is disabled.
 * @throws XmlException
 *
 */
function xml_set_unparsed_entity_decl_handler(\XMLParser $parser, callable $handler): void
{
    error_clear_last();
    $safeResult = \xml_set_unparsed_entity_decl_handler($parser, $handler);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}
