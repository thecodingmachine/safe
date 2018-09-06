<?php

namespace Safe;

/**
 * Enumerates the Enchant providers and tells you some rudimentary
 * information about them. The same info is provided through phpinfo().
 * 
 * @param resource $broker Broker resource
 * @return array Returns TRUE on success .
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_describe($broker): array
{
    error_clear_last();
    $result = \enchant_broker_describe($broker);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
    return $result;
}


/**
 * Free a dictionary resource.
 * 
 * @param resource $dict Dictionary resource.
 * @return resource Returns TRUE on success .
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_free_dict($dict): void
{
    error_clear_last();
    $result = \enchant_broker_free_dict($dict);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
}


/**
 * Free a broker resource with all its dictionaries.
 * 
 * @param resource $broker Broker resource
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_free($broker): void
{
    error_clear_last();
    $result = \enchant_broker_free($broker);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
}


/**
 * Get the directory path for a given backend.
 * 
 * @param resource $broker Broker resource.
 * @param int $dict_type The type of the dictionaries, i.e. ENCHANT_MYSPELL
 * or ENCHANT_ISPELL.
 * @return string Returns the path of the dictionary directory on
 * success .
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_get_dict_path($broker, int $dict_type): void
{
    error_clear_last();
    $result = \enchant_broker_get_dict_path($broker, $dict_type);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
}


/**
 * Returns a list of available dictionaries with their details.
 * 
 * @param resource $broker Broker resource
 * @return string Returns TRUE on success .
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_list_dicts($broker)
{
    error_clear_last();
    $result = \enchant_broker_list_dicts($broker);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
    return $result;
}


/**
 * create a new dictionary using tag, the non-empty language tag you
 * wish to request a dictionary for ("en_US", "de_DE", ...)
 * 
 * @param resource $broker Broker resource
 * @param string $tag A tag describing the locale, for example en_US, de_DE
 * @return resource Returns a dictionary resource on success .
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_request_dict($broker, string $tag)
{
    error_clear_last();
    $result = \enchant_broker_request_dict($broker, $tag);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
    return $result;
}


/**
 * Creates a dictionary using a PWL file. A PWL file is personal word file one word per line.
 * 
 * @param resource $broker Broker resource
 * @param string $filename Path to the PWL file.
 * If there is no such file, a new one will be created if possible.
 * @return resource Returns a dictionary resource on success .
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_request_pwl_dict($broker, string $filename)
{
    error_clear_last();
    $result = \enchant_broker_request_pwl_dict($broker, $filename);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
    return $result;
}


/**
 * Set the directory path for a given backend.
 * 
 * @param resource $broker Broker resource.
 * @param int $dict_type The type of the dictionaries, i.e. ENCHANT_MYSPELL
 * or ENCHANT_ISPELL.
 * @param string $value The path of the dictionary directory.
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_set_dict_path($broker, int $dict_type, string $value): void
{
    error_clear_last();
    $result = \enchant_broker_set_dict_path($broker, $dict_type, $value);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
}


/**
 * Declares a preference of dictionaries to use for the language
 * described/referred to by 'tag'. The ordering is a comma delimited
 * list of provider names. As a special exception, the "*" tag can
 * be used as a language tag to declare a default ordering for any
 * language that does not explicitly declare an ordering.
 * 
 * @param resource $broker Broker resource
 * @param string $tag Language tag. The special "*" tag can be used as a language tag
 * to declare a default ordering for any language that does not
 * explicitly declare an ordering.
 * @param string $ordering Comma delimited list of provider names
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_broker_set_ordering($broker, string $tag, string $ordering): void
{
    error_clear_last();
    $result = \enchant_broker_set_ordering($broker, $tag, $ordering);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
}


/**
 * Add a word to personal word list of the given dictionary.
 * 
 * @param resource $dict Dictionary resource
 * @param string $word The word to add
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_dict_add_to_personal($dict, string $word): void
{
    error_clear_last();
    $result = \enchant_dict_add_to_personal($dict, $word);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
}


/**
 * Returns the details of the dictionary.
 * 
 * @param resource $dict Dictionary resource
 * @return array Returns TRUE on success .
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_dict_describe($dict)
{
    error_clear_last();
    $result = \enchant_dict_describe($dict);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
    return $result;
}


/**
 * Add a correction for 'mis' using 'cor'.
 * Notes that you replaced @mis with @cor, so it's possibly more likely
 * that future occurrences of @mis will be replaced with @cor. So it might
 * bump @cor up in the suggestion list.
 * 
 * @param resource $dict Dictionary resource
 * @param string $mis The work to fix
 * @param string $cor The correct word
 * @throws Exceptions\EnchantException
 * 
 */
function enchant_dict_store_replacement($dict, string $mis, string $cor): void
{
    error_clear_last();
    $result = \enchant_dict_store_replacement($dict, $mis, $cor);
    if ($result === FALSE) {
        throw Exceptions\EnchantException::createFromPhpError();
    }
}


