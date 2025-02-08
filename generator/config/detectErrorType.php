<?php

use Safe\XmlDocParser\ErrorType;

return function (string $text): ErrorType {
    // ================================================================
    // Special cases
    // ================================================================

    // skip a false positive for shell-exec (the docs mention that it
    // "returns null if an error occurs" _in the subprocess_ OR if the
    // subprocess returns nothing, and users should use `exec` if they
    // actually care about error handling), however it does return
    // false when there is an internal error, and we should handle that.
    if (preg_match('/&null; if an error occurs or the program/', $text)) {
        return ErrorType::FALSY;
    }

    // ================================================================
    // Detect functions which return false on error
    // ================================================================

    $falsies = [
        '/[Tt]he function returns &false;/m',
        '/&false;\s+on\s+error/m',
        '/&false;\s+on\s+failure/m',
        '/&false;\s+if\s+an\s+error\s+occurred/m',
        '/&return.success;/m',
        '/&return.nullorfalse;/m',
        '/&return.falseforfailure;/m',
        '/&date.datetime.return.modifiedobjectorfalseforfailure;/m',
        '/ or &false; \\(and generates an error/m',
        '/&false;\s+if\s+the\s+number\s+of\s+elements\s+for\s+each\s+array\s+isn\'t\s+equal/m',
        '/If\s+the\s+call\s+fails,\s+it\s+will\s+return\s+&false;/m',
        '/Upon\s+failure,?\s+\<function\>[\w_]{1,15}?\<\/function\>\s+returns\s+&false;/m',
        '/On\s+failure,\s+&false;\s+is\s+returned/m',
        '/on\s+success,\s+otherwise\s+&false;\s+is\s+returned/m',
        '/Returns.*on success[.\s\S]+Returns &false;\s+if/m',
        '/&gd\.return\.identifier;/m',
        '/If a non-numeric value is used for\s+\<parameter\>timestamp\<\/parameter\>, &false; is returned/m', // date
        '/&false; is returned if\s+the image type is unsupported, the data is not in a recognised format,\s+or the image is corrupt and cannot be loaded/m', // imagecreatefromstring
        "/&false; when the given class doesn't exist/m", // class_implements
        "/&false; on failure/m" , // get_headers and ldap_search
        "/&false; if a syntactically invalid/m", // inet_pton
        "/&false; if the pipe\s+cannot be established/m", // shell_exec
        "/&false; if an error occurs/m", // cfg_get_var
        "/On failure\s+returns &false;./m", // proc_open
        "/If output buffering isn't active then &false; is returned./m", // ob_get_clean (8.1 - 8.3)
        "/If the open fails, <function>bzopen<\/function> returns &false;/m", // bzopen
        "/If an error occurs, returns &false;./m", // ftell, popen
    ];
    foreach ($falsies as $falsie) {
        if (preg_match($falsie, $text)) {
            return ErrorType::FALSY;
        }
    }
    if (preg_match('/&false;\s+otherwise/m', $text) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $text)) {
        return ErrorType::FALSY;
    }
    if (preg_match('/may\s+return\s+&false;/m', $text) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $text)) {
        return ErrorType::FALSY;
    }

    // ================================================================
    // Detect functions which return null on error
    // ================================================================

    $nullsies = [
        '/&null;\s+on\s+failure/',
        '/On errors the return value is &null;/m',
        '/&null;\s+if\s+an\s+error\s+occurs/', // old (8.1) versions of array_replace
    ];
    foreach ($nullsies as $nullsie) {
        if (preg_match($nullsie, $text)) {
            return ErrorType::NULLSY;
        }
    }

    // ================================================================
    // Detect functions which return empty on error
    // ================================================================

    if (preg_match('/an\s+empty\s+string\s+on\s+error/', $text)) {
        return ErrorType::EMPTY;
    }


    // ================================================================
    // Detect functions which return -1 on error
    // ================================================================

    $monesies = [
        '/, or -1 on error/m',
        '/Returns -1 on error/m',
        '/an error then <literal>-1<\/literal> is returned./m', // proc_close, pclose
        '/<literal>-1<\/literal> indicates that the query returned an error/m',
    ];
    foreach ($monesies as $monesie) {
        if (preg_match($monesie, $text)) {
            return ErrorType::MINUS_ONE;
        }
    }


    return ErrorType::UNKNOWN;
};
