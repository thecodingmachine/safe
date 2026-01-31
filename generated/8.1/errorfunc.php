<?php

namespace Safe;

use Safe\Exceptions\ErrorfuncException;

/**
 * @param string $message
 * @param 0|1|2|3|4 $message_type
 * @param string $destination
 * @param string $extra_headers
 * @throws ErrorfuncException
 *
 */
function error_log(string $message, int $message_type = 0, ?string $destination = null, ?string $extra_headers = null): void
{
    error_clear_last();
    if ($extra_headers !== null) {
        $safeResult = \error_log($message, $message_type, $destination, $extra_headers);
    } elseif ($destination !== null) {
        $safeResult = \error_log($message, $message_type, $destination);
    } else {
        $safeResult = \error_log($message, $message_type);
    }
    if ($safeResult === false) {
        throw ErrorfuncException::createFromPhpError();
    }
}
