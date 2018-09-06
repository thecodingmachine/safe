<?php

namespace Safe;

/**
 * chdb_create creates a chdb file containing the
 * specified key-value pairs.
 * 
 * @param string $pathname The name of the file to create.
 * 
 * If a file with the same name already exists, it is overwritten.
 * @param array $data An array containing the key-value pairs to store in the chdb file.
 * 
 * Keys and values are converted to strings before being written to the file,
 * as chdb only support the string type. Note that binary strings are
 * supported as well, both as keys and values.
 * @throws Exceptions\ChdbException
 * 
 */
function chdb_create(string $pathname, array $data): void
{
    error_clear_last();
    $result = \chdb_create($pathname, $data);
    if ($result === FALSE) {
        throw Exceptions\ChdbException::createFromPhpError();
    }
}


