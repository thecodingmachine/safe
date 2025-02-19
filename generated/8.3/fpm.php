<?php

namespace Safe;

use Safe\Exceptions\FpmException;

/**
 * This function flushes all response data to the client and finishes the
 * request. This allows for time consuming tasks to be performed without
 * leaving the connection to the client open.
 *
 * @throws FpmException
 *
 */
function fastcgi_finish_request(): void
{
    error_clear_last();
    $safeResult = \fastcgi_finish_request();
    if ($safeResult === false) {
        throw FpmException::createFromPhpError();
    }
}


/**
 * This function returns the full current FPM pool status as an associative array. It always
 * returns the full status, including per-process status information. See the
 * FPM status page guide for further
 * details.
 *
 * Note that this function will only be defined if FPM is being used to serve the script.
 *
 * @return array{pool: string, process-manager: 'dynamic'|'ondemand'|'static', start-time: int, start-since: int, accepted-conn: int, listen-queue: int, max-listen-queue: int, listen-queue-len: int, idle-processes: int, active-processes: int, total-processes: int, max-active-processes: int, max-children-reached: 0|1, slow-requests: int, procs: array} Associative array containing the full FPM pool status.
 * @throws FpmException
 *
 */
function fpm_get_status(): array
{
    error_clear_last();
    $safeResult = \fpm_get_status();
    if ($safeResult === false) {
        throw FpmException::createFromPhpError();
    }
    return $safeResult;
}
