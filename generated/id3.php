<?php

namespace Safe;

/**
 * id3_get_frame_long_name returns the long name for an
 * ID3v2 frame.
 * 
 * @param string $frameId An ID3v2 frame
 * @return string Returns the frame long name s.
 * @throws Exceptions\Id3Exception
 * 
 */
function id3_get_frame_long_name(string $frameId): string
{
    error_clear_last();
    $result = \id3_get_frame_long_name($frameId);
    if ($result === FALSE) {
        throw Exceptions\Id3Exception::createFromPhpError();
    }
    return $result;
}


/**
 * id3_get_frame_short_name returns the short name for an
 * ID3v2 frame.
 * 
 * @param string $frameId An ID3v2 frame
 * @return string Returns the frame short name s.
 * 
 * The values returned by id3_get_frame_short_name are used in the
 * array returned by id3_get_tag.
 * @throws Exceptions\Id3Exception
 * 
 */
function id3_get_frame_short_name(string $frameId): string
{
    error_clear_last();
    $result = \id3_get_frame_short_name($frameId);
    if ($result === FALSE) {
        throw Exceptions\Id3Exception::createFromPhpError();
    }
    return $result;
}


/**
 * id3_get_genre_id returns the id for a genre.
 * 
 * @param string $genre Genre name as string.
 * @return int The genre id s.
 * @throws Exceptions\Id3Exception
 * 
 */
function id3_get_genre_id(string $genre): int
{
    error_clear_last();
    $result = \id3_get_genre_id($genre);
    if ($result === FALSE) {
        throw Exceptions\Id3Exception::createFromPhpError();
    }
    return $result;
}


/**
 * id3_remove_tag is used to remove the information stored
 * of an ID3 tag.
 * 
 * @param string $filename The path to the MP3 file
 * 
 * Instead of a filename you may also pass a valid stream resource
 * @param int $version Allows you to specify the version of the tag as MP3 files may contain
 * both, version 1.x and version 2.x tags.
 * @throws Exceptions\Id3Exception
 * 
 */
function id3_remove_tag(string $filename, int $version = ID3_V1_0): void
{
    error_clear_last();
    $result = \id3_remove_tag($filename, $version);
    if ($result === FALSE) {
        throw Exceptions\Id3Exception::createFromPhpError();
    }
}


/**
 * id3_set_tag is used to change the information stored
 * of an ID3 tag. If no tag has been present, it will be added to the file.
 * 
 * @param string $filename The path to the MP3 file
 * 
 * Instead of a filename you may also pass a valid stream resource
 * @param array $tag An associative array of tag keys and values
 * 
 * The following keys may be used in the associative array:
 * 
 * 
 * Keys in the associative array
 * 
 * 
 * 
 * key
 * possible value
 * available in version
 * 
 * 
 * 
 * 
 * title
 * string with maximum of 30 characters
 * v1.0, v1.1
 * 
 * 
 * artist
 * string with maximum of 30 characters
 * v1.0, v1.1
 * 
 * 
 * album
 * string with maximum of 30 characters
 * v1.0, v1.1
 * 
 * 
 * year
 * 4 digits
 * v1.0, v1.1
 * 
 * 
 * genre
 * integer value between 0 and 147
 * v1.0, v1.1
 * 
 * 
 * comment
 * string with maximum of 30 characters (28 in v1.1)
 * v1.0, v1.1
 * 
 * 
 * track
 * integer between 0 and 255
 * v1.1
 * 
 * 
 * 
 * 
 * @param int $version Allows you to specify the version of the tag as MP3 files may contain
 * both, version 1.x and version 2.x tags
 * @throws Exceptions\Id3Exception
 * 
 */
function id3_set_tag(string $filename, array $tag, int $version = ID3_V1_0): void
{
    error_clear_last();
    $result = \id3_set_tag($filename, $tag, $version);
    if ($result === FALSE) {
        throw Exceptions\Id3Exception::createFromPhpError();
    }
}


