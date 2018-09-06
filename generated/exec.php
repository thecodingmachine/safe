<?php

namespace Safe;

/**
 * proc_nice changes the priority of the current
 * process by the amount specified in increment. A
 * positive increment will lower the priority of the
 * current process, whereas a negative increment
 * will raise the priority.
 * 
 * proc_nice is not related to
 * proc_open and its associated functions in any way.
 * 
 * @param int $increment The new priority value, the value of this may differ on platforms.
 * 
 * On Unix, a low value, such as -20 means high priority 
 * wheras a positive value have a lower priority.
 * 
 * For Windows the increment parameter have the 
 * following meanings:
 * @throws Exceptions\ExecException
 * 
 */
function proc_nice(int $increment): void
{
    error_clear_last();
    $result = \proc_nice($increment);
    if ($result === FALSE) {
        throw Exceptions\ExecException::createFromPhpError();
    }
}


