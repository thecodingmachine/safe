<?php

namespace Safe;

use Safe\Exceptions\SemException;

/**
 * msg_get_queue returns an id that can be used to
 * access the System V message queue with the given
 * key. The first call creates the message queue with
 * the optional permissions.
 * A second call to msg_get_queue for the same
 * key will return a different message queue
 * identifier, but both identifiers access the same underlying message
 * queue.
 *
 * @param int $key Message queue numeric ID
 * @param int $permissions Queue permissions. Default to 0666. If the message queue already
 * exists, the permissions will be ignored.
 * @return resource Returns SysvMessageQueue instance that can be used to access the System V message queue.
 * @throws SemException
 *
 */
function msg_get_queue(int $key, int $permissions = 0666)
{
    error_clear_last();
    $safeResult = \msg_get_queue($key, $permissions);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Checks whether the message queue key exists.
 *
 * @param int $key Queue key.
 * @throws SemException
 *
 */
function msg_queue_exists(int $key): void
{
    error_clear_last();
    $safeResult = \msg_queue_exists($key);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * msg_receive will receive the first message from the
 * specified queue of the type specified by
 * desired_message_type.
 *
 * @param resource $queue The message queue.
 * @param int $desired_message_type If desired_message_type is 0, the message from the front
 * of the queue is returned. If desired_message_type is
 * greater than 0, then the first message of that type is returned.
 * If desired_message_type is less than 0, the first
 * message on the queue with a type less than or equal to the
 * absolute value of desired_message_type will be read.
 * If no messages match the criteria, your script will wait until a suitable
 * message arrives on the queue.  You can prevent the script from blocking
 * by specifying MSG_IPC_NOWAIT in the
 * flags parameter.
 * @param int|null $received_message_type The type of the message that was received will be stored in this
 * parameter.
 * @param int $max_message_size The maximum size of message to be accepted is specified by the
 * max_message_size; if the message in the queue is larger
 * than this size the function will fail (unless you set
 * flags as described below).
 * @param mixed $message The received message will be stored in message,
 * unless there were errors receiving the message.
 * @param bool $unserialize If set to
 * TRUE, the message is treated as though it was serialized using the
 * same mechanism as the session module. The message will be unserialized
 * and then returned to your script. This allows you to easily receive
 * arrays or complex object structures from other PHP scripts, or if you
 * are using the WDDX serializer, from any WDDX compatible source.
 *
 * If unserialize is FALSE, the message will be
 * returned as a binary-safe string.
 * @param int $flags The optional flags allows you to pass flags to the
 * low-level msgrcv system call.  It defaults to 0, but you may specify one
 * or more of the following values (by adding or ORing them together).
 *
 * Flag values for msg_receive
 *
 *
 *
 * MSG_IPC_NOWAIT
 * If there are no messages of the
 * desired_message_type, return immediately and do not
 * wait.  The function will fail and return an integer value
 * corresponding to MSG_ENOMSG.
 *
 *
 *
 * MSG_EXCEPT
 * Using this flag in combination with a
 * desired_message_type greater than 0 will cause the
 * function to receive the first message that is not equal to
 * desired_message_type.
 *
 *
 * MSG_NOERROR
 *
 * If the message is longer than max_message_size,
 * setting this flag will truncate the message to
 * max_message_size and will not signal an error.
 *
 *
 *
 *
 *
 * @param int|null $error_code If the function fails, the optional error_code
 * will be set to the value of the system errno variable.
 * @throws SemException
 *
 */
function msg_receive($queue, int $desired_message_type, ?int &$received_message_type, int $max_message_size, &$message, bool $unserialize = true, int $flags = 0, ?int &$error_code = null): void
{
    error_clear_last();
    $safeResult = \msg_receive($queue, $desired_message_type, $received_message_type, $max_message_size, $message, $unserialize, $flags, $error_code);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * msg_remove_queue destroys the message queue specified
 * by the queue.  Only use this function when all
 * processes have finished working with the message queue and you need to
 * release the system resources held by it.
 *
 * @param resource $queue The message queue.
 * @throws SemException
 *
 */
function msg_remove_queue($queue): void
{
    error_clear_last();
    $safeResult = \msg_remove_queue($queue);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * msg_send sends a message of type
 * message_type (which MUST be greater than 0) to
 * the message queue specified by queue.
 *
 * @param resource $queue The message queue.
 * @param int $message_type The type of the message (MUST be greater than 0)
 * @param mixed $message The body of the message.
 *
 * If serialize set to FALSE is supplied,
 * MUST be of type: string, int, float
 * or bool. In other case a warning will be issued.
 * @param bool $serialize The optional serialize controls how the
 * message is sent.  serialize
 * defaults to TRUE which means that the message is
 * serialized using the same mechanism as the session module before being
 * sent to the queue.  This allows complex arrays and objects to be sent to
 * other PHP scripts, or if you are using the WDDX serializer, to any WDDX
 * compatible client.
 * @param bool $blocking If the message is too large to fit in the queue, your script will wait
 * until another process reads messages from the queue and frees enough
 * space for your message to be sent.
 * This is called blocking; you can prevent blocking by setting the
 * optional blocking parameter to FALSE, in which
 * case msg_send will immediately return FALSE if the
 * message is too big for the queue, and set the optional
 * error_code to MSG_EAGAIN,
 * indicating that you should try to send your message again a little
 * later on.
 * @param int|null $error_code If the function fails, the optional errorcode will be set to the value of the system errno variable.
 * @throws SemException
 *
 */
function msg_send($queue, int $message_type, $message, bool $serialize = true, bool $blocking = true, ?int &$error_code = null): void
{
    error_clear_last();
    $safeResult = \msg_send($queue, $message_type, $message, $serialize, $blocking, $error_code);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * msg_set_queue allows you to change the values of the
 * msg_perm.uid, msg_perm.gid, msg_perm.mode and msg_qbytes fields of the
 * underlying message queue data structure.
 *
 * Changing the data structure will require that PHP be running as the same
 * user that created the queue, owns the queue (as determined by the
 * existing msg_perm.xxx fields), or be running with root privileges.
 * root privileges are required to raise the msg_qbytes values above the
 * system defined limit.
 *
 * @param resource $queue The message queue.
 * @param array $data You specify the values you require by setting the value of the keys
 * that you require in the data array.
 * @throws SemException
 *
 */
function msg_set_queue($queue, array $data): void
{
    error_clear_last();
    $safeResult = \msg_set_queue($queue, $data);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * msg_stat_queue returns the message queue meta data
 * for the message queue specified by the queue.
 * This is useful, for example, to determine which process sent the message
 * that was just received.
 *
 * @param resource $queue The message queue.
 * @return array On success, the return value is an array whose keys and values have the following
 * meanings:
 *
 * Array structure for msg_stat_queue
 *
 *
 *
 * msg_perm.uid
 *
 * The uid of the owner of the queue.
 *
 *
 *
 * msg_perm.gid
 *
 * The gid of the owner of the queue.
 *
 *
 *
 * msg_perm.mode
 *
 * The file access mode of the queue.
 *
 *
 *
 * msg_stime
 *
 * The time that the last message was sent to the queue.
 *
 *
 *
 * msg_rtime
 *
 * The time that the last message was received from the queue.
 *
 *
 *
 * msg_ctime
 *
 * The time that the queue was last changed.
 *
 *
 *
 * msg_qnum
 *
 * The number of messages waiting to be read from the queue.
 *
 *
 *
 * msg_qbytes
 *
 * The maximum number of bytes allowed in one message queue. On
 * Linux, this value may be read and modified via
 * /proc/sys/kernel/msgmnb.
 *
 *
 *
 * msg_lspid
 *
 * The pid of the process that sent the last message to the queue.
 *
 *
 *
 * msg_lrpid
 *
 * The pid of the process that received the last message from the queue.
 *
 *
 *
 *
 *
 *
 * Returns FALSE on failure.
 * @throws SemException
 *
 */
function msg_stat_queue($queue): array
{
    error_clear_last();
    $safeResult = \msg_stat_queue($queue);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * sem_acquire by default blocks (if necessary) until the
 * semaphore can be acquired.  A process attempting to acquire a semaphore which
 * it has already acquired will block forever if acquiring the semaphore would
 * cause its maximum number of semaphore to be exceeded.
 *
 * After processing a request, any semaphores acquired by the process but not
 * explicitly released will be released automatically and a warning will be
 * generated.
 *
 * @param resource $semaphore semaphore is a semaphore
 * obtained from sem_get.
 * @param bool $non_blocking Specifies if the process shouldn't wait for the semaphore to be acquired.
 * If set to true, the call will return
 * false immediately if a semaphore cannot be immediately
 * acquired.
 * @throws SemException
 *
 */
function sem_acquire($semaphore, bool $non_blocking = false): void
{
    error_clear_last();
    $safeResult = \sem_acquire($semaphore, $non_blocking);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * sem_get returns an id that can be used to
 * access the System V semaphore with the given key.
 *
 * A second call to sem_get for the same key
 * will return a different semaphore identifier, but both
 * identifiers access the same underlying semaphore.
 *
 * If key is 0, a new private semaphore
 * is created for each call to sem_get.
 *
 * @param int $key
 * @param int $max_acquire The number of processes that can acquire the semaphore simultaneously
 * is set to max_acquire.
 * @param int $permissions The semaphore permissions. Actually this value is
 * set only if the process finds it is the only process currently
 * attached to the semaphore.
 * @param bool $auto_release Specifies if the semaphore should be automatically released on request
 * shutdown.
 * @return resource Returns a positive semaphore identifier on success.
 * @throws SemException
 *
 */
function sem_get(int $key, int $max_acquire = 1, int $permissions = 0666, bool $auto_release = true)
{
    error_clear_last();
    $safeResult = \sem_get($key, $max_acquire, $permissions, $auto_release);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * sem_release releases the semaphore if it
 * is currently acquired by the calling process, otherwise
 * a warning is generated.
 *
 * After releasing the semaphore, sem_acquire
 * may be called to re-acquire it.
 *
 * @param resource $semaphore A Semaphore as returned by
 * sem_get.
 * @throws SemException
 *
 */
function sem_release($semaphore): void
{
    error_clear_last();
    $safeResult = \sem_release($semaphore);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * sem_remove removes the given semaphore.
 *
 * After removing the semaphore, it is no longer accessible.
 *
 * @param resource $semaphore A semaphore as returned
 * by sem_get.
 * @throws SemException
 *
 */
function sem_remove($semaphore): void
{
    error_clear_last();
    $safeResult = \sem_remove($semaphore);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * shm_attach returns an id that can be used to access
 * the System V shared memory with the given key, the
 * first call creates the shared memory segment with
 * size and the optional perm-bits
 * permissions.
 *
 * A second call to shm_attach for the same
 * key will return a different SysvSharedMemory
 * instance, but both instances access the same underlying
 * shared memory. size and
 * permissions will be ignored.
 *
 * @param int $key A numeric shared memory segment ID
 * @param int $size The memory size. If not provided, default to the
 * sysvshm.init_mem in the php.ini, otherwise 10000
 * bytes.
 * @param int $permissions The optional permission bits. Default to 0666.
 * @return resource Returns a SysvSharedMemory instance on success.
 * @throws SemException
 *
 */
function shm_attach(int $key, int $size = null, int $permissions = 0666)
{
    error_clear_last();
    if ($permissions !== 0666) {
        $safeResult = \shm_attach($key, $size, $permissions);
    } elseif ($size !== null) {
        $safeResult = \shm_attach($key, $size);
    } else {
        $safeResult = \shm_attach($key);
    }
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * shm_detach disconnects from the shared memory given
 * by the shm created by
 * shm_attach. Remember, that shared memory still exist
 * in the Unix system and the data is still present.
 *
 * @param resource $shm A shared memory segment obtained from shm_attach.
 * @throws SemException
 *
 */
function shm_detach($shm): void
{
    error_clear_last();
    $safeResult = \shm_detach($shm);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * shm_put_var inserts or updates the
 * value with the given
 * key.
 *
 * Warnings (E_WARNING level) will be issued if
 * shm is not a valid SysV shared memory
 * index or if there was not enough shared memory remaining to complete your
 * request.
 *
 * @param resource $shm A shared memory segment obtained from shm_attach.
 * @param int $key The variable key.
 * @param mixed $value The variable. All variable types
 * that serialize supports may be used: generally
 * this means all types except for resources and some internal objects
 * that cannot be serialized.
 * @throws SemException
 *
 */
function shm_put_var($shm, int $key, $value): void
{
    error_clear_last();
    $safeResult = \shm_put_var($shm, $key, $value);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * Removes a variable with a given key
 * and frees the occupied memory.
 *
 * @param resource $shm A shared memory segment obtained from shm_attach.
 * @param int $key The variable key.
 * @throws SemException
 *
 */
function shm_remove_var($shm, int $key): void
{
    error_clear_last();
    $safeResult = \shm_remove_var($shm, $key);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}


/**
 * shm_remove removes the shared memory
 * shm. All data will be destroyed.
 *
 * @param resource $shm A shared memory segment obtained from shm_attach.
 * @throws SemException
 *
 */
function shm_remove($shm): void
{
    error_clear_last();
    $safeResult = \shm_remove($shm);
    if ($safeResult === false) {
        throw SemException::createFromPhpError();
    }
}
