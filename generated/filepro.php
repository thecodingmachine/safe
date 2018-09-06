<?php

namespace Safe;

/**
 * Returns the number of fields (columns) in the opened filePro
 * database.
 * 
 * @return int Returns the number of fields in the opened filePro database, s.
 * @throws Exceptions\FileproException
 * 
 */
function filepro_fieldcount(): int
{
    error_clear_last();
    $result = \filepro_fieldcount();
    if ($result === FALSE) {
        throw Exceptions\FileproException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the name of the field corresponding to 
 * field_number.
 * 
 * @param int $field_number The field number.
 * @return string Returns the name of the field as a string, s.
 * @throws Exceptions\FileproException
 * 
 */
function filepro_fieldname(int $field_number): string
{
    error_clear_last();
    $result = \filepro_fieldname($field_number);
    if ($result === FALSE) {
        throw Exceptions\FileproException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the edit type of the field corresponding to field_number.
 * 
 * @param int $field_number The field number.
 * @return string Returns the edit type of the field as a string, s.
 * @throws Exceptions\FileproException
 * 
 */
function filepro_fieldtype(int $field_number): string
{
    error_clear_last();
    $result = \filepro_fieldtype($field_number);
    if ($result === FALSE) {
        throw Exceptions\FileproException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the width of the field corresponding to field_number.
 * 
 * @param int $field_number The field number.
 * @return int Returns the width of the field as a integer, s.
 * @throws Exceptions\FileproException
 * 
 */
function filepro_fieldwidth(int $field_number): int
{
    error_clear_last();
    $result = \filepro_fieldwidth($field_number);
    if ($result === FALSE) {
        throw Exceptions\FileproException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the data from the specified location in the database.
 * 
 * @param int $row_number The row number. Must be between zero and the total number of rows
 * minus one (0..filepro_rowcount - 1)
 * @param int $field_number The field number. Accepts values between zero and the total number of
 * fields minus one (0..filepro_fieldcount - 1)
 * @return string Returns the specified data, s.
 * @throws Exceptions\FileproException
 * 
 */
function filepro_retrieve(int $row_number, int $field_number): string
{
    error_clear_last();
    $result = \filepro_retrieve($row_number, $field_number);
    if ($result === FALSE) {
        throw Exceptions\FileproException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the number of rows in the opened filePro database.
 * 
 * @return int Returns the number of rows in the opened filePro database, s.
 * @throws Exceptions\FileproException
 * 
 */
function filepro_rowcount(): int
{
    error_clear_last();
    $result = \filepro_rowcount();
    if ($result === FALSE) {
        throw Exceptions\FileproException::createFromPhpError();
    }
    return $result;
}


/**
 * This reads and verifies the map file, storing the field count
 * and info.
 * 
 * No locking is done, so you should avoid modifying your filePro
 * database while it may be opened in PHP.
 * 
 * @param string $directory The map directory.
 * @throws Exceptions\FileproException
 * 
 */
function filepro(string $directory): void
{
    error_clear_last();
    $result = \filepro($directory);
    if ($result === FALSE) {
        throw Exceptions\FileproException::createFromPhpError();
    }
}


