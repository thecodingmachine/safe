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
    'array_walk_recursive', // actually returns always true, see https://github.com/php/doc-en/commit/cec5275f23d2db648df30a5702b378044431be97
    'sodium_crypto_auth_verify', // boolean return value is expected from verify
    'sodium_crypto_sign_verify_detached', // boolean return value is expected from verify
    'pack', // this function no longer returns false since PHP 8.0, but the doc has only been updated since PHP 8.4
];
