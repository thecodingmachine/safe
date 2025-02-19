<?php

namespace Safe;

use Safe\Exceptions\ZlibException;

/**
 * Incrementally deflates data in the specified context.
 *
 * @param \DeflateContext $context A context created with deflate_init.
 * @param string $data A chunk of data to compress.
 * @param int $flush_mode One of ZLIB_BLOCK,
 * ZLIB_NO_FLUSH,
 * ZLIB_PARTIAL_FLUSH,
 * ZLIB_SYNC_FLUSH (default),
 * ZLIB_FULL_FLUSH, ZLIB_FINISH.
 * Normally you will want to set ZLIB_NO_FLUSH to
 * maximize compression, and ZLIB_FINISH to terminate
 * with the last chunk of data. See the zlib manual for a
 * detailed description of these constants.
 * @return string Returns a chunk of compressed data.
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
 * Initializes an incremental deflate context using the specified
 * encoding.
 *
 * Note that the window option here only sets the window size
 * of the algorithm, differently from the zlib filters where the same parameter
 * also sets the encoding to use; the encoding must be set with the
 * encoding parameter.
 *
 * Limitation: there is currently no way to set the header information on a GZIP
 * compressed stream, which are set as follows: GZIP signature
 * (\x1f\x8B); compression method (\x08
 * == DEFLATE); 6 zero bytes; the operating system set to the current system
 * (\x00 = Windows, \x03 = Unix, etc.)
 *
 * @param int $encoding One of the ZLIB_ENCODING_* constants.
 * @param array $options An associative array which may contain the following elements:
 *
 *
 * level
 *
 *
 * The compression level in range -1..9; defaults to -1.
 *
 *
 *
 *
 * memory
 *
 *
 * The compression memory level in range 1..9; defaults to 8.
 *
 *
 *
 *
 * window
 *
 *
 * The zlib window size (logarithmic) in range 8..15;
 * defaults to 15.
 * zlib changes a window size of 8 to 9,
 * and as of zlib 1.2.8 fails with a warning, if a window size of 8
 * is requested for ZLIB_ENCODING_RAW or ZLIB_ENCODING_GZIP.
 *
 *
 *
 *
 * strategy
 *
 *
 * One of ZLIB_FILTERED,
 * ZLIB_HUFFMAN_ONLY, ZLIB_RLE,
 * ZLIB_FIXED or
 * ZLIB_DEFAULT_STRATEGY (the default).
 *
 *
 *
 *
 * dictionary
 *
 *
 * A string or an array of strings
 * of the preset dictionary (default: no preset dictionary).
 *
 *
 *
 *
 *
 * The compression level in range -1..9; defaults to -1.
 *
 * The compression memory level in range 1..9; defaults to 8.
 *
 * The zlib window size (logarithmic) in range 8..15;
 * defaults to 15.
 * zlib changes a window size of 8 to 9,
 * and as of zlib 1.2.8 fails with a warning, if a window size of 8
 * is requested for ZLIB_ENCODING_RAW or ZLIB_ENCODING_GZIP.
 *
 * One of ZLIB_FILTERED,
 * ZLIB_HUFFMAN_ONLY, ZLIB_RLE,
 * ZLIB_FIXED or
 * ZLIB_DEFAULT_STRATEGY (the default).
 *
 * A string or an array of strings
 * of the preset dictionary (default: no preset dictionary).
 * @return \DeflateContext Returns a deflate context resource (zlib.deflate) on
 * success.
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
 * Closes the given gz-file pointer.
 *
 * @param resource $stream The gz-file pointer. It must be valid, and must point to a file
 * successfully opened by gzopen.
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
 * This function compresses the given string using the ZLIB
 * data format.
 *
 * For details on the ZLIB compression algorithm see the document
 * "ZLIB Compressed Data Format
 * Specification version 3.3" (RFC 1950).
 *
 * @param string $data The data to compress.
 * @param int $level The level of compression. Can be given as 0 for no compression up to 9
 * for maximum compression.
 *
 * If -1 is used, the default compression of the zlib library is used which is 6.
 * @param int $encoding One of ZLIB_ENCODING_* constants.
 * @return string The compressed string.
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
 * This function returns a decoded version of the input
 * data.
 *
 * @param string $data The data to decode, encoded by gzencode.
 * @param int $max_length The maximum length of data to decode.
 * @return string The decoded string.
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
 * This function compresses the given string using the DEFLATE
 * data format.
 *
 * For details on the DEFLATE compression algorithm see the document
 * "DEFLATE Compressed Data Format
 * Specification version 1.3" (RFC 1951).
 *
 * @param string $data The data to deflate.
 * @param int $level The level of compression. Can be given as 0 for no compression up to 9
 * for maximum compression. If not given, the default compression level will
 * be the default compression level of the zlib library.
 * @param int $encoding One of ZLIB_ENCODING_* constants.
 * @return string The deflated string.
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
 * This function returns a compressed version of the input
 * data compatible with the output of the
 * gzip program.
 *
 * For more information on the GZIP file format, see the document:
 * GZIP file format specification
 * version 4.3 (RFC 1952).
 *
 * @param string $data The data to encode.
 * @param int $level The level of compression. Can be given as 0 for no compression up to 9
 * for maximum compression. If not given, the default compression level will
 * be the default compression level of the zlib library.
 * @param int $encoding The encoding mode. Can be FORCE_GZIP (the default)
 * or FORCE_DEFLATE.
 *
 * FORCE_DEFLATE generates
 * RFC 1950 compliant output, consisting of a zlib header, the deflated
 * data, and an Adler checksum.
 * @return string The encoded string.
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
 * This function is identical to readgzfile, except that
 * it returns the file in an array.
 *
 * @param string $filename The file name.
 * @param int $use_include_path You can set this optional parameter to 1, if you
 * want to search for the file in the include_path too.
 * @return list An array containing the file, one line per cell, empty lines included, and with newlines still attached.
 * @throws ZlibException
 *
 */
