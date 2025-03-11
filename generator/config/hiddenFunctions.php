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
    'sodium_crypto_auth_verify', // boolean return value is expected from verify
    'sodium_crypto_sign_verify_detached', // boolean return value is expected from verify
];
