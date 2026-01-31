<?php

namespace Safe;

use Safe\Exceptions\ImageException;

/**
 * @param string $filename
 * @param array|null $image_info
 * @return array{0: 0|positive-int, 1: 0|positive-int, 2: int, 3: string, mime: string, channels: int, bits: int}|null
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
 * @param int $image_type
 * @param bool $include_dot
 * @return string
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
 * @param \GdImage $image
 * @param array $affine
 * @param array|null $clip
 * @return \GdImage
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
 * @param array $matrix1
 * @param array $matrix2
 * @return array{0:float,1:float,2:float,3:float,4:float,5:float}
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
 * @param int $type
 * @param array|float $options
 * @return array{0:float,1:float,2:float,3:float,4:float,5:float}
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
 * @param \GdImage $image
 * @param bool $enable
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
 * @param \GdImage $image
 * @param bool $enable
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
 * @param \GdImage $image
 * @param int $center_x
 * @param int $center_y
 * @param int $width
 * @param int $height
 * @param int $start_angle
 * @param int $end_angle
 * @param int $color
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
 * @param \GdImage $image
 * @param null|resource|string $file
 * @param int $quality
 * @param int $speed
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
 * @param \GdImage $image
 * @param null|resource|string $file
 * @param bool $compressed
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
 * @param \GdImage $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $char
 * @param int $color
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
 * @param \GdImage $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $char
 * @param int $color
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
 * @param \GdImage $image
 * @param int $x
 * @param int $y
 * @return int
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
 * @param \GdImage $image
 * @param int $color
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
 * @param \GdImage $image1
 * @param \GdImage $image2
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
 * @param \GdImage $image
 * @param int $color
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $alpha
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
 * @param \GdImage $image
 * @param int $color
 * @return array{red: int, green: int, blue: int, alpha: int}
 *
 */
function imagecolorsforindex(\GdImage $image, int $color): array
{
    error_clear_last();
    $safeResult = \imagecolorsforindex($image, $color);
    return $safeResult;
}