function gzfile(string $filename, int $use_include_path = 0): array
{
    error_clear_last();
    $safeResult = \gzfile($filename, $use_include_path);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets a (uncompressed) string of up to length - 1 bytes read from the given
 * file pointer. Reading ends when length - 1 bytes have been read, on a
 * newline, or on EOF (whichever comes first).
 *
 * @param resource $stream The gz-file pointer. It must be valid, and must point to a file
 * successfully opened by gzopen.
 * @param int|null $length The length of data to get.
 * @return string The uncompressed string.
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
 * This function inflates a deflated string.
 *
 * @param string $data The data compressed by gzdeflate.
 * @param int $max_length The maximum length of data to decode.
 * @return string The original uncompressed data.
 *
 * The function will return an error if the uncompressed data is more than
 * 32768 times the length of the compressed input data
 * or more than the optional parameter max_length.
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
 * Opens a gzip (.gz) file for reading or writing.
 *
 * gzopen can be used to read a file which is
 * not in gzip format; in this case gzread will
 * directly read from the file without decompression.
 *
 * @param string $filename The file name.
 * @param string $mode As in fopen (rb or
 * wb) but can also include a compression level
 * (wb9) or a strategy: f for
 * filtered data as in wb6f, h for
 * Huffman only compression as in wb1h.
 * (See the description of deflateInit2
 * in zlib.h for
 * more information about the strategy parameter.)
 * @param int $use_include_path You can set this optional parameter to 1, if you
 * want to search for the file in the include_path too.
 * @return resource Returns a file pointer to the file opened, after that, everything you read
 * from this file descriptor will be transparently decompressed and what you
 * write gets compressed.
 *
 * If the open fails, the function returns FALSE.
 * @throws ZlibException
 *
 */
function gzopen(string $filename, string $mode, int $use_include_path = 0)
{
    error_clear_last();
    $safeResult = \gzopen($filename, $mode, $use_include_path);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Reads to EOF on the given gz-file pointer from the current position and
 * writes the (uncompressed) results to standard output.
 *
 * @param resource $stream The gz-file pointer. It must be valid, and must point to a file
 * successfully opened by gzopen.
 * @return int The number of uncompressed characters read from gz
 * and passed through to the input.
 * @throws ZlibException
 *
 */
function gzpassthru($stream): int
{
    error_clear_last();
    $safeResult = \gzpassthru($stream);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * gzread reads up to length bytes
 * from the given gz-file pointer. Reading stops when
 * length (uncompressed) bytes have been read
 * or EOF is reached, whichever comes first.
 *
 * @param resource $stream The gz-file pointer. It must be valid, and must point to a file
 * successfully opened by gzopen.
 * @param int $length The number of bytes to read.
 * @return string The data that have been read.
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
 * Sets the file position indicator of the given gz-file pointer to the
 * beginning of the file stream.
 *
 * @param resource $stream The gz-file pointer. It must be valid, and must point to a file
 * successfully opened by gzopen.
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
 * Gets the position of the given file pointer; i.e., its offset into the
 * uncompressed file stream.
 *
 * @param resource $stream The gz-file pointer. It must be valid, and must point to a file
 * successfully opened by gzopen.
 * @return int The position of the file pointer or FALSE if an error occurs.
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
 * This function uncompress a compressed string.
 *
 * @param string $data The data compressed by gzcompress.
 * @param int $max_length The maximum length of data to decode.
 * @return string The original uncompressed data.
 *
 * The function will return an error if the uncompressed data is more than
 * 32768 times the length of the compressed input data
 * or more than the optional parameter max_length.
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
 * gzwrite writes the contents of
 * data to the given gz-file.
 *
 * @param resource $stream The gz-file pointer. It must be valid, and must point to a file
 * successfully opened by gzopen.
 * @param string $data The string to write.
 * @param int|null $length The number of uncompressed bytes to write. If supplied, writing will
 * stop after length (uncompressed) bytes have been
 * written or the end of data is reached,
 * whichever comes first.
 * @return int Returns the number of (uncompressed) bytes written to the given gz-file
 * stream.
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
 *
 *
 * @param \InflateContext $context
 * @return int Returns number of bytes read so far.
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
 * Usually returns either ZLIB_OK or ZLIB_STREAM_END.
 *
 * @param \InflateContext $context
 * @return int Returns decompression status.
 * @throws ZlibException
 *
 */
function inflate_get_status(\InflateContext $context): int
{
    error_clear_last();
    $safeResult = \inflate_get_status($context);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Incrementally inflates encoded data in the specified context.
 *
 * Limitation: header information from GZIP compressed data are not made
 * available.
 *
 * @param \InflateContext $context A context created with inflate_init.
 * @param string $data A chunk of compressed data.
 * @param int $flush_mode One of ZLIB_BLOCK,
 * ZLIB_NO_FLUSH,
 * ZLIB_PARTIAL_FLUSH,
 * ZLIB_SYNC_FLUSH (default),
 * ZLIB_FULL_FLUSH, ZLIB_FINISH.
 * Normally you will want to set ZLIB_NO_FLUSH to
 * maximize compression, and ZLIB_FINISH to terminate
 * with the last chunk of data. See the zlib manual for a
 * detailed description of these constants.
 * @return string Returns a chunk of uncompressed data.
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
 * Initialize an incremental inflate context with the specified
 * encoding.
 *
 * @param int $encoding One of the ZLIB_ENCODING_* constants.
 * @param array $options An associative array which may contain the following elements:
 *
 *
 * level
 *
 *
 * The compression level in range -1..9; defaults to -1.
 *
 *
 *
 *
 * memory
 *
 *
 * The compression memory level in range 1..9; defaults to 8.
 *
 *
 *
 *
 * window
 *
 *
 * The zlib window size (logarithmic) in range 8..15; defaults to 15.
 *
 *
 *
 *
 * strategy
 *
 *
 * One of ZLIB_FILTERED,
 * ZLIB_HUFFMAN_ONLY, ZLIB_RLE,
 * ZLIB_FIXED or
 * ZLIB_DEFAULT_STRATEGY (the default).
 *
 *
 *
 *
 * dictionary
 *
 *
 * A string or an array of strings
 * of the preset dictionary (default: no preset dictionary).
 *
 *
 *
 *
 *
 * The compression level in range -1..9; defaults to -1.
 *
 * The compression memory level in range 1..9; defaults to 8.
 *
 * The zlib window size (logarithmic) in range 8..15; defaults to 15.
 *
 * One of ZLIB_FILTERED,
 * ZLIB_HUFFMAN_ONLY, ZLIB_RLE,
 * ZLIB_FIXED or
 * ZLIB_DEFAULT_STRATEGY (the default).
 *
 * A string or an array of strings
 * of the preset dictionary (default: no preset dictionary).
 * @return \InflateContext Returns an inflate context resource (zlib.inflate) on
 * success.
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
 * Reads a file, decompresses it and writes it to standard output.
 *
 * readgzfile can be used to read a file which is not in
 * gzip format; in this case readgzfile will directly
 * read from the file without decompression.
 *
 * @param string $filename The file name. This file will be opened from the filesystem and its
 * contents written to standard output.
 * @param int $use_include_path You can set this optional parameter to 1, if you
 * want to search for the file in the include_path too.
 * @return 0|positive-int Returns the number of (uncompressed) bytes read from the file on success
 * @throws ZlibException
 *
 */
function readgzfile(string $filename, int $use_include_path = 0): int
{
    error_clear_last();
    $safeResult = \readgzfile($filename, $use_include_path);
    if ($safeResult === false) {
        throw ZlibException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Uncompress any raw/gzip/zlib encoded data.
 *
 * @param string $data
 * @param int $max_length
 * @return string Returns the uncompressed data.
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
