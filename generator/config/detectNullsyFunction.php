<?php

return function (string $text): bool {
    if (preg_match('/&null;\s+on\s+failure/', $text)) {
        return true;
    }

    // used to detect old (8.1) versions of array_replace
    if (preg_match('/&null;\s+if\s+an\s+error\s+occurs/', $text)) {
        // skip a false positive for shell-exec (the docs mention that it
        // "returns null if an error occurs" _in the subprocess_ OR if the
        // subprocess returns nothing, and users should use `exec` if they
        // actually care about error handling)
        if (preg_match('/&null; if an error occurs or the program/', $text)) {
            return false;
        }
        return true;
    }

    return false;
};
