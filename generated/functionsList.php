<?php

if (str_starts_with(PHP_VERSION, "8.1.")) {
    return require_once __DIR__ . '/8.1/functionsList.php';
}
if (str_starts_with(PHP_VERSION, "8.2.")) {
    return require_once __DIR__ . '/8.2/functionsList.php';
}
if (str_starts_with(PHP_VERSION, "8.3.")) {
    return require_once __DIR__ . '/8.2/functionsList.php';
}
if (str_starts_with(PHP_VERSION, "8.4.")) {
    return require_once __DIR__ . '/8.4/functionsList.php';
}
if (str_starts_with(PHP_VERSION, "8.5.")) {
    return require_once __DIR__ . '/8.5/functionsList.php';
}
if (str_starts_with(PHP_VERSION, "8.6.")) {
    return require_once __DIR__ . '/8.6/functionsList.php';
}
