<?php
/**
 * A list of functions that must be dealt with manually.
 * They are declared in lib/special_cases.php
 */
return [
    'apc_fetch',
    'apcu_fetch',
    'json_decode',
    'openssl_encrypt',
    'preg_replace',
    'readdir',
];