/**
 * @param \GdImage $image
 * @param array $matrix
 * @param float $divisor
 * @param float $offset
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
 * @param \GdImage $dst_image
 * @param \GdImage $src_image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $src_width
 * @param int $src_height
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
 * @param \GdImage $dst_image
 * @param \GdImage $src_image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $src_width
 * @param int $src_height
 * @param int $pct
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
 * @param \GdImage $dst_image
 * @param \GdImage $src_image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $src_width
 * @param int $src_height
 * @param int $pct
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
 * @param \GdImage $dst_image
 * @param \GdImage $src_image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $dst_width
 * @param int $dst_height
 * @param int $src_width
 * @param int $src_height
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
 * @param \GdImage $dst_image
 * @param \GdImage $src_image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $src_x
 * @param int $src_y
 * @param int $dst_width
 * @param int $dst_height
 * @param int $src_width
 * @param int $src_height
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
 * @param int $width
 * @param int $height
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @param int $x
 * @param int $y
 * @param int $width
 * @param int $height
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $data
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param string $filename
 * @return \GdImage
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
 * @param int $width
 * @param int $height
 * @return \GdImage
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
 * @param \GdImage $image
 * @param array $rectangle
 * @return \GdImage
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
 * @param \GdImage $image
 * @param int $mode
 * @param float $threshold
 * @param int $color
 * @return \GdImage
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
 * @param \GdImage $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
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
 * @param \GdImage $image
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
 * @param \GdImage $image
 * @param int $center_x
 * @param int $center_y
 * @param int $width
 * @param int $height
 * @param int $color
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
 * @param \GdImage $image
 * @param int $x
 * @param int $y
 * @param int $color
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
 * @param \GdImage $image
 * @param int $center_x
 * @param int $center_y
 * @param int $width
 * @param int $height
 * @param int $start_angle
 * @param int $end_angle
 * @param int $color
 * @param int $style
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
 * @param \GdImage $image
 * @param int $center_x
 * @param int $center_y
 * @param int $width
 * @param int $height
 * @param int $color
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
 * @param \GdImage $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
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
 * @param \GdImage $image
 * @param int $x
 * @param int $y
 * @param int $border_color
 * @param int $color
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
 * @param \GdImage $image
 * @param int $filter
 * @param int $args
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
 * @param \GdImage $image
 * @param int $mode
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
 * @param float $size
 * @param float $angle
 * @param string $font_filename
 * @param string $string
 * @param array $options
 * @return array
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
 * @param \GdImage $image
 * @param float $size
 * @param float $angle
 * @param int $x
 * @param int $y
 * @param int $color
 * @param string $font_filename
 * @param string $text
 * @param array $options
 * @return array
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
 * @param \GdImage $image
 * @param float $input_gamma
 * @param float $output_gamma
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
 * @param \GdImage $image
 * @param null|resource|string $file
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
 * @param \GdImage $image
 * @param null|resource|string $file
 * @param int $chunk_size
 * @param int $mode
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
 * @param \GdImage $image
 * @param null|resource|string $file
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
 * @return \GdImage
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
 * @param int $handle
 * @param bool $client_area
 * @return \GdImage
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
 * @param \GdImage $image
 * @param null|resource|string $file
 * @param int $quality
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
 * @param \GdImage $image
 * @param int $effect
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
 * @param \GdImage $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
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
 * @param string $filename
 * @return int
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
 * @param \GdImage $image
 * @param null|resource|string $file
 * @param int $quality
 * @param int $filters
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
 * @param \GdImage $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
 * @param int $color
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
 * @param \GdImage $image
 * @param int|null $resolution_x
 * @param int|null $resolution_y
 * @return mixed
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
 * @param \GdImage $image
 * @param float $angle
 * @param int $background_color
 * @return \GdImage
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
 * @param \GdImage $image
 * @param bool $enable
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
 * @param \GdImage $image
 * @param int $width
 * @param int $height
 * @param int $mode
 * @return \GdImage
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
 * @param \GdImage $image
 * @param \GdImage $brush
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
 * @param \GdImage $image
 * @param int $x1
 * @param int $y1
 * @param int $x2
 * @param int $y2
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
 * @param \GdImage $image
 * @param int $method
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
 * @param \GdImage $image
 * @param int $x
 * @param int $y
 * @param int $color
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
 * @param \GdImage $image
 * @param array $style
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
 * @param \GdImage $image
 * @param int $thickness
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
 * @param \GdImage $image
 * @param \GdImage $tile
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
 * @param \GdImage $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $string
 * @param int $color
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
 * @param \GdImage $image
 * @param int $font
 * @param int $x
 * @param int $y
 * @param string $string
 * @param int $color
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
 * @param \GdImage $image
 * @return int
 *
 */
function imagesx(\GdImage $image): int
{
    error_clear_last();
    $safeResult = \imagesx($image);
    return $safeResult;
}


/**
 * @param \GdImage $image
 * @return int
 *
 */
function imagesy(\GdImage $image): int
{
    error_clear_last();
    $safeResult = \imagesy($image);
    return $safeResult;
}


/**
 * @param \GdImage $image
 * @param bool $dither
 * @param int $num_colors
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
 * @param float $size
 * @param float $angle
 * @param string $font_filename
 * @param string $string
 * @param array $options
 * @return array
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
 * @param \GdImage $image
 * @param float $size
 * @param float $angle
 * @param int $x
 * @param int $y
 * @param int $color
 * @param string $font_filename
 * @param string $text
 * @param array $options
 * @return array
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
 * @param \GdImage $image
 * @param null|resource|string $file
 * @param int|null $foreground_color
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
 * @param \GdImage $image
 * @param null|resource|string $file
 * @param int $quality
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
 * @param \GdImage $image
 * @param null|resource|string $filename
 * @param int|null $foreground_color
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
 * @param string $iptc_data
 * @param string $filename
 * @param int $spool
 * @return bool|string
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
 * @param string $iptc_block
 * @return array
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
