<?php

namespace Safe;

use Safe\Exceptions\MysqliException;

/**
 * @return array|false
 *
 */
function mysqli_get_client_stats()
{
    error_clear_last();
    $safeResult = \mysqli_get_client_stats();
    return $safeResult;
}
