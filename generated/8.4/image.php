<?php

namespace Safe;

use Safe\Exceptions\ImageException;

/**
 * The getimagesize function will determine the
 * size of any supported given image file and return the dimensions along with
 * the file type and a height/width text string to be used inside a
 * normal HTML IMG tag and the
 * correspondent HTTP content type.
 *
 * getimagesize can also return some more information
 * in image_info parameter.
 *
 * @param string $filename This parameter specifies the file you wish to retrieve information
 * about. It can reference a local file or (configuration permitting) a
 * remote file using one of the supported streams.
 * @param array|null $image_info This optional parameter allows you to extract some extended
 * information from the image file. Currently, this will return the
 * different JPG APP markers as an associative array.
 * Some programs use these APP markers to embed text information in
 * images. A very common one is to embed
 * IPTC information in the APP13 marker.
 * You can use the iptcparse function to parse the
 * binary APP13 marker into something readable.
 *
 * The image_info only supports
 * JFIF files.
 * @return array{0: 0|positive-int, 1: 0|positive-int, 2: int, 3: string, mime: string, channels: int, bits: int}|null Returns an array with up to 7 elements. Not all image types will include
 * the channels and bits elements.
 *
 * Index 0 and 1 contains respectively the width and the height of the image.
 *
 * Index 2 is one of the IMAGETYPE_* constants indicating
 * the type of the image.
 *
 * Index 3 is a text string with the correct
 * height="yyy" width="xxx" string that can be used
 * directly in an IMG tag.
 *
 * mime is the correspondant MIME type of the image.
 * This information can be used to deliver images with the correct HTTP
 * Content-type header:
 *
 * getimagesize and MIME types
 *
 *
 * ]]>
 *
 *
 *
 * channels will be 3 for RGB pictures and 4 for CMYK
 * pictures.
 *
 * bits is the number of bits for each color.
 *
 * For some image types, the presence of channels and
 * bits values can be a bit
 * confusing. As an example, GIF always uses 3 channels
 * per pixel, but the number of bits per pixel cannot be calculated for an
 * animated GIF with a global color table.
 *
 * On failure, FALSE is returned.
 * @throws ImageException
 *
 */
