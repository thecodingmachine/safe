<?php

namespace Safe;

/**
 * Terminates monitoring on a resource.
 * 
 * In addition an FAMAcknowledge event occurs.
 * 
 * @param resource $fam A resource representing a connection to the FAM service returned by
 * fam_open
 * @param resource $fam_monitor A resource returned by one of the fam_monitor_XXX
 * functions
 * @throws Exceptions\FamException
 * 
 */
function fam_cancel_monitor($fam, $fam_monitor): void
{
    error_clear_last();
    $result = \fam_cancel_monitor($fam, $fam_monitor);
    if ($result === FALSE) {
        throw Exceptions\FamException::createFromPhpError();
    }
}


/**
 * Requests monitoring for a collection of files within a directory.
 * 
 * A FAM event will be generated whenever the status of the files change.
 * The possible event codes are described in detail in the
 * constants part of this section.
 * 
 * @param resource $fam A resource representing a connection to the FAM service returned by
 * fam_open
 * @param string $dirname Directory path to the monitored files
 * @param int $depth The maximum search depth starting from this
 * directory
 * @param string $mask A shell pattern mask restricting the file names
 * to look for
 * @return resource Returns a monitoring resource s.
 * @throws Exceptions\FamException
 * 
 */
function fam_monitor_collection($fam, string $dirname, int $depth, string $mask)
{
    error_clear_last();
    $result = \fam_monitor_collection($fam, $dirname, $depth, $mask);
    if ($result === FALSE) {
        throw Exceptions\FamException::createFromPhpError();
    }
    return $result;
}


/**
 * Requests monitoring for a directory and all contained files.
 * 
 * A FAM event will be generated whenever the status of the directory (i.e.
 * the result of function stat on that directory) or its
 * content (i.e. the results of readdir) changes.
 * 
 * The possible event codes are described in detail in the
 * constants part of this section.
 * 
 * @param resource $fam A resource representing a connection to the FAM service returned by
 * fam_open
 * @param string $dirname Path to the monitored directory
 * @return resource Returns a monitoring resource s.
 * @throws Exceptions\FamException
 * 
 */
function fam_monitor_directory($fam, string $dirname)
{
    error_clear_last();
    $result = \fam_monitor_directory($fam, $dirname);
    if ($result === FALSE) {
        throw Exceptions\FamException::createFromPhpError();
    }
    return $result;
}


/**
 * Requests monitoring for a single file. A FAM event will be generated
 * whenever the file status changes (i.e. the result of function 
 * stat on that file).
 * 
 * The possible event codes are described in detail in the
 * constants part of this section.
 * 
 * @param resource $fam A resource representing a connection to the FAM service returned by
 * fam_open
 * @param string $filename Path to the monitored file
 * @return resource Returns a monitoring resource s.
 * @throws Exceptions\FamException
 * 
 */
function fam_monitor_file($fam, string $filename)
{
    error_clear_last();
    $result = \fam_monitor_file($fam, $filename);
    if ($result === FALSE) {
        throw Exceptions\FamException::createFromPhpError();
    }
    return $result;
}


/**
 * Opens a connection to the FAM service daemon.
 * 
 * @param string $appname A string identifying the application for logging reasons
 * @return resource Returns a resource representing a connection to the FAM service on success
 * s.
 * @throws Exceptions\FamException
 * 
 */
function fam_open(string $appname)
{
    error_clear_last();
    if ($appname !== null) {
        $result = \fam_open($appname);
    }else {
        $result = \fam_open();
    }
    if ($result === FALSE) {
        throw Exceptions\FamException::createFromPhpError();
    }
    return $result;
}


/**
 * Resumes monitoring of a resource previously suspended using
 * fam_suspend_monitor.
 * 
 * @param resource $fam A resource representing a connection to the FAM service returned by
 * fam_open
 * @param resource $fam_monitor A resource returned by one of the fam_monitor_XXX
 * functions
 * @throws Exceptions\FamException
 * 
 */
function fam_resume_monitor($fam, $fam_monitor): void
{
    error_clear_last();
    $result = \fam_resume_monitor($fam, $fam_monitor);
    if ($result === FALSE) {
        throw Exceptions\FamException::createFromPhpError();
    }
}


/**
 * fam_suspend_monitor temporarily suspend monitoring
 * of a resource.
 * 
 * Monitoring can later be continued using fam_resume_monitor
 * without the need of requesting a complete new monitor.
 * 
 * @param resource $fam A resource representing a connection to the FAM service returned by
 * fam_open
 * @param resource $fam_monitor A resource returned by one of the fam_monitor_XXX
 * functions
 * @throws Exceptions\FamException
 * 
 */
function fam_suspend_monitor($fam, $fam_monitor): void
{
    error_clear_last();
    $result = \fam_suspend_monitor($fam, $fam_monitor);
    if ($result === FALSE) {
        throw Exceptions\FamException::createFromPhpError();
    }
}


