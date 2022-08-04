<?php

namespace Safe;

use Safe\Exceptions\DirException;

/**
 * Changes PHP's current directory to
 * directory.
 *
 * @param string $directory The new current directory
 * @throws DirException
 *
 */
function chdir(string $directory): void
{
    error_clear_last();
    $safeResult = \chdir($directory);
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
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
 * Calling this function does not change the values of the __DIR__
 * and __FILE__ magic constants.
 *
 * @param string $directory The path to change the root directory to.
 * @throws DirException
 *
 */
function chroot(string $directory): void
{
    error_clear_last();
    $safeResult = \chroot($directory);
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
}


/**
 * Gets the current working directory.
 *
 * @return string Returns the current working directory on success.
 *
 * On some Unix variants, getcwd will return
 * FALSE if any one of the parent directories does not have the
 * readable or search mode set, even if the current directory
 * does. See chmod for more information on
 * modes and permissions.
 * @throws DirException
 *
 */
function getcwd(): string
{
    error_clear_last();
    $safeResult = \getcwd();
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Opens up a directory handle to be used in subsequent
 * closedir, readdir, and
 * rewinddir calls.
 *
 * @param string $directory The directory path that is to be opened
 * @param resource $context For a description of the context parameter,
 * refer to the streams section of
 * the manual.
 * @return resource Returns a directory handle resource on success
 * @throws DirException
 *
 */
function opendir(string $directory, $context = null)
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \opendir($directory, $context);
    } else {
        $safeResult = \opendir($directory);
    }
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns an array of files and directories from the
 * directory.
 *
 * @param string $directory The directory that will be scanned.
 * @param int $sorting_order By default, the sorted order is alphabetical in ascending order.  If
 * the optional sorting_order is set to
 * SCANDIR_SORT_DESCENDING, then the sort order is
 * alphabetical in descending order. If it is set to
 * SCANDIR_SORT_NONE then the result is unsorted.
 * @param resource $context For a description of the context parameter,
 * refer to the streams section of
 * the manual.
 * @return array Returns an array of filenames on success. If directory is not a directory, then
 * boolean FALSE is returned, and an error of level
 * E_WARNING is generated.
 * @throws DirException
 *
 */
function scandir(string $directory, int $sorting_order = SCANDIR_SORT_ASCENDING, $context = null): array
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \scandir($directory, $sorting_order, $context);
    } else {
        $safeResult = \scandir($directory, $sorting_order);
    }
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
    return $safeResult;
}
