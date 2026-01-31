<?php

namespace Safe;

use Safe\Exceptions\ErrorfuncException;

/**
 * @param string $message
 * @param 0|1|2|3|4 $message_type
 * @param null|string $destination
 * @param null|string $additional_headers
 * @throws ErrorfuncException
 *
 */
function error_log(string $message, int $message_type = 0, ?string $destination = null, ?string $additional_headers = null): void
{
    error_clear_last();
    if ($additional_headers !== null) {
        $safeResult = \error_log($message, $message_type, $destination, $additional_headers);
    } elseif ($destination !== null) {
        $safeResult = \error_log($message, $message_type, $destination);
    } else {
        $safeResult = \error_log($message, $message_type);
    }
    if ($safeResult === false) {
        throw ErrorfuncException::createFromPhpError();
    }
}
