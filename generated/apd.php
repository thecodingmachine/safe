<?php

namespace Safe;

/**
 * This can be used to stop the running of your script, and await responses 
 * on the connected socket.  To step the program, just send enter (a blank 
 * line), or enter a php command to be executed.
 * 
 * @param int $debug_level An integer which is formed by adding
 * together the XXX_TRACE constants.
 * 
 * It is not recommended
 * to use MEMORY_TRACE. It is very slow and does not appear to be accurate.
 * ASSIGNMENT_TRACE is not implemented yet.
 * 
 * To turn on all
 * functional traces (TIMING, FUNCTIONS, ARGS SUMMARY (like strace -c)) use the value 99
 * @throws Exceptions\ApdException
 * 
 */
function apd_breakpoint(int $debug_level): void
{
    error_clear_last();
    $result = \apd_breakpoint($debug_level);
    if ($result === FALSE) {
        throw Exceptions\ApdException::createFromPhpError();
    }
}


/**
 * Usually sent via the socket to restart the interpreter.
 * 
 * @param int $debug_level An integer which is formed by adding
 * together the XXX_TRACE constants.
 * 
 * It is not recommended
 * to use MEMORY_TRACE. It is very slow and does not appear to be accurate.
 * ASSIGNMENT_TRACE is not implemented yet.
 * 
 * To turn on all
 * functional traces (TIMING, FUNCTIONS, ARGS SUMMARY (like strace -c)) use the value 99
 * @throws Exceptions\ApdException
 * 
 */
function apd_continue(int $debug_level): void
{
    error_clear_last();
    $result = \apd_continue($debug_level);
    if ($result === FALSE) {
        throw Exceptions\ApdException::createFromPhpError();
    }
}


/**
 * Usually sent via the socket to request information about the running 
 * script.
 * 
 * @param string $output The debugged variable.
 * @throws Exceptions\ApdException
 * 
 */
function apd_echo(string $output): void
{
    error_clear_last();
    $result = \apd_echo($output);
    if ($result === FALSE) {
        throw Exceptions\ApdException::createFromPhpError();
    }
}


/**
 * Connects to the specified tcp_server (eg. tcplisten)
 * and sends debugging data to the socket.
 * 
 * @param string $tcp_server IP or Unix Domain socket (like a file) of the TCP server.
 * @param int $socket_type Can be AF_UNIX for file based sockets or 
 * APD_AF_INET for standard tcp/ip.
 * @param int $port You can use any port, but higher numbers are better as most of the
 * lower numbers may be used by other system services.
 * @param int $debug_level An integer which is formed by adding
 * together the XXX_TRACE constants.
 * 
 * It is not recommended
 * to use MEMORY_TRACE. It is very slow and does not appear to be accurate.
 * ASSIGNMENT_TRACE is not implemented yet.
 * 
 * To turn on all
 * functional traces (TIMING, FUNCTIONS, ARGS SUMMARY (like strace -c)) use the value 99
 * @throws Exceptions\ApdException
 * 
 */
function apd_set_session_trace_socket(string $tcp_server, int $socket_type, int $port, int $debug_level): void
{
    error_clear_last();
    $result = \apd_set_session_trace_socket($tcp_server, $socket_type, $port, $debug_level);
    if ($result === FALSE) {
        throw Exceptions\ApdException::createFromPhpError();
    }
}


/**
 * Overrides built-in functions by replacing them in the symbol table.
 * 
 * @param string $function_name The function to override.
 * @param string $function_args The function arguments, as a comma separated string.
 * 
 * Usually you will want to pass this parameter, as well as the 
 * function_code parameter, as a single quote 
 * delimited string. The reason for using single quoted strings, is to
 * protect the variable names from parsing, otherwise, if you use double
 * quotes there will be a need to escape the variable names, e.g. 
 * \$your_var.
 * @param string $function_code The new code for the function.
 * @throws Exceptions\ApdException
 * 
 */
function override_function(string $function_name, string $function_args, string $function_code): void
{
    error_clear_last();
    $result = \override_function($function_name, $function_args, $function_code);
    if ($result === FALSE) {
        throw Exceptions\ApdException::createFromPhpError();
    }
}


/**
 * Renames a orig_name to new_name in the global function table.  Useful
 * for temporarily overriding built-in functions.
 * 
 * @param string $original_name The original function name.
 * @param string $new_name The new name for the original_name function.
 * @throws Exceptions\ApdException
 * 
 */
function rename_function(string $original_name, string $new_name): void
{
    error_clear_last();
    $result = \rename_function($original_name, $new_name);
    if ($result === FALSE) {
        throw Exceptions\ApdException::createFromPhpError();
    }
}


