<?php

if (strpos(PHP_VERSION, "8.2.") === 0) {
    require_once __DIR__ . '/8.2/rnp.php';
}
if (strpos(PHP_VERSION, "8.3.") === 0) {
    require_once __DIR__ . '/8.3/rnp.php';
}
if (strpos(PHP_VERSION, "8.4.") === 0) {
    require_once __DIR__ . '/8.4/rnp.php';
}
if (strpos(PHP_VERSION, "8.5.") === 0) {
    require_once __DIR__ . '/8.5/rnp.php';
}
