<?php

namespace Safe;

/**
 * sqlite_popen will first check to see if a persistent
 * handle has already been opened for the given
 * filename.  If it finds one, it returns that handle
 * to your script, otherwise it opens a fresh handle to the database.
 * 
 * The benefit of this approach is that you don't incur the performance
 * cost of re-reading the database and index schema on each page hit served
 * by persistent web server SAPI's (any SAPI except for regular CGI or CLI).
 * 
 * @param string $filename The filename of the SQLite database.  If the file does not exist, SQLite
 * will attempt to create it.  PHP must have write permissions to the file
 * if data is inserted, the database schema is modified or to create the
 * database if it does not exist.
 * @param int $mode The mode of the file. Intended to be used to open the database in
 * read-only mode.  Presently, this parameter is ignored by the sqlite
 * library.  The default value for mode is the octal value
 * 0666 and this is the recommended value.
 * @param string $error_message Passed by reference and is set to hold a descriptive error message
 * explaining why the database could not be opened if there was an error.
 * @return resource Returns a resource (database handle) on success, FALSE on error.
 * @throws Exceptions\SqliteException
 * 
 */
function sqlite_popen(string $filename, int $mode = 0666, string &$error_message = null)
{
    error_clear_last();
    if ($error_message !== null) {
        $result = \sqlite_popen($filename, $mode, $error_message);
    }else {
        $result = \sqlite_popen($filename, $mode);
    }
    if ($result === FALSE) {
        throw Exceptions\SqliteException::createFromPhpError();
    }
    return $result;
}


