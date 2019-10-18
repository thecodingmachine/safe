<?php

/**
 * Our own custom function map, used to quickly correct errors in phpstan's function map.
 * This file must always be check against phpstan file to remove duplicates as phpstan keep getting corrected.
 */

return [
    'mb_ereg_replace_callback' => ['string|false', 'pattern'=>'string', 'callback'=>'callable', 'string'=>'string', 'option='=>'string'],
    'swoole_async_writefile' => ['bool', 'filename'=>'string', 'content'=>'string', 'callback='=>'callable', 'flags='=>'int'],
];
