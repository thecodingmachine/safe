<?php

return function (string $text): bool {
    if (preg_match('/an\s+empty\s+string\s+on\s+error/', $text)) {
        return true;
    }

    return false;
};
