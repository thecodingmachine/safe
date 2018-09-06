<?php

namespace Safe;

/**
 * Adds the given data to the database.
 * 
 * @param int $dbase_identifier The database link identifier, returned by dbase_open
 * or dbase_create.
 * @param array $record An indexed array of data. The number of items must be equal to the number of 
 * fields in the database, otherwise dbase_add_record
 * will fail.
 * 
 * If you're using dbase_get_record return value for this
 * parameter, remember to reset the key named deleted.
 * @throws Exceptions\DbaseException
 * 
 */
function dbase_add_record($dbase_identifier, array $record): void
{
    error_clear_last();
    $result = \dbase_add_record($dbase_identifier, $record);
    if ($result === FALSE) {
        throw Exceptions\DbaseException::createFromPhpError();
    }
}


/**
 * Closes the given database link identifier.
 * 
 * @param int $dbase_identifier The database link identifier, returned by dbase_open
 * or dbase_create.
 * @throws Exceptions\DbaseException
 * 
 */
function dbase_close($dbase_identifier): void
{
    error_clear_last();
    $result = \dbase_close($dbase_identifier);
    if ($result === FALSE) {
        throw Exceptions\DbaseException::createFromPhpError();
    }
}


/**
 * dbase_create creates a dBase database with the given
 * definition.
 * If the file already exists, it is not truncated.
 * dbase_pack can be called to force truncation.
 * 
 * @param string $filename The name of the database. It can be a relative or absolute path to
 * the file where dBase will store your data.
 * @param array $fields An array of arrays, each array describing the format of one field of the
 * database. Each field consists of a name, a character indicating the field
 * type, and optionally, a length, a precision and a nullable flag.
 * The supported field types are listed in the introduction section.
 * 
 * The fieldnames are limited in length and must not exceed 10 chars.
 * @param int $type The type of database to be created. Either
 * DBASE_TYPE_DBASE or
 * DBASE_TYPE_FOXPRO.
 * @return int Returns a database link identifier if the database is successfully created,
 * .
 * @throws Exceptions\DbaseException
 * 
 */
function dbase_create(string $filename, array $fields, int $type = DBASE_TYPE_DBASE)
{
    error_clear_last();
    $result = \dbase_create($filename, $fields, $type);
    if ($result === FALSE) {
        throw Exceptions\DbaseException::createFromPhpError();
    }
    return $result;
}


/**
 * Marks the given record to be deleted from the database.
 * 
 * @param int $dbase_identifier The database link identifier, returned by dbase_open
 * or dbase_create.
 * @param int $record_number An integer which spans from 1 to the number of records in the database
 * (as returned by dbase_numrecords).
 * @throws Exceptions\DbaseException
 * 
 */
function dbase_delete_record($dbase_identifier, int $record_number): void
{
    error_clear_last();
    $result = \dbase_delete_record($dbase_identifier, $record_number);
    if ($result === FALSE) {
        throw Exceptions\DbaseException::createFromPhpError();
    }
}


/**
 * dbase_open opens a dBase database with the given
 * access mode.
 * 
 * @param string $filename The name of the database. It can be a relative or absolute path to
 * the file where dBase will store your data.
 * @param int $mode An integer which correspond to those for the open() 
 * system call (Typically 0 means read-only, 1 means write-only, and 2 
 * means read and write).
 * 
 * You can't open a dBase file in write-only mode as the function will
 * fail to read the headers information and thus you can't use 1 as
 * mode.
 * 
 * As of dbase 7.0.0 you can use DBASE_RDONLY
 * and DBASE_RDWR, respectively, to specify the
 * mode.
 * @return int Returns a database link identifier if the database is successfully opened,
 * .
 * @throws Exceptions\DbaseException
 * 
 */
function dbase_open(string $filename, int $mode)
{
    error_clear_last();
    $result = \dbase_open($filename, $mode);
    if ($result === FALSE) {
        throw Exceptions\DbaseException::createFromPhpError();
    }
    return $result;
}


/**
 * Packs the specified database by permanently deleting all records marked
 * for deletion using dbase_delete_record.
 * Note that the file will be truncated after successful packing (contrary to
 * dBASE III's PACK command).
 * 
 * @param int $dbase_identifier The database link identifier, returned by dbase_open
 * or dbase_create.
 * @throws Exceptions\DbaseException
 * 
 */
function dbase_pack($dbase_identifier): void
{
    error_clear_last();
    $result = \dbase_pack($dbase_identifier);
    if ($result === FALSE) {
        throw Exceptions\DbaseException::createFromPhpError();
    }
}


/**
 * Replaces the given record in the database with the given data.
 * 
 * @param int $dbase_identifier The database link identifier, returned by dbase_open
 * or dbase_create.
 * @param array $record An indexed array of data. The number of items must be equal to the
 * number of fields in the database, otherwise
 * dbase_replace_record will fail.
 * 
 * If you're using dbase_get_record return value for this
 * parameter, remember to reset the key named deleted.
 * @param int $record_number An integer which spans from 1 to the number of records in the database
 * (as returned by dbase_numrecords).
 * @throws Exceptions\DbaseException
 * 
 */
function dbase_replace_record($dbase_identifier, array $record, int $record_number): void
{
    error_clear_last();
    $result = \dbase_replace_record($dbase_identifier, $record, $record_number);
    if ($result === FALSE) {
        throw Exceptions\DbaseException::createFromPhpError();
    }
}


