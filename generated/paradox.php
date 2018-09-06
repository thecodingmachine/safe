<?php

namespace Safe;

/**
 * Closes the paradox database. This function will not close the file. You will
 * have to call fclose afterwards.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_close($pxdoc): void
{
    error_clear_last();
    $result = \px_close($pxdoc);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Create a new paradox database file. The actual file has to be opened before
 * with fopen. Make sure the file is writable.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param resource $file File handle as returned by fopen.
 * @param array $fielddesc fielddesc is an array containing one element for each
 * field specification. A field specification is an array itself with
 * either two or three elements.The first element is always a string value
 * used as the name of the field. It may not be larger than ten
 * characters. The second element contains the field type which is one of
 * the constants listed in the table Constants for field types.
 * In the case of a character field or bcd field, you will have to provide
 * a third element specifying the length respectively the precesion of the
 * field. If your field specification contains blob fields, you will have
 * to make sure to either make the field large enough for all field values
 * to fit or specify a blob file with
 * px_set_blob_file for storing the blobs. If this is
 * not done the field data is truncated.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_create_fp($pxdoc, $file, array $fielddesc): void
{
    error_clear_last();
    $result = \px_create_fp($pxdoc, $file, $fielddesc);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Turns a date as it stored in the paradox file into human readable
 * format. Paradox dates are the number of days since 1.1.0000.
 * This function is just for convenience. It can be easily replaced by some
 * math and the calendar functions as demonstrated in the example below.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param int $value Value as stored in paradox database field of type
 * PX_FIELD_DATE.
 * @param string $format String format similar to the format used by date.
 * The placeholders support by this function is a subset of those
 * supported by date (Y, y, m, n, d, j, L).
 * @return string Returns TRUE on success .
 * @throws Exceptions\ParadoxException
 * 
 */
function px_date2string($pxdoc, int $value, string $format): string
{
    error_clear_last();
    $result = \px_date2string($pxdoc, $value, $format);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
    return $result;
}


/**
 * This function deletes a record from the database. It does not free
 * the space in the database file but just marks it as deleted. Inserting
 * a new record afterwards will reuse the space.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param int $num The record number is an artificial number counting records in the order
 * as they are stored in the database. The first record has number 0.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_delete_record($pxdoc, int $num): void
{
    error_clear_last();
    $result = \px_delete_record($pxdoc, $num);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Deletes the resource of the paradox file and frees all memory.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_delete($pxdoc): void
{
    error_clear_last();
    $result = \px_delete($pxdoc);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Gets various parameters.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param string $name The name can be one of the following:
 * 
 * The name of the table as it will be stored in the database header.
 * 
 * The encoding for the output. Data which is being read from character
 * fields with px_get_record or
 * px_retrieve_record is recoded into the
 * targetencoding. If it is not set, then the data
 * will be delivered as stored in the database file.
 * 
 * The encoding of the input data which is to be stored into the database.
 * When storing data of character fields in the database, the data is
 * expected to be delivered in this encoding.
 * @return string Returns the value of the parameter .
 * @throws Exceptions\ParadoxException
 * 
 */
