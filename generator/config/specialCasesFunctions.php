<?php
/**
 * A list of functions that must be dealt with manually.
 * They are declared in lib/special_cases.php
 */
return [
    'json_decode',
    'apcu_fetch',
    'preg_replace',
    'openssl_encrypt',
    'socket_write',
    'simplexml_import_dom',
    'simplexml_load_file',
    'simplexml_load_string',
    'sys_getloadavg',
    'posix_getpgid',
    'fputcsv',
    'fgetcsv',  // This function need to return false when iterating on an end of file.
];
