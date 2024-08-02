<?php

namespace Safe;

use Safe\Exceptions\CubridException;

/**
 * The cubrid_bind function is used to bind values to a
 * corresponding named or question mark placeholder in the SQL statement that
 * was passed to cubrid_prepare. If
 * bind_value_type is not given, string will be the
 * default.
 *
 * The following table shows the types of substitute values.
 *
 *
 * CUBRID Bind Date Types
 *
 *
 *
 * Support
 * Bind Type
 * Corresponding SQL Type
 *
 *
 *
 *
 * Supported
 * STRING
 * CHAR, VARCHAR
 *
 *
 *
 * NCHAR
 * NCHAR, NVARCHAR
 *
 *
 *
 * BIT
 * BIT, VARBIT
 *
 *
 *
 * NUMERIC or NUMBER
 * SHORT, INT, NUMERIC
 *
 *
 *
 * FLOAT
 * FLOAT
 *
 *
 *
 * DOUBLE
 * DOUBLE
 *
 *
 *
 * TIME
 * TIME
 *
 *
 *
 * DATE
 * DATE
 *
 *
 *
 * TIMESTAMP
 * TIMESTAMP
 *
 *
 *
 * OBJECT
 * OBJECT
 *
 *
 *
 * ENUM
 * ENUM
 *
 *
 *
 * BLOB
 * BLOB
 *
 *
 *
 * CLOB
 * CLOB
 *
 *
 *
 * NULL
 * NULL
 *
 *
 * Not supported
 * SET
 * SET
 *
 *
 *
 * MULTISET
 * MULTISET
 *
 *
 *
 * SEQUENCE
 * SEQUENCE
 *
 *
 *
 *
 *
 * @param resource $req_identifier Request identifier as a result of
 * cubrid_prepare.
 * @param int $bind_index Location of binding parameters. It starts with 1.
 * @param mixed $bind_value Actual value for binding.
 * @param string $bind_value_type A type of the value to bind. (It is omitted by default.
 * Thus, the system internally uses string by default. However, you need to
 * specify the exact type of the value as an argument when they are NCHAR,
 * BIT, or BLOB/CLOB).
 * @throws CubridException
 *
 */
