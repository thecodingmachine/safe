<?php

namespace Safe;

/**
 * crack_closedict closes the specified
 * dictionary identifier.
 * 
 * @param resource $dictionary The dictionary to close. If not specified, the current dictionary is
 * closed.
 * @throws Exceptions\CrackException
 * 
 */
function crack_closedict($dictionary = null): void
{
    error_clear_last();
    if ($dictionary !== null) {
        $result = \crack_closedict($dictionary);
    }else {
        $result = \crack_closedict();
    }
    if ($result === FALSE) {
        throw Exceptions\CrackException::createFromPhpError();
    }
}


/**
 * crack_opendict opens the specified CrackLib 
 * dictionary for use with
 * crack_check.
 * 
 * @param string $dictionary The path to the Cracklib dictionary.
 * @return resource Returns a dictionary resource identifier on success .
 * @throws Exceptions\CrackException
 * 
 */
function crack_opendict(string $dictionary)
{
    error_clear_last();
    $result = \crack_opendict($dictionary);
    if ($result === FALSE) {
        throw Exceptions\CrackException::createFromPhpError();
    }
    return $result;
}


