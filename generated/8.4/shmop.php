<?php

namespace Safe;

use Safe\Exceptions\ShmopException;

/**
 * @param \Shmop $shmop
 * @throws ShmopException
 *
 */
function shmop_delete(\Shmop $shmop): void
{
    error_clear_last();
    $safeResult = \shmop_delete($shmop);
    if ($safeResult === false) {
        throw ShmopException::createFromPhpError();
    }
}


/**
 * @param \Shmop $shmop
 * @param int $offset
 * @param int $size
 * @return string
 * @throws ShmopException
 *
 */
function shmop_read(\Shmop $shmop, int $offset, int $size): string
{
    error_clear_last();
    $safeResult = \shmop_read($shmop, $offset, $size);
    if ($safeResult === false) {
        throw ShmopException::createFromPhpError();
    }
    return $safeResult;
}
