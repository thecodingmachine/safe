<?php

namespace Safe;

/**
 * 
 * 
 * @param string $funcname Name of existing function
 * @param string $targetname Name of new function to copy definition to
 * @throws Exceptions\RunkitException
 * 
 */
function runkit_function_copy(string $funcname, string $targetname): void
{
    error_clear_last();
    $result = \runkit_function_copy($funcname, $targetname);
    if ($result === FALSE) {
        throw Exceptions\RunkitException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param string $funcname Name of function to be deleted
 * @throws Exceptions\RunkitException
 * 
 */
function runkit_function_remove(string $funcname): void
{
    error_clear_last();
    $result = \runkit_function_remove($funcname);
    if ($result === FALSE) {
        throw Exceptions\RunkitException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param string $funcname Current function name
 * @param string $newname New function name
 * @throws Exceptions\RunkitException
 * 
 */
function runkit_function_rename(string $funcname, string $newname): void
{
    error_clear_last();
    $result = \runkit_function_rename($funcname, $newname);
    if ($result === FALSE) {
        throw Exceptions\RunkitException::createFromPhpError();
    }
}


/**
 * Similar to include however any code residing outside
 * of a function or class is simply ignored.
 * Additionally, depending on the value of flags,
 * any functions or classes which already exist in the currently running environment
 * may be automatically overwritten by their new definitions.
 * 
 * @param string $filename Filename to import function and class definitions from
 * @param int $flags Bitwise OR of the RUNKIT_IMPORT_*
 * family of constants.
 * @throws Exceptions\RunkitException
 * 
 */
function runkit_import(string $filename, int $flags = RUNKIT_IMPORT_CLASS_METHODS): void
{
    error_clear_last();
    $result = \runkit_import($filename, $flags);
    if ($result === FALSE) {
        throw Exceptions\RunkitException::createFromPhpError();
    }
}


/**
 * The runkit_lint_file function performs a syntax (lint) check
 * on the specified filename testing for scripting errors. This is similar to using php -l
 * from the commandline.
 * 
 * @param string $filename File containing PHP Code to be lint checked
 * @throws Exceptions\RunkitException
 * 
 */
function runkit_lint_file(string $filename): void
{
    error_clear_last();
    $result = \runkit_lint_file($filename);
    if ($result === FALSE) {
        throw Exceptions\RunkitException::createFromPhpError();
    }
}


/**
 * The runkit_lint function performs a syntax (lint)
 * check on the specified php code testing for scripting errors.
 * This is similar to using php -l from the command line except
 * runkit_lint accepts actual code rather than a filename.
 * 
 * @param string $code PHP Code to be lint checked
 * @throws Exceptions\RunkitException
 * 
 */
function runkit_lint(string $code): void
{
    error_clear_last();
    $result = \runkit_lint($code);
    if ($result === FALSE) {
        throw Exceptions\RunkitException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param string $classname The class in which to remove the method
 * @param string $methodname The name of the method to remove
 * @throws Exceptions\RunkitException
 * 
 */
function runkit_method_remove(string $classname, string $methodname): void
{
    error_clear_last();
    $result = \runkit_method_remove($classname, $methodname);
    if ($result === FALSE) {
        throw Exceptions\RunkitException::createFromPhpError();
    }
}


