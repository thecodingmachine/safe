<?php

namespace Safe;

use Safe\Exceptions\InotifyException;

/**
 * inotify_add_watch adds a new watch or modify an
 * existing watch for the file or directory specified in
 * pathname.
 *
 * Using inotify_add_watch on a watched object replaces
 * the existing watch. Using the IN_MASK_ADD constant
 * adds (OR) events to the existing watch.
 *
 * @param resource $inotify_instance Resource returned by
 * inotify_init
 * @param string $pathname File or directory to watch
 * @param int $mask Events to watch for. See Predefined Constants.
 * @return int The return value is a unique (inotify instance wide) watch descriptor.
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
 * Initialize an inotify instance for use with
 * inotify_add_watch
 *
 * @return resource A stream resource.
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
 * inotify_rm_watch removes the watch
 * watch_descriptor from the inotify instance
 * inotify_instance.
 *
 * @param resource $inotify_instance Resource returned by
 * inotify_init
 * @param int $watch_descriptor Watch to remove from the instance
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
