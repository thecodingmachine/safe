<?php

namespace Safe;

use Safe\Exceptions\OpenalException;

/**
 *
 *
 * @return resource Returns an Open AL(Buffer) resource on success.
 * @throws OpenalException
 *
 */
function openal_buffer_create()
{
    error_clear_last();
    $safeResult = \openal_buffer_create();
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param resource $buffer An Open AL(Buffer) resource
 * (previously created by openal_buffer_create).
 * @param int $format Format of data, one of:
 * AL_FORMAT_MONO8,
 * AL_FORMAT_MONO16,
 * AL_FORMAT_STEREO8 and
 * AL_FORMAT_STEREO16
 * @param string $data Block of binary audio data in the format and
 * freq specified.
 * @param int $freq Frequency of data given in Hz.
 * @throws OpenalException
 *
 */
function openal_buffer_data($buffer, int $format, string $data, int $freq): void
{
    error_clear_last();
    $safeResult = \openal_buffer_data($buffer, $format, $data, $freq);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $buffer An Open AL(Buffer) resource
 * (previously created by openal_buffer_create).
 * @throws OpenalException
 *
 */
function openal_buffer_destroy($buffer): void
{
    error_clear_last();
    $safeResult = \openal_buffer_destroy($buffer);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $buffer An Open AL(Buffer) resource
 * (previously created by openal_buffer_create).
 * @param int $property Specific property, one of:
 * AL_FREQUENCY,
 * AL_BITS,
 * AL_CHANNELS and
 * AL_SIZE.
 * @return int Returns an integer value appropriate to the property
 * requested.
 * @throws OpenalException
 *
 */
function openal_buffer_get($buffer, int $property): int
{
    error_clear_last();
    $safeResult = \openal_buffer_get($buffer, $property);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param resource $buffer An Open AL(Buffer) resource
 * (previously created by openal_buffer_create).
 * @param string $wavfile Path to .wav file on
 * local file system.
 * @throws OpenalException
 *
 */
function openal_buffer_loadwav($buffer, string $wavfile): void
{
    error_clear_last();
    $safeResult = \openal_buffer_loadwav($buffer, $wavfile);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $device An Open AL(Device) resource
 * (previously created by openal_device_open).
 * @return resource Returns an Open AL(Context) resource on success.
 * @throws OpenalException
 *
 */
function openal_context_create($device)
{
    error_clear_last();
    $safeResult = \openal_context_create($device);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws OpenalException
 *
 */
function openal_context_current($context): void
{
    error_clear_last();
    $safeResult = \openal_context_current($context);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws OpenalException
 *
 */
function openal_context_destroy($context): void
{
    error_clear_last();
    $safeResult = \openal_context_destroy($context);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws OpenalException
 *
 */
function openal_context_process($context): void
{
    error_clear_last();
    $safeResult = \openal_context_process($context);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws OpenalException
 *
 */
function openal_context_suspend($context): void
{
    error_clear_last();
    $safeResult = \openal_context_suspend($context);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $device An Open AL(Device) resource
 * (previously created by openal_device_open)
 * to be closed.
 * @throws OpenalException
 *
 */
function openal_device_close($device): void
{
    error_clear_last();
    $safeResult = \openal_device_close($device);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $device_desc Open an audio device optionally specified by device_desc.
 * If device_desc is not specified the first available audio
 * device will be used.
 * @return resource Returns an Open AL(Device) resource on success.
 * @throws OpenalException
 *
 */
function openal_device_open(string $device_desc = null)
{
    error_clear_last();
    if ($device_desc !== null) {
        $safeResult = \openal_device_open($device_desc);
    } else {
        $safeResult = \openal_device_open();
    }
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param int $property Property to retrieve, one of:
 * AL_GAIN (float),
 * AL_POSITION (array(float,float,float)),
 * AL_VELOCITY (array(float,float,float)) and
 * AL_ORIENTATION (array(float,float,float)).
 * @return mixed Returns a float or array of floats (as appropriate).
 * @throws OpenalException
 *
 */
function openal_listener_get(int $property)
{
    error_clear_last();
    $safeResult = \openal_listener_get($property);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param int $property Property to set, one of:
 * AL_GAIN (float),
 * AL_POSITION (array(float,float,float)),
 * AL_VELOCITY (array(float,float,float)) and
 * AL_ORIENTATION (array(float,float,float)).
 * @param mixed $setting Value to set, either float, or an array of floats as appropriate.
 * @throws OpenalException
 *
 */
function openal_listener_set(int $property, $setting): void
{
    error_clear_last();
    $safeResult = \openal_listener_set($property, $setting);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @return resource Returns an Open AL(Source) resource on success.
 * @throws OpenalException
 *
 */
function openal_source_create()
{
    error_clear_last();
    $safeResult = \openal_source_create();
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws OpenalException
 *
 */
function openal_source_destroy($source): void
{
    error_clear_last();
    $safeResult = \openal_source_destroy($source);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @param int $property Property to get, one of:
 * AL_SOURCE_RELATIVE (int),
 * AL_SOURCE_STATE (int),
 * AL_PITCH (float),
 * AL_GAIN (float),
 * AL_MIN_GAIN (float),
 * AL_MAX_GAIN (float),
 * AL_MAX_DISTANCE (float),
 * AL_ROLLOFF_FACTOR (float),
 * AL_CONE_OUTER_GAIN (float),
 * AL_CONE_INNER_ANGLE (float),
 * AL_CONE_OUTER_ANGLE (float),
 * AL_REFERENCE_DISTANCE (float),
 * AL_POSITION (array(float,float,float)),
 * AL_VELOCITY (array(float,float,float)),
 * AL_DIRECTION (array(float,float,float)).
 * @return mixed Returns the type associated with the property being retrieved.
 * @throws OpenalException
 *
 */
function openal_source_get($source, int $property)
{
    error_clear_last();
    $safeResult = \openal_source_get($source, $property);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws OpenalException
 *
 */
function openal_source_pause($source): void
{
    error_clear_last();
    $safeResult = \openal_source_pause($source);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws OpenalException
 *
 */
function openal_source_play($source): void
{
    error_clear_last();
    $safeResult = \openal_source_play($source);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws OpenalException
 *
 */
function openal_source_rewind($source): void
{
    error_clear_last();
    $safeResult = \openal_source_rewind($source);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @param int $property Property to set, one of:
 * AL_BUFFER (OpenAL(Source)),
 * AL_LOOPING (bool),
 * AL_SOURCE_RELATIVE (int),
 * AL_SOURCE_STATE (int),
 * AL_PITCH (float),
 * AL_GAIN (float),
 * AL_MIN_GAIN (float),
 * AL_MAX_GAIN (float),
 * AL_MAX_DISTANCE (float),
 * AL_ROLLOFF_FACTOR (float),
 * AL_CONE_OUTER_GAIN (float),
 * AL_CONE_INNER_ANGLE (float),
 * AL_CONE_OUTER_ANGLE (float),
 * AL_REFERENCE_DISTANCE (float),
 * AL_POSITION (array(float,float,float)),
 * AL_VELOCITY (array(float,float,float)),
 * AL_DIRECTION (array(float,float,float)).
 * @param mixed $setting Value to assign to specified property.
 * Refer to the description of property
 * for a description of the value(s) expected.
 * @throws OpenalException
 *
 */
function openal_source_set($source, int $property, $setting): void
{
    error_clear_last();
    $safeResult = \openal_source_set($source, $property, $setting);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws OpenalException
 *
 */
function openal_source_stop($source): void
{
    error_clear_last();
    $safeResult = \openal_source_stop($source);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @param int $format Format of data, one of:
 * AL_FORMAT_MONO8,
 * AL_FORMAT_MONO16,
 * AL_FORMAT_STEREO8 and
 * AL_FORMAT_STEREO16
 * @param int $rate Frequency of data to stream given in Hz.
 * @return resource Returns a stream resource on success.
 * @throws OpenalException
 *
 */
function openal_stream($source, int $format, int $rate)
{
    error_clear_last();
    $safeResult = \openal_stream($source, $format, $rate);
    if ($safeResult === false) {
        throw OpenalException::createFromPhpError();
    }
    return $safeResult;
}
