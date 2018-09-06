<?php

namespace Safe;

/**
 * This function restores the Tidy configuration to the default values.
 * 
 * @throws Exceptions\TidyException
 * 
 */
function tidy_reset_config(): void
{
    error_clear_last();
    $result = \tidy_reset_config();
    if ($result === FALSE) {
        throw Exceptions\TidyException::createFromPhpError();
    }
}


/**
 * Saves current settings to the specified file. Only non-default values are
 * written.
 * 
 * @param string $filename Path to the config file.
 * @throws Exceptions\TidyException
 * 
 */
function tidy_save_config(string $filename): void
{
    error_clear_last();
    $result = \tidy_save_config($filename);
    if ($result === FALSE) {
        throw Exceptions\TidyException::createFromPhpError();
    }
}


/**
 * Sets the encoding for input/output documents.
 * 
 * @param string $encoding The encoding parameter sets the encoding for
 * input/output documents. The possible values for encoding  are: 
 * ascii, latin0, latin1,
 * raw, utf8, iso2022,
 * mac, win1252, ibm858,
 * utf16, utf16le, utf16be,
 * big5, and shiftjis.
 * @throws Exceptions\TidyException
 * 
 */
function tidy_set_encoding(string $encoding): void
{
    error_clear_last();
    $result = \tidy_set_encoding($encoding);
    if ($result === FALSE) {
        throw Exceptions\TidyException::createFromPhpError();
    }
}


/**
 * tidy_setopt updates the specified
 * option with a new value.
 * 
 * @param string $option The tidy option name. A list of available configuration options may
 * be found at: http://tidy.sourceforge.net/docs/quickref.html.
 * @param mixed $value The tidy option name.
 * @throws Exceptions\TidyException
 * 
 */
function tidy_setopt(string $option, $value): void
{
    error_clear_last();
    $result = \tidy_setopt($option, $value);
    if ($result === FALSE) {
        throw Exceptions\TidyException::createFromPhpError();
    }
}


