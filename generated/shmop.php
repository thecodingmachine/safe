<?php

if (strpos(PHP_VERSION, "8.1.") === 0) {
    require_once __DIR__ . '/8.1/shmop.php';
}
if (strpos(PHP_VERSION, "8.2.") === 0) {
    require_once __DIR__ . '/8.2/shmop.php';
}
if (strpos(PHP_VERSION, "8.3.") === 0) {
    require_once __DIR__ . '/8.3/shmop.php';
}
if (strpos(PHP_VERSION, "8.4.") === 0) {
    require_once __DIR__ . '/8.4/shmop.php';
}
if (strpos(PHP_VERSION, "8.5.") === 0) {
    require_once __DIR__ . '/8.5/shmop.php';
}
