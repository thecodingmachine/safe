<?php
/**
 * A list of functions that must be dealt with manually.
 * They are declared in lib/special_cases.php
 */
return [
    'json_decode',
    'apc_fetch',
    'apcu_fetch',
    'fputcsv',
    'preg_replace',
    'openssl_encrypt',
    'readdir',
    'socket_write',
    'simplexml_import_dom',
    'simplexml_load_file',
    'simplexml_load_string',
    // returns literal "true", which php8.1 doesn't support, so we implement
    // this one manually and return "bool"
    'stream_context_set_options',
    // This function need to return false when iterating on an end of file.
    'fgetcsv',
];
