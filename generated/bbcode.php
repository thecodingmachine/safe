<?php

namespace Safe;

/**
 * Adds a tag to an existing BBCode_Container tag_set using tag_rules.
 * 
 * @param resource $bbcode_container BBCode_Container resource, returned by bbcode_create.
 * @param string $tag_name The new tag to add to the BBCode_Container tag_set.
 * @param array $tag_rules An associative array containing the parsing rules; see
 * bbcode_create for the available keys.
 * @throws Exceptions\BbcodeException
 * 
 */
function bbcode_add_element($bbcode_container, string $tag_name, array $tag_rules): void
{
    error_clear_last();
    $result = \bbcode_add_element($bbcode_container, $tag_name, $tag_rules);
    if ($result === FALSE) {
        throw Exceptions\BbcodeException::createFromPhpError();
    }
}


/**
 * Adds a smiley to the parser
 * 
 * @param resource $bbcode_container BBCode_Container resource, returned by bbcode_create.
 * @param string $smiley The string that will be replaced when found.
 * @param string $replace_by The string that replace smiley when found.
 * @throws Exceptions\BbcodeException
 * 
 */
function bbcode_add_smiley($bbcode_container, string $smiley, string $replace_by): void
{
    error_clear_last();
    $result = \bbcode_add_smiley($bbcode_container, $smiley, $replace_by);
    if ($result === FALSE) {
        throw Exceptions\BbcodeException::createFromPhpError();
    }
}


/**
 * This function closes the resource opened by bbcode_create.
 * 
 * @param resource $bbcode_container BBCode_Container resource returned by bbcode_create.
 * @throws Exceptions\BbcodeException
 * 
 */
function bbcode_destroy($bbcode_container): void
{
    error_clear_last();
    $result = \bbcode_destroy($bbcode_container);
    if ($result === FALSE) {
        throw Exceptions\BbcodeException::createFromPhpError();
    }
}


/**
 * This function parse the string to_parse following the rules in the
 * bbcode_container created by bbcode_create
 * 
 * @param resource $bbcode_container BBCode_Container resource returned by bbcode_create.
 * @param string $to_parse The string we need to parse.
 * @return string Returns the parsed string,  .
 * @throws Exceptions\BbcodeException
 * 
 */
function bbcode_parse($bbcode_container, string $to_parse): string
{
    error_clear_last();
    $result = \bbcode_parse($bbcode_container, $to_parse);
    if ($result === FALSE) {
        throw Exceptions\BbcodeException::createFromPhpError();
    }
    return $result;
}


/**
 * Attaches another parser to the bbcode_container.
 * This parser is used only when arguments must be parsed.
 * If this function is not used, the default argument parser
 * is the parser itself.
 * 
 * @param resource $bbcode_container BBCode_Container resource, returned by bbcode_create.
 * @param resource $bbcode_arg_parser BBCode_Container resource, returned by bbcode_create.
 * It will be used only for parsed arguments
 * @throws Exceptions\BbcodeException
 * 
 */
function bbcode_set_arg_parser($bbcode_container, $bbcode_arg_parser): void
{
    error_clear_last();
    $result = \bbcode_set_arg_parser($bbcode_container, $bbcode_arg_parser);
    if ($result === FALSE) {
        throw Exceptions\BbcodeException::createFromPhpError();
    }
}


/**
 * Set or alter parser options
 * 
 * @param resource $bbcode_container BBCode_Container resource, returned by bbcode_create.
 * @param int $flags The flag set that must be applied to the bbcode_container options
 * @param int $mode One of the BBCODE_SET_FLAGS_* constant to set, unset
 * a specific flag set or to replace the flag set by flags.
 * @throws Exceptions\BbcodeException
 * 
 */
function bbcode_set_flags($bbcode_container, int $flags, int $mode = BBCODE_SET_FLAGS_SET): void
{
    error_clear_last();
    $result = \bbcode_set_flags($bbcode_container, $flags, $mode);
    if ($result === FALSE) {
        throw Exceptions\BbcodeException::createFromPhpError();
    }
}


