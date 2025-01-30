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


/**
 * shmop_read will read a string from shared memory block.
 *
 * @param \Shmop $shmop The shared memory block identifier created by
 * shmop_open
 * @param int $offset Offset from which to start reading; must be greater than or equal to zero
 * and less than or equal to the actual size of the shared memory segment.
 * @param int $size The number of bytes to read; must be greater than or equal to zero,
 * and the sum of offset and size
 * must be less than or equal to the actual size of the shared memory segment.
 * 0 reads shmop_size($shmid) - $start bytes.
 * @return string Returns the data.
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
