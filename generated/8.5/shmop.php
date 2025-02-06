<?php

namespace Safe;

use Safe\Exceptions\ShmopException;

/**
 * shmop_delete is used to delete a shared memory block.
 *
 * @param \Shmop $shmop The shared memory block resource created by
 * shmop_open
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

function shmop_read()
{
    return \shmop_read(...func_get_args());
}
