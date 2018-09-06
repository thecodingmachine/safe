<?php

namespace Safe;

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
 * @throws Exceptions\SvnException
 * 
 */
function svn_add(string $path, bool $recursive = true, bool $force = false): void
{
    error_clear_last();
    $result = \svn_add($path, $recursive, $force);
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
    }
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
 * @throws Exceptions\SvnException
 * 
 */
function svn_checkout(string $repos, string $targetpath, int $revision, int $flags = 0): void
{
    error_clear_last();
    if ($flags !== 0) {
        $result = \svn_checkout($repos, $targetpath, $revision, $flags);
    } elseif ($revision !== null) {
        $result = \svn_checkout($repos, $targetpath, $revision);
    }else {
        $result = \svn_checkout($repos, $targetpath);
    }
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
    }
}


/**
 * Recursively cleanup working copy directory workingdir,
 * finishing any incomplete operations and removing working copy locks. Use
 * when a working copy is in limbo and needs to be usable again.
 * 
 * @param string $workingdir String path to local working directory to cleanup
 * @throws Exceptions\SvnException
 * 
 */
function svn_cleanup(string $workingdir): void
{
    error_clear_last();
    $result = \svn_cleanup($workingdir);
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
    }
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
 * @throws Exceptions\SvnException
 * 
 */
function svn_delete(string $path, bool $force = false): void
{
    error_clear_last();
    $result = \svn_delete($path, $force);
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
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
 * @throws Exceptions\SvnException
 * 
 */
function svn_export(string $frompath, string $topath, bool $working_copy = true, int $revision_no = -1): void
{
    error_clear_last();
    $result = \svn_export($frompath, $topath, $working_copy, $revision_no);
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
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
 * @throws Exceptions\SvnException
 * 
 */
function svn_import(string $path, string $url, bool $nonrecursive): void
{
    error_clear_last();
    $result = \svn_import($path, $url, $nonrecursive);
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
    }
}


/**
 * Creates a directory in a working copy or repository.
 * 
 * @param string $path The path to the working copy or repository.
 * @param string $log_message 
 * @throws Exceptions\SvnException
 * 
 */
function svn_mkdir(string $path, string $log_message): void
{
    error_clear_last();
    if ($log_message !== null) {
        $result = \svn_mkdir($path, $log_message);
    }else {
        $result = \svn_mkdir($path);
    }
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
    }
}


/**
 * Revert any local changes to the path in a working copy.
 * 
 * @param string $path The path to the working repository.
 * @param bool $recursive Optionally make recursive changes.
 * @throws Exceptions\SvnException
 * 
 */
function svn_revert(string $path, bool $recursive = false): void
{
    error_clear_last();
    $result = \svn_revert($path, $recursive);
    if ($result === FALSE) {
        throw Exceptions\SvnException::createFromPhpError();
    }
}


