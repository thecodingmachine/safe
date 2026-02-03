<?php

namespace Safe;

use Safe\Exceptions\ZlibException;

/**
 * @param \DeflateContext $context
 * @param string $data
 * @param int $flush_mode
 * @return string
 * @throws ZlibException
 *
 */
function deflate_add(\DeflateContext $context, string $data, int $flush_mode = ZLIB_SYNC_FLUSH): string
{
    error_clear_last();
    $safeResult = \deflate_add($context, $data, $flush_mode);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $encoding
 * @param array $options
 * @return \DeflateContext
 * @throws ZlibException
 *
 */
function deflate_init(int $encoding, array $options = []): \DeflateContext
{
    error_clear_last();
    $safeResult = \deflate_init($encoding, $options);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @throws ZlibException
 *
 */
function gzclose($stream): void
{
    error_clear_last();
    $safeResult = \gzclose($stream);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
}


/**
 * @param string $data
 * @param int $level
 * @param int $encoding
 * @return string
 * @throws ZlibException
 *
 */
function gzcompress(string $data, int $level = -1, int $encoding = ZLIB_ENCODING_DEFLATE): string
{
    error_clear_last();
    $safeResult = \gzcompress($data, $level, $encoding);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param int $max_length
 * @return string
 * @throws ZlibException
 *
 */
function gzdecode(string $data, int $max_length = 0): string
{
    error_clear_last();
    $safeResult = \gzdecode($data, $max_length);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param int $level
 * @param int $encoding
 * @return string
 * @throws ZlibException
 *
 */
function gzdeflate(string $data, int $level = -1, int $encoding = ZLIB_ENCODING_RAW): string
{
    error_clear_last();
    $safeResult = \gzdeflate($data, $level, $encoding);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param int $level
 * @param int $encoding
 * @return string
 * @throws ZlibException
 *
 */
function gzencode(string $data, int $level = -1, int $encoding = ZLIB_ENCODING_GZIP): string
{
    error_clear_last();
    $safeResult = \gzencode($data, $level, $encoding);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param  $use_include_path
 * @return list
 * @throws ZlibException
 *
 */
function gzfile(string $filename, $use_include_path = 0): array
{
    error_clear_last();
    $safeResult = \gzfile($filename, $use_include_path);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param int|null $length
 * @return string
 * @throws ZlibException
 *
 */
function gzgets($stream, ?int $length = null): string
{
    error_clear_last();
    if ($length !== null) {
        $safeResult = \gzgets($stream, $length);
    } else {
        $safeResult = \gzgets($stream);
    }
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param int $max_length
 * @return string
 * @throws ZlibException
 *
 */
function gzinflate(string $data, int $max_length = 0): string
{
    error_clear_last();
    $safeResult = \gzinflate($data, $max_length);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param string $mode
 * @param  $use_include_path
 * @return resource
 * @throws ZlibException
 *
 */
function gzopen(string $filename, string $mode, $use_include_path = 0)
{
    error_clear_last();
    $safeResult = \gzopen($filename, $mode, $use_include_path);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @return false|int
 *
 */
function gzpassthru($stream)
{
    error_clear_last();
    $safeResult = \gzpassthru($stream);
    return $safeResult;
}


/**
 * @param resource $stream
 * @param int $length
 * @return string
 * @throws ZlibException
 *
 */
function gzread($stream, int $length): string
{
    error_clear_last();
    $safeResult = \gzread($stream, $length);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @throws ZlibException
 *
 */
function gzrewind($stream): void
{
    error_clear_last();
    $safeResult = \gzrewind($stream);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
}


/**
 * @param resource $stream
 * @return int
 * @throws ZlibException
 *
 */
function gztell($stream): int
{
    error_clear_last();
    $safeResult = \gztell($stream);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param int $max_length
 * @return string
 * @throws ZlibException
 *
 */
function gzuncompress(string $data, int $max_length = 0): string
{
    error_clear_last();
    $safeResult = \gzuncompress($data, $max_length);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $stream
 * @param string $data
 * @param int|null $length
 * @return int
 * @throws ZlibException
 *
 */
function gzwrite($stream, string $data, ?int $length = null): int
{
    error_clear_last();
    if ($length !== null) {
        $safeResult = \gzwrite($stream, $data, $length);
    } else {
        $safeResult = \gzwrite($stream, $data);
    }
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \InflateContext $context
 * @return int
 * @throws ZlibException
 *
 */
function inflate_get_read_len(\InflateContext $context): int
{
    error_clear_last();
    $safeResult = \inflate_get_read_len($context);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \InflateContext $context
 * @return false|int
 *
 */
function inflate_get_status(\InflateContext $context)
{
    error_clear_last();
    $safeResult = \inflate_get_status($context);
    return $safeResult;
}


/**
 * @param \InflateContext $context
 * @param string $data
 * @param int $flush_mode
 * @return string
 * @throws ZlibException
 *
 */
function inflate_add(\InflateContext $context, string $data, int $flush_mode = ZLIB_SYNC_FLUSH): string
{
    error_clear_last();
    $safeResult = \inflate_add($context, $data, $flush_mode);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $encoding
 * @param array $options
 * @return \InflateContext
 * @throws ZlibException
 *
 */
function inflate_init(int $encoding, array $options = []): \InflateContext
{
    error_clear_last();
    $safeResult = \inflate_init($encoding, $options);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $filename
 * @param  $use_include_path
 * @return 0|positive-int
 * @throws ZlibException
 *
 */
function readgzfile(string $filename, $use_include_path = 0): int
{
    error_clear_last();
    $safeResult = \readgzfile($filename, $use_include_path);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $data
 * @param int $max_length
 * @return string
 * @throws ZlibException
 *
 */
function zlib_decode(string $data, int $max_length = 0): string
{
    error_clear_last();
    $safeResult = \zlib_decode($data, $max_length);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}
