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

function xml_set_character_data_handler()
{
    return \xml_set_character_data_handler(...func_get_args());
}

function xml_set_default_handler()
{
    return \xml_set_default_handler(...func_get_args());
}

function xml_set_element_handler()
{
    return \xml_set_element_handler(...func_get_args());
}

function xml_set_end_namespace_decl_handler()
{
    return \xml_set_end_namespace_decl_handler(...func_get_args());
}

function xml_set_external_entity_ref_handler()
{
    return \xml_set_external_entity_ref_handler(...func_get_args());
}

function xml_set_notation_decl_handler()
{
    return \xml_set_notation_decl_handler(...func_get_args());
}

function xml_set_object()
{
    return \xml_set_object(...func_get_args());
}

function xml_set_processing_instruction_handler()
{
    return \xml_set_processing_instruction_handler(...func_get_args());
}

function xml_set_start_namespace_decl_handler()
{
    return \xml_set_start_namespace_decl_handler(...func_get_args());
}

function xml_set_unparsed_entity_decl_handler()
{
    return \xml_set_unparsed_entity_decl_handler(...func_get_args());
}
