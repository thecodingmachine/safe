<?php

namespace Safe;

use Safe\Exceptions\YamlException;

/**
 * @param string $filename
 * @param int $pos
 * @param int|null $ndocs
 * @param array|null $callbacks
 * @return mixed
 * @throws YamlException
 *
 */
function yaml_parse_file(string $filename, int $pos = 0, ?int &$ndocs = null, ?array $callbacks = null)
{
    error_clear_last();
    if ($callbacks !== null) {
        $safeResult = \yaml_parse_file($filename, $pos, $ndocs, $callbacks);
    } else {
        $safeResult = \yaml_parse_file($filename, $pos, $ndocs);
    }
    if ($safeResult === false) {
        throw YamlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $url
 * @param int $pos
 * @param int|null $ndocs
 * @param array|null $callbacks
 * @return mixed
 * @throws YamlException
 *
 */
function yaml_parse_url(string $url, int $pos = 0, ?int &$ndocs = null, ?array $callbacks = null)
{
    error_clear_last();
    if ($callbacks !== null) {
        $safeResult = \yaml_parse_url($url, $pos, $ndocs, $callbacks);
    } else {
        $safeResult = \yaml_parse_url($url, $pos, $ndocs);
    }
    if ($safeResult === false) {
        throw YamlException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param string $input
 * @param int $pos
 * @param int|null $ndocs
 * @param array|null $callbacks
 * @return mixed
 * @throws YamlException
 *
 */
function yaml_parse(string $input, int $pos = 0, ?int &$ndocs = null, ?array $callbacks = null)
{
    error_clear_last();
    if ($callbacks !== null) {
        $safeResult = \yaml_parse($input, $pos, $ndocs, $callbacks);
    } else {
        $safeResult = \yaml_parse($input, $pos, $ndocs);
    }
    if ($safeResult === false) {
        throw YamlException::createFromPhpError();
    }
    return $safeResult;
}
