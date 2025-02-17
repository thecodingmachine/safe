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
 * @param int|null $result_code If the result_code argument is present
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
function exec(string $command, ?array &$output = null, ?int &$result_code = null): string
{
    error_clear_last();
    $safeResult = \exec($command, $output, $result_code);
    if ($safeResult === false) {
        throw ExecException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The passthru function is similar to the
 * exec function in that it executes a
 * command. This function
 * should be used in place of exec or
 * system when the output from the Unix command
 * is binary data which needs to be passed directly back to the
 * browser.  A common use for this is to execute something like the
 * pbmplus utilities that can output an image stream directly.  By
 * setting the Content-type to image/gif and
 * then calling a pbmplus program to output a gif, you can create
 * PHP scripts that output images directly.
 *
 * @param string $command The command that will be executed.
 * @param int|null $result_code If the result_code argument is present, the
 * return status of the Unix command will be placed here.
 * @throws ExecException
 *
 */
function passthru(string $command, ?int &$result_code = null): void
{
    error_clear_last();
    $safeResult = \passthru($command, $result_code);
    if ($safeResult === false) {
        throw ExecException::createFromPhpError();
    }
}


/**
 * proc_close is similar to pclose
 * except that it only works on processes opened by
 * proc_open.
 * proc_close waits for the process to terminate, and
 * returns its exit code.  Open pipes to that process are closed
 * when this function is called, in
 * order to avoid a deadlock - the child process may not be able to exit
 * while the pipes are open.
 *
 * @param resource $process The proc_open resource that will
 * be closed.
 * @return int Returns the termination status of the process that was run.
 * @throws ExecException
 *
 */
function proc_close($process): int
{
    error_clear_last();
    $safeResult = \proc_close($process);
    if ($safeResult === -1) {
        throw ExecException::createFromPhpError();
    }
    return $safeResult;
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
 * whereas positive values have a lower priority.
 *
 * For Windows the priority parameter has the
 * following meaning:
 * @throws ExecException
 *
 */
function proc_nice(int $priority): void
{
    error_clear_last();
    $safeResult = \proc_nice($priority);
    if ($safeResult === false) {
        throw ExecException::createFromPhpError();
    }
}


/**
 * proc_open is similar to popen
 * but provides a much greater degree of control over the program execution.
 *
 * @param string $command The commandline to execute as string. Special characters have to be properly escaped,
 * and proper quoting has to be applied.
 *
 * As of PHP 7.4.0, command may be passed as array of command parameters.
 * In this case the process will be opened directly (without going through a shell)
 * and PHP will take care of any necessary argument escaping.
 *
 * On Windows, the argument escaping of the array elements assumes that the
 * command line parsing of the executed command is compatible with the parsing
 * of command line arguments done by the VC runtime.
 * @param array $descriptor_spec An indexed array where the key represents the descriptor number and the
 * value represents how PHP will pass that descriptor to the child
 * process. 0 is stdin, 1 is stdout, while 2 is stderr.
 *
 * Each element can be:
 *
 * An array describing the pipe to pass to the process. The first
 * element is the descriptor type and the second element is an option for
 * the given type. Valid types are pipe (the second
 * element is either r to pass the read end of the pipe
 * to the process, or w to pass the write end) and
 * file (the second element is a filename).
 * Note that anything else than w is treated like r.
 *
 *
 * A stream resource representing a real file descriptor (e.g. opened file,
 * a socket, STDIN).
 *
 *
 *
 * The file descriptor numbers are not limited to 0, 1 and 2 - you may
 * specify any valid file descriptor number and it will be passed to the
 * child process. This allows your script to interoperate with other
 * scripts that run as "co-processes". In particular, this is useful for
 * passing passphrases to programs like PGP, GPG and openssl in a more
 * secure manner. It is also useful for reading status information
 * provided by those programs on auxiliary file descriptors.
 * @param null|resource[] $pipes Will be set to an indexed array of file pointers that correspond to
 * PHP's end of any pipes that are created.
 * @param null|string $cwd The initial working dir for the command. This must be an
 * absolute directory path, or NULL
 * if you want to use the default value (the working dir of the current
 * PHP process)
 * @param array|null $env_vars An array with the environment variables for the command that will be
 * run, or NULL to use the same environment as the current PHP process
 * @param array|null $options Allows you to specify additional options. Currently supported options
 * include:
 *
 *
 * suppress_errors (windows only): suppresses errors
 * generated by this function when it's set to TRUE
 *
 *
 * bypass_shell (windows only): bypass
 * cmd.exe shell when set to TRUE
 *
 *
 * blocking_pipes (windows only): force
 * blocking pipes when set to TRUE
 *
 *
 * create_process_group (windows only): allow the
 * child process to handle CTRL events when set to TRUE
 *
 *
 * create_new_console (windows only): the new process
 * has a new console, instead of inheriting its parent's console
 *
 *
 * @return resource Returns a resource representing the process, which should be freed using
 * proc_close when you are finished with it. On failure
 * returns FALSE.
 * @throws ExecException
 *
 */
function proc_open(string $command, array $descriptor_spec, ?array &$pipes, ?string $cwd = null, ?array $env_vars = null, ?array $options = null)
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \proc_open($command, $descriptor_spec, $pipes, $cwd, $env_vars, $options);
    } elseif ($env_vars !== null) {
        $safeResult = \proc_open($command, $descriptor_spec, $pipes, $cwd, $env_vars);
    } elseif ($cwd !== null) {
        $safeResult = \proc_open($command, $descriptor_spec, $pipes, $cwd);
    } else {
        $safeResult = \proc_open($command, $descriptor_spec, $pipes);
    }
    if ($safeResult === false) {
        throw ExecException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function is identical to the backtick operator.
 *
 * @param string $command The command that will be executed.
 * @return null|string A string containing the output from the executed command or NULL if an error occurs or the command produces no output.
 * @throws ExecException
 *
 */
function shell_exec(string $command): ?string
{
    error_clear_last();
    $safeResult = \shell_exec($command);
    if ($safeResult === false) {
        throw ExecException::createFromPhpError();
    }
    return $safeResult;
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
 * @param int|null $result_code If the result_code argument is present, then the
 * return status of the executed command will be written to this
 * variable.
 * @return string Returns the last line of the command output on success.
 * @throws ExecException
 *
 */
function system(string $command, ?int &$result_code = null): string
{
    error_clear_last();
    $safeResult = \system($command, $result_code);
    if ($safeResult === false) {
        throw ExecException::createFromPhpError();
    }
    return $safeResult;
}
