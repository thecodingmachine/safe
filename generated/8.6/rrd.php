<?php

namespace Safe;

use Safe\Exceptions\RrdException;

/**
 * @param string $filename
 * @param array $options
 * @throws RrdException
 *
 */
function rrd_create(string $filename, array $options): void
{
    error_clear_last();
    $safeResult = \rrd_create($filename, $options);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
}


/**
 * @param string $file
 * @param int $raaindex
 * @return int
 * @throws RrdException
 *
 */
function rrd_first(string $file, int $raaindex = 0): int
{
    error_clear_last();
    $safeResult = \rrd_first($file, $raaindex);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param array $options
 * @return array
 * @throws RrdException
 *
 */
function rrd_graph(string $filename, array $options): array
{
    error_clear_last();
    $safeResult = \rrd_graph($filename, $options);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return array
 * @throws RrdException
 *
 */
function rrd_info(string $filename): array
{
    error_clear_last();
    $safeResult = \rrd_info($filename);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @return array
 * @throws RrdException
 *
 */
function rrd_lastupdate(string $filename): array
{
    error_clear_last();
    $safeResult = \rrd_lastupdate($filename);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $xml_file
 * @param string $rrd_file
 * @param array $options
 * @throws RrdException
 *
 */
function rrd_restore(string $xml_file, string $rrd_file, ?array $options = null): void
{
    error_clear_last();
    if ($options !== null) {
        $safeResult = \rrd_restore($xml_file, $rrd_file, $options);
    } else {
        $safeResult = \rrd_restore($xml_file, $rrd_file);
    }
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param array $options
 * @throws RrdException
 *
 */
function rrd_tune(string $filename, array $options): void
{
    error_clear_last();
    $safeResult = \rrd_tune($filename, $options);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @param array $options
 * @throws RrdException
 *
 */
function rrd_update(string $filename, array $options): void
{
    error_clear_last();
    $safeResult = \rrd_update($filename, $options);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
}


/**
 * @param array $options
 * @return array
 * @throws RrdException
 *
 */
function rrd_xport(array $options): array
{
    error_clear_last();
    $safeResult = \rrd_xport($options);
    if ($safeResult === false) {
        throw RrdException::createFromPhpError();
    }
    return $safeResult;
}