function px_get_parameter($pxdoc, string $name): string
{
    error_clear_last();
    $result = \px_get_parameter($pxdoc, $name);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets various values.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param string $name name can be one of the following.
 * 
 * 
 * numprimkeys
 * 
 * 
 * The number of primary keys. Paradox databases always use the
 * first numprimkeys fields for the primary
 * index.
 * 
 * 
 * 
 * 
 * 
 * The number of primary keys. Paradox databases always use the
 * first numprimkeys fields for the primary
 * index.
 * @return float Returns the value of the parameter .
 * @throws Exceptions\ParadoxException
 * 
 */
function px_get_value($pxdoc, string $name): float
{
    error_clear_last();
    $result = \px_get_value($pxdoc, $name);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
    return $result;
}


/**
 * Open an existing paradox database file. The actual file has to be opened
 * before with fopen. This function can also be used to
 * open primary index files and tread them like a paradox database. This is
 * supported for those who would like to investigate a primary index. It
 * cannot be used to accelerate access to a database file.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param resource $file file is the return value from
 * fopen with the actual database file as parameter.
 * Make sure the database is writable if you plan to update or insert
 * records.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_open_fp($pxdoc, $file): void
{
    error_clear_last();
    $result = \px_open_fp($pxdoc, $file);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Stores a record into a paradox database. The record is always added at
 * the end of the database, regardless of any free slots. Use
 * px_insert_record to add a new record into the first
 * free slot found in the database.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param array $record Associated or indexed array containing the field values as e.g.
 * returned by px_retrieve_record.
 * @param int $recpos This optional parameter may be used to specify a record number
 * greater than the current number of records in the database. The
 * function will add as many empty records as needed. There is hardly
 * any need for this parameter.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_put_record($pxdoc, array $record, int $recpos = -1): void
{
    error_clear_last();
    $result = \px_put_record($pxdoc, $record, $recpos);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Sets the name of the file where blobs are going to be read from or written
 * into. Without
 * calling this function, px_get_record or
 * px_retrieve_record  will only return
 * data in blob fields if the data is part of the record and not stored in the
 * blob file. Blob data is stored in the record if it is small enough to fit
 * in the size of the blob field.
 * 
 * Calling px_put_record,
 * px_insert_record, or
 * px_update_record without calling
 * px_set_blob_file will result in truncated blob fields
 * unless the data fits into the database file.
 * 
 * Calling this function twice will close the first blob file and open the new
 * one.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param string $filename The name of the file. Its extension should be .MB.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_set_blob_file($pxdoc, string $filename): void
{
    error_clear_last();
    $result = \px_set_blob_file($pxdoc, $filename);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Sets various parameters.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param string $name Depending on the parameter you want to set, name
 * can be one of the following.
 * 
 * The name of the table as it will be stored in the database header.
 * 
 * The encoding for the output. Data which is being read from
 * character fields is recoded into the targetencoding.
 * 
 * The encoding of the input data which is to be stored into the
 * database.
 * @param string $value The name of the table as it will be stored in the database header.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_set_parameter($pxdoc, string $name, string $value): void
{
    error_clear_last();
    $result = \px_set_parameter($pxdoc, $name, $value);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Sets the table name of a paradox database, which was created with
 * px_create_fp. This function is deprecated use
 * px_set_parameter instead.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param string $name The name of the table. If it is not set explicitly it will be set
 * to the name of the database file.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_set_tablename($pxdoc, string $name): void
{
    error_clear_last();
    $result = \px_set_tablename($pxdoc, $name);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Sets various values.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param string $name name can be one of the following.
 * 
 * The number of primary keys. Paradox databases always use the first
 * numprimkeys fields for the primary index.
 * @param float $value The number of primary keys. Paradox databases always use the first
 * numprimkeys fields for the primary index.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_set_value($pxdoc, string $name, float $value): void
{
    error_clear_last();
    $result = \px_set_value($pxdoc, $name, $value);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


/**
 * Turns a timestamp as it stored in the paradox file into human readable
 * format. Paradox timestamps are the number of miliseconds since 0001-01-02.
 * This function is just for convenience. It can be easily replaced by some
 * math and the calendar functions as demonstrated in the following example.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database.
 * @param float $value Value as stored in paradox database field of type
 * PX_FIELD_TIME, or PX_FIELD_TIMESTAMP.
 * @param string $format String format similar to the format used by date.
 * The placeholders support by this function is a subset of those
 * supported by date (Y, y, m, n, d, j, H, h, G, g,
 * i, s, A, a, L).
 * @return string Returns TRUE on success .
 * @throws Exceptions\ParadoxException
 * 
 */
function px_timestamp2string($pxdoc, float $value, string $format): string
{
    error_clear_last();
    $result = \px_timestamp2string($pxdoc, $value, $format);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
    return $result;
}


/**
 * Updates an exiting record in the database. The record starts at 0.
 * 
 * The record data is passed as an array of field values. The elements in
 * the array must correspond to the fields in the database. If the array
 * has less elements than fields in the database, the remaining fields
 * will be set to null.
 * 
 * @param resource $pxdoc Resource identifier of the paradox database
 * as returned by px_new.
 * @param array $data Associated array containing the field values as returned by
 * px_retrieve_record.
 * @param int $num The record number is an artificial number counting records in the order
 * as they are stored in the database. The first record has number 0.
 * @throws Exceptions\ParadoxException
 * 
 */
function px_update_record($pxdoc, array $data, int $num): void
{
    error_clear_last();
    $result = \px_update_record($pxdoc, $data, $num);
    if ($result === FALSE) {
        throw Exceptions\ParadoxException::createFromPhpError();
    }
}


