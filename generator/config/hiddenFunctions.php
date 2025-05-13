<?php
/*
 * A list of functions which don't really belong in Safe, but our
 * unsafe-function-detector detected them by accident, and now we
 * don't want to delete them (because that would break the backwards
 * compatibility promise implied by Semver), but we also don't want
 * to suggest that users should be using them.
 */
return [
    'array_all', // false is not an error
    'array_combine', // this function throws an error instead of returning false since PHP 8.0
    'array_flip', // always return an array since PHP 8.0, see https://github.com/php/doc-en/issues/1178
    'array_replace', // this function throws an error instead of returning false since PHP 8.0, see https://github.com/php/doc-en/pull/1649
    'array_replace_recursive', // this function throws an error instead of returning false since PHP 8.0, see https://github.com/php/doc-en/pull/1649
    'array_walk_recursive', // actually returns always true, see https://github.com/php/doc-en/commit/cec5275f23d2db648df30a5702b378044431be97
    'curl_share_errno', // this function does not anymore return false since PHP 8.0
    'date', // this function throws an error instead of returning false PHP 8.0, but the doc has only been updated since PHP 8.4
    'getallheaders', // always return an array since PHP 7, see https://github.com/php/doc-en/commit/68e52ef14de33f6752a8fdda1ae83c861c5babdb
    'gmp_random_seed', // this function throws an error instead of returning false since PHP 8.0
    'hash_hkdf', // this function throws an error instead of returning false since PHP 8.0
    'long2ip', // false return type cannot actually be returned, see https://github.com/php/php-src/pull/13395
    'pack', // this function no longer returns false since PHP 8.0, but the doc has only been updated since PHP 8.4
    'imagesx', // this function throws an error instead of returning false PHP 8.0, see https://github.com/php/doc-en/commit/0462f49fb00dd5abaec3aa322009f2eb40a3279d
    'imagesy', // this function throws an error instead of returning false PHP 8.0, see https://github.com/php/doc-en/commit/37f858a5579386dafaddaffbe15034dbcd0f55c8
    'sodium_crypto_auth_verify', // boolean return value is expected from verify
    'sodium_crypto_sign_verify_detached', // boolean return value is expected from verify
];
