<?php

namespace Safe;

use Safe\Exceptions\FdfException;

/**
 * Adds a script to the FDF, which Acrobat then adds to the doc-level scripts
 * of a document, once the FDF is imported into it.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $script_name The script name.
 * @param string $script_code The script code. It is strongly suggested to use \r
 * for linebreaks within the script code.
 * @throws FdfException
 *
 */
function fdf_add_doc_javascript($fdf_document, string $script_name, string $script_code): void
{
    error_clear_last();
    $safeResult = \fdf_add_doc_javascript($fdf_document, $script_name, $script_code);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Creates a new FDF document.
 *
 * This function is needed if one would like to populate input fields in a
 * PDF document with data.
 *
 * @return resource Returns a FDF document handle.
 * @throws FdfException
 *
 */
function fdf_create()
{
    error_clear_last();
    $safeResult = \fdf_create();
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the appearance of a field (i.e. the value of
 * the /AP key) and stores it in a file.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $field
 * @param int $face The possible values are FDFNormalAP,
 * FDFRolloverAP and FDFDownAP.
 * @param string $filename The appearance will be stored in this parameter.
 * @throws FdfException
 *
 */
function fdf_get_ap($fdf_document, string $field, int $face, string $filename): void
{
    error_clear_last();
    $safeResult = \fdf_get_ap($fdf_document, $field, $face, $filename);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Reads form data from a string.
 *
 * You can use fdf_open_string together with
 * $HTTP_FDF_DATA to process FDF form input from a remote
 * client.
 *
 * @param string $fdf_data The data as returned from a PDF form or created using
 * fdf_create and
 * fdf_save_string.
 * @return resource Returns a FDF document handle.
 * @throws FdfException
 *
 */
function fdf_open_string(string $fdf_data)
{
    error_clear_last();
    $safeResult = \fdf_open_string($fdf_data);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Opens a file with form data.
 *
 * You can also use fdf_open_string to process the
 * results of a PDF form POST request.
 *
 * @param string $filename Path to the FDF file. This file must contain the data as returned from
 * a PDF form or created using fdf_create and
 * fdf_save.
 * @return resource Returns a FDF document handle.
 * @throws FdfException
 *
 */
function fdf_open(string $filename)
{
    error_clear_last();
    $safeResult = \fdf_open($filename);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the FDF document as a string.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @return string Returns the document as a string.
 * @throws FdfException
 *
 */
function fdf_save_string($fdf_document): string
{
    error_clear_last();
    $safeResult = \fdf_save_string($fdf_document);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Saves a FDF document.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $filename If provided, the resulting FDF will be written in this parameter.
 * Otherwise, this function will write the FDF to the default PHP output
 * stream.
 * @throws FdfException
 *
 */
function fdf_save($fdf_document, string $filename = null): void
{
    error_clear_last();
    if ($filename !== null) {
        $safeResult = \fdf_save($fdf_document, $filename);
    } else {
        $safeResult = \fdf_save($fdf_document);
    }
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets the appearance of a field (i.e. the value of the
 * /AP key).
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $field_name
 * @param int $face The possible values FDFNormalAP,
 * FDFRolloverAP and
 * FDFDownAP.
 * @param string $filename
 * @param int $page_number
 * @throws FdfException
 *
 */
function fdf_set_ap($fdf_document, string $field_name, int $face, string $filename, int $page_number): void
{
    error_clear_last();
    $safeResult = \fdf_set_ap($fdf_document, $field_name, $face, $filename, $page_number);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets the character encoding for the FDF document.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $encoding The encoding name. The following values are supported:
 * "Shift-JIS", "UHC",
 * "GBK" and "BigFive".
 *
 * An empty string resets the encoding to the default
 * PDFDocEncoding/Unicode scheme.
 * @throws FdfException
 *
 */
function fdf_set_encoding($fdf_document, string $encoding): void
{
    error_clear_last();
    $safeResult = \fdf_set_encoding($fdf_document, $encoding);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Selects a different PDF document to display the form results in then the
 * form it originated from.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $url Should be given as an absolute URL.
 * @param string $target_frame Use this parameter to specify the frame in which the document will be
 * displayed. You can also set the default value for this parameter using
 * fdf_set_target_frame.
 * @throws FdfException
 *
 */
function fdf_set_file($fdf_document, string $url, string $target_frame = null): void
{
    error_clear_last();
    if ($target_frame !== null) {
        $safeResult = \fdf_set_file($fdf_document, $url, $target_frame);
    } else {
        $safeResult = \fdf_set_file($fdf_document, $url);
    }
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets certain flags of the given field.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $fieldname Name of the FDF field, as a string.
 * @param int $whichFlags
 * @param int $newFlags
 * @throws FdfException
 *
 */
function fdf_set_flags($fdf_document, string $fieldname, int $whichFlags, int $newFlags): void
{
    error_clear_last();
    $safeResult = \fdf_set_flags($fdf_document, $fieldname, $whichFlags, $newFlags);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets a javascript action for the given field.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $fieldname Name of the FDF field, as a string.
 * @param int $trigger
 * @param string $script
 * @throws FdfException
 *
 */
function fdf_set_javascript_action($fdf_document, string $fieldname, int $trigger, string $script): void
{
    error_clear_last();
    $safeResult = \fdf_set_javascript_action($fdf_document, $fieldname, $trigger, $script);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets options of the given field.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $fieldname Name of the FDF field, as a string.
 * @param int $element
 * @param string $str1
 * @param string $str2
 * @throws FdfException
 *
 */
function fdf_set_opt($fdf_document, string $fieldname, int $element, string $str1, string $str2): void
{
    error_clear_last();
    $safeResult = \fdf_set_opt($fdf_document, $fieldname, $element, $str1, $str2);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets the value of the /STATUS key. When a client
 * receives a FDF with a status set it will present the value in an alert
 * box.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $status
 * @throws FdfException
 *
 */
function fdf_set_status($fdf_document, string $status): void
{
    error_clear_last();
    $safeResult = \fdf_set_status($fdf_document, $status);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets a submit form action for the given field.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $fieldname Name of the FDF field, as a string.
 * @param int $trigger
 * @param string $script
 * @param int $flags
 * @throws FdfException
 *
 */
function fdf_set_submit_form_action($fdf_document, string $fieldname, int $trigger, string $script, int $flags): void
{
    error_clear_last();
    $safeResult = \fdf_set_submit_form_action($fdf_document, $fieldname, $trigger, $script, $flags);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets the target frame to display a result PDF defined with
 * fdf_save_file in.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $frame_name The frame name, as a string.
 * @throws FdfException
 *
 */
function fdf_set_target_frame($fdf_document, string $frame_name): void
{
    error_clear_last();
    $safeResult = \fdf_set_target_frame($fdf_document, $frame_name);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets the value for the given field.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $fieldname Name of the FDF field, as a string.
 * @param mixed $value This parameter will be stored as a string unless it is an array. In
 * this case all array elements will be stored as a value array.
 * @param int $isName In older versions of the FDF toolkit last parameter determined if the
 * field value was to be converted to a PDF Name (= 1) or set to a PDF
 * String (= 0).
 *
 * The value is no longer used in the current toolkit version 5.0. For
 * compatibility reasons it is still supported as an optional parameter,
 * but ignored internally.
 * @throws FdfException
 *
 */
function fdf_set_value($fdf_document, string $fieldname, $value, int $isName = null): void
{
    error_clear_last();
    if ($isName !== null) {
        $safeResult = \fdf_set_value($fdf_document, $fieldname, $value, $isName);
    } else {
        $safeResult = \fdf_set_value($fdf_document, $fieldname, $value);
    }
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}


/**
 * Sets the FDF version for the given document.
 *
 * Some features supported by this extension are only available in newer FDF
 * versions.
 *
 * @param resource $fdf_document The FDF document handle, returned by fdf_create,
 * fdf_open or fdf_open_string.
 * @param string $version The version number. For the current FDF toolkit 5.0, this may be
 * either 1.2, 1.3 or
 * 1.4.
 * @throws FdfException
 *
 */
function fdf_set_version($fdf_document, string $version): void
{
    error_clear_last();
    $safeResult = \fdf_set_version($fdf_document, $version);
    if ($safeResult === false) {
        throw FdfException::createFromPhpError();
    }
}
