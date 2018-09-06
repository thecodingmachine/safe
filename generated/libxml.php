<?php

namespace Safe;

/**
 * Changes the default external entity loader.
 * 
 * @param callable $resolver_function A callable that takes three arguments. Two strings, a public id
 * and system id, and a context (an array with four keys) as the third argument.
 * This callback should return a resource, a string from which a resource can be
 * opened, or NULL.
 * @throws Exceptions\LibxmlException
 * 
 */
function libxml_set_external_entity_loader(callable $resolver_function): void
{
    error_clear_last();
    $result = \libxml_set_external_entity_loader($resolver_function);
    if ($result === FALSE) {
        throw Exceptions\LibxmlException::createFromPhpError();
    }
}


