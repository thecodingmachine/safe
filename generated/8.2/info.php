<?php

namespace Safe;

use Safe\Exceptions\InfoException;

/**
 * Set the various assert control options or just query
 * their current settings.
 *
 * @param int $what
 * Assert Options
 *
 *
 *
 * Option
 * INI Setting
 * Default value
 * Description
 *
 *
 *
 *
 * ASSERT_ACTIVE
 * assert.active
 * 1
 * enable assert evaluation
 *
 *
 * ASSERT_WARNING
 * assert.warning
 * 1
 * issue a PHP warning for each failed assertion
 *
 *
 * ASSERT_BAIL
 * assert.bail
 * 0
 * terminate execution on failed assertions
 *
 *
 * ASSERT_QUIET_EVAL
 * assert.quiet_eval
 * 0
 *
 * disable error_reporting during assertion expression
 * evaluation
 *
 *
 *
 * ASSERT_CALLBACK
 * assert.callback
 * (NULL)
 * Callback to call on failed assertions
 *
 *
 *
 *
 * @param mixed $value An optional new value for the option.
 *
 * The callback function set via ASSERT_CALLBACK or assert.callback should
 * have the following signature:
 *
 * voidassert_callback
 * stringfile
 * intline
 * stringassertion
 * stringdescription
 *
 *
 *
 * file
 *
 *
 * The file where assert has been called.
 *
 *
 *
 *
 * line
 *
 *
 * The line where assert has been called.
 *
 *
 *
 *
 * assertion
 *
 *
 * The assertion that has been passed to assert,
 * converted to a string.
 *
 *
 *
 *
 * description
 *
 *
 * The description that has been passed to assert.
 *
 *
 *
 *
 * @return mixed Returns the original setting of any options.
 * @throws InfoException
 *
 */
