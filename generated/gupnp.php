<?php

namespace Safe;

/**
 * Get the IP address we advertise ourselves as using.
 * 
 * @param resource $context A context identifier, returned by gupnp_context_new.
 * @return string Returns the IP address for the current context and FALSE on error.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_context_get_host_ip($context): string
{
    error_clear_last();
    $result = \gupnp_context_get_host_ip($context);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
    return $result;
}


/**
 * Get the port that the SOAP server is running on.
 * 
 * @param resource $context A context identifier, returned by gupnp_context_new.
 * @return int Returns the port number for the current context and FALSE on error.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_context_get_port($context): int
{
    error_clear_last();
    $result = \gupnp_context_get_port($context);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
    return $result;
}


/**
 * Start hosting local_path at server_path. Files with the path local_path.LOCALE (if they exist) 
 * will be served up when LOCALE is specified in the request's Accept-Language header.
 * 
 * @param resource $context A context identifier, returned by gupnp_context_new.
 * @param string $local_path Path to the local file or folder to be hosted.
 * @param string $server_path Web server path where local_path should be hosted.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_context_host_path($context, string $local_path, string $server_path): void
{
    error_clear_last();
    $result = \gupnp_context_host_path($context, $local_path, $server_path);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Sets a function to be called at regular intervals.
 * 
 * @param resource $context A context identifier, returned by gupnp_context_new.
 * @param int $timeout A timeout in miliseconds.
 * @param mixed $callback The callback function calling every timeout period of time. 
 * Typically, callback function takes on arg parameter.
 * @param mixed $arg User data for callback.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_context_timeout_add($context, int $timeout, $callback, $arg = null): void
{
    error_clear_last();
    if ($arg !== null) {
        $result = \gupnp_context_timeout_add($context, $timeout, $callback, $arg);
    }else {
        $result = \gupnp_context_timeout_add($context, $timeout, $callback);
    }
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Stop hosting the file or folder at server_path.
 * 
 * @param resource $context A context identifier, returned by gupnp_context_new.
 * @param string $server_path Web server path where the file or folder is hosted.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_context_unhost_path($context, string $server_path): void
{
    error_clear_last();
    $result = \gupnp_context_unhost_path($context, $server_path);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Start the search and calls user-defined callback.
 * 
 * @param resource $cpoint A control point identifier, returned by gupnp_control_point_new.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_control_point_browse_start($cpoint): void
{
    error_clear_last();
    $result = \gupnp_control_point_browse_start($cpoint);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Stop the search and calls user-defined callback.
 * 
 * @param resource $cpoint A control point identifier, returned by gupnp_control_point_new.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_control_point_browse_stop($cpoint): void
{
    error_clear_last();
    $result = \gupnp_control_point_browse_stop($cpoint);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Set control point callback function for signal.
 * 
 * @param resource $cpoint A control point identifier, returned by gupnp_control_point_new.
 * @param int $signal The value of signal. Signal can be one of the following values:
 * 
 * 
 * GUPNP_SIGNAL_DEVICE_PROXY_AVAILABLE
 * 
 * 
 * Emitted whenever a new device has become available.
 * 
 * 
 * 
 * 
 * GUPNP_SIGNAL_DEVICE_PROXY_UNAVAILABLE
 * 
 * 
 * Emitted whenever a device is not available any more.
 * 
 * 
 * 
 * 
 * GUPNP_SIGNAL_SERVICE_PROXY_AVAILABLE
 * 
 * 
 * Emitted whenever a new service has become available.
 * 
 * 
 * 
 * 
 * GUPNP_SIGNAL_SERVICE_PROXY_UNAVAILABLE
 * 
 * 
 * Emitted whenever a service is not available any more.
 * 
 * 
 * 
 * 
 * @param mixed $callback 
 * @param mixed $arg 
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_control_point_callback_set($cpoint, int $signal, $callback, $arg = null): void
{
    error_clear_last();
    if ($arg !== null) {
        $result = \gupnp_control_point_callback_set($cpoint, $signal, $callback, $arg);
    }else {
        $result = \gupnp_control_point_callback_set($cpoint, $signal, $callback);
    }
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Set device callback function for signal and action.
 * 
 * @param resource $root_device A root device identifier, returned by gupnp_root_device_new.
 * @param int $signal The value of signal. Signal can be one of the following values:
 * 
 * 
 * GUPNP_SIGNAL_ACTION_INVOKED
 * 
 * 
 * Emitted whenever an action is invoked. Handler should process action 
 * and must call either gupnp_service_action_return 
 * or gupnp_service_action_return_error.
 * 
 * 
 * 
 * 
 * GUPNP_SIGNAL_NOTIFY_FAILED
 * 
 * 
 * Emitted whenever notification of a client fails.
 * 
 * 
 * 
 * 
 * @param string $action_name 
 * @param mixed $callback 
 * @param mixed $arg The name of action.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_device_action_callback_set($root_device, int $signal, string $action_name, $callback, $arg = null): void
{
    error_clear_last();
    if ($arg !== null) {
        $result = \gupnp_device_action_callback_set($root_device, $signal, $action_name, $callback, $arg);
    }else {
        $result = \gupnp_device_action_callback_set($root_device, $signal, $action_name, $callback);
    }
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Get whether or not root_device is available (announcing its presence).
 * 
 * @param resource $root_device A root device identifier, returned by gupnp_root_device_new.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_root_device_get_available($root_device): void
{
    error_clear_last();
    $result = \gupnp_root_device_get_available($root_device);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Controls whether or not root_device is available (announcing its presence).
 * 
 * @param resource $root_device A root device identifier, returned by gupnp_root_device_new.
 * @param bool $available Set TRUE if root_device should be available.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_root_device_set_available($root_device, bool $available): void
{
    error_clear_last();
    $result = \gupnp_root_device_set_available($root_device, $available);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Start root server's main loop.
 * 
 * @param resource $root_device A root device identifier, returned by gupnp_root_device_new.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_root_device_start($root_device): void
{
    error_clear_last();
    $result = \gupnp_root_device_start($root_device);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Stop root server's main loop.
 * 
 * @param resource $root_device A root device identifier, returned by gupnp_root_device_new.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_root_device_stop($root_device): void
{
    error_clear_last();
    $result = \gupnp_root_device_stop($root_device);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Return error code.
 * 
 * @param resource $action A service action identifier.
 * @param int $error_code The error code. Signal can be one of the following values or user defined:
 * 
 * 
 * GUPNP_CONTROL_ERROR_INVALID_ACTION
 * 
 * 
 * The action name was invalid.
 * 
 * 
 * 
 * 
 * GUPNP_CONTROL_ERROR_INVALID_ARGS
 * 
 * 
 * The action arguments were invalid. 
 * 
 * 
 * 
 * 
 * GUPNP_CONTROL_ERROR_OUT_OF_SYNC
 * 
 * 
 * Out of sync (deprecated). 
 * 
 * 
 * 
 * 
 * GUPNP_CONTROL_ERROR_ACTION_FAILED
 * 
 * 
 * The action failed. 
 * 
 * 
 * 
 * 
 * @param string $error_description 
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_action_return_error($action, int $error_code, string $error_description = null): void
{
    error_clear_last();
    if ($error_description !== null) {
        $result = \gupnp_service_action_return_error($action, $error_code, $error_description);
    }else {
        $result = \gupnp_service_action_return_error($action, $error_code);
    }
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Return successfully.
 * 
 * @param resource $action A service action identifier.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_action_return($action): void
{
    error_clear_last();
    $result = \gupnp_service_action_return($action);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Sets the specified action return values.
 * 
 * @param resource $action A service action identifier.
 * @param string $name The name of the variable to retrieve.
 * @param int $type The type of the variable to retrieve. Type can be one of the following values:
 * 
 * 
 * GUPNP_TYPE_BOOLEAN
 * 
 * 
 * Type of the variable is boolean.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_INT
 * 
 * 
 * Type of the variable is integer.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_LONG
 * 
 * 
 * Type of the variable is long.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_DOUBLE
 * 
 * 
 * Type of the variable is double.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_FLOAT
 * 
 * 
 * Type of the variable is float.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_STRING
 * 
 * 
 * Type of the variable is string.
 * 
 * 
 * 
 * 
 * @param mixed $value 
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_action_set($action, string $name, int $type, $value): void
{
    error_clear_last();
    $result = \gupnp_service_action_set($action, $name, $type, $value);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Causes new notifications to be queued up until gupnp_service_thaw_notify is called.
 * 
 * @param resource $service A service identifier.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_freeze_notify($service): void
{
    error_clear_last();
    $result = \gupnp_service_freeze_notify($service);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Notifies listening clients that the property have changed to the specified values.
 * 
 * @param resource $service A service identifier.
 * @param string $name The name of the variable.
 * @param int $type The type of the variable. Type can be one of the following values:
 * 
 * 
 * GUPNP_TYPE_BOOLEAN
 * 
 * 
 * Type of the variable is boolean.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_INT
 * 
 * 
 * Type of the variable is integer.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_LONG
 * 
 * 
 * Type of the variable is long.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_DOUBLE
 * 
 * 
 * Type of the variable is double.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_FLOAT
 * 
 * 
 * Type of the variable is float.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_STRING
 * 
 * 
 * Type of the variable is string.
 * 
 * 
 * 
 * 
 * @param mixed $value 
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_notify($service, string $name, int $type, $value): void
{
    error_clear_last();
    $result = \gupnp_service_notify($service, $name, $type, $value);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Send action with parameters to the service exposed by proxy synchronously and set value.
 * 
 * @param resource $proxy A service proxy identifier.
 * @param string $action An action.
 * @param string $name The action name.
 * @param mixed $value The action value.
 * @param int $type The type of the action. Type can be one of the following values:
 * 
 * 
 * GUPNP_TYPE_BOOLEAN
 * 
 * 
 * Type of the variable is boolean.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_INT
 * 
 * 
 * Type of the variable is integer.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_LONG
 * 
 * 
 * Type of the variable is long.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_DOUBLE
 * 
 * 
 * Type of the variable is double.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_FLOAT
 * 
 * 
 * Type of the variable is float.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_STRING
 * 
 * 
 * Type of the variable is string.
 * 
 * 
 * 
 * 
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_proxy_action_set($proxy, string $action, string $name, $value, int $type): void
{
    error_clear_last();
    $result = \gupnp_service_proxy_action_set($proxy, $action, $name, $value, $type);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Sets up callback to be called whenever a change notification for variable is recieved.
 * 
 * @param resource $proxy A service proxy identifier.
 * @param string $value The variable to add notification for.
 * @param int $type The type of the variable. Type can be one of the following values:
 * 
 * 
 * GUPNP_TYPE_BOOLEAN
 * 
 * 
 * Type of the variable is boolean.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_INT
 * 
 * 
 * Type of the variable is integer.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_LONG
 * 
 * 
 * Type of the variable is long.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_DOUBLE
 * 
 * 
 * Type of the variable is double.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_FLOAT
 * 
 * 
 * Type of the variable is float.
 * 
 * 
 * 
 * 
 * GUPNP_TYPE_STRING
 * 
 * 
 * Type of the variable is string.
 * 
 * 
 * 
 * 
 * @param mixed $callback 
 * @param mixed $arg 
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_proxy_add_notify($proxy, string $value, int $type, $callback, $arg = null): void
{
    error_clear_last();
    if ($arg !== null) {
        $result = \gupnp_service_proxy_add_notify($proxy, $value, $type, $callback, $arg);
    }else {
        $result = \gupnp_service_proxy_add_notify($proxy, $value, $type, $callback);
    }
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Set service proxy callback for signal.
 * 
 * @param resource $proxy A service proxy identifier.
 * @param int $signal The value of signal.
 * 
 * 
 * GUPNP_SIGNAL_SUBSCRIPTION_LOST
 * 
 * 
 * Emitted whenever the subscription to this service has been lost due 
 * to an error condition.
 * 
 * 
 * 
 * 
 * @param mixed $callback 
 * @param mixed $arg The callback function for the certain signal. Typically, callback function 
 * takes on two parameters.  error parameter's message 
 * being the first, and the arg is second.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_proxy_callback_set($proxy, int $signal, $callback, $arg = null): void
{
    error_clear_last();
    if ($arg !== null) {
        $result = \gupnp_service_proxy_callback_set($proxy, $signal, $callback, $arg);
    }else {
        $result = \gupnp_service_proxy_callback_set($proxy, $signal, $callback);
    }
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Check whether subscription is valid to the service.
 * 
 * @param resource $proxy A service proxy identifier.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_proxy_get_subscribed($proxy): void
{
    error_clear_last();
    $result = \gupnp_service_proxy_get_subscribed($proxy);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Cancels the variable change notification.
 * 
 * @param resource $proxy A service proxy identifier.
 * @param string $value The variable to add notification for.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_proxy_remove_notify($proxy, string $value): void
{
    error_clear_last();
    $result = \gupnp_service_proxy_remove_notify($proxy, $value);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Send action with parameters in_params to the service exposed by proxy synchronously and return out_params with values .
 * 
 * @param resource $proxy A service proxy identifier.
 * @param string $action An action.
 * @param array $in_params An array of in parameters. Each entry in in_params is supposed to an array containing name, type and value of the parameters.
 * @param array $out_params An array of out parameters. Each entry in out_params is supposed to an array containing name and type of the parameters.
 * @return array Return out_params array with values .
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_proxy_send_action($proxy, string $action, array $in_params, array $out_params): array
{
    error_clear_last();
    $result = \gupnp_service_proxy_send_action($proxy, $action, $in_params, $out_params);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
    return $result;
}


/**
 * (Un)subscribes to the service.
 * 
 * @param resource $proxy A service proxy identifier.
 * @param bool $subscribed Set TRUE to subscribe to this service.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_proxy_set_subscribed($proxy, bool $subscribed): void
{
    error_clear_last();
    $result = \gupnp_service_proxy_set_subscribed($proxy, $subscribed);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


/**
 * Sends out any pending notifications and stops queuing of new ones.
 * 
 * @param resource $service A service identifier.
 * @throws Exceptions\GupnpException
 * 
 */
function gupnp_service_thaw_notify($service): void
{
    error_clear_last();
    $result = \gupnp_service_thaw_notify($service);
    if ($result === FALSE) {
        throw Exceptions\GupnpException::createFromPhpError();
    }
}


