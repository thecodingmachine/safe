<?php

namespace Safe;

/**
 * shmop_delete is used to delete a shared memory block.
 * 
 * @param int $shmid The shared memory block resource created by 
 * shmop_open
 * @throws Exceptions\ShmopException
 * 
 */
function shmop_delete($shmid): void
{
    error_clear_last();
    $result = \shmop_delete($shmid);
    if ($result === FALSE) {
        throw Exceptions\ShmopException::createFromPhpError();
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
 * @throws Exceptions\ShmopException
 * 
 */
function shmop_read($shmid, int $start, int $count): string
{
    error_clear_last();
    $result = \shmop_read($shmid, $start, $count);
    if ($result === FALSE) {
        throw Exceptions\ShmopException::createFromPhpError();
    }
    return $result;
}


