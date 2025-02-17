<?php

namespace Safe;

use Safe\Exceptions\ImapException;

/**
 * Convert an 8bit string to a quoted-printable string (according to
 * RFC2045, section 6.7).
 *
 * @param string $string The 8bit string to convert
 * @return string Returns a quoted-printable string.
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
 * Appends a string message to the specified folder.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $folder The mailbox name, see imap_open for more
 * information
 * @param string $message The message to be append, as a string
 *
 * When talking to the Cyrus IMAP server, you must use "\r\n" as
 * your end-of-line terminator instead of "\n" or the operation will
 * fail
 * @param null|string $options If provided, the options will also be written
 * to the folder
 * @param null|string $internal_date If this parameter is set, it will set the INTERNALDATE on the appended message.  The parameter should be a date string that conforms to the rfc2060 specifications for a date_time value.
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
 * Decodes the given BASE-64 encoded string.
 *
 * @param string $string The encoded text
 * @return string Returns the decoded message as a string.
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
 * Convert an 8bit string to a base64 string according to RFC2045, Section 6.8.
 *
 * @param string $string The 8bit string
 * @return string Returns a base64 encoded string.
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
 * imap_body returns the body of the message,
 * numbered message_num in the current
 * mailbox.
 *
 * imap_body will only return a verbatim copy of the
 * message body. To extract single parts of a multipart MIME-encoded
 * message you have to use imap_fetchstructure to
 * analyze its structure and imap_fetchbody to
 * extract a copy of a single body component.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $message_num The message number
 * @param int $flags The optional flags are a bit mask
 * with one or more of the following:
 *
 *
 *
 * FT_UID - The message_num is a UID
 *
 *
 *
 *
 * FT_PEEK - Do not set the \Seen flag if not already set
 *
 *
 *
 *
 * FT_INTERNAL - The return string is in internal format, will
 * not canonicalize to CRLF.
 *
 *
 *
 * @return string Returns the body of the specified message, as a string.
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
 * Read the structure of a specified body section of a specific message.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $message_num The message number
 * @param string $section The body section to read
 * @return \stdClass Returns the information in an object.
 * For a detailed description
 * of the object structure and properties see
 * imap_fetchstructure.
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
 * Checks information about the current mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @return \stdClass Returns the information in an object with following properties:
 *
 *
 *
 * Date - current system time formatted according to RFC2822
 *
 *
 *
 *
 * Driver - protocol used to access this mailbox:
 * POP3, IMAP, NNTP
 *
 *
 *
 *
 * Mailbox - the mailbox name
 *
 *
 *
 *
 * Nmsgs - number of messages in the mailbox
 *
 *
 *
 *
 * Recent - number of recent messages in the mailbox
 *
 *
 *
 *
 * Returns FALSE on failure.
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
 * This function causes a store to delete the specified
 * flag to the flags set for the
 * messages in the specified sequence.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $sequence A sequence of message numbers. You can enumerate desired messages
 * with the X,Y syntax, or retrieve all messages
 * within an interval with the X:Y syntax
 * @param string $flag The flags which you can unset are "\\Seen", "\\Answered", "\\Flagged",
 * "\\Deleted", and "\\Draft" (as defined by RFC2060)
 * @param int $options options are a bit mask and may contain
 * the single option:
 *
 *
 *
 * ST_UID - The sequence argument contains UIDs
 * instead of sequence numbers
 *
 *
 *
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
 * Closes the imap stream.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $flags If set to CL_EXPUNGE, the function will silently
 * expunge the mailbox before closing, removing all messages marked for
 * deletion. You can achieve the same thing by using
 * imap_expunge
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
 * Creates a new mailbox specified by mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $mailbox The mailbox name, see imap_open for more
 * information. Names containing international characters should be
 * encoded by imap_utf7_encode
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
 * Deletes the specified mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
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
 * This function fetches mail headers for the given
 * sequence and returns an overview of their
 * contents.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $sequence A message sequence description. You can enumerate desired messages
 * with the X,Y syntax, or retrieve all messages
 * within an interval with the X:Y syntax
 * @param int $flags sequence will contain a sequence of message
 * indices or UIDs, if this parameter is set to
 * FT_UID.
 * @return array Returns an array of objects describing one message header each.
 * The object will only define a property if it exists. The possible
 * properties are:
 *
 *
 *
 * subject - the messages subject
 *
 *
 *
 *
 * from - who sent it
 *
 *
 *
 *
 * to - recipient
 *
 *
 *
 *
 * date - when was it sent
 *
 *
 *
 *
 * message_id - Message-ID
 *
 *
 *
 *
 * references - is a reference to this message id
 *
 *
 *
 *
 * in_reply_to - is a reply to this message id
 *
 *
 *
 *
 * size - size in bytes
 *
 *
 *
 *
 * uid - UID the message has in the mailbox
 *
 *
 *
 *
 * msgno - message sequence number in the mailbox
 *
 *
 *
 *
 * recent - this message is flagged as recent
 *
 *
 *
 *
 * flagged -  this message is flagged
 *
 *
 *
 *
 * answered -  this message is flagged as answered
 *
 *
 *
 *
 * deleted -  this message is flagged for deletion
 *
 *
 *
 *
 * seen -  this message is flagged as already read
 *
 *
 *
 *
 * draft -  this message is flagged as being a draft
 *
 *
 *
 *
 * udate -  the UNIX timestamp of the arrival date
 *
 *
 *
 * The function returns FALSE on failure.
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
 * Fetch of a particular section of the body of the specified messages.
 * Body parts are not decoded by this function.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $message_num The message number
 * @param string $section The part number. It is a string of integers delimited by period which
 * index into a body part list as per the IMAP4 specification
 * @param int $flags A bitmask with one or more of the following:
 *
 *
 *
 * FT_UID - The message_num is a UID
 *
 *
 *
 *
 * FT_PEEK - Do not set the \Seen flag if
 * not already set
 *
 *
 *
 *
 * FT_INTERNAL - The return string is in
 * internal format, will not canonicalize to CRLF.
 *
 *
 *
 * @return string Returns a particular section of the body of the specified messages as a
 * text string.
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
 * This function causes a fetch of the complete, unfiltered RFC2822 format header of the specified
 * message.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $message_num The message number
 * @param int $flags The possible flags are:
 *
 *
 *
 * FT_UID - The message_num
 * argument is a UID
 *
 *
 *
 *
 * FT_INTERNAL - The return string
 * is in "internal" format, without any attempt to
 * canonicalize to CRLF newlines
 *
 *
 *
 *
 * FT_PREFETCHTEXT - The RFC822.TEXT
 * should be pre-fetched at the same time.  This avoids an
 * extra RTT on an IMAP connection if a full message text is
 * desired (e.g. in a "save to local file" operation)
 *
 *
 *
 * @return string Returns the header of the specified message as a text string.
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
 * Fetch the MIME headers of a particular section of the body of the specified messages.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $message_num The message number
 * @param string $section The part number. It is a string of integers delimited by period which
 * index into a body part list as per the IMAP4 specification
 * @param int $flags A bitmask with one or more of the following:
 *
 *
 *
 * FT_UID - The message_num is a UID
 *
 *
 *
 *
 * FT_PEEK - Do not set the \Seen flag if
 * not already set
 *
 *
 *
 *
 * FT_INTERNAL - The return string is in
 * internal format, will not canonicalize to CRLF.
 *
 *
 *
 * @return string Returns the MIME headers of a particular section of the body of the specified messages as a
 * text string.
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
 * Fetches all the structured information for a given message.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $message_num The message number
 * @param int $flags This optional parameter only has a single option,
 * FT_UID, which tells the function to treat the
 * message_num argument as a
 * UID.
 * @return \stdClass Returns an object with properties listed in the table below.
 *
 *
 *
 * Returned Object for imap_fetchstructure
 *
 *
 *
 *
 * type
 * Primary body type
 *
 *
 * encoding
 * Body transfer encoding
 *
 *
 * ifsubtype
 * TRUE if there is a subtype string
 *
 *
 * subtype
 * MIME subtype
 *
 *
 * ifdescription
 * TRUE if there is a description string
 *
 *
 * description
 * Content description string
 *
 *
 * ifid
 * TRUE if there is an identification string
 *
 *
 * id
 * Identification string
 *
 *
 * lines
 * Number of lines
 *
 *
 * bytes
 * Number of bytes
 *
 *
 * ifdisposition
 * TRUE if there is a disposition string
 *
 *
 * disposition
 * Disposition string
 *
 *
 * ifdparameters
 * TRUE if the dparameters array exists
 *
 *
 * dparameters
 * An array of objects where each object has an
 * "attribute" and a "value"
 * property corresponding to the parameters on the
 * Content-disposition MIME
 * header.
 *
 *
 * ifparameters
 * TRUE if the parameters array exists
 *
 *
 * parameters
 * An array of objects where each object has an
 * "attribute" and a "value"
 * property.
 *
 *
 * parts
 * An array of objects identical in structure to the top-level
 * object, each of which corresponds to a MIME body
 * part.
 *
 *
 *
 *
 *
 *
 * Primary body type (value may vary with used library, use of constants is recommended)
 *
 *
 * ValueTypeConstant
 *
 *
 * 0textTYPETEXT
 * 1multipartTYPEMULTIPART
 * 2messageTYPEMESSAGE
 * 3applicationTYPEAPPLICATION
 * 4audioTYPEAUDIO
 * 5imageTYPEIMAGE
 * 6videoTYPEVIDEO
 * 7modelTYPEMODEL
 * 8otherTYPEOTHER
 *
 *
 *
 *
 *
 * Transfer encodings (value may vary with used library, use of constants is recommended)
 *
 *
 * ValueTypeConstant
 *
 *
 * 07bitENC7BIT
 * 18bitENC8BIT
 * 2BinaryENCBINARY
 * 3Base64ENCBASE64
 * 4Quoted-PrintableENCQUOTEDPRINTABLE
 * 5otherENCOTHER
 *
 *
 *
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
 * Purges the cache of entries of a specific type.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $flags Specifies the cache to purge. It may one or a combination
 * of the following constants:
 * IMAP_GC_ELT (message cache elements),
 * IMAP_GC_ENV (envelope and bodies),
 * IMAP_GC_TEXTS (texts).
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
 * Gets the ACL for a given mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
 * @return array Returns an associative array of "folder" =&gt; "acl" pairs.
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
 * Gets information on the mailboxes.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $reference reference should normally be just the server
 * specification as described in imap_open
 * @param string $pattern Specifies where in the mailbox hierarchy
 * to start searching.
 *
 * There are two special characters you can
 * pass as part of the pattern:
 * '*' and '%'.
 * '*' means to return all mailboxes. If you pass
 * pattern as '*', you will
 * get a list of the entire mailbox hierarchy.
 * '%'
 * means to return the current level only.
 * '%' as the pattern
 * parameter will return only the top level
 * mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.
 * @return array Returns an array of objects containing mailbox information. Each
 * object has the attributes name, specifying
 * the full name of the mailbox; delimiter,
 * which is the hierarchy delimiter for the part of the hierarchy
 * this mailbox is in; and
 * attributes. Attributes
 * is a bitmask that can be tested against:
 *
 *
 *
 * LATT_NOINFERIORS - This mailbox not contains, and may not contain any
 * "children" (there are no mailboxes below this one). Calling
 * imap_createmailbox will not work on this mailbox.
 *
 *
 *
 *
 * LATT_NOSELECT - This is only a container,
 * not a mailbox - you cannot open it.
 *
 *
 *
 *
 * LATT_MARKED - This mailbox is marked. This means that it may
 * contain new messages since the last time it was checked. Not provided by all IMAP
 * servers.
 *
 *
 *
 *
 * LATT_UNMARKED - This mailbox is not marked, does not contain new
 * messages.  If either MARKED or UNMARKED is
 * provided, you can assume the IMAP server  supports this feature for this mailbox.
 *
 *
 *
 *
 * LATT_REFERRAL - This container has a referral to a remote mailbox.
 *
 *
 *
 *
 * LATT_HASCHILDREN - This mailbox has selectable inferiors.
 *
 *
 *
 *
 * LATT_HASNOCHILDREN - This mailbox has no selectable inferiors.
 *
 *
 *
 * The function returns FALSE on failure.
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
 * Gets information about the subscribed mailboxes.
 *
 * Identical to imap_getmailboxes, except that it only
 * returns mailboxes that the user is subscribed to.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $reference reference should normally be just the server
 * specification as described in imap_open
 * @param string $pattern Specifies where in the mailbox hierarchy
 * to start searching.
 *
 * There are two special characters you can
 * pass as part of the pattern:
 * '*' and '%'.
 * '*' means to return all mailboxes. If you pass
 * pattern as '*', you will
 * get a list of the entire mailbox hierarchy.
 * '%'
 * means to return the current level only.
 * '%' as the pattern
 * parameter will return only the top level
 * mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.
 * @return array Returns an array of objects containing mailbox information. Each
 * object has the attributes name, specifying
 * the full name of the mailbox; delimiter,
 * which is the hierarchy delimiter for the part of the hierarchy
 * this mailbox is in; and
 * attributes. Attributes
 * is a bitmask that can be tested against:
 *
 *
 *
 * LATT_NOINFERIORS - This mailbox has no
 * "children" (there are no mailboxes below this one).
 *
 *
 *
 *
 * LATT_NOSELECT - This is only a container,
 * not a mailbox - you cannot open it.
 *
 *
 *
 *
 * LATT_MARKED - This mailbox is marked.
 * Only used by UW-IMAPD.
 *
 *
 *
 *
 * LATT_UNMARKED - This mailbox is not marked.
 * Only used by UW-IMAPD.
 *
 *
 *
 *
 * LATT_REFERRAL - This container has a referral to a remote mailbox.
 *
 *
 *
 *
 * LATT_HASCHILDREN - This mailbox has selectable inferiors.
 *
 *
 *
 *
 * LATT_HASNOCHILDREN - This mailbox has no selectable inferiors.
 *
 *
 *
 * The function returns FALSE on failure.
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
 * Gets information about the given message number by reading its headers.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $message_num The message number
 * @param int $from_length Number of characters for the fetchfrom property.
 * Must be greater than or equal to zero.
 * @param int $subject_length Number of characters for the fetchsubject property
 * Must be greater than or equal to zero.
 * @return \stdClass Returns FALSE on error or, if successful, the information in an object with following properties:
 *
 *
 *
 * toaddress - full to: line, up to 1024 characters
 *
 *
 *
 *
 * to - an array of objects from the To: line, with the following
 * properties: personal, adl,
 * mailbox, and host
 *
 *
 *
 *
 * fromaddress - full from: line, up to 1024 characters
 *
 *
 *
 *
 * from - an array of objects from the From: line, with the following
 * properties: personal, adl,
 * mailbox, and host
 *
 *
 *
 *
 * ccaddress - full cc: line, up to 1024 characters
 *
 *
 *
 *
 * cc - an array of objects from the Cc: line, with the following
 * properties: personal, adl,
 * mailbox, and host
 *
 *
 *
 *
 * bccaddress - full bcc: line, up to 1024 characters
 *
 *
 *
 *
 * bcc - an array of objects from the Bcc: line, with the following
 * properties: personal, adl,
 * mailbox, and host
 *
 *
 *
 *
 * reply_toaddress - full Reply-To: line, up to 1024 characters
 *
 *
 *
 *
 * reply_to - an array of objects from the Reply-To: line, with the following
 * properties: personal, adl,
 * mailbox, and host
 *
 *
 *
 *
 * senderaddress - full sender: line, up to 1024 characters
 *
 *
 *
 *
 * sender - an array of objects from the Sender: line, with the following
 * properties: personal, adl,
 * mailbox, and host
 *
 *
 *
 *
 * return_pathaddress - full Return-Path: line, up to 1024 characters
 *
 *
 *
 *
 * return_path - an array of objects from the Return-Path: line, with the
 * following properties: personal,
 * adl, mailbox, and
 * host
 *
 *
 *
 *
 * remail -
 *
 *
 *
 *
 * date - The message date as found in its headers
 *
 *
 *
 *
 * Date - Same as date
 *
 *
 *
 *
 * subject - The message subject
 *
 *
 *
 *
 * Subject - Same as subject
 *
 *
 *
 *
 * in_reply_to -
 *
 *
 *
 *
 * message_id -
 *
 *
 *
 *
 * newsgroups -
 *
 *
 *
 *
 * followup_to -
 *
 *
 *
 *
 * references -
 *
 *
 *
 *
 * Recent - R if recent and seen, N
 * if recent and not seen, ' ' if not recent.
 *
 *
 *
 *
 * Unseen - U if not seen AND not recent, ' ' if seen
 * OR not seen and recent
 *
 *
 *
 *
 * Flagged - F if flagged, ' ' if not flagged
 *
 *
 *
 *
 * Answered - A if answered, ' ' if unanswered
 *
 *
 *
 *
 * Deleted - D if deleted, ' ' if not deleted
 *
 *
 *
 *
 * Draft - X if draft, ' ' if not draft
 *
 *
 *
 *
 * Msgno - The message number
 *
 *
 *
 *
 * MailDate -
 *
 *
 *
 *
 * Size - The message size
 *
 *
 *
 *
 * udate - mail message date in Unix time
 *
 *
 *
 *
 * fetchfrom - from line formatted to fit from_length
 * characters
 *
 *
 *
 *
 * fetchsubject - subject line formatted to fit
 * subject_length characters
 *
 *
 *
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
 * Returns headers for all messages in a mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @return array Returns an array of string formatted with header info. One
 * element per mail message.
 * Returns FALSE on failure.
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
 * Returns an array containing the names of the mailboxes that have
 * content in the text of the mailbox.
 *
 * This function is similar to imap_listmailbox,
 * but it will additionally check for the presence of the string
 * content inside the mailbox data.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $reference reference should normally be just the server
 * specification as described in imap_open
 * @param string $pattern Specifies where in the mailbox hierarchy
 * to start searching.
 *
 * There are two special characters you can
 * pass as part of the pattern:
 * '*' and '%'.
 * '*' means to return all mailboxes. If you pass
 * pattern as '*', you will
 * get a list of the entire mailbox hierarchy.
 * '%'
 * means to return the current level only.
 * '%' as the pattern
 * parameter will return only the top level
 * mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.
 * @param string $content The searched string
 * @return array Returns an array containing the names of the mailboxes that have
 * content in the text of the mailbox.
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
 * Gets an array of all the mailboxes that you have subscribed.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $reference reference should normally be just the server
 * specification as described in imap_open
 * @param string $pattern Specifies where in the mailbox hierarchy
 * to start searching.
 *
 * There are two special characters you can
 * pass as part of the pattern:
 * '*' and '%'.
 * '*' means to return all mailboxes. If you pass
 * pattern as '*', you will
 * get a list of the entire mailbox hierarchy.
 * '%'
 * means to return the current level only.
 * '%' as the pattern
 * parameter will return only the top level
 * mailboxes; '~/mail/%' on UW_IMAPD will return every mailbox in the ~/mail directory, but none in subfolders of that directory.
 * @return array Returns an array of all the subscribed mailboxes.
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
 * Create a MIME message based on the given envelope
 * and bodies sections.
 *
 * @param array $envelope An associative array of header fields. Valid keys are: "remail",
 * "return_path", "date", "from", "reply_to", "in_reply_to", "subject",
 * "to", "cc", "bcc" and "message_id", which set the respective message headers to the given string.
 * To set additional headers, the key "custom_headers" is supported, which expects
 * an array of those headers, e.g. ["User-Agent: My Mail Client"].
 * @param array $bodies An indexed array of bodies. The first body is the main body of the message;
 * only if it has a type of TYPEMULTIPART, further bodies
 * are processed; these bodies constitute the bodies of the parts.
 *
 *
 * Body Array Structure
 *
 *
 *
 * Key
 * Type
 * Description
 *
 *
 *
 *
 * type
 * int
 *
 * The MIME type.
 * One of TYPETEXT (default), TYPEMULTIPART,
 * TYPEMESSAGE, TYPEAPPLICATION,
 * TYPEAUDIO, TYPEIMAGE,
 * TYPEMODEL or TYPEOTHER.
 *
 *
 *
 * encoding
 * int
 *
 * The Content-Transfer-Encoding.
 * One of ENC7BIT (default), ENC8BIT,
 * ENCBINARY, ENCBASE64,
 * ENCQUOTEDPRINTABLE or ENCOTHER.
 *
 *
 *
 * charset
 * string
 * The charset parameter of the MIME type.
 *
 *
 * type.parameters
 * array
 * An associative array of Content-Type parameter names and their values.
 *
 *
 * subtype
 * string
 * The MIME subtype, e.g. 'jpeg' for TYPEIMAGE.
 *
 *
 * id
 * string
 * The Content-ID.
 *
 *
 * description
 * string
 * The Content-Description.
 *
 *
 * disposition.type
 * string
 * The Content-Disposition, e.g. 'attachment'.
 *
 *
 * disposition
 * array
 * An associative array of Content-Disposition parameter names and values.
 *
 *
 * contents.data
 * string
 * The payload.
 *
 *
 * lines
 * int
 * The size of the payload in lines.
 *
 *
 * bytes
 * int
 * The size of the payload in bytes.
 *
 *
 * md5
 * string
 * The MD5 checksum of the payload.
 *
 *
 *
 *
 * @return string Returns the MIME message as string.
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
 * Copies mail messages specified by message_nums
 * to specified mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $message_nums message_nums is a range not just message
 * numbers (as described in RFC2060).
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
 * @param int $flags flags is a bitmask of one or more of
 *
 *
 *
 * CP_UID - the sequence numbers contain UIDS
 *
 *
 *
 *
 * CP_MOVE - Delete the messages from
 * the current mailbox after copying
 *
 *
 *
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
 * Moves mail messages specified by message_nums to the
 * specified mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $message_nums message_nums is a range not just message numbers
 * (as described in RFC2060).
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
 * @param int $flags flags is a bitmask and may contain the single option:
 *
 *
 *
 * CP_UID - the sequence numbers contain UIDS
 *
 *
 *
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
 * This function allows sending of emails with correct handling of
 * Cc and Bcc receivers.
 *
 * The parameters to, cc
 * and bcc are all strings and are all parsed
 * as RFC822 address lists.
 *
 * @param string $to The receiver
 * @param string $subject The mail subject
 * @param string $message The mail body, see imap_mail_compose
 * @param null|string $additional_headers As string with additional headers to be set on the mail
 * @param null|string $cc
 * @param null|string $bcc The receivers specified in bcc will get the
 * mail, but are excluded from the headers.
 * @param null|string $return_path Use this parameter to specify return path upon mail delivery failure.
 * This is useful when using PHP as a mail client for multiple users.
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
 * Checks the current mailbox status on the server. It is similar to
 * imap_status, but will additionally sum up the size of
 * all messages in the mailbox, which will take some additional time to
 * execute.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @return \stdClass Returns the information in an object with following properties:
 *
 * Mailbox properties
 *
 *
 *
 * Date
 * date of last change (current datetime)
 *
 *
 * Driver
 * driver
 *
 *
 * Mailbox
 * name of the mailbox
 *
 *
 * Nmsgs
 * number of messages
 *
 *
 * Recent
 * number of recent messages
 *
 *
 * Unread
 * number of unread messages
 *
 *
 * Deleted
 * number of deleted messages
 *
 *
 * Size
 * mailbox size
 *
 *
 *
 *
 *
 * Returns FALSE on failure.
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
 * Decodes MIME message header extensions that are non ASCII text (see RFC2047).
 *
 * @param string $string The MIME text
 * @return array The decoded elements are returned in an array of objects, where each
 * object has two properties, charset and
 * text.
 *
 * If the element hasn't been encoded, and in other words is in
 * plain US-ASCII, the charset property of that element is
 * set to default.
 *
 * The function returns FALSE on failure.
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
 * Decode a modified UTF-7 (as specified in RFC 2060, section 5.1.3) string to UTF-8.
 *
 * @param string $string A string encoded in modified UTF-7.
 * @return string Returns string converted to UTF-8.
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
 * Gets the number of messages in the current mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @return int Return the number of messages in the current mailbox, as an integer.
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
 * Opens an IMAP stream to a mailbox.
 *
 * This function can also be used to open streams to POP3 and
 * NNTP servers, but some functions and features are only
 * available on IMAP servers.
 *
 * @param string $mailbox A mailbox name consists of a server and a mailbox path on this server.
 * The special name INBOX stands for the current users
 * personal mailbox. Mailbox names that contain international characters
 * besides those in the printable ASCII space have to be encoded with
 * imap_utf7_encode.
 *
 * The server part, which is enclosed in '{' and '}', consists of the servers
 * name or ip address, an optional port (prefixed by ':'), and an optional
 * protocol specification (prefixed by '/').
 *
 * The server part is mandatory in all mailbox
 * parameters.
 *
 * All names which start with { are remote names, and are
 * in the form "{" remote_system_name [":" port] [flags] "}"
 * [mailbox_name] where:
 *
 *
 *
 * remote_system_name - Internet domain name or
 * bracketed IP address of server.
 *
 *
 *
 *
 * port - optional TCP port number, default is the
 * default port for that service
 *
 *
 *
 *
 * flags - optional flags, see following table.
 *
 *
 *
 *
 * mailbox_name - remote mailbox name, default is INBOX
 *
 *
 *
 *
 *
 * Optional flags for names
 *
 *
 *
 * Flag
 * Description
 *
 *
 *
 *
 * /service=service
 * mailbox access service, default is "imap"
 *
 *
 * /user=user
 * remote user name for login on the server
 *
 *
 * /authuser=user
 * remote authentication user; if specified this is the user name
 * whose password is used (e.g. administrator)
 *
 *
 * /anonymous
 * remote access as anonymous user
 *
 *
 * /debug
 * record protocol telemetry in application's debug log
 *
 *
 * /secure
 * do not transmit a plaintext password over the network
 *
 *
 * /imap, /imap2,
 * /imap2bis, /imap4,
 * /imap4rev1
 * equivalent to /service=imap
 *
 *
 * /pop3
 * equivalent to /service=pop3
 *
 *
 * /nntp
 * equivalent to /service=nntp
 *
 *
 * /norsh
 * do not use rsh or ssh to establish a preauthenticated IMAP
 * session
 *
 *
 * /ssl
 * use the Secure Socket Layer to encrypt the session
 *
 *
 * /validate-cert
 * validate certificates from TLS/SSL server (this is the default
 * behavior)
 *
 *
 * /novalidate-cert
 * do not validate certificates from TLS/SSL server, needed if
 * server uses self-signed certificates
 *
 *
 * /tls
 * force use of start-TLS to encrypt the session, and reject
 * connection to servers that do not support it
 *
 *
 * /notls
 * do not do start-TLS to encrypt the session, even with servers
 * that support it
 *
 *
 * /readonly
 * request read-only mailbox open (IMAP only; ignored on NNTP, and
 * an error with SMTP and POP3)
 *
 *
 *
 *
 * @param string $user The user name
 * @param string $password The password associated with the user
 * @param int $flags The flags are a bit mask with one or more of
 * the following:
 *
 *
 *
 * OP_READONLY - Open mailbox read-only
 *
 *
 *
 *
 * OP_ANONYMOUS - Don't use or update a
 * .newsrc for news (NNTP only)
 *
 *
 *
 *
 * OP_HALFOPEN - For IMAP
 * and NNTP names, open a connection but
 * don't open a mailbox.
 *
 *
 *
 *
 * CL_EXPUNGE - Expunge mailbox automatically upon mailbox close
 * (see also imap_delete and
 * imap_expunge)
 *
 *
 *
 *
 * OP_DEBUG - Debug protocol negotiations
 *
 *
 *
 *
 * OP_SHORTCACHE - Short (elt-only) caching
 *
 *
 *
 *
 * OP_SILENT - Don't pass up events (internal use)
 *
 *
 *
 *
 * OP_PROTOTYPE - Return driver prototype
 *
 *
 *
 *
 * OP_SECURE - Don't do non-secure authentication
 *
 *
 *
 * @param int $retries Number of maximum connect attempts
 * @param array $options Connection parameters, the following (string) keys maybe used
 * to set one or more connection parameters:
 *
 *
 *
 * DISABLE_AUTHENTICATOR - Disable authentication properties
 *
 *
 *
 * @return \IMAP\Connection Returns an IMAP\Connection instance on success.
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
 * Convert a quoted-printable string to an 8 bit string according to RFC2045, section 6.7.
 *
 * @param string $string A quoted-printable string
 * @return string Returns an 8 bits string.
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
 * This function renames on old mailbox to new mailbox (see
 * imap_open for the format of
 * mbox names).
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $from The old mailbox name, see imap_open for more
 * information
 * @param string $to The new mailbox name, see imap_open for more
 * information
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
 * Returns a properly formatted email address as defined in RFC2822 given the needed information.
 *
 * @param null|string $mailbox The mailbox name, see imap_open for more
 * information
 * @param null|string $hostname The email host part
 * @param null|string $personal The name of the account owner
 * @return string Returns a string properly formatted email address as defined in RFC2822.
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
 * Saves a part or the whole body of the specified message.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int|resource|string $file The path to the saved file as a string, or a valid file descriptor
 * returned by fopen.
 * @param int $message_num The message number
 * @param string $section The part number. It is a string of integers delimited by period which
 * index into a body part list as per the IMAP4 specification
 * @param int $flags A bitmask with one or more of the following:
 *
 *
 *
 * FT_UID - The message_num is a UID
 *
 *
 *
 *
 * FT_PEEK - Do not set the \Seen flag if
 * not already set
 *
 *
 *
 *
 * FT_INTERNAL - The return string is in
 * internal format, will not canonicalize to CRLF.
 *
 *
 *
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
 * Sets an upper limit quota on a per mailbox basis.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $quota_root The mailbox to have a quota set. This should follow the IMAP standard
 * format for a mailbox: user.name.
 * @param int $mailbox_size The maximum size (in KB) for the quota_root
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
 * Sets the ACL for a giving mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
 * @param string $user_id The user to give the rights to.
 * @param string $rights The rights to give to the user. Passing an empty string will delete
 * acl.
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
 * Causes a store to add the specified flag to the
 * flags set for the messages in the specified
 * sequence.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $sequence A sequence of message numbers. You can enumerate desired messages
 * with the X,Y syntax, or retrieve all messages
 * within an interval with the X:Y syntax
 * @param string $flag The flags which you can set are \Seen,
 * \Answered, \Flagged,
 * \Deleted, and \Draft as
 * defined by RFC2060.
 * @param int $options A bit mask that may contain the single option:
 *
 *
 *
 * ST_UID - The sequence argument contains UIDs
 * instead of sequence numbers
 *
 *
 *
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
 * Gets and sorts message numbers by the given parameters.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $criteria Criteria can be one (and only one) of the following:
 *
 *
 *
 * SORTDATE - message Date
 *
 *
 *
 *
 * SORTARRIVAL - arrival date
 *
 *
 *
 *
 * SORTFROM - mailbox in first From address
 *
 *
 *
 *
 * SORTSUBJECT - message subject
 *
 *
 *
 *
 * SORTTO - mailbox in first To address
 *
 *
 *
 *
 * SORTCC - mailbox in first cc address
 *
 *
 *
 *
 * SORTSIZE - size of message in octets
 *
 *
 *
 * @param int $reverse Whether to sort in reverse order.
 * @param int $flags The flags are a bitmask of one or more of the
 * following:
 *
 *
 *
 * SE_UID - Return UIDs instead of sequence numbers
 *
 *
 *
 *
 * SE_NOPREFETCH - Don't prefetch searched messages
 *
 *
 *
 * @param null|string $search_criteria IMAP2-format search criteria string. For details see
 * imap_search.
 * @param null|string $charset MIME character set to use when sorting strings.
 * @return array Returns an array of message numbers sorted by the given
 * parameters.
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
 * Gets status information about the given mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
 * @param int $flags Valid flags are:
 *
 *
 *
 * SA_MESSAGES - set $status-&gt;messages to the
 * number of messages in the mailbox
 *
 *
 *
 *
 * SA_RECENT - set $status-&gt;recent to the number
 * of recent messages in the mailbox
 *
 *
 *
 *
 * SA_UNSEEN - set $status-&gt;unseen to the number
 * of unseen (new) messages in the mailbox
 *
 *
 *
 *
 * SA_UIDNEXT - set $status-&gt;uidnext to the next
 * uid to be used in the mailbox
 *
 *
 *
 *
 * SA_UIDVALIDITY - set $status-&gt;uidvalidity to a
 * constant that changes when uids for the mailbox may no longer be
 * valid
 *
 *
 *
 *
 * SA_ALL - set all of the above
 *
 *
 *
 * @return \stdClass This function returns an object containing status information.
 * The object has the following properties: messages,
 * recent, unseen,
 * uidnext, and uidvalidity.
 *
 * flags is also set, which contains a bitmask which can
 * be checked against any of the above constants.
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
 * Subscribe to a new mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
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
 * Gets a tree of a threaded message.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param int $flags
 * @return array imap_thread returns an associative array containing
 * a tree of messages threaded by REFERENCES.
 *
 * Every message in the current mailbox will be represented by three entries
 * in the resulting array:
 *
 *
 * $thread["XX.num"] - current message number
 *
 *
 * $thread["XX.next"]
 *
 *
 * $thread["XX.branch"]
 *
 *
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
 * Sets or fetches the imap timeout.
 *
 * @param int $timeout_type One of the following:
 * IMAP_OPENTIMEOUT,
 * IMAP_READTIMEOUT,
 * IMAP_WRITETIMEOUT, or
 * IMAP_CLOSETIMEOUT.
 * @param int $timeout The timeout, in seconds.
 * @return mixed If the timeout parameter is set, this function
 * returns TRUE on success.
 *
 * If timeout  is not provided or evaluates to -1,
 * the current timeout value of timeout_type is
 * returned as an integer.
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
 * Removes the deletion flag for a specified message, which is set by
 * imap_delete or imap_mail_move.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $message_num The message number
 * @param int $flags
 * @throws ImapException
 *
 */
function imap_undelete(\IMAP\Connection $imap, string $message_num, int $flags = 0): void
{
    error_clear_last();
    $safeResult = \imap_undelete($imap, $message_num, $flags);
    if ($safeResult === false) {
        throw ImapException::createFromPhpError();
    }
}


/**
 * Unsubscribe from the specified mailbox.
 *
 * @param \IMAP\Connection $imap An IMAP\Connection instance.
 * @param string $mailbox The mailbox name, see imap_open for more
 * information
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
 * Encode a UTF-8 string to modified UTF-7 (as specified in RFC 2060, section 5.1.3).
 *
 * @param string $string A UTF-8 encoded string.
 * @return string Returns string converted to modified UTF-7.
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
