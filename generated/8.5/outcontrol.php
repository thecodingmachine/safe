<?php

namespace Safe;

use Safe\Exceptions\OutcontrolException;

/**
 * This function calls the output handler
 * (with the PHP_OUTPUT_HANDLER_CLEAN flag),
 * discards it's return value
 * and cleans (erases) the contents of the active output buffer.
 *
 * This function does not turn off the active output buffer like
 * ob_end_clean or ob_get_clean does.
 *
 * ob_clean will fail
 * without an active output buffer started with the
 * PHP_OUTPUT_HANDLER_CLEANABLE flag.
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
 * This function calls the output handler
 * (with the PHP_OUTPUT_HANDLER_CLEAN and
 * PHP_OUTPUT_HANDLER_FINAL flags),
 * discards it's return value,
 * discards the contents of the active output buffer
 * and turns off the active output buffer.
 *
 * ob_end_clean will fail
 * without an active output buffer started with the
 * PHP_OUTPUT_HANDLER_REMOVABLE flag.
 *
 * ob_end_clean
 * will discard the contents of the active output buffer
 * even if it was started without the
 * PHP_OUTPUT_HANDLER_CLEANABLE flag.
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
 * This function calls the output handler
 * (with the PHP_OUTPUT_HANDLER_FINAL flag),
 * flushes (sends) it's return value,
 * discards the contents of the active output buffer
 * and turns off the active output buffer.
 *
 * ob_end_flush will fail
 * without an active output buffer started with the
 * PHP_OUTPUT_HANDLER_REMOVABLE flag.
 *
 * ob_end_flush will flush (send)
 * the return value of the output handler
 * even if the active output buffer was started without the
 * PHP_OUTPUT_HANDLER_FLUSHABLE flag.
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
 * This function calls the output handler
 * (with the PHP_OUTPUT_HANDLER_FLUSH flag),
 * flushes (sends) its return value
 * and discards the contents of the active output buffer.
 *
 * This function does not turn off the active output buffer like
 * ob_end_flush or ob_get_flush does.
 *
 * ob_flush will fail
 * without an active output buffer started with the
 * PHP_OUTPUT_HANDLER_FLUSHABLE flag.
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
 * This function calls the output handler
 * (with the PHP_OUTPUT_HANDLER_CLEAN and
 * PHP_OUTPUT_HANDLER_FINAL flags),
 * discards it's return value,
 * returns the contents of the active output buffer
 * and turns off the active output buffer.
 *
 * ob_get_clean will fail
 * without an active output buffer started with the
 * PHP_OUTPUT_HANDLER_REMOVABLE flag.
 *
 * ob_get_clean
 * will discard the contents of the active output buffer
 * even if it was started without the
 * PHP_OUTPUT_HANDLER_CLEANABLE flag.
 *
 * @return string Returns the contents of the active output buffer on success.
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
 * This function calls the output handler
 * (with the PHP_OUTPUT_HANDLER_FINAL flag),
 * flushes (sends) it's return value,
 * returns the contents of the active output buffer
 * and turns off the active output buffer.
 *
 * ob_get_flush will fail
 * without an active output buffer started with the
 * PHP_OUTPUT_HANDLER_REMOVABLE flag.
 *
 * ob_get_flush will flush (send)
 * the return value of the output handler
 * even if the active output buffer was started without the
 * PHP_OUTPUT_HANDLER_FLUSHABLE flag.
 *
 * @return string Returns the contents of the active output buffer on success.
 * @throws OutcontrolException
 *
 */
function ob_get_flush(): string
{
    error_clear_last();
    $safeResult = \ob_get_flush();
    if ($safeResult === false) {
        throw OutcontrolException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function will turn output buffering on.
 * While output buffering is active no output is sent from the script,
 * instead the output is stored in an internal buffer.
 * See
 * on exactly what output is affected.
 *
 * Output buffers are stackable, that is,
 * ob_start may be called while another buffer is active.
 * If multiple output buffers are active,
 * output is being filtered sequentially
 * through each of them in nesting order.
 * See  for more details.
 *
 * See
 * for a detailed description of output buffers.
 *
 * @param array|callable|null|string $callback An optional callback callable may be
 * specified. It can also be bypassed by passing NULL.
 *
 * callback is invoked when the output buffer is
 * flushed (sent), cleaned, or when the output buffer is flushed
 * at the end of the script.
 *
 * The signature of the callback is as follows:
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
 * Bitmask of
 *
 * PHP_OUTPUT_HANDLER_*
 * constants
 * .
 * See
 * for more details.
 *
 *
 *
 *
 *
 * If callback returns FALSE
 * the contents of the buffer are returned.
 * See
 * for more details.
 *
 * See
 * and
 * for more details on callbacks (output handlers).
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
 * This function starts the 'URL-Rewriter' output buffer handler
 * if it is not active,
 * stores the name and value parameters,
 * and when the buffer is flushed rewrites the URLs
 * and forms based on the applicable ini settings.
 * Subsequent calls to this function will store all additional name/value pairs
 * until the handler is turned off.
 *
 * When the output buffer is flushed
 * (by calling ob_flush, ob_end_flush,
 * ob_get_flush or at the end of the script)
 * the 'URL-Rewriter' handler adds the name/value pairs
 * as query parameters to URLs in attributes of HTML tags
 * and adds hidden fields to forms based on the values of the
 * url_rewriter.tags and
 * url_rewriter.hosts
 * configuration directives.
 *
 * Each name/value pair added to the 'URL-Rewriter' handler
 * is added to the URLs and/or forms
 * even if this results in duplicate URL query parameters
 * or elements with the same name attributes.
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
 * This function removes all rewrite variables previously set by
 * the output_add_rewrite_var function.
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
