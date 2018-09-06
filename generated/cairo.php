<?php

namespace Safe;

/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @return CairoContext What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_create(CairoSurface $surface): CairoContext
{
    error_clear_last();
    $result = \cairo_create($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @return CairoFontOptions What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_create(): CairoFontOptions
{
    error_clear_last();
    $result = \cairo_font_options_create();
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @param cairofontoptions $other Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_equal(CairoFontOptions $options, CairoFontOptions $other): void
{
    error_clear_last();
    $result = \cairo_font_options_equal($options, $other);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_get_antialias(CairoFontOptions $options): int
{
    error_clear_last();
    $result = \cairo_font_options_get_antialias($options);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_get_hint_metrics(CairoFontOptions $options): int
{
    error_clear_last();
    $result = \cairo_font_options_get_hint_metrics($options);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_get_hint_style(CairoFontOptions $options): int
{
    error_clear_last();
    $result = \cairo_font_options_get_hint_style($options);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_get_subpixel_order(CairoFontOptions $options): int
{
    error_clear_last();
    $result = \cairo_font_options_get_subpixel_order($options);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_hash(CairoFontOptions $options): int
{
    error_clear_last();
    $result = \cairo_font_options_hash($options);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @param cairofontoptions $other Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_merge(CairoFontOptions $options, CairoFontOptions $other): void
{
    error_clear_last();
    $result = \cairo_font_options_merge($options, $other);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @param int $antialias Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_set_antialias(CairoFontOptions $options, int $antialias): void
{
    error_clear_last();
    $result = \cairo_font_options_set_antialias($options, $antialias);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @param int $hint_metrics Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_set_hint_metrics(CairoFontOptions $options, int $hint_metrics): void
{
    error_clear_last();
    $result = \cairo_font_options_set_hint_metrics($options, $hint_metrics);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @param int $hint_style Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_set_hint_style(CairoFontOptions $options, int $hint_style): void
{
    error_clear_last();
    $result = \cairo_font_options_set_hint_style($options, $hint_style);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @param int $subpixel_order Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_set_subpixel_order(CairoFontOptions $options, int $subpixel_order): void
{
    error_clear_last();
    $result = \cairo_font_options_set_subpixel_order($options, $subpixel_order);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairofontoptions $options Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_font_options_status(CairoFontOptions $options): int
{
    error_clear_last();
    $result = \cairo_font_options_status($options);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param int $format Description...
 * @param int $width Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_format_stride_for_width(int $format, int $width): int
{
    error_clear_last();
    $result = \cairo_format_stride_for_width($format, $width);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param string $data Description...
 * @param int $format Description...
 * @param int $width Description...
 * @param int $height Description...
 * @param int $stride Description...
 * @return CairoImageSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_create_for_data(string $data, int $format, int $width, int $height, int $stride = -1): CairoImageSurface
{
    error_clear_last();
    $result = \cairo_image_surface_create_for_data($data, $format, $width, $height, $stride);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param string $file Description...
 * @return CairoImageSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_create_from_png($file): CairoImageSurface
{
    error_clear_last();
    $result = \cairo_image_surface_create_from_png($file);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param int $format Description...
 * @param int $width Description...
 * @param int $height Description...
 * @return CairoImageSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_create(int $format, int $width, int $height): CairoImageSurface
{
    error_clear_last();
    $result = \cairo_image_surface_create($format, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoimagesurface $surface Description...
 * @return string What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_get_data(CairoImageSurface $surface): string
{
    error_clear_last();
    $result = \cairo_image_surface_get_data($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoimagesurface $surface Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_get_format(CairoImageSurface $surface): int
{
    error_clear_last();
    $result = \cairo_image_surface_get_format($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoimagesurface $surface Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_get_height(CairoImageSurface $surface): int
{
    error_clear_last();
    $result = \cairo_image_surface_get_height($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoimagesurface $surface Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_get_stride(CairoImageSurface $surface): int
{
    error_clear_last();
    $result = \cairo_image_surface_get_stride($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoimagesurface $surface Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_image_surface_get_width(CairoImageSurface $surface): int
{
    error_clear_last();
    $result = \cairo_image_surface_get_width($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairomatrix $matrix Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_matrix_invert(CairoMatrix $matrix): void
{
    error_clear_last();
    $result = \cairo_matrix_invert($matrix);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairomatrix $matrix1 Description...
 * @param cairomatrix $matrix2 Description...
 * @return CairoMatrix What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_matrix_multiply(CairoMatrix $matrix1, CairoMatrix $matrix2): CairoMatrix
{
    error_clear_last();
    $result = \cairo_matrix_multiply($matrix1, $matrix2);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairomatrix $matrix Description...
 * @param float $dx Description...
 * @param float $dy Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_matrix_transform_distance(CairoMatrix $matrix, float $dx, float $dy): array
{
    error_clear_last();
    $result = \cairo_matrix_transform_distance($matrix, $dx, $dy);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairomatrix $matrix Description...
 * @param float $dx Description...
 * @param float $dy Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_matrix_transform_point(CairoMatrix $matrix, float $dx, float $dy): array
{
    error_clear_last();
    $result = \cairo_matrix_transform_point($matrix, $dx, $dy);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairomatrix $matrix Description...
 * @param float $tx Description...
 * @param float $ty Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_matrix_translate(CairoMatrix $matrix, float $tx, float $ty): void
{
    error_clear_last();
    $result = \cairo_matrix_translate($matrix, $tx, $ty);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairogradientpattern $pattern Description...
 * @param float $offset Description...
 * @param float $red Description...
 * @param float $green Description...
 * @param float $blue Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_add_color_stop_rgb(CairoGradientPattern $pattern, float $offset, float $red, float $green, float $blue): void
{
    error_clear_last();
    $result = \cairo_pattern_add_color_stop_rgb($pattern, $offset, $red, $green, $blue);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairogradientpattern $pattern Description...
 * @param float $offset Description...
 * @param float $red Description...
 * @param float $green Description...
 * @param float $blue Description...
 * @param float $alpha Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_add_color_stop_rgba(CairoGradientPattern $pattern, float $offset, float $red, float $green, float $blue, float $alpha): void
{
    error_clear_last();
    $result = \cairo_pattern_add_color_stop_rgba($pattern, $offset, $red, $green, $blue, $alpha);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @return CairoPattern What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_create_for_surface(CairoSurface $surface): CairoPattern
{
    error_clear_last();
    $result = \cairo_pattern_create_for_surface($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param float $x0 Description...
 * @param float $y0 Description...
 * @param float $x1 Description...
 * @param float $y1 Description...
 * @return CairoPattern What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_create_linear(float $x0, float $y0, float $x1, float $y1): CairoPattern
{
    error_clear_last();
    $result = \cairo_pattern_create_linear($x0, $y0, $x1, $y1);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param float $x0 Description...
 * @param float $y0 Description...
 * @param float $r0 Description...
 * @param float $x1 Description...
 * @param float $y1 Description...
 * @param float $r1 Description...
 * @return CairoPattern What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_create_radial(float $x0, float $y0, float $r0, float $x1, float $y1, float $r1): CairoPattern
{
    error_clear_last();
    $result = \cairo_pattern_create_radial($x0, $y0, $r0, $x1, $y1, $r1);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param float $red Description...
 * @param float $green Description...
 * @param float $blue Description...
 * @return CairoPattern What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_create_rgb(float $red, float $green, float $blue): CairoPattern
{
    error_clear_last();
    $result = \cairo_pattern_create_rgb($red, $green, $blue);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param float $red Description...
 * @param float $green Description...
 * @param float $blue Description...
 * @param float $alpha Description...
 * @return CairoPattern What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_create_rgba(float $red, float $green, float $blue, float $alpha): CairoPattern
{
    error_clear_last();
    $result = \cairo_pattern_create_rgba($red, $green, $blue, $alpha);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairogradientpattern $pattern Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_color_stop_count(CairoGradientPattern $pattern): int
{
    error_clear_last();
    $result = \cairo_pattern_get_color_stop_count($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairogradientpattern $pattern Description...
 * @param int $index Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_color_stop_rgba(CairoGradientPattern $pattern, int $index): array
{
    error_clear_last();
    $result = \cairo_pattern_get_color_stop_rgba($pattern, $index);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param string $pattern Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_extend(string $pattern): int
{
    error_clear_last();
    $result = \cairo_pattern_get_extend($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurfacepattern $pattern Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_filter(CairoSurfacePattern $pattern): int
{
    error_clear_last();
    $result = \cairo_pattern_get_filter($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairolineargradient $pattern Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_linear_points(CairoLinearGradient $pattern): array
{
    error_clear_last();
    $result = \cairo_pattern_get_linear_points($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairopattern $pattern Description...
 * @return CairoMatrix What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_matrix(CairoPattern $pattern): CairoMatrix
{
    error_clear_last();
    $result = \cairo_pattern_get_matrix($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoradialgradient $pattern Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_radial_circles(CairoRadialGradient $pattern): array
{
    error_clear_last();
    $result = \cairo_pattern_get_radial_circles($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosolidpattern $pattern Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_rgba(CairoSolidPattern $pattern): array
{
    error_clear_last();
    $result = \cairo_pattern_get_rgba($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurfacepattern $pattern Description...
 * @return CairoSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_surface(CairoSurfacePattern $pattern): CairoSurface
{
    error_clear_last();
    $result = \cairo_pattern_get_surface($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairopattern $pattern Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_get_type(CairoPattern $pattern): int
{
    error_clear_last();
    $result = \cairo_pattern_get_type($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param string $pattern Description...
 * @param string $extend Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_set_extend(string $pattern, string $extend): void
{
    error_clear_last();
    $result = \cairo_pattern_set_extend($pattern, $extend);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurfacepattern $pattern Description...
 * @param int $filter Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_set_filter(CairoSurfacePattern $pattern, int $filter): void
{
    error_clear_last();
    $result = \cairo_pattern_set_filter($pattern, $filter);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopattern $pattern Description...
 * @param cairomatrix $matrix Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_set_matrix(CairoPattern $pattern, CairoMatrix $matrix): void
{
    error_clear_last();
    $result = \cairo_pattern_set_matrix($pattern, $matrix);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopattern $pattern Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pattern_status(CairoPattern $pattern): int
{
    error_clear_last();
    $result = \cairo_pattern_status($pattern);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param string $file Description...
 * @param float $width Description...
 * @param float $height Description...
 * @return CairoPdfSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pdf_surface_create(string $file, float $width, float $height): CairoPdfSurface
{
    error_clear_last();
    $result = \cairo_pdf_surface_create($file, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairopdfsurface $surface Description...
 * @param float $width Description...
 * @param float $height Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_pdf_surface_set_size(CairoPdfSurface $surface, float $width, float $height): void
{
    error_clear_last();
    $result = \cairo_pdf_surface_set_size($surface, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_get_levels(): array
{
    error_clear_last();
    $result = \cairo_ps_get_levels();
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param int $level Description...
 * @return string What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_level_to_string(int $level): string
{
    error_clear_last();
    $result = \cairo_ps_level_to_string($level);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param string $file Description...
 * @param float $width Description...
 * @param float $height Description...
 * @return CairoPsSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_create(string $file, float $width, float $height): CairoPsSurface
{
    error_clear_last();
    $result = \cairo_ps_surface_create($file, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairopssurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_dsc_begin_page_setup(CairoPsSurface $surface): void
{
    error_clear_last();
    $result = \cairo_ps_surface_dsc_begin_page_setup($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopssurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_dsc_begin_setup(CairoPsSurface $surface): void
{
    error_clear_last();
    $result = \cairo_ps_surface_dsc_begin_setup($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopssurface $surface Description...
 * @param string $comment Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_dsc_comment(CairoPsSurface $surface, string $comment): void
{
    error_clear_last();
    $result = \cairo_ps_surface_dsc_comment($surface, $comment);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopssurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_get_eps(CairoPsSurface $surface): void
{
    error_clear_last();
    $result = \cairo_ps_surface_get_eps($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopssurface $surface Description...
 * @param int $level Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_restrict_to_level(CairoPsSurface $surface, int $level): void
{
    error_clear_last();
    $result = \cairo_ps_surface_restrict_to_level($surface, $level);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopssurface $surface Description...
 * @param bool $level Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_set_eps(CairoPsSurface $surface, bool $level): void
{
    error_clear_last();
    $result = \cairo_ps_surface_set_eps($surface, $level);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairopssurface $surface Description...
 * @param float $width Description...
 * @param float $height Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_ps_surface_set_size(CairoPsSurface $surface, float $width, float $height): void
{
    error_clear_last();
    $result = \cairo_ps_surface_set_size($surface, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairofontface $fontface Description...
 * @param cairomatrix $matrix Description...
 * @param cairomatrix $ctm Description...
 * @param cairofontoptions $fontoptions Description...
 * @return CairoScaledFont What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_create(CairoFontFace $fontface, CairoMatrix $matrix, CairoMatrix $ctm, CairoFontOptions $fontoptions): CairoScaledFont
{
    error_clear_last();
    $result = \cairo_scaled_font_create($fontface, $matrix, $ctm, $fontoptions);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_extents(CairoScaledFont $scaledfont): array
{
    error_clear_last();
    $result = \cairo_scaled_font_extents($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return CairoMatrix What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_get_ctm(CairoScaledFont $scaledfont): CairoMatrix
{
    error_clear_last();
    $result = \cairo_scaled_font_get_ctm($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return CairoFontFace What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_get_font_face(CairoScaledFont $scaledfont): CairoFontFace
{
    error_clear_last();
    $result = \cairo_scaled_font_get_font_face($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return CairoFontOptions What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_get_font_matrix(CairoScaledFont $scaledfont): CairoFontOptions
{
    error_clear_last();
    $result = \cairo_scaled_font_get_font_matrix($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return CairoFontOptions What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_get_font_options(CairoScaledFont $scaledfont): CairoFontOptions
{
    error_clear_last();
    $result = \cairo_scaled_font_get_font_options($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return CairoMatrix What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_get_scale_matrix(CairoScaledFont $scaledfont): CairoMatrix
{
    error_clear_last();
    $result = \cairo_scaled_font_get_scale_matrix($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_get_type(CairoScaledFont $scaledfont): int
{
    error_clear_last();
    $result = \cairo_scaled_font_get_type($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @param array $glyphs Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_glyph_extents(CairoScaledFont $scaledfont, array $glyphs): array
{
    error_clear_last();
    $result = \cairo_scaled_font_glyph_extents($scaledfont, $glyphs);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_status(CairoScaledFont $scaledfont): int
{
    error_clear_last();
    $result = \cairo_scaled_font_status($scaledfont);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairoscaledfont $scaledfont Description...
 * @param string $text Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_scaled_font_text_extents(CairoScaledFont $scaledfont, string $text): array
{
    error_clear_last();
    $result = \cairo_scaled_font_text_extents($scaledfont, $text);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_copy_page(CairoSurface $surface): void
{
    error_clear_last();
    $result = \cairo_surface_copy_page($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @param int $content Description...
 * @param float $width Description...
 * @param float $height Description...
 * @return CairoSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_create_similar(CairoSurface $surface, int $content, float $width, float $height): CairoSurface
{
    error_clear_last();
    $result = \cairo_surface_create_similar($surface, $content, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_finish(CairoSurface $surface): void
{
    error_clear_last();
    $result = \cairo_surface_finish($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_flush(CairoSurface $surface): void
{
    error_clear_last();
    $result = \cairo_surface_flush($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_get_content(CairoSurface $surface): int
{
    error_clear_last();
    $result = \cairo_surface_get_content($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @return array What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_get_device_offset(CairoSurface $surface): array
{
    error_clear_last();
    $result = \cairo_surface_get_device_offset($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @return CairoFontOptions What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_get_font_options(CairoSurface $surface): CairoFontOptions
{
    error_clear_last();
    $result = \cairo_surface_get_font_options($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_get_type(CairoSurface $surface): int
{
    error_clear_last();
    $result = \cairo_surface_get_type($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @param float $x Description...
 * @param float $y Description...
 * @param float $width Description...
 * @param float $height Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_mark_dirty_rectangle(CairoSurface $surface, float $x, float $y, float $width, float $height): void
{
    error_clear_last();
    $result = \cairo_surface_mark_dirty_rectangle($surface, $x, $y, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_mark_dirty(CairoSurface $surface): void
{
    error_clear_last();
    $result = \cairo_surface_mark_dirty($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @param float $x Description...
 * @param float $y Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_set_device_offset(CairoSurface $surface, float $x, float $y): void
{
    error_clear_last();
    $result = \cairo_surface_set_device_offset($surface, $x, $y);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @param float $x Description...
 * @param float $y Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_set_fallback_resolution(CairoSurface $surface, float $x, float $y): void
{
    error_clear_last();
    $result = \cairo_surface_set_fallback_resolution($surface, $x, $y);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_show_page(CairoSurface $surface): void
{
    error_clear_last();
    $result = \cairo_surface_show_page($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @return int What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_status(CairoSurface $surface): int
{
    error_clear_last();
    $result = \cairo_surface_status($surface);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosurface $surface Description...
 * @param resource $stream Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_surface_write_to_png(CairoSurface $surface, $stream): void
{
    error_clear_last();
    $result = \cairo_surface_write_to_png($surface, $stream);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param string $file Description...
 * @param float $width Description...
 * @param float $height Description...
 * @return CairoSvgSurface What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_svg_surface_create(string $file, float $width, float $height): CairoSvgSurface
{
    error_clear_last();
    $result = \cairo_svg_surface_create($file, $width, $height);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


/**
 * The function description goes here.
 * 
 * @param cairosvgsurface $surface Description...
 * @param int $version Description...
 * @throws Exceptions\CairoException
 * 
 */
function cairo_svg_surface_restrict_to_version(CairoSvgSurface $surface, int $version): void
{
    error_clear_last();
    $result = \cairo_svg_surface_restrict_to_version($surface, $version);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
}


/**
 * The function description goes here.
 * 
 * @param int $version Description...
 * @return string What is returned on success and failure
 * @throws Exceptions\CairoException
 * 
 */
function cairo_svg_version_to_string(int $version): string
{
    error_clear_last();
    $result = \cairo_svg_version_to_string($version);
    if ($result === FALSE) {
        throw Exceptions\CairoException::createFromPhpError();
    }
    return $result;
}


