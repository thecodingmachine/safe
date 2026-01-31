<?php

namespace Safe;

use Safe\Exceptions\ImapException;

/**
 * @param string $string
 * @return string
 * @throws ImapException
 *
 */
function imap_8bit(string $string): string
{
    error_clear_last();
    $safeResult = \imap_8bit($string);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $folder
 * @param string $message
 * @param null|string $options
 * @param null|string $internal_date
 * @throws ImapException
 *
 */
function imap_append(\IMAP\Connection $imap, string $folder, string $message, ?string $options = null, ?string $internal_date = null): void
{
    error_clear_last();
    if ($internal_date !== null) {
        $safeResult = \imap_append($imap, $folder, $message, $options, $internal_date);
    } elseif ($options !== null) {
        $safeResult = \imap_append($imap, $folder, $message, $options);
    } else {
        $safeResult = \imap_append($imap, $folder, $message);
    }
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param string $string
 * @return string
 * @throws ImapException
 *
 */
function imap_base64(string $string): string
{
    error_clear_last();
    $safeResult = \imap_base64($string);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $string
 * @return string
 * @throws ImapException
 *
 */
function imap_binary(string $string): string
{
    error_clear_last();
    $safeResult = \imap_binary($string);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $message_num
 * @param int $flags
 * @return string
 * @throws ImapException
 *
 */
function imap_body(\IMAP\Connection $imap, int $message_num, int $flags = 0): string
{
    error_clear_last();
    $safeResult = \imap_body($imap, $message_num, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $message_num
 * @param string $section
 * @return \stdClass
 * @throws ImapException
 *
 */
function imap_bodystruct(\IMAP\Connection $imap, int $message_num, string $section): \stdClass
{
    error_clear_last();
    $safeResult = \imap_bodystruct($imap, $message_num, $section);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @return \stdClass
 * @throws ImapException
 *
 */
function imap_check(\IMAP\Connection $imap): \stdClass
{
    error_clear_last();
    $safeResult = \imap_check($imap);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $sequence
 * @param string $flag
 * @param int $options
 * @throws ImapException
 *
 */
function imap_clearflag_full(\IMAP\Connection $imap, string $sequence, string $flag, int $options = 0): void
{
    error_clear_last();
    $safeResult = \imap_clearflag_full($imap, $sequence, $flag, $options);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param int $flags
 * @throws ImapException
 *
 */
function imap_close(\IMAP\Connection $imap, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \imap_close($imap, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $mailbox
 * @throws ImapException
 *
 */
function imap_createmailbox(\IMAP\Connection $imap, string $mailbox): void
{
    error_clear_last();
    $safeResult = \imap_createmailbox($imap, $mailbox);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $mailbox
 * @throws ImapException
 *
 */
function imap_deletemailbox(\IMAP\Connection $imap, string $mailbox): void
{
    error_clear_last();
    $safeResult = \imap_deletemailbox($imap, $mailbox);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $sequence
 * @param int $flags
 * @return array
 * @throws ImapException
 *
 */
function imap_fetch_overview(\IMAP\Connection $imap, string $sequence, int $flags = 0): array
{
    error_clear_last();
    $safeResult = \imap_fetch_overview($imap, $sequence, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $message_num
 * @param string $section
 * @param int $flags
 * @return string
 * @throws ImapException
 *
 */
function imap_fetchbody(\IMAP\Connection $imap, int $message_num, string $section, int $flags = 0): string
{
    error_clear_last();
    $safeResult = \imap_fetchbody($imap, $message_num, $section, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $message_num
 * @param int $flags
 * @return string
 * @throws ImapException
 *
 */
function imap_fetchheader(\IMAP\Connection $imap, int $message_num, int $flags = 0): string
{
    error_clear_last();
    $safeResult = \imap_fetchheader($imap, $message_num, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $message_num
 * @param string $section
 * @param int $flags
 * @return string
 * @throws ImapException
 *
 */
function imap_fetchmime(\IMAP\Connection $imap, int $message_num, string $section, int $flags = 0): string
{
    error_clear_last();
    $safeResult = \imap_fetchmime($imap, $message_num, $section, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $message_num
 * @param int $flags
 * @return \stdClass
 * @throws ImapException
 *
 */
function imap_fetchstructure(\IMAP\Connection $imap, int $message_num, int $flags = 0): \stdClass
{
    error_clear_last();
    $safeResult = \imap_fetchstructure($imap, $message_num, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $flags
 * @throws ImapException
 *
 */
function imap_gc(\IMAP\Connection $imap, int $flags): void
{
    error_clear_last();
    $safeResult = \imap_gc($imap, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $mailbox
 * @return array
 * @throws ImapException
 *
 */
function imap_getacl(\IMAP\Connection $imap, string $mailbox): array
{
    error_clear_last();
    $safeResult = \imap_getacl($imap, $mailbox);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $reference
 * @param string $pattern
 * @return array
 * @throws ImapException
 *
 */
function imap_getmailboxes(\IMAP\Connection $imap, string $reference, string $pattern): array
{
    error_clear_last();
    $safeResult = \imap_getmailboxes($imap, $reference, $pattern);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $reference
 * @param string $pattern
 * @return array
 * @throws ImapException
 *
 */
function imap_getsubscribed(\IMAP\Connection $imap, string $reference, string $pattern): array
{
    error_clear_last();
    $safeResult = \imap_getsubscribed($imap, $reference, $pattern);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int $message_num
 * @param int $from_length
 * @param int $subject_length
 * @return \stdClass
 * @throws ImapException
 *
 */
function imap_headerinfo(\IMAP\Connection $imap, int $message_num, int $from_length = 0, int $subject_length = 0): \stdClass
{
    error_clear_last();
    $safeResult = \imap_headerinfo($imap, $message_num, $from_length, $subject_length);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @return array
 * @throws ImapException
 *
 */
function imap_headers(\IMAP\Connection $imap): array
{
    error_clear_last();
    $safeResult = \imap_headers($imap);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $reference
 * @param string $pattern
 * @param string $content
 * @return array
 * @throws ImapException
 *
 */
function imap_listscan(\IMAP\Connection $imap, string $reference, string $pattern, string $content): array
{
    error_clear_last();
    $safeResult = \imap_listscan($imap, $reference, $pattern, $content);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $reference
 * @param string $pattern
 * @return array
 * @throws ImapException
 *
 */
function imap_lsub(\IMAP\Connection $imap, string $reference, string $pattern): array
{
    error_clear_last();
    $safeResult = \imap_lsub($imap, $reference, $pattern);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param array $envelope
 * @param array $bodies
 * @return string
 * @throws ImapException
 *
 */
function imap_mail_compose(array $envelope, array $bodies): string
{
    error_clear_last();
    $safeResult = \imap_mail_compose($envelope, $bodies);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $message_nums
 * @param string $mailbox
 * @param int $flags
 * @throws ImapException
 *
 */
function imap_mail_copy(\IMAP\Connection $imap, string $message_nums, string $mailbox, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \imap_mail_copy($imap, $message_nums, $mailbox, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $message_nums
 * @param string $mailbox
 * @param int $flags
 * @throws ImapException
 *
 */
function imap_mail_move(\IMAP\Connection $imap, string $message_nums, string $mailbox, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \imap_mail_move($imap, $message_nums, $mailbox, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param string $to
 * @param string $subject
 * @param string $message
 * @param null|string $additional_headers
 * @param null|string $cc
 * @param null|string $bcc
 * @param null|string $return_path
 * @throws ImapException
 *
 */
function imap_mail(string $to, string $subject, string $message, ?string $additional_headers = null, ?string $cc = null, ?string $bcc = null, ?string $return_path = null): void
{
    error_clear_last();
    if ($return_path !== null) {
        $safeResult = \imap_mail($to, $subject, $message, $additional_headers, $cc, $bcc, $return_path);
    } elseif ($bcc !== null) {
        $safeResult = \imap_mail($to, $subject, $message, $additional_headers, $cc, $bcc);
    } elseif ($cc !== null) {
        $safeResult = \imap_mail($to, $subject, $message, $additional_headers, $cc);
    } elseif ($additional_headers !== null) {
        $safeResult = \imap_mail($to, $subject, $message, $additional_headers);
    } else {
        $safeResult = \imap_mail($to, $subject, $message);
    }
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @return \stdClass
 * @throws ImapException
 *
 */
function imap_mailboxmsginfo(\IMAP\Connection $imap): \stdClass
{
    error_clear_last();
    $safeResult = \imap_mailboxmsginfo($imap);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $string
 * @return array
 * @throws ImapException
 *
 */
function imap_mime_header_decode(string $string): array
{
    error_clear_last();
    $safeResult = \imap_mime_header_decode($string);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $string
 * @return string
 * @throws ImapException
 *
 */
function imap_mutf7_to_utf8(string $string): string
{
    error_clear_last();
    $safeResult = \imap_mutf7_to_utf8($string);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @return int
 * @throws ImapException
 *
 */
function imap_num_msg(\IMAP\Connection $imap): int
{
    error_clear_last();
    $safeResult = \imap_num_msg($imap);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $mailbox
 * @param string $user
 * @param string $password
 * @param int $flags
 * @param int $retries
 * @param array $options
 * @return \IMAP\Connection
 * @throws ImapException
 *
 */
function imap_open(string $mailbox, string $user, string $password, int $flags = 0, int $retries = 0, array $options = []): \IMAP\Connection
{
    error_clear_last();
    $safeResult = \imap_open($mailbox, $user, $password, $flags, $retries, $options);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $string
 * @return string
 * @throws ImapException
 *
 */
function imap_qprint(string $string): string
{
    error_clear_last();
    $safeResult = \imap_qprint($string);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $from
 * @param string $to
 * @throws ImapException
 *
 */
function imap_renamemailbox(\IMAP\Connection $imap, string $from, string $to): void
{
    error_clear_last();
    $safeResult = \imap_renamemailbox($imap, $from, $to);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param null|string $mailbox
 * @param null|string $hostname
 * @param null|string $personal
 * @return string
 * @throws ImapException
 *
 */
function imap_rfc822_write_address(?string $mailbox, ?string $hostname, ?string $personal): string
{
    error_clear_last();
    $safeResult = \imap_rfc822_write_address($mailbox, $hostname, $personal);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param int|resource|string $file
 * @param int $message_num
 * @param string $section
 * @param int $flags
 * @throws ImapException
 *
 */
function imap_savebody(\IMAP\Connection $imap, $file, int $message_num, string $section = "", int $flags = 0): void
{
    error_clear_last();
    $safeResult = \imap_savebody($imap, $file, $message_num, $section, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $quota_root
 * @param int $mailbox_size
 * @throws ImapException
 *
 */
function imap_set_quota(\IMAP\Connection $imap, string $quota_root, int $mailbox_size): void
{
    error_clear_last();
    $safeResult = \imap_set_quota($imap, $quota_root, $mailbox_size);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $mailbox
 * @param string $user_id
 * @param string $rights
 * @throws ImapException
 *
 */
function imap_setacl(\IMAP\Connection $imap, string $mailbox, string $user_id, string $rights): void
{
    error_clear_last();
    $safeResult = \imap_setacl($imap, $mailbox, $user_id, $rights);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $sequence
 * @param string $flag
 * @param int $options
 * @throws ImapException
 *
 */
function imap_setflag_full(\IMAP\Connection $imap, string $sequence, string $flag, int $options = 0): void
{
    error_clear_last();
    $safeResult = \imap_setflag_full($imap, $sequence, $flag, $options);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param int $criteria
 * @param int $reverse
 * @param int $flags
 * @param null|string $search_criteria
 * @param null|string $charset
 * @return array
 * @throws ImapException
 *
 */
function imap_sort(\IMAP\Connection $imap, int $criteria, int $reverse, int $flags = 0, ?string $search_criteria = null, ?string $charset = null): array
{
    error_clear_last();
    if ($charset !== null) {
        $safeResult = \imap_sort($imap, $criteria, $reverse, $flags, $search_criteria, $charset);
    } elseif ($search_criteria !== null) {
        $safeResult = \imap_sort($imap, $criteria, $reverse, $flags, $search_criteria);
    } else {
        $safeResult = \imap_sort($imap, $criteria, $reverse, $flags);
    }
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $mailbox
 * @param int $flags
 * @return \stdClass
 * @throws ImapException
 *
 */
function imap_status(\IMAP\Connection $imap, string $mailbox, int $flags): \stdClass
{
    error_clear_last();
    $safeResult = \imap_status($imap, $mailbox, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $mailbox
 * @throws ImapException
 *
 */
function imap_subscribe(\IMAP\Connection $imap, string $mailbox): void
{
    error_clear_last();
    $safeResult = \imap_subscribe($imap, $mailbox);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param int $flags
 * @return array
 * @throws ImapException
 *
 */
function imap_thread(\IMAP\Connection $imap, int $flags = SE_FREE): array
{
    error_clear_last();
    $safeResult = \imap_thread($imap, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param int $timeout_type
 * @param int $timeout
 * @return mixed
 * @throws ImapException
 *
 */
function imap_timeout(int $timeout_type, int $timeout = -1)
{
    error_clear_last();
    $safeResult = \imap_timeout($timeout_type, $timeout);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param \IMAP\Connection $imap
 * @param string $message_nums
 * @param int $flags
 * @throws ImapException
 *
 */
function imap_undelete(\IMAP\Connection $imap, string $message_nums, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \imap_undelete($imap, $message_nums, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param \IMAP\Connection $imap
 * @param string $mailbox
 * @throws ImapException
 *
 */
function imap_unsubscribe(\IMAP\Connection $imap, string $mailbox): void
{
    error_clear_last();
    $safeResult = \imap_unsubscribe($imap, $mailbox);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * @param string $string
 * @return string
 * @throws ImapException
 *
 */
function imap_utf8_to_mutf7(string $string): string
{
    error_clear_last();
    $safeResult = \imap_utf8_to_mutf7($string);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
    return $safeResult;
}
