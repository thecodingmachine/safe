<?php

/**
 * Our own custom function map, used to quickly correct errors in phpstan's function map.
 * This file must always be check against phpstan file to remove duplicates as phpstan keep getting corrected.
 */

return [
    'password_hash' => ['string|false', 'password'=>'string', 'algo'=>'int|string|null', 'options='=>'array'],
    'com_load_typelib' => ['bool', 'typelib_name'=>'string', 'case_insensitive='=>'bool'], // case_insensitive is a bool
    'sem_get' => ['resource|false', 'key'=>'int', 'max_acquire='=>'int', 'perm='=>'int', 'auto_release='=>'bool'], // auto_release is a bool
    'imap_open' => ['resource|false', 'mailbox'=>'string', 'user'=>'string', 'password'=>'string', 'flags='=>'int', 'retries='=>'int', 'options=' => 'array'], //the last 3 parameters were renamed
    'imagerotate' => ['resource|false', 'src_im'=>'resource', 'angle'=>'float', 'bgdcolor'=>'int', 'ignoretransparent='=>'bool'], //ignoretransparent is a bool instead of a int
    'pg_pconnect' => ['resource|false', 'connection_string'=>'string', 'flags' => 'int'], //flags is an int instead of a string
    'get_headers' => ['array|false', 'url'=>'string', 'format='=>'bool', 'context='=>'resource'], // format is a bool instead of int
    'imagegrabwindow' => ['GdImage|false', 'handle'=>'int', 'client_area'=>'bool'], // client_ara is a bool instead of an int
    'curl_init' => ['CurlHandle|false', 'url'=>'string'], // the return value is a CurlHandle instead of a resource
    'curl_copy_handle' => ['CurlHandle', 'handle' => 'CurlHandle'],
    'curl_escape' => ['string', 'handle' => 'CurlHandle', 'string' => 'string'],
    'curl_exec' => ['bool|string', 'handle' => 'CurlHandle'],
    'curl_getinfo' => ['mixed', 'handle' => 'CurlHandle', 'option' => 'int'],
    'curl_multi_info_read' => ['array', 'multi_handle' => 'CurlMultiHandle', 'queued_messages' => 'int|null'],
    'curl_multi_init' => ['CurlMultiHandle'],
    'curl_multi_setopt' => ['void', 'multi_handle' => 'CurlMultiHandle', 'option' => 'int', 'value' => 'mixed'],
    'curl_setopt' => ['void', 'handle' => 'CurlHandle', 'option' => 'int', 'value' => 'mixed'],
    'curl_share_errno' => ['int', 'share_handle' => 'CurlShareHandle'],
    'curl_share_setopt' => ['void', 'share_handle' => 'CurlShareHandle', 'option' => 'int', 'value' => 'mixed'],
    'curl_unescape' => ['string', 'handle' => 'CurlHandle', 'string' => 'string'],
];
