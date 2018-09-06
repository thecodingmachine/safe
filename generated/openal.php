<?php

namespace Safe;

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
 * @throws Exceptions\OpenalException
 * 
 */
function openal_buffer_data($buffer, int $format, string $data, int $freq): void
{
    error_clear_last();
    $result = \openal_buffer_data($buffer, $format, $data, $freq);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $buffer An Open AL(Buffer) resource
 * (previously created by openal_buffer_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_buffer_destroy($buffer): void
{
    error_clear_last();
    $result = \openal_buffer_destroy($buffer);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
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
 * requested .
 * @throws Exceptions\OpenalException
 * 
 */
function openal_buffer_get($buffer, int $property): int
{
    error_clear_last();
    $result = \openal_buffer_get($buffer, $property);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param resource $buffer An Open AL(Buffer) resource
 * (previously created by openal_buffer_create).
 * @param string $wavfile Path to .wav file on
 * local file system.
 * @throws Exceptions\OpenalException
 * 
 */
function openal_buffer_loadwav($buffer, string $wavfile): void
{
    error_clear_last();
    $result = \openal_buffer_loadwav($buffer, $wavfile);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_context_current($context): void
{
    error_clear_last();
    $result = \openal_context_current($context);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_context_destroy($context): void
{
    error_clear_last();
    $result = \openal_context_destroy($context);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_context_process($context): void
{
    error_clear_last();
    $result = \openal_context_process($context);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $context An Open AL(Context) resource
 * (previously created by openal_context_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_context_suspend($context): void
{
    error_clear_last();
    $result = \openal_context_suspend($context);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $device An Open AL(Device) resource
 * (previously created by openal_device_open)
 * to be closed.
 * @throws Exceptions\OpenalException
 * 
 */
function openal_device_close($device): void
{
    error_clear_last();
    $result = \openal_device_close($device);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param int $property Property to retrieve, one of:
 * AL_GAIN (float),
 * AL_POSITION (array(float,float,float)),
 * AL_VELOCITY (array(float,float,float)) and
 * AL_ORIENTATION (array(float,float,float)).
 * @return mixed Returns a float or array of floats (as appropriate) .
 * @throws Exceptions\OpenalException
 * 
 */
function openal_listener_get(int $property)
{
    error_clear_last();
    $result = \openal_listener_get($property);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
    return $result;
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
 * @throws Exceptions\OpenalException
 * 
 */
function openal_listener_set(int $property, $setting): void
{
    error_clear_last();
    $result = \openal_listener_set($property, $setting);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_source_destroy($source): void
{
    error_clear_last();
    $result = \openal_source_destroy($source);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
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
 * @return mixed Returns the type associated with the property being retrieved
 * .
 * @throws Exceptions\OpenalException
 * 
 */
function openal_source_get($source, int $property)
{
    error_clear_last();
    $result = \openal_source_get($source, $property);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
    return $result;
}


/**
 * 
 * 
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_source_pause($source): void
{
    error_clear_last();
    $result = \openal_source_pause($source);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_source_play($source): void
{
    error_clear_last();
    $result = \openal_source_play($source);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_source_rewind($source): void
{
    error_clear_last();
    $result = \openal_source_rewind($source);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
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
 * @throws Exceptions\OpenalException
 * 
 */
function openal_source_set($source, int $property, $setting): void
{
    error_clear_last();
    $result = \openal_source_set($source, $property, $setting);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
}


/**
 * 
 * 
 * @param resource $source An Open AL(Source) resource
 * (previously created by openal_source_create).
 * @throws Exceptions\OpenalException
 * 
 */
function openal_source_stop($source): void
{
    error_clear_last();
    $result = \openal_source_stop($source);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
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
 * @return resource Returns a stream resource on success .
 * @throws Exceptions\OpenalException
 * 
 */
function openal_stream($source, int $format, int $rate)
{
    error_clear_last();
    $result = \openal_stream($source, $format, $rate);
    if ($result === FALSE) {
        throw Exceptions\OpenalException::createFromPhpError();
    }
    return $result;
}


