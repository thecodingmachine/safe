<?php

namespace Safe;

use Safe\Exceptions\PosixException;

/**
 * @param string $filename
 * @param int $flags
 * @throws PosixException
 *
 */
function posix_access(string $filename, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \posix_access($filename, $flags);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param int $group_id
 * @return array{name: string, passwd: string, gid: int, members: list}
 * @throws PosixException
 *
 */
function posix_getgrgid(int $group_id): array
{
    error_clear_last();
    $safeResult = \posix_getgrgid($group_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $name
 * @return array{name: string, passwd: string, gid: int, members: list}
 * @throws PosixException
 *
 */
function posix_getgrnam(string $name): array
{
    error_clear_last();
    $safeResult = \posix_getgrnam($name);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return list
 * @throws PosixException
 *
 */
function posix_getgroups(): array
{
    error_clear_last();
    $safeResult = \posix_getgroups();
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return string
 * @throws PosixException
 *
 */
function posix_getlogin(): string
{
    error_clear_last();
    $safeResult = \posix_getlogin();
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $user_id
 * @return array{name: string, passwd: string, uid: int, gid: int, gecos: string, dir: string, shell: string}
 * @throws PosixException
 *
 */
function posix_getpwuid(int $user_id): array
{
    error_clear_last();
    $safeResult = \posix_getpwuid($user_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return array
 * @throws PosixException
 *
 */
function posix_getrlimit(): array
{
    error_clear_last();
    $safeResult = \posix_getrlimit();
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $process_id
 * @return int
 * @throws PosixException
 *
 */
function posix_getsid(int $process_id): int
{
    error_clear_last();
    $safeResult = \posix_getsid($process_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $username
 * @param int $group_id
 * @throws PosixException
 *
 */
function posix_initgroups(string $username, int $group_id): void
{
    error_clear_last();
    $safeResult = \posix_initgroups($username, $group_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param int $process_id
 * @param int $signal
 * @throws PosixException
 *
 */
function posix_kill(int $process_id, int $signal): void
{
    error_clear_last();
    $safeResult = \posix_kill($process_id, $signal);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param int $permissions
 * @throws PosixException
 *
 */
function posix_mkfifo(string $filename, int $permissions): void
{
    error_clear_last();
    $safeResult = \posix_mkfifo($filename, $permissions);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param int $flags
 * @param int $major
 * @param int $minor
 * @throws PosixException
 *
 */
function posix_mknod(string $filename, int $flags, int $major = 0, int $minor = 0): void
{
    error_clear_last();
    $safeResult = \posix_mknod($filename, $flags, $major, $minor);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param int $group_id
 * @throws PosixException
 *
 */
function posix_setegid(int $group_id): void
{
    error_clear_last();
    $safeResult = \posix_setegid($group_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param int $user_id
 * @throws PosixException
 *
 */
function posix_seteuid(int $user_id): void
{
    error_clear_last();
    $safeResult = \posix_seteuid($user_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param int $group_id
 * @throws PosixException
 *
 */
function posix_setgid(int $group_id): void
{
    error_clear_last();
    $safeResult = \posix_setgid($group_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param int $process_id
 * @param int $process_group_id
 * @throws PosixException
 *
 */
function posix_setpgid(int $process_id, int $process_group_id): void
{
    error_clear_last();
    $safeResult = \posix_setpgid($process_id, $process_group_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @param int $resource
 * @param int $soft_limit
 * @param int $hard_limit
 * @throws PosixException
 *
 */
function posix_setrlimit(int $resource, int $soft_limit, int $hard_limit): void
{
    error_clear_last();
    $safeResult = \posix_setrlimit($resource, $soft_limit, $hard_limit);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @return int
 * @throws PosixException
 *
 */
function posix_setsid(): int
{
    error_clear_last();
    $safeResult = \posix_setsid();
    if ($safeResult === -1) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $user_id
 * @throws PosixException
 *
 */
function posix_setuid(int $user_id): void
{
    error_clear_last();
    $safeResult = \posix_setuid($user_id);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * @return array
 * @throws PosixException
 *
 */
function posix_times(): array
{
    error_clear_last();
    $safeResult = \posix_times();
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @return array
 * @throws PosixException
 *
 */
function posix_uname(): array
{
    error_clear_last();
    $safeResult = \posix_uname();
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}