function getimagesize(string $filename, ?array &$image_info = null): ?array
{
    error_clear_last();
    $safeResult = \getimagesize($filename, $image_info);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the extension for the given IMAGETYPE_*
 * constant.
 *
 * @param int $image_type One of the IMAGETYPE_* constant.
 * @param bool $include_dot Whether to prepend a dot to the extension or not. Default to TRUE.
 * @return string A string with the extension corresponding to the given image type.
 * @throws ImageException
 *
 */
function image_type_to_extension(int $image_type, bool $include_dot = true): string
{
    error_clear_last();
    $safeResult = \image_type_to_extension($image_type, $include_dot);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param array $affine Array with keys 0 to 5.
 * @param array|null $clip Array with keys "x", "y", "width" and "height"; or NULL.
 * @return \GdImage Return affined image object on success.
 * @throws ImageException
 *
 */
function imageaffine(\GdImage $image, array $affine, ?array $clip = null): \GdImage
{
    error_clear_last();
    if ($clip !== null) {
        $safeResult = \imageaffine($image, $affine, $clip);
    } else {
        $safeResult = \imageaffine($image, $affine);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the concatenation of two affine transformation matrices,
 * what is useful if multiple transformations should be applied to the same
 * image in one go.
 *
 * @param array $matrix1 An affine transformation matrix (an array with keys
 * 0 to 5 and float values).
 * @param array $matrix2 An affine transformation matrix (an array with keys
 * 0 to 5 and float values).
 * @return array{0:float,1:float,2:float,3:float,4:float,5:float} An affine transformation matrix (an array with keys
 * 0 to 5 and float values).
 * @throws ImageException
 *
 */
function imageaffinematrixconcat(array $matrix1, array $matrix2): array
{
    error_clear_last();
    $safeResult = \imageaffinematrixconcat($matrix1, $matrix2);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns an affine transformation matrix.
 *
 * @param int $type One of the IMG_AFFINE_* constants.
 * @param array|float $options If type is IMG_AFFINE_TRANSLATE
 * or IMG_AFFINE_SCALE,
 * options has to be an array with keys x
 * and y, both having float values.
 *
 * If type is IMG_AFFINE_ROTATE,
 * IMG_AFFINE_SHEAR_HORIZONTAL or IMG_AFFINE_SHEAR_VERTICAL,
 * options has to be a float specifying the angle.
 * @return array{0:float,1:float,2:float,3:float,4:float,5:float} An affine transformation matrix (an array with keys
 * 0 to 5 and float values).
 * @throws ImageException
 *
 */
function imageaffinematrixget(int $type, $options): array
{
    error_clear_last();
    $safeResult = \imageaffinematrixget($type, $options);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagealphablending allows for two different
 * modes of drawing on truecolor images. In blending mode, the
 * alpha channel component of the color supplied to all drawing function,
 * such as imagesetpixel determines how much of the
 * underlying color should be allowed to shine through.  As a result, gd
 * automatically blends the existing color at that point with the drawing color,
 * and stores the result in the image.  The resulting pixel is opaque.  In
 * non-blending mode, the drawing color is copied literally with its alpha channel
 * information, replacing the destination pixel.  Blending mode is not available
 * when drawing on palette images.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param bool $enable Whether to enable the blending mode or not. On true color images
 * the default value is TRUE otherwise the default value is FALSE
 * @throws ImageException
 *
 */
function imagealphablending(\GdImage $image, bool $enable): void
{
    error_clear_last();
    $safeResult = \imagealphablending($image, $enable);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Activate the fast drawing antialiased methods for lines and wired polygons.
 * It does not support alpha components. It works using a direct blend
 * operation. It works only with truecolor images.
 *
 * Thickness and styled are not supported.
 *
 * Using antialiased primitives with transparent background color can end with
 * some unexpected results. The blend method uses the background color as any
 * other colors. The lack of alpha component support does not allow an alpha
 * based antialiasing method.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param bool $enable Whether to enable antialiasing or not.
 * @throws ImageException
 *
 */
function imageantialias(\GdImage $image, bool $enable): void
{
    error_clear_last();
    $safeResult = \imageantialias($image, $enable);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagearc draws an arc of circle centered at the given
 * coordinates.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $center_x x-coordinate of the center.
 * @param int $center_y y-coordinate of the center.
 * @param int $width The arc width.
 * @param int $height The arc height.
 * @param int $start_angle The arc start angle, in degrees.
 * @param int $end_angle The arc end angle, in degrees.
 * 0° is located at the three-o'clock position, and the arc is drawn
 * clockwise.
 * @param int $color A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagearc(\GdImage $image, int $center_x, int $center_y, int $width, int $height, int $start_angle, int $end_angle, int $color): void
{
    error_clear_last();
    $safeResult = \imagearc($image, $center_x, $center_y, $width, $height, $start_angle, $end_angle, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Outputs or saves a AVIF Raster image from the given image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 * @param int $quality quality is optional, and ranges from 0 (worst quality, smaller file)
 * to 100 (best quality, larger file).
 * If -1 is provided, the default value 30 is used.
 * @param int $speed speed is optional, and ranges from 0 (slow, smaller file)
 * to 10 (fast, larger file).
 * If -1 is provided, the default value 6 is used.
 * @throws ImageException
 *
 */
function imageavif(\GdImage $image, $file = null, int $quality = -1, int $speed = -1): void
{
    error_clear_last();
    if ($speed !== -1) {
        $safeResult = \imageavif($image, $file, $quality, $speed);
    } elseif ($quality !== -1) {
        $safeResult = \imageavif($image, $file, $quality);
    } elseif ($file !== null) {
        $safeResult = \imageavif($image, $file);
    } else {
        $safeResult = \imageavif($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Outputs or saves a BMP version of the given image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 *
 * NULL is invalid if the compressed arguments is
 * not used.
 * @param bool $compressed Whether the BMP should be compressed with run-length encoding (RLE), or not.
 * @throws ImageException
 *
 */
function imagebmp(\GdImage $image, $file = null, bool $compressed = true): void
{
    error_clear_last();
    if ($compressed !== true) {
        $safeResult = \imagebmp($image, $file, $compressed);
    } elseif ($file !== null) {
        $safeResult = \imagebmp($image, $file);
    } else {
        $safeResult = \imagebmp($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagechar draws the first character of
 * char in the image identified by
 * image with its upper-left at
 * x,y (top left is 0,
 * 0) with the color color.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $font Can be 1, 2, 3, 4, 5 for built-in
 * fonts in latin2 encoding (where higher numbers corresponding to larger fonts) or GdFont instance,
 * returned by imageloadfont.
 * @param int $x x-coordinate of the start.
 * @param int $y y-coordinate of the start.
 * @param string $char The character to draw.
 * @param int $color A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagechar(\GdImage $image, int $font, int $x, int $y, string $char, int $color): void
{
    error_clear_last();
    $safeResult = \imagechar($image, $font, $x, $y, $char, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Draws the character char vertically at the specified
 * coordinate on the given image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $font Can be 1, 2, 3, 4, 5 for built-in
 * fonts in latin2 encoding (where higher numbers corresponding to larger fonts) or GdFont instance,
 * returned by imageloadfont.
 * @param int $x x-coordinate of the start.
 * @param int $y y-coordinate of the start.
 * @param string $char The character to draw.
 * @param int $color A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagecharup(\GdImage $image, int $font, int $x, int $y, string $char, int $color): void
{
    error_clear_last();
    $safeResult = \imagecharup($image, $font, $x, $y, $char, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Returns the index of the color of the pixel at the
 * specified location in the image specified by image.
 *
 * If the image is a
 * truecolor image, this function returns the RGB value of that pixel as
 * integer. Use bitshifting and masking to access the distinct red, green and blue
 * component values:
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x x-coordinate of the point.
 * @param int $y y-coordinate of the point.
 * @return int Returns the index of the color.
 * @throws ImageException
 *
 */
function imagecolorat(\GdImage $image, int $x, int $y): int
{
    error_clear_last();
    $safeResult = \imagecolorat($image, $x, $y);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * De-allocates a color previously allocated with
 * imagecolorallocate or
 * imagecolorallocatealpha.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $color The color identifier.
 * @throws ImageException
 *
 */
function imagecolordeallocate(\GdImage $image, int $color): void
{
    error_clear_last();
    $safeResult = \imagecolordeallocate($image, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Makes the colors of the palette version of an image more closely match the true color version.
 *
 * @param \GdImage $image1 A truecolor image object.
 * @param \GdImage $image2 A palette image object pointing to an image that has the same
 * size as image1.
 * @throws ImageException
 *
 */
function imagecolormatch(\GdImage $image1, \GdImage $image2): void
{
    error_clear_last();
    $safeResult = \imagecolormatch($image1, $image2);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * This sets the specified index in the palette to the specified
 * color. This is useful for creating flood-fill-like effects in
 * palleted images without the overhead of performing the actual
 * flood-fill.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $color An index in the palette.
 * @param int $red Value of red component.
 * @param int $green Value of green component.
 * @param int $blue Value of blue component.
 * @param int $alpha Value of alpha component.
 * @throws ImageException
 *
 */
function imagecolorset(\GdImage $image, int $color, int $red, int $green, int $blue, int $alpha = 0): void
{
    error_clear_last();
    $safeResult = \imagecolorset($image, $color, $red, $green, $blue, $alpha);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Gets the color for a specified index.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $color The color index.
 * @return array{red: int, green: int, blue: int, alpha: int} Returns an associative array with red, green, blue and alpha keys that
 * contain the appropriate values for the specified color index.
 *
 */
function imagecolorsforindex(\GdImage $image, int $color): array
{
    error_clear_last();
    $safeResult = \imagecolorsforindex($image, $color);
    return $safeResult;
}


/**
 * Applies a convolution matrix on the image, using the given coefficient and
 * offset.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param array $matrix A 3x3 matrix: an array of three arrays of three floats.
 * @param float $divisor The divisor of the result of the convolution, used for normalization.
 * @param float $offset Color offset.
 * @throws ImageException
 *
 */
function imageconvolution(\GdImage $image, array $matrix, float $divisor, float $offset): void
{
    error_clear_last();
    $safeResult = \imageconvolution($image, $matrix, $divisor, $offset);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Copy a part of src_image onto
 * dst_image starting at the x,y coordinates
 * src_x, src_y with
 * a width of src_width and a height of
 * src_height.  The portion defined will be copied
 * onto the x,y coordinates, dst_x and
 * dst_y.
 *
 * @param \GdImage $dst_image Destination image resource.
 * @param \GdImage $src_image Source image resource.
 * @param int $dst_x x-coordinate of destination point.
 * @param int $dst_y y-coordinate of destination point.
 * @param int $src_x x-coordinate of source point.
 * @param int $src_y y-coordinate of source point.
 * @param int $src_width Source width.
 * @param int $src_height Source height.
 * @throws ImageException
 *
 */
function imagecopy(\GdImage $dst_image, \GdImage $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_width, int $src_height): void
{
    error_clear_last();
    $safeResult = \imagecopy($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $src_width, $src_height);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Copy a part of src_image onto
 * dst_image starting at the x,y coordinates
 * src_x, src_y with
 * a width of src_width and a height of
 * src_height.  The portion defined will be copied
 * onto the x,y coordinates, dst_x and
 * dst_y.
 *
 * @param \GdImage $dst_image Destination image resource.
 * @param \GdImage $src_image Source image resource.
 * @param int $dst_x x-coordinate of destination point.
 * @param int $dst_y y-coordinate of destination point.
 * @param int $src_x x-coordinate of source point.
 * @param int $src_y y-coordinate of source point.
 * @param int $src_width Source width.
 * @param int $src_height Source height.
 * @param int $pct The two images will be merged according to pct
 * which can range from 0 to 100.  When pct = 0,
 * no action is taken, when 100 this function behaves identically
 * to imagecopy for pallete images, except for
 * ignoring alpha components, while it implements alpha transparency
 * for true colour images.
 * @throws ImageException
 *
 */
function imagecopymerge(\GdImage $dst_image, \GdImage $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_width, int $src_height, int $pct): void
{
    error_clear_last();
    $safeResult = \imagecopymerge($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $src_width, $src_height, $pct);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagecopymergegray copy a part of src_image onto
 * dst_image starting at the x,y coordinates
 * src_x, src_y with
 * a width of src_width and a height of
 * src_height.  The portion defined will be copied
 * onto the x,y coordinates, dst_x and
 * dst_y.
 *
 * This function is identical to imagecopymerge except
 * that when merging it preserves the hue of the source by converting
 * the destination pixels to gray scale before the copy operation.
 *
 * @param \GdImage $dst_image Destination image resource.
 * @param \GdImage $src_image Source image resource.
 * @param int $dst_x x-coordinate of destination point.
 * @param int $dst_y y-coordinate of destination point.
 * @param int $src_x x-coordinate of source point.
 * @param int $src_y y-coordinate of source point.
 * @param int $src_width Source width.
 * @param int $src_height Source height.
 * @param int $pct The src_image will be changed to grayscale according
 * to pct where 0 is fully grayscale and 100 is
 * unchanged. When pct = 100 this function behaves
 * identically to imagecopy for pallete images, except for
 * ignoring alpha components, while
 * it implements alpha transparency for true colour images.
 * @throws ImageException
 *
 */
function imagecopymergegray(\GdImage $dst_image, \GdImage $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_width, int $src_height, int $pct): void
{
    error_clear_last();
    $safeResult = \imagecopymergegray($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $src_width, $src_height, $pct);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagecopyresampled copies a rectangular
 * portion of one image to another image, smoothly interpolating pixel
 * values so that, in particular, reducing the size of an image still
 * retains a great deal of clarity.
 *
 * In other words, imagecopyresampled will take a
 * rectangular area from src_image of width
 * src_width and height src_height at
 * position (src_x,src_y)
 * and place it in a rectangular area of dst_image
 * of width dst_width and height dst_height
 * at position (dst_x,dst_y).
 *
 * If the source and destination coordinates and width and heights
 * differ, appropriate stretching or shrinking of the image fragment
 * will be performed. The coordinates refer to the upper left
 * corner.  This function can be used to copy regions within the
 * same image (if dst_image is the same as
 * src_image) but if the regions overlap the
 * results will be unpredictable.
 *
 * @param \GdImage $dst_image Destination image resource.
 * @param \GdImage $src_image Source image resource.
 * @param int $dst_x x-coordinate of destination point.
 * @param int $dst_y y-coordinate of destination point.
 * @param int $src_x x-coordinate of source point.
 * @param int $src_y y-coordinate of source point.
 * @param int $dst_width Destination width.
 * @param int $dst_height Destination height.
 * @param int $src_width Source width.
 * @param int $src_height Source height.
 * @throws ImageException
 *
 */
function imagecopyresampled(\GdImage $dst_image, \GdImage $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_width, int $dst_height, int $src_width, int $src_height): void
{
    error_clear_last();
    $safeResult = \imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_width, $dst_height, $src_width, $src_height);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagecopyresized copies a rectangular
 * portion of one image to another image.
 * dst_image is the destination image,
 * src_image is the source image identifier.
 *
 * In other words, imagecopyresized will take a
 * rectangular area from src_image of width
 * src_width and height src_height at
 * position (src_x,src_y)
 * and place it in a rectangular area of dst_image
 * of width dst_width and height dst_height
 * at position (dst_x,dst_y).
 *
 * If the source and destination coordinates and width and heights
 * differ, appropriate stretching or shrinking of the image fragment
 * will be performed. The coordinates refer to the upper left
 * corner. This function can be used to copy regions within the
 * same image (if dst_image is the same as
 * src_image) but if the regions overlap the
 * results will be unpredictable.
 *
 * @param \GdImage $dst_image Destination image resource.
 * @param \GdImage $src_image Source image resource.
 * @param int $dst_x x-coordinate of destination point.
 * @param int $dst_y y-coordinate of destination point.
 * @param int $src_x x-coordinate of source point.
 * @param int $src_y y-coordinate of source point.
 * @param int $dst_width Destination width.
 * @param int $dst_height Destination height.
 * @param int $src_width Source width.
 * @param int $src_height Source height.
 * @throws ImageException
 *
 */
function imagecopyresized(\GdImage $dst_image, \GdImage $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_width, int $dst_height, int $src_width, int $src_height): void
{
    error_clear_last();
    $safeResult = \imagecopyresized($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_width, $dst_height, $src_width, $src_height);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagecreate returns an image identifier
 * representing a blank image of specified size.
 *
 * In general, we recommend the use of
 * imagecreatetruecolor instead of
 * imagecreate so that image processing occurs on the
 * highest quality image possible. If you want to output a palette image, then
 * imagetruecolortopalette should be called immediately
 * before saving the image with imagepng or
 * imagegif.
 *
 * @param int $width The image width.
 * @param int $height The image height.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreate(int $width, int $height): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreate($width, $height);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromavif returns an image object
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the AVIF raster image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromavif(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromavif($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefrombmp returns an image identifier
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the BMP image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefrombmp(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefrombmp($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Create a new image from GD file or URL.
 *
 * @param string $filename Path to the GD file.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromgd(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromgd($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Create a new image from GD2 file or URL.
 *
 * @param string $filename Path to the GD2 image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromgd2(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromgd2($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Create a new image from a given part of GD2 file or URL.
 *
 * @param string $filename Path to the GD2 image.
 * @param int $x x-coordinate of source point.
 * @param int $y y-coordinate of source point.
 * @param int $width Source width.
 * @param int $height Source height.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromgd2part(string $filename, int $x, int $y, int $width, int $height): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromgd2part($filename, $x, $y, $width, $height);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromgif returns an image identifier
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the GIF image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromgif(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromgif($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromjpeg returns an image identifier
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the JPEG image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromjpeg(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromjpeg($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefrompng returns an image identifier
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the PNG image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefrompng(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefrompng($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromstring returns an image identifier
 * representing the image obtained from the given data.
 * These types will be automatically detected if your build of PHP supports
 * them: JPEG, PNG, GIF, BMP, WBMP, GD2, WEBP and AVIF.
 *
 * @param string $data A string containing the image data.
 * @return \GdImage An image object will be returned on success. FALSE is returned if
 * the image type is unsupported, the data is not in a recognised format,
 * or the image is corrupt and cannot be loaded.
 * @throws ImageException
 *
 */
function imagecreatefromstring(string $data): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromstring($data);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromtga returns an image object
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the Truevision TGA image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromtga(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromtga($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromwbmp returns an image identifier
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the WBMP image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromwbmp(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromwbmp($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromwebp returns an image identifier
 * representing the image obtained from the given filename.
 * Note that animated WebP files cannot be read.
 *
 * @param string $filename Path to the WebP image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromwebp(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromwebp($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromxbm returns an image identifier
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the XBM image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromxbm(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromxbm($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatefromxpm returns an image identifier
 * representing the image obtained from the given filename.
 *
 * @param string $filename Path to the XPM image.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatefromxpm(string $filename): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatefromxpm($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagecreatetruecolor returns an image object
 * representing a black image of the specified size.
 *
 * @param int $width Image width.
 * @param int $height Image height.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagecreatetruecolor(int $width, int $height): \GdImage
{
    error_clear_last();
    $safeResult = \imagecreatetruecolor($width, $height);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Crops an image to the given rectangular area and returns the resulting image.
 * The given image is not modified.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param array $rectangle The cropping rectangle as array with keys
 * x, y, width and
 * height.
 * @return \GdImage Return cropped image object on success.
 * @throws ImageException
 *
 */
function imagecrop(\GdImage $image, array $rectangle): \GdImage
{
    error_clear_last();
    $safeResult = \imagecrop($image, $rectangle);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Automatically crops an image according to the given
 * mode.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $mode One of the following constants:
 * @param float $threshold
 * @param int $color
 * @return \GdImage Returns a cropped image object on success.
 * FALSE is also returned if the whole image was cropped.
 * @throws ImageException
 *
 */
function imagecropauto(\GdImage $image, int $mode = IMG_CROP_DEFAULT, float $threshold = 0.5, int $color = -1): \GdImage
{
    error_clear_last();
    $safeResult = \imagecropauto($image, $mode, $threshold, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * This function is deprecated. Use combination of
 * imagesetstyle and imageline
 * instead.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x1 Upper left x coordinate.
 * @param int $y1 Upper left y coordinate 0, 0 is the top left corner of the image.
 * @param int $x2 Bottom right x coordinate.
 * @param int $y2 Bottom right y coordinate.
 * @param int $color The fill color. A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagedashedline(\GdImage $image, int $x1, int $y1, int $x2, int $y2, int $color): void
{
    error_clear_last();
    $safeResult = \imagedashedline($image, $x1, $y1, $x2, $y2, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Prior to PHP 8.0.0, imagedestroy freed any memory associated
 * with image image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @throws ImageException
 *
 */
function imagedestroy(\GdImage $image): void
{
    error_clear_last();
    $safeResult = \imagedestroy($image);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Draws an ellipse centered at the specified coordinates.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $center_x x-coordinate of the center.
 * @param int $center_y y-coordinate of the center.
 * @param int $width The ellipse width.
 * @param int $height The ellipse height.
 * @param int $color The color of the ellipse. A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imageellipse(\GdImage $image, int $center_x, int $center_y, int $width, int $height, int $color): void
{
    error_clear_last();
    $safeResult = \imageellipse($image, $center_x, $center_y, $width, $height, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Performs a flood fill starting at the given coordinate (top left is 0, 0)
 * with the given color in the
 * image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x x-coordinate of start point.
 * @param int $y y-coordinate of start point.
 * @param int $color The fill color. A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagefill(\GdImage $image, int $x, int $y, int $color): void
{
    error_clear_last();
    $safeResult = \imagefill($image, $x, $y, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Draws a partial arc centered at the specified coordinate in the
 * given image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $center_x x-coordinate of the center.
 * @param int $center_y y-coordinate of the center.
 * @param int $width The arc width.
 * @param int $height The arc height.
 * @param int $start_angle The arc start angle, in degrees.
 * @param int $end_angle The arc end angle, in degrees.
 * 0° is located at the three-o'clock position, and the arc is drawn
 * clockwise.
 * @param int $color A color identifier created with imagecolorallocate.
 * @param int $style A bitwise OR of the following possibilities:
 *
 * IMG_ARC_PIE
 * IMG_ARC_CHORD
 * IMG_ARC_NOFILL
 * IMG_ARC_EDGED
 *
 * IMG_ARC_PIE and IMG_ARC_CHORD are
 * mutually exclusive; IMG_ARC_CHORD just
 * connects the starting and ending angles with a straight line, while
 * IMG_ARC_PIE produces a rounded edge.
 * IMG_ARC_NOFILL indicates that the arc
 * or chord should be outlined, not filled.  IMG_ARC_EDGED,
 * used together with IMG_ARC_NOFILL, indicates that the
 * beginning and ending angles should be connected to the center - this is a
 * good way to outline (rather than fill) a 'pie slice'.
 * @throws ImageException
 *
 */
function imagefilledarc(\GdImage $image, int $center_x, int $center_y, int $width, int $height, int $start_angle, int $end_angle, int $color, int $style): void
{
    error_clear_last();
    $safeResult = \imagefilledarc($image, $center_x, $center_y, $width, $height, $start_angle, $end_angle, $color, $style);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Draws an ellipse centered at the specified coordinate on the given
 * image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $center_x x-coordinate of the center.
 * @param int $center_y y-coordinate of the center.
 * @param int $width The ellipse width.
 * @param int $height The ellipse height.
 * @param int $color The fill color. A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagefilledellipse(\GdImage $image, int $center_x, int $center_y, int $width, int $height, int $color): void
{
    error_clear_last();
    $safeResult = \imagefilledellipse($image, $center_x, $center_y, $width, $height, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Creates a rectangle filled with color in the given
 * image starting at point 1 and ending at point 2.
 * 0, 0 is the top left corner of the image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x1 x-coordinate for point 1.
 * @param int $y1 y-coordinate for point 1.
 * @param int $x2 x-coordinate for point 2.
 * @param int $y2 y-coordinate for point 2.
 * @param int $color The fill color. A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagefilledrectangle(\GdImage $image, int $x1, int $y1, int $x2, int $y2, int $color): void
{
    error_clear_last();
    $safeResult = \imagefilledrectangle($image, $x1, $y1, $x2, $y2, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagefilltoborder performs a flood fill
 * whose border color is defined by border_color.
 * The starting point for the fill is x,
 * y (top left is 0, 0) and the region is
 * filled with color color.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x x-coordinate of start.
 * @param int $y y-coordinate of start.
 * @param int $border_color The border color. A color identifier created with imagecolorallocate.
 * @param int $color The fill color. A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagefilltoborder(\GdImage $image, int $x, int $y, int $border_color, int $color): void
{
    error_clear_last();
    $safeResult = \imagefilltoborder($image, $x, $y, $border_color, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagefilter applies the given filter
 * filter on the image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $filter filter can be one of the following:
 *
 *
 *
 * IMG_FILTER_NEGATE: Reverses all colors of
 * the image.
 *
 *
 *
 *
 * IMG_FILTER_GRAYSCALE: Converts the image into
 * grayscale by changing the red, green and blue components to their
 * weighted sum using the same coefficients as the REC.601 luma (Y')
 * calculation. The alpha components are retained. For palette images the
 * result may differ due to palette limitations.
 *
 *
 *
 *
 * IMG_FILTER_BRIGHTNESS: Changes the brightness
 * of the image. Use args to set the level of
 * brightness. The range for the brightness is -255 to 255.
 *
 *
 *
 *
 * IMG_FILTER_CONTRAST: Changes the contrast of
 * the image. Use args to set the level of
 * contrast.
 *
 *
 *
 *
 * IMG_FILTER_COLORIZE: Like
 * IMG_FILTER_GRAYSCALE, except you can specify the
 * color. Use args, arg2 and
 * arg3 in the form of
 * red, green,
 * blue and arg4 for the
 * alpha channel. The range for each color is 0 to 255.
 *
 *
 *
 *
 * IMG_FILTER_EDGEDETECT: Uses edge detection to
 * highlight the edges in the image.
 *
 *
 *
 *
 * IMG_FILTER_EMBOSS: Embosses the image.
 *
 *
 *
 *
 * IMG_FILTER_GAUSSIAN_BLUR: Blurs the image using
 * the Gaussian method.
 *
 *
 *
 *
 * IMG_FILTER_SELECTIVE_BLUR: Blurs the image.
 *
 *
 *
 *
 * IMG_FILTER_MEAN_REMOVAL: Uses mean removal to
 * achieve a "sketchy" effect.
 *
 *
 *
 *
 * IMG_FILTER_SMOOTH: Makes the image smoother.
 * Use args to set the level of smoothness.
 *
 *
 *
 *
 * IMG_FILTER_PIXELATE: Applies pixelation effect
 * to the image, use args to set the block size
 * and arg2 to set the pixelation effect mode.
 *
 *
 *
 *
 * IMG_FILTER_SCATTER: Applies scatter effect
 * to the image, use args and
 * arg2 to define the effect strength and
 * additionally arg3 to only apply the
 * on select pixel colors.
 *
 *
 *
 * @param int $args
 *
 *
 * IMG_FILTER_BRIGHTNESS: Brightness level.
 *
 *
 *
 *
 * IMG_FILTER_CONTRAST: Contrast level.
 *
 *
 *
 *
 * IMG_FILTER_COLORIZE: Value of red component.
 *
 *
 *
 *
 * IMG_FILTER_SMOOTH: Smoothness level.
 *
 *
 *
 *
 * IMG_FILTER_PIXELATE: Block size in pixels.
 *
 *
 *
 *
 * IMG_FILTER_SCATTER: Effect substraction level.
 * This must not be higher or equal to the addition level set with
 * arg2.
 *
 *
 *
 * @throws ImageException
 *
 */
function imagefilter(\GdImage $image, int $filter, int ...$args): void
{
    error_clear_last();
    if ($args !== []) {
        $safeResult = \imagefilter($image, $filter, ...$args);
    } else {
        $safeResult = \imagefilter($image, $filter);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Flips the image image using the given
 * mode.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $mode Flip mode, this can be one of the IMG_FLIP_* constants:
 *
 *
 *
 *
 *
 * Constant
 * Meaning
 *
 *
 *
 *
 * IMG_FLIP_HORIZONTAL
 *
 * Flips the image horizontally.
 *
 *
 *
 * IMG_FLIP_VERTICAL
 *
 * Flips the image vertically.
 *
 *
 *
 * IMG_FLIP_BOTH
 *
 * Flips the image both horizontally and vertically.
 *
 *
 *
 *
 *
 * @throws ImageException
 *
 */
function imageflip(\GdImage $image, int $mode): void
{
    error_clear_last();
    $safeResult = \imageflip($image, $mode);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * This function calculates and returns the bounding box in pixels
 * for a FreeType text.
 *
 * @param float $size The font size in points.
 * @param float $angle Angle in degrees in which string will be
 * measured.
 * @param string $font_filename The name of the TrueType font file (can be a URL). Depending on
 * which version of the GD library that PHP is using, it may attempt to
 * search for files that do not begin with a leading '/' by appending
 * '.ttf' to the filename and searching along a library-defined font path.
 * @param string $string The string to be measured.
 * @param array $options
 * Possible array indexes for options
 *
 *
 *
 * Key
 * Type
 * Meaning
 *
 *
 *
 *
 * linespacing
 * float
 * Defines drawing linespacing
 *
 *
 *
 *
 * @return array imageftbbox returns an array with 8
 * elements representing four points making the bounding box of the
 * text:
 *
 *
 *
 *
 * 0
 * lower left corner, X position
 *
 *
 * 1
 * lower left corner, Y position
 *
 *
 * 2
 * lower right corner, X position
 *
 *
 * 3
 * lower right corner, Y position
 *
 *
 * 4
 * upper right corner, X position
 *
 *
 * 5
 * upper right corner, Y position
 *
 *
 * 6
 * upper left corner, X position
 *
 *
 * 7
 * upper left corner, Y position
 *
 *
 *
 *
 *
 * The points are relative to the text regardless of the
 * angle, so "upper left" means in the top left-hand
 * corner seeing the text horizontally.
 *
 * On failure, FALSE is returned.
 * @throws ImageException
 *
 */
function imageftbbox(float $size, float $angle, string $font_filename, string $string, array $options = []): array
{
    error_clear_last();
    $safeResult = \imageftbbox($size, $angle, $font_filename, $string, $options);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 *
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param float $size The font size to use in points.
 * @param float $angle The angle in degrees, with 0 degrees being left-to-right reading text.
 * Higher values represent a counter-clockwise rotation. For example, a
 * value of 90 would result in bottom-to-top reading text.
 * @param int $x The coordinates given by x and
 * y will define the basepoint of the first
 * character (roughly the lower-left corner of the character). This
 * is different from the imagestring, where
 * x and y define the
 * upper-left corner of the first character. For example, "top left"
 * is 0, 0.
 * @param int $y The y-ordinate. This sets the position of the fonts baseline, not the
 * very bottom of the character.
 * @param int $color The index of the desired color for the text, see
 * imagecolorexact.
 * @param string $font_filename The path to the TrueType font you wish to use.
 *
 * Depending on which version of the GD library PHP is using, when
 * font_filename does not begin with a leading
 * / then .ttf will be appended
 * to the filename and the library will attempt to search for that
 * filename along a library-defined font path.
 *
 * In many cases where a font resides in the same directory as the script using it
 * the following trick will alleviate any include problems.
 *
 *
 * ]]>
 *
 * @param string $text Text to be inserted into image.
 * @param array $options
 * Possible array indexes for options
 *
 *
 *
 * Key
 * Type
 * Meaning
 *
 *
 *
 *
 * linespacing
 * float
 * Defines drawing linespacing
 *
 *
 *
 *
 * @return array This function returns an array defining the four points of the box, starting in the lower left and moving counter-clockwise:
 *
 *
 *
 *
 * 0
 * lower left x-coordinate
 *
 *
 * 1
 * lower left y-coordinate
 *
 *
 * 2
 * lower right x-coordinate
 *
 *
 * 3
 * lower right y-coordinate
 *
 *
 * 4
 * upper right x-coordinate
 *
 *
 * 5
 * upper right y-coordinate
 *
 *
 * 6
 * upper left x-coordinate
 *
 *
 * 7
 * upper left y-coordinate
 *
 *
 *
 *
 *
 * On failure, FALSE is returned.
 * @throws ImageException
 *
 */
function imagefttext(\GdImage $image, float $size, float $angle, int $x, int $y, int $color, string $font_filename, string $text, array $options = []): array
{
    error_clear_last();
    $safeResult = \imagefttext($image, $size, $angle, $x, $y, $color, $font_filename, $text, $options);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Applies gamma correction to the given gd image
 * given an input and an output gamma.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param float $input_gamma The input gamma.
 * @param float $output_gamma The output gamma.
 * @throws ImageException
 *
 */
function imagegammacorrect(\GdImage $image, float $input_gamma, float $output_gamma): void
{
    error_clear_last();
    $safeResult = \imagegammacorrect($image, $input_gamma, $output_gamma);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Outputs a GD image to the given file.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 * @throws ImageException
 *
 */
function imagegd(\GdImage $image, $file = null): void
{
    error_clear_last();
    if ($file !== null) {
        $safeResult = \imagegd($image, $file);
    } else {
        $safeResult = \imagegd($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Outputs a GD2 image to the given file.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 * @param int $chunk_size Chunk size.
 * @param int $mode Either IMG_GD2_RAW or
 * IMG_GD2_COMPRESSED. Default is
 * IMG_GD2_RAW.
 * @throws ImageException
 *
 */
function imagegd2(\GdImage $image, $file = null, int $chunk_size = 128, int $mode = IMG_GD2_RAW): void
{
    error_clear_last();
    if ($mode !== IMG_GD2_RAW) {
        $safeResult = \imagegd2($image, $file, $chunk_size, $mode);
    } elseif ($chunk_size !== 128) {
        $safeResult = \imagegd2($image, $file, $chunk_size);
    } elseif ($file !== null) {
        $safeResult = \imagegd2($image, $file);
    } else {
        $safeResult = \imagegd2($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagegif creates the GIF
 * file in file from the image image. The
 * image argument is the return from the
 * imagecreate or imagecreatefrom*
 * function.
 *
 * The image format will be GIF87a unless the
 * image has been made transparent with
 * imagecolortransparent, in which case the
 * image format will be GIF89a.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 * @throws ImageException
 *
 */
function imagegif(\GdImage $image, $file = null): void
{
    error_clear_last();
    if ($file !== null) {
        $safeResult = \imagegif($image, $file);
    } else {
        $safeResult = \imagegif($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Grabs a screenshot of the whole screen.
 *
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagegrabscreen(): \GdImage
{
    error_clear_last();
    $safeResult = \imagegrabscreen();
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Grabs a window or its client area using a windows handle (HWND property in COM instance)
 *
 * @param int $handle The HWND window ID.
 * @param bool $client_area Include the client area of the application window.
 * @return \GdImage Returns an image object on success.
 * @throws ImageException
 *
 */
function imagegrabwindow(int $handle, bool $client_area = false): \GdImage
{
    error_clear_last();
    $safeResult = \imagegrabwindow($handle, $client_area);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagejpeg creates a JPEG file from
 * the given image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 * @param int $quality quality is optional, and ranges from 0 (worst
 * quality, smaller file) to 100 (best quality, biggest file). The
 * default (-1) uses the default IJG quality value (about 75).
 * @throws ImageException
 *
 */
function imagejpeg(\GdImage $image, $file = null, int $quality = -1): void
{
    error_clear_last();
    if ($quality !== -1) {
        $safeResult = \imagejpeg($image, $file, $quality);
    } elseif ($file !== null) {
        $safeResult = \imagejpeg($image, $file);
    } else {
        $safeResult = \imagejpeg($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Set the alpha blending flag to use layering effects.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $effect One of the following constants:
 *
 *
 * IMG_EFFECT_REPLACE
 *
 *
 * Use pixel replacement (equivalent of passing TRUE to
 * imagealphablending)
 *
 *
 *
 *
 * IMG_EFFECT_ALPHABLEND
 *
 *
 * Use normal pixel blending (equivalent of passing FALSE to
 * imagealphablending)
 *
 *
 *
 *
 * IMG_EFFECT_NORMAL
 *
 *
 * Same as IMG_EFFECT_ALPHABLEND.
 *
 *
 *
 *
 * IMG_EFFECT_OVERLAY
 *
 *
 * Overlay has the effect that black background pixels will remain
 * black, white background pixels will remain white, but grey
 * background pixels will take the colour of the foreground pixel.
 *
 *
 *
 *
 * IMG_EFFECT_MULTIPLY
 *
 *
 * Overlays with a multiply effect.
 *
 *
 *
 *
 * @throws ImageException
 *
 */
function imagelayereffect(\GdImage $image, int $effect): void
{
    error_clear_last();
    $safeResult = \imagelayereffect($image, $effect);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Draws a line between the two given points.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x1 x-coordinate for first point.
 * @param int $y1 y-coordinate for first point.
 * @param int $x2 x-coordinate for second point.
 * @param int $y2 y-coordinate for second point.
 * @param int $color The line color. A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imageline(\GdImage $image, int $x1, int $y1, int $x2, int $y2, int $color): void
{
    error_clear_last();
    $safeResult = \imageline($image, $x1, $y1, $x2, $y2, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imageloadfont loads a user-defined bitmap and returns
 * its identifier.
 *
 * @param string $filename The font file format is currently binary and architecture
 * dependent.  This means you should generate the font files on the
 * same type of CPU as the machine you are running PHP on.
 *
 *
 * Font file format
 *
 *
 *
 * byte position
 * C data type
 * description
 *
 *
 *
 *
 * byte 0-3
 * int
 * number of characters in the font
 *
 *
 * byte 4-7
 * int
 *
 * value of first character in the font (often 32 for space)
 *
 *
 *
 * byte 8-11
 * int
 * pixel width of each character
 *
 *
 * byte 12-15
 * int
 * pixel height of each character
 *
 *
 * byte 16-
 * char
 *
 * array with character data, one byte per pixel in each
 * character, for a total of (nchars*width*height) bytes.
 *
 *
 *
 *
 *
 * @return int Returns an GdFont instance.
 * @throws ImageException
 *
 */
function imageloadfont(string $filename): int
{
    error_clear_last();
    $safeResult = \imageloadfont($filename);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Outputs or saves a PNG image from the given
 * image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 *
 * NULL is invalid if the quality and
 * filters arguments are not used.
 * @param int $quality Compression level: from 0 (no compression) to 9.
 * The default (-1) uses the zlib compression default.
 * For more information see the zlib manual.
 * @param int $filters Allows reducing the PNG file size. It is a bitmask field which may be
 * set to any combination of the PNG_FILTER_*
 * constants. PNG_NO_FILTER or
 * PNG_ALL_FILTERS may also be used to respectively
 * disable or activate all filters.
 * The default value (-1) disables filtering.
 * @throws ImageException
 *
 */
function imagepng(\GdImage $image, $file = null, int $quality = -1, int $filters = -1): void
{
    error_clear_last();
    if ($filters !== -1) {
        $safeResult = \imagepng($image, $file, $quality, $filters);
    } elseif ($quality !== -1) {
        $safeResult = \imagepng($image, $file, $quality);
    } elseif ($file !== null) {
        $safeResult = \imagepng($image, $file);
    } else {
        $safeResult = \imagepng($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagerectangle creates a rectangle starting at
 * the specified coordinates.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x1 Upper left x coordinate.
 * @param int $y1 Upper left y coordinate
 * 0, 0 is the top left corner of the image.
 * @param int $x2 Bottom right x coordinate.
 * @param int $y2 Bottom right y coordinate.
 * @param int $color A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagerectangle(\GdImage $image, int $x1, int $y1, int $x2, int $y2, int $color): void
{
    error_clear_last();
    $safeResult = \imagerectangle($image, $x1, $y1, $x2, $y2, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imageresolution allows to set and get the resolution of
 * an image in DPI (dots per inch). If the optional parameters are NULL,
 * the current resolution is returned as an indexed array. If only
 * resolution_x is not NULL, the horizontal and vertical resolution
 * are set to this value. If none of the optional parameters are NULL, the horizontal
 * and vertical resolution are set to these values, respectively.
 *
 * The resolution is only used as meta information when images are read from and
 * written to formats supporting this kind of information (curently PNG and
 * JPEG). It does not affect any drawing operations. The default resolution
 * for new images is 96 DPI.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int|null $resolution_x The horizontal resolution in DPI.
 * @param int|null $resolution_y The vertical resolution in DPI.
 * @return mixed When used as getter,
 * it returns an indexed array of the horizontal and vertical resolution on
 * success.
 * When used as setter, it returns
 * TRUE on success.
 * @throws ImageException
 *
 */
function imageresolution(\GdImage $image, ?int $resolution_x = null, ?int $resolution_y = null)
{
    error_clear_last();
    if ($resolution_y !== null) {
        $safeResult = \imageresolution($image, $resolution_x, $resolution_y);
    } elseif ($resolution_x !== null) {
        $safeResult = \imageresolution($image, $resolution_x);
    } else {
        $safeResult = \imageresolution($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Rotates the image image using the given
 * angle in degrees.
 *
 * The center of rotation is the center of the image, and the rotated
 * image may have different dimensions than the original image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param float $angle Rotation angle, in degrees. The rotation angle is interpreted as the
 * number of degrees to rotate the image anticlockwise.
 * @param int $background_color Specifies the color of the uncovered zone after the rotation
 * @return \GdImage Returns an image object for the rotated image.
 * @throws ImageException
 *
 */
function imagerotate(\GdImage $image, float $angle, int $background_color): \GdImage
{
    error_clear_last();
    $safeResult = \imagerotate($image, $angle, $background_color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagesavealpha sets the flag which determines whether to retain
 * full alpha channel information (as opposed to single-color transparency)
 * when saving images.
 * This is only supported for image formats which support full alpha channel information,
 * i.e. PNG, WebP and AVIF.
 *
 *
 * imagesavealpha is only meaningful for PNG
 * images, since the full alpha channel is always saved for WebP
 * and AVIF. It is not recommended to rely on this behavior,
 * as it may change in the future. Thus, imagesavealpha
 * should be called deliberately also for WebP and
 * AVIF images.
 *
 *
 *
 * Alphablending has to be disabled (imagealphablending($im, false))
 * to retain the alpha-channel in the first place.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param bool $enable Whether to save the alpha channel or not. Defaults to FALSE.
 * @throws ImageException
 *
 */
function imagesavealpha(\GdImage $image, bool $enable): void
{
    error_clear_last();
    $safeResult = \imagesavealpha($image, $enable);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagescale scales an image using the given
 * interpolation algorithm.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $width The width to scale the image to.
 * @param int $height The height to scale the image to. If omitted or negative, the aspect
 * ratio will be preserved.
 * @param int $mode One of IMG_NEAREST_NEIGHBOUR,
 * IMG_BILINEAR_FIXED,
 * IMG_BICUBIC,
 * IMG_BICUBIC_FIXED or anything else (will use two
 * pass).
 *
 *
 * IMG_WEIGHTED4 is not yet supported.
 *
 *
 * @return \GdImage Return the scaled image object on success.
 * @throws ImageException
 *
 */
function imagescale(\GdImage $image, int $width, int $height = -1, int $mode = IMG_BILINEAR_FIXED): \GdImage
{
    error_clear_last();
    $safeResult = \imagescale($image, $width, $height, $mode);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagesetbrush sets the brush image to be
 * used by all line drawing functions (such as imageline
 * and imagepolygon) when drawing with the special
 * colors IMG_COLOR_BRUSHED or
 * IMG_COLOR_STYLEDBRUSHED.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param \GdImage $brush An image object.
 * @throws ImageException
 *
 */
function imagesetbrush(\GdImage $image, \GdImage $brush): void
{
    error_clear_last();
    $safeResult = \imagesetbrush($image, $brush);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagesetclip sets the current clipping rectangle, i.e.
 * the area beyond which no pixels will be drawn.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x1 The x-coordinate of the upper left corner.
 * @param int $y1 The y-coordinate of the upper left corner.
 * @param int $x2 The x-coordinate of the lower right corner.
 * @param int $y2 The y-coordinate of the lower right corner.
 * @throws ImageException
 *
 */
function imagesetclip(\GdImage $image, int $x1, int $y1, int $x2, int $y2): void
{
    error_clear_last();
    $safeResult = \imagesetclip($image, $x1, $y1, $x2, $y2);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Sets the interpolation method, setting an interpolation method affects the rendering
 * of various functions in GD, such as the imagerotate function.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $method The interpolation method, which can be one of the following:
 *
 *
 *
 * IMG_BELL: Bell filter.
 *
 *
 *
 *
 * IMG_BESSEL: Bessel filter.
 *
 *
 *
 *
 * IMG_BICUBIC: Bicubic interpolation.
 *
 *
 *
 *
 * IMG_BICUBIC_FIXED: Fixed point implementation of the bicubic interpolation.
 *
 *
 *
 *
 * IMG_BILINEAR_FIXED: Fixed point implementation of the  bilinear interpolation (default (also on image creation)).
 *
 *
 *
 *
 * IMG_BLACKMAN: Blackman window function.
 *
 *
 *
 *
 * IMG_BOX: Box blur filter.
 *
 *
 *
 *
 * IMG_BSPLINE: Spline interpolation.
 *
 *
 *
 *
 * IMG_CATMULLROM: Cubic Hermite spline interpolation.
 *
 *
 *
 *
 * IMG_GAUSSIAN: Gaussian function.
 *
 *
 *
 *
 * IMG_GENERALIZED_CUBIC: Generalized cubic spline fractal interpolation.
 *
 *
 *
 *
 * IMG_HERMITE: Hermite interpolation.
 *
 *
 *
 *
 * IMG_HAMMING: Hamming filter.
 *
 *
 *
 *
 * IMG_HANNING: Hanning filter.
 *
 *
 *
 *
 * IMG_MITCHELL: Mitchell filter.
 *
 *
 *
 *
 * IMG_POWER: Power interpolation.
 *
 *
 *
 *
 * IMG_QUADRATIC: Inverse quadratic interpolation.
 *
 *
 *
 *
 * IMG_SINC: Sinc function.
 *
 *
 *
 *
 * IMG_NEAREST_NEIGHBOUR: Nearest neighbour interpolation.
 *
 *
 *
 *
 * IMG_WEIGHTED4: Weighting filter.
 *
 *
 *
 *
 * IMG_TRIANGLE: Triangle interpolation.
 *
 *
 *
 * @throws ImageException
 *
 */
function imagesetinterpolation(\GdImage $image, int $method = IMG_BILINEAR_FIXED): void
{
    error_clear_last();
    $safeResult = \imagesetinterpolation($image, $method);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagesetpixel draws a pixel at the specified
 * coordinate.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $x x-coordinate.
 * @param int $y y-coordinate.
 * @param int $color A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagesetpixel(\GdImage $image, int $x, int $y, int $color): void
{
    error_clear_last();
    $safeResult = \imagesetpixel($image, $x, $y, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagesetstyle sets the style to be used by all
 * line drawing functions (such as imageline
 * and imagepolygon) when drawing with the special
 * color IMG_COLOR_STYLED or lines of images with color
 * IMG_COLOR_STYLEDBRUSHED.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param array $style An array of pixel colors. You can use the
 * IMG_COLOR_TRANSPARENT constant to add a
 * transparent pixel.
 * Note that style must not be an empty array.
 * @throws ImageException
 *
 */
function imagesetstyle(\GdImage $image, array $style): void
{
    error_clear_last();
    $safeResult = \imagesetstyle($image, $style);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagesetthickness sets the thickness of the lines
 * drawn when drawing rectangles, polygons, arcs etc. to
 * thickness pixels.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $thickness Thickness, in pixels.
 * @throws ImageException
 *
 */
function imagesetthickness(\GdImage $image, int $thickness): void
{
    error_clear_last();
    $safeResult = \imagesetthickness($image, $thickness);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * imagesettile sets the tile image to be
 * used by all region filling functions (such as imagefill
 * and imagefilledpolygon) when filling with the special
 * color IMG_COLOR_TILED.
 *
 * A tile is an image used to fill an area with a repeated pattern. Any
 * GD image can be used as a tile, and by setting the transparent color index of the tile
 * image with imagecolortransparent, a tile allows certain parts
 * of the underlying area to shine through can be created.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param \GdImage $tile The image object to be used as a tile.
 * @throws ImageException
 *
 */
function imagesettile(\GdImage $image, \GdImage $tile): void
{
    error_clear_last();
    $safeResult = \imagesettile($image, $tile);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Draws a string at the given coordinates.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $font Can be 1, 2, 3, 4, 5 for built-in
 * fonts in latin2 encoding (where higher numbers corresponding to larger fonts) or GdFont instance,
 * returned by imageloadfont.
 * @param int $x x-coordinate of the upper left corner.
 * @param int $y y-coordinate of the upper left corner.
 * @param string $string The string to be written.
 * @param int $color A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagestring(\GdImage $image, int $font, int $x, int $y, string $string, int $color): void
{
    error_clear_last();
    $safeResult = \imagestring($image, $font, $x, $y, $string, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Draws a string vertically at the given
 * coordinates.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param int $font Can be 1, 2, 3, 4, 5 for built-in
 * fonts in latin2 encoding (where higher numbers corresponding to larger fonts) or GdFont instance,
 * returned by imageloadfont.
 * @param int $x x-coordinate of the bottom left corner.
 * @param int $y y-coordinate of the bottom left corner.
 * @param string $string The string to be written.
 * @param int $color A color identifier created with imagecolorallocate.
 * @throws ImageException
 *
 */
function imagestringup(\GdImage $image, int $font, int $x, int $y, string $string, int $color): void
{
    error_clear_last();
    $safeResult = \imagestringup($image, $font, $x, $y, $string, $color);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Returns the width of the given image object.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @return int Return the width of the image.
 *
 */
function imagesx(\GdImage $image): int
{
    error_clear_last();
    $safeResult = \imagesx($image);
    return $safeResult;
}


/**
 * Returns the height of the given image object.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @return int Return the height of the image.
 *
 */
function imagesy(\GdImage $image): int
{
    error_clear_last();
    $safeResult = \imagesy($image);
    return $safeResult;
}


/**
 * imagetruecolortopalette converts a truecolor image
 * to a palette image. The code for this function was originally drawn from
 * the Independent JPEG Group library code, which is excellent. The code
 * has been modified to preserve as much alpha channel information as
 * possible in the resulting palette, in addition to preserving colors as
 * well as possible. This does not work as well as might be hoped. It is
 * usually best to simply produce a truecolor output image instead, which
 * guarantees the highest output quality.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param bool $dither Indicates if the image should be dithered - if it is TRUE then
 * dithering will be used which will result in a more speckled image but
 * with better color approximation.
 * @param int $num_colors Sets the maximum number of colors that should be retained in the palette.
 * @throws ImageException
 *
 */
function imagetruecolortopalette(\GdImage $image, bool $dither, int $num_colors): void
{
    error_clear_last();
    $safeResult = \imagetruecolortopalette($image, $dither, $num_colors);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * This function calculates and returns the bounding box in pixels
 * for a TrueType text.
 *
 * @param float $size The font size in points.
 * @param float $angle Angle in degrees in which string will be measured.
 * @param string $font_filename The path to the TrueType font you wish to use.
 *
 * Depending on which version of the GD library PHP is using, when
 * fontfile does not begin with a leading
 * / then .ttf will be appended
 * to the filename and the library will attempt to search for that
 * filename along a library-defined font path.
 *
 * When using versions of the GD library lower than 2.0.18, a space character,
 * rather than a semicolon, was used as the 'path separator' for different font files.
 * Unintentional use of this feature will result in the warning message:
 * Warning: Could not find/open font. For these affected versions, the
 * only solution is moving the font to a path which does not contain spaces.
 *
 * In many cases where a font resides in the same directory as the script using it
 * the following trick will alleviate any include problems.
 *
 *
 * ]]>
 *
 *
 * Note that open_basedir does
 * not apply to fontfile.
 * @param string $string The string to be measured.
 * @param array $options
 * @return array imagettfbbox returns an array with 8
 * elements representing four points making the bounding box of the
 * text on success and FALSE on error.
 *
 *
 *
 *
 * key
 * contents
 *
 *
 *
 *
 * 0
 * lower left corner, X position
 *
 *
 * 1
 * lower left corner, Y position
 *
 *
 * 2
 * lower right corner, X position
 *
 *
 * 3
 * lower right corner, Y position
 *
 *
 * 4
 * upper right corner, X position
 *
 *
 * 5
 * upper right corner, Y position
 *
 *
 * 6
 * upper left corner, X position
 *
 *
 * 7
 * upper left corner, Y position
 *
 *
 *
 *
 *
 * The points are relative to the text regardless of the
 * angle, so "upper left" means in the top left-hand
 * corner seeing the text horizontally.
 * @throws ImageException
 *
 */
function imagettfbbox(float $size, float $angle, string $font_filename, string $string, array $options = []): array
{
    error_clear_last();
    $safeResult = \imagettfbbox($size, $angle, $font_filename, $string, $options);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Writes the given text into the image using TrueType
 * fonts.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param float $size The font size in points.
 * @param float $angle The angle in degrees, with 0 degrees being left-to-right reading text.
 * Higher values represent a counter-clockwise rotation. For example, a
 * value of 90 would result in bottom-to-top reading text.
 * @param int $x The coordinates given by x and
 * y will define the basepoint of the first
 * character (roughly the lower-left corner of the character). This
 * is different from the imagestring, where
 * x and y define the
 * upper-left corner of the first character. For example, "top left"
 * is 0, 0.
 * @param int $y The y-ordinate. This sets the position of the fonts baseline, not the
 * very bottom of the character.
 * @param int $color The color index. Using the negative of a color index has the effect of
 * turning off antialiasing. See imagecolorallocate.
 * @param string $font_filename The path to the TrueType font you wish to use.
 *
 * Depending on which version of the GD library PHP is using, when
 * fontfile does not begin with a leading
 * / then .ttf will be appended
 * to the filename and the library will attempt to search for that
 * filename along a library-defined font path.
 *
 * When using versions of the GD library lower than 2.0.18, a space character,
 * rather than a semicolon, was used as the 'path separator' for different font files.
 * Unintentional use of this feature will result in the warning message:
 * Warning: Could not find/open font. For these affected versions, the
 * only solution is moving the font to a path which does not contain spaces.
 *
 * In many cases where a font resides in the same directory as the script using it
 * the following trick will alleviate any include problems.
 *
 *
 * ]]>
 *
 *
 * Note that open_basedir does
 * not apply to fontfile.
 * @param string $text The text string in UTF-8 encoding.
 *
 * May include decimal numeric character references (of the form:
 * &amp;#8364;) to access characters in a font beyond position 127.
 * The hexadecimal format (like &amp;#xA9;) is supported.
 * Strings in UTF-8 encoding can be passed directly.
 *
 * Named entities, such as &amp;copy;, are not supported. Consider using
 * html_entity_decode
 * to decode these named entities into UTF-8 strings.
 *
 * If a character is used in the string which is not supported by the
 * font, a hollow rectangle will replace the character.
 * @param array $options
 * @return array Returns an array with 8 elements representing four points making the
 * bounding box of the text. The order of the points is lower left, lower
 * right, upper right, upper left. The points are relative to the text
 * regardless of the angle, so "upper left" means in the top left-hand
 * corner when you see the text horizontally.
 * @throws ImageException
 *
 */
function imagettftext(\GdImage $image, float $size, float $angle, int $x, int $y, int $color, string $font_filename, string $text, array $options = []): array
{
    error_clear_last();
    $safeResult = \imagettftext($image, $size, $angle, $x, $y, $color, $font_filename, $text, $options);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * imagewbmp outputs or save a WBMP
 * version of the given image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 * @param int|null $foreground_color You can set the foreground color with this parameter by setting an
 * identifier obtained from imagecolorallocate.
 * The default foreground color is black.
 * @throws ImageException
 *
 */
function imagewbmp(\GdImage $image, $file = null, ?int $foreground_color = null): void
{
    error_clear_last();
    if ($foreground_color !== null) {
        $safeResult = \imagewbmp($image, $file, $foreground_color);
    } elseif ($file !== null) {
        $safeResult = \imagewbmp($image, $file);
    } else {
        $safeResult = \imagewbmp($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Outputs or saves a WebP version of the given image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $file The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or NULL, the raw image stream will be output directly.
 * @param int $quality quality ranges from 0 (worst
 * quality, smaller file) to 100 (best quality, biggest file).
 * @throws ImageException
 *
 */
function imagewebp(\GdImage $image, $file = null, int $quality = -1): void
{
    error_clear_last();
    if ($quality !== -1) {
        $safeResult = \imagewebp($image, $file, $quality);
    } elseif ($file !== null) {
        $safeResult = \imagewebp($image, $file);
    } else {
        $safeResult = \imagewebp($image);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Outputs or save an XBM version of the given
 * image.
 *
 * @param \GdImage $image A GdImage object, returned by one of the image creation functions,
 * such as imagecreatetruecolor.
 * @param null|resource|string $filename The path to save the file to, given as string. If NULL, the raw image stream will be output directly.
 *
 * The filename (without the .xbm extension) is also
 * used for the C identifiers of the XBM, whereby non
 * alphanumeric characters of the current locale are substituted by
 * underscores. If filename is set to NULL,
 * image is used to build the C identifiers.
 * @param int|null $foreground_color You can set the foreground color with this parameter by setting an
 * identifier obtained from imagecolorallocate.
 * The default foreground color is black. All other colors are treated as
 * background.
 * @throws ImageException
 *
 */
function imagexbm(\GdImage $image, $filename, ?int $foreground_color = null): void
{
    error_clear_last();
    if ($foreground_color !== null) {
        $safeResult = \imagexbm($image, $filename, $foreground_color);
    } else {
        $safeResult = \imagexbm($image, $filename);
    }
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
}


/**
 * Embeds binary IPTC data into a JPEG image.
 *
 * @param string $iptc_data The data to be written.
 * @param string $filename Path to the JPEG image.
 * @param int $spool Spool flag. If the spool flag is less than 2 then the JPEG will be
 * returned as a string. Otherwise the JPEG will be printed to STDOUT.
 * @return bool|string If spool is less than 2, the JPEG will be returned. Otherwise returns TRUE on success.
 * @throws ImageException
 *
 */
function iptcembed(string $iptc_data, string $filename, int $spool = 0)
{
    error_clear_last();
    $safeResult = \iptcembed($iptc_data, $filename, $spool);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Parses an IPTC block into its single tags.
 *
 * @param string $iptc_block A binary IPTC block.
 * @return array Returns an array using the tagmarker as an index and the value as the
 * value. It returns FALSE on error or if no IPTC data was found.
 * @throws ImageException
 *
 */
function iptcparse(string $iptc_block): array
{
    error_clear_last();
    $safeResult = \iptcparse($iptc_block);
    if ($safeResult === false) {
        throw ImageException::createFromPhpError();
    }
    return $safeResult;
}
