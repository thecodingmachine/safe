<?php

namespace Safe;

use Safe\Exceptions\DirException;

/**
 * @param string $directory
 * @throws DirException
 *
 */
function chdir(string $directory): void
{
    error_clear_last();
    $safeResult = \chdir($directory);
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
}


/**
 * @param string $directory
 * @throws DirException
 *
 */
function chroot(string $directory): void
{
    error_clear_last();
    $safeResult = \chroot($directory);
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
}


/**
 * @param string $directory
 * @param null|resource $context
 * @return \Directory
 * @throws DirException
 *
 */
function dir(string $directory, $context = null): \Directory
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \dir($directory, $context);
    } else {
        $safeResult = \dir($directory);
    }
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return non-empty-string
 * @throws DirException
 *
 */
function getcwd(): string
{
    error_clear_last();
    $safeResult = \getcwd();
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $directory
 * @param null|resource $context
 * @return resource
 * @throws DirException
 *
 */
function opendir(string $directory, $context = null)
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \opendir($directory, $context);
    } else {
        $safeResult = \opendir($directory);
    }
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $directory
 * @param SCANDIR_SORT_ASCENDING|SCANDIR_SORT_DESCENDING|SCANDIR_SORT_NONE $sorting_order
 * @param null|resource $context
 * @return list
 * @throws DirException
 *
 */
function scandir(string $directory, int $sorting_order = SCANDIR_SORT_ASCENDING, $context = null): array
{
    error_clear_last();
    if ($context !== null) {
        $safeResult = \scandir($directory, $sorting_order, $context);
    } else {
        $safeResult = \scandir($directory, $sorting_order);
    }
    if ($safeResult === false) {
        throw DirException::createFromPhpError();
    }
    return $safeResult;
}
