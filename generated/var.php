<?php

namespace Safe;

use Safe\Exceptions\VarException;

/**
 * Imports GET/POST/Cookie variables into the global scope. It is useful if
 * you disabled register_globals,
 * but would like to see some variables in the global scope.
 *
 * If you're interested in importing other variables into the global scope,
 * such as $_SERVER, consider using extract.
 *
 * @param string $types Using the types parameter, you can specify
 * which request variables to import. You can use 'G', 'P' and 'C'
 * characters respectively for GET, POST and Cookie. These characters are
 * not case sensitive, so you can also use any combination of 'g', 'p'
 * and 'c'. POST includes the POST uploaded file information.
 *
 * Note that the order of the letters matters, as when using
 * "GP", the
 * POST variables will overwrite GET variables with the same name. Any
 * other letters than GPC are discarded.
 * @param string $prefix Variable name prefix, prepended before all variable's name imported
 * into the global scope. So if you have a GET value named
 * "userid", and provide a prefix
 * "pref_", then you'll get a global variable named
 * $pref_userid.
 *
 * Although the prefix parameter is optional, you
 * will get an E_NOTICE level
 * error if you specify no prefix, or specify an empty string as a
 * prefix. This is a possible security hazard. Notice level errors are
 * not displayed using the default error reporting level.
 * @throws VarException
 *
 */
function import_request_variables(string $types, string $prefix = null): void
{
    error_clear_last();
    if ($prefix !== null) {
        $result = \import_request_variables($types, $prefix);
    } else {
        $result = \import_request_variables($types);
    }
    if ($result === false) {
        throw VarException::createFromPhpError();
    }
}


/**
 * Set the type of variable var to
 * type.
 *
 * @param mixed $var The variable being converted.
 * @param string $type Possibles values of type are:
 *
 *
 *
 * "boolean" or "bool"
 *
 *
 *
 *
 * "integer" or "int"
 *
 *
 *
 *
 * "float" or "double"
 *
 *
 *
 *
 * "string"
 *
 *
 *
 *
 * "array"
 *
 *
 *
 *
 * "object"
 *
 *
 *
 *
 * "null"
 *
 *
 *
 * @throws VarException
 *
 */
function settype(&$var, string $type): void
{
    error_clear_last();
    $result = \settype($var, $type);
    if ($result === false) {
        throw VarException::createFromPhpError();
    }
}
