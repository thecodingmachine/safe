<?php

if (strpos(PHP_VERSION, "8.1.") === 0) {
    require_once __DIR__ . '/8.1/zlib.php';
}
if (strpos(PHP_VERSION, "8.2.") === 0) {
    require_once __DIR__ . '/8.2/zlib.php';
}
if (strpos(PHP_VERSION, "8.3.") === 0) {
    require_once __DIR__ . '/8.3/zlib.php';
}
if (strpos(PHP_VERSION, "8.4.") === 0) {
    require_once __DIR__ . '/8.4/zlib.php';
}
if (strpos(PHP_VERSION, "8.5.") === 0) {
    require_once __DIR__ . '/8.5/zlib.php';
}
