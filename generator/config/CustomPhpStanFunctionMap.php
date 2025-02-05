<?php

/**
 * Our own custom function map, used to quickly correct errors in phpstan's function map.
 * This file must always be check against phpstan file to remove duplicates as phpstan keep getting corrected.
 * See: https://github.com/phpstan/phpstan-src/blob/2.1.x/resources/functionMap.php
 */

return [
    'base64_decode' => ['string|false', 'str'=>'string', 'strict='=>'bool'], // base64_decode returns false only in strict mode https://github.com/phpstan/phpstan-src/commit/cee66721266ae05f3cc052f82391d2645d74d55f
    'password_hash' => ['string|false', 'password'=>'string', 'algo'=>'int|string|null', 'options='=>'array'],
    'com_load_typelib' => ['bool', 'typelib_name'=>'string', 'case_insensitive='=>'bool'], // case_insensitive is a bool
    'sem_get' => ['resource|false', 'key'=>'int', 'max_acquire='=>'int', 'perm='=>'int', 'auto_release='=>'bool'], // auto_release is a bool
    'imap_open' => ['resource|false', 'mailbox'=>'string', 'user'=>'string', 'password'=>'string', 'flags='=>'int', 'retries='=>'int', 'options=' => 'array'], //the last 3 parameters were renamed
    'imagerotate' => ['resource|false', 'src_im'=>'resource', 'angle'=>'float', 'bgdcolor'=>'int', 'ignoretransparent='=>'bool'], //ignoretransparent is a bool instead of a int
    'pg_pconnect' => ['resource|false', 'connection_string'=>'string', 'flags' => 'int'], //flags is an int instead of a string
    'get_headers' => ['array|false', 'url'=>'string', 'format='=>'bool', 'context='=>'resource'], // format is a bool instead of int
    'imagegrabwindow' => ['GdImage|false', 'handle'=>'int', 'client_area'=>'bool'], // client_area is a bool instead of an int

    // theses replace resource by OpenSSLAsymmetricKey
    'openssl_pkey_get_details' => ['array|false', 'key'=>'OpenSSLAsymmetricKey'],
    'openssl_pkey_get_private' => ['OpenSSLAsymmetricKey|false', 'private_key'=>'OpenSSLAsymmetricKey|OpenSSLCertificate|array|string', 'passphrase='=>'null|string'],
    'openssl_pkey_get_public' => ['OpenSSLAsymmetricKey|false', 'public_key'=>'OpenSSLAsymmetricKey|OpenSSLCertificate|array|string'],
    // theses replace resource by OpenSSLCertificate
    'openssl_verify' => ['-1|0|1|false', 'data'=>'string', 'signature'=>'string', 'pub_key_id'=>' OpenSSLAsymmetricKey|OpenSSLCertificate|string', 'signature_alg='=>'int|string'],
    'openssl_x509_read' => ['OpenSSLCertificate|false', 'x509certdata'=>'OpenSSLCertificate|string'], // this replaces ressource by OpenSSLCertificate
    'openssl_x509_check_private_key' => ['bool', 'cert'=>'string|OpenSSLCertificate', 'key'=>'string|OpenSSLAsymmetricKey|OpenSSLCertificate|array'],
    'openssl_x509_checkpurpose' => ['bool|int', 'x509cert'=>'string|OpenSSLCertificate', 'purpose'=>'int', 'cainfo='=>'array', 'untrustedfile='=>'string'],
    'openssl_x509_export' => ['bool', 'x509'=>'string|OpenSSLCertificate', '&w_output'=>'string', 'notext='=>'bool'],
    'openssl_x509_export_to_file' => ['bool', 'x509'=>'string|OpenSSLCertificate', 'outfilename'=>'string', 'notext='=>'bool'],
    'openssl_x509_fingerprint' => ['string|false', 'x509'=>'string|OpenSSLCertificate', 'hash_algorithm='=>'string', 'raw_output='=>'bool'],

    'fgetcsv' => ['array|false|null', 'fp'=>'resource', 'length='=>'0|positive-int', 'delimiter='=>'string', 'enclosure='=>'string', 'escape='=>'string'], //phpstan default return type is too hard to analyse
    //todo: edit the reader to turn 0|1 into int
    'preg_match' => ['int|false', 'pattern'=>'string', 'subject'=>'string', '&w_subpatterns='=>'string[]', 'flags='=>'int', 'offset='=>'int'], //int|false instead of 0|1|false
    'preg_match_all' => ['0|positive-int|false', 'pattern'=>'string', 'subject'=>'string', '&w_subpatterns='=>'array', 'flags='=>'int', 'offset='=>'int'], // can't actually return null
    'stream_filter_prepend' => ['resource', 'stream' => 'resource', 'filtername' => 'string', 'read_write' => 'int', 'params' => 'mixed'], // params mixed instead of array
    'stream_filter_append' => ['resource', 'stream' => 'resource', 'filtername' => 'string', 'read_write' => 'int', 'params' => 'mixed'], // params mixed instead of array
    'socket_addrinfo_bind' => ['resource|false', 'addrinfo'=>'resource'], // doesn't return null
    'socket_addrinfo_connect' => ['resource|false', 'addrinfo'=>'resource'], // doesn't return null
    'socket_addrinfo_lookup' => ['AddressInfo[]|false', 'node'=>'string', 'service='=>'mixed', 'hints='=>'array'], // returns AddressInfo[], not resource[]
    'socket_create_pair' => ['bool', 'domain'=>'int', 'type'=>'int', 'protocol'=>'int', '&w_fd'=>'Socket[]'], // fd is Socket, not resource
];
