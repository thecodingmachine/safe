<?php

namespace Safe;

use Safe\Exceptions\OutcontrolException;

/**
 * This function discards the contents of the output buffer.
 *
 * This function does not destroy the output buffer like
 * ob_end_clean does.
 *
 * The output buffer must be started by
 * ob_start with PHP_OUTPUT_HANDLER_CLEANABLE
 * flag. Otherwise ob_clean will not work.
 *
 * @throws OutcontrolException
 *
 */
function ob_clean(): void
{
    error_clear_last();
    $safeResult = \ob_clean();
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
}


/**
 * This function discards the contents of the topmost output buffer and turns
 * off this output buffering. If you want to further process the buffer's
 * contents you have to call ob_get_contents before
 * ob_end_clean as the buffer contents are discarded
 * when ob_end_clean is called.
 *
 * The output buffer must be started by
 * ob_start with PHP_OUTPUT_HANDLER_CLEANABLE
 * and PHP_OUTPUT_HANDLER_REMOVABLE
 * flags. Otherwise ob_end_clean will not work.
 *
 * @throws OutcontrolException
 *
 */
function ob_end_clean(): void
{
    error_clear_last();
    $safeResult = \ob_end_clean();
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
}


/**
 * This function will send the contents of the topmost output buffer (if
 * any) and turn this output buffer off.  If you want to further
 * process the buffer's contents you have to call
 * ob_get_contents before
 * ob_end_flush as the buffer contents are
 * discarded after ob_end_flush is called.
 *
 * The output buffer must be started by
 * ob_start with PHP_OUTPUT_HANDLER_FLUSHABLE
 * and PHP_OUTPUT_HANDLER_REMOVABLE
 * flags. Otherwise ob_end_flush will not work.
 *
 * @throws OutcontrolException
 *
 */
function ob_end_flush(): void
{
    error_clear_last();
    $safeResult = \ob_end_flush();
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
}


/**
 * This function will send the contents of the output buffer (if any). If you
 * want to further process the buffer's contents you have to call
 * ob_get_contents before ob_flush
 * as the buffer contents are discarded after ob_flush
 * is called.
 *
 * This function does not destroy the output buffer like
 * ob_end_flush does.
 *
 * @throws OutcontrolException
 *
 */
function ob_flush(): void
{
    error_clear_last();
    $safeResult = \ob_flush();
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
}


/**
 * Gets the current buffer contents and delete current output buffer.
 *
 * ob_get_clean essentially executes both
 * ob_get_contents and
 * ob_end_clean.
 *
 * The output buffer must be started by
 * ob_start with PHP_OUTPUT_HANDLER_CLEANABLE
 * and PHP_OUTPUT_HANDLER_REMOVABLE
 * flags. Otherwise ob_get_clean will not work.
 *
 * @return string Returns the contents of the output buffer and end output buffering.
 * If output buffering isn't active then FALSE is returned.
 * @throws OutcontrolException
 *
 */
function ob_get_clean(): string
{
    error_clear_last();
    $safeResult = \ob_get_clean();
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function will turn output buffering on. While output buffering is
 * active no output is sent from the script (other than headers), instead the
 * output is stored in an internal buffer.
 *
 * The contents of this internal buffer may be copied into a string variable
 * using ob_get_contents.  To output what is stored in
 * the internal buffer, use ob_end_flush. Alternatively,
 * ob_end_clean will silently discard the buffer
 * contents.
 *
 * Output buffers are stackable, that is, you may call
 * ob_start while another
 * ob_start is active. Just make
 * sure that you call ob_end_flush
 * the appropriate number of times. If multiple output callback
 * functions are active, output is being filtered sequentially
 * through each of them in nesting order.
 *
 * If output buffering is still active when the script ends, PHP outputs the
 * contents automatically.
 *
 * @param array|callable|null|string $callback An optional callback function may be
 * specified. This function takes a string as a parameter and should
 * return a string. The function will be called when
 * the output buffer is flushed (sent) or cleaned (with
 * ob_flush, ob_clean or similar
 * function) or when the output buffer
 * is flushed to the browser at the end of the request.  When
 * callback is called, it will receive the
 * contents of the output buffer as its parameter and is expected to
 * return a new output buffer as a result, which will be sent to the
 * browser. If the callback is not a
 * callable function, this function will return FALSE.
 * This is the callback signature:
 *
 *
 * stringhandler
 * stringbuffer
 * intphase
 *
 *
 *
 * buffer
 *
 *
 * Contents of the output buffer.
 *
 *
 *
 *
 * phase
 *
 *
 * Bitmask of PHP_OUTPUT_HANDLER_* constants.
 *
 *
 *
 *
 *
 * If callback returns FALSE original
 * input is sent to the browser.
 *
 * The callback parameter may be bypassed
 * by passing a NULL value.
 *
 * ob_end_clean, ob_end_flush,
 * ob_clean, ob_flush and
 * ob_start may not be called from a callback
 * function. If you call them from callback function, the behavior is
 * undefined. If you would like to delete the contents of a buffer,
 * return "" (a null string) from callback function.
 * You can't even call functions using the output buffering functions like
 * print_r($expression, true) or
 * highlight_file($filename, true) from a callback
 * function.
 *
 * ob_gzhandler function exists to
 * facilitate sending gz-encoded data to web browsers that support
 * compressed web pages.  ob_gzhandler determines
 * what type of content encoding the browser will accept and will return
 * its output accordingly.
 * @param int $chunk_size
 * @param int $flags
 * @throws OutcontrolException
 *
 */
function ob_start($callback = null, int $chunk_size = 0, int $flags = PHP_OUTPUT_HANDLER_STDFLAGS): void
{
    error_clear_last();
    if ($flags !== PHP_OUTPUT_HANDLER_STDFLAGS) {
        $safeResult = \ob_start($callback, $chunk_size, $flags);
    } elseif ($chunk_size !== 0) {
        $safeResult = \ob_start($callback, $chunk_size);
    } elseif ($callback !== null) {
        $safeResult = \ob_start($callback);
    } else {
        $safeResult = \ob_start();
    }
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
}


/**
 * This function adds another name/value pair to the URL rewrite mechanism.
 * The name and value will be added to URLs (as GET parameter) and forms
 * (as hidden input fields) the same way as the session ID when transparent
 * URL rewriting is enabled with session.use_trans_sid.
 *
 * This function's behaviour is controlled by the url_rewriter.tags and
 * url_rewriter.hosts php.ini
 * parameters.
 *
 * Note that this function can be successfully called at most once per request.
 *
 * @param string $name The variable name.
 * @param string $value The variable value.
 * @throws OutcontrolException
 *
 */
function output_add_rewrite_var(string $name, string $value): void
{
    error_clear_last();
    $safeResult = \output_add_rewrite_var($name, $value);
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
}


/**
 * This function resets the URL rewriter and removes all rewrite
 * variables previously set by the output_add_rewrite_var
 * function.
 *
 * @throws OutcontrolException
 *
 */
function output_reset_rewrite_vars(): void
{
    error_clear_last();
    $safeResult = \output_reset_rewrite_vars();
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
}
