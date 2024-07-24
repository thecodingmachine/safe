<?php

namespace Safe;

use Safe\Exceptions\SvnException;

/**
 * Adds the file, directory or symbolic link at path
 * to the working directory. The item will be added to the repository
 * the next time you call svn_commit on the working
 * copy.
 *
 * @param string $path Path of item to add.
 * @param bool $recursive If item is directory, whether or not to recursively add
 * all of its contents. Default is TRUE
 * @param bool $force If true, Subversion will recurse into already versioned directories
 * in order to add unversioned files that may be hiding in those
 * directories. Default is FALSE
 * @throws SvnException
 *
 */
function svn_add(string $path, bool $recursive = true, bool $force = false): void
{
    error_clear_last();
    $safeResult = \svn_add($path, $recursive, $force);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Returns the contents of the URL repos_url to
 * a file in the repository, optionally at revision number
 * revision_no.
 *
 * @param string $repos_url String URL path to item in a repository.
 * @param int $revision_no Integer revision number of item to retrieve, default is the HEAD
 * revision.
 * @return string Returns the string contents of the item from the repository on
 * success.
 * @throws SvnException
 *
 */
function svn_cat(string $repos_url, int $revision_no = null): string
{
    error_clear_last();
    if ($revision_no !== null) {
        $safeResult = \svn_cat($repos_url, $revision_no);
    } else {
        $safeResult = \svn_cat($repos_url);
    }
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Checks out a working copy from the repository at repos
 * to targetpath at revision revision.
 *
 * @param string $repos String URL path to directory in repository to check out.
 * @param string $targetpath String local path to directory to check out in to
 * @param int $revision Integer revision number of repository to check out. Default is
 * HEAD, the most recent revision.
 * @param int $flags Any combination of SVN_NON_RECURSIVE and
 * SVN_IGNORE_EXTERNALS.
 * @throws SvnException
 *
 */
function svn_checkout(string $repos, string $targetpath, int $revision = null, int $flags = 0): void
{
    error_clear_last();
    if ($flags !== 0) {
        $safeResult = \svn_checkout($repos, $targetpath, $revision, $flags);
    } elseif ($revision !== null) {
        $safeResult = \svn_checkout($repos, $targetpath, $revision);
    } else {
        $safeResult = \svn_checkout($repos, $targetpath);
    }
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Recursively cleanup working copy directory workingdir,
 * finishing any incomplete operations and removing working copy locks. Use
 * when a working copy is in limbo and needs to be usable again.
 *
 * @param string $workingdir String path to local working directory to cleanup
 * @throws SvnException
 *
 */
function svn_cleanup(string $workingdir): void
{
    error_clear_last();
    $safeResult = \svn_cleanup($workingdir);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Commits changes made in the local working copy files enumerated in
 * the targets array to the repository, with the
 * log message log. Directories in the targets
 * array will be recursively committed unless recursive
 * is set to FALSE.
 *
 * @param string $log String log text to commit
 * @param array $targets Array of local paths of files to be committed
 * @param bool $recursive Boolean flag to disable recursive committing of
 * directories in the targets array.
 * Default is TRUE.
 * @return array Returns array in form of:
 *
 * Returns FALSE on failure.
 * @throws SvnException
 *
 */
function svn_commit(string $log, array $targets, bool $recursive = true): array
{
    error_clear_last();
    $safeResult = \svn_commit($log, $targets, $recursive);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Deletes the file, directory or symbolic link at path
 * from the working directory. The item will be deleted from the repository
 * the next time you call svn_commit on the working
 * copy.
 *
 * @param string $path Path of item to delete.
 * @param bool $force If TRUE, the file will be deleted even if it has local modifications.
 * Otherwise, local modifications will result in a failure. Default is
 * FALSE
 * @throws SvnException
 *
 */
function svn_delete(string $path, bool $force = false): void
{
    error_clear_last();
    $safeResult = \svn_delete($path, $force);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Export the contents of either a working copy or repository into a
 * 'clean' directory.
 *
 * @param string $frompath The path to the current repository.
 * @param string $topath The path to the new repository.
 * @param bool $working_copy If TRUE, it will export uncommitted files from the working copy.
 * @param int $revision_no
 * @throws SvnException
 *
 */
function svn_export(string $frompath, string $topath, bool $working_copy = true, int $revision_no = -1): void
{
    error_clear_last();
    $safeResult = \svn_export($frompath, $topath, $working_copy, $revision_no);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Aborts a transaction.
 *
 * @param resource $txn
 * @throws SvnException
 *
 */
function svn_fs_abort_txn($txn): void
{
    error_clear_last();
    $safeResult = \svn_fs_abort_txn($txn);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Copies a file or a directory.
 *
 * @param resource $from_root
 * @param string $from_path
 * @param resource $to_root
 * @param string $to_path
 * @throws SvnException
 *
 */
function svn_fs_copy($from_root, string $from_path, $to_root, string $to_path): void
{
    error_clear_last();
    $safeResult = \svn_fs_copy($from_root, $from_path, $to_root, $to_path);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Deletes a file or a directory.
 *
 * @param resource $root
 * @param string $path
 * @throws SvnException
 *
 */
function svn_fs_delete($root, string $path): void
{
    error_clear_last();
    $safeResult = \svn_fs_delete($root, $path);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Creates a new empty directory.
 *
 * @param resource $root
 * @param string $path
 * @throws SvnException
 *
 */
function svn_fs_make_dir($root, string $path): void
{
    error_clear_last();
    $safeResult = \svn_fs_make_dir($root, $path);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Creates a new empty file.
 *
 * @param resource $root
 * @param string $path
 * @throws SvnException
 *
 */
function svn_fs_make_file($root, string $path): void
{
    error_clear_last();
    $safeResult = \svn_fs_make_file($root, $path);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Commits unversioned path into repository at
 * url. If path is a
 * directory and nonrecursive is FALSE,
 * the directory will be imported recursively.
 *
 * @param string $path Path of file or directory to import.
 * @param string $url Repository URL to import into.
 * @param bool $nonrecursive Whether or not to refrain from recursively processing directories.
 * @throws SvnException
 *
 */
function svn_import(string $path, string $url, bool $nonrecursive): void
{
    error_clear_last();
    $safeResult = \svn_import($path, $url, $nonrecursive);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Creates a directory in a working copy or repository.
 *
 * @param string $path The path to the working copy or repository.
 * @param string $log_message
 * @throws SvnException
 *
 */
function svn_mkdir(string $path, string $log_message = null): void
{
    error_clear_last();
    if ($log_message !== null) {
        $safeResult = \svn_mkdir($path, $log_message);
    } else {
        $safeResult = \svn_mkdir($path);
    }
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Revert any local changes to the path in a working copy.
 *
 * @param string $path The path to the working repository.
 * @param bool $recursive Optionally make recursive changes.
 * @throws SvnException
 *
 */
function svn_revert(string $path, bool $recursive = false): void
{
    error_clear_last();
    $safeResult = \svn_revert($path, $recursive);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
}


/**
 * Update working copy at path to revision
 * revno. If recurse is true,
 * directories will be recursively updated.
 *
 * @param string $path Path to local working copy.
 * @param int $revno Revision number to update to, default is SVN_REVISION_HEAD.
 * @param bool $recurse Whether or not to recursively update directories.
 * @return int Returns new revision number on success, returns FALSE on failure.
 * @throws SvnException
 *
 */
function svn_update(string $path, int $revno = SVN_REVISION_HEAD, bool $recurse = true): int
{
    error_clear_last();
    $safeResult = \svn_update($path, $revno, $recurse);
    if ($safeResult === false) {
        throw SvnException::createFromPhpError();
    }
    return $safeResult;
}
