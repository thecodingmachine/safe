<?php

namespace Safe;

use Safe\Exceptions\ShmopException;

/**
 * shmop_delete is used to delete a shared memory block.
 *
 * @param resource $shmop The shared memory block resource created by
 * shmop_open
 * @throws ShmopException
 *
 */
function shmop_delete($shmop): void
{
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \shmop_delete($shmop);
    restore_error_handler();

    if ($result === false) {
        throw ShmopException::createFromPhpError($error);
    }
}


/**
 * shmop_read will read a string from shared memory block.
 *
 * @param resource $shmop The shared memory block identifier created by
 * shmop_open
 * @param int $offset Offset from which to start reading
 * @param int $size The number of bytes to read.
 * 0 reads shmop_size($shmid) - $start bytes.
 * @return string Returns the data.
 * @throws ShmopException
 *
 */
function shmop_read($shmop, int $offset, int $size): string
{
    $error = [];
    set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) use (&$error) {
        $error = [
            'type' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];
        return false;
    });
    $result = \shmop_read($shmop, $offset, $size);
    restore_error_handler();

    if ($result === false) {
        throw ShmopException::createFromPhpError($error);
    }
    return $result;
}
