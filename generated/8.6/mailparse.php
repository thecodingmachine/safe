<?php

namespace Safe;

use Safe\Exceptions\MailparseException;

/**
 * @param resource $mimemail
 * @param mixed $filename
 * @param callable $callbackfunc
 * @return string
 * @throws MailparseException
 *
 */
function mailparse_msg_extract_part_file($mimemail, $filename, ?callable $callbackfunc = null): string
{
    error_clear_last();
    if ($callbackfunc !== null) {
        $safeResult = \mailparse_msg_extract_part_file($mimemail, $filename, $callbackfunc);
    } else {
        $safeResult = \mailparse_msg_extract_part_file($mimemail, $filename);
    }
    if ($safeResult === false) {
        throw MailparseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $mimemail
 * @throws MailparseException
 *
 */
function mailparse_msg_free($mimemail): void
{
    error_clear_last();
    $safeResult = \mailparse_msg_free($mimemail);
    if ($safeResult === false) {
        throw MailparseException::createFromPhpError();
    }
}


/**
 * @param string $filename
 * @return resource
 * @throws MailparseException
 *
 */
function mailparse_msg_parse_file(string $filename)
{
    error_clear_last();
    $safeResult = \mailparse_msg_parse_file($filename);
    if ($safeResult === false) {
        throw MailparseException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $mimemail
 * @param string $data
 * @throws MailparseException
 *
 */
function mailparse_msg_parse($mimemail, string $data): void
{
    error_clear_last();
    $safeResult = \mailparse_msg_parse($mimemail, $data);
    if ($safeResult === false) {
        throw MailparseException::createFromPhpError();
    }
}


/**
 * @param resource $sourcefp
 * @param resource $destfp
 * @param string $encoding
 * @throws MailparseException
 *
 */
function mailparse_stream_encode($sourcefp, $destfp, string $encoding): void
{
    error_clear_last();
    $safeResult = \mailparse_stream_encode($sourcefp, $destfp, $encoding);
    if ($safeResult === false) {
        throw MailparseException::createFromPhpError();
    }
}
