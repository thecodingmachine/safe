<?php

namespace Safe;

/**
 * 
 * 
 * @param string $classname The class to which this method will be added
 * @param string $methodname The name of the method to add
 * @param string $args Comma-delimited list of arguments for the newly-created method
 * @param string $code The code to be evaluated when methodname
 * is called
 * @param int $flags The type of method to create, can be
 * CLASSKIT_ACC_PUBLIC,
 * CLASSKIT_ACC_PROTECTED or
 * CLASSKIT_ACC_PRIVATE
 * 
 * This parameter is only used as of PHP 5, because, prior to this,
 * all methods were public.
 * @throws Exceptions\ClasskitException
 * 
 */
function classkit_method_add(string $classname, string $methodname, string $args, string $code, int $flags = CLASSKIT_ACC_PUBLIC): void
{
    error_clear_last();
    $result = \classkit_method_add($classname, $methodname, $args, $code, $flags);
    if ($result === FALSE) {
        throw Exceptions\ClasskitException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param string $classname The class in which to remove the method
 * @param string $methodname The name of the method to remove
 * @throws Exceptions\ClasskitException
 * 
 */
function classkit_method_remove(string $classname, string $methodname): void
{
    error_clear_last();
    $result = \classkit_method_remove($classname, $methodname);
    if ($result === FALSE) {
        throw Exceptions\ClasskitException::createFromPhpError();
    }
}


