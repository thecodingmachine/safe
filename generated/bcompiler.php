<?php

namespace Safe;

/**
 * Reads data from a bcompiler exe file and creates classes from the bytecodes.
 * 
 * @param string $filename The exe file path, as a string.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_load_exe(string $filename): void
{
    error_clear_last();
    $result = \bcompiler_load_exe($filename);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Reads data from a bzcompressed file and creates classes from the bytecodes.
 * 
 * @param string $filename The bzcompressed file path, as a string.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_load(string $filename): void
{
    error_clear_last();
    $result = \bcompiler_load($filename);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Reads the bytecodes of a class and calls back to a user function.
 * 
 * @param string $class The class name, as a string.
 * @param string $callback 
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_parse_class(string $class, string $callback): void
{
    error_clear_last();
    $result = \bcompiler_parse_class($class, $callback);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Reads data from a open file handle and creates classes from the bytecodes.
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_read($filehandle): void
{
    error_clear_last();
    $result = \bcompiler_read($filehandle);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Reads the bytecodes from PHP for an existing class, and writes them to the
 * open file handle.
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @param string $className The class name, as a string.
 * @param string $extends 
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_class($filehandle, string $className, string $extends = null): void
{
    error_clear_last();
    if ($extends !== null) {
        $result = \bcompiler_write_class($filehandle, $className, $extends);
    }else {
        $result = \bcompiler_write_class($filehandle, $className);
    }
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Reads the bytecodes from PHP for an existing constant, and writes them to
 * the open file handle.
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @param string $constantName The name of the defined constant, as a string.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_constant($filehandle, string $constantName): void
{
    error_clear_last();
    $result = \bcompiler_write_constant($filehandle, $constantName);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * This function compiles specified source file into bytecodes, and writes
 * them to the open file handle.
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @param string $filename The source file path, as a string.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_file($filehandle, string $filename): void
{
    error_clear_last();
    $result = \bcompiler_write_file($filehandle, $filename);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Writes the single character \x00 to indicate End of compiled data.
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_footer($filehandle): void
{
    error_clear_last();
    $result = \bcompiler_write_footer($filehandle);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Reads the bytecodes from PHP for an existing function, and writes them to
 * the open file handle. Order is not important, (eg. if function b uses 
 * function a, and you compile it like the example below, it will work
 * perfectly OK).
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @param string $functionName The function name, as a string.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_function($filehandle, string $functionName): void
{
    error_clear_last();
    $result = \bcompiler_write_function($filehandle, $functionName);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Searches for all functions declared in the given file, and writes their
 * correspondent bytecodes to the open file handle.
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @param string $fileName The file to be compiled.
 * You must always include or require the file you intend to compile.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_functions_from_file($filehandle, string $fileName): void
{
    error_clear_last();
    $result = \bcompiler_write_functions_from_file($filehandle, $fileName);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * Writes the header part of a bcompiler file.
 * 
 * @param resource $filehandle A file handle as returned by fopen.
 * @param string $write_ver Can be used to write bytecode in a previously used format, so that you
 * can use it with older versions of bcompiler.
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_header($filehandle, string $write_ver = null): void
{
    error_clear_last();
    if ($write_ver !== null) {
        $result = \bcompiler_write_header($filehandle, $write_ver);
    }else {
        $result = \bcompiler_write_header($filehandle);
    }
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $filehandle 
 * @param string $filename 
 * @throws Exceptions\BcompilerException
 * 
 */
function bcompiler_write_included_filename($filehandle, string $filename): void
{
    error_clear_last();
    $result = \bcompiler_write_included_filename($filehandle, $filename);
    if ($result === FALSE) {
        throw Exceptions\BcompilerException::createFromPhpError();
    }
}


