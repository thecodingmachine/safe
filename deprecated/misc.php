<?php

namespace Safe;

use Safe\Exceptions\MiscException;

/**
 *
 * @param int $seconds Halt time in seconds.
 * @return int Returns zero on success.
 *
 * If the call was interrupted by a signal, sleep returns
 * a non-zero value. On Windows, this value will always be
 * 192 (the value of the
 * WAIT_IO_COMPLETION constant within the Windows API).
 * On other platforms, the return value will be the number of seconds left to
 * sleep.
 * @throws MiscException
 * @deprecated The Safe version of this function is no longer needed in PHP 8.0+
 */
function sleep(int $seconds): int
{
    error_clear_last();
    $safeResult = \sleep($seconds);
    if ($safeResult === false) {
        throw MiscException::createFromPhpError();
    }
    return $safeResult;
}