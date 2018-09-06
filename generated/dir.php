<?php

namespace Safe;

/**
 * Changes PHP's current directory to 
 * directory.
 * 
 * @param string $directory The new current directory
 * @throws Exceptions\DirException
 * 
 */
function chdir(string $directory): void
{
    error_clear_last();
    $result = \chdir($directory);
    if ($result === FALSE) {
        throw Exceptions\DirException::createFromPhpError();
    }
}


/**
 * Changes the root directory of the current process to
 * directory, and changes the current
 * working directory to "/".
 * 
 * This function is only available to GNU and BSD systems, and
 * only when using the CLI, CGI or Embed SAPI. Also, this function
 * requires root privileges.
 * 
 * @param string $directory The path to change the root directory to.
 * @throws Exceptions\DirException
 * 
 */
function chroot(string $directory): void
{
    error_clear_last();
    $result = \chroot($directory);
    if ($result === FALSE) {
        throw Exceptions\DirException::createFromPhpError();
    }
}


/**
 * Returns the name of the next entry in the directory. The
 * entries are returned in the order in which they are stored by
 * the filesystem.
 * 
 * @param resource $dir_handle The directory handle resource previously opened
 * with opendir. If the directory handle is 
 * not specified, the last link opened by opendir 
 * is assumed.
 * @return string Returns the entry name on success .
 * @throws Exceptions\DirException
 * 
 */
function readdir($dir_handle): string
{
    error_clear_last();
    if ($dir_handle !== null) {
        $result = \readdir($dir_handle);
    }else {
        $result = \readdir();
    }
    if ($result === FALSE) {
        throw Exceptions\DirException::createFromPhpError();
    }
    return $result;
}


/**
 * Resets the directory stream indicated by
 * dir_handle to the beginning of the
 * directory.
 * 
 * @param resource $dir_handle The directory handle resource previously opened
 * with opendir. If the directory handle is 
 * not specified, the last link opened by opendir 
 * is assumed.
 * @throws Exceptions\DirException
 * 
 */
function rewinddir($dir_handle): void
{
    error_clear_last();
    if ($dir_handle !== null) {
        $result = \rewinddir($dir_handle);
    }else {
        $result = \rewinddir();
    }
    if ($result === FALSE) {
        throw Exceptions\DirException::createFromPhpError();
    }
}


