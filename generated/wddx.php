<?php

namespace Safe;

/**
 * Serializes the passed variables and add the result to the given packet.
 * 
 * @param resource $packet_id A WDDX packet, returned by wddx_packet_start.
 * @param mixed $var_name Can be either a string naming a variable or an array containing
 * strings naming the variables or another array, etc.
 * @param mixed $params 
 * @throws Exceptions\WddxException
 * 
 */
function wddx_add_vars($packet_id, $var_name,  ...$params): void
{
    error_clear_last();
    if ($params !== null) {
        $result = \wddx_add_vars($packet_id, $var_name, $params);
    }else {
        $result = \wddx_add_vars($packet_id, $var_name);
    }
    if ($result === FALSE) {
        throw Exceptions\WddxException::createFromPhpError();
    }
}


/**
 * Start a new WDDX packet for incremental addition of variables.
 * It automatically creates a structure definition inside the packet to
 * contain the variables.
 * 
 * @param string $comment An optional comment string.
 * @return resource Returns a packet ID for use in later functions, .
 * @throws Exceptions\WddxException
 * 
 */
function wddx_packet_start(string $comment)
{
    error_clear_last();
    if ($comment !== null) {
        $result = \wddx_packet_start($comment);
    }else {
        $result = \wddx_packet_start();
    }
    if ($result === FALSE) {
        throw Exceptions\WddxException::createFromPhpError();
    }
    return $result;
}


/**
 * Creates a WDDX packet from a single given value.
 * 
 * @param mixed $var The value to be serialized
 * @param string $comment An optional comment string that appears in the packet header.
 * @return string Returns the WDDX packet, .
 * @throws Exceptions\WddxException
 * 
 */
function wddx_serialize_value($var, string $comment): string
{
    error_clear_last();
    if ($comment !== null) {
        $result = \wddx_serialize_value($var, $comment);
    }else {
        $result = \wddx_serialize_value($var);
    }
    if ($result === FALSE) {
        throw Exceptions\WddxException::createFromPhpError();
    }
    return $result;
}


/**
 * Creates a WDDX packet with a structure that contains the serialized
 * representation of the passed variables.
 * 
 * @param mixed $var_name Can be either a string naming a variable or an array containing
 * strings naming the variables or another array, etc.
 * @param mixed $params 
 * @return string Returns the WDDX packet, .
 * @throws Exceptions\WddxException
 * 
 */
function wddx_serialize_vars($var_name,  ...$params): string
{
    error_clear_last();
    if ($params !== null) {
        $result = \wddx_serialize_vars($var_name, $params);
    }else {
        $result = \wddx_serialize_vars($var_name);
    }
    if ($result === FALSE) {
        throw Exceptions\WddxException::createFromPhpError();
    }
    return $result;
}


