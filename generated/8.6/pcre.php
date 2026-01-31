<?php

namespace Safe;

use Safe\Exceptions\PcreException;

/**
 * @param string $pattern
 * @param array $array
 * @param int $flags
 * @return array
 * @throws PcreException
 *
 */
function preg_grep(string $pattern, array $array, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \preg_grep($pattern, $array, $flags);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $pattern
 * @param string $subject
 * @param array|null $matches
 * @param int $flags
 * @param int $offset
 * @return 0|positive-int
 * @throws PcreException
 *
 */
function preg_match_all(string $pattern, string $subject, ?array &$matches = null, int $flags = 0, int $offset = 0): int
{
    error_clear_last();
    $safeResult = \preg_match_all($pattern, $subject, $matches, $flags, $offset);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $pattern
 * @param string $subject
 * @param null|string[] $matches
 * @param int $flags
 * @param int $offset
 * @return 0|1
 * @throws PcreException
 *
 */
function preg_match(string $pattern, string $subject, ?array &$matches = null, int $flags = 0, int $offset = 0): int
{
    error_clear_last();
    $safeResult = \preg_match($pattern, $subject, $matches, $flags, $offset);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param array $pattern
 * @param array|string $subject
 * @param int $limit
 * @param int|null $count
 * @param int $flags
 * @return array|string
 * @throws PcreException
 *
 */
function preg_replace_callback_array(array $pattern, $subject, int $limit = -1, ?int &$count = null, int $flags = 0)
{
    error_clear_last();
    $safeResult = \preg_replace_callback_array($pattern, $subject, $limit, $count, $flags);
    if ($safeResult === null) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param array|string $pattern
 * @param callable(array):string $callback
 * @param array|string $subject
 * @param int $limit
 * @param int|null $count
 * @param int $flags
 * @return array|string
 * @throws PcreException
 *
 */
function preg_replace_callback($pattern, callable $callback, $subject, int $limit = -1, ?int &$count = null, int $flags = 0)
{
    error_clear_last();
    $safeResult = \preg_replace_callback($pattern, $callback, $subject, $limit, $count, $flags);
    if ($safeResult === null) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $pattern
 * @param string $subject
 * @param int|null $limit
 * @param int $flags
 * @return list
 * @throws PcreException
 *
 */
function preg_split(string $pattern, string $subject, ?int $limit = -1, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \preg_split($pattern, $subject, $limit, $flags);
    if ($safeResult === false) {
        throw PcreException::createFromPhpError();
    }
    return $safeResult;
}
