<?php

namespace Safe;

use Safe\Exceptions\ExecException;

/**
 * @param string $command
 * @param array|null $output
 * @param int|null $result_code
 * @return string
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
 * @param resource $process
 * @return int
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
 * @param int $priority
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
 * @param string $command
 * @param array $descriptor_spec
 * @param null|resource[] $pipes
 * @param null|string $cwd
 * @param array|null $env_vars
 * @param array|null $options
 * @return resource
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
 * @param string $command
 * @return null|string
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
 * @param string $command
 * @param int|null $result_code
 * @return string
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
