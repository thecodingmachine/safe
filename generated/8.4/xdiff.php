<?php

namespace Safe;

use Safe\Exceptions\XdiffException;

/**
 * @param string $old_file
 * @param string $new_file
 * @param string $dest
 * @throws XdiffException
 *
 */
function xdiff_file_bdiff(string $old_file, string $new_file, string $dest): void
{
    error_clear_last();
    $safeResult = \xdiff_file_bdiff($old_file, $new_file, $dest);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
}


/**
 * @param string $file
 * @param string $patch
 * @param string $dest
 * @throws XdiffException
 *
 */
function xdiff_file_bpatch(string $file, string $patch, string $dest): void
{
    error_clear_last();
    $safeResult = \xdiff_file_bpatch($file, $patch, $dest);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
}


/**
 * @param string $old_file
 * @param string $new_file
 * @param string $dest
 * @throws XdiffException
 *
 */
function xdiff_file_diff_binary(string $old_file, string $new_file, string $dest): void
{
    error_clear_last();
    $safeResult = \xdiff_file_diff_binary($old_file, $new_file, $dest);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
}


/**
 * @param string $old_file
 * @param string $new_file
 * @param string $dest
 * @param int $context
 * @param bool $minimal
 * @throws XdiffException
 *
 */
function xdiff_file_diff(string $old_file, string $new_file, string $dest, int $context = 3, bool $minimal = false): void
{
    error_clear_last();
    $safeResult = \xdiff_file_diff($old_file, $new_file, $dest, $context, $minimal);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
}


/**
 * @param string $file
 * @param string $patch
 * @param string $dest
 * @throws XdiffException
 *
 */
function xdiff_file_patch_binary(string $file, string $patch, string $dest): void
{
    error_clear_last();
    $safeResult = \xdiff_file_patch_binary($file, $patch, $dest);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
}


/**
 * @param string $old_file
 * @param string $new_file
 * @param string $dest
 * @throws XdiffException
 *
 */
function xdiff_file_rabdiff(string $old_file, string $new_file, string $dest): void
{
    error_clear_last();
    $safeResult = \xdiff_file_rabdiff($old_file, $new_file, $dest);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
}


/**
 * @param string $str
 * @param string $patch
 * @return string
 * @throws XdiffException
 *
 */
function xdiff_string_bpatch(string $str, string $patch): string
{
    error_clear_last();
    $safeResult = \xdiff_string_bpatch($str, $patch);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $str
 * @param string $patch
 * @return string
 * @throws XdiffException
 *
 */
function xdiff_string_patch_binary(string $str, string $patch): string
{
    error_clear_last();
    $safeResult = \xdiff_string_patch_binary($str, $patch);
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $str
 * @param string $patch
 * @param int $flags
 * @param null|string $error
 * @return string
 * @throws XdiffException
 *
 */
function xdiff_string_patch(string $str, string $patch, ?int $flags = null, ?string &$error = null): string
{
    error_clear_last();
    if ($error !== null) {
        $safeResult = \xdiff_string_patch($str, $patch, $flags, $error);
    } elseif ($flags !== null) {
        $safeResult = \xdiff_string_patch($str, $patch, $flags);
    } else {
        $safeResult = \xdiff_string_patch($str, $patch);
    }
    if ($safeResult === false) {
        throw XdiffException::createFromPhpError();
    }
    return $safeResult;
}
