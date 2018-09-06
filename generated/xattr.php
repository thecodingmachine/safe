<?php

namespace Safe;

/**
 * This function removes an extended attribute of a file.
 * 
 * Extended attributes have two different namespaces: user
 * and root. The user namespace is available to all users, while the root namespace
 * is available only to users with root privileges. xattr operates on the user
 * namespace  by default, but this can be changed with the
 * flags parameter.
 * 
 * @param string $filename The file from which we remove the attribute.
 * @param string $name The name of the attribute to remove.
 * @param int $flags 
 * Supported xattr flags
 * 
 * 
 * 
 * XATTR_DONTFOLLOW
 * Do not follow the symbolic link but operate on symbolic link itself.
 * 
 * 
 * XATTR_ROOT
 * Set attribute in root (trusted) namespace. Requires root privileges.
 * 
 * 
 * 
 * 
 * @throws Exceptions\XattrException
 * 
 */
function xattr_remove(string $filename, string $name, int $flags = 0): void
{
    error_clear_last();
    $result = \xattr_remove($filename, $name, $flags);
    if ($result === FALSE) {
        throw Exceptions\XattrException::createFromPhpError();
    }
}


/**
 * This function sets the value of an extended attribute of a file.
 * 
 * Extended attributes have two different namespaces: user
 * and root. The user namespace is available to all users, while the root namespace
 * is available only to users with root privileges. xattr operates on the user
 * namespace  by default, but this can be changed with the
 * flags parameter.
 * 
 * @param string $filename The file in which we set the attribute.
 * @param string $name The name of the extended attribute. This attribute will be created if 
 * it doesn't exist or replaced otherwise. You can change this behaviour 
 * by using the flags parameter.
 * @param string $value The value of the attribute.
 * @param int $flags 
 * Supported xattr flags
 * 
 * 
 * 
 * XATTR_CREATE
 * Function will fail if extended attribute already exists.
 * 
 * 
 * XATTR_REPLACE
 * Function will fail if extended attribute doesn't exist.
 * 
 * 
 * XATTR_DONTFOLLOW
 * Do not follow the symbolic link but operate on symbolic link itself.
 * 
 * 
 * XATTR_ROOT
 * Set attribute in root (trusted) namespace. Requires root privileges.
 * 
 * 
 * 
 * 
 * @throws Exceptions\XattrException
 * 
 */
function xattr_set(string $filename, string $name, string $value, int $flags = 0): void
{
    error_clear_last();
    $result = \xattr_set($filename, $name, $value, $flags);
    if ($result === FALSE) {
        throw Exceptions\XattrException::createFromPhpError();
    }
}


