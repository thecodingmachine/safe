<?php

namespace Safe;

/**
 * udm_add_search_limit adds search restrictions.
 * 
 * @param resource $agent A link to Agent, received after call to
 * udm_alloc_agent.
 * @param int $var Defines the parameter, indicating limits. 
 * Possible var values:
 * 
 * 
 * 
 * UDM_LIMIT_URL - defines document URL limitations to limit the search
 * through subsection of the database. It supports SQL % and _  LIKE wildcards,
 * where % matches any number of characters, even zero characters,
 * and _ matches exactly one character. E.g. http://www.example.___/catalog
 * may stand for http://www.example.com/catalog and http://www.example.net/catalog.
 * 
 * 
 * 
 * 
 * UDM_LIMIT_TAG - defines site TAG limitations. In indexer-conf you can
 * assign specific TAGs to various sites and parts of a site. Tags in
 * mnoGoSearch 3.1.x are lines, that may contain metasymbols % and _.
 * Metasymbols allow searching among groups of tags.
 * E.g. there are links with tags ABCD and ABCE, and search restriction
 * is by ABC_ - the search will be made among both of the tags.
 * 
 * 
 * 
 * 
 * UDM_LIMIT_LANG - defines document language limitations.
 * 
 * 
 * 
 * 
 * UDM_LIMIT_CAT - defines document category limitations. Categories are
 * similar to tag feature, but nested. So you can have one category inside
 * another and so on. You have to use two characters for each level. Use a
 * hex number going from 0-F or a 36 base number going from 0-Z.
 * Therefore a top-level category like 'Auto' would be 01. If it has a
 * subcategory like 'Ford', then it would be 01 (the parent category) and then
 * 'Ford' which we will give 01. Put those together and you get 0101. If 'Auto'
 * had another subcategory named 'VW', then it's id would be 01 because it
 * belongs to the 'Ford' category and then 02 because it's the next category.
 * So it's id would be 0102. If VW had a sub category called 'Engine' then it's
 * id would start at 01 again and it would get the 'VW' id 02 and 'Auto' id of
 * 01, making it 010201. If you want to search for sites under that category
 * then you pass it cat=010201 in the URL.
 * 
 * 
 * 
 * 
 * UDM_LIMIT_DATE - defines limitation by date the document was modified.
 * 
 * 
 * Format of parameter value: a string with first character &lt; or &gt;,
 * then with no space - date in unixtime format, for example:
 * 
 * 
 * 
 * 
 * 
 * 
 * ]]>
 * 
 * 
 * 
 * 
 * If &gt; character is used, then the search will be restricted to those
 * documents having a modification date greater than entered, if &lt;, then smaller.
 * 
 * 
 * 
 * 
 * UDM_LIMIT_DATE - defines limitation by date the document was modified.
 * 
 * Format of parameter value: a string with first character &lt; or &gt;,
 * then with no space - date in unixtime format, for example:
 * 
 * 
 * 
 * 
 * 
 * ]]>
 * 
 * 
 * 
 * If &gt; character is used, then the search will be restricted to those
 * documents having a modification date greater than entered, if &lt;, then smaller.
 * @param string $val Defines the value of the current parameter.
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_add_search_limit($agent, int $var, string $val): void
{
    error_clear_last();
    $result = \udm_add_search_limit($agent, $var, $val);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
}


/**
 * udm_alloc_agent_array will create an agent
 * with multiple database connections.
 * 
 * @param array $databases The array databases must contain one database
 * URL per element, analog to the first parameter of
 * udm_alloc_agent.
 * @return resource Returns a resource link identifier on success .
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_alloc_agent_array(array $databases)
{
    error_clear_last();
    $result = \udm_alloc_agent_array($databases);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
    return $result;
}


/**
 * Performs a search.
 * 
 * The search itself. The first argument - session, the next one -
 * query itself.  To find something just type words you want to find
 * and press SUBMIT button.  For example, "mysql odbc". You should
 * not use quotes " in query, they are written here only to divide a
 * query from other text. mnoGoSearch will find all documents that
 * contain word "mysql" and/or word "odbc".  Best documents having
 * bigger weights will be displayed first.  If you use search mode
 * ALL, search will return documents that contain both (or more)
 * words you entered. In case you use mode ANY, the search will
 * return list of documents that contain any of the words you
 * entered.  If you want more advanced results you may use query
 * language.  You should select "bool" match mode in the search
 * from.
 * 
 * @param resource $agent A link to Agent, received after call to
 * udm_alloc_agent.
 * @param string $query mnoGoSearch understands the following boolean operators:
 * 
 * &amp; - logical AND. For example, "mysql &amp;
 * odbc". mnoGoSearch will find any URLs that contain both
 * "mysql" and "odbc".
 * 
 * | - logical OR. For example "mysql|odbc". mnoGoSearch
 * will find any URLs, that contain word "mysql" or word
 * "odbc".
 * 
 * ~ - logical NOT. For example "mysql &amp; ~odbc".
 * mnoGoSearch will find URLs that contain word "mysql"
 * and do not contain word "odbc" at the same time. Note
 * that ~ just excludes given word from results.  Query
 * "~odbc" will find nothing!
 * 
 * () - group command to compose more complex queries.  For example
 * "(mysql | msql) &amp; ~postgres".  Query language is
 * simple and powerful at the same time. Just consider query as
 * usual boolean expression.
 * @return resource Returns a result link identifier on success .
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_find($agent, string $query)
{
    error_clear_last();
    $result = \udm_find($agent, $query);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
    return $result;
}


/**
 * Freeing up memory allocated for agent session.
 * 
 * @param resource $agent A link to Agent, received after call to
 * udm_alloc_agent.
 * @return int Returns TRUE on success .
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_free_agent($agent): int
{
    error_clear_last();
    $result = \udm_free_agent($agent);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
    return $result;
}


/**
 * Freeing up memory allocated for results.
 * 
 * @param resource $res A link to a result identifier, received after call to
 * udm_find.
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_free_res($res): void
{
    error_clear_last();
    $result = \udm_free_res($res);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
}


/**
 * Fetch a mnoGoSearch result field.
 * 
 * @param resource $res res - a link to result identifier, received
 * after call to udm_find.
 * @param int $row row - the number of the link on the current page.
 * May have values from 0 to
 * UDM_PARAM_NUM_ROWS-1.
 * @param int $field field - field identifier, may have the following values:
 * 
 * 
 * 
 * UDM_FIELD_URL - document URL field
 * 
 * 
 * 
 * 
 * UDM_FIELD_CONTENT - document
 * Content-type field (for example, text/html).
 * 
 * 
 * 
 * 
 * UDM_FIELD_CATEGORY - document category field. Use
 * udm_cat_path to get full path to current category
 * from the categories tree root. (This parameter is available only in PHP
 * 4.0.6 or later).
 * 
 * 
 * 
 * 
 * UDM_FIELD_TITLE - document title field.
 * 
 * 
 * 
 * 
 * UDM_FIELD_KEYWORDS - document keywords field (from META KEYWORDS tag).
 * 
 * 
 * 
 * 
 * UDM_FIELD_DESC - document description field (from META DESCRIPTION tag).
 * 
 * 
 * 
 * 
 * UDM_FIELD_TEXT - document body text (the first couple of lines to give an
 * idea of what the document is about).
 * 
 * 
 * 
 * 
 * UDM_FIELD_SIZE - document size.
 * 
 * 
 * 
 * 
 * UDM_FIELD_URLID - unique URL ID of the link.
 * 
 * 
 * 
 * 
 * UDM_FIELD_RATING  - page rating (as calculated by mnoGoSearch).
 * 
 * 
 * 
 * 
 * UDM_FIELD_MODIFIED - last-modified field in unixtime format.
 * 
 * 
 * 
 * 
 * UDM_FIELD_ORDER - the number of the current document in set of found documents.
 * 
 * 
 * 
 * 
 * UDM_FIELD_CRC - document CRC.
 * 
 * 
 * 
 * @return string udm_get_res_field returns result field value on
 * success, FALSE on error.
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_get_res_field($res, int $row, int $field): string
{
    error_clear_last();
    $result = \udm_get_res_field($res, $row, $field);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
    return $result;
}


/**
 * Gets the mnoGoSearch result parameters.
 * 
 * @param resource $res res - a link to result identifier, received after
 * call to udm_find.
 * @param int $param param - parameter identifier, may have the following values:
 * 
 * 
 * 
 * UDM_PARAM_NUM_ROWS - number of received found links on the current page.  It is equal to
 * UDM_PARAM_PAGE_SIZE for all search pages, on the last page - the rest of links.
 * 
 * 
 * 
 * 
 * UDM_PARAM_FOUND - total number of results matching the query.
 * 
 * 
 * 
 * 
 * UDM_PARAM_WORDINFO - information on the words found. E.g. search for
 * "a good book" will return "a: stopword, good:5637, book: 120"
 * 
 * 
 * 
 * 
 * UDM_PARAM_SEARCHTIME - search time in seconds.
 * 
 * 
 * 
 * 
 * UDM_PARAM_FIRST_DOC - the number of the first document displayed on current page.
 * 
 * 
 * 
 * 
 * UDM_PARAM_LAST_DOC - the number of the last document displayed on current page.
 * 
 * 
 * 
 * @return string udm_get_res_param returns result parameter value on
 * success, FALSE on error.
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_get_res_param($res, int $param): string
{
    error_clear_last();
    $result = \udm_get_res_param($res, $param);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
    return $result;
}


/**
 * udm_load_ispell_data loads ispell data.
 * 
 * After using this function to free memory allocated for ispell data, please
 * use udm_free_ispell_data, even if you use
 * UDM_ISPELL_TYPE_SERVER mode.
 * 
 * @param resource $agent A link to Agent, received after call to
 * udm_alloc_agent.
 * @param int $var Indicates the source for ispell data. May have the following values:
 * 
 * 
 * 
 * UDM_ISPELL_TYPE_DB - indicates that ispell data should be loaded from SQL.
 * In this case, parameters val1 and val2
 * are ignored and should be left blank. flag
 * should be equal to 1.
 * 
 * 
 * 
 * flag indicates that after loading ispell data
 * from defined source it should be sorted (it is necessary for correct
 * functioning of ispell). In case of loading ispell data from files
 * there may be several calls to udm_load_ispell_data,
 * and there is no sense to sort data after every call, but only after
 * the last one. Since in db mode all the data is loaded by one call,
 * this parameter should have the value 1. In this mode
 * in case of error, e.g. if ispell tables are absent, the function will
 * return FALSE and code and error message will be accessible through
 * udm_error and udm_errno.
 * 
 * 
 * 
 * 
 * 
 * UDM_ISPELL_TYPE_AFFIX - indicates that ispell data should be loaded from
 * file and initiates loading affixes file. In this case val1
 * defines double letter language code for which affixes are loaded,
 * and val2 - file path. Please note, that if
 * a relative path entered, the module looks for the file not in UDM_CONF_DIR,
 * but in relation to current path, i.e. to the path where the script is executed.
 * In case of error in this mode, e.g. if file is absent, the function will return
 * FALSE, and an error message will be displayed. Error message text cannot be
 * accessed through udm_error and udm_errno,
 * since those functions can only return messages associated with SQL. Please,
 * see flag parameter description in UDM_ISPELL_TYPE_DB.
 * 
 * 
 * 
 * udm_load_ispell_data example
 * 
 * 
 * ]]>
 * 
 * 
 * 
 * 
 * 
 * flag is equal to 1 only in the last call.
 * 
 * 
 * 
 * 
 * 
 * UDM_ISPELL_TYPE_SPELL - indicates that ispell data should be loaded from
 * file and initiates loading of ispell dictionary file. In this case
 * val1 defines double letter language code for which
 * affixes are loaded,
 * and val2 - file path. Please note, that if a relative
 * path entered, the module looks for the file not in UDM_CONF_DIR, but in
 * relation to current path, i.e. to the path where the script is executed.
 * In case of error in this mode, e.g. if file is absent, the function will
 * return FALSE, and an error message will be displayed. Error message text
 * cannot be accessed through udm_error and
 * udm_errno, since those functions can only return messages
 * associated with SQL. Please, see flag parameter
 * description in UDM_ISPELL_TYPE_DB.
 * 
 * 
 * 
 * 
 * ]]>
 * 
 * 
 * 
 * 
 * flag is equal to 1 only in the last call.
 * 
 * 
 * 
 * 
 * 
 * UDM_ISPELL_TYPE_SERVER - enables spell server support.
 * val1 parameter indicates
 * address of the host running spell server. val2 `
 * is not used yet, but in future releases it is going to indicate number
 * of port used by spell server. flag parameter in
 * this case is not needed since ispell data is stored
 * on spellserver already sorted.
 * 
 * 
 * Spelld server reads spell-data from a separate configuration file
 * (/usr/local/mnogosearch/etc/spelld.conf by default), sorts it and stores in
 * memory. With clients server communicates in two ways: to indexer all the
 * data is transferred (so that indexer starts faster), from search.cgi server
 * receives word to normalize and then passes over to client (search.cgi) list
 * of normalized word forms. This allows fastest, compared to db and text modes
 * processing of search queries (by omitting loading and sorting all the spell data).
 * 
 * 
 * udm_load_ispell_data function in UDM_ISPELL_TYPE_SERVER
 * mode does not actually load ispell data, but only defines server address.
 * In fact, server is automatically used by udm_find
 * function when performing search. In case of errors, e.g. if spellserver
 * is not running or invalid host indicated, there are no messages returned
 * and ispell conversion does not work.
 * 
 * 
 * 
 * This function is available in mnoGoSearch 3.1.12 or later.
 * 
 * 
 * Example:
 * 
 * 
 * 
 * ]]>
 * 
 * 
 * 
 * 
 * 
 * flag indicates that after loading ispell data
 * from defined source it should be sorted (it is necessary for correct
 * functioning of ispell). In case of loading ispell data from files
 * there may be several calls to udm_load_ispell_data,
 * and there is no sense to sort data after every call, but only after
 * the last one. Since in db mode all the data is loaded by one call,
 * this parameter should have the value 1. In this mode
 * in case of error, e.g. if ispell tables are absent, the function will
 * return FALSE and code and error message will be accessible through
 * udm_error and udm_errno.
 * 
 * UDM_ISPELL_TYPE_AFFIX - indicates that ispell data should be loaded from
 * file and initiates loading affixes file. In this case val1
 * defines double letter language code for which affixes are loaded,
 * and val2 - file path. Please note, that if
 * a relative path entered, the module looks for the file not in UDM_CONF_DIR,
 * but in relation to current path, i.e. to the path where the script is executed.
 * In case of error in this mode, e.g. if file is absent, the function will return
 * FALSE, and an error message will be displayed. Error message text cannot be
 * accessed through udm_error and udm_errno,
 * since those functions can only return messages associated with SQL. Please,
 * see flag parameter description in UDM_ISPELL_TYPE_DB.
 * 
 * 
 * udm_load_ispell_data example
 * 
 * 
 * ]]>
 * 
 * 
 * 
 * flag is equal to 1 only in the last call.
 * 
 * UDM_ISPELL_TYPE_SPELL - indicates that ispell data should be loaded from
 * file and initiates loading of ispell dictionary file. In this case
 * val1 defines double letter language code for which
 * affixes are loaded,
 * and val2 - file path. Please note, that if a relative
 * path entered, the module looks for the file not in UDM_CONF_DIR, but in
 * relation to current path, i.e. to the path where the script is executed.
 * In case of error in this mode, e.g. if file is absent, the function will
 * return FALSE, and an error message will be displayed. Error message text
 * cannot be accessed through udm_error and
 * udm_errno, since those functions can only return messages
 * associated with SQL. Please, see flag parameter
 * description in UDM_ISPELL_TYPE_DB.
 * 
 * flag is equal to 1 only in the last call.
 * 
 * UDM_ISPELL_TYPE_SERVER - enables spell server support.
 * val1 parameter indicates
 * address of the host running spell server. val2 `
 * is not used yet, but in future releases it is going to indicate number
 * of port used by spell server. flag parameter in
 * this case is not needed since ispell data is stored
 * on spellserver already sorted.
 * 
 * Spelld server reads spell-data from a separate configuration file
 * (/usr/local/mnogosearch/etc/spelld.conf by default), sorts it and stores in
 * memory. With clients server communicates in two ways: to indexer all the
 * data is transferred (so that indexer starts faster), from search.cgi server
 * receives word to normalize and then passes over to client (search.cgi) list
 * of normalized word forms. This allows fastest, compared to db and text modes
 * processing of search queries (by omitting loading and sorting all the spell data).
 * 
 * udm_load_ispell_data function in UDM_ISPELL_TYPE_SERVER
 * mode does not actually load ispell data, but only defines server address.
 * In fact, server is automatically used by udm_find
 * function when performing search. In case of errors, e.g. if spellserver
 * is not running or invalid host indicated, there are no messages returned
 * and ispell conversion does not work.
 * 
 * This function is available in mnoGoSearch 3.1.12 or later.
 * 
 * The fastest mode is UDM_ISPELL_TYPE_SERVER.
 * UDM_ISPELL_TYPE_TEXT is slower
 * and UDM_ISPELL_TYPE_DB is the slowest. The above pattern is TRUE for
 * mnoGoSearch 3.1.10 - 3.1.11. It is planned to speed up DB mode in future
 * versions and it is going to be faster than TEXT mode.
 * @param string $val1 
 * @param string $val2 
 * @param int $flag 
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_load_ispell_data($agent, int $var, string $val1, string $val2, int $flag): void
{
    error_clear_last();
    $result = \udm_load_ispell_data($agent, $var, $val1, $val2, $flag);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
}


/**
 * Defines mnoGoSearch session parameters.
 * 
 * @param resource $agent A link to Agent, received after call to
 * udm_alloc_agent.
 * @param int $var The following parameters and their values are available:
 * 
 * 
 * 
 * UDM_PARAM_PAGE_NUM - used to choose search results page number (results
 * are returned by pages beginning from 0, with UDM_PARAM_PAGE_SIZE results per page).
 * 
 * 
 * 
 * 
 * UDM_PARAM_PAGE_SIZE - number of search results displayed on one page.
 * 
 * 
 * 
 * 
 * UDM_PARAM_SEARCH_MODE - search mode. The following values available: UDM_MODE_ALL -
 * search for all words; UDM_MODE_ANY - search for any word; UDM_MODE_PHRASE -
 * phrase search; UDM_MODE_BOOL - boolean search. See udm_find
 * for details on boolean search.
 * 
 * 
 * 
 * 
 * UDM_PARAM_CACHE_MODE - turns on or off search result cache mode.
 * When enabled, the search engine will store
 * search results to disk. In case a similar search is performed later,
 * the engine will take results from the cache for faster performance.
 * Available values: UDM_CACHE_ENABLED,
 * UDM_CACHE_DISABLED.
 * 
 * 
 * 
 * 
 * UDM_PARAM_TRACK_MODE - turns on or off trackquery mode. Since
 * version 3.1.2 mnoGoSearch has a query tracking support.
 * Note that tracking is implemented in SQL version only and not available
 * in built-in database.
 * To use tracking, you have to create tables for tracking support.
 * For MySQL, use create/mysql/track.txt.
 * When doing a search, front-end uses those tables to store query words,
 * a number of found documents and current Unix timestamp in seconds.
 * Available values: UDM_TRACK_ENABLED,
 * UDM_TRACK_DISABLED.
 * 
 * 
 * 
 * 
 * UDM_PARAM_PHRASE_MODE - defines whether index database using phrases
 * ("phrase" parameter in indexer.conf).
 * Possible values: UDM_PHRASE_ENABLED and UDM_PHRASE_DISABLED.
 * Please note, that if phrase search is enabled (UDM_PHRASE_ENABLED),
 * it is still possible to do search in any mode (ANY, ALL,
 * BOOL or PHRASE).
 * In 3.1.10 version of mnoGoSearch phrase search is supported only in sql
 * and built-in database modes,
 * while beginning with 3.1.11 phrases are supported in cachemode as well.
 * 
 * 
 * Examples of phrase search:
 * 
 * 
 * "Arizona desert" - This query returns all indexed documents that contain
 * "Arizona desert" as a phrase. Notice that you need to put double quotes
 * around the phrase
 * 
 * 
 * 
 * 
 * UDM_PARAM_CHARSET - defines local charset. Available values: set of
 * charsets supported by mnoGoSearch, e.g. koi8-r, cp1251, ...
 * 
 * 
 * 
 * 
 * UDM_PARAM_STOPFILE - Defines name and path
 * to stopwords file.  (There is a small difference with mnoGoSearch
 * - while in mnoGoSearch if relative path or no path entered, it
 * looks for this file in relation to UDM_CONF_DIR, the module looks for
 * the file in relation to current path, i.e. to the path where the
 * PHP script is executed.)
 * 
 * 
 * 
 * 
 * UDM_PARAM_STOPTABLE - Load stop words from the given SQL table. You may use
 * several StopwordTable commands.
 * This command has no effect when compiled without SQL database support.
 * 
 * 
 * 
 * 
 * UDM_PARAM_WEIGHT_FACTOR - represents weight factors for specific document parts.
 * Currently body, title, keywords, description, url are supported.
 * To activate this feature please use degrees of 2 in *Weight commands of
 * the indexer.conf. Let's imagine that we have these weights:
 * 
 * 
 * URLWeight     1
 * BodyWeight    2
 * TitleWeight   4
 * KeywordWeight 8
 * DescWeight    16
 * 
 * 
 * 
 * As far as indexer uses bit OR operation for word weights when some
 * word presents several time in the same document, it is possible at search
 * time to detect word appearance in different document parts. Word which
 * appears only in the body will have 00000010 aggregate weight (in binary notation).
 * Word used in all document parts will have 00011111 aggregate weight.
 * 
 * 
 * 
 * This parameter's value is a string of hex digits ABCDE. Each digit is a
 * factor for corresponding bit in word weight. For the given above weights
 * configuration:
 * 
 * 
 * E is a factor for weight 1  (URL Weight bit)
 * D is a factor for weight 2  (BodyWeight bit)
 * C is a factor for weight 4  (TitleWeight bit)
 * B is a factor for weight 8  (KeywordWeight bit)
 * A is a factor for weight 16 (DescWeight bit)
 * 
 * 
 * Examples:
 * 
 * 
 * UDM_PARAM_WEIGHT_FACTOR=00001 will search through URLs only.
 * 
 * 
 * UDM_PARAM_WEIGHT_FACTOR=00100 will search through Titles only.
 * 
 * 
 * UDM_PARAM_WEIGHT_FACTOR=11100 will search through Title,Keywords,Description
 * but not through URL and Body.
 * 
 * 
 * UDM_PARAM_WEIGHT_FACTOR=F9421 will search through:
 * 
 * 
 * Description with factor 15  (F hex)
 * Keywords with factor 9
 * Title with factor  4
 * Body with factor 2
 * URL with factor 1
 * 
 * 
 * If UDM_PARAM_WEIGHT_FACTOR variable is omitted, original weight value is
 * taken to sort results. For a given above weight configuration it means
 * that document description has a most big weight 16.
 * 
 * 
 * 
 * 
 * UDM_PARAM_WORD_MATCH - word match. You may use this parameter to choose
 * word match type. This feature works only in "single" and "multi" modes
 * using SQL based and built-in database. It does not work in cachemode and other modes
 * since they use word CRC and do not support substring search. Available values:
 * 
 * UDM_MATCH_BEGIN - word beginning match;
 * UDM_MATCH_END - word ending match;
 * UDM_MATCH_WORD - whole word match;
 * UDM_MATCH_SUBSTR - word substring match.
 * 
 * 
 * 
 * UDM_PARAM_MIN_WORD_LEN - defines minimal word length.
 * Any word shorter this limit is considered to be a stopword. Please note
 * that this parameter value is inclusive, i.e. if UDM_PARAM_MIN_WORD_LEN=3,
 * a word 3 characters long will not be considered a stopword, while
 * a word 2 characters long will be. Default value is 1.
 * 
 * 
 * 
 * 
 * UDM_PARAM_ISPELL_PREFIXES - Possible values: UDM_PREFIXES_ENABLED and
 * UDM_PREFIXES_DISABLED, that respectively enable or disable using prefixes.
 * E.g. if a word "tested" is in search query, also words like "test",
 * "testing", etc. Only suffixes are supported by default. Prefixes usually
 * change word meanings, for example if somebody is searching for the word "tested"
 * one hardly wants "untested"  to be found. Prefixes support may also be
 * found useful for site's spelling checking purposes. In order to enable
 * ispell, you have to load ispell data with udm_load_ispell_data.
 * 
 * 
 * 
 * 
 * UDM_PARAM_CROSS_WORDS - enables or disables crosswords support.
 * Possible values: UDM_CROSS_WORDS_ENABLED and UDM_CROSS_WORDS_DISABLED.
 * 
 * 
 * The crosswords feature allows to assign words between &lt;a href="xxx"&gt; and &lt;/a&gt;
 * also to a document this link leads to. It works in SQL database mode and
 * is not supported in built-in database and Cachemode.
 * 
 * 
 * 
 * 
 * UDM_PARAM_VARDIR - specifies a custom path to directory where indexer
 * stores data when using built-in database and in cache mode.
 * By default /var directory of
 * mnoGoSearch installation is used. Can have
 * only string values.
 * 
 * 
 * 
 * @param string $val 
 * @throws Exceptions\MnogosearchException
 * 
 */
function udm_set_agent_param($agent, int $var, string $val): void
{
    error_clear_last();
    $result = \udm_set_agent_param($agent, $var, $val);
    if ($result === FALSE) {
        throw Exceptions\MnogosearchException::createFromPhpError();
    }
}