function cubrid_bind($req_identifier, int $bind_index, $bind_value, string $bind_value_type = null): void
{
    error_clear_last();
    if ($bind_value_type !== null) {
        $safeResult = \cubrid_bind($req_identifier, $bind_index, $bind_value, $bind_value_type);
    } else {
        $safeResult = \cubrid_bind($req_identifier, $bind_index, $bind_value);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_col_size function is used to get the
 * number of elements in a collection type (set, multiset, sequence)
 * attribute.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID the instance that you want to work with.
 * @param string $attr_name Name of the attribute that you want to work with.
 * @return int Number of elements, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_col_size($conn_identifier, string $oid, string $attr_name): int
{
    error_clear_last();
    $safeResult = \cubrid_col_size($conn_identifier, $oid, $attr_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_column_names function is used to get the
 * column names of the query result by using req_identifier.
 *
 * @param resource $req_identifier Request identifier.
 * @return array Array of string values containing the column names, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_column_names($req_identifier): array
{
    error_clear_last();
    $safeResult = \cubrid_column_names($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_column_types function gets column types of
 * query results by using req_identifier.
 *
 * @param resource $req_identifier Request identifier.
 * @return array Array of string values containing the column types, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_column_types($req_identifier): array
{
    error_clear_last();
    $safeResult = \cubrid_column_types($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_commit function is used to execute commit
 * on the transaction pointed by conn_identifier,
 * currently in progress. Connection to the server is closed after the
 * cubrid_commit function is called; However,
 * the connection handle is still valid.
 *
 * In CUBRID PHP, auto-commit mode is disabled by default for transaction management.
 * You can set it by using cubrid_set_autocommit.
 * You can get its status by using cubrid_get_autocommit. Before you start a transaction,
 * remember to disable the auto-commit mode.
 *
 * @param resource $conn_identifier Connection identifier.
 * @throws CubridException
 *
 */
function cubrid_commit($conn_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_commit($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_connect_with_url function is used to
 * establish the environment for connecting to your server by using connection
 * information passed with an url string argument. If the HA feature is
 * enabled in CUBRID, you must specify the connection information of the
 * standby server, which is used for failover when failure occurs, in the url
 * string argument of this function. If the user name and password is not
 * given, then the "PUBLIC" connection will be made by default.
 *
 * &lt;url&gt; ::= CUBRID:&lt;host&gt;:&lt;db_name&gt;:&lt;db_user&gt;:&lt;db_password&gt;:[?&lt;properties&gt;]
 *
 * &lt;properties&gt; ::= &lt;property&gt; [&amp;&lt;property&gt;]
 *
 * &lt;properties&gt; ::= alhosts=&lt;alternative_hosts&gt;[ &amp;rctime=&lt;time&gt;]
 *
 * &lt;properties&gt; ::= login_timeout=&lt;milli_sec&gt;
 *
 * &lt;properties&gt; ::= query_timeout=&lt;milli_sec&gt;
 *
 * &lt;properties&gt; ::= disconnect_on_query_timeout=true|false
 *
 * &lt;alternative_hosts&gt; ::= &lt;standby_broker1_host&gt;:&lt;port&gt; [,&lt;standby_broker2_host&gt;:&lt;port&gt;]
 *
 * &lt;host&gt; := HOSTNAME | IP_ADDR
 *
 * &lt;time&gt; := SECOND
 *
 * &lt;milli_sec&gt; := MILLI SECOND
 *
 *
 * host : A host name or IP address of the master database
 * db_name : A name of the database
 * db_user : A name of the database user
 * db_password : A database user password
 *
 * alhosts : Specifies the broker information of the standby server, which is
 * used for failover when it is impossible to connect to the active server.
 * You can specify multiple brokers for failover, and the connection to the brokers
 * is attempted in the order listed in alhosts
 *
 * rctime : An interval between the attempts to connect to the active broker in
 * which failure occurred. After a failure occurs, the system connects to the
 * broker specified by althosts (failover), terminates the transaction, and then
 * attempts to connect to the active broker of the master database at every rctime.
 * The default value is 600 seconds.
 *
 * login_timeout : Timeout value (unit: msec.) for database login. The default
 * value is 0, which means infinite postponement.
 *
 *
 * query_timeout : Timeout value (unit: msec.) for query request. Upon timeout,
 * a message to cancel requesting a query transferred to server is sent. The return
 * value can depend on the disconnect_on_query_timeout configuration; even though the
 * message to cancel a request is sent to server, that request may succeed.
 *
 *
 * disconnect_on_query_timeout : Configures a value whether to immediately return
 * an error of function being executed upon timeout. The default value is false.
 *
 *
 *
 * @param string $conn_url A character string that contains server connection information.
 * @param string $userid User name for the database.
 * @param string $passwd User password.
 * @param bool $new_link If a second call is made to
 * cubrid_connect_with_url with the same arguments,
 * no new connection will be established, but instead, the connection
 * identifier of the already opened connection will be returned. The
 * new_link parameter modifies this behavior and
 * makes cubrid_connect_with_url always open a new
 * connection, even if cubrid_connect_with_url was
 * called before with the same parameters.
 * @return resource Connection identifier, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_connect_with_url(string $conn_url, string $userid = null, string $passwd = null, bool $new_link = false)
{
    error_clear_last();
    if ($new_link !== false) {
        $safeResult = \cubrid_connect_with_url($conn_url, $userid, $passwd, $new_link);
    } elseif ($passwd !== null) {
        $safeResult = \cubrid_connect_with_url($conn_url, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_connect_with_url($conn_url, $userid);
    } else {
        $safeResult = \cubrid_connect_with_url($conn_url);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_connect function is used to establish the
 * environment for connecting to your server by using your server address,
 * port number, database name, user name, and password. If the user name and
 * password is not given, then the "PUBLIC" connection will be made by
 * default.
 *
 * @param string $host Host name or IP address of CUBRID CAS server.
 * @param int $port Port number of CUBRID CAS server (BROKER_PORT configured in $CUBRID/conf/cubrid_broker.conf).
 * @param string $dbname Name of database.
 * @param string $userid User name for the database. If not given, the default
 * value is "public".
 * @param string $passwd User password. If not given, the default value is "".
 * @param bool $new_link If a second call is made to
 * cubrid_connect with the same arguments, no new
 * connection will be established, but instead, the connection identifier
 * of the already opened connection will be returned. The
 * new_link parameter modifies this behavior and
 * makes cubrid_connect always open a new connection,
 * even if cubrid_connect was called before with the
 * same parameters.
 * @return resource Connection identifier, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_connect(string $host, int $port, string $dbname, string $userid = null, string $passwd = null, bool $new_link = false)
{
    error_clear_last();
    if ($new_link !== false) {
        $safeResult = \cubrid_connect($host, $port, $dbname, $userid, $passwd, $new_link);
    } elseif ($passwd !== null) {
        $safeResult = \cubrid_connect($host, $port, $dbname, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_connect($host, $port, $dbname, $userid);
    } else {
        $safeResult = \cubrid_connect($host, $port, $dbname);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_current_oid function is used to get the
 * oid of the current cursor location from the query result.  To use
 * cubrid_current_oid, the query executed must be a
 * updatable query, and the CUBRID_INCLUDE_OID option must be included during
 * the query execution.
 *
 * @param resource $req_identifier Request identifier.
 * @return string Oid of current cursor location, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_current_oid($req_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_current_oid($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_disconnect function closes the connection
 * handle and disconnects from server. If any request handle is not closed at this point,
 * it will be closed. It is similar to the CUBRID MySQL compatible function cubrid_close.
 *
 * @param resource $conn_identifier Connection identifier.
 * @throws CubridException
 *
 */
function cubrid_disconnect($conn_identifier = null): void
{
    error_clear_last();
    if ($conn_identifier !== null) {
        $safeResult = \cubrid_disconnect($conn_identifier);
    } else {
        $safeResult = \cubrid_disconnect();
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_drop function is used to delete an
 * instance from database by using the oid of the instance.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid Oid of the instance that you want to delete.
 * @throws CubridException
 *
 */
function cubrid_drop($conn_identifier, string $oid): void
{
    error_clear_last();
    $safeResult = \cubrid_drop($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * This function frees the memory occupied by the result data. It returns
 * TRUE on success. Note that it can only frees the
 * client fetch buffer now, and if you want free all memory, use function
 * cubrid_close_request.
 *
 * @param resource $req_identifier This is the request identifier.
 * @throws CubridException
 *
 */
function cubrid_free_result($req_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_free_result($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * This function returns the current CUBRID connection charset and is similar
 * to the CUBRID MySQL compatible function
 * cubrid_client_encoding.
 *
 * @param resource $conn_identifier The CUBRID connection.
 * @return string A string that represents the CUBRID connection charset on success.
 * @throws CubridException
 *
 */
function cubrid_get_charset($conn_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_get_charset($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_get_class_name function is used to get the
 * class name from oid. It doesn't work when selecting data from the system tables,
 * for example db_class.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance that you want to check the existence.
 * @return string Class name when process is successful.
 * @throws CubridException
 *
 */
function cubrid_get_class_name($conn_identifier, string $oid): string
{
    error_clear_last();
    $safeResult = \cubrid_get_class_name($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function returns a string that represents the client library version.
 *
 * @return string A string that represents the client library version on success.
 * @throws CubridException
 *
 */
function cubrid_get_client_info(): string
{
    error_clear_last();
    $safeResult = \cubrid_get_client_info();
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function returns the CUBRID database parameters.
 * It returns an associative array with the values for the following parameters:
 *
 *
 * PARAM_ISOLATION_LEVEL
 * PARAM_LOCK_TIMEOUT
 * PARAM_MAX_STRING_LENGTH
 * PARAM_AUTO_COMMIT
 *
 *
 *
 * Database parameters
 *
 *
 *
 * Parameter
 * Description
 *
 *
 *
 *
 * PARAM_ISOLATION_LEVEL
 * The transaction isolation level.
 *
 *
 * LOCK_TIMEOUT
 * CUBRID provides the lock timeout feature, which sets the waiting
 * time (in seconds) for the lock until the transaction lock setting is
 * allowed. The default value of the lock_timeout_in_secs parameter is
 * -1, which means the application client will wait indefinitely until
 * the transaction lock is allowed.
 *
 *
 *
 * PARAM_AUTO_COMMIT
 * In CUBRID PHP, auto-commit mode is disabled by default for
 * transaction management. It can be set by using
 * cubrid_set_autocommit.
 *
 *
 *
 *
 *
 *
 * The following table shows the isolation levels from 1 to 6. It consists of
 * table schema (row) and isolation level:
 *
 * Levels of Isolation Supported by CUBRID
 *
 *
 *
 * Name
 * Description
 *
 *
 *
 *
 * SERIALIZABLE (6)
 * In this isolation level, problems concerning concurrency (e.g.
 * dirty read, non-repeatable read, phantom read, etc.) do not
 * occur.
 *
 *
 * REPEATABLE READ CLASS with REPEATABLE READ INSTANCES (5)
 * Another transaction T2 cannot update the schema of table A while
 * transaction T1 is viewing table A.
 * Transaction T1 may experience phantom read for the record R that was
 * inserted by another transaction T2 when it is repeatedly retrieving a
 * specific record.
 *
 *
 * REPEATABLE READ CLASS with READ COMMITTED INSTANCES (or CURSOR STABILITY) (4)
 * Another transaction T2 cannot update the schema of table A while
 * transaction T1 is viewing table A.
 * Transaction T1 may experience R read (non-repeatable read) that was
 * updated and committed by another transaction T2 when it is repeatedly
 * retrieving the record R.
 *
 *
 * REPEATABLE READ CLASS with READ UNCOMMITTED INSTANCES (3)
 * Default isolation level.  Another transaction T2 cannot update
 * the schema of table A  while transaction T1 is viewing table A.
 * Transaction T1 may experience R' read (dirty read) for the record that
 * was updated but not committed by another transaction T2.
 *
 *
 * READ COMMITTED CLASS with READ COMMITTED INSTANCES (2)
 * Transaction T1 may experience A' read (non-repeatable read) for
 * the table that was updated and committed by another transaction  T2
 * while it is viewing table A repeatedly.  Transaction T1 may experience
 * R' read (non-repeatable read) for the record that was updated and
 * committed by another transaction T2 while it is retrieving the record
 * R repeatedly.
 *
 *
 * READ COMMITTED CLASS with READ UNCOMMITTED INSTANCES (1)
 * Transaction T1 may experience A' read (non-repeatable read) for
 * the table that was updated and committed by another transaction T2
 * while it is repeatedly viewing table A.  Transaction T1 may experience
 * R' read (dirty read) for the record that was updated but not committed
 * by another transaction T2.
 *
 *
 *
 *
 *
 * @param resource $conn_identifier The CUBRID connection. If the connection identifier is not specified,
 * the last link opened by cubrid_connect is assumed.
 * @return array An associative array with CUBRID database parameters; on success.
 * @throws CubridException
 *
 */
function cubrid_get_db_parameter($conn_identifier): array
{
    error_clear_last();
    $safeResult = \cubrid_get_db_parameter($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_get_query_timeout function is used to get
 * the query timeout of the request.
 *
 * @param resource $req_identifier Request identifier.
 * @return int Returns the query timeout value in milliseconds of the current request on success.
 * @throws CubridException
 *
 */
function cubrid_get_query_timeout($req_identifier): int
{
    error_clear_last();
    $safeResult = \cubrid_get_query_timeout($req_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function returns a string that represents the CUBRID server version.
 *
 * @param resource $conn_identifier The CUBRID connection.
 * @return string A string that represents the CUBRID server version on success.
 * @throws CubridException
 *
 */
function cubrid_get_server_info($conn_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_get_server_info($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_insert_id function retrieves the ID
 * generated for the AUTO_INCREMENT column which is updated by the previous
 * INSERT query. It returns 0 if the previous query does not generate new
 * rows.
 *
 * @param resource $conn_identifier The connection identifier previously obtained by a call to
 * cubrid_connect.
 * @return string A string representing the ID generated for an AUTO_INCREMENT column by the
 * previous query, on success.
 *
 * 0, if the previous query does not generate new rows.
 *
 * FALSE on failure.
 * @throws CubridException
 *
 */
function cubrid_insert_id($conn_identifier = null): string
{
    error_clear_last();
    if ($conn_identifier !== null) {
        $safeResult = \cubrid_insert_id($conn_identifier);
    } else {
        $safeResult = \cubrid_insert_id();
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * cubrid_lob_close is used to close all BLOB/CLOB
 * returned from cubrid_lob_get.
 *
 * @param array $lob_identifier_array LOB identifier array returned from cubrid_lob_get.
 * @throws CubridException
 *
 */
function cubrid_lob_close(array $lob_identifier_array): void
{
    error_clear_last();
    $safeResult = \cubrid_lob_close($lob_identifier_array);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * cubrid_lob_export is used to get BLOB/CLOB data from CUBRID database, and saves its contents to a file.
 * To use this function, you must use cubrid_lob_get first to get BLOB/CLOB info from CUBRID.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param resource $lob_identifier LOB identifier.
 * @param string $path_name Path name of the file.
 * @throws CubridException
 *
 */
function cubrid_lob_export($conn_identifier, $lob_identifier, string $path_name): void
{
    error_clear_last();
    $safeResult = \cubrid_lob_export($conn_identifier, $lob_identifier, $path_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * cubrid_lob_get is used to get BLOB/CLOB meta info from CUBRID database,
 * CUBRID gets BLOB/CLOB by executing the SQL statement, and returns all LOBs as a resource array.
 * Be sure that the SQL retrieves only one column and its data type is BLOB or CLOB.
 *
 * Remember to use cubrid_lob_close to release the LOBs if you don't need it any more.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $sql SQL statement to be executed.
 * @return array Return an array of LOB resources, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_lob_get($conn_identifier, string $sql): array
{
    error_clear_last();
    $safeResult = \cubrid_lob_get($conn_identifier, $sql);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * cubrid_lob_send reads BLOB/CLOB data and passes it straight through to the browser.
 * To use this function, you must use cubrid_lob_get first to get BLOB/CLOB info from CUBRID.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param resource $lob_identifier LOB identifier.
 * @throws CubridException
 *
 */
function cubrid_lob_send($conn_identifier, $lob_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_lob_send($conn_identifier, $lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * cubrid_lob_size is used to get BLOB/CLOB data size.
 *
 * @param resource $lob_identifier LOB identifier.
 * @return string A string representing LOB data size, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_lob_size($lob_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_lob_size($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_lob2_bind function is used to bind BLOB/CLOB datas
 * to a corresponding question mark placeholder in the SQL statement that was passed
 * to cubrid_prepare. If bind_value_type
 * is not given, string will be "BLOB" as the default. But if you use
 * cubrid_lob2_new before, bind_value_type
 * will be consistent with type in cubrid_lob2_new as the default.
 *
 * @param resource $req_identifier Request identifier as a result of cubrid_prepare.
 * @param int $bind_index Location of binding parameters. It starts with 1.
 * @param mixed $bind_value Actual value for binding.
 * @param string $bind_value_type It must be "BLOB" or "CLOB" and it won't be case-sensitive. If it not be given, the default value is "BLOB".
 * @throws CubridException
 *
 */
function cubrid_lob2_bind($req_identifier, int $bind_index, $bind_value, string $bind_value_type = null): void
{
    error_clear_last();
    if ($bind_value_type !== null) {
        $safeResult = \cubrid_lob2_bind($req_identifier, $bind_index, $bind_value, $bind_value_type);
    } else {
        $safeResult = \cubrid_lob2_bind($req_identifier, $bind_index, $bind_value);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lob2_close function is used to close LOB object
 * returned from cubrid_lob2_new or got from the result set.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @throws CubridException
 *
 */
function cubrid_lob2_close($lob_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_close($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lob2_export function is used to save the
 * contents of BLOB/CLOB data to a file. To use this function, you must use
 * cubrid_lob2_new or fetch a lob object from CUBRID
 * database first. If the file already exists, the operation will fail.
 * This function will not influence the cursor position of the lob object.
 * It operates the entire lob object.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @param string $file_name File name you want to store BLOB/CLOB data. It also supports the path of the file.
 * @throws CubridException
 *
 */
function cubrid_lob2_export($lob_identifier, string $file_name): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_export($lob_identifier, $file_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lob2_import function is used to save the
 * contents of BLOB/CLOB data from a file. To use this function, you must use
 * cubrid_lob2_new or fetch a lob object from CUBRID database
 * first. If the file already exists, the operation will fail.
 * This function will not influence the cursor position of the lob object.
 * It operates the entire lob object.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @param string $file_name File name you want to import BLOB/CLOB data. It also supports the path of the file.
 * @throws CubridException
 *
 */
function cubrid_lob2_import($lob_identifier, string $file_name): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_import($lob_identifier, $file_name);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lob2_new function is used to create a lob object (both BLOB and CLOB).
 * This function should be used before you bind a lob object.
 *
 * @param resource $conn_identifier Connection identifier. If the connection identifier is not specified,
 * the last connection opened by cubrid_connect or
 * cubrid_connect_with_url is assumed.
 * @param string $type It may be "BLOB" or "CLOB", it won't be case-sensitive. The default value is "BLOB".
 * @return resource Lob identifier when it is successful.
 * @throws CubridException
 *
 */
function cubrid_lob2_new($conn_identifier = null, string $type = "BLOB")
{
    error_clear_last();
    if ($type !== "BLOB") {
        $safeResult = \cubrid_lob2_new($conn_identifier, $type);
    } elseif ($conn_identifier !== null) {
        $safeResult = \cubrid_lob2_new($conn_identifier);
    } else {
        $safeResult = \cubrid_lob2_new();
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_lob2_read function reads len bytes from the
 * LOB data and returns the bytes read.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @param int $len Length from buffer you want to read from the lob data.
 * @return string Returns the contents as a string, FALSE when there is no more data.
 * @throws CubridException
 *
 */
function cubrid_lob2_read($lob_identifier, int $len): string
{
    error_clear_last();
    $safeResult = \cubrid_lob2_read($lob_identifier, $len);
    if ($safeResult === null) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_lob2_seek function is used to move the cursor
 * position of a lob object by the value set in the offset
 * argument, to the direction set in the origin argument.
 *
 * To set the origin argument, you can use CUBRID_CURSOR_FIRST
 * to set the cursor position moving forward offset units from
 * the first beginning. In this case, offset must be a positive value.
 *
 * If you use CUBRID_CURSOR_CURRENT for origin, you can move
 * forward or backward. and offset can be positive or negative.
 *
 * If you use CUBRID_CURSOR_LAST for origin, you can move
 * backward offset units from the end of LOB object and
 * offset only can be positive.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @param int $offset Number of units you want to move the cursor.
 * @param int $origin This parameter can be the following values:
 *
 * CUBRID_CURSOR_FIRST: move forward from the first beginning.
 *
 * CUBRID_CURSOR_CURRENT: move forward or backward from the current position.
 *
 * CUBRID_CURSOR_LAST: move backward at the end of LOB object.
 * @throws CubridException
 *
 */
function cubrid_lob2_seek($lob_identifier, int $offset, int $origin = CUBRID_CURSOR_CURRENT): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_seek($lob_identifier, $offset, $origin);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lob2_seek64 function is used to move the cursor
 * position of a lob object by the value set in the offset
 * argument, to the direction set in the origin argument.
 * If the offset you want to move is larger than an integer
 * data can be stored, you can use this function.
 *
 * To set the origin argument, you can use CUBRID_CURSOR_FIRST
 * to set the cursor position moving forward offset units from
 * the first beginning. In this case, offset must be a positive value.
 *
 * If you use CUBRID_CURSOR_CURRENT for origin, you can move
 * forward or backward. and offset can be positive or negative.
 *
 * If you use CUBRID_CURSOR_LAST for origin, you can move backward
 * offset units from the end of LOB object and offset only can be positive.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @param string $offset Number of units you want to move the cursor.
 * @param int $origin This parameter can be the following values:
 *
 * CUBRID_CURSOR_FIRST: move forward from the first beginning.
 *
 * CUBRID_CURSOR_CURRENT: move forward or backward from the current position.
 *
 * CUBRID_CURSOR_LAST: move backward at the end of LOB object.
 * @throws CubridException
 *
 */
function cubrid_lob2_seek64($lob_identifier, string $offset, int $origin = CUBRID_CURSOR_CURRENT): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_seek64($lob_identifier, $offset, $origin);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lob2_size function is used to get the size of a lob object.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @return int It will return the size of the LOB object when it processes successfully.
 * @throws CubridException
 *
 */
function cubrid_lob2_size($lob_identifier): int
{
    error_clear_last();
    $safeResult = \cubrid_lob2_size($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_lob2_size64 function is used to get the
 * size of a lob object.  If the size of a lob object is larger than an
 * integer data can be stored, you can use this function and it will return
 * the size as a string.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @return string It will return the size of the LOB object as a string when it processes successfully.
 * @throws CubridException
 *
 */
function cubrid_lob2_size64($lob_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_lob2_size64($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_lob2_tell function is used to tell the cursor position of the LOB object.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @return int It will return the cursor position on the LOB object when it processes successfully.
 * @throws CubridException
 *
 */
function cubrid_lob2_tell($lob_identifier): int
{
    error_clear_last();
    $safeResult = \cubrid_lob2_tell($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_lob2_tell64 function is used to tell the
 * cursor position of the LOB object. If the size of a lob object is larger
 * than an integer data can be stored, you can use this function and it will
 * return the position information as a string.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @return string It will return the cursor position on the LOB object as a string when it processes successfully.
 * @throws CubridException
 *
 */
function cubrid_lob2_tell64($lob_identifier): string
{
    error_clear_last();
    $safeResult = \cubrid_lob2_tell64($lob_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_lob2_write function reads as much as data
 * from buf and stores it to the LOB object. Note that
 * this function can only append characters now.
 *
 * @param resource $lob_identifier Lob identifier as a result of cubrid_lob2_new or get from the result set.
 * @param string $buf Data that need to be written to the lob object.
 * @throws CubridException
 *
 */
function cubrid_lob2_write($lob_identifier, string $buf): void
{
    error_clear_last();
    $safeResult = \cubrid_lob2_write($lob_identifier, $buf);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lock_read function is used to put read
 * lock on the instance pointed by given oid.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance that you want to put read lock on.
 * @throws CubridException
 *
 */
function cubrid_lock_read($conn_identifier, string $oid): void
{
    error_clear_last();
    $safeResult = \cubrid_lock_read($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_lock_write function is used to put write
 * lock on the instance pointed by the given oid.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance that you want to put write lock on.
 * @throws CubridException
 *
 */
function cubrid_lock_write($conn_identifier, string $oid): void
{
    error_clear_last();
    $safeResult = \cubrid_lock_write($conn_identifier, $oid);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_move_cursor function is used to move the
 * current cursor location of req_identifier by the
 * value set in the offset argument, to the direction
 * set in the origin argument. To set the
 * origin argument, you can use CUBRID_CURSOR_FIRST
 * for the first part of the result, CUBRID_CURSOR_CURRENT for the current
 * location of the result, or CUBRID_CURSOR_LAST for the last part of the
 * result. If origin argument is not explicitly
 * designated, then the function uses CUBRID_CURSOR_CURRENT as its default
 * value.
 *
 * If the value of cursor movement range goes over the valid limit, then the
 * cursor moves to the next location after the valid range for the cursor.
 * For example, if you move 20 units in the result with the size of 10, then
 * the cursor will move to 11th place and return CUBRID_NO_MORE_DATA.
 *
 * @param resource $req_identifier Request identifier.
 * @param int $offset Number of units you want to move the cursor.
 * @param int $origin Location where you want to move the cursor from CUBRID_CURSOR_FIRST, CUBRID_CURSOR_CURRENT, CUBRID_CURSOR_LAST.
 * @return int Returns TRUE on success.
 * @throws CubridException
 *
 */
function cubrid_move_cursor($req_identifier, int $offset, int $origin = CUBRID_CURSOR_CURRENT): int
{
    error_clear_last();
    $safeResult = \cubrid_move_cursor($req_identifier, $offset, $origin);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_next_result function is used to get
 * results of next query if multiple SQL statements are executed and
 * CUBRID_EXEC_QUERY_ALL flag is set upon
 * cubrid_execute.
 *
 * @param resource $result result comes from a call to cubrid_execute
 * @throws CubridException
 *
 */
function cubrid_next_result($result): void
{
    error_clear_last();
    $safeResult = \cubrid_next_result($result);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * Establishes a persistent connection to a CUBRID server.
 *
 * cubrid_pconnect_with_url acts very much like
 * cubrid_connect_with_url with two major differences.
 *
 * First, when connecting, the function would first try to find a (persistent)
 * link that's already open with the same host, port, dbname and userid. If
 * one is found, an identifier for it will be returned instead of opening a
 * new connection.
 *
 * Second, the connection to the SQL server will not be closed when the
 * execution of the script ends.  Instead, the link will remain open for
 * future use (cubrid_close or
 * cubrid_disconnect will not close links established by
 * cubrid_pconnect_with_url).
 *
 * This type of link is therefore called 'persistent'.
 *
 * &lt;url&gt; ::= CUBRID:&lt;host&gt;:&lt;db_name&gt;:&lt;db_user&gt;:&lt;db_password&gt;:[?&lt;properties&gt;]
 *
 * &lt;properties&gt; ::= &lt;property&gt; [&amp;&lt;property&gt;]
 *
 * &lt;properties&gt; ::= alhosts=&lt;alternative_hosts&gt;[ &amp;rctime=&lt;time&gt;]
 *
 * &lt;properties&gt; ::= login_timeout=&lt;milli_sec&gt;
 *
 * &lt;properties&gt; ::= query_timeout=&lt;milli_sec&gt;
 *
 * &lt;properties&gt; ::= disconnect_on_query_timeout=true|false
 *
 * &lt;alternative_hosts&gt; ::= &lt;standby_broker1_host&gt;:&lt;port&gt; [,&lt;standby_broker2_host&gt;:&lt;port&gt;]
 *
 * &lt;host&gt; := HOSTNAME | IP_ADDR
 *
 * &lt;time&gt; := SECOND
 *
 * &lt;milli_sec&gt; := MILLI SECOND
 *
 *
 * host : A host name or IP address of the master database
 * db_name : A name of the database
 * db_user : A name of the database user
 * db_password : A database user password
 *
 * alhosts : Specifies the broker information of the standby server, which is
 * used for failover when it is impossible to connect to the active server.
 * You can specify multiple brokers for failover, and the connection to the brokers
 * is attempted in the order listed in alhosts
 *
 * rctime : An interval between the attempts to connect to the active broker in
 * which failure occurred. After a failure occurs, the system connects to the
 * broker specified by althosts (failover), terminates the transaction, and then
 * attempts to connect to the active broker of the master database at every rctime.
 * The default value is 600 seconds.
 *
 * login_timeout : Timeout value (unit: msec.) for database login. The default
 * value is 0, which means infinite postponement.
 *
 *
 * query_timeout : Timeout value (unit: msec.) for query request. Upon timeout,
 * a message to cancel requesting a query transferred to server is sent. The return
 * value can depend on the disconnect_on_query_timeout configuration; even though the
 * message to cancel a request is sent to server, that request may succeed.
 *
 *
 * disconnect_on_query_timeout : Configures a value whether to immediately return
 * an error of function being executed upon timeout. The default value is false.
 *
 *
 *
 * @param string $conn_url A character string that contains server connection information.
 * @param string $userid User name for the database.
 * @param string $passwd User password.
 * @return resource Connection identifier, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_pconnect_with_url(string $conn_url, string $userid = null, string $passwd = null)
{
    error_clear_last();
    if ($passwd !== null) {
        $safeResult = \cubrid_pconnect_with_url($conn_url, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_pconnect_with_url($conn_url, $userid);
    } else {
        $safeResult = \cubrid_pconnect_with_url($conn_url);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Establishes a persistent connection to a CUBRID server.
 *
 * cubrid_pconnect acts very much like
 * cubrid_connect with two major differences.
 *
 * First, when connecting, the function would first try to find a (persistent)
 * link that's already open with the same host, port, dbname and userid. If
 * one is found, an identifier for it will be returned instead of opening a
 * new connection.
 *
 * Second, the connection to the SQL server will not be closed when the
 * execution of the script ends.  Instead, the link will remain open for
 * future use (cubrid_close or
 * cubrid_disconnect will not close links established by
 * cubrid_pconnect).
 *
 * This type of link is therefore called 'persistent'.
 *
 * @param string $host Host name or IP address of CUBRID CAS server.
 * @param int $port Port number of CUBRID CAS server (BROKER_PORT configured in $CUBRID/conf/cubrid_broker.conf).
 * @param string $dbname Name of database.
 * @param string $userid User name for the database.
 * @param string $passwd User password.
 * @return resource Connection identifier, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_pconnect(string $host, int $port, string $dbname, string $userid = null, string $passwd = null)
{
    error_clear_last();
    if ($passwd !== null) {
        $safeResult = \cubrid_pconnect($host, $port, $dbname, $userid, $passwd);
    } elseif ($userid !== null) {
        $safeResult = \cubrid_pconnect($host, $port, $dbname, $userid);
    } else {
        $safeResult = \cubrid_pconnect($host, $port, $dbname);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_prepare function is a sort of API which represents SQL statements
 * compiled previously to a given connection handle. This pre-compiled SQL statement will be included
 * in the cubrid_prepare.
 *
 * Accordingly, you can use this statement effectively to execute several times repeatedly or to
 * process long data. Only a single statement can be used and a parameter may put a question mark (?)
 * to appropriate area in the SQL statement. Add a parameter when you bind a value in the VALUES
 * clause of INSERT statement or in the WHERE clause. Note that it is allowed to bind a value to a
 * MARK(?) by using the cubrid_bind function only.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $prepare_stmt Prepare query.
 * @param int $option OID return option CUBRID_INCLUDE_OID.
 * @return resource Request identifier, if process is successful.
 * @throws CubridException
 *
 */
function cubrid_prepare($conn_identifier, string $prepare_stmt, int $option = 0)
{
    error_clear_last();
    $safeResult = \cubrid_prepare($conn_identifier, $prepare_stmt, $option);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_put function is used to update an
 * attribute of the instance of the given oid.
 *
 * You can update single attribute by using string data type to set
 * attr.  In such case, you can use integer,
 * floating point or string type data for the value
 * argument. To update multiple number of attributes, you can disregard the
 * attr argument, and set
 * value argument with associative array data type.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance that you want to update.
 * @param string $attr Name of the attribute that you want to update.
 * @param mixed $value New value that you want to assign to the attribute.
 * @throws CubridException
 *
 */
function cubrid_put($conn_identifier, string $oid, string $attr = null, $value = null): void
{
    error_clear_last();
    if ($value !== null) {
        $safeResult = \cubrid_put($conn_identifier, $oid, $attr, $value);
    } elseif ($attr !== null) {
        $safeResult = \cubrid_put($conn_identifier, $oid, $attr);
    } else {
        $safeResult = \cubrid_put($conn_identifier, $oid);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_rollback function executes rollback on the
 * transaction pointed by conn_identifier, currently in
 * progress.
 *
 * Connection to server is closed after calling
 * cubrid_rollback. Connection handle, however, is
 * still valid.
 *
 * @param resource $conn_identifier Connection identifier.
 * @throws CubridException
 *
 */
function cubrid_rollback($conn_identifier): void
{
    error_clear_last();
    $safeResult = \cubrid_rollback($conn_identifier);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_schema function is used to get the
 * requested schema information from database. To get information about specific class,
 * set the class_name, to get information about specific attribute
 * (can be used only with CUBRID_SCH_ATTR_PRIVILEGE),
 * set the attr_name.
 *
 * The result of the cubrid_schema function is returned as a two-dimensional
 * array (column (associative array) * row (numeric array)). The following
 * tables shows types of schema and the column structure of the result array to
 * be returned based on the schema type.
 *
 *
 * Result Composition of Each Type
 *
 *
 *
 * Schema
 * Column Number
 * Column Name
 * Value
 *
 *
 *
 *
 * CUBRID_SCH_CLASS
 * 1
 * NAME
 *
 *
 *
 *
 * 2
 * TYPE
 * 0:system class 1:vclass 2:class
 *
 *
 *
 * CUBRID_SCH_VCLASS
 * 1
 * NAME
 *
 *
 *
 *
 * 2
 * TYPE
 * 1:vclass
 *
 *
 *
 * CUBRID_SCH_QUERY_SPEC
 * 1
 * QUERY_SPEC
 *
 *
 *
 *
 * CUBRID_SCH_ATTRIBUTE / CUBRID_SCH_CLASS_ATTRIBUTE
 * 1
 * ATTR_NAME
 *
 *
 *
 *
 * 2
 * DOMAIN
 *
 *
 *
 *
 * 3
 * SCALE
 *
 *
 *
 *
 * 4
 * PRECISION
 *
 *
 *
 *
 * 5
 * INDEXED
 * 1:indexed
 *
 *
 *
 * 6
 * NOT NULL
 * 1:not null
 *
 *
 *
 * 7
 * SHARED
 * 1:shared
 *
 *
 *
 * 8
 * UNIQUE
 * 1:unique
 *
 *
 *
 * 9
 * DEFAULT
 *
 *
 *
 *
 * 10
 * ATTR_ORDER
 * base:1
 *
 *
 *
 * 11
 * CLASS_NAME
 *
 *
 *
 *
 * 12
 * SOURCE_CLASS
 *
 *
 *
 *
 * 13
 * IS_KEY
 * 1:key
 *
 *
 *
 * CUBRID_SCH_METHOD / CUBRID_SCH_CLASS_METHOD
 * 1
 * NAME
 *
 *
 *
 *
 * 2
 * RET_DOMAIN
 *
 *
 *
 *
 * 3
 * ARG_DOMAIN
 *
 *
 *
 *
 * CUBRID_SCH_METHOD_FILE
 * 1
 * METHOD_FILE
 *
 *
 *
 *
 * CUBRID_SCH_SUPERCLASS / CUBRID_SCH_DIRECT_SUPER_CLASS / CUBRID_SCH_SUBCLASS
 * 1
 * CLASS_NAME
 *
 *
 *
 *
 * 2
 * TYPE
 * 0:system class 1:vclass 2:class
 *
 *
 *
 * CUBRID_SCH_CONSTRAINT
 * 1
 * TYPE
 * 0:unique 1:index 2:reverse unique 3:reverse index
 *
 *
 *
 * 2
 * NAME
 *
 *
 *
 *
 * 3
 * ATTR_NAME
 *
 *
 *
 *
 * 4
 * NUM_PAGES
 *
 *
 *
 *
 * 5
 * NUM_KEYS
 *
 *
 *
 *
 * 6
 * PRIMARY_KEY
 * 1:primary key
 *
 *
 *
 * 7
 * KEY_ORDER
 * base:1
 *
 *
 *
 * CUBRID_SCH_TRIGGER
 * 1
 * NAME
 *
 *
 *
 *
 * 2
 * STATUS
 *
 *
 *
 *
 * 3
 * EVENT
 *
 *
 *
 *
 * 4
 * TARGET_CLASS
 *
 *
 *
 *
 * 5
 * TARGET_ATTR
 *
 *
 *
 *
 * 6
 * ACTION_TIME
 *
 *
 *
 *
 * 7
 * ACTION
 *
 *
 *
 *
 * 8
 * PRIORITY
 *
 *
 *
 *
 * 9
 * CONDITION_TIME
 *
 *
 *
 *
 * 10
 * CONDITION
 *
 *
 *
 *
 * CUBRID_SCH_CLASS_PRIVILEGE / CUBRID_SCH_ATTR_PRIVILEGE
 * 1
 * CLASS_NAME / ATTR_NAME
 *
 *
 *
 *
 * 2
 * PRIVILEGE
 *
 *
 *
 *
 * 3
 * GRANTABLE
 *
 *
 *
 *
 * CUBRID_SCH_PRIMARY_KEY
 * 1
 * CLASS_NAME
 *
 *
 *
 *
 * 2
 * ATTR_NAME
 *
 *
 *
 *
 * 3
 * KEY_SEQ
 * base:1
 *
 *
 *
 * 4
 * KEY_NAME
 *
 *
 *
 *
 * CUBRID_SCH_IMPORTED_KEYS / CUBRID_SCH_EXPORTED_KEYS / CUBRID_SCH_CROSS_REFERENCE
 * 1
 * PKTABLE_NAME
 *
 *
 *
 *
 * 2
 * PKCOLUMN_NAME
 *
 *
 *
 *
 * 3
 * FKTABLE_NAME
 * base:1
 *
 *
 *
 * 4
 * FKCOLUMN_NAME
 *
 *
 *
 *
 * 5
 * KEY_SEQ
 * base:1
 *
 *
 *
 * 6
 * UPDATE_ACTION
 * 0:cascade 1:restrict 2:no action 3:set null
 *
 *
 *
 * 7
 * DELETE_ACTION
 * 0:cascade 1:restrict 2:no action 3:set null
 *
 *
 *
 * 8
 * FK_NAME
 *
 *
 *
 *
 * 9
 * PK_NAME
 *
 *
 *
 *
 *
 *
 * @param resource $conn_identifier Connection identifier.
 * @param int $schema_type Schema data that you want to know.
 * @param string $class_name Class you want to know the schema of.
 * @param string $attr_name Attribute you want to know the schema of.
 * @return array Array containing the schema information, when process is successful.
 * @throws CubridException
 *
 */
function cubrid_schema($conn_identifier, int $schema_type, string $class_name = null, string $attr_name = null): array
{
    error_clear_last();
    if ($attr_name !== null) {
        $safeResult = \cubrid_schema($conn_identifier, $schema_type, $class_name, $attr_name);
    } elseif ($class_name !== null) {
        $safeResult = \cubrid_schema($conn_identifier, $schema_type, $class_name);
    } else {
        $safeResult = \cubrid_schema($conn_identifier, $schema_type);
    }
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cubrid_seq_drop function is used to delete an
 * element you request from the given sequence type attribute in the
 * database.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance you want to work with.
 * @param string $attr_name Name of the attribute that you want to delete an element from.
 * @param int $index Index of the element that you want to delete (1-based).
 * @throws CubridException
 *
 */
function cubrid_seq_drop($conn_identifier, string $oid, string $attr_name, int $index): void
{
    error_clear_last();
    $safeResult = \cubrid_seq_drop($conn_identifier, $oid, $attr_name, $index);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_col_insert function is used to insert an
 * element to a sequence type attribute in a requested location.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance you want to work with.
 * @param string $attr_name Name of the attribute you want to insert an instance to.
 * @param int $index Location of the element, you want to insert the element to (1-based).
 * @param string $seq_element Content of the element that you want to insert.
 * @throws CubridException
 *
 */
function cubrid_seq_insert($conn_identifier, string $oid, string $attr_name, int $index, string $seq_element): void
{
    error_clear_last();
    $safeResult = \cubrid_seq_insert($conn_identifier, $oid, $attr_name, $index, $seq_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_seq_put function is used to update the
 * content of the requested element in a sequent type attribute using OID.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance you want to work with.
 * @param string $attr_name Name of the attribute that you want to update an element.
 * @param int $index Index (1-based) of the element that you want to update.
 * @param string $seq_element New content that you want to use for the update.
 * @throws CubridException
 *
 */
function cubrid_seq_put($conn_identifier, string $oid, string $attr_name, int $index, string $seq_element): void
{
    error_clear_last();
    $safeResult = \cubrid_seq_put($conn_identifier, $oid, $attr_name, $index, $seq_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_set_add function is used to insert a
 * single element to a set type attribute (set, multiset, sequence) you
 * requested.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance you want to work with.
 * @param string $attr_name Name of the attribute you want to insert an element.
 * @param string $set_element Content of the element you want to insert.
 * @throws CubridException
 *
 */
function cubrid_set_add($conn_identifier, string $oid, string $attr_name, string $set_element): void
{
    error_clear_last();
    $safeResult = \cubrid_set_add($conn_identifier, $oid, $attr_name, $set_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_set_autocommit function is used to set the
 * CUBRID database auto-commit mode of the current database connection.
 *
 * In CUBRID PHP, auto-commit mode is disabled by default for transaction
 * management. When auto-commit mode is truned from off to on, any pending work is
 * automatically committed.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param bool $mode Auto-commit mode. The following constants can be used:
 *
 *
 * CUBRID_AUTOCOMMIT_FALSE
 * CUBRID_AUTOCOMMIT_TRUE
 *
 * @throws CubridException
 *
 */
function cubrid_set_autocommit($conn_identifier, bool $mode): void
{
    error_clear_last();
    $safeResult = \cubrid_set_autocommit($conn_identifier, $mode);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_set_db_parameter function is used to set
 * the CUBRID database parameters. It can set the following CUBRID database
 * parameters:
 *
 *
 * PARAM_ISOLATION_LEVEL
 * PARAM_LOCK_TIMEOUT
 *
 *
 * @param resource $conn_identifier The CUBRID connection. If the connection identifier is not specified,
 * the last link opened by cubrid_connect is assumed.
 * @param int $param_type Database parameter type.
 * @param int $param_value Isolation level value (1-6) or lock timeout (in seconds) value.
 * @throws CubridException
 *
 */
function cubrid_set_db_parameter($conn_identifier, int $param_type, int $param_value): void
{
    error_clear_last();
    $safeResult = \cubrid_set_db_parameter($conn_identifier, $param_type, $param_value);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_set_drop function is used to delete an
 * element that you request from the given set type (set, multiset) attribute
 * of the database.
 *
 * @param resource $conn_identifier Connection identifier.
 * @param string $oid OID of the instance you want to work with.
 * @param string $attr_name Name of the attribute you want to delete an element from.
 * @param string $set_element Content of the element you want to delete.
 * @throws CubridException
 *
 */
function cubrid_set_drop($conn_identifier, string $oid, string $attr_name, string $set_element): void
{
    error_clear_last();
    $safeResult = \cubrid_set_drop($conn_identifier, $oid, $attr_name, $set_element);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}


/**
 * The cubrid_set_query_timeout function is used to set
 * the timeout time of query execution.
 *
 * @param resource $req_identifier Request identifier.
 * @param int $timeout Timeout time in milliseconds.
 * @throws CubridException
 *
 */
function cubrid_set_query_timeout($req_identifier, int $timeout): void
{
    error_clear_last();
    $safeResult = \cubrid_set_query_timeout($req_identifier, $timeout);
    if ($safeResult === false) {
        throw CubridException::createFromPhpError();
    }
}
