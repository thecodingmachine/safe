<?php

if (str_starts_with(PHP_VERSION, "8.1.")) {
    require_once __DIR__ . '/8.1/rpminfo.php';
}
if (str_starts_with(PHP_VERSION, "8.2.")) {
    require_once __DIR__ . '/8.2/rpminfo.php';
}
if (str_starts_with(PHP_VERSION, "8.3.")) {
    require_once __DIR__ . '/8.3/rpminfo.php';
}
if (str_starts_with(PHP_VERSION, "8.4.")) {
    require_once __DIR__ . '/8.4/rpminfo.php';
}
if (str_starts_with(PHP_VERSION, "8.5.")) {
    require_once __DIR__ . '/8.5/rpminfo.php';
}
