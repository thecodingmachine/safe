<?php

namespace Safe;

/**
 * nsapi_virtual is an NSAPI-specific function which
 * is equivalent to &lt;!--#include virtual...--&gt;
 * in SSI
 * (.shtml files). It does an NSAPI sub-request.
 * It is useful for including CGI scripts or .shtml files, or anything
 * else that you'd parse through webserver.
 * 
 * To run the sub-request, all buffers are terminated and flushed to the
 * browser, pending headers are sent too.
 * 
 * You cannot make recursive requests with this function to other PHP scripts.
 * If you want to include PHP scripts, use include or
 * require.
 * 
 * @param string $uri The URI of the script.
 * @throws Exceptions\NsapiException
 * 
 */
function nsapi_virtual(string $uri): void
{
    error_clear_last();
    $result = \nsapi_virtual($uri);
    if ($result === FALSE) {
        throw Exceptions\NsapiException::createFromPhpError();
    }
}


