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
 * Sets an option in an XML parser.
 *
 * @param \XMLParser $parser A reference to the XML parser to set an option in.
 * @param int $option Which option to set.  See below.
 *
 * The following options are available:
 *
 * XML parser options
 *
 *
 *
 * Option constant
 * Data type
 * Description
 *
 *
 *
 *
 * XML_OPTION_CASE_FOLDING
 * bool
 *
 * Controls whether case-folding is enabled for this
 * XML parser.  Enabled by default.
 *
 *
 *
 * XML_OPTION_PARSE_HUGE
 * bool
 *
 * Allows parsing documents larger than 10 MB.
 * This option should only be enabled when the document size is
 * bounded because this could otherwise lead to a DoS.
 * This option is only available when using libxml2.
 *
 *
 *
 * XML_OPTION_SKIP_TAGSTART
 * integer
 *
 * Specify how many characters should be skipped in the beginning of a
 * tag name.
 *
 *
 *
 * XML_OPTION_SKIP_WHITE
 * bool
 *
 * Whether to skip values consisting of whitespace characters.
 *
 *
 *
 * XML_OPTION_TARGET_ENCODING
 * string
 *
 * Sets which target encoding to
 * use in this XML parser.By default, it is set to the same as the
 * source encoding used by xml_parser_create.
 * Supported target encodings are ISO-8859-1,
 * US-ASCII and UTF-8.
 *
 *
 *
 *
 *
 * @param mixed $value The option's new value.
 * @throws XmlException
 *
 */
function xml_parser_set_option(\XMLParser $parser, int $option, $value): void
{
    error_clear_last();
    $safeResult = \xml_parser_set_option($parser, $option, $value);
    if ($safeResult === false) {
        throw XmlException::createFromPhpError();
    }
}


/**
 * Sets the character data handler function for the XML parser
 * parser.
 *
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * voidhandler
 * XMLParserparser
 * stringdata
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
 *
 *
 *
 *
 * data
 *
 *
 * Character data as a string.
 *
 *
 *
 *
 *
 * Character data handler is called for every piece of a text in the XML
 * document. It can be called multiple times inside each fragment (e.g.
 * for non-ASCII strings).
 * @return bool Always returns TRUE.
 *
 */
function xml_set_character_data_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_character_data_handler($parser, $handler);
    return $safeResult;
}


/**
 * Sets the default handler function for the XML parser
 * parser.
 *
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * voidhandler
 * XMLParserparser
 * stringdata
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
 *
 *
 *
 *
 *
 * data
 *
 *
 *
 * data contains the character data.
 * This may be the XML declaration, document type declaration,
 * entities or other data for which no other handler exists.
 *
 *
 *
 *
 * @return bool Always returns TRUE.
 *
 */
function xml_set_default_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_default_handler($parser, $handler);
    return $safeResult;
}


/**
 * Sets the element handler functions for the XML parser.
 *
 * start_handler is called when a new XML element is
 * opened. end_handler is called when an XML element
 * is closed.
 *
 * @param \XMLParser $parser The XML parser.
 * @param callable $start_handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * voidstart_element_handler
 * XMLParserparser
 * stringname
 * arrayattributes
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
 *
 *
 *
 *
 * name
 *
 *
 * Contains the name of the element for which this handler is called.
 * If case-folding is in effect
 * for this parser, the element name will be in uppercase letters.
 *
 *
 *
 *
 * attributes
 *
 *
 * An associative array with the element's attributes.
 * The array is empty if the element has no attributes.
 * The keys of this array are the attribute names,
 * the values are the attribute values.
 * Attribute names are
 * case-folded
 * on the same criteria as element names.
 * Attribute values are not case-folded.
 *
 *
 * The order in which attributes is traversed
 * is identical to the order in which the attributes were declared.
 *
 *
 *
 *
 * @param callable $end_handler
 * @return bool Always returns TRUE.
 *
 */
function xml_set_element_handler(\XMLParser $parser, callable $start_handler, callable $end_handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_element_handler($parser, $start_handler, $end_handler);
    return $safeResult;
}


/**
 * Set a handler to be called when leaving the scope of a namespace
 * declaration. This will be called, for each namespace declaration, after
 * the handler for the end tag of the element in which the namespace was
 * declared.
 *
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * handler
 * XMLParserparser
 * stringfalseprefix
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
 *
 *
 *
 *
 * prefix
 *
 *
 * The prefix is a string used to reference the namespace within an XML object.
 * FALSE if no prefix exists.
 *
 *
 *
 *
 * @return bool Always returns TRUE.
 *
 */
