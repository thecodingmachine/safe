<?php

namespace Safe;

use Safe\Exceptions\XmlException;

/**
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
 * @param \XMLParser $parser
 * @param int $option
 * @param mixed $value
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
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_character_data_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_character_data_handler($parser, $handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_default_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_default_handler($parser, $handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $start_handler
 * @param callable $end_handler
 * @return bool
 *
 */
function xml_set_element_handler(\XMLParser $parser, callable $start_handler, callable $end_handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_element_handler($parser, $start_handler, $end_handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_end_namespace_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_end_namespace_decl_handler($parser, $handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_external_entity_ref_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_external_entity_ref_handler($parser, $handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_notation_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_notation_decl_handler($parser, $handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param object $object
 * @return bool
 *
 */
function xml_set_object(\XMLParser $parser, object $object): bool
{
    error_clear_last();
    $safeResult = \xml_set_object($parser, $object);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_processing_instruction_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_processing_instruction_handler($parser, $handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_start_namespace_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_start_namespace_decl_handler($parser, $handler);
    return $safeResult;
}


/**
 * @param \XMLParser $parser
 * @param callable $handler
 * @return bool
 *
 */
function xml_set_unparsed_entity_decl_handler(\XMLParser $parser, callable $handler): bool
{
    error_clear_last();
    $safeResult = \xml_set_unparsed_entity_decl_handler($parser, $handler);
    return $safeResult;
}
