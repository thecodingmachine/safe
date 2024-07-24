<?php

namespace Safe;

use Safe\Exceptions\EnchantException;

/**
 * Free a dictionary.
 * As of PHP 8.0.0, it is recommended to unset the object instead of calling this function.
 *
 * @param resource $dictionary An Enchant dictionary returned by enchant_broker_request_dict
 * or enchant_broker_request_pwl_dict.
 * @throws EnchantException
 *
 */
function enchant_broker_free_dict($dictionary): void
{
    error_clear_last();
    $safeResult = \enchant_broker_free_dict($dictionary);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
}


/**
 * Free a broker with all its dictionaries.
 * As of PHP 8.0.0, it is recommended to unset the object instead of calling this function.
 *
 * @param resource $broker An Enchant broker returned by enchant_broker_init.
 * @throws EnchantException
 *
 */
function enchant_broker_free($broker): void
{
    error_clear_last();
    $safeResult = \enchant_broker_free($broker);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
}


/**
 * Get the directory path for a given backend.
 *
 * @param resource $broker An Enchant broker returned by enchant_broker_init.
 * @param int $type The type of the dictionaries, i.e. ENCHANT_MYSPELL
 * or ENCHANT_ISPELL.
 * @return string Returns the path of the dictionary directory on
 * success.
 * @throws EnchantException
 *
 */
function enchant_broker_get_dict_path($broker, int $type): string
{
    error_clear_last();
    $safeResult = \enchant_broker_get_dict_path($broker, $type);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * create a new dictionary using tag, the non-empty language tag you
 * wish to request a dictionary for ("en_US", "de_DE", ...)
 *
 * @param resource $broker An Enchant broker returned by enchant_broker_init.
 * @param string $tag A tag describing the locale, for example en_US, de_DE
 * @return resource Returns a dictionary resource on success.
 * @throws EnchantException
 *
 */
function enchant_broker_request_dict($broker, string $tag)
{
    error_clear_last();
    $safeResult = \enchant_broker_request_dict($broker, $tag);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a dictionary using a PWL file. A PWL file is personal word file one word per line.
 *
 * @param resource $broker An Enchant broker returned by enchant_broker_init.
 * @param string $filename Path to the PWL file.
 * If there is no such file, a new one will be created if possible.
 * @return resource Returns a dictionary resource on success.
 * @throws EnchantException
 *
 */
function enchant_broker_request_pwl_dict($broker, string $filename)
{
    error_clear_last();
    $safeResult = \enchant_broker_request_pwl_dict($broker, $filename);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Set the directory path for a given backend.
 *
 * @param resource $broker An Enchant broker returned by enchant_broker_init.
 * @param int $type The type of the dictionaries, i.e. ENCHANT_MYSPELL
 * or ENCHANT_ISPELL.
 * @param string $path The path of the dictionary directory.
 * @throws EnchantException
 *
 */
function enchant_broker_set_dict_path($broker, int $type, string $path): void
{
    error_clear_last();
    $safeResult = \enchant_broker_set_dict_path($broker, $type, $path);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
}


/**
 * Declares a preference of dictionaries to use for the language
 * described/referred to by 'tag'. The ordering is a comma delimited
 * list of provider names. As a special exception, the "*" tag can
 * be used as a language tag to declare a default ordering for any
 * language that does not explicitly declare an ordering.
 *
 * @param resource $broker An Enchant broker returned by enchant_broker_init.
 * @param string $tag Language tag. The special "*" tag can be used as a language tag
 * to declare a default ordering for any language that does not
 * explicitly declare an ordering.
 * @param string $ordering Comma delimited list of provider names
 * @throws EnchantException
 *
 */
function enchant_broker_set_ordering($broker, string $tag, string $ordering): void
{
    error_clear_last();
    $safeResult = \enchant_broker_set_ordering($broker, $tag, $ordering);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
}


/**
 * Add a word to personal word list of the given dictionary.
 *
 * @param \EnchantDictionary $dictionary An Enchant dictionary returned by enchant_broker_request_dict
 * or enchant_broker_request_pwl_dict.
 * @param string $word The word to add
 * @throws EnchantException
 *
 */
function enchant_dict_add(\EnchantDictionary $dictionary, string $word): void
{
    error_clear_last();
    $safeResult = \enchant_dict_add($dictionary, $word);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
}


/**
 * Returns the details of the dictionary.
 *
 * @param resource $dictionary An Enchant dictionary returned by enchant_broker_request_dict
 * or enchant_broker_request_pwl_dict.
 * @return array Returns TRUE on success.
 * @throws EnchantException
 *
 */
function enchant_dict_describe($dictionary): array
{
    error_clear_last();
    $safeResult = \enchant_dict_describe($dictionary);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Add a correction for 'mis' using 'cor'.
 * Notes that you replaced @mis with @cor, so it's possibly more likely
 * that future occurrences of @mis will be replaced with @cor. So it might
 * bump @cor up in the suggestion list.
 *
 * @param resource $dictionary An Enchant dictionary returned by enchant_broker_request_dict
 * or enchant_broker_request_pwl_dict.
 * @param string $misspelled The work to fix
 * @param string $correct The correct word
 * @throws EnchantException
 *
 */
function enchant_dict_store_replacement($dictionary, string $misspelled, string $correct): void
{
    error_clear_last();
    $safeResult = \enchant_dict_store_replacement($dictionary, $misspelled, $correct);
    if ($safeResult === false) {
        throw EnchantException::createFromPhpError();
    }
}
