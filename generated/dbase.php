<?php

namespace Safe;

use Safe\Exceptions\DbaseException;

/**
 * Adds the given data to the database.
 *
 * @param resource $database The database resource, returned by dbase_open
 * or dbase_create.
 * @param array $data An indexed array of data. The number of items must be equal to the number of
 * fields in the database, otherwise dbase_add_record
 * will fail.
 *
 * If you're using dbase_get_record return value for this
 * parameter, remember to reset the key named deleted.
 * @throws DbaseException
 *
 */
function dbase_add_record($database, array $data): void
{
    error_clear_last();
    $safeResult = \dbase_add_record($database, $data);
    if ($safeResult === false) {
        throw DbaseException::createFromPhpError();
    }
}


/**
 * Closes the given database resource.
 *
 * @param resource $database The database resource, returned by dbase_open
 * or dbase_create.
 * @throws DbaseException
 *
 */
function dbase_close($database): void
{
    error_clear_last();
    $safeResult = \dbase_close($database);
    if ($safeResult === false) {
        throw DbaseException::createFromPhpError();
    }
}


/**
 * dbase_create creates a dBase database with the given
 * definition.
 * If the file already exists, it is not truncated.
 * dbase_pack can be called to force truncation.
 *
 * @param string $path The path of the database. It can be a relative or absolute path to
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
 * @return resource Returns a database resource if the database is successfully created.
 * @throws DbaseException
 *
 */
function dbase_create(string $path, array $fields, int $type = DBASE_TYPE_DBASE)
{
    error_clear_last();
    $safeResult = \dbase_create($path, $fields, $type);
    if ($safeResult === false) {
        throw DbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Marks the given record to be deleted from the database.
 *
 * @param resource $database The database resource, returned by dbase_open
 * or dbase_create.
 * @param int $number An integer which spans from 1 to the number of records in the database
 * (as returned by dbase_numrecords).
 * @throws DbaseException
 *
 */
function dbase_delete_record($database, int $number): void
{
    error_clear_last();
    $safeResult = \dbase_delete_record($database, $number);
    if ($safeResult === false) {
        throw DbaseException::createFromPhpError();
    }
}


/**
 * dbase_open opens a dBase database with the given
 * access mode.
 *
 * @param string $path The path of the database. It can be a relative or absolute path to
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
 * @return resource Returns a database resource on success.
 * @throws DbaseException
 *
 */
function dbase_open(string $path, int $mode)
{
    error_clear_last();
    $safeResult = \dbase_open($path, $mode);
    if ($safeResult === false) {
        throw DbaseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Packs the specified database by permanently deleting all records marked
 * for deletion using dbase_delete_record.
 * Note that the file will be truncated after successful packing (contrary to
 * dBASE III's PACK command).
 *
 * @param resource $database The database resource, returned by dbase_open
 * or dbase_create.
 * @throws DbaseException
 *
 */
function dbase_pack($database): void
{
    error_clear_last();
    $safeResult = \dbase_pack($database);
    if ($safeResult === false) {
        throw DbaseException::createFromPhpError();
    }
}


/**
 * Replaces the given record in the database with the given data.
 *
 * @param resource $database The database resource, returned by dbase_open
 * or dbase_create.
 * @param array $data An indexed array of data. The number of items must be equal to the
 * number of fields in the database, otherwise
 * dbase_replace_record will fail.
 *
 * If you're using dbase_get_record return value for this
 * parameter, remember to reset the key named deleted.
 * @param int $number An integer which spans from 1 to the number of records in the database
 * (as returned by dbase_numrecords).
 * @throws DbaseException
 *
 */
function dbase_replace_record($database, array $data, int $number): void
{
    error_clear_last();
    $safeResult = \dbase_replace_record($database, $data, $number);
    if ($safeResult === false) {
        throw DbaseException::createFromPhpError();
    }
}
