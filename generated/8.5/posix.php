<?php

namespace Safe;

use Safe\Exceptions\PosixException;

/**
 * posix_access checks the user's permission of a file.
 *
 * @param string $filename The name of the file to be tested.
 * @param int $flags A mask consisting of one or more of POSIX_F_OK,
 * POSIX_R_OK, POSIX_W_OK and
 * POSIX_X_OK.
 *
 * POSIX_R_OK, POSIX_W_OK and
 * POSIX_X_OK request checking whether the file
 * exists and has read, write and execute permissions, respectively.
 * POSIX_F_OK just requests checking for the
 * existence of the file.
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
 * posix_eaccess checks the effective user's permission of a file
 *
 * @param string $filename The name of a file to be tested.
 * @param int $flags A mask consisting of one or more of POSIX_F_OK,
 * POSIX_R_OK, POSIX_W_OK and
 * POSIX_X_OK.
 *
 * POSIX_R_OK, POSIX_W_OK and
 * POSIX_X_OK request checking whether the file
 * exists and has read, write and execute permissions, respectively.
 * POSIX_F_OK just requests checking for the
 * existence of the file.
 * @throws PosixException
 *
 */
function posix_eaccess(string $filename, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \posix_eaccess($filename, $flags);
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
}


/**
 * Gets information about a group provided its id.
 *
 * @param int $group_id The group id.
 * @return array{name: string, passwd: string, gid: int, members: list} The array elements returned are:
 *
 * The group information array
 *
 *
 *
 * Element
 * Description
 *
 *
 *
 *
 * name
 *
 * The name element contains the name of the group. This is
 * a short, usually less than 16 character "handle" of the
 * group, not the real, full name.
 *
 *
 *
 * passwd
 *
 * The passwd element contains the group's password in an
 * encrypted format. Often, for example on a system employing
 * "shadow" passwords, an asterisk is returned instead.
 *
 *
 *
 * gid
 *
 * Group ID, should be the same as the
 * group_id parameter used when calling the
 * function, and hence redundant.
 *
 *
 *
 * members
 *
 * This consists of an array of
 * string's for all the members in the group.
 *
 *
 *
 *
 *
 * The function returns FALSE on failure.
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
 * Gets information about a group provided its name.
 *
 * @param string $name The name of the group
 * @return array{name: string, passwd: string, gid: int, members: list} Returns an array on success.
 * The array elements returned are:
 *
 * The group information array
 *
 *
 *
 * Element
 * Description
 *
 *
 *
 *
 * name
 *
 * The name element contains the name of the group. This is
 * a short, usually less than 16 character "handle" of the
 * group, not the real, full name.  This should be the same as
 * the name parameter used when
 * calling the function, and hence redundant.
 *
 *
 *
 * passwd
 *
 * The passwd element contains the group's password in an
 * encrypted format. Often, for example on a system employing
 * "shadow" passwords, an asterisk is returned instead.
 *
 *
 *
 * gid
 *
 * Group ID of the group in numeric form.
 *
 *
 *
 * members
 *
 * This consists of an array of
 * string's for all the members in the group.
 *
 *
 *
 *
 *
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
 * Gets the group set of the current process.
 *
 * @return list Returns an array of integers containing the numeric group ids of the group
 * set of the current process.
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
 * Returns the login name of the user owning the current process.
 *
 * @return string Returns the login name of the user, as a string.
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
 * Returns an array of information about the user
 * referenced by the given user ID.
 *
 * @param int $user_id The user identifier.
 * @return array{name: string, passwd: string, uid: int, gid: int, gecos: string, dir: string, shell: string} Returns an associative array with the following elements:
 *
 * The user information array
 *
 *
 *
 * Element
 * Description
 *
 *
 *
 *
 * name
 *
 * The name element contains the username of the user. This is
 * a short, usually less than 16 character "handle" of the
 * user, not the real, full name.
 *
 *
 *
 * passwd
 *
 * The passwd element contains the user's password in an
 * encrypted format. Often, for example on a system employing
 * "shadow" passwords, an asterisk is returned instead.
 *
 *
 *
 * uid
 *
 * User ID, should be the same as the
 * user_id parameter used when calling the
 * function, and hence redundant.
 *
 *
 *
 * gid
 *
 * The group ID of the user. Use the function
 * posix_getgrgid to resolve the group
 * name and a list of its members.
 *
 *
 *
 * gecos
 *
 * GECOS is an obsolete term that refers to the finger
 * information field on a Honeywell batch processing system.
 * The field, however, lives on, and its contents have been
 * formalized by POSIX. The field contains a comma separated
 * list containing the user's full name, office phone, office
 * number, and home phone number. On most systems, only the
 * user's full name is available.
 *
 *
 *
 * dir
 *
 * This element contains the absolute path to the
 * home directory of the user.
 *
 *
 *
 * shell
 *
 * The shell element contains the absolute path to the
 * executable of the user's default shell.
 *
 *
 *
 *
 *
 * The function returns FALSE on failure.
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
 * posix_getrlimit returns an array
 * of information about the current resource's soft and hard limits.
 *
 *
 * Each resource has an associated soft and hard limit.  The soft
 * limit is the value that the kernel enforces for the corresponding
 * resource.  The hard limit acts as a ceiling for the soft limit.
 * An unprivileged process may only set its soft limit to a value
 * from 0 to the hard limit, and irreversibly lower its hard limit.
 *
 * @param int|null $resource If NULL all resource limits will be fetched.
 * Otherwise, the only limits of the resource type provided will be returned.
 * @return array Returns an associative array of elements for each
 * limit that is defined. Each limit has a soft and a hard limit.
 *
 * List of possible limits returned
 *
 *
 *
 * Limit name
 * Limit description
 *
 *
 *
 *
 * core
 *
 * The maximum size of the core file.  When 0, not core files are
 * created.  When core files are larger than this size, they will
 * be truncated at this size.
 *
 *
 *
 * totalmem
 *
 * The maximum size of the memory of the process, in bytes.
 *
 *
 *
 * virtualmem
 *
 * The maximum size of the virtual memory for the process, in bytes.
 *
 *
 *
 * data
 *
 * The maximum size of the data segment for the process, in bytes.
 *
 *
 *
 * stack
 *
 * The maximum size of the process stack, in bytes.
 *
 *
 *
 * rss
 *
 * The maximum number of virtual pages resident in RAM
 *
 *
 *
 * maxproc
 *
 * The maximum number of processes that can be created for the
 * real user ID of the calling process.
 *
 *
 *
 * memlock
 *
 * The maximum number of bytes of memory that may be locked into RAM.
 *
 *
 *
 * cpu
 *
 * The amount of time the process is allowed to use the CPU.
 *
 *
 *
 * filesize
 *
 * The maximum size of the data segment for the process, in bytes.
 *
 *
 *
 * openfiles
 *
 * One more than the maximum number of open file descriptors.
 *
 *
 *
 *
 *
 * The function returns FALSE on failure.
 * @throws PosixException
 *
 */
