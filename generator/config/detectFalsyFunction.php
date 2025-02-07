<?php

return function (string $text): bool {
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
    ];
    foreach ($falsies as $falsie) {
        if (preg_match($falsie, $text)) {
            return true;
        }
    }
    if (preg_match('/&false;\s+otherwise/m', $text) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $text)) {
        return true;
    }
    if (preg_match('/may\s+return\s+&false;/m', $text) && !preg_match('/(returns\s+&true;|&true;\s+on\s+success|&true;\s+if)/im', $text)) {
        return true;
    }

    return false;
};
