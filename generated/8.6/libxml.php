<?php

namespace Safe;

use Safe\Exceptions\LibxmlException;

/**
 * @param callable $resolver_function
 * @return bool
 *
 */
function libxml_set_external_entity_loader(callable $resolver_function): bool
{
    error_clear_last();
    $safeResult = \libxml_set_external_entity_loader($resolver_function);
    return $safeResult;
}
