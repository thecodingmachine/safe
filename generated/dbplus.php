<?php

namespace Safe;

/**
 * dbplus_resolve will try to resolve the given
 * relation_name and find out internal server
 * id, real hostname and the database path on this host.
 * 
 * @param string $relation_name The relation name.
 * @return array Returns an array containing these values under the keys
 * sid, host and
 * host_path .
 * @throws Exceptions\DbplusException
 * 
 */
function dbplus_resolve(string $relation_name): array
{
    error_clear_last();
    $result = \dbplus_resolve($relation_name);
    if ($result === FALSE) {
        throw Exceptions\DbplusException::createFromPhpError();
    }
    return $result;
}


