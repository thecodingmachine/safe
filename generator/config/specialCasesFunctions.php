<?php
/**
 * A list of functions that must be dealt with manually.
 * They are declared in lib/special_cases.php
 */
return [
    'json_decode',
    'apc_fetch',
    'apcu_fetch',
    'preg_replace',
    'openssl_encrypt',
];
