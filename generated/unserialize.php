<?php
/**
 * Created by PhpStorm.
 * User: yrodchyn
 * Date: 11/19/18
 * Time: 7:58 PM
 */

namespace Safe;

use Safe\Exceptions\UnserializeExceprion;

/**
 * Creates a PHP value from a stored representation
 * @link http://php.net/manual/en/function.unserialize.php
 * @param string $str <p>
 * The serialized string.
 * </p>
 * <p>
 * If the variable being unserialized is an object, after successfully
 * reconstructing the object PHP will automatically attempt to call the
 * __wakeup member function (if it exists).
 * </p>
 * <p>
 * unserialize_callback_func directive
 * <p>
 * It's possible to set a callback-function which will be called,
 * if an undefined class should be instantiated during unserializing.
 * (to prevent getting an incomplete object "__PHP_Incomplete_Class".)
 * Use your &php.ini;, ini_set or &htaccess;
 * to define 'unserialize_callback_func'. Everytime an undefined class
 * should be instantiated, it'll be called. To disable this feature just
 * empty this setting.
 * </p>
 * @param mixed $options [optional]
 * <p>Any options to be provided to unserialize(), as an associative array.</p>
 * <p>
 * Either an array of class names which should be accepted, FALSE to
 * accept no classes, or TRUE to accept all classes. If this option is defined
 * and unserialize() encounters an object of a class that isn't to be accepted,
 * then the object will be instantiated as __PHP_Incomplete_Class instead.
 * Omitting this option is the same as defining it as TRUE: PHP will attempt
 * to instantiate objects of any class.
 * </p>
 * @return mixed The converted value is returned, and can be a boolean,
 * integer, float, string,
 * array or object.
 * </p>
 * <p>
 * In case the passed string is not unserializeable, false is returned and
 * E_NOTICE is issued.
 * @since 4.0
 * @since 5.0
 * @since 7.0
 */
function unserialize($str, array $options = null)
{
    error_clear_last();
    $result = \unserialize($str, $options);
    if(null === $result) {
        throw UnserializeException::createFromPhpError();
    }

    return $result;
}