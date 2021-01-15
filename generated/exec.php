<?php

namespace Safe;

use Safe\Exceptions\ExecException;

/**
 * exec executes the given
 * command.
 * 
 * @param string $command The command that will be executed.
 * @param array|null $output If the output argument is present, then the
 * specified array will be filled with every line of output from the
 * command.  Trailing whitespace, such as \n, is not
 * included in this array.  Note that if the array already contains some
 * elements, exec will append to the end of the array.
 * If you do not want the function to append elements, call
 * unset on the array before passing it to
 * exec.
 * @param int $result_code If the result_code argument is present
 * along with the output argument, then the
 * return status of the executed command will be written to this
 * variable.
 * @return string The last line from the result of the command.  If you need to execute a 
 * command and have all the data from the command passed directly back without 
 * any interference, use the passthru function.
 * 
 * Returns FALSE on failure.
 * 
 * To get the output of the executed command, be sure to set and use the
 * output parameter.
 * @throws ExecException
 * 
 */
function exec(string $command, ?array &$output = null, int &$result_code = null): string
{
    error_clear_last();
    $result = \exec($command, $output, $result_code);
    if ($result === false) {
        throw ExecException::createFromPhpError();
    }
    return $result;
}


/**
 * proc_get_status fetches data about a
 * process opened using proc_open.
 * 
 * @param resource $process The proc_open resource that will
 * be evaluated.
 * @return array An array of collected information on success. The returned array contains the following elements:
 * 
 * 
 * 
 * 
 * elementtypedescription
 * 
 * 
 * 
 * command
 * string
 * 
 * The command string that was passed to proc_open.
 * 
 * 
 * 
 * pid
 * int
 * process id
 * 
 * 
 * running
 * bool
 * 
 * TRUE if the process is still running, FALSE if it has
 * terminated.
 * 
 * 
 * 
 * signaled
 * bool
 * 
 * TRUE if the child process has been terminated by
 * an uncaught signal. Always set to FALSE on Windows.
 * 
 * 
 * 
 * stopped
 * bool
 * 
 * TRUE if the child process has been stopped by a
 * signal. Always set to FALSE on Windows.
 * 
 * 
 * 
 * exitcode
 * int
 * 
 * The exit code returned by the process (which is only
 * meaningful if running is FALSE).
 * Only first call of this function return real value, next calls return
 * -1.
 * 
 * 
 * 
 * termsig
 * int
 * 
 * The number of the signal that caused the child process to terminate
 * its execution (only meaningful if signaled is TRUE).
 * 
 * 
 * 
 * stopsig
 * int
 * 
 * The number of the signal that caused the child process to stop its
 * execution (only meaningful if stopped is TRUE).
 * 
 * 
 * 
 * 
 * 
 * @throws ExecException
 * 
 */
function proc_get_status( $process): array
{
    error_clear_last();
    $result = \proc_get_status($process);
    if ($result === false) {
        throw ExecException::createFromPhpError();
    }
    return $result;
}


/**
 * proc_nice changes the priority of the current
 * process by the amount specified in priority. A
 * positive priority will lower the priority of the
 * current process, whereas a negative priority
 * will raise the priority.
 * 
 * proc_nice is not related to
 * proc_open and its associated functions in any way.
 * 
 * @param int $priority The new priority value, the value of this may differ on platforms.
 * 
 * On Unix, a low value, such as -20 means high priority 
 * wheras a positive value have a lower priority.
 * 
 * For Windows the priority parameter have the 
 * following meanings:
 * @throws ExecException
 * 
 */
function proc_nice(int $priority): void
{
    error_clear_last();
    $result = \proc_nice($priority);
    if ($result === false) {
        throw ExecException::createFromPhpError();
    }
}


/**
 * system is just like the C version of the
 * function in that it executes the given
 * command and outputs the result.
 * 
 * The system call also tries to automatically
 * flush the web server's output buffer after each line of output if
 * PHP is running as a server module.
 * 
 * If you need to execute a command and have all the data from the
 * command passed directly back without any interference, use the
 * passthru function.
 * 
 * @param string $command The command that will be executed.
 * @param int $result_code If the result_code argument is present, then the
 * return status of the executed command will be written to this
 * variable.
 * @return string Returns the last line of the command output on success.
 * @throws ExecException
 * 
 */
function system(string $command, int &$result_code = null): string
{
    error_clear_last();
    $result = \system($command, $result_code);
    if ($result === false) {
        throw ExecException::createFromPhpError();
    }
    return $result;
}


