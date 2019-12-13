<?php

/**
 * Our own custom function map, used to quickly correct errors in phpstan's function map.
 * This file must always be check against phpstan file to remove duplicates as phpstan keep getting corrected.
 */

return [
    'swoole_async_writefile' => ['bool', 'filename'=>'string', 'content'=>'string', 'callback='=>'callable', 'flags='=>'int'],
    'libxml_get_last_error' => ['LibXMLError|false'], //LibXMLError need to be uppercase
    'gmp_random_seed' => ['void', 'seed'=>'GMP|string|int'], //gmp_random_seed doesn't return
    'imageconvolution' => ['bool', 'src_im'=>'resource', 'matrix3x3'=>'array', 'div'=>'float', 'offset'=>'float'], //imageconvolution return a bool
    'iptcembed' => ['string|bool', 'iptcdata'=>'string', 'jpeg_file_name'=>'string', 'spool='=>'int'], //iptcembed return either a string, true or false
    'password_hash' => ['string|false', 'password'=>'string', 'algo'=>'int|string|null', 'options='=>'array'],
];