function xml_set_end_namespace_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_end_namespace_decl_handler($parser, $handler);
    return $safeResult;
}


/**
 * Sets the external entity reference handler function for the XML parser
 * parser.
 *
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * boolhandler
 * XMLParserparser
 * stringopen_entity_names
 * stringfalsebase
 * stringsystem_id
 * stringfalsepublic_id
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
 *
 *
 *
 *
 * open_entity_names
 *
 *
 * A space-separated list of the names of the entities that are open for
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
 * (system_id) of the external entity.
 *
 *
 *
 *
 * system_id
 *
 *
 * The system identifier as specified in the entity declaration.
 *
 *
 *
 *
 * public_id
 *
 *
 * The public identifier as specified in the entity declaration, or
 * an empty string if none was specified; the whitespace in the
 * public identifier will have been normalized as required by
 * the XML spec.
 *
 *
 *
 *
 *
 * The handler should return TRUE if the entity was handled,
 * FALSE otherwise.
 * When returning FALSE the XML parser will stop parsing and
 * xml_get_error_code will return
 * XML_ERROR_EXTERNAL_ENTITY_HANDLING.
 * @return bool Always returns TRUE.
 *
 */
function xml_set_external_entity_ref_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_external_entity_ref_handler($parser, $handler);
    return $safeResult;
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
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * voidhandler
 * XMLParserparser
 * stringnotation_name
 * stringfalsebase
 * stringsystem_id
 * stringfalsepublic_id
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
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
 * @return bool Always returns TRUE.
 *
 */
function xml_set_notation_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_notation_decl_handler($parser, $handler);
    return $safeResult;
}


/**
 * This function allows to use parser inside
 * object. All callback functions could be set with
 * xml_set_element_handler etc and assumed to be
 * methods of object.
 *
 * @param \XMLParser $parser A reference to the XML parser to use inside the object.
 * @param object $object The object where to use the XML parser.
 * @return bool Always returns TRUE.
 *
 */
function xml_set_object(\XMLParser $parser, object $object): bool
{
    error_clear_last();
    $safeResult = \xml_set_object($parser, $object);
    return $safeResult;
}


/**
 * Sets the processing instruction (PI) handler function for the XML parser
 * parser.
 *
 * A processing instruction has the following format:
 *
 *
 * ]]>
 *
 *
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * voidhandler
 * XMLParserparser
 * stringtarget
 * stringdata
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
 *
 *
 *
 *
 * target
 *
 *
 * The processing instruction target.
 *
 *
 *
 *
 * data
 *
 *
 * The processing instruction data.
 *
 *
 *
 *
 * @return bool Always returns TRUE.
 *
 */
function xml_set_processing_instruction_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_processing_instruction_handler($parser, $handler);
    return $safeResult;
}


/**
 * Set a handler to be called when a namespace is declared. Namespace
 * declarations occur inside start tags. But the namespace declaration start
 * handler is called before the start tag handler for each namespace declared
 * in that start tag.
 *
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * voidhandler
 * XMLParserparser
 * stringfalseprefix
 * stringuri
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
 *
 *
 *
 *
 * prefix
 *
 *
 * The prefix is a string used to reference the namespace within an XML object.
 * FALSE if no prefix exists.
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
 * @return bool Always returns TRUE.
 *
 */
function xml_set_start_namespace_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_start_namespace_decl_handler($parser, $handler);
    return $safeResult;
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
 * @param \XMLParser $parser The XML parser.
 * @param callable $handler
 * If NULL is passed, the handler is reset to its default state.
 *
 *
 * An empty string will also reset the handler,
 * however this is deprecated as of PHP 8.4.0.
 *
 *
 *
 *
 * If handler is a callable,
 * the callable is set as the handler.
 *
 *
 * If handler is a string,
 * it can be the name of a method of an object set with
 * xml_set_object.
 *
 *
 * This is deprecated as of PHP 8.4.0.
 *
 *
 *
 * The signature of the handler must be:
 *
 * voidhandler
 * XMLParserparser
 * stringentity_name
 * stringfalsebase
 * stringsystem_id
 * stringfalsepublic_id
 * stringfalsenotation_name
 *
 *
 *
 * parser
 *
 *
 * The XML parser calling the handler.
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
 * (systemId) of the external entity.
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
 * @return bool Always returns TRUE.
 *
 */
function xml_set_unparsed_entity_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_unparsed_entity_decl_handler($parser, $handler);
    return $safeResult;
}
