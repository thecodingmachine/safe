<?php

namespace Safe;

use Safe\Exceptions\FpmException;

/**
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
 * @return array{pool: string, process-manager: 'dynamic'|'ondemand'|'static', start-time: int, start-since: int, accepted-conn: int, listen-queue: int, max-listen-queue: int, listen-queue-len: int, idle-processes: int, active-processes: int, total-processes: int, max-active-processes: int, max-children-reached: 0|1, slow-requests: int, procs: array}
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
