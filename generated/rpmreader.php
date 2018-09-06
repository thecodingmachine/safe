<?php

namespace Safe;

/**
 * rpm_close will close an RPM file pointer.
 * 
 * @param resource $rpmr A file pointer resource successfully opened by
 * rpm_open.
 * @throws Exceptions\RpmreaderException
 * 
 */
function rpm_close($rpmr): void
{
    error_clear_last();
    $result = \rpm_close($rpmr);
    if ($result === FALSE) {
        throw Exceptions\RpmreaderException::createFromPhpError();
    }
}


/**
 * rpm_is_valid will test an RPM file for
 * validity as an RPM file.  This is not the same as
 * rpm_open as it only checks the file for
 * validity but does not return a file pointer to be used by further
 * functions.
 * 
 * @param string $filename The filename of the RPM file you wish to check for validity.
 * @throws Exceptions\RpmreaderException
 * 
 */
function rpm_is_valid(string $filename): void
{
    error_clear_last();
    $result = \rpm_is_valid($filename);
    if ($result === FALSE) {
        throw Exceptions\RpmreaderException::createFromPhpError();
    }
}


