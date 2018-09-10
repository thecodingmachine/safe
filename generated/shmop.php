<?php

namespace Safe;

use Safe\Exceptions\ShmopException;

/**
 * shmop_delete is used to delete a shared memory block.
 * 
 * @param int $shmid The shared memory block resource created by 
 * shmop_open
 * @throws ShmopException
 * 
 */
function shmop_delete($shmid): void
{
    error_clear_last();
    $result = \shmop_delete($shmid);
    if ($result === FALSE) {
        throw ShmopException::createFromPhpError();
    }
}


/**
 * shmop_read will read a string from shared memory block.
 * 
 * @param int $shmid The shared memory block identifier created by 
 * shmop_open
 * @param int $start Offset from which to start reading
 * @param int $count The number of bytes to read
 * @return string Returns the data .
 * @throws ShmopException
 * 
 */
function shmop_read($shmid, int $start, int $count): string
{
    error_clear_last();
    $result = \shmop_read($shmid, $start, $count);
    if ($result === FALSE) {
        throw ShmopException::createFromPhpError();
    }
    return $result;
}


