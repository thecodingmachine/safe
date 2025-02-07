<?php

return function (string $text): bool {
    // skip a false positive for shell-exec (the docs mention that it
    // "returns null if an error occurs" _in the subprocess_ OR if the
    // subprocess returns nothing, and users should use `exec` if they
    // actually care about error handling)
    if (preg_match('/&null; if an error occurs or the program/', $text)) {
        return false;
    }

    $nullsies = [
        '/&null;\s+on\s+failure/',
        '/On errors the return value is &null;/m',
        '/&null;\s+if\s+an\s+error\s+occurs/', // old (8.1) versions of array_replace
    ];
    foreach ($nullsies as $nullsie) {
        if (preg_match($nullsie, $text)) {
            return true;
        }
    }

    return false;
};
