<?php

namespace Safe;

use Safe\Exceptions\XmlrpcException;

/**
 * @param \DateTime|string $value
 * @param string $type
 * @throws XmlrpcException
 *
 */
function xmlrpc_set_type(&$value, string $type): void
{
    error_clear_last();
    $safeResult = \xmlrpc_set_type($value, $type);
    if ($safeResult === false) {
        throw XmlrpcException::createFromPhpError();
    }
}
