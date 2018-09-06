<?php

namespace Safe;

/**
 * Sets the thread title.
 * 
 * @param string $title The title to use as the thread title.
 * @throws Exceptions\ProctitleException
 * 
 */
function setthreadtitle(string $title): void
{
    error_clear_last();
    $result = \setthreadtitle($title);
    if ($result === FALSE) {
        throw Exceptions\ProctitleException::createFromPhpError();
    }
}


