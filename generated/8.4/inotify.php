<?php

namespace Safe;

use Safe\Exceptions\InotifyException;

/**
 * @param resource $inotify_instance
 * @param string $pathname
 * @param int $mask
 * @return int
 * @throws InotifyException
 *
 */
function inotify_add_watch($inotify_instance, string $pathname, int $mask): int
{
    error_clear_last();
    $safeResult = \inotify_add_watch($inotify_instance, $pathname, $mask);
    if ($safeResult === false) {
        throw InotifyException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return resource
 * @throws InotifyException
 *
 */
function inotify_init()
{
    error_clear_last();
    $safeResult = \inotify_init();
    if ($safeResult === false) {
        throw InotifyException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $inotify_instance
 * @param int $watch_descriptor
 * @throws InotifyException
 *
 */
function inotify_rm_watch($inotify_instance, int $watch_descriptor): void
{
    error_clear_last();
    $safeResult = \inotify_rm_watch($inotify_instance, $watch_descriptor);
    if ($safeResult === false) {
        throw InotifyException::createFromPhpError();
    }
}
