<?php

namespace Safe;

use Safe\Exceptions\Runkit7Exception;

/**
 *
 *
 * @param string $constant_name Name of constant to declare.  Either a string to indicate a global constant,
 * or classname::constname to indicate a class constant.
 * @param mixed $value NULL, Bool, Long, Double, String, Array, or Resource value to store in the new constant.
 * @param int $newVisibility Visibility of the constant, for class constants. Public by default.
 * One of the RUNKIT7_ACC_* constants.
 * @throws Runkit7Exception
 *
 */
function runkit7_constant_add(string $constant_name, $value, int $newVisibility = null): void
{
    error_clear_last();
    if ($newVisibility !== null) {
        $safeResult = \runkit7_constant_add($constant_name, $value, $newVisibility);
    } else {
        $safeResult = \runkit7_constant_add($constant_name, $value);
    }
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $constant_name Constant to redefine.  Either the name of a global constant,
 * or classname::constname indicating class constant.
 * @param mixed $value Value to assign to the constant.
 * @param int $new_visibility The new visibility of the constant, for class constants.
 * Unchanged by default.
 * One of the RUNKIT7_ACC_* constants.
 * @throws Runkit7Exception
 *
 */
function runkit7_constant_redefine(string $constant_name, $value, int $new_visibility = null): void
{
    error_clear_last();
    if ($new_visibility !== null) {
        $safeResult = \runkit7_constant_redefine($constant_name, $value, $new_visibility);
    } else {
        $safeResult = \runkit7_constant_redefine($constant_name, $value);
    }
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $constant_name Name of the constant to remove.  Either the name of a global constant,
 * or classname::constname indicating a class constant.
 * @throws Runkit7Exception
 *
 */
function runkit7_constant_remove(string $constant_name): void
{
    error_clear_last();
    $safeResult = \runkit7_constant_remove($constant_name);
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $source_name Name of the existing function
 * @param string $target_name Name of the new function to copy the definition to
 * @throws Runkit7Exception
 *
 */
function runkit7_function_copy(string $source_name, string $target_name): void
{
    error_clear_last();
    $safeResult = \runkit7_function_copy($source_name, $target_name);
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $function_name Name of the function to be deleted
 * @throws Runkit7Exception
 *
 */
function runkit7_function_remove(string $function_name): void
{
    error_clear_last();
    $safeResult = \runkit7_function_remove($function_name);
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $source_name Current function name
 * @param string $target_name New function name
 * @throws Runkit7Exception
 *
 */
function runkit7_function_rename(string $source_name, string $target_name): void
{
    error_clear_last();
    $safeResult = \runkit7_function_rename($source_name, $target_name);
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 * Similar to include. However, any code residing outside
 * of a function or class is simply ignored.
 * Additionally, depending on the value of flags,
 * any functions or classes which already exist in the currently running environment
 * may be automatically overwritten by their new definitions.
 *
 * @param string $filename Filename to import function and class definitions from
 * @param int $flags Bitwise OR of the RUNKIT7_IMPORT_*
 * family of constants.
 * @throws Runkit7Exception
 *
 */
function runkit7_import(string $filename, int $flags = null): void
{
    error_clear_last();
    if ($flags !== null) {
        $safeResult = \runkit7_import($filename, $flags);
    } else {
        $safeResult = \runkit7_import($filename);
    }
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $class_name The class in which to remove the method
 * @param string $method_name The name of the method to remove
 * @throws Runkit7Exception
 *
 */
function runkit7_method_remove(string $class_name, string $method_name): void
{
    error_clear_last();
    $safeResult = \runkit7_method_remove($class_name, $method_name);
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $class_name The class in which to rename the method
 * @param string $source_method_name The name of the method to rename
 * @param string $target_method_name The new name to give to the renamed method
 * @throws Runkit7Exception
 *
 */
function runkit7_method_rename(string $class_name, string $source_method_name, string $target_method_name): void
{
    error_clear_last();
    $safeResult = \runkit7_method_rename($class_name, $source_method_name, $target_method_name);
    if ($safeResult === false) {
        throw Runkit7Exception::createFromPhpError();
    }
}
