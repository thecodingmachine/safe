<?php

namespace Safe;

use Safe\Exceptions\ComException;

/**
 * @return string
 * @throws ComException
 *
 */
function com_create_guid(): string
{
    error_clear_last();
    $safeResult = \com_create_guid();
    if ($safeResult === false) {
        throw ComException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param object $variant
 * @param object $sink_object
 * @param mixed $sink_interface
 * @throws ComException
 *
 */
function com_event_sink(object $variant, object $sink_object, $sink_interface = null): void
{
    error_clear_last();
    if ($sink_interface !== null) {
        $safeResult = \com_event_sink($variant, $sink_object, $sink_interface);
    } else {
        $safeResult = \com_event_sink($variant, $sink_object);
    }
    if ($safeResult === false) {
        throw ComException::createFromPhpError();
    }
}


/**
 * @param string $typelib
 * @param bool $case_insensitive
 * @throws ComException
 *
 */
function com_load_typelib(string $typelib, bool $case_insensitive = true): void
{
    error_clear_last();
    $safeResult = \com_load_typelib($typelib, $case_insensitive);
    if ($safeResult === false) {
        throw ComException::createFromPhpError();
    }
}


/**
 * @param object $variant
 * @param null|string $dispatch_interface
 * @param bool $display_sink
 * @throws ComException
 *
 */
function com_print_typeinfo(object $variant, ?string $dispatch_interface = null, bool $display_sink = false): void
{
    error_clear_last();
    if ($display_sink !== false) {
        $safeResult = \com_print_typeinfo($variant, $dispatch_interface, $display_sink);
    } elseif ($dispatch_interface !== null) {
        $safeResult = \com_print_typeinfo($variant, $dispatch_interface);
    } else {
        $safeResult = \com_print_typeinfo($variant);
    }
    if ($safeResult === false) {
        throw ComException::createFromPhpError();
    }
}


/**
 * @param object $variant
 * @return int
 * @throws ComException
 *
 */
function variant_date_to_timestamp(object $variant): int
{
    error_clear_last();
    $safeResult = \variant_date_to_timestamp($variant);
    if ($safeResult === null) {
        throw ComException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param mixed $value
 * @param int $decimals
 * @return mixed
 * @throws ComException
 *
 */
function variant_round($value, int $decimals)
{
    error_clear_last();
    $safeResult = \variant_round($value, $decimals);
    if ($safeResult === null) {
        throw ComException::createFromPhpError();
    }
    return $safeResult;
}
