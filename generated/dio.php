<?php

namespace Safe;

/**
 * dio_open opens a file and returns a new file
 * descriptor for it.
 * 
 * @param string $filename The pathname of the file to open.
 * @param int $flags The flags parameter is a bitwise-ORed
 * value comprising flags from the following list. This value
 * must include one of
 * O_RDONLY, O_WRONLY,
 * or O_RDWR. Additionally, it may include
 * any combination of the other flags from this list.
 * 
 * 
 * 
 * O_RDONLY - opens the file for read access.
 * 
 * 
 * 
 * 
 * O_WRONLY - opens the file for write access.
 * 
 * 
 * 
 * 
 * O_RDWR - opens the file for both reading and
 * writing.
 * 
 * 
 * 
 * 
 * O_CREAT - creates the file, if it doesn't
 * already exist.
 * 
 * 
 * 
 * 
 * O_EXCL - if both O_CREAT
 * and O_EXCL are set and the file already
 * exists, dio_open will fail.
 * 
 * 
 * 
 * 
 * O_TRUNC - if the file exists and is opened 
 * for write access, the file will be truncated to zero length.
 * 
 * 
 * 
 * 
 * O_APPEND - write operations write data at the
 * end of the file.
 * 
 * 
 * 
 * 
 * O_NONBLOCK - sets non blocking mode.
 * 
 * 
 * 
 * 
 * O_NOCTTY - prevent the OS from
 * assigning the opened file as the process's controlling
 * terminal when opening a TTY device file.
 * 
 * 
 * 
 * 
 * O_RDONLY - opens the file for read access.
 * 
 * O_WRONLY - opens the file for write access.
 * 
 * O_RDWR - opens the file for both reading and
 * writing.
 * 
 * O_CREAT - creates the file, if it doesn't
 * already exist.
 * 
 * O_EXCL - if both O_CREAT
 * and O_EXCL are set and the file already
 * exists, dio_open will fail.
 * 
 * O_TRUNC - if the file exists and is opened 
 * for write access, the file will be truncated to zero length.
 * 
 * O_APPEND - write operations write data at the
 * end of the file.
 * 
 * O_NONBLOCK - sets non blocking mode.
 * 
 * O_NOCTTY - prevent the OS from
 * assigning the opened file as the process's controlling
 * terminal when opening a TTY device file.
 * @param int $mode If flags contains
 * O_CREAT, mode will
 * set the permissions of the file (creation
 * permissions). mode is required for
 * correct operation when O_CREAT is
 * specified in flags and is ignored
 * otherwise.
 * 
 * The actual permissions assigned to the created file will be
 * affected by the process's umask setting as
 * per usual.
 * @return resource A file descriptor .
 * @throws Exceptions\DioException
 * 
 */
function dio_open(string $filename, int $flags, int $mode = 0)
{
    error_clear_last();
    $result = \dio_open($filename, $flags, $mode);
    if ($result === FALSE) {
        throw Exceptions\DioException::createFromPhpError();
    }
    return $result;
}


/**
 * dio_truncate truncates a file to at most 
 * offset bytes in size.
 * 
 * If the file previously was larger than this size, the extra data is 
 * lost. If the file previously was shorter, it is unspecified whether the
 * file is left unchanged or is extended. In the latter case the extended 
 * part reads as zero bytes.
 * 
 * @param resource $fd The file descriptor returned by dio_open.
 * @param int $offset The offset in bytes.
 * @throws Exceptions\DioException
 * 
 */
function dio_truncate($fd, int $offset): void
{
    error_clear_last();
    $result = \dio_truncate($fd, $offset);
    if ($result === FALSE) {
        throw Exceptions\DioException::createFromPhpError();
    }
}


