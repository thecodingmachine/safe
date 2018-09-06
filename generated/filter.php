<?php

namespace Safe;

/**
 * 
 * 
 * @param int $type One of INPUT_GET, INPUT_POST,
 * INPUT_COOKIE, INPUT_SERVER, or
 * INPUT_ENV.
 * @param string $variable_name Name of a variable to check.
 * @throws Exceptions\FilterException
 * 
 */
function filter_has_var(int $type, string $variable_name): void
{
    error_clear_last();
    $result = \filter_has_var($type, $variable_name);
    if ($result === FALSE) {
        throw Exceptions\FilterException::createFromPhpError();
    }
}


