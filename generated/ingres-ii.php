<?php

namespace Safe;

/**
 * ingres_autocommit is called before opening a
 * transaction (before the first call to
 * ingres_query or just after a call to
 * ingres_rollback or
 * ingres_commit) to switch the
 * autocommit mode of the server on or off (when the script begins
 * the autocommit mode is off).
 * 
 * When autocommit mode is on, every query is automatically
 * committed by the server, as if ingres_commit
 * was called after every call to ingres_query.
 * To see if autocommit is enabled use, 
 * ingres_autocommit_state.
 * 
 * By default Ingres will rollback any uncommitted transactions at the end of
 * a request. Use this function or ingres_commit to
 * ensure your data is committed to the database.
 * 
 * @param resource $link The connection link identifier
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_autocommit($link): void
{
    error_clear_last();
    $result = \ingres_autocommit($link);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


/**
 * ingres_close closes the connection to
 * the Ingres server that is associated with the specified link.
 * 
 * ingres_close is usually unnecessary, as it
 * will not close persistent connections and all non-persistent connections
 * are automatically closed at the end of the script.
 * 
 * @param resource $link The connection link identifier
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_close($link): void
{
    error_clear_last();
    $result = \ingres_close($link);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


/**
 * ingres_commit commits the currently open
 * transaction, making all changes made to the database permanent.
 * 
 * This closes the transaction. A new transaction can be opened by sending a
 * query with ingres_query.
 * 
 * You can also have the server commit automatically after every
 * query by calling ingres_autocommit before
 * opening the transaction.
 * 
 * By default Ingres will roll back any uncommitted transactions at the end of
 * a request. Use this function or ingres_autocommit to
 * ensure your that data is committed to the database.
 * 
 * @param resource $link The connection link identifier
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_commit($link): void
{
    error_clear_last();
    $result = \ingres_commit($link);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


/**
 * Execute a query prepared using ingres_prepare.
 * 
 * @param resource $result The result query identifier
 * @param array $params An array of parameter values to be used with the query
 * @param string $types A string containing a sequence of types for the parameter values
 * passed. See the types parameter in
 * ingres_query for the list of type codes.
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_execute($result, array $params = null, string $types = null): void
{
    error_clear_last();
    if ($types !== null) {
        $result = \ingres_execute($result, $params, $types);
    } elseif ($params !== null) {
        $result = \ingres_execute($result, $params);
    }else {
        $result = \ingres_execute($result);
    }
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


/**
 * ingres_field_name returns the name of a field
 * in a query result.
 * 
 * @param resource $result The query result identifier
 * @param int $index index is the field whose name will be
 * retrieved.
 * 
 * The possible values of index depend upon
 * the value
 * of ingres.array_index_start.
 * If ingres.array_index_start
 * is 1 (the default)
 * then index must be
 * between 1 and the value returned
 * by ingres_num_fields. If ingres.array_index_start
 * is 0 then index must
 * be between 0
 * and ingres_num_fields -
 * 1.
 * @return string Returns the name of a field
 * in a query result 
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_field_name($result, int $index): string
{
    error_clear_last();
    $result = \ingres_field_name($result, $index);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
    return $result;
}


/**
 * Get the type of a field in a query result.
 * 
 * @param resource $result The query result identifier
 * @param int $index index is the field whose type will be
 * retrieved.
 * 
 * The possible values of index depend upon
 * the value
 * of ingres.array_index_start.
 * If ingres.array_index_start
 * is 1 (the default)
 * then index must be
 * between 1 and the value returned
 * by ingres_num_fields. If ingres.array_index_start
 * is 0 then index must
 * be between 0
 * and ingres_num_fields -
 * 1.
 * @return string ingres_field_type returns the type of a
 * field in a query result .  Examples of
 * types returned are IIAPI_BYTE_TYPE,
 * IIAPI_CHA_TYPE, IIAPI_DTE_TYPE,
 * IIAPI_FLT_TYPE, IIAPI_INT_TYPE,
 * IIAPI_VCH_TYPE. Some of these types can map to more
 * than one SQL type depending on the length of the field (see
 * ingres_field_length). For example
 * IIAPI_FLT_TYPE can be a float4 or a float8. For detailed
 * information, see the Ingres OpenAPI User Guide, Appendix 
 * "Data Types" in the Ingres documentation.
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_field_type($result, int $index): string
{
    error_clear_last();
    $result = \ingres_field_type($result, $index);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param resource $result The query result identifier
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_free_result($result): void
{
    error_clear_last();
    $result = \ingres_free_result($result);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


/**
 * This function is used to position the cursor associated with the result
 * resource before issuing a fetch.  If ingres.array_index_start
 * is set to 0 then the first row is 0 else it is 1.
 * ingres_result_seek can be used only with queries that
 * make use of scrollable
 * cursors. It cannot be used with
 * ingres_unbuffered_query.
 * 
 * @param resource $result The result identifier for a query
 * @param int $position The row to position the cursor on. If ingres.array_index_start
 * is set to 0, then the first row is 0, else it is 1
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_result_seek($result, int $position): void
{
    error_clear_last();
    $result = \ingres_result_seek($result, $position);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


/**
 * ingres_rollback rolls back the currently
 * open transaction, actually cancelling all changes made to the
 * database during the transaction.
 * 
 * This closes the transaction. A new transaction can be opened by sending a
 * query with ingres_query.
 * 
 * @param resource $link The connection link identifier
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_rollback($link): void
{
    error_clear_last();
    $result = \ingres_rollback($link);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


/**
 * ingres_set_environment is called to set environmental
 * options that affect the output of certain values from Ingres, such as the
 * timezone, date format, decimal character separator, and float precision.
 * 
 * @param resource $link The connection link identifier
 * @param array $options An enumerated array of option name/value pairs. The following table
 * lists the option name and the expected type
 * 
 * 
 * 
 * 
 * 
 * Option name
 * Option type
 * Description
 * Example
 * 
 * 
 * 
 * 
 * date_century_boundary
 * integer
 * The threshold by which a 2-digit year is determined to be in
 * the current century or in the next century. Equivalent to II_DATE_CENTURY_BOUNDARY
 * 50
 * 
 * 
 * timezone
 * string
 * Controls the timezone of the session. If not set, it will
 * default the value defined by II_TIMEZONE_NAME. If
 * II_TIMEZONE_NAME is not defined, NA-PACIFIC (GMT-8 with Daylight
 * Savings) is used.
 * UNITED-KINGDOM
 * 
 * 
 * date_format
 * integer
 * Sets the allowable input and output format for Ingres dates.
 * Defaults to the value defined by II_DATE_FORMAT. If II_DATE_FORMAT is
 * not set, the default date format is US, for example mm/dd/yy. Valid values
 * for date_format are:
 * 
 * INGRES_DATE_DMY
 * INGRES_DATE_FINISH
 * INGRES_DATE_GERMAN
 * INGRES_DATE_ISO
 * INGRES_DATE_ISO4
 * INGRES_DATE_MDY
 * INGRES_DATE_MULTINATIONAL
 * INGRES_DATE_MULTINATIONAL4
 * INGRES_DATE_YMD
 * INGRES_DATE_US
 * 
 * 
 * 
 * INGRES_DATE_ISO4
 * 
 * 
 * decimal_separator
 * string
 * The character identifier for decimal data
 * ","
 * 
 * 
 * money_lort
 * integer
 * Leading or trailing currency sign. Valid values for money_lort
 * are:
 * 
 * INGRES_MONEY_LEADING
 * INGRES_MONEY_TRAILING
 * 
 * 
 * 
 * INGRES_MONEY_LEADING
 * 
 * 
 * money_sign
 * string
 * The currency symbol to be used with the MONEY datatype
 * €
 * 
 * 
 * money_precision
 * integer
 * The precision of the MONEY datatype
 * 2
 * 
 * 
 * float4_precision
 * integer
 * Precision of the FLOAT4 datatype
 * 10
 * 
 * 
 * float8_precision
 * integer
 * Precision of the FLOAT8 data
 * 10
 * 
 * 
 * blob_segment_length
 * integer
 * The amount of data in bytes to fetch at a time when retrieving
 * BLOB or CLOB data. Defaults to 4096 bytes when not set explicitly
 * 8192
 * 
 * 
 * 
 * 
 * 
 * Sets the allowable input and output format for Ingres dates.
 * Defaults to the value defined by II_DATE_FORMAT. If II_DATE_FORMAT is
 * not set, the default date format is US, for example mm/dd/yy. Valid values
 * for date_format are:
 * 
 * INGRES_DATE_DMY
 * INGRES_DATE_FINISH
 * INGRES_DATE_GERMAN
 * INGRES_DATE_ISO
 * INGRES_DATE_ISO4
 * INGRES_DATE_MDY
 * INGRES_DATE_MULTINATIONAL
 * INGRES_DATE_MULTINATIONAL4
 * INGRES_DATE_YMD
 * INGRES_DATE_US
 * 
 * 
 * Leading or trailing currency sign. Valid values for money_lort
 * are:
 * 
 * INGRES_MONEY_LEADING
 * INGRES_MONEY_TRAILING
 * 
 * @throws Exceptions\Ingres-iiException
 * 
 */
function ingres_set_environment($link, array $options): void
{
    error_clear_last();
    $result = \ingres_set_environment($link, $options);
    if ($result === FALSE) {
        throw Exceptions\Ingres-iiException::createFromPhpError();
    }
}


