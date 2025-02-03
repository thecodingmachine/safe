<?php

if (strpos(PHP_VERSION, "8.1.") === 0) {
    require_once __DIR__ . '/8.1/rector-migrate.php';
}
if (strpos(PHP_VERSION, "8.2.") === 0) {
    require_once __DIR__ . '/8.2/rector-migrate.php';
}
if (strpos(PHP_VERSION, "8.3.") === 0) {
    require_once __DIR__ . '/8.3/rector-migrate.php';
}
if (strpos(PHP_VERSION, "8.4.") === 0) {
    require_once __DIR__ . '/8.4/rector-migrate.php';
}
if (strpos(PHP_VERSION, "8.5.") === 0) {
    require_once __DIR__ . '/8.5/rector-migrate.php';
}