function assert_options(int $what, $value = null)
{
    error_clear_last();
    if ($value !== null) {
        $safeResult = \assert_options($what, $value);
    } else {
        $safeResult = \assert_options($what);
    }
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Sets the process title visible in tools such as top and
 * ps. This function is available only in
 * CLI mode.
 *
 * @param string $title The new title.
 * @throws InfoException
 *
 */
function cli_set_process_title(string $title): void
{
    error_clear_last();
    $safeResult = \cli_set_process_title($title);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * Loads the PHP extension given by the parameter
 * extension_filename.
 *
 * Use extension_loaded to test whether a given
 * extension is already available or not. This works on both built-in
 * extensions and dynamically loaded ones (either through php.ini or
 * dl).
 *
 * @param string $extension_filename This parameter is only the filename of the
 * extension to load which also depends on your platform. For example,
 * the sockets extension (if compiled
 * as a shared module, not the default!) would be called
 * sockets.so on Unix platforms whereas it is called
 * php_sockets.dll on the Windows platform.
 *
 * The directory where the extension is loaded from depends on your
 * platform:
 *
 * Windows - If not explicitly set in the php.ini, the extension is
 * loaded from C:\php5\ by default.
 *
 * Unix - If not explicitly set in the php.ini, the default extension
 * directory depends on
 *
 *
 *
 * whether PHP has been built with --enable-debug
 * or not
 *
 *
 *
 *
 * whether PHP has been built with ZTS (Zend Thread Safety)
 * support or not
 *
 *
 *
 *
 * the current internal ZEND_MODULE_API_NO (Zend
 * internal module API number, which is basically the date on which a
 * major module API change happened, e.g. 20010901)
 *
 *
 *
 * Taking into account the above, the directory then defaults to
 * &lt;install-dir&gt;/lib/php/extensions/ &lt;debug-or-not&gt;-&lt;zts-or-not&gt;-ZEND_MODULE_API_NO,
 * e.g.
 * /usr/local/php/lib/php/extensions/debug-non-zts-20010901
 * or
 * /usr/local/php/lib/php/extensions/no-debug-zts-20010901.
 * @throws InfoException
 *
 */
function dl(string $extension_filename): void
{
    error_clear_last();
    $safeResult = \dl($extension_filename);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * Gets the value of a PHP configuration option.
 *
 * This function will not return configuration information set when the PHP
 * was compiled, or read from an Apache configuration file.
 *
 * To check whether the system is using a configuration file, try retrieving the
 * value of the cfg_file_path configuration setting. If this is available, a
 * configuration file is being used.
 *
 * @param string $option The configuration option name.
 * @return mixed Returns the current value of the PHP configuration variable specified by
 * option, or FALSE if an error occurs.
 * @throws InfoException
 *
 */
function get_cfg_var(string $option)
{
    error_clear_last();
    $safeResult = \get_cfg_var($option);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @return string Returns the path, as a string.
 * @throws InfoException
 *
 */
function get_include_path(): string
{
    error_clear_last();
    $safeResult = \get_include_path();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the time of the last modification of the main script of execution.
 *
 * If you're interested in getting the last modification time
 * of a different file, consider using filemtime.
 *
 * @return int Returns the time of the last modification of the current
 * page. The value returned is a Unix timestamp, suitable for
 * feeding to date.
 * @throws InfoException
 *
 */
function getlastmod(): int
{
    error_clear_last();
    $safeResult = \getlastmod();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @return int Returns the group ID of the current script.
 * @throws InfoException
 *
 */
function getmygid(): int
{
    error_clear_last();
    $safeResult = \getmygid();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the inode of the current script.
 *
 * @return int Returns the current script's inode as an integer.
 * @throws InfoException
 *
 */
function getmyinode(): int
{
    error_clear_last();
    $safeResult = \getmyinode();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Gets the current PHP process ID.
 *
 * @return int Returns the current PHP process ID.
 * @throws InfoException
 *
 */
function getmypid(): int
{
    error_clear_last();
    $safeResult = \getmypid();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @return int Returns the user ID of the current script.
 * @throws InfoException
 *
 */
function getmyuid(): int
{
    error_clear_last();
    $safeResult = \getmyuid();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Parses options passed to the script.
 *
 * @param string $short_options
 * @param array $long_options
 * @param int|null $rest_index
 * @return array|array|array This function will return an array of option / argument pairs.
 * @throws InfoException
 *
 */
function getopt(string $short_options, array $long_options = [], ?int &$rest_index = null): array
{
    error_clear_last();
    $safeResult = \getopt($short_options, $long_options, $rest_index);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This is an interface to getrusage(2). It gets data returned
 * from the system call.
 *
 * @param int $mode If mode is 1, getrusage will be called with
 * RUSAGE_CHILDREN.
 * @return array Returns an associative array containing the data returned from the system
 * call. All entries are accessible by using their documented field names.
 * Returns FALSE on failure.
 * @throws InfoException
 *
 */
function getrusage(int $mode = 0): array
{
    error_clear_last();
    $safeResult = \getrusage($mode);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the value of the configuration option on success.
 *
 * @param string $option The configuration option name.
 * @return string Returns the value of the configuration option as a string on success, or an
 * empty string for null values. Returns FALSE if the
 * configuration option doesn't exist.
 * @throws InfoException
 *
 */
function ini_get(string $option): string
{
    error_clear_last();
    $safeResult = \ini_get($option);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Sets the value of the given configuration option.  The configuration option
 * will keep this new value during the script's execution, and will be restored
 * at the script's ending.
 *
 * @param string $option Not all the available options can be changed using
 * ini_set. There is a list of all available options
 * in the appendix.
 * @param string $value The new value for the option.
 * @return string Returns the old value on success.
 * @throws InfoException
 *
 */
function ini_set(string $option, string $value): string
{
    error_clear_last();
    $safeResult = \ini_set($option, $value);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @return non-empty-string Returns the interface type, as a lowercase string.
 *
 * Although not exhaustive, the possible return values include
 * apache,
 * apache2handler,
 * cgi (until PHP 5.3),
 * cgi-fcgi, cli, cli-server,
 * embed, fpm-fcgi,
 * litespeed,
 * phpdbg.
 * @throws InfoException
 *
 */
function php_sapi_name(): string
{
    error_clear_last();
    $safeResult = \php_sapi_name();
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function prints out the credits listing the PHP developers,
 * modules, etc. It generates the appropriate HTML codes to insert
 * the information in a page.
 *
 * @param int $flags To generate a custom credits page, you may want to use the
 * flags parameter.
 *
 *
 * Pre-defined phpcredits flags
 *
 *
 *
 * name
 * description
 *
 *
 *
 *
 * CREDITS_ALL
 *
 * All the credits, equivalent to using: CREDITS_DOCS +
 * CREDITS_GENERAL + CREDITS_GROUP +
 * CREDITS_MODULES + CREDITS_FULLPAGE.
 * It generates a complete stand-alone HTML page with the appropriate tags.
 *
 *
 *
 * CREDITS_DOCS
 * The credits for the documentation team
 *
 *
 * CREDITS_FULLPAGE
 *
 * Usually used in combination with the other flags.  Indicates
 * that a complete stand-alone HTML page needs to be
 * printed including the information indicated by the other
 * flags.
 *
 *
 *
 * CREDITS_GENERAL
 *
 * General credits: Language design and concept, PHP authors
 * and SAPI module.
 *
 *
 *
 * CREDITS_GROUP
 * A list of the core developers
 *
 *
 * CREDITS_MODULES
 *
 * A list of the extension modules for PHP, and their authors
 *
 *
 *
 * CREDITS_SAPI
 *
 * A list of the server API modules for PHP, and their authors
 *
 *
 *
 *
 *
 * @throws InfoException
 *
 */
function phpcredits(int $flags = CREDITS_ALL): void
{
    error_clear_last();
    $safeResult = \phpcredits($flags);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * Outputs a large amount of information about the current state of  PHP.
 * This includes information about PHP compilation options and extensions,
 * the PHP version, server information and environment (if compiled as a
 * module), the PHP environment, OS version information, paths, master and
 * local values of configuration options, HTTP headers, and the PHP License.
 *
 * Because every system is setup differently, phpinfo is
 * commonly used to check configuration settings and for available
 * predefined variables
 * on a given system.
 *
 * phpinfo is also a valuable debugging tool as it
 * contains all EGPCS (Environment, GET, POST, Cookie, Server) data.
 *
 * @param int $flags The output may be customized by passing one or more of the
 * following constants bitwise values summed
 * together in the optional flags parameter.
 * One can also combine the respective constants or bitwise values
 * together with the bitwise or operator.
 *
 *
 * phpinfo options
 *
 *
 *
 * Name (constant)
 * Value
 * Description
 *
 *
 *
 *
 * INFO_GENERAL
 * 1
 *
 * The configuration line, php.ini location, build date, Web
 * Server, System and more.
 *
 *
 *
 * INFO_CREDITS
 * 2
 *
 * PHP Credits.  See also phpcredits.
 *
 *
 *
 * INFO_CONFIGURATION
 * 4
 *
 * Current Local and Master values for PHP directives.  See
 * also ini_get.
 *
 *
 *
 * INFO_MODULES
 * 8
 *
 * Loaded modules and their respective settings.  See also
 * get_loaded_extensions.
 *
 *
 *
 * INFO_ENVIRONMENT
 * 16
 *
 * Environment Variable information that's also available in
 * $_ENV.
 *
 *
 *
 * INFO_VARIABLES
 * 32
 *
 * Shows all
 * predefined variables from EGPCS (Environment, GET,
 * POST, Cookie, Server).
 *
 *
 *
 * INFO_LICENSE
 * 64
 *
 * PHP License information.  See also the license FAQ.
 *
 *
 *
 * INFO_ALL
 * -1
 *
 * Shows all of the above.
 *
 *
 *
 *
 *
 * @throws InfoException
 *
 */
function phpinfo(int $flags = INFO_ALL): void
{
    error_clear_last();
    $safeResult = \phpinfo($flags);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * Adds assignment to the server environment.  The
 * environment variable will only exist for the duration of the current
 * request. At the end of the request the environment is restored to its
 * original state.
 *
 * @param string $assignment The setting, like "FOO=BAR"
 * @throws InfoException
 *
 */
function putenv(string $assignment): void
{
    error_clear_last();
    $safeResult = \putenv($assignment);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}


/**
 * Sets the include_path
 * configuration option for the duration of the script.
 *
 * @param string $include_path The new value for the include_path
 * @return string Returns the old include_path on
 * success.
 * @throws InfoException
 *
 */
function set_include_path(string $include_path): string
{
    error_clear_last();
    $safeResult = \set_include_path($include_path);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Set the number of seconds a script is allowed to run. If this is reached,
 * the script returns a fatal error. The default limit is 30 seconds or, if
 * it exists, the max_execution_time value defined in the
 * php.ini.
 *
 * When called, set_time_limit restarts the timeout
 * counter from zero. In other words, if the timeout is the default 30
 * seconds, and 25 seconds into script execution a call such as
 * set_time_limit(20) is made, the script will run for a
 * total of 45 seconds before timing out.
 *
 * @param int $seconds The maximum execution time, in seconds. If set to zero, no time limit
 * is imposed.
 * @throws InfoException
 *
 */
function set_time_limit(int $seconds): void
{
    error_clear_last();
    $safeResult = \set_time_limit($seconds);
    if ($safeResult === false) {
        throw InfoException::createFromPhpError();
    }
}
