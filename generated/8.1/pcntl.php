<?php

namespace Safe;

use Safe\Exceptions\PcntlException;

/**
 * @param int|null $process_id
 * @param int $mode
 * @return int
 * @throws PcntlException
 *
 */
function pcntl_getpriority(?int $process_id = null, int $mode = PRIO_PROCESS): int
{
    error_clear_last();
    if ($mode !== PRIO_PROCESS) {
        $safeResult = \pcntl_getpriority($process_id, $mode);
    } elseif ($process_id !== null) {
        $safeResult = \pcntl_getpriority($process_id);
    } else {
        $safeResult = \pcntl_getpriority();
    }
    if ($safeResult === false) {
        throw PcntlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $priority
 * @param int|null $process_id
 * @param int $mode
 * @throws PcntlException
 *
 */
function pcntl_setpriority(int $priority, ?int $process_id = null, int $mode = PRIO_PROCESS): void
{
    error_clear_last();
    if ($mode !== PRIO_PROCESS) {
        $safeResult = \pcntl_setpriority($priority, $process_id, $mode);
    } elseif ($process_id !== null) {
        $safeResult = \pcntl_setpriority($priority, $process_id);
    } else {
        $safeResult = \pcntl_setpriority($priority);
    }
    if ($safeResult === false) {
        throw PcntlException::createFromPhpError();
    }
}


/**
 * @throws PcntlException
 *
 */
function pcntl_signal_dispatch(): void
{
    error_clear_last();
    $safeResult = \pcntl_signal_dispatch();
    if ($safeResult === false) {
        throw PcntlException::createFromPhpError();
    }
}


/**
 * @param int $signal
 * @param callable|int $handler
 * @param bool $restart_syscalls
 * @throws PcntlException
 *
 */
function pcntl_signal(int $signal, $handler, bool $restart_syscalls = true): void
{
    error_clear_last();
    $safeResult = \pcntl_signal($signal, $handler, $restart_syscalls);
    if ($safeResult === false) {
        throw PcntlException::createFromPhpError();
    }
}


/**
 * @param int $mode
 * @param array $signals
 * @param array|null $old_signals
 * @throws PcntlException
 *
 */
function pcntl_sigprocmask(int $mode, array $signals, ?array &$old_signals = null): void
{
    error_clear_last();
    $safeResult = \pcntl_sigprocmask($mode, $signals, $old_signals);
    if ($safeResult === false) {
        throw PcntlException::createFromPhpError();
    }
}


/**
 * @param array $signals
 * @param array|null $info
 * @param int $seconds
 * @param int $nanoseconds
 * @return int
 * @throws PcntlException
 *
 */
function pcntl_sigtimedwait(array $signals, ?array &$info = [], int $seconds = 0, int $nanoseconds = 0): int
{
    error_clear_last();
    $safeResult = \pcntl_sigtimedwait($signals, $info, $seconds, $nanoseconds);
    if ($safeResult === false) {
        throw PcntlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param array $signals
 * @param array|null $info
 * @return int
 * @throws PcntlException
 *
 */
function pcntl_sigwaitinfo(array $signals, ?array &$info = []): int
{
    error_clear_last();
    $safeResult = \pcntl_sigwaitinfo($signals, $info);
    if ($safeResult === false) {
        throw PcntlException::createFromPhpError();
    }
    return $safeResult;
}
