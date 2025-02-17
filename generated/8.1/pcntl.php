<?php

namespace Safe;

use Safe\Exceptions\PcntlException;

/**
 * pcntl_getpriority gets the priority of
 * process_id. Because priority levels can differ between
 * system types and kernel versions, please see your system's getpriority(2)
 * man page for specific details.
 *
 * @param int|null $process_id If NULL, the process id of the current process is used.
 * @param int $mode One of PRIO_PGRP, PRIO_USER
 * or PRIO_PROCESS.
 * @return int pcntl_getpriority returns the priority of the process.  A lower numerical value causes more favorable
 * scheduling.
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
 * pcntl_setpriority sets the priority of
 * process_id.
 *
 * @param int $priority priority is generally a value in the range
 * -20 to 20. The default priority
 * is 0 while a lower numerical value causes more
 * favorable scheduling.  Because priority levels can differ between
 * system types and kernel versions, please see your system's setpriority(2)
 * man page for specific details.
 * @param int|null $process_id If NULL, the process id of the current process is used.
 * @param int $mode One of PRIO_PGRP, PRIO_USER
 * or PRIO_PROCESS.
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
 * The pcntl_signal_dispatch function calls the signal
 * handlers installed by pcntl_signal for each pending
 * signal.
 *
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
 * The pcntl_signal function installs a new
 * signal handler or replaces the current signal handler for the signal indicated by signal.
 *
 * @param int $signal The signal number.
 * @param callable|int $handler The signal handler. This may be either a callable, which
 * will be invoked to handle the signal, or either of the two global
 * constants SIG_IGN or SIG_DFL,
 * which will ignore the signal or restore the default signal handler
 * respectively.
 *
 * If a callable is given, it must implement the following
 * signature:
 *
 *
 * voidhandler
 * intsigno
 * mixedsiginfo
 *
 *
 *
 * signal
 *
 *
 * The signal being handled.
 *
 *
 *
 *
 * siginfo
 *
 *
 * If operating systems supports siginfo_t structures, this will be an array of signal information dependent on the signal.
 *
 *
 *
 *
 *
 * Note that when you set a handler to an object method, that object's
 * reference count is increased which makes it persist until you either
 * change the handler to something else, or your script ends.
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
 * The pcntl_sigprocmask function adds, removes or sets blocked
 * signals, depending on the mode parameter.
 *
 * @param int $mode Sets the behavior of pcntl_sigprocmask. Possible
 * values:
 *
 * SIG_BLOCK: Add the signals to the
 * currently blocked signals.
 * SIG_UNBLOCK: Remove the signals from the
 * currently blocked signals.
 * SIG_SETMASK: Replace the currently
 * blocked signals by the given list of signals.
 *
 * @param array $signals List of signals.
 * @param array|null $old_signals The old_signals parameter is set to an array
 * containing the list of the previously blocked signals.
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
 * The pcntl_sigtimedwait function operates in exactly
 * the same way as pcntl_sigwaitinfo except that it takes
 * two additional parameters, seconds and
 * nanoseconds, which enable an upper bound to be placed
 * on the time for which the script is suspended.
 *
 * @param array $signals Array of signals to wait for.
 * @param array|null $info The info is set to an array containing
 * information about the signal. See
 * pcntl_sigwaitinfo.
 * @param int $seconds Timeout in seconds.
 * @param int $nanoseconds Timeout in nanoseconds.
 * @return int pcntl_sigtimedwait returns a signal number on success.
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
 * The pcntl_sigwaitinfo function suspends execution of the
 * calling script until one of the signals given in signals
 * are delivered. If one of the signal is already pending (e.g. blocked by
 * pcntl_sigprocmask),
 * pcntl_sigwaitinfo will return immediately.
 *
 * @param array $signals Array of signals to wait for.
 * @param array|null $info The info parameter is set to an array containing
 * information about the signal.
 *
 * The following elements are set for all signals:
 *
 * signo: Signal number
 * errno: An error number
 * code: Signal code
 *
 *
 * The following elements may be set for the SIGCHLD signal:
 *
 * status: Exit value or signal
 * utime: User time consumed
 * stime: System time consumed
 * pid: Sending process ID
 * uid: Real user ID of sending process
 *
 *
 * The following elements may be set for the SIGILL,
 * SIGFPE, SIGSEGV and
 * SIGBUS signals:
 *
 * addr: Memory location which caused fault
 *
 *
 * The following element may be set for the SIGPOLL
 * signal:
 *
 * band: Band event
 * fd: File descriptor number
 *
 * @return int Returns a signal number on success.
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
