<?php

namespace Safe;

/**
 * Retrieves information about file cache content and its usage.
 * 
 * @param bool $summaryonly Controls whether the returned array will contain information about individual cache entries 
 * along with the file cache summary.
 * @return array Array of meta data about file cache  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * total_cache_uptime - total time in seconds that the file cache has been active
 * 
 * 
 * 
 * 
 * total_file_count - total number of files that are currently in the file cache
 * 
 * 
 * 
 * 
 * total_hit_count - number of times the files have been served from the file cache
 * 
 * 
 * 
 * 
 * total_miss_count - number of times the files have not been found in the file cache
 * 
 * 
 * 
 * 
 * file_entries - an array that contains the information about all the cached files:
 * 
 * 
 * 
 * file_name - absolute file name of the cached file
 * 
 * 
 * 
 * 
 * add_time - time in seconds since the file has been added to the file cache
 * 
 * 
 * 
 * 
 * use_time - time in seconds since the file has been accessed in the file cache
 * 
 * 
 * 
 * 
 * last_check - time in seconds since the file has been checked for modifications
 * 
 * 
 * 
 * 
 * hit_count - number of times the file has been served from the cache
 * 
 * 
 * 
 * 
 * file_size - size of the cached file in bytes
 * 
 * 
 * 
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_fcache_fileinfo(bool $summaryonly = false): array
{
    error_clear_last();
    $result = \wincache_fcache_fileinfo($summaryonly);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about memory usage by file cache.
 * 
 * @return array Array of meta data about file cache memory usage  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * memory_total - amount of memory in bytes allocated for the file cache
 * 
 * 
 * 
 * 
 * memory_free - amount of free memory in bytes available for the file cache
 * 
 * 
 * 
 * 
 * num_used_blks - number of memory blocks used by the file cache
 * 
 * 
 * 
 * 
 * num_free_blks - number of free memory blocks available for the file cache
 * 
 * 
 * 
 * 
 * memory_overhead - amount of memory in bytes used for the file cache internal structures
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_fcache_meminfo(): array
{
    error_clear_last();
    $result = \wincache_fcache_meminfo();
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Obtains an exclusive lock on a given key. The execution of the current script will be blocked until the 
 * lock can be obtained. Once the lock is obtained, the other scripts that try to request the lock by using the same 
 * key will be blocked, until the current script releases the lock by using wincache_unlock.
 * 
 * @param string $key Name of the key in the cache to get the lock on.
 * @param bool $isglobal Controls whether the scope of the lock is system-wide or local. Local locks are scoped to the application pool 
 * in IIS FastCGI case or to all php processes that have the same parent process identifier.
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_lock(string $key, bool $isglobal = false): void
{
    error_clear_last();
    $result = \wincache_lock($key, $isglobal);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
}


/**
 * Retrieves information about opcode cache content and its usage.
 * 
 * @param bool $summaryonly Controls whether the returned array will contain information about individual cache entries 
 * along with the opcode cache summary.
 * @return array Array of meta data about opcode cache  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * total_cache_uptime - total time in seconds that the opcode cache has been active
 * 
 * 
 * 
 * 
 * total_file_count - total number of files that are currently in the opcode cache
 * 
 * 
 * 
 * 
 * total_hit_count - number of times the compiled opcode have been served from the cache
 * 
 * 
 * 
 * 
 * total_miss_count - number of times the compiled opcode have not been found in the cache
 * 
 * 
 * 
 * 
 * is_local_cache - true is the cache metadata is for a local cache instance, 
 * false if the metadata is for the global cache
 * 
 * 
 * 
 * 
 * file_entries - an array that contains the information about all the cached files:
 * 
 * 
 * 
 * file_name - absolute file name of the cached file
 * 
 * 
 * 
 * 
 * add_time - time in seconds since the file has been added to the opcode cache
 * 
 * 
 * 
 * 
 * use_time - time in seconds since the file has been accessed in the opcode cache
 * 
 * 
 * 
 * 
 * last_check - time in seconds since the file has been checked for modifications
 * 
 * 
 * 
 * 
 * hit_count - number of times the file has been served from the cache
 * 
 * 
 * 
 * 
 * function_count - number of functions in the cached file
 * 
 * 
 * 
 * 
 * class_count - number of classes in the cached file
 * 
 * 
 * 
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_ocache_fileinfo(bool $summaryonly = false): array
{
    error_clear_last();
    $result = \wincache_ocache_fileinfo($summaryonly);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about memory usage by opcode cache.
 * 
 * @return array Array of meta data about opcode cache memory usage  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * memory_total - amount of memory in bytes allocated for the opcode cache
 * 
 * 
 * 
 * 
 * memory_free - amount of free memory in bytes available for the opcode cache
 * 
 * 
 * 
 * 
 * num_used_blks - number of memory blocks used by the opcode cache
 * 
 * 
 * 
 * 
 * num_free_blks - number of free memory blocks available for the opcode cache
 * 
 * 
 * 
 * 
 * memory_overhead - amount of memory in bytes used for the opcode cache internal structures
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_ocache_meminfo(): array
{
    error_clear_last();
    $result = \wincache_ocache_meminfo();
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Refreshes the cache entries for the files, whose names were passed in the input argument. 
 * If no argument is specified then refreshes all the entries in the cache.
 * 
 * @param array $files An array of file names for files that need to be refreshed. 
 * An absolute or relative file paths can be used.
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_refresh_if_changed(array $files = NULL): void
{
    error_clear_last();
    $result = \wincache_refresh_if_changed($files);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
}


/**
 * Retrieves information about cached mappings between relative file paths 
 * and corresponding absolute file paths.
 * 
 * @param bool $summaryonly 
 * @return array Array of meta data about the resolve file path cache  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * total_file_count - total number of file path 
 * mappings stored in the cache
 * 
 * 
 * 
 * 
 * rplist_entries - an array that contains the information about all 
 * the cached file paths:
 * 
 * 
 * 
 * resolve_path - path to a file
 * 
 * 
 * 
 * 
 * subkey_data - corresponding absolute path to a file
 * 
 * 
 * 
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_rplist_fileinfo(bool $summaryonly = false): array
{
    error_clear_last();
    $result = \wincache_rplist_fileinfo($summaryonly);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about memory usage by resolve file path cache.
 * 
 * @return array Array of meta data that describes memory usage by resolve file path cache.  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * memory_total - amount of memory in bytes allocated for the resolve file path cache
 * 
 * 
 * 
 * 
 * memory_free - amount of free memory in bytes available for the resolve file path cache
 * 
 * 
 * 
 * 
 * num_used_blks - number of memory blocks used by the resolve file path cache
 * 
 * 
 * 
 * 
 * num_free_blks - number of free memory blocks available for the resolve file path cache
 * 
 * 
 * 
 * 
 * memory_overhead - amount of memory in bytes used for the internal structures of resolve file path cache
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_rplist_meminfo(): array
{
    error_clear_last();
    $result = \wincache_rplist_meminfo();
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about session cache content and its usage.
 * 
 * @param bool $summaryonly Controls whether the returned array will contain information about individual cache entries 
 * along with the session cache summary.
 * @return array Array of meta data about session cache  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * total_cache_uptime - total time in seconds that the session cache has been active
 * 
 * 
 * 
 * 
 * total_item_count - total number of elements that are currently in the session cache
 * 
 * 
 * 
 * 
 * is_local_cache - true is the cache metadata is for a local cache instance, 
 * false if the metadata is for the global cache
 * 
 * 
 * 
 * 
 * total_hit_count - number of times the data has been served from the cache
 * 
 * 
 * 
 * 
 * total_miss_count - number of times the data has not been found in the cache
 * 
 * 
 * 
 * 
 * scache_entries - an array that contains the information about all the cached items:
 * 
 * 
 * 
 * key_name - name of the key which is used to store the data
 * 
 * 
 * 
 * 
 * value_type - type of value stored by the key
 * 
 * 
 * 
 * 
 * use_time - time in seconds since the file has been accessed in the opcode cache
 * 
 * 
 * 
 * 
 * last_check - time in seconds since the file has been checked for modifications
 * 
 * 
 * 
 * 
 * ttl_seconds - time remaining for the data to live in the cache, 0 meaning infinite
 * 
 * 
 * 
 * 
 * age_seconds - time elapsed from the time data has been added in the cache
 * 
 * 
 * 
 * 
 * hitcount - number of times data has been served from the cache
 * 
 * 
 * 
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_scache_info(bool $summaryonly = false): array
{
    error_clear_last();
    $result = \wincache_scache_info($summaryonly);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about memory usage by session cache.
 * 
 * @return array Array of meta data about session cache memory usage  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * memory_total - amount of memory in bytes allocated for the session cache
 * 
 * 
 * 
 * 
 * memory_free - amount of free memory in bytes available for the session cache
 * 
 * 
 * 
 * 
 * num_used_blks - number of memory blocks used by the session cache
 * 
 * 
 * 
 * 
 * num_free_blks - number of free memory blocks available for the session cache
 * 
 * 
 * 
 * 
 * memory_overhead - amount of memory in bytes used for the session cache internal structures
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_scache_meminfo(): array
{
    error_clear_last();
    $result = \wincache_scache_meminfo();
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Compares the variable associated with the key with old_value 
 * and if it matches then assigns the new_value to it.
 * 
 * @param string $key The key that is used to store the variable in the cache. 
 * key is case sensitive.
 * @param int $old_value Old value of the variable pointed by key in the user cache. 
 * The value should be of type long, otherwise the function returns 
 * FALSE.
 * @param int $new_value New value which will get assigned to variable pointer by key if a 
 * match is found. The value should be of type long, otherwise 
 * the function returns FALSE.
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_ucache_cas(string $key, int $old_value, int $new_value): void
{
    error_clear_last();
    $result = \wincache_ucache_cas($key, $old_value, $new_value);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
}


/**
 * Clears/deletes all the values stored in the user cache.
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_ucache_clear(): void
{
    error_clear_last();
    $result = \wincache_ucache_clear();
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
}


/**
 * Deletes the elements in the user cache pointed by key.
 * 
 * @param mixed $key The key that was used to store the variable in the cache. 
 * key is case sensitive. key can be an 
 * array of keys.
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_ucache_delete($key): void
{
    error_clear_last();
    $result = \wincache_ucache_delete($key);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
}


/**
 * Retrieves information about data stored in the user cache.
 * 
 * @param bool $summaryonly Controls whether the returned array will contain information about individual cache entries 
 * along with the user cache summary.
 * @param string $key The key of an entry in the user cache. If specified then the returned array will contain information 
 * only about that cache entry. If not specified and summaryonly is set to 
 * FALSE then the returned array will contain information about all entries in the cache.
 * @return array Array of meta data about user cache  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * total_cache_uptime - total time in seconds that the user cache has been active
 * 
 * 
 * 
 * 
 * total_item_count - total number of elements that are currently in the user cache
 * 
 * 
 * 
 * 
 * is_local_cache - true is the cache metadata is for a local cache instance, 
 * false if the metadata is for the global cache
 * 
 * 
 * 
 * 
 * total_hit_count - number of times the data has been served from the cache
 * 
 * 
 * 
 * 
 * total_miss_count - number of times the data has not been found in the cache
 * 
 * 
 * 
 * 
 * ucache_entries - an array that contains the information about all the cached items:
 * 
 * 
 * 
 * key_name - name of the key which is used to store the data
 * 
 * 
 * 
 * 
 * value_type - type of value stored by the key
 * 
 * 
 * 
 * 
 * use_time - time in seconds since the file has been accessed in the opcode cache
 * 
 * 
 * 
 * 
 * last_check - time in seconds since the file has been checked for modifications
 * 
 * 
 * 
 * 
 * is_session - indicates if the data is a session variable
 * 
 * 
 * 
 * 
 * ttl_seconds - time remaining for the data to live in the cache, 0 meaning infinite
 * 
 * 
 * 
 * 
 * age_seconds - time elapsed from the time data has been added in the cache
 * 
 * 
 * 
 * 
 * hitcount - number of times data has been served from the cache
 * 
 * 
 * 
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_ucache_info(bool $summaryonly = false, string $key = NULL): array
{
    error_clear_last();
    $result = \wincache_ucache_info($summaryonly, $key);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieves information about memory usage by user cache.
 * 
 * @return array Array of meta data about user cache memory usage  
 * 
 * The array returned by this function contains the following elements:
 * 
 * 
 * 
 * memory_total - amount of memory in bytes allocated for the user cache
 * 
 * 
 * 
 * 
 * memory_free - amount of free memory in bytes available for the user cache
 * 
 * 
 * 
 * 
 * num_used_blks - number of memory blocks used by the user cache
 * 
 * 
 * 
 * 
 * num_free_blks - number of free memory blocks available for the user cache
 * 
 * 
 * 
 * 
 * memory_overhead - amount of memory in bytes used for the user cache internal structures
 * 
 * 
 * 
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_ucache_meminfo(): array
{
    error_clear_last();
    $result = \wincache_ucache_meminfo();
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Releases an exclusive lock that was obtained on a given key by using wincache_lock. 
 * If any other process was blocked waiting for the lock on this key, that process will be able to obtain 
 * the lock.
 * 
 * @param string $key Name of the key in the cache to release the lock on.
 * @throws Exceptions\WincacheException
 * 
 */
function wincache_unlock(string $key): void
{
    error_clear_last();
    $result = \wincache_unlock($key);
    if ($result === FALSE) {
        throw Exceptions\WincacheException::createFromPhpError();
    }
}