function posix_getrlimit(?int $resource = null): array
{
    error_clear_last();
    if ($resource !== null) {
        $safeResult = \posix_getrlimit($resource);
    } else {
        $safeResult = \posix_getrlimit();
    }
    if ($safeResult === false) {
        throw PosixException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Return the session id of the process process_id.
 * The session id of a process is the process group id of the session leader.
 *
 * @param int $process_id The process identifier. If set to 0, the current process is
 * assumed.  If an invalid process_id is
 * specified, then FALSE is returned and an error is set which
 * can be checked with posix_get_last_error.
 * @return int Returns the identifier, as an int.
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
 * Calculates the group access list for the user specified in name.
 *
 * @param string $username The user to calculate the list for.
 * @param int $group_id Typically the group number from the password file.
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
 * Send the signal signal to the process with
 * the process identifier process_id.
 *
 * @param int $process_id The process identifier.
 * @param int $signal One of the PCNTL signals constants.
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
 * posix_mkfifo creates a special
 * FIFO file which exists in the file system and acts as
 * a bidirectional communication endpoint for processes.
 *
 * @param string $filename Path to the FIFO file.
 * @param int $permissions The second parameter permissions has to be given in
 * octal notation (e.g. 0644). The permission of the newly created
 * FIFO also depends on the setting of the current
 * umask. The permissions of the created file are
 * (mode &amp; ~umask).
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
 * Creates a special or ordinary file.
 *
 * @param string $filename The file to create
 * @param int $flags This parameter is constructed by a bitwise OR between file type (one of
 * the following constants: POSIX_S_IFREG,
 * POSIX_S_IFCHR, POSIX_S_IFBLK,
 * POSIX_S_IFIFO or
 * POSIX_S_IFSOCK) and permissions.
 * @param int $major The major device kernel identifier (required to pass when using
 * S_IFCHR or S_IFBLK).
 * @param int $minor The minor device kernel identifier.
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
 * Set the effective group ID of the current process. This is a
 * privileged function and needs appropriate privileges (usually
 * root) on the system to be able to perform this function.
 *
 * @param int $group_id The group id.
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
 * Set the effective user ID of the current process. This is a privileged
 * function and needs appropriate privileges (usually root) on
 * the system to be able to perform this function.
 *
 * @param int $user_id The user id.
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
 * Set the real group ID of the current process. This is a
 * privileged function and needs appropriate privileges (usually
 * root) on the system to be able to perform this function. The
 * appropriate order of function calls is
 * posix_setgid first,
 * posix_setuid last.
 *
 * @param int $group_id The group id.
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
 * Let the process process_id join the process group
 * process_group_id.
 *
 * @param int $process_id The process id.
 * @param int $process_group_id The process group id.
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
 * posix_setrlimit sets the soft and hard limits for a
 * given system resource.
 *
 *
 * Each resource has an associated soft and hard limit.  The soft
 * limit is the value that the kernel enforces for the corresponding
 * resource.  The hard limit acts as a ceiling for the soft limit.
 * An unprivileged process may only set its soft limit to a value
 * from 0 to the hard limit, and irreversibly lower its hard limit.
 *
 * @param int $resource The
 * resource limit constant
 * corresponding to the limit that is being set.
 * @param int $soft_limit The soft limit, in whatever unit the resource limit requires, or
 * POSIX_RLIMIT_INFINITY.
 * @param int $hard_limit The hard limit, in whatever unit the resource limit requires, or
 * POSIX_RLIMIT_INFINITY.
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
 * Make the current process a session leader.
 *
 * @return int Returns the session ids.
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
 * Set the real user ID of the current process. This is a privileged
 * function that needs appropriate privileges (usually root) on
 * the system to be able to perform this function.
 *
 * @param int $user_id The user id.
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
 * Gets information about the current CPU usage.
 *
 * @return array Returns a hash of strings with information about the current
 * process CPU usage. The indices of the hash are:
 *
 *
 *
 * ticks - the number of clock ticks that have elapsed since
 * reboot.
 *
 *
 *
 *
 * utime - user time used by the current process.
 *
 *
 *
 *
 * stime - system time used by the current process.
 *
 *
 *
 *
 * cutime - user time used by current process and children.
 *
 *
 *
 *
 * cstime - system time used by current process and children.
 *
 *
 *
 * The function returns FALSE on failure.
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
 * Gets information about the system.
 *
 * Posix requires that assumptions must not be made about the
 * format of the values, e.g. the assumption that a release may contain
 * three digits or anything else returned by this function.
 *
 * @return array Returns a hash of strings with information about the
 * system. The indices of the hash are
 *
 *
 * sysname - operating system name (e.g. Linux)
 *
 *
 * nodename - system name (e.g. valiant)
 *
 *
 * release - operating system release (e.g. 2.2.10)
 *
 *
 * version - operating system version (e.g. #4 Tue Jul 20
 * 17:01:36 MEST 1999)
 *
 *
 * machine - system architecture (e.g. i586)
 *
 *
 * domainname - DNS domainname (e.g. example.com)
 *
 *
 *
 * domainname is a GNU extension and not part of POSIX.1, so this
 * field is only available on GNU systems or when using the GNU
 * libc.
 *
 * The function returns FALSE on failure.
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
