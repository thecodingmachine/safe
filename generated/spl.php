<?php

namespace Safe;

use Safe\Exceptions\SplException;

/**
 * This function returns an array with the names of the interfaces that the
 * given class and its parents implement.
 * 
 * @param mixed $class An object (class instance) or a string (class or interface name).
 * @param bool $autoload Whether to allow this function to load the class automatically through
 * the __autoload magic method.
 * @return array An array on success, .
 * @throws SplException
 * 
 */
function class_implements($class, bool $autoload = true): array
{
    error_clear_last();
    $result = \class_implements($class, $autoload);
    if ($result === FALSE) {
        throw SplException::createFromPhpError();
    }
    return $result;
}


/**
 * This function returns an array with the name of the parent classes of
 * the given class.
 * 
 * @param mixed $class An object (class instance) or a string (class name).
 * @param bool $autoload Whether to allow this function to load the class automatically through
 * the __autoload magic method.
 * @return array An array on success, .
 * @throws SplException
 * 
 */
function class_parents($class, bool $autoload = true): array
{
    error_clear_last();
    $result = \class_parents($class, $autoload);
    if ($result === FALSE) {
        throw SplException::createFromPhpError();
    }
    return $result;
}


/**
 * This function returns an array with the names of the traits that the
 * given class uses. This does however not include
 * any traits used by a parent class.
 * 
 * @param mixed $class An object (class instance) or a string (class name).
 * @param bool $autoload Whether to allow this function to load the class automatically through
 * the __autoload magic method.
 * @return array An array on success, .
 * @throws SplException
 * 
 */
function class_uses($class, bool $autoload = true): array
{
    error_clear_last();
    $result = \class_uses($class, $autoload);
    if ($result === FALSE) {
        throw SplException::createFromPhpError();
    }
    return $result;
}


/**
 * Removes a function from the autoload queue. If the queue
 * is activated and empty after removing the given function then it will
 * be deactivated.
 * 
 * When this function results in the queue being deactivated, any
 * __autoload function that previously existed will not be reactivated.
 * 
 * @param mixed $autoload_function The autoload function being unregistered.
 * @throws SplException
 * 
 */
function spl_autoload_unregister($autoload_function): void
{
    error_clear_last();
    $result = \spl_autoload_unregister($autoload_function);
    if ($result === FALSE) {
        throw SplException::createFromPhpError();
    }
}


