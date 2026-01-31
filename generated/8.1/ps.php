<?php

namespace Safe;

use Safe\Exceptions\PsException;

/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $filename
 * @throws PsException
 *
 */
function ps_add_launchlink($psdoc, float $llx, float $lly, float $urx, float $ury, string $filename): void
{
    error_clear_last();
    $safeResult = \ps_add_launchlink($psdoc, $llx, $lly, $urx, $ury, $filename);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param int $page
 * @param string $dest
 * @throws PsException
 *
 */
function ps_add_locallink($psdoc, float $llx, float $lly, float $urx, float $ury, int $page, string $dest): void
{
    error_clear_last();
    $safeResult = \ps_add_locallink($psdoc, $llx, $lly, $urx, $ury, $page, $dest);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $contents
 * @param string $title
 * @param string $icon
 * @param int $open
 * @throws PsException
 *
 */
function ps_add_note($psdoc, float $llx, float $lly, float $urx, float $ury, string $contents, string $title, string $icon, int $open): void
{
    error_clear_last();
    $safeResult = \ps_add_note($psdoc, $llx, $lly, $urx, $ury, $contents, $title, $icon, $open);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $filename
 * @param int $page
 * @param string $dest
 * @throws PsException
 *
 */
function ps_add_pdflink($psdoc, float $llx, float $lly, float $urx, float $ury, string $filename, int $page, string $dest): void
{
    error_clear_last();
    $safeResult = \ps_add_pdflink($psdoc, $llx, $lly, $urx, $ury, $filename, $page, $dest);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $llx
 * @param float $lly
 * @param float $urx
 * @param float $ury
 * @param string $url
 * @throws PsException
 *
 */
function ps_add_weblink($psdoc, float $llx, float $lly, float $urx, float $ury, string $url): void
{
    error_clear_last();
    $safeResult = \ps_add_weblink($psdoc, $llx, $lly, $urx, $ury, $url);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $radius
 * @param float $alpha
 * @param float $beta
 * @throws PsException
 *
 */
function ps_arc($psdoc, float $x, float $y, float $radius, float $alpha, float $beta): void
{
    error_clear_last();
    $safeResult = \ps_arc($psdoc, $x, $y, $radius, $alpha, $beta);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $radius
 * @param float $alpha
 * @param float $beta
 * @throws PsException
 *
 */
function ps_arcn($psdoc, float $x, float $y, float $radius, float $alpha, float $beta): void
{
    error_clear_last();
    $safeResult = \ps_arcn($psdoc, $x, $y, $radius, $alpha, $beta);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $width
 * @param float $height
 * @throws PsException
 *
 */
function ps_begin_page($psdoc, float $width, float $height): void
{
    error_clear_last();
    $safeResult = \ps_begin_page($psdoc, $width, $height);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $width
 * @param float $height
 * @param float $xstep
 * @param float $ystep
 * @param int $painttype
 * @return int
 * @throws PsException
 *
 */
function ps_begin_pattern($psdoc, float $width, float $height, float $xstep, float $ystep, int $painttype): int
{
    error_clear_last();
    $safeResult = \ps_begin_pattern($psdoc, $width, $height, $xstep, $ystep, $painttype);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $psdoc
 * @param float $width
 * @param float $height
 * @return int
 * @throws PsException
 *
 */
function ps_begin_template($psdoc, float $width, float $height): int
{
    error_clear_last();
    $safeResult = \ps_begin_template($psdoc, $width, $height);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $radius
 * @throws PsException
 *
 */
function ps_circle($psdoc, float $x, float $y, float $radius): void
{
    error_clear_last();
    $safeResult = \ps_circle($psdoc, $x, $y, $radius);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_clip($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_clip($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $imageid
 * @throws PsException
 *
 */
function ps_close_image($psdoc, int $imageid): void
{
    error_clear_last();
    $safeResult = \ps_close_image($psdoc, $imageid);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_close($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_close($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_closepath_stroke($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_closepath_stroke($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_closepath($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_closepath($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $text
 * @throws PsException
 *
 */
function ps_continue_text($psdoc, string $text): void
{
    error_clear_last();
    $safeResult = \ps_continue_text($psdoc, $text);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x1
 * @param float $y1
 * @param float $x2
 * @param float $y2
 * @param float $x3
 * @param float $y3
 * @throws PsException
 *
 */
function ps_curveto($psdoc, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3): void
{
    error_clear_last();
    $safeResult = \ps_curveto($psdoc, $x1, $y1, $x2, $y2, $x3, $y3);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_delete($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_delete($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_end_page($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_end_page($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_end_pattern($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_end_pattern($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_end_template($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_end_template($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_fill_stroke($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_fill_stroke($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_fill($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_fill($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $name
 * @param float $modifier
 * @return string
 * @throws PsException
 *
 */
function ps_get_parameter($psdoc, string $name, ?float $modifier = null): string
{
    error_clear_last();
    if ($modifier !== null) {
        $safeResult = \ps_get_parameter($psdoc, $name, $modifier);
    } else {
        $safeResult = \ps_get_parameter($psdoc, $name);
    }
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $psdoc
 * @param string $text
 * @return array
 * @throws PsException
 *
 */
function ps_hyphenate($psdoc, string $text): array
{
    error_clear_last();
    $safeResult = \ps_hyphenate($psdoc, $text);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $psdoc
 * @param string $file
 * @throws PsException
 *
 */
function ps_include_file($psdoc, string $file): void
{
    error_clear_last();
    $safeResult = \ps_include_file($psdoc, $file);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @throws PsException
 *
 */
function ps_lineto($psdoc, float $x, float $y): void
{
    error_clear_last();
    $safeResult = \ps_lineto($psdoc, $x, $y);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @throws PsException
 *
 */
function ps_moveto($psdoc, float $x, float $y): void
{
    error_clear_last();
    $safeResult = \ps_moveto($psdoc, $x, $y);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @return resource
 * @throws PsException
 *
 */
function ps_new()
{
    error_clear_last();
    $safeResult = \ps_new();
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $psdoc
 * @param string $filename
 * @throws PsException
 *
 */
function ps_open_file($psdoc, ?string $filename = null): void
{
    error_clear_last();
    if ($filename !== null) {
        $safeResult = \ps_open_file($psdoc, $filename);
    } else {
        $safeResult = \ps_open_file($psdoc);
    }
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $imageid
 * @param float $x
 * @param float $y
 * @param float $scale
 * @throws PsException
 *
 */
function ps_place_image($psdoc, int $imageid, float $x, float $y, float $scale): void
{
    error_clear_last();
    $safeResult = \ps_place_image($psdoc, $imageid, $x, $y, $scale);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @param float $width
 * @param float $height
 * @throws PsException
 *
 */
function ps_rect($psdoc, float $x, float $y, float $width, float $height): void
{
    error_clear_last();
    $safeResult = \ps_rect($psdoc, $x, $y, $width, $height);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_restore($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_restore($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $rot
 * @throws PsException
 *
 */
function ps_rotate($psdoc, float $rot): void
{
    error_clear_last();
    $safeResult = \ps_rotate($psdoc, $rot);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_save($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_save($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @throws PsException
 *
 */
function ps_scale($psdoc, float $x, float $y): void
{
    error_clear_last();
    $safeResult = \ps_scale($psdoc, $x, $y);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $red
 * @param float $green
 * @param float $blue
 * @throws PsException
 *
 */
function ps_set_border_color($psdoc, float $red, float $green, float $blue): void
{
    error_clear_last();
    $safeResult = \ps_set_border_color($psdoc, $red, $green, $blue);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $black
 * @param float $white
 * @throws PsException
 *
 */
function ps_set_border_dash($psdoc, float $black, float $white): void
{
    error_clear_last();
    $safeResult = \ps_set_border_dash($psdoc, $black, $white);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $style
 * @param float $width
 * @throws PsException
 *
 */
function ps_set_border_style($psdoc, string $style, float $width): void
{
    error_clear_last();
    $safeResult = \ps_set_border_style($psdoc, $style, $width);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $p
 * @param string $key
 * @param string $val
 * @throws PsException
 *
 */
function ps_set_info($p, string $key, string $val): void
{
    error_clear_last();
    $safeResult = \ps_set_info($p, $key, $val);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $name
 * @param string $value
 * @throws PsException
 *
 */
function ps_set_parameter($psdoc, string $name, string $value): void
{
    error_clear_last();
    $safeResult = \ps_set_parameter($psdoc, $name, $value);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @throws PsException
 *
 */
function ps_set_text_pos($psdoc, float $x, float $y): void
{
    error_clear_last();
    $safeResult = \ps_set_text_pos($psdoc, $x, $y);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $name
 * @param float $value
 * @throws PsException
 *
 */
function ps_set_value($psdoc, string $name, float $value): void
{
    error_clear_last();
    $safeResult = \ps_set_value($psdoc, $name, $value);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $type
 * @param string $colorspace
 * @param float $c1
 * @param float $c2
 * @param float $c3
 * @param float $c4
 * @throws PsException
 *
 */
function ps_setcolor($psdoc, string $type, string $colorspace, float $c1, float $c2, float $c3, float $c4): void
{
    error_clear_last();
    $safeResult = \ps_setcolor($psdoc, $type, $colorspace, $c1, $c2, $c3, $c4);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $on
 * @param float $off
 * @throws PsException
 *
 */
function ps_setdash($psdoc, float $on, float $off): void
{
    error_clear_last();
    $safeResult = \ps_setdash($psdoc, $on, $off);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $value
 * @throws PsException
 *
 */
function ps_setflat($psdoc, float $value): void
{
    error_clear_last();
    $safeResult = \ps_setflat($psdoc, $value);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $fontid
 * @param float $size
 * @throws PsException
 *
 */
function ps_setfont($psdoc, int $fontid, float $size): void
{
    error_clear_last();
    $safeResult = \ps_setfont($psdoc, $fontid, $size);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $gray
 * @throws PsException
 *
 */
function ps_setgray($psdoc, float $gray): void
{
    error_clear_last();
    $safeResult = \ps_setgray($psdoc, $gray);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $type
 * @throws PsException
 *
 */
function ps_setlinecap($psdoc, int $type): void
{
    error_clear_last();
    $safeResult = \ps_setlinecap($psdoc, $type);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $type
 * @throws PsException
 *
 */
function ps_setlinejoin($psdoc, int $type): void
{
    error_clear_last();
    $safeResult = \ps_setlinejoin($psdoc, $type);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $width
 * @throws PsException
 *
 */
function ps_setlinewidth($psdoc, float $width): void
{
    error_clear_last();
    $safeResult = \ps_setlinewidth($psdoc, $width);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $value
 * @throws PsException
 *
 */
function ps_setmiterlimit($psdoc, float $value): void
{
    error_clear_last();
    $safeResult = \ps_setmiterlimit($psdoc, $value);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $mode
 * @throws PsException
 *
 */
function ps_setoverprintmode($psdoc, int $mode): void
{
    error_clear_last();
    $safeResult = \ps_setoverprintmode($psdoc, $mode);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $arr
 * @throws PsException
 *
 */
function ps_setpolydash($psdoc, float $arr): void
{
    error_clear_last();
    $safeResult = \ps_setpolydash($psdoc, $arr);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $shadingid
 * @param string $optlist
 * @return int
 * @throws PsException
 *
 */
function ps_shading_pattern($psdoc, int $shadingid, string $optlist): int
{
    error_clear_last();
    $safeResult = \ps_shading_pattern($psdoc, $shadingid, $optlist);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $psdoc
 * @param string $type
 * @param float $x0
 * @param float $y0
 * @param float $x1
 * @param float $y1
 * @param float $c1
 * @param float $c2
 * @param float $c3
 * @param float $c4
 * @param string $optlist
 * @return int
 * @throws PsException
 *
 */
function ps_shading($psdoc, string $type, float $x0, float $y0, float $x1, float $y1, float $c1, float $c2, float $c3, float $c4, string $optlist): int
{
    error_clear_last();
    $safeResult = \ps_shading($psdoc, $type, $x0, $y0, $x1, $y1, $c1, $c2, $c3, $c4, $optlist);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * @param resource $psdoc
 * @param int $shadingid
 * @throws PsException
 *
 */
function ps_shfill($psdoc, int $shadingid): void
{
    error_clear_last();
    $safeResult = \ps_shfill($psdoc, $shadingid);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $text
 * @param float $x
 * @param float $y
 * @throws PsException
 *
 */
function ps_show_xy($psdoc, string $text, float $x, float $y): void
{
    error_clear_last();
    $safeResult = \ps_show_xy($psdoc, $text, $x, $y);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $text
 * @param int $len
 * @param float $xcoor
 * @param float $ycoor
 * @throws PsException
 *
 */
function ps_show_xy2($psdoc, string $text, int $len, float $xcoor, float $ycoor): void
{
    error_clear_last();
    $safeResult = \ps_show_xy2($psdoc, $text, $len, $xcoor, $ycoor);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $text
 * @throws PsException
 *
 */
function ps_show($psdoc, string $text): void
{
    error_clear_last();
    $safeResult = \ps_show($psdoc, $text);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param string $text
 * @param int $len
 * @throws PsException
 *
 */
function ps_show2($psdoc, string $text, int $len): void
{
    error_clear_last();
    $safeResult = \ps_show2($psdoc, $text, $len);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @throws PsException
 *
 */
function ps_stroke($psdoc): void
{
    error_clear_last();
    $safeResult = \ps_stroke($psdoc);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param int $ord
 * @throws PsException
 *
 */
function ps_symbol($psdoc, int $ord): void
{
    error_clear_last();
    $safeResult = \ps_symbol($psdoc, $ord);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}


/**
 * @param resource $psdoc
 * @param float $x
 * @param float $y
 * @throws PsException
 *
 */
function ps_translate($psdoc, float $x, float $y): void
{
    error_clear_last();
    $safeResult = \ps_translate($psdoc, $x, $y);
    if ($safeResult === false) {
        throw PsException::createFromPhpError();
    }
}
