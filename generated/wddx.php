<?php

namespace Safe;

use Safe\Exceptions\WddxException;

/**
 * Serializes the passed variables and add the result to the given packet.
 *
 * @param resource $packet_id A WDDX packet, returned by wddx_packet_start.
 * @param mixed $var_name Can be either a string naming a variable or an array containing
 * strings naming the variables or another array, etc.
 * @param mixed $var_names
 * @throws WddxException
 *
 */
function wddx_add_vars($packet_id, $var_name, ...$var_names): void
{
    error_clear_last();
    if ($var_names !== []) {
        $safeResult = \wddx_add_vars($packet_id, $var_name, ...$var_names);
    } else {
        $safeResult = \wddx_add_vars($packet_id, $var_name);
    }
    if ($safeResult === false) {
        throw WddxException::createFromPhpError();
    }
}


/**
 * Start a new WDDX packet for incremental addition of variables.
 * It automatically creates a structure definition inside the packet to
 * contain the variables.
 *
 * @param string $comment An optional comment string.
 * @return resource Returns a packet ID for use in later functions.
 * @throws WddxException
 *
 */
function wddx_packet_start(string $comment = null)
{
    error_clear_last();
    if ($comment !== null) {
        $safeResult = \wddx_packet_start($comment);
    } else {
        $safeResult = \wddx_packet_start();
    }
    if ($safeResult === false) {
        throw WddxException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a WDDX packet from a single given value.
 *
 * @param mixed $var The value to be serialized
 * @param string $comment An optional comment string that appears in the packet header.
 * @return string Returns the WDDX packet.
 * @throws WddxException
 *
 */
function wddx_serialize_value($var, string $comment = null): string
{
    error_clear_last();
    if ($comment !== null) {
        $safeResult = \wddx_serialize_value($var, $comment);
    } else {
        $safeResult = \wddx_serialize_value($var);
    }
    if ($safeResult === false) {
        throw WddxException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a WDDX packet with a structure that contains the serialized
 * representation of the passed variables.
 *
 * @param mixed $var_name Can be either a string naming a variable or an array containing
 * strings naming the variables or another array, etc.
 * @param mixed $var_names
 * @return string Returns the WDDX packet.
 * @throws WddxException
 *
 */
function wddx_serialize_vars($var_name, ...$var_names): string
{
    error_clear_last();
    if ($var_names !== []) {
        $safeResult = \wddx_serialize_vars($var_name, ...$var_names);
    } else {
        $safeResult = \wddx_serialize_vars($var_name);
    }
    if ($safeResult === false) {
        throw WddxException::createFromPhpError();
    }
    return $safeResult;
}
