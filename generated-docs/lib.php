<?php

class FileWritingException extends \Exception
{
}

function apache_get_version(): string
{
    $params = func_get_args();
    if (($string = \apache_get_version(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}

function apache_reset_timeout(): bool
{
    $params = func_get_args();
    if (($bool = \apache_reset_timeout(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apache_response_headers(): array
{
    $params = func_get_args();
    if (($array = \apache_response_headers(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}

function apache_setenv(string $variable, string $value, bool $walk_to_top = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \apache_setenv(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apc_cas(string $key, int $old, int $new): bool
{
    $params = func_get_args();
    if (($bool = \apc_cas(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apc_compile_file(string $filename, bool $atomic = TRUE): mixed
{
    $params = func_get_args();
    if (($mixed = \apc_compile_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}

function apc_dec(string $key, int $step = 1, bool $success = null): int
{
    $params = func_get_args();
    if (($int = \apc_dec(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}

function apc_define_constants(string $key, array $constants, bool $case_sensitive = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \apc_define_constants(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apc_delete_file($keys): mixed
{
    $params = func_get_args();
    if (($mixed = \apc_delete_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}

function apc_delete(string $key): mixed
{
    $params = func_get_args();
    if (($mixed = \apc_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}

function apc_inc(string $key, int $step = 1, bool $success = null): int
{
    $params = func_get_args();
    if (($int = \apc_inc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}

function apc_load_constants(string $key, bool $case_sensitive = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \apc_load_constants(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apc_store(string $key, $var, int $ttl = 0): bool
{
    $params = func_get_args();
    if (($bool = \apc_store(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apc_store(array $values, $unused = NULL, int $ttl = 0): array
{
    $params = func_get_args();
    if (($array = \apc_store(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}

function apcu_cas(string $key, int $old, int $new): bool
{
    $params = func_get_args();
    if (($bool = \apcu_cas(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apcu_dec(string $key, int $step = 1, bool $success = null): int
{
    $params = func_get_args();
    if (($int = \apcu_dec(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}

function apcu_delete($key): bool
{
    $params = func_get_args();
    if (($bool = \apcu_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apcu_inc(string $key, int $step = 1, bool $success = null): int
{
    $params = func_get_args();
    if (($int = \apcu_inc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}

function apcu_store(string $key, $var, int $ttl = 0): bool
{
    $params = func_get_args();
    if (($bool = \apcu_store(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apcu_store(array $values, $unused = NULL, int $ttl = 0): array
{
    $params = func_get_args();
    if (($array = \apcu_store(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}

function apd_breakpoint(int $debug_level): bool
{
    $params = func_get_args();
    if (($bool = \apd_breakpoint(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apd_continue(int $debug_level): bool
{
    $params = func_get_args();
    if (($bool = \apd_continue(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apd_echo(string $output): bool
{
    $params = func_get_args();
    if (($bool = \apd_echo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function apd_set_session_trace_socket(string $tcp_server, int $socket_type, int $port, int $debug_level): bool
{
    $params = func_get_args();
    if (($bool = \apd_set_session_trace_socket(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function override_function(string $function_name, string $function_args, string $function_code): bool
{
    $params = func_get_args();
    if (($bool = \override_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function rename_function(string $original_name, string $new_name): bool
{
    $params = func_get_args();
    if (($bool = \rename_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function array_key_exists($key, array $array): bool
{
    $params = func_get_args();
    if (($bool = \array_key_exists(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}

function array_multisort(array $array1, $array1_sort_order = SORT_ASC, $array1_sort_flags = SORT_REGULAR, $... = null): bool {
    $params = func_get_args();
    if (($bool = \array_multisort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function array_search($needle, array $haystack, bool $strict = FALSE): mixed
{
    $params = func_get_args();
    if (($mixed = \array_search(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function array_walk_recursive(array $array, callable $callback, $userdata): bool
{
    $params = func_get_args();
    if (($bool = \array_walk_recursive(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function array_walk(array $array, callable $callback, $userdata): bool
{
    $params = func_get_args();
    if (($bool = \array_walk(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function arsort(array $array, int $sort_flags = SORT_REGULAR): bool
{
    $params = func_get_args();
    if (($bool = \arsort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function asort(array $array, int $sort_flags = SORT_REGULAR): bool
{
    $params = func_get_args();
    if (($bool = \asort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function current(array $array): mixed
{
    $params = func_get_args();
    if (($mixed = \current(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function krsort(array $array, int $sort_flags = SORT_REGULAR): bool
{
    $params = func_get_args();
    if (($bool = \krsort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ksort(array $array, int $sort_flags = SORT_REGULAR): bool
{
    $params = func_get_args();
    if (($bool = \ksort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function natcasesort(array $array): bool
{
    $params = func_get_args();
    if (($bool = \natcasesort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function natsort(array $array): bool
{
    $params = func_get_args();
    if (($bool = \natsort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function next(array $array): mixed
{
    $params = func_get_args();
    if (($mixed = \next(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function prev(array $array): mixed
{
    $params = func_get_args();
    if (($mixed = \prev(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function reset(array $array): mixed
{
    $params = func_get_args();
    if (($mixed = \reset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function rsort(array $array, int $sort_flags = SORT_REGULAR): bool
{
    $params = func_get_args();
    if (($bool = \rsort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function shuffle(array $array): bool
{
    $params = func_get_args();
    if (($bool = \shuffle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sort(array $array, int $sort_flags = SORT_REGULAR): bool
{
    $params = func_get_args();
    if (($bool = \sort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uasort(array $array, callable $value_compare_func): bool
{
    $params = func_get_args();
    if (($bool = \uasort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uksort(array $array, callable $key_compare_func): bool
{
    $params = func_get_args();
    if (($bool = \uksort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function usort(array $array, callable $value_compare_func): bool
{
    $params = func_get_args();
    if (($bool = \usort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bbcode_add_element($bbcode_container, string $tag_name, array $tag_rules): bool
{
    $params = func_get_args();
    if (($bool = \bbcode_add_element(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bbcode_add_smiley($bbcode_container, string $smiley, string $replace_by): bool
{
    $params = func_get_args();
    if (($bool = \bbcode_add_smiley(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bbcode_destroy($bbcode_container): bool
{
    $params = func_get_args();
    if (($bool = \bbcode_destroy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bbcode_parse($bbcode_container, string $to_parse): string
{
    $params = func_get_args();
    if (($string = \bbcode_parse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function bbcode_set_arg_parser($bbcode_container, $bbcode_arg_parser): bool
{
    $params = func_get_args();
    if (($bool = \bbcode_set_arg_parser(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bbcode_set_flags($bbcode_container, int $flags, int $mode = BBCODE_SET_FLAGS_SET): bool
{
    $params = func_get_args();
    if (($bool = \bbcode_set_flags(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_load_exe(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_load_exe(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_load(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_load(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_parse_class(string $class, string $callback): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_parse_class(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_read($filehandle): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_class($filehandle, string $className, string $extends): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_class(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_constant($filehandle, string $constantName): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_constant(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_file($filehandle, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_footer($filehandle): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_footer(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_function($filehandle, string $functionName): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_functions_from_file($filehandle, string $fileName): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_functions_from_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_header($filehandle, string $write_ver): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_header(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bcompiler_write_included_filename($filehandle, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \bcompiler_write_included_filename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bzclose($bz): int
{
    $params = func_get_args();
    if (($int = \bzclose(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function bzflush($bz): bool
{
    $params = func_get_args();
    if (($bool = \bzflush(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function bzread($bz, int $length = 1024): string
{
    $params = func_get_args();
    if (($string = \bzread(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function bzwrite($bz, string $data, int $length): int
{
    $params = func_get_args();
    if (($int = \bzwrite(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_create(CairoSurface $surface): CairoContext
{
    $params = func_get_args();
    if (($CairoContext = \cairo_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoContext;
}



function cairo_font_options_create(): CairoFontOptions
{
    $params = func_get_args();
    if (($CairoFontOptions = \cairo_font_options_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoFontOptions;
}



function cairo_font_options_equal(CairoFontOptions $options, CairoFontOptions $other): bool
{
    $params = func_get_args();
    if (($bool = \cairo_font_options_equal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function cairo_font_options_get_antialias(CairoFontOptions $options): int
{
    $params = func_get_args();
    if (($int = \cairo_font_options_get_antialias(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_font_options_get_hint_metrics(CairoFontOptions $options): int
{
    $params = func_get_args();
    if (($int = \cairo_font_options_get_hint_metrics(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_font_options_get_hint_style(CairoFontOptions $options): int
{
    $params = func_get_args();
    if (($int = \cairo_font_options_get_hint_style(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_font_options_get_subpixel_order(CairoFontOptions $options): int
{
    $params = func_get_args();
    if (($int = \cairo_font_options_get_subpixel_order(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_font_options_hash(CairoFontOptions $options): int
{
    $params = func_get_args();
    if (($int = \cairo_font_options_hash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}








function cairo_font_options_status(CairoFontOptions $options): int
{
    $params = func_get_args();
    if (($int = \cairo_font_options_status(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_format_stride_for_width(int $format, int $width): int
{
    $params = func_get_args();
    if (($int = \cairo_format_stride_for_width(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_image_surface_create_for_data(string $data, int $format, int $width, int $height, int $stride = -1): CairoImageSurface
{
    $params = func_get_args();
    if (($CairoImageSurface = \cairo_image_surface_create_for_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoImageSurface;
}



function cairo_image_surface_create_from_png($file): CairoImageSurface
{
    $params = func_get_args();
    if (($CairoImageSurface = \cairo_image_surface_create_from_png(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoImageSurface;
}



function cairo_image_surface_create(int $format, int $width, int $height): CairoImageSurface
{
    $params = func_get_args();
    if (($CairoImageSurface = \cairo_image_surface_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoImageSurface;
}



function cairo_image_surface_get_data(CairoImageSurface $surface): string
{
    $params = func_get_args();
    if (($string = \cairo_image_surface_get_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function cairo_image_surface_get_format(CairoImageSurface $surface): int
{
    $params = func_get_args();
    if (($int = \cairo_image_surface_get_format(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_image_surface_get_height(CairoImageSurface $surface): int
{
    $params = func_get_args();
    if (($int = \cairo_image_surface_get_height(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_image_surface_get_stride(CairoImageSurface $surface): int
{
    $params = func_get_args();
    if (($int = \cairo_image_surface_get_stride(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_image_surface_get_width(CairoImageSurface $surface): int
{
    $params = func_get_args();
    if (($int = \cairo_image_surface_get_width(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}




function cairo_matrix_multiply(CairoMatrix $matrix1, CairoMatrix $matrix2): CairoMatrix
{
    $params = func_get_args();
    if (($CairoMatrix = \cairo_matrix_multiply(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoMatrix;
}



function cairo_matrix_transform_distance(CairoMatrix $matrix, float $dx, float $dy): array
{
    $params = func_get_args();
    if (($array = \cairo_matrix_transform_distance(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_matrix_transform_point(CairoMatrix $matrix, float $dx, float $dy): array
{
    $params = func_get_args();
    if (($array = \cairo_matrix_transform_point(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}






function cairo_pattern_create_for_surface(CairoSurface $surface): CairoPattern
{
    $params = func_get_args();
    if (($CairoPattern = \cairo_pattern_create_for_surface(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoPattern;
}



function cairo_pattern_create_linear(float $x0, float $y0, float $x1, float $y1): CairoPattern
{
    $params = func_get_args();
    if (($CairoPattern = \cairo_pattern_create_linear(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoPattern;
}



function cairo_pattern_create_radial(float $x0, float $y0, float $r0, float $x1, float $y1, float $r1): CairoPattern
{
    $params = func_get_args();
    if (($CairoPattern = \cairo_pattern_create_radial(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoPattern;
}



function cairo_pattern_create_rgb(float $red, float $green, float $blue): CairoPattern
{
    $params = func_get_args();
    if (($CairoPattern = \cairo_pattern_create_rgb(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoPattern;
}



function cairo_pattern_create_rgba(float $red, float $green, float $blue, float $alpha): CairoPattern
{
    $params = func_get_args();
    if (($CairoPattern = \cairo_pattern_create_rgba(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoPattern;
}



function cairo_pattern_get_color_stop_count(CairoGradientPattern $pattern): int
{
    $params = func_get_args();
    if (($int = \cairo_pattern_get_color_stop_count(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_pattern_get_color_stop_rgba(CairoGradientPattern $pattern, int $index): array
{
    $params = func_get_args();
    if (($array = \cairo_pattern_get_color_stop_rgba(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_pattern_get_extend(string $pattern): int
{
    $params = func_get_args();
    if (($int = \cairo_pattern_get_extend(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_pattern_get_filter(CairoSurfacePattern $pattern): int
{
    $params = func_get_args();
    if (($int = \cairo_pattern_get_filter(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_pattern_get_linear_points(CairoLinearGradient $pattern): array
{
    $params = func_get_args();
    if (($array = \cairo_pattern_get_linear_points(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_pattern_get_matrix(CairoPattern $pattern): CairoMatrix
{
    $params = func_get_args();
    if (($CairoMatrix = \cairo_pattern_get_matrix(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoMatrix;
}



function cairo_pattern_get_radial_circles(CairoRadialGradient $pattern): array
{
    $params = func_get_args();
    if (($array = \cairo_pattern_get_radial_circles(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_pattern_get_rgba(CairoSolidPattern $pattern): array
{
    $params = func_get_args();
    if (($array = \cairo_pattern_get_rgba(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_pattern_get_surface(CairoSurfacePattern $pattern): CairoSurface
{
    $params = func_get_args();
    if (($CairoSurface = \cairo_pattern_get_surface(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoSurface;
}



function cairo_pattern_get_type(CairoPattern $pattern): int
{
    $params = func_get_args();
    if (($int = \cairo_pattern_get_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}






function cairo_pattern_status(CairoPattern $pattern): int
{
    $params = func_get_args();
    if (($int = \cairo_pattern_status(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_pdf_surface_create(string $file, float $width, float $height): CairoPdfSurface
{
    $params = func_get_args();
    if (($CairoPdfSurface = \cairo_pdf_surface_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoPdfSurface;
}




function cairo_ps_get_levels(): array
{
    $params = func_get_args();
    if (($array = \cairo_ps_get_levels(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_ps_level_to_string(int $level): string
{
    $params = func_get_args();
    if (($string = \cairo_ps_level_to_string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function cairo_ps_surface_create(string $file, float $width, float $height): CairoPsSurface
{
    $params = func_get_args();
    if (($CairoPsSurface = \cairo_ps_surface_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoPsSurface;
}






function cairo_ps_surface_get_eps(CairoPsSurface $surface): bool
{
    $params = func_get_args();
    if (($bool = \cairo_ps_surface_get_eps(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}






function cairo_scaled_font_create(CairoFontFace $fontface, CairoMatrix $matrix, CairoMatrix $ctm, CairoFontOptions $fontoptions): CairoScaledFont
{
    $params = func_get_args();
    if (($CairoScaledFont = \cairo_scaled_font_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoScaledFont;
}



function cairo_scaled_font_extents(CairoScaledFont $scaledfont): array
{
    $params = func_get_args();
    if (($array = \cairo_scaled_font_extents(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_scaled_font_get_ctm(CairoScaledFont $scaledfont): CairoMatrix
{
    $params = func_get_args();
    if (($CairoMatrix = \cairo_scaled_font_get_ctm(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoMatrix;
}



function cairo_scaled_font_get_font_face(CairoScaledFont $scaledfont): CairoFontFace
{
    $params = func_get_args();
    if (($CairoFontFace = \cairo_scaled_font_get_font_face(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoFontFace;
}



function cairo_scaled_font_get_font_matrix(CairoScaledFont $scaledfont): CairoFontOptions
{
    $params = func_get_args();
    if (($CairoFontOptions = \cairo_scaled_font_get_font_matrix(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoFontOptions;
}



function cairo_scaled_font_get_font_options(CairoScaledFont $scaledfont): CairoFontOptions
{
    $params = func_get_args();
    if (($CairoFontOptions = \cairo_scaled_font_get_font_options(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoFontOptions;
}



function cairo_scaled_font_get_scale_matrix(CairoScaledFont $scaledfont): CairoMatrix
{
    $params = func_get_args();
    if (($CairoMatrix = \cairo_scaled_font_get_scale_matrix(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoMatrix;
}



function cairo_scaled_font_get_type(CairoScaledFont $scaledfont): int
{
    $params = func_get_args();
    if (($int = \cairo_scaled_font_get_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_scaled_font_glyph_extents(CairoScaledFont $scaledfont, array $glyphs): array
{
    $params = func_get_args();
    if (($array = \cairo_scaled_font_glyph_extents(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_scaled_font_status(CairoScaledFont $scaledfont): int
{
    $params = func_get_args();
    if (($int = \cairo_scaled_font_status(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_scaled_font_text_extents(CairoScaledFont $scaledfont, string $text): array
{
    $params = func_get_args();
    if (($array = \cairo_scaled_font_text_extents(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}




function cairo_surface_create_similar(CairoSurface $surface, int $content, float $width, float $height): CairoSurface
{
    $params = func_get_args();
    if (($CairoSurface = \cairo_surface_create_similar(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoSurface;
}





function cairo_surface_get_content(CairoSurface $surface): int
{
    $params = func_get_args();
    if (($int = \cairo_surface_get_content(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function cairo_surface_get_device_offset(CairoSurface $surface): array
{
    $params = func_get_args();
    if (($array = \cairo_surface_get_device_offset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function cairo_surface_get_font_options(CairoSurface $surface): CairoFontOptions
{
    $params = func_get_args();
    if (($CairoFontOptions = \cairo_surface_get_font_options(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoFontOptions;
}



function cairo_surface_get_type(CairoSurface $surface): int
{
    $params = func_get_args();
    if (($int = \cairo_surface_get_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}








function cairo_surface_status(CairoSurface $surface): int
{
    $params = func_get_args();
    if (($int = \cairo_surface_status(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}




function cairo_svg_surface_create(string $file, float $width, float $height): CairoSvgSurface
{
    $params = func_get_args();
    if (($CairoSvgSurface = \cairo_svg_surface_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $CairoSvgSurface;
}




function cairo_svg_version_to_string(int $version): string
{
    $params = func_get_args();
    if (($string = \cairo_svg_version_to_string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function chdb_create(string $pathname, array $data): bool
{
    $params = func_get_args();
    if (($bool = \chdb_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function classkit_method_add(string $classname, string $methodname, string $args, string $code, int $flags = CLASSKIT_ACC_PUBLIC): bool
{
    $params = func_get_args();
    if (($bool = \classkit_method_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function classkit_method_remove(string $classname, string $methodname): bool
{
    $params = func_get_args();
    if (($bool = \classkit_method_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function class_alias(string $original, string $alias, bool $autoload = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \class_alias(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function com_event_sink(variant $comobject, object $sinkobject, $sinkinterface): bool
{
    $params = func_get_args();
    if (($bool = \com_event_sink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function com_load_typelib(string $typelib_name, bool $case_insensitive = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \com_load_typelib(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function com_print_typeinfo(object $comobject, string $dispinterface, bool $wantsink = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \com_print_typeinfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function crack_closedict($dictionary): bool
{
    $params = func_get_args();
    if (($bool = \crack_closedict(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function crack_opendict(string $dictionary): resource
{
    $params = func_get_args();
    if (($resource = \crack_opendict(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function curl_escape($ch, string $str): string
{
    $params = func_get_args();
    if (($string = \curl_escape(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function curl_exec($ch): mixed
{
    $params = func_get_args();
    if (($mixed = \curl_exec(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function curl_init(string $url): resource
{
    $params = func_get_args();
    if (($resource = \curl_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function curl_multi_errno($mh): int
{
    $params = func_get_args();
    if (($int = \curl_multi_errno(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function curl_multi_setopt($mh, int $option, $value): bool
{
    $params = func_get_args();
    if (($bool = \curl_multi_setopt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function curl_setopt($ch, int $option, $value): bool
{
    $params = func_get_args();
    if (($bool = \curl_setopt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function curl_share_errno($sh): int
{
    $params = func_get_args();
    if (($int = \curl_share_errno(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function curl_share_setopt($sh, int $option, string $value): bool
{
    $params = func_get_args();
    if (($bool = \curl_share_setopt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function curl_unescape($ch, string $str): string
{
    $params = func_get_args();
    if (($string = \curl_unescape(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function cyrus_bind($connection, array $callbacks): bool
{
    $params = func_get_args();
    if (($bool = \cyrus_bind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function cyrus_close($connection): bool
{
    $params = func_get_args();
    if (($bool = \cyrus_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function cyrus_connect(string $host, string $port, int $flags): resource
{
    $params = func_get_args();
    if (($resource = \cyrus_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function cyrus_unbind($connection, string $trigger_name): bool
{
    $params = func_get_args();
    if (($bool = \cyrus_unbind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function date_parse(string $date): array
{
    $params = func_get_args();
    if (($array = \date_parse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function date_sun_info(int $time, float $latitude, float $longitude): array
{
    $params = func_get_args();
    if (($array = \date_sun_info(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function date_sunrise(int $timestamp, int $format = SUNFUNCS_RET_STRING, float $latitude = ini_get("date.default_latitude"), float $longitude = ini_get("date.default_longitude"), float $zenith = ini_get("date.sunrise_zenith"), float $gmt_offset = 0): mixed
{
    $params = func_get_args();
    if (($mixed = \date_sunrise(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function date_sunset(int $timestamp, int $format = SUNFUNCS_RET_STRING, float $latitude = ini_get("date.default_latitude"), float $longitude = ini_get("date.default_longitude"), float $zenith = ini_get("date.sunset_zenith"), float $gmt_offset = 0): mixed
{
    $params = func_get_args();
    if (($mixed = \date_sunset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function mktime(int $hour = date("H"), int $minute = date("i"), int $second = date("s"), int $month = date("n"), int $day = date("j"), int $year = date("Y"), int $is_dst = -1): int
{
    $params = func_get_args();
    if (($int = \mktime(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function timezone_name_from_abbr(string $abbr, int $gmtOffset = -1, int $isdst = -1): string
{
    $params = func_get_args();
    if (($string = \timezone_name_from_abbr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function dba_delete(string $key, $handle): bool
{
    $params = func_get_args();
    if (($bool = \dba_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dba_firstkey($handle): string
{
    $params = func_get_args();
    if (($string = \dba_firstkey(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function dba_insert(string $key, string $value, $handle): bool
{
    $params = func_get_args();
    if (($bool = \dba_insert(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dba_nextkey($handle): string
{
    $params = func_get_args();
    if (($string = \dba_nextkey(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function dba_open(string $path, string $mode, string $handler, $...): resource {
    $params = func_get_args();
    if (($resource = \dba_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function dba_optimize($handle): bool
{
    $params = func_get_args();
    if (($bool = \dba_optimize(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dba_popen(string $path, string $mode, string $handler, $...): resource {
    $params = func_get_args();
    if (($resource = \dba_popen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function dba_replace(string $key, string $value, $handle): bool
{
    $params = func_get_args();
    if (($bool = \dba_replace(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dba_sync($handle): bool
{
    $params = func_get_args();
    if (($bool = \dba_sync(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dbase_add_record($dbase_identifier, array $record): bool
{
    $params = func_get_args();
    if (($bool = \dbase_add_record(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dbase_close($dbase_identifier): bool
{
    $params = func_get_args();
    if (($bool = \dbase_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dbase_delete_record($dbase_identifier, int $record_number): bool
{
    $params = func_get_args();
    if (($bool = \dbase_delete_record(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dbase_pack($dbase_identifier): bool
{
    $params = func_get_args();
    if (($bool = \dbase_pack(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dbase_replace_record($dbase_identifier, array $record, int $record_number): bool
{
    $params = func_get_args();
    if (($bool = \dbase_replace_record(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dbplus_resolve(string $relation_name): array
{
    $params = func_get_args();
    if (($array = \dbplus_resolve(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function dbx_connect($module, string $host, string $database, string $username, string $password, int $persistent): object
{
    $params = func_get_args();
    if (($object = \dbx_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $object;
}



function dbx_sort(object $result, string $user_compare_function): bool
{
    $params = func_get_args();
    if (($bool = \dbx_sort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dio_open(string $filename, int $flags, int $mode = 0): resource
{
    $params = func_get_args();
    if (($resource = \dio_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function dio_truncate($fd, int $offset): bool
{
    $params = func_get_args();
    if (($bool = \dio_truncate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function chdir(string $directory): bool
{
    $params = func_get_args();
    if (($bool = \chdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function chroot(string $directory): bool
{
    $params = func_get_args();
    if (($bool = \chroot(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function readdir($dir_handle): string
{
    $params = func_get_args();
    if (($string = \readdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}




function eio_busy(int $delay, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_busy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_chmod(string $path, int $mode, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_chmod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_chown(string $path, int $uid, int $gid = -1, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_chown(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_close($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_custom(callable $execute, int $pri, callable $callback, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_custom(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_dup2($fd, $fd2, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_dup2(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_event_loop(): bool
{
    $params = func_get_args();
    if (($bool = \eio_event_loop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function eio_fallocate($fd, int $mode, int $offset, int $length, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_fallocate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_fchmod($fd, int $mode, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_fchmod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_fdatasync($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_fdatasync(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_fstat($fd, int $pri, callable $callback, $data): resource
{
    $params = func_get_args();
    if (($resource = \eio_fstat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_fstatvfs($fd, int $pri, callable $callback, $data): resource
{
    $params = func_get_args();
    if (($resource = \eio_fstatvfs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_fsync($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_fsync(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_ftruncate($fd, int $offset = 0, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_ftruncate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_futime($fd, float $atime, float $mtime, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_futime(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_grp(callable $callback, string $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_grp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_lstat(string $path, int $pri, callable $callback, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_lstat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_mkdir(string $path, int $mode, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_mkdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_mknod(string $path, int $mode, int $dev, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_mknod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_nop(int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_nop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_readahead($fd, int $offset, int $length, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_readahead(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_readdir(string $path, int $flags, int $pri, callable $callback, string $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_readdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_readlink(string $path, int $pri, callable $callback, string $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_readlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_rename(string $path, string $new_path, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_rename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_rmdir(string $path, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_rmdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_seek($fd, int $offset, int $whence, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_sendfile($out_fd, $in_fd, int $offset, int $length, int $pri, callable $callback, string $data): resource
{
    $params = func_get_args();
    if (($resource = \eio_sendfile(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_stat(string $path, int $pri, callable $callback, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_stat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_statvfs(string $path, int $pri, callable $callback, $data): resource
{
    $params = func_get_args();
    if (($resource = \eio_statvfs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_symlink(string $path, string $new_path, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_symlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_sync_file_range($fd, int $offset, int $nbytes, int $flags, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_sync_file_range(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_sync(int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_sync(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_syncfs($fd, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_syncfs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_truncate(string $path, int $offset = 0, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_truncate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_unlink(string $path, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_unlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_utime(string $path, float $atime, float $mtime, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_utime(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function eio_write($fd, string $str, int $length = 0, int $offset = 0, int $pri = EIO_PRI_DEFAULT, callable $callback = NULL, $data = NULL): resource
{
    $params = func_get_args();
    if (($resource = \eio_write(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function enchant_broker_describe($broker): array
{
    $params = func_get_args();
    if (($array = \enchant_broker_describe(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function enchant_broker_free_dict($dict): bool
{
    $params = func_get_args();
    if (($bool = \enchant_broker_free_dict(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function enchant_broker_free($broker): bool
{
    $params = func_get_args();
    if (($bool = \enchant_broker_free(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function enchant_broker_get_dict_path($broker, int $dict_type): bool
{
    $params = func_get_args();
    if (($bool = \enchant_broker_get_dict_path(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function enchant_broker_list_dicts($broker): mixed
{
    $params = func_get_args();
    if (($mixed = \enchant_broker_list_dicts(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function enchant_broker_request_dict($broker, string $tag): resource
{
    $params = func_get_args();
    if (($resource = \enchant_broker_request_dict(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function enchant_broker_request_pwl_dict($broker, string $filename): resource
{
    $params = func_get_args();
    if (($resource = \enchant_broker_request_pwl_dict(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function enchant_broker_set_dict_path($broker, int $dict_type, string $value): bool
{
    $params = func_get_args();
    if (($bool = \enchant_broker_set_dict_path(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function enchant_broker_set_ordering($broker, string $tag, string $ordering): bool
{
    $params = func_get_args();
    if (($bool = \enchant_broker_set_ordering(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function enchant_dict_describe($dict): mixed
{
    $params = func_get_args();
    if (($mixed = \enchant_dict_describe(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}




function error_log(string $message, int $message_type = 0, string $destination = null, string $extra_headers = null): bool
{
    $params = func_get_args();
    if (($bool = \error_log(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function proc_nice(int $increment): bool
{
    $params = func_get_args();
    if (($bool = \proc_nice(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fam_cancel_monitor($fam, $fam_monitor): bool
{
    $params = func_get_args();
    if (($bool = \fam_cancel_monitor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fam_monitor_collection($fam, string $dirname, int $depth, string $mask): resource
{
    $params = func_get_args();
    if (($resource = \fam_monitor_collection(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fam_monitor_directory($fam, string $dirname): resource
{
    $params = func_get_args();
    if (($resource = \fam_monitor_directory(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fam_monitor_file($fam, string $filename): resource
{
    $params = func_get_args();
    if (($resource = \fam_monitor_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fam_open(string $appname): resource
{
    $params = func_get_args();
    if (($resource = \fam_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fam_resume_monitor($fam, $fam_monitor): bool
{
    $params = func_get_args();
    if (($bool = \fam_resume_monitor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fam_suspend_monitor($fam, $fam_monitor): bool
{
    $params = func_get_args();
    if (($bool = \fam_suspend_monitor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fann_copy($ann): resource
{
    $params = func_get_args();
    if (($resource = \fann_copy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_create_shortcut_array(int $num_layers, array $layers): resource
{
    $params = func_get_args();
    if (($resource = \fann_create_shortcut_array(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_create_shortcut(int $num_layers, int $num_neurons1, int $num_neurons2, int $...): resource {
    $params = func_get_args();
    if (($resource = \fann_create_shortcut(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_create_sparse_array(float $connection_rate, int $num_layers, array $layers): resource
{
    $params = func_get_args();
    if (($resource = \fann_create_sparse_array(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_create_sparse(float $connection_rate, int $num_layers, int $num_neurons1, int $num_neurons2, int $...): resource {
    $params = func_get_args();
    if (($resource = \fann_create_sparse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_create_standard_array(int $num_layers, array $layers): resource
{
    $params = func_get_args();
    if (($resource = \fann_create_standard_array(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_create_standard(int $num_layers, int $num_neurons1, int $num_neurons2, int $...): resource {
    $params = func_get_args();
    if (($resource = \fann_create_standard(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_get_activation_function($ann, int $layer, int $neuron): int
{
    $params = func_get_args();
    if (($int = \fann_get_activation_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_activation_steepness($ann, int $layer, int $neuron): float
{
    $params = func_get_args();
    if (($float = \fann_get_activation_steepness(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_bit_fail_limit($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_bit_fail_limit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_bit_fail($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_bit_fail(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_activation_functions_count($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_activation_functions_count(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_activation_functions($ann): array
{
    $params = func_get_args();
    if (($array = \fann_get_cascade_activation_functions(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function fann_get_cascade_activation_steepnesses_count($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_activation_steepnesses_count(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_activation_steepnesses($ann): array
{
    $params = func_get_args();
    if (($array = \fann_get_cascade_activation_steepnesses(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function fann_get_cascade_candidate_change_fraction($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_cascade_candidate_change_fraction(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_cascade_candidate_limit($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_cascade_candidate_limit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_cascade_candidate_stagnation_epochs($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_candidate_stagnation_epochs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_max_cand_epochs($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_max_cand_epochs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_max_out_epochs($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_max_out_epochs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_min_cand_epochs($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_min_cand_epochs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_min_out_epochs($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_min_out_epochs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_num_candidate_groups($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_num_candidate_groups(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_num_candidates($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_num_candidates(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_output_change_fraction($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_cascade_output_change_fraction(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_cascade_output_stagnation_epochs($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_cascade_output_stagnation_epochs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_cascade_weight_multiplier($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_cascade_weight_multiplier(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_connection_rate($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_connection_rate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_errno($errdat): int
{
    $params = func_get_args();
    if (($int = \fann_get_errno(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_errstr($errdat): string
{
    $params = func_get_args();
    if (($string = \fann_get_errstr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function fann_get_learning_momentum($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_learning_momentum(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_learning_rate($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_learning_rate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_MSE($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_MSE(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_network_type($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_network_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_num_input($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_num_input(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_num_layers($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_num_layers(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_num_output($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_num_output(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_quickprop_decay($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_quickprop_decay(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_quickprop_mu($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_quickprop_mu(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_rprop_decrease_factor($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_rprop_decrease_factor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_rprop_delta_max($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_rprop_delta_max(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_rprop_delta_min($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_rprop_delta_min(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_rprop_delta_zero($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_rprop_delta_zero(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_rprop_increase_factor($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_rprop_increase_factor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_sarprop_step_error_shift($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_sarprop_step_error_shift(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_sarprop_step_error_threshold_factor($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_sarprop_step_error_threshold_factor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_sarprop_temperature($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_sarprop_temperature(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_sarprop_weight_decay_shift($ann): float
{
    $params = func_get_args();
    if (($float = \fann_get_sarprop_weight_decay_shift(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_get_total_connections($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_total_connections(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_total_neurons($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_total_neurons(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_train_error_function($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_train_error_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_train_stop_function($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_train_stop_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_get_training_algorithm($ann): int
{
    $params = func_get_args();
    if (($int = \fann_get_training_algorithm(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_length_train_data($data): int
{
    $params = func_get_args();
    if (($int = \fann_length_train_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_merge_train_data($data1, $data2): resource
{
    $params = func_get_args();
    if (($resource = \fann_merge_train_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fann_num_input_train_data($data): int
{
    $params = func_get_args();
    if (($int = \fann_num_input_train_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_num_output_train_data($data): int
{
    $params = func_get_args();
    if (($int = \fann_num_output_train_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fann_run($ann, array $input): array
{
    $params = func_get_args();
    if (($array = \fann_run(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function fann_test_data($ann, $data): float
{
    $params = func_get_args();
    if (($float = \fann_test_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fann_test($ann, array $input, array $desired_output): array
{
    $params = func_get_args();
    if (($array = \fann_test(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function fann_train_epoch($ann, $data): float
{
    $params = func_get_args();
    if (($float = \fann_train_epoch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fbsql_blob_size(string $blob_handle, $link_identifier): int
{
    $params = func_get_args();
    if (($int = \fbsql_blob_size(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fbsql_change_user(string $user, string $password, string $database, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_change_user(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_clob_size(string $clob_handle, $link_identifier): int
{
    $params = func_get_args();
    if (($int = \fbsql_clob_size(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fbsql_close($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_commit($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_commit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_create_db(string $database_name, $link_identifier, string $database_options): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_create_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_data_seek($result, int $row_number): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_data_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_db_query(string $database, string $query, $link_identifier): resource
{
    $params = func_get_args();
    if (($resource = \fbsql_db_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fbsql_drop_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_drop_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_fetch_field($result, int $field_offset): object
{
    $params = func_get_args();
    if (($object = \fbsql_fetch_field(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $object;
}



function fbsql_fetch_lengths($result): array
{
    $params = func_get_args();
    if (($array = \fbsql_fetch_lengths(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function fbsql_field_seek($result, int $field_offset): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_field_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_free_result($result): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_list_dbs($link_identifier): resource
{
    $params = func_get_args();
    if (($resource = \fbsql_list_dbs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fbsql_list_fields(string $database_name, string $table_name, $link_identifier): resource
{
    $params = func_get_args();
    if (($resource = \fbsql_list_fields(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fbsql_list_tables(string $database, $link_identifier): resource
{
    $params = func_get_args();
    if (($resource = \fbsql_list_tables(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fbsql_pconnect(string $hostname = ini_get("fbsql.default_host"), string $username = ini_get("fbsql.default_user"), string $password = ini_get("fbsql.default_password")): resource
{
    $params = func_get_args();
    if (($resource = \fbsql_pconnect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fbsql_rollback($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_rollback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_select_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_select_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_set_lob_mode($result, int $lob_mode): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_set_lob_mode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_set_password($link_identifier, string $user, string $password, string $old_password): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_set_password(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_start_db(string $database_name, $link_identifier, string $database_options): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_start_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fbsql_stop_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \fbsql_stop_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_add_doc_javascript($fdf_document, string $script_name, string $script_code): bool
{
    $params = func_get_args();
    if (($bool = \fdf_add_doc_javascript(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_create(): resource
{
    $params = func_get_args();
    if (($resource = \fdf_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fdf_get_ap($fdf_document, string $field, int $face, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \fdf_get_ap(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_open_string(string $fdf_data): resource
{
    $params = func_get_args();
    if (($resource = \fdf_open_string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fdf_open(string $filename): resource
{
    $params = func_get_args();
    if (($resource = \fdf_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fdf_save_string($fdf_document): string
{
    $params = func_get_args();
    if (($string = \fdf_save_string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function fdf_save($fdf_document, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \fdf_save(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_ap($fdf_document, string $field_name, int $face, string $filename, int $page_number): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_ap(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_encoding($fdf_document, string $encoding): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_file($fdf_document, string $url, string $target_frame): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_flags($fdf_document, string $fieldname, int $whichFlags, int $newFlags): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_flags(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_javascript_action($fdf_document, string $fieldname, int $trigger, string $script): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_javascript_action(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_opt($fdf_document, string $fieldname, int $element, string $str1, string $str2): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_opt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_status($fdf_document, string $status): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_status(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_submit_form_action($fdf_document, string $fieldname, int $trigger, string $script, int $flags): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_submit_form_action(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_target_frame($fdf_document, string $frame_name): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_target_frame(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_value($fdf_document, string $fieldname, $value, int $isName): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_value(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fdf_set_version($fdf_document, string $version): bool
{
    $params = func_get_args();
    if (($bool = \fdf_set_version(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function finfo_close($finfo): bool
{
    $params = func_get_args();
    if (($bool = \finfo_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function filepro_fieldname(int $field_number): string
{
    $params = func_get_args();
    if (($string = \filepro_fieldname(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function filepro_fieldtype(int $field_number): string
{
    $params = func_get_args();
    if (($string = \filepro_fieldtype(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function filepro_fieldwidth(int $field_number): int
{
    $params = func_get_args();
    if (($int = \filepro_fieldwidth(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function filepro_retrieve(int $row_number, int $field_number): string
{
    $params = func_get_args();
    if (($string = \filepro_retrieve(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function filepro(string $directory): bool
{
    $params = func_get_args();
    if (($bool = \filepro(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function chgrp(string $filename, $group): bool
{
    $params = func_get_args();
    if (($bool = \chgrp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function chmod(string $filename, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \chmod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function chown(string $filename, $user): bool
{
    $params = func_get_args();
    if (($bool = \chown(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function copy(string $source, string $dest, $context): bool
{
    $params = func_get_args();
    if (($bool = \copy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function disk_free_space(string $directory): float
{
    $params = func_get_args();
    if (($float = \disk_free_space(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function disk_total_space(string $directory): float
{
    $params = func_get_args();
    if (($float = \disk_total_space(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function fclose($handle): bool
{
    $params = func_get_args();
    if (($bool = \fclose(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fflush($handle): bool
{
    $params = func_get_args();
    if (($bool = \fflush(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fgetc($handle): string
{
    $params = func_get_args();
    if (($string = \fgetc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function file_get_contents(string $filename, bool $use_include_path = FALSE, $context = null, int $offset = 0, int $maxlen = null): string
{
    $params = func_get_args();
    if (($string = \file_get_contents(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function file_put_contents(string $filename, $data, int $flags = 0, $context = null): int
{
    $params = func_get_args();
    if (($int = \file_put_contents(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fileatime(string $filename): int
{
    $params = func_get_args();
    if (($int = \fileatime(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function filectime(string $filename): int
{
    $params = func_get_args();
    if (($int = \filectime(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fileinode(string $filename): int
{
    $params = func_get_args();
    if (($int = \fileinode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function filemtime(string $filename): int
{
    $params = func_get_args();
    if (($int = \filemtime(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fileowner(string $filename): int
{
    $params = func_get_args();
    if (($int = \fileowner(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fopen(string $filename, string $mode, bool $use_include_path = FALSE, $context = null): resource
{
    $params = func_get_args();
    if (($resource = \fopen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function fputcsv($handle, array $fields, string $delimiter = ",", string $enclosure = '"', string $escape_char = "\\"): int
{
    $params = func_get_args();
    if (($int = \fputcsv(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function fread($handle, int $length): string
{
    $params = func_get_args();
    if (($string = \fread(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ftruncate($handle, int $size): bool
{
    $params = func_get_args();
    if (($bool = \ftruncate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fwrite($handle, string $string, int $length): int
{
    $params = func_get_args();
    if (($int = \fwrite(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function glob(string $pattern, int $flags = 0): array
{
    $params = func_get_args();
    if (($array = \glob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function is_uploaded_file(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \is_uploaded_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function lchgrp(string $filename, $group): bool
{
    $params = func_get_args();
    if (($bool = \lchgrp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function lchown(string $filename, $user): bool
{
    $params = func_get_args();
    if (($bool = \lchown(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function link(string $target, string $link): bool
{
    $params = func_get_args();
    if (($bool = \link(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mkdir(string $pathname, int $mode = 0777, bool $recursive = FALSE, $context = null): bool
{
    $params = func_get_args();
    if (($bool = \mkdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function readlink(string $path): string
{
    $params = func_get_args();
    if (($string = \readlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function rename(string $oldname, string $newname, $context): bool
{
    $params = func_get_args();
    if (($bool = \rename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function rewind($handle): bool
{
    $params = func_get_args();
    if (($bool = \rewind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function rmdir(string $dirname, $context): bool
{
    $params = func_get_args();
    if (($bool = \rmdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function symlink(string $target, string $link): bool
{
    $params = func_get_args();
    if (($bool = \symlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function tmpfile(): resource
{
    $params = func_get_args();
    if (($resource = \tmpfile(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function touch(string $filename, int $time = time(), int $atime = null): bool
{
    $params = func_get_args();
    if (($bool = \touch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function unlink(string $filename, $context): bool
{
    $params = func_get_args();
    if (($bool = \unlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function filter_has_var(int $type, string $variable_name): bool
{
    $params = func_get_args();
    if (($bool = \filter_has_var(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fastcgi_finish_request(): bool
{
    $params = func_get_args();
    if (($bool = \fastcgi_finish_request(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function fribidi_log2vis(string $str, string $direction, int $charset): string
{
    $params = func_get_args();
    if (($string = \fribidi_log2vis(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ftp_alloc($ftp_stream, int $filesize, string $result): bool
{
    $params = func_get_args();
    if (($bool = \ftp_alloc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_append($ftp, string $remote_file, string $local_file, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \ftp_append(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_cdup($ftp_stream): bool
{
    $params = func_get_args();
    if (($bool = \ftp_cdup(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_chdir($ftp_stream, string $directory): bool
{
    $params = func_get_args();
    if (($bool = \ftp_chdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_chmod($ftp_stream, int $mode, string $filename): int
{
    $params = func_get_args();
    if (($int = \ftp_chmod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ftp_close($ftp_stream): bool
{
    $params = func_get_args();
    if (($bool = \ftp_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_connect(string $host, int $port = 21, int $timeout = 90): resource
{
    $params = func_get_args();
    if (($resource = \ftp_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ftp_delete($ftp_stream, string $path): bool
{
    $params = func_get_args();
    if (($bool = \ftp_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_fget($ftp_stream, $handle, string $remote_file, int $mode, int $resumepos = 0): bool
{
    $params = func_get_args();
    if (($bool = \ftp_fget(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_fput($ftp_stream, string $remote_file, $handle, int $mode, int $startpos = 0): bool
{
    $params = func_get_args();
    if (($bool = \ftp_fput(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_get($ftp_stream, string $local_file, string $remote_file, int $mode, int $resumepos = 0): bool
{
    $params = func_get_args();
    if (($bool = \ftp_get(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_login($ftp_stream, string $username, string $password): bool
{
    $params = func_get_args();
    if (($bool = \ftp_login(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_mkdir($ftp_stream, string $directory): string
{
    $params = func_get_args();
    if (($string = \ftp_mkdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ftp_mlsd($ftp_stream, string $directory): array
{
    $params = func_get_args();
    if (($array = \ftp_mlsd(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ftp_nlist($ftp_stream, string $directory): array
{
    $params = func_get_args();
    if (($array = \ftp_nlist(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ftp_pasv($ftp_stream, bool $pasv): bool
{
    $params = func_get_args();
    if (($bool = \ftp_pasv(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_put($ftp_stream, string $remote_file, string $local_file, int $mode, int $startpos = 0): bool
{
    $params = func_get_args();
    if (($bool = \ftp_put(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_pwd($ftp_stream): string
{
    $params = func_get_args();
    if (($string = \ftp_pwd(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ftp_rename($ftp_stream, string $oldname, string $newname): bool
{
    $params = func_get_args();
    if (($bool = \ftp_rename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_rmdir($ftp_stream, string $directory): bool
{
    $params = func_get_args();
    if (($bool = \ftp_rmdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_site($ftp_stream, string $command): bool
{
    $params = func_get_args();
    if (($bool = \ftp_site(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ftp_ssl_connect(string $host, int $port = 21, int $timeout = 90): resource
{
    $params = func_get_args();
    if (($resource = \ftp_ssl_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ftp_systype($ftp_stream): string
{
    $params = func_get_args();
    if (($string = \ftp_systype(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function create_function(string $args, string $code): string
{
    $params = func_get_args();
    if (($string = \create_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function func_get_arg(int $arg_num): mixed
{
    $params = func_get_args();
    if (($mixed = \func_get_arg(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function register_tick_function(callable $function, $arg, $...): bool {
    $params = func_get_args();
    if (($bool = \register_tick_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gmp_export(GMP $gmpnumber, int $word_size = 1, int $options =  | ): string {
    $params = func_get_args();
    if (($string = \gmp_export(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function gmp_import(string $data, int $word_size = 1, int $options =  | ): GMP {
    $params = func_get_args();
    if (($GMP = \gmp_import(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $GMP;
}




function gnupg_adddecryptkey($identifier, string $fingerprint, string $passphrase): bool
{
    $params = func_get_args();
    if (($bool = \gnupg_adddecryptkey(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gnupg_addencryptkey($identifier, string $fingerprint): bool
{
    $params = func_get_args();
    if (($bool = \gnupg_addencryptkey(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gnupg_addsignkey($identifier, string $fingerprint, string $passphrase): bool
{
    $params = func_get_args();
    if (($bool = \gnupg_addsignkey(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gnupg_cleardecryptkeys($identifier): bool
{
    $params = func_get_args();
    if (($bool = \gnupg_cleardecryptkeys(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gnupg_clearencryptkeys($identifier): bool
{
    $params = func_get_args();
    if (($bool = \gnupg_clearencryptkeys(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gnupg_clearsignkeys($identifier): bool
{
    $params = func_get_args();
    if (($bool = \gnupg_clearsignkeys(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gnupg_setarmor($identifier, int $armor): bool
{
    $params = func_get_args();
    if (($bool = \gnupg_setarmor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_context_get_host_ip($context): string
{
    $params = func_get_args();
    if (($string = \gupnp_context_get_host_ip(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function gupnp_context_get_port($context): int
{
    $params = func_get_args();
    if (($int = \gupnp_context_get_port(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function gupnp_context_host_path($context, string $local_path, string $server_path): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_context_host_path(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_context_timeout_add($context, int $timeout, $callback, $arg): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_context_timeout_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_context_unhost_path($context, string $server_path): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_context_unhost_path(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_control_point_browse_start($cpoint): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_control_point_browse_start(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_control_point_browse_stop($cpoint): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_control_point_browse_stop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_control_point_callback_set($cpoint, int $signal, $callback, $arg): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_control_point_callback_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_device_action_callback_set($root_device, int $signal, string $action_name, $callback, $arg): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_device_action_callback_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_root_device_get_available($root_device): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_root_device_get_available(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_root_device_set_available($root_device, bool $available): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_root_device_set_available(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_root_device_start($root_device): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_root_device_start(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_root_device_stop($root_device): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_root_device_stop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_action_return_error($action, int $error_code, string $error_description): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_action_return_error(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_action_return($action): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_action_return(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_action_set($action, string $name, int $type, $value): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_action_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_freeze_notify($service): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_freeze_notify(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_notify($service, string $name, int $type, $value): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_notify(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_proxy_action_set($proxy, string $action, string $name, $value, int $type): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_proxy_action_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_proxy_add_notify($proxy, string $value, int $type, $callback, $arg): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_proxy_add_notify(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_proxy_callback_set($proxy, int $signal, $callback, $arg): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_proxy_callback_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_proxy_get_subscribed($proxy): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_proxy_get_subscribed(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_proxy_remove_notify($proxy, string $value): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_proxy_remove_notify(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_proxy_send_action($proxy, string $action, array $in_params, array $out_params): array
{
    $params = func_get_args();
    if (($array = \gupnp_service_proxy_send_action(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function gupnp_service_proxy_set_subscribed($proxy, bool $subscribed): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_proxy_set_subscribed(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gupnp_service_thaw_notify($service): bool
{
    $params = func_get_args();
    if (($bool = \gupnp_service_thaw_notify(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function hash_update_file(HashContext $hcontext, string $filename, $scontext): bool
{
    $params = func_get_args();
    if (($bool = \hash_update_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_add_user($service_handle, string $user_name, string $password, string $first_name, string $middle_name, string $last_name): bool
{
    $params = func_get_args();
    if (($bool = \ibase_add_user(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_blob_cancel($blob_handle): bool
{
    $params = func_get_args();
    if (($bool = \ibase_blob_cancel(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_blob_create($link_identifier): resource
{
    $params = func_get_args();
    if (($resource = \ibase_blob_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_blob_echo(string $blob_id): bool
{
    $params = func_get_args();
    if (($bool = \ibase_blob_echo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_blob_echo($link_identifier, string $blob_id): bool
{
    $params = func_get_args();
    if (($bool = \ibase_blob_echo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_blob_import($link_identifier, $file_handle): string
{
    $params = func_get_args();
    if (($string = \ibase_blob_import(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ibase_blob_import($file_handle): string
{
    $params = func_get_args();
    if (($string = \ibase_blob_import(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ibase_blob_open($link_identifier, string $blob_id): resource
{
    $params = func_get_args();
    if (($resource = \ibase_blob_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_blob_open(string $blob_id): resource
{
    $params = func_get_args();
    if (($resource = \ibase_blob_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_close($connection_id): bool
{
    $params = func_get_args();
    if (($bool = \ibase_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_commit_ret($link_or_trans_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ibase_commit_ret(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_commit($link_or_trans_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ibase_commit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_connect(string $database, string $username, string $password, string $charset, int $buffers, int $dialect, string $role, int $sync): resource
{
    $params = func_get_args();
    if (($resource = \ibase_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_delete_user($service_handle, string $user_name): bool
{
    $params = func_get_args();
    if (($bool = \ibase_delete_user(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_drop_db($connection): bool
{
    $params = func_get_args();
    if (($bool = \ibase_drop_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_free_event_handler($event): bool
{
    $params = func_get_args();
    if (($bool = \ibase_free_event_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_free_query($query): bool
{
    $params = func_get_args();
    if (($bool = \ibase_free_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_free_result($result_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ibase_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_maintain_db($service_handle, string $db, int $action, int $argument = 0): bool
{
    $params = func_get_args();
    if (($bool = \ibase_maintain_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_modify_user($service_handle, string $user_name, string $password, string $first_name, string $middle_name, string $last_name): bool
{
    $params = func_get_args();
    if (($bool = \ibase_modify_user(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_name_result($result, string $name): bool
{
    $params = func_get_args();
    if (($bool = \ibase_name_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_pconnect(string $database, string $username, string $password, string $charset, int $buffers, int $dialect, string $role, int $sync): resource
{
    $params = func_get_args();
    if (($resource = \ibase_pconnect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_prepare(string $query): resource
{
    $params = func_get_args();
    if (($resource = \ibase_prepare(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_prepare($link_identifier, string $query): resource
{
    $params = func_get_args();
    if (($resource = \ibase_prepare(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_prepare($link_identifier, string $trans, string $query): resource
{
    $params = func_get_args();
    if (($resource = \ibase_prepare(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_rollback_ret($link_or_trans_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ibase_rollback_ret(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_rollback($link_or_trans_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ibase_rollback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_service_detach($service_handle): bool
{
    $params = func_get_args();
    if (($bool = \ibase_service_detach(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ibase_trans(int $trans_args, $link_identifier): resource
{
    $params = func_get_args();
    if (($resource = \ibase_trans(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ibase_trans($link_identifier, int $trans_args): resource
{
    $params = func_get_args();
    if (($resource = \ibase_trans(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function db2_autocommit($connection, bool $value): mixed
{
    $params = func_get_args();
    if (($mixed = \db2_autocommit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function db2_bind_param($stmt, int $parameter-number, string $variable - name, int $parameter - type, int $data - type = 0, int $precision = -1, int $scale = 0): bool {
    $params = func_get_args();
    if (($bool = \db2_bind_param(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_close($connection): bool
{
    $params = func_get_args();
    if (($bool = \db2_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_commit($connection): bool
{
    $params = func_get_args();
    if (($bool = \db2_commit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_execute($stmt, array $parameters): bool
{
    $params = func_get_args();
    if (($bool = \db2_execute(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_free_result($stmt): bool
{
    $params = func_get_args();
    if (($bool = \db2_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_free_stmt($stmt): bool
{
    $params = func_get_args();
    if (($bool = \db2_free_stmt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_get_option($resource, string $option): string
{
    $params = func_get_args();
    if (($string = \db2_get_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function db2_pclose($resource): bool
{
    $params = func_get_args();
    if (($bool = \db2_pclose(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_rollback($connection): bool
{
    $params = func_get_args();
    if (($bool = \db2_rollback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function db2_set_option($resource, array $options, int $type): bool
{
    $params = func_get_args();
    if (($bool = \db2_set_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function iconv_get_encoding(string $type = "all"): mixed
{
    $params = func_get_args();
    if (($mixed = \iconv_get_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function iconv_set_encoding(string $type, string $charset): bool
{
    $params = func_get_args();
    if (($bool = \iconv_set_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function iconv_strpos(string $haystack, string $needle, int $offset = 0, string $charset = ini_get("iconv.internal_encoding")): int
{
    $params = func_get_args();
    if (($int = \iconv_strpos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function iconv_strrpos(string $haystack, string $needle, string $charset = ini_get("iconv.internal_encoding")): int
{
    $params = func_get_args();
    if (($int = \iconv_strrpos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function iconv(string $in_charset, string $out_charset, string $str): string
{
    $params = func_get_args();
    if (($string = \iconv(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function id3_get_frame_long_name(string $frameId): string
{
    $params = func_get_args();
    if (($string = \id3_get_frame_long_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function id3_get_frame_short_name(string $frameId): string
{
    $params = func_get_args();
    if (($string = \id3_get_frame_short_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function id3_get_genre_id(string $genre): int
{
    $params = func_get_args();
    if (($int = \id3_get_genre_id(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function id3_remove_tag(string $filename, int $version = ID3_V1_0): bool
{
    $params = func_get_args();
    if (($bool = \id3_remove_tag(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function id3_set_tag(string $filename, array $tag, int $version = ID3_V1_0): bool
{
    $params = func_get_args();
    if (($bool = \id3_set_tag(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_blobinfile_mode(int $mode): bool
{
    $params = func_get_args();
    if (($bool = \ifx_blobinfile_mode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_byteasvarchar(int $mode): bool
{
    $params = func_get_args();
    if (($bool = \ifx_byteasvarchar(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_close($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ifx_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_connect(string $database, string $userid, string $password): resource
{
    $params = func_get_args();
    if (($resource = \ifx_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ifx_copy_blob(int $bid): int
{
    $params = func_get_args();
    if (($int = \ifx_copy_blob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifx_create_blob(int $type, int $mode, string $param): int
{
    $params = func_get_args();
    if (($int = \ifx_create_blob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifx_create_char(string $param): int
{
    $params = func_get_args();
    if (($int = \ifx_create_char(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifx_do($result_id): bool
{
    $params = func_get_args();
    if (($bool = \ifx_do(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_fieldproperties($result_id): array
{
    $params = func_get_args();
    if (($array = \ifx_fieldproperties(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ifx_fieldtypes($result_id): array
{
    $params = func_get_args();
    if (($array = \ifx_fieldtypes(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ifx_free_blob(int $bid): bool
{
    $params = func_get_args();
    if (($bool = \ifx_free_blob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_free_char(int $bid): bool
{
    $params = func_get_args();
    if (($bool = \ifx_free_char(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_free_result($result_id): bool
{
    $params = func_get_args();
    if (($bool = \ifx_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_get_blob(int $bid): string
{
    $params = func_get_args();
    if (($string = \ifx_get_blob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ifx_get_char(int $bid): string
{
    $params = func_get_args();
    if (($string = \ifx_get_char(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ifx_htmltbl_result($result_id, string $html_table_options): int
{
    $params = func_get_args();
    if (($int = \ifx_htmltbl_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifx_nullformat(int $mode): bool
{
    $params = func_get_args();
    if (($bool = \ifx_nullformat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_num_fields($result_id): int
{
    $params = func_get_args();
    if (($int = \ifx_num_fields(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifx_num_rows($result_id): int
{
    $params = func_get_args();
    if (($int = \ifx_num_rows(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifx_prepare(string $query, $link_identifier, int $cursor_def, $blobidarray): resource
{
    $params = func_get_args();
    if (($resource = \ifx_prepare(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ifx_query(string $query, $link_identifier, int $cursor_type, $blobidarray): resource
{
    $params = func_get_args();
    if (($resource = \ifx_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ifx_textasvarchar(int $mode): bool
{
    $params = func_get_args();
    if (($bool = \ifx_textasvarchar(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_update_blob(int $bid, string $content): bool
{
    $params = func_get_args();
    if (($bool = \ifx_update_blob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifx_update_char(int $bid, string $content): bool
{
    $params = func_get_args();
    if (($bool = \ifx_update_char(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifxus_close_slob(int $bid): bool
{
    $params = func_get_args();
    if (($bool = \ifxus_close_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifxus_create_slob(int $mode): int
{
    $params = func_get_args();
    if (($int = \ifxus_create_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifxus_free_slob(int $bid): bool
{
    $params = func_get_args();
    if (($bool = \ifxus_free_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ifxus_open_slob(int $bid, int $mode): int
{
    $params = func_get_args();
    if (($int = \ifxus_open_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifxus_read_slob(int $bid, int $nbytes): string
{
    $params = func_get_args();
    if (($string = \ifxus_read_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ifxus_seek_slob(int $bid, int $mode, int $offset): int
{
    $params = func_get_args();
    if (($int = \ifxus_seek_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifxus_tell_slob(int $bid): int
{
    $params = func_get_args();
    if (($int = \ifxus_tell_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ifxus_write_slob(int $bid, string $content): int
{
    $params = func_get_args();
    if (($int = \ifxus_write_slob(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function image2wbmp($image, string $filename, int $foreground): bool
{
    $params = func_get_args();
    if (($bool = \image2wbmp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageaffine($image, array $affine, array $clip): resource
{
    $params = func_get_args();
    if (($resource = \imageaffine(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function imageaffinematrixconcat(array $m1, array $m2): array
{
    $params = func_get_args();
    if (($array = \imageaffinematrixconcat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function imageaffinematrixget(int $type, $options): array
{
    $params = func_get_args();
    if (($array = \imageaffinematrixget(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function imagealphablending($image, bool $blendmode): bool
{
    $params = func_get_args();
    if (($bool = \imagealphablending(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageantialias($image, bool $enabled): bool
{
    $params = func_get_args();
    if (($bool = \imageantialias(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagearc($image, int $cx, int $cy, int $width, int $height, int $start, int $end, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagearc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagebmp($image, $to, bool $compressed = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \imagebmp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagechar($image, int $font, int $x, int $y, string $c, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagechar(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecharup($image, int $font, int $x, int $y, string $c, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagecharup(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecolorallocate($image, int $red, int $green, int $blue): int
{
    $params = func_get_args();
    if (($int = \imagecolorallocate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function imagecolorallocatealpha($image, int $red, int $green, int $blue, int $alpha): int
{
    $params = func_get_args();
    if (($int = \imagecolorallocatealpha(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function imagecolorat($image, int $x, int $y): int
{
    $params = func_get_args();
    if (($int = \imagecolorat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function imagecolordeallocate($image, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagecolordeallocate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecolormatch($image1, $image2): bool
{
    $params = func_get_args();
    if (($bool = \imagecolormatch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageconvolution($image, array $matrix, float $div, float $offset): bool
{
    $params = func_get_args();
    if (($bool = \imageconvolution(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecopy($dst_im, $src_im, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_w, int $src_h): bool
{
    $params = func_get_args();
    if (($bool = \imagecopy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecopymerge($dst_im, $src_im, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_w, int $src_h, int $pct): bool
{
    $params = func_get_args();
    if (($bool = \imagecopymerge(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecopymergegray($dst_im, $src_im, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_w, int $src_h, int $pct): bool
{
    $params = func_get_args();
    if (($bool = \imagecopymergegray(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecopyresampled($dst_image, $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_w, int $dst_h, int $src_w, int $src_h): bool
{
    $params = func_get_args();
    if (($bool = \imagecopyresampled(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecopyresized($dst_image, $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_w, int $dst_h, int $src_w, int $src_h): bool
{
    $params = func_get_args();
    if (($bool = \imagecopyresized(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagecrop($image, array $rect): resource
{
    $params = func_get_args();
    if (($resource = \imagecrop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function imagecropauto($image, int $mode = -1, float $threshold = .5, int $color = -1): resource
{
    $params = func_get_args();
    if (($resource = \imagecropauto(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function imagedashedline($image, int $x1, int $y1, int $x2, int $y2, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagedashedline(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagedestroy($image): bool
{
    $params = func_get_args();
    if (($bool = \imagedestroy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageellipse($image, int $cx, int $cy, int $width, int $height, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imageellipse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagefill($image, int $x, int $y, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagefill(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagefilledarc($image, int $cx, int $cy, int $width, int $height, int $start, int $end, int $color, int $style): bool
{
    $params = func_get_args();
    if (($bool = \imagefilledarc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagefilledellipse($image, int $cx, int $cy, int $width, int $height, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagefilledellipse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagefilledpolygon($image, array $points, int $num_points, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagefilledpolygon(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagefilledrectangle($image, int $x1, int $y1, int $x2, int $y2, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagefilledrectangle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagefilltoborder($image, int $x, int $y, int $border, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagefilltoborder(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagefilter($image, int $filtertype, int $arg1, int $arg2, int $arg3, int $arg4): bool
{
    $params = func_get_args();
    if (($bool = \imagefilter(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageflip($image, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \imageflip(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagegammacorrect($image, float $inputgamma, float $outputgamma): bool
{
    $params = func_get_args();
    if (($bool = \imagegammacorrect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagegd($image, $to = NULL): bool
{
    $params = func_get_args();
    if (($bool = \imagegd(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagegd2($image, $to = NULL, int $chunk_size = 128, int $type = IMG_GD2_RAW): bool
{
    $params = func_get_args();
    if (($bool = \imagegd2(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagegif($image, $to): bool
{
    $params = func_get_args();
    if (($bool = \imagegif(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagejpeg($image, $to, int $quality): bool
{
    $params = func_get_args();
    if (($bool = \imagejpeg(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagelayereffect($image, int $effect): bool
{
    $params = func_get_args();
    if (($bool = \imagelayereffect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageline($image, int $x1, int $y1, int $x2, int $y2, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imageline(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageloadfont(string $file): int
{
    $params = func_get_args();
    if (($int = \imageloadfont(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function imageopenpolygon($image, array $points, int $num_points, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imageopenpolygon(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagepng($image, $to, int $quality, int $filters): bool
{
    $params = func_get_args();
    if (($bool = \imagepng(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagepolygon($image, array $points, int $num_points, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagepolygon(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagepsencodefont($font_index, string $encodingfile): bool
{
    $params = func_get_args();
    if (($bool = \imagepsencodefont(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagepsextendfont($font_index, float $extend): bool
{
    $params = func_get_args();
    if (($bool = \imagepsextendfont(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagepsfreefont($font_index): bool
{
    $params = func_get_args();
    if (($bool = \imagepsfreefont(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagepsslantfont($font_index, float $slant): bool
{
    $params = func_get_args();
    if (($bool = \imagepsslantfont(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagerectangle($image, int $x1, int $y1, int $x2, int $y2, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagerectangle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imageresolution($image, int $res_x, int $res_y): mixed
{
    $params = func_get_args();
    if (($mixed = \imageresolution(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function imagerotate($image, float $angle, int $bgd_color, int $ignore_transparent = 0): resource
{
    $params = func_get_args();
    if (($resource = \imagerotate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function imagesavealpha($image, bool $saveflag): bool
{
    $params = func_get_args();
    if (($bool = \imagesavealpha(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagescale($image, int $new_width, int $new_height = -1, int $mode = IMG_BILINEAR_FIXED): resource
{
    $params = func_get_args();
    if (($resource = \imagescale(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function imagesetbrush($image, $brush): bool
{
    $params = func_get_args();
    if (($bool = \imagesetbrush(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagesetclip($im, int $x1, int $y1, int $x2, int $y2): bool
{
    $params = func_get_args();
    if (($bool = \imagesetclip(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagesetinterpolation($image, int $method = IMG_BILINEAR_FIXED): bool
{
    $params = func_get_args();
    if (($bool = \imagesetinterpolation(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagesetpixel($image, int $x, int $y, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagesetpixel(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagesetstyle($image, array $style): bool
{
    $params = func_get_args();
    if (($bool = \imagesetstyle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagesetthickness($image, int $thickness): bool
{
    $params = func_get_args();
    if (($bool = \imagesetthickness(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagesettile($image, $tile): bool
{
    $params = func_get_args();
    if (($bool = \imagesettile(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagestring($image, int $font, int $x, int $y, string $string, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagestring(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagestringup($image, int $font, int $x, int $y, string $string, int $color): bool
{
    $params = func_get_args();
    if (($bool = \imagestringup(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagetruecolortopalette($image, bool $dither, int $ncolors): bool
{
    $params = func_get_args();
    if (($bool = \imagetruecolortopalette(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagettfbbox(float $size, float $angle, string $fontfile, string $text): array
{
    $params = func_get_args();
    if (($array = \imagettfbbox(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function imagettftext($image, float $size, float $angle, int $x, int $y, int $color, string $fontfile, string $text): array
{
    $params = func_get_args();
    if (($array = \imagettftext(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function imagewbmp($image, $to, int $foreground): bool
{
    $params = func_get_args();
    if (($bool = \imagewbmp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagewebp($image, $to, int $quality = 80): bool
{
    $params = func_get_args();
    if (($bool = \imagewebp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imagexbm($image, string $filename, int $foreground): bool
{
    $params = func_get_args();
    if (($bool = \imagexbm(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function iptcembed(string $iptcdata, string $jpeg_file_name, int $spool = 0): mixed
{
    $params = func_get_args();
    if (($mixed = \iptcembed(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function iptcparse(string $iptcblock): array
{
    $params = func_get_args();
    if (($array = \iptcparse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function jpeg2wbmp(string $jpegname, string $wbmpname, int $dest_height, int $dest_width, int $threshold): bool
{
    $params = func_get_args();
    if (($bool = \jpeg2wbmp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function png2wbmp(string $pngname, string $wbmpname, int $dest_height, int $dest_width, int $threshold): bool
{
    $params = func_get_args();
    if (($bool = \png2wbmp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_append($imap_stream, string $mailbox, string $message, string $options, string $internal_date): bool
{
    $params = func_get_args();
    if (($bool = \imap_append(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_clearflag_full($imap_stream, string $sequence, string $flag, int $options = 0): bool
{
    $params = func_get_args();
    if (($bool = \imap_clearflag_full(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_close($imap_stream, int $flag = 0): bool
{
    $params = func_get_args();
    if (($bool = \imap_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_createmailbox($imap_stream, string $mailbox): bool
{
    $params = func_get_args();
    if (($bool = \imap_createmailbox(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_deletemailbox($imap_stream, string $mailbox): bool
{
    $params = func_get_args();
    if (($bool = \imap_deletemailbox(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_gc($imap_stream, int $caches): bool
{
    $params = func_get_args();
    if (($bool = \imap_gc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_headerinfo($imap_stream, int $msg_number, int $fromlength = 0, int $subjectlength = 0, string $defaulthost = null): object
{
    $params = func_get_args();
    if (($object = \imap_headerinfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $object;
}



function imap_mail_copy($imap_stream, string $msglist, string $mailbox, int $options = 0): bool
{
    $params = func_get_args();
    if (($bool = \imap_mail_copy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_mail_move($imap_stream, string $msglist, string $mailbox, int $options = 0): bool
{
    $params = func_get_args();
    if (($bool = \imap_mail_move(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_mail(string $to, string $subject, string $message, string $additional_headers, string $cc, string $bcc, string $rpath): bool
{
    $params = func_get_args();
    if (($bool = \imap_mail(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_mutf7_to_utf8(string $in): string
{
    $params = func_get_args();
    if (($string = \imap_mutf7_to_utf8(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function imap_num_msg($imap_stream): int
{
    $params = func_get_args();
    if (($int = \imap_num_msg(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function imap_open(string $mailbox, string $username, string $password, int $options = 0, int $n_retries = 0, array $params = null): resource
{
    $params = func_get_args();
    if (($resource = \imap_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function imap_renamemailbox($imap_stream, string $old_mbox, string $new_mbox): bool
{
    $params = func_get_args();
    if (($bool = \imap_renamemailbox(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_savebody($imap_stream, $file, int $msg_number, string $part_number = "", int $options = 0): bool
{
    $params = func_get_args();
    if (($bool = \imap_savebody(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_set_quota($imap_stream, string $quota_root, int $quota_limit): bool
{
    $params = func_get_args();
    if (($bool = \imap_set_quota(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_setacl($imap_stream, string $mailbox, string $id, string $rights): bool
{
    $params = func_get_args();
    if (($bool = \imap_setacl(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_setflag_full($imap_stream, string $sequence, string $flag, int $options = NIL): bool
{
    $params = func_get_args();
    if (($bool = \imap_setflag_full(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_subscribe($imap_stream, string $mailbox): bool
{
    $params = func_get_args();
    if (($bool = \imap_subscribe(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_undelete($imap_stream, int $msg_number, int $flags = 0): bool
{
    $params = func_get_args();
    if (($bool = \imap_undelete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_unsubscribe($imap_stream, string $mailbox): bool
{
    $params = func_get_args();
    if (($bool = \imap_unsubscribe(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function imap_utf8_to_mutf7(string $in): string
{
    $params = func_get_args();
    if (($string = \imap_utf8_to_mutf7(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function assert_options(int $what, $value): mixed
{
    $params = func_get_args();
    if (($mixed = \assert_options(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function cli_set_process_title(string $title): bool
{
    $params = func_get_args();
    if (($bool = \cli_set_process_title(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dl(string $library): bool
{
    $params = func_get_args();
    if (($bool = \dl(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function getlastmod(): int
{
    $params = func_get_args();
    if (($int = \getlastmod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function getmygid(): int
{
    $params = func_get_args();
    if (($int = \getmygid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function getmyinode(): int
{
    $params = func_get_args();
    if (($int = \getmyinode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function getmypid(): int
{
    $params = func_get_args();
    if (($int = \getmypid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function getmyuid(): int
{
    $params = func_get_args();
    if (($int = \getmyuid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function phpcredits(int $flag = CREDITS_ALL): bool
{
    $params = func_get_args();
    if (($bool = \phpcredits(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function phpinfo(int $what = INFO_ALL): bool
{
    $params = func_get_args();
    if (($bool = \phpinfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function putenv(string $setting): bool
{
    $params = func_get_args();
    if (($bool = \putenv(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function set_include_path(string $new_include_path): string
{
    $params = func_get_args();
    if (($string = \set_include_path(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function set_magic_quotes_runtime(bool $new_setting): bool
{
    $params = func_get_args();
    if (($bool = \set_magic_quotes_runtime(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_autocommit($link): bool
{
    $params = func_get_args();
    if (($bool = \ingres_autocommit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_close($link): bool
{
    $params = func_get_args();
    if (($bool = \ingres_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_commit($link): bool
{
    $params = func_get_args();
    if (($bool = \ingres_commit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_execute($result, array $params, string $types): bool
{
    $params = func_get_args();
    if (($bool = \ingres_execute(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_field_name($result, int $index): string
{
    $params = func_get_args();
    if (($string = \ingres_field_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ingres_field_type($result, int $index): string
{
    $params = func_get_args();
    if (($string = \ingres_field_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ingres_free_result($result): bool
{
    $params = func_get_args();
    if (($bool = \ingres_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_result_seek($result, int $position): bool
{
    $params = func_get_args();
    if (($bool = \ingres_result_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_rollback($link): bool
{
    $params = func_get_args();
    if (($bool = \ingres_rollback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ingres_set_environment($link, array $options): bool
{
    $params = func_get_args();
    if (($bool = \ingres_set_environment(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function inotify_init(): resource
{
    $params = func_get_args();
    if (($resource = \inotify_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function inotify_rm_watch($inotify_instance, int $watch_descriptor): bool
{
    $params = func_get_args();
    if (($bool = \inotify_rm_watch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function json_encode($value, int $options = 0, int $depth = 512): string
{
    $params = func_get_args();
    if (($string = \json_encode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function json_last_error_msg(): string
{
    $params = func_get_args();
    if (($string = \json_last_error_msg(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function kadm5_chpass_principal($handle, string $principal, string $password): bool
{
    $params = func_get_args();
    if (($bool = \kadm5_chpass_principal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function kadm5_create_principal($handle, string $principal, string $password, array $options): bool
{
    $params = func_get_args();
    if (($bool = \kadm5_create_principal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function kadm5_delete_principal($handle, string $principal): bool
{
    $params = func_get_args();
    if (($bool = \kadm5_delete_principal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function kadm5_destroy($handle): bool
{
    $params = func_get_args();
    if (($bool = \kadm5_destroy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function kadm5_flush($handle): bool
{
    $params = func_get_args();
    if (($bool = \kadm5_flush(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function kadm5_get_policies($handle): array
{
    $params = func_get_args();
    if (($array = \kadm5_get_policies(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function kadm5_get_principal($handle, string $principal): array
{
    $params = func_get_args();
    if (($array = \kadm5_get_principal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function kadm5_get_principals($handle): array
{
    $params = func_get_args();
    if (($array = \kadm5_get_principals(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function kadm5_init_with_password(string $admin_server, string $realm, string $principal, string $password): resource
{
    $params = func_get_args();
    if (($resource = \kadm5_init_with_password(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function kadm5_modify_principal($handle, string $principal, array $options): bool
{
    $params = func_get_args();
    if (($bool = \kadm5_modify_principal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_add($link_identifier, string $dn, array $entry, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_bind($link_identifier, string $bind_rdn, string $bind_password): bool
{
    $params = func_get_args();
    if (($bool = \ldap_bind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_control_paged_result_response($link, $result, string $cookie, int $estimated): bool
{
    $params = func_get_args();
    if (($bool = \ldap_control_paged_result_response(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_control_paged_result($link, int $pagesize, bool $iscritical = FALSE, string $cookie = ""): bool
{
    $params = func_get_args();
    if (($bool = \ldap_control_paged_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_count_entries($link_identifier, $result_identifier): int
{
    $params = func_get_args();
    if (($int = \ldap_count_entries(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ldap_delete($link_identifier, string $dn, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_exop_whoami($link): string
{
    $params = func_get_args();
    if (($string = \ldap_exop_whoami(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ldap_exop($link, string $reqoid, string $reqdata, array $servercontrols, string $retdata, string $retoid): mixed
{
    $params = func_get_args();
    if (($mixed = \ldap_exop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function ldap_explode_dn(string $dn, int $with_attrib): array
{
    $params = func_get_args();
    if (($array = \ldap_explode_dn(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ldap_first_entry($link_identifier, $result_identifier): resource
{
    $params = func_get_args();
    if (($resource = \ldap_first_entry(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ldap_free_result($result_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ldap_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_get_attributes($link_identifier, $result_entry_identifier): array
{
    $params = func_get_args();
    if (($array = \ldap_get_attributes(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ldap_get_dn($link_identifier, $result_entry_identifier): string
{
    $params = func_get_args();
    if (($string = \ldap_get_dn(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ldap_get_entries($link_identifier, $result_identifier): array
{
    $params = func_get_args();
    if (($array = \ldap_get_entries(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ldap_get_option($link_identifier, int $option, $retval): bool
{
    $params = func_get_args();
    if (($bool = \ldap_get_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_list($link_identifier, string $base_dn, string $filter, array $attributes, int $attrsonly, int $sizelimit, int $timelimit, int $deref, array $serverctrls): resource
{
    $params = func_get_args();
    if (($resource = \ldap_list(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ldap_mod_add($link_identifier, string $dn, array $entry, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_mod_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_mod_del($link_identifier, string $dn, array $entry, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_mod_del(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_mod_replace($link_identifier, string $dn, array $entry, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_mod_replace(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_modify_batch($link_identifier, string $dn, array $entry, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_modify_batch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_parse_exop($link, $result, string $retdata, string $retoid): bool
{
    $params = func_get_args();
    if (($bool = \ldap_parse_exop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_parse_result($link, $result, int $errcode, string $matcheddn, string $errmsg, array $referrals, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_parse_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_read($link_identifier, string $base_dn, string $filter, array $attributes, int $attrsonly, int $sizelimit, int $timelimit, int $deref, array $serverctrls): resource
{
    $params = func_get_args();
    if (($resource = \ldap_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ldap_rename($link_identifier, string $dn, string $newrdn, string $newparent, bool $deleteoldrdn, array $serverctrls): bool
{
    $params = func_get_args();
    if (($bool = \ldap_rename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_sasl_bind($link, string $binddn, string $password, string $sasl_mech, string $sasl_realm, string $sasl_authc_id, string $sasl_authz_id, string $props): bool
{
    $params = func_get_args();
    if (($bool = \ldap_sasl_bind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_search($link_identifier, string $base_dn, string $filter, array $attributes, int $attrsonly, int $sizelimit, int $timelimit, int $deref, array $serverctrls): resource
{
    $params = func_get_args();
    if (($resource = \ldap_search(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ldap_set_option($link_identifier, int $option, $newval): bool
{
    $params = func_get_args();
    if (($bool = \ldap_set_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ldap_unbind($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \ldap_unbind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_add($event, int $timeout = -1): bool
{
    $params = func_get_args();
    if (($bool = \event_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_base_loopbreak($event_base): bool
{
    $params = func_get_args();
    if (($bool = \event_base_loopbreak(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_base_loopexit($event_base, int $timeout = -1): bool
{
    $params = func_get_args();
    if (($bool = \event_base_loopexit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_base_new(): resource
{
    $params = func_get_args();
    if (($resource = \event_base_new(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function event_base_priority_init($event_base, int $npriorities): bool
{
    $params = func_get_args();
    if (($bool = \event_base_priority_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_base_reinit($event_base): bool
{
    $params = func_get_args();
    if (($bool = \event_base_reinit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_base_set($event, $event_base): bool
{
    $params = func_get_args();
    if (($bool = \event_base_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_buffer_base_set($bevent, $event_base): bool
{
    $params = func_get_args();
    if (($bool = \event_buffer_base_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_buffer_disable($bevent, int $events): bool
{
    $params = func_get_args();
    if (($bool = \event_buffer_disable(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_buffer_enable($bevent, int $events): bool
{
    $params = func_get_args();
    if (($bool = \event_buffer_enable(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_buffer_new($stream, $readcb, $writecb, $errorcb, $arg): resource
{
    $params = func_get_args();
    if (($resource = \event_buffer_new(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function event_buffer_priority_set($bevent, int $priority): bool
{
    $params = func_get_args();
    if (($bool = \event_buffer_priority_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_buffer_set_callback($event, $readcb, $writecb, $errorcb, $arg): bool
{
    $params = func_get_args();
    if (($bool = \event_buffer_set_callback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_buffer_write($bevent, string $data, int $data_size = -1): bool
{
    $params = func_get_args();
    if (($bool = \event_buffer_write(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_del($event): bool
{
    $params = func_get_args();
    if (($bool = \event_del(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_new(): resource
{
    $params = func_get_args();
    if (($resource = \event_new(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function event_priority_set($event, int $priority): bool
{
    $params = func_get_args();
    if (($bool = \event_priority_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_set($event, $fd, int $events, $callback, $arg): bool
{
    $params = func_get_args();
    if (($bool = \event_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function event_timer_set($event, callable $callback, $arg): bool
{
    $params = func_get_args();
    if (($bool = \event_timer_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function libxml_set_external_entity_loader(callable $resolver_function): bool
{
    $params = func_get_args();
    if (($bool = \libxml_set_external_entity_loader(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mailparse_msg_extract_part_file($mimemail, $filename, callable $callbackfunc): string
{
    $params = func_get_args();
    if (($string = \mailparse_msg_extract_part_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mailparse_msg_free($mimemail): bool
{
    $params = func_get_args();
    if (($bool = \mailparse_msg_free(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mailparse_msg_parse_file(string $filename): resource
{
    $params = func_get_args();
    if (($resource = \mailparse_msg_parse_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function mailparse_msg_parse($mimemail, string $data): bool
{
    $params = func_get_args();
    if (($bool = \mailparse_msg_parse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mailparse_stream_encode($sourcefp, $destfp, string $encoding): bool
{
    $params = func_get_args();
    if (($bool = \mailparse_stream_encode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function maxdb_report(int $flags): bool
{
    $params = func_get_args();
    if (($bool = \maxdb_report(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mb_check_encoding(string $var, string $encoding = mb_internal_encoding()): bool
{
    $params = func_get_args();
    if (($bool = \mb_check_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mb_chr(int $cp, string $encoding): string
{
    $params = func_get_args();
    if (($string = \mb_chr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mb_encoding_aliases(string $encoding): array
{
    $params = func_get_args();
    if (($array = \mb_encoding_aliases(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function mb_ereg_replace_callback(string $pattern, callable $callback, string $string, string $option = "msr"): string
{
    $params = func_get_args();
    if (($string = \mb_ereg_replace_callback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mb_ereg_replace(string $pattern, string $replacement, string $string, string $option = "msr"): string
{
    $params = func_get_args();
    if (($string = \mb_ereg_replace(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mb_ereg_search_getregs(): array
{
    $params = func_get_args();
    if (($array = \mb_ereg_search_getregs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function mb_ereg_search_init(string $string, string $pattern, string $option = "msr"): bool
{
    $params = func_get_args();
    if (($bool = \mb_ereg_search_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mb_ereg_search_regs(string $pattern, string $option = "ms"): array
{
    $params = func_get_args();
    if (($array = \mb_ereg_search_regs(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function mb_ereg_search_setpos(int $position): bool
{
    $params = func_get_args();
    if (($bool = \mb_ereg_search_setpos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mb_eregi_replace(string $pattern, string $replace, string $string, string $option = "msri"): string
{
    $params = func_get_args();
    if (($string = \mb_eregi_replace(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mb_http_output(string $encoding = mb_http_output()): mixed
{
    $params = func_get_args();
    if (($mixed = \mb_http_output(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function mb_internal_encoding(string $encoding = mb_internal_encoding()): mixed
{
    $params = func_get_args();
    if (($mixed = \mb_internal_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function mb_ord(string $str, string $encoding): int
{
    $params = func_get_args();
    if (($int = \mb_ord(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mb_parse_str(string $encoded_string, array $result): bool
{
    $params = func_get_args();
    if (($bool = \mb_parse_str(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mb_regex_encoding(string $encoding = mb_regex_encoding()): mixed
{
    $params = func_get_args();
    if (($mixed = \mb_regex_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function mb_send_mail(string $to, string $subject, string $message, $additional_headers, string $additional_parameter): bool
{
    $params = func_get_args();
    if (($bool = \mb_send_mail(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mb_strlen(string $str, string $encoding = mb_internal_encoding()): int
{
    $params = func_get_args();
    if (($int = \mb_strlen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mcrypt_create_iv(int $size, int $source = MCRYPT_DEV_URANDOM): string
{
    $params = func_get_args();
    if (($string = \mcrypt_create_iv(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mcrypt_decrypt(string $cipher, string $key, string $data, string $mode, string $iv): string
{
    $params = func_get_args();
    if (($string = \mcrypt_decrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mcrypt_encrypt(string $cipher, string $key, string $data, string $mode, string $iv): string
{
    $params = func_get_args();
    if (($string = \mcrypt_encrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mcrypt_generic_deinit($td): bool
{
    $params = func_get_args();
    if (($bool = \mcrypt_generic_deinit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mcrypt_generic_end($td): bool
{
    $params = func_get_args();
    if (($bool = \mcrypt_generic_end(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mcrypt_get_block_size(int $cipher): int
{
    $params = func_get_args();
    if (($int = \mcrypt_get_block_size(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mcrypt_get_block_size(string $cipher, string $mode): int
{
    $params = func_get_args();
    if (($int = \mcrypt_get_block_size(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mcrypt_get_key_size(int $cipher): int
{
    $params = func_get_args();
    if (($int = \mcrypt_get_key_size(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mcrypt_get_key_size(string $cipher, string $mode): int
{
    $params = func_get_args();
    if (($int = \mcrypt_get_key_size(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mcrypt_module_close($td): bool
{
    $params = func_get_args();
    if (($bool = \mcrypt_module_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mcrypt_module_open(string $algorithm, string $algorithm_directory, string $mode, string $mode_directory): resource
{
    $params = func_get_args();
    if (($resource = \mcrypt_module_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function mhash_keygen_s2k(int $hash, string $password, string $salt, int $bytes): string
{
    $params = func_get_args();
    if (($string = \mhash_keygen_s2k(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mhash(int $hash, string $data, string $key): string
{
    $params = func_get_args();
    if (($string = \mhash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function define(string $name, $value, bool $case_insensitive = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \define(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sapi_windows_cp_set(int $cp): bool
{
    $params = func_get_args();
    if (($bool = \sapi_windows_cp_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sapi_windows_vt100_support($stream, bool $enable): bool
{
    $params = func_get_args();
    if (($bool = \sapi_windows_vt100_support(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sleep(int $seconds): int
{
    $params = func_get_args();
    if (($int = \sleep(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function time_nanosleep(int $seconds, int $nanoseconds): mixed
{
    $params = func_get_args();
    if (($mixed = \time_nanosleep(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function time_sleep_until(float $timestamp): bool
{
    $params = func_get_args();
    if (($bool = \time_sleep_until(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function udm_add_search_limit($agent, int $var, string $val): bool
{
    $params = func_get_args();
    if (($bool = \udm_add_search_limit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function udm_alloc_agent_array(array $databases): resource
{
    $params = func_get_args();
    if (($resource = \udm_alloc_agent_array(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function udm_find($agent, string $query): resource
{
    $params = func_get_args();
    if (($resource = \udm_find(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function udm_free_agent($agent): int
{
    $params = func_get_args();
    if (($int = \udm_free_agent(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function udm_free_res($res): bool
{
    $params = func_get_args();
    if (($bool = \udm_free_res(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function udm_get_res_field($res, int $row, int $field): string
{
    $params = func_get_args();
    if (($string = \udm_get_res_field(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function udm_get_res_param($res, int $param): string
{
    $params = func_get_args();
    if (($string = \udm_get_res_param(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function udm_load_ispell_data($agent, int $var, string $val1, string $val2, int $flag): bool
{
    $params = func_get_args();
    if (($bool = \udm_load_ispell_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function udm_set_agent_param($agent, int $var, string $val): bool
{
    $params = func_get_args();
    if (($bool = \udm_set_agent_param(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msql_affected_rows($result): int
{
    $params = func_get_args();
    if (($int = \msql_affected_rows(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function msql_close($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \msql_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msql_create_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \msql_create_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msql_data_seek($result, int $row_number): bool
{
    $params = func_get_args();
    if (($bool = \msql_data_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msql_drop_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \msql_drop_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msql_field_len($result, int $field_offset): int
{
    $params = func_get_args();
    if (($int = \msql_field_len(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function msql_field_name($result, int $field_offset): string
{
    $params = func_get_args();
    if (($string = \msql_field_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function msql_field_seek($result, int $field_offset): bool
{
    $params = func_get_args();
    if (($bool = \msql_field_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msql_field_table($result, int $field_offset): int
{
    $params = func_get_args();
    if (($int = \msql_field_table(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function msql_free_result($result): bool
{
    $params = func_get_args();
    if (($bool = \msql_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msql_select_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \msql_select_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mssql_close($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \mssql_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mssql_data_seek($result_identifier, int $row_number): bool
{
    $params = func_get_args();
    if (($bool = \mssql_data_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mssql_field_seek($result, int $field_offset): bool
{
    $params = func_get_args();
    if (($bool = \mssql_field_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mssql_free_result($result): bool
{
    $params = func_get_args();
    if (($bool = \mssql_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mssql_free_statement($stmt): bool
{
    $params = func_get_args();
    if (($bool = \mssql_free_statement(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mssql_init(string $sp_name, $link_identifier): resource
{
    $params = func_get_args();
    if (($resource = \mssql_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function mssql_select_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \mssql_select_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mysql_close($link_identifier = NULL): bool
{
    $params = func_get_args();
    if (($bool = \mysql_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mysql_drop_db(string $database_name, $link_identifier = NULL): bool
{
    $params = func_get_args();
    if (($bool = \mysql_drop_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mysql_get_proto_info($link_identifier = NULL): int
{
    $params = func_get_args();
    if (($int = \mysql_get_proto_info(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mysql_list_processes($link_identifier = NULL): resource
{
    $params = func_get_args();
    if (($resource = \mysql_list_processes(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function mysql_list_tables(string $database, $link_identifier = NULL): resource
{
    $params = func_get_args();
    if (($resource = \mysql_list_tables(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function mysql_set_charset(string $charset, $link_identifier = NULL): bool
{
    $params = func_get_args();
    if (($bool = \mysql_set_charset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mysql_tablename($result, int $i): string
{
    $params = func_get_args();
    if (($string = \mysql_tablename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function mysql_thread_id($link_identifier = NULL): int
{
    $params = func_get_args();
    if (($int = \mysql_thread_id(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function mysql_unbuffered_query(string $query, $link_identifier = NULL): resource
{
    $params = func_get_args();
    if (($resource = \mysql_unbuffered_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function mysqlnd_ms_dump_servers($connection): array
{
    $params = func_get_args();
    if (($array = \mysqlnd_ms_dump_servers(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function mysqlnd_ms_fabric_select_global($connection, $table_name): array
{
    $params = func_get_args();
    if (($array = \mysqlnd_ms_fabric_select_global(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function mysqlnd_ms_fabric_select_shard($connection, $table_name, $shard_key): array
{
    $params = func_get_args();
    if (($array = \mysqlnd_ms_fabric_select_shard(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function mysqlnd_ms_get_last_used_connection($connection): array
{
    $params = func_get_args();
    if (($array = \mysqlnd_ms_get_last_used_connection(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function mysqlnd_qc_clear_cache(): bool
{
    $params = func_get_args();
    if (($bool = \mysqlnd_qc_clear_cache(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function mysqlnd_qc_set_is_select(string $callback): mixed
{
    $params = func_get_args();
    if (($mixed = \mysqlnd_qc_set_is_select(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function mysqlnd_qc_set_storage_handler(string $handler): bool
{
    $params = func_get_args();
    if (($bool = \mysqlnd_qc_set_storage_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ncurses_clear(): bool
{
    $params = func_get_args();
    if (($bool = \ncurses_clear(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ncurses_clrtobot(): bool
{
    $params = func_get_args();
    if (($bool = \ncurses_clrtobot(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ncurses_clrtoeol(): bool
{
    $params = func_get_args();
    if (($bool = \ncurses_clrtoeol(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ncurses_doupdate(): bool
{
    $params = func_get_args();
    if (($bool = \ncurses_doupdate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ncurses_erase(): bool
{
    $params = func_get_args();
    if (($bool = \ncurses_erase(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ncurses_slk_init(int $format): bool
{
    $params = func_get_args();
    if (($bool = \ncurses_slk_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function closelog(): bool
{
    $params = func_get_args();
    if (($bool = \closelog(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function dns_get_record(string $hostname, int $type = DNS_ANY, array $authns = null, array $addtl = null, bool $raw = FALSE): array
{
    $params = func_get_args();
    if (($array = \dns_get_record(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function getprotobyname(string $name): int
{
    $params = func_get_args();
    if (($int = \getprotobyname(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function getprotobynumber(int $number): string
{
    $params = func_get_args();
    if (($string = \getprotobynumber(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function header_register_callback(callable $callback): bool
{
    $params = func_get_args();
    if (($bool = \header_register_callback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openlog(string $ident, int $option, int $facility): bool
{
    $params = func_get_args();
    if (($bool = \openlog(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function setrawcookie(string $name, string $value, int $expire = 0, string $path = null, string $domain = null, bool $secure = FALSE, bool $httponly = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \setrawcookie(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function syslog(int $priority, string $message): bool
{
    $params = func_get_args();
    if (($bool = \syslog(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yp_match(string $domain, string $map, string $key): string
{
    $params = func_get_args();
    if (($string = \yp_match(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function yp_next(string $domain, string $map, string $key): array
{
    $params = func_get_args();
    if (($array = \yp_next(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function yp_order(string $domain, string $map): int
{
    $params = func_get_args();
    if (($int = \yp_order(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function nsapi_virtual(string $uri): bool
{
    $params = func_get_args();
    if (($bool = \nsapi_virtual(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_bind_array_by_name($statement, string $name, array $var_array, int $max_table_length, int $max_item_length = -1, int $type = SQLT_AFC): bool
{
    $params = func_get_args();
    if (($bool = \oci_bind_array_by_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_bind_by_name($statement, string $bv_name, $variable, int $maxlength = -1, int $type = SQLT_CHR): bool
{
    $params = func_get_args();
    if (($bool = \oci_bind_by_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_cancel($statement): bool
{
    $params = func_get_args();
    if (($bool = \oci_cancel(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_close($connection): bool
{
    $params = func_get_args();
    if (($bool = \oci_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_commit($connection): bool
{
    $params = func_get_args();
    if (($bool = \oci_commit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_connect(string $username, string $password, string $connection_string, string $character_set, int $session_mode): resource
{
    $params = func_get_args();
    if (($resource = \oci_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function oci_define_by_name($statement, string $column_name, $variable, int $type = SQLT_CHR): bool
{
    $params = func_get_args();
    if (($bool = \oci_define_by_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_execute($statement, int $mode = OCI_COMMIT_ON_SUCCESS): bool
{
    $params = func_get_args();
    if (($bool = \oci_execute(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_fetch_all($statement, array $output, int $skip = 0, int $maxrows = -1, int $flags = + ): int {
    $params = func_get_args();
    if (($int = \oci_fetch_all(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function oci_field_name($statement, $field): string
{
    $params = func_get_args();
    if (($string = \oci_field_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function oci_field_precision($statement, $field): int
{
    $params = func_get_args();
    if (($int = \oci_field_precision(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function oci_field_scale($statement, $field): int
{
    $params = func_get_args();
    if (($int = \oci_field_scale(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function oci_field_type_raw($statement, $field): int
{
    $params = func_get_args();
    if (($int = \oci_field_type_raw(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function oci_field_type($statement, $field): mixed
{
    $params = func_get_args();
    if (($mixed = \oci_field_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function oci_free_statement($statement): bool
{
    $params = func_get_args();
    if (($bool = \oci_free_statement(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_new_connect(string $username, string $password, string $connection_string, string $character_set, int $session_mode): resource
{
    $params = func_get_args();
    if (($resource = \oci_new_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function oci_new_cursor($connection): resource
{
    $params = func_get_args();
    if (($resource = \oci_new_cursor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function oci_new_descriptor($connection, int $type = OCI_DTYPE_LOB): OCI-Lob {
    $params = func_get_args();
    if (($OCI - Lob = \oci_new_descriptor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $OCI - Lob;
}



function oci_num_fields($statement): int
{
    $params = func_get_args();
    if (($int = \oci_num_fields(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function oci_num_rows($statement): int
{
    $params = func_get_args();
    if (($int = \oci_num_rows(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function oci_parse($connection, string $sql_text): resource
{
    $params = func_get_args();
    if (($resource = \oci_parse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function oci_password_change($connection, string $username, string $old_password, string $new_password): bool
{
    $params = func_get_args();
    if (($bool = \oci_password_change(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_password_change(string $dbname, string $username, string $old_password, string $new_password): resource
{
    $params = func_get_args();
    if (($resource = \oci_password_change(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function oci_pconnect(string $username, string $password, string $connection_string, string $character_set, int $session_mode): resource
{
    $params = func_get_args();
    if (($resource = \oci_pconnect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function oci_register_taf_callback($connection, $callbackFn): bool
{
    $params = func_get_args();
    if (($bool = \oci_register_taf_callback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function userCallbackFn($connection, int $event, int $type): int
{
    $params = func_get_args();
    if (($int = \userCallbackFn(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function oci_result($statement, $field): mixed
{
    $params = func_get_args();
    if (($mixed = \oci_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function oci_rollback($connection): bool
{
    $params = func_get_args();
    if (($bool = \oci_rollback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_server_version($connection): string
{
    $params = func_get_args();
    if (($string = \oci_server_version(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function oci_set_action($connection, string $action_name): bool
{
    $params = func_get_args();
    if (($bool = \oci_set_action(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_set_client_identifier($connection, string $client_identifier): bool
{
    $params = func_get_args();
    if (($bool = \oci_set_client_identifier(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_set_client_info($connection, string $client_info): bool
{
    $params = func_get_args();
    if (($bool = \oci_set_client_info(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_set_edition(string $edition): bool
{
    $params = func_get_args();
    if (($bool = \oci_set_edition(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_set_module_name($connection, string $module_name): bool
{
    $params = func_get_args();
    if (($bool = \oci_set_module_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_set_prefetch($statement, int $rows): bool
{
    $params = func_get_args();
    if (($bool = \oci_set_prefetch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function oci_statement_type($statement): string
{
    $params = func_get_args();
    if (($string = \oci_statement_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function oci_unregister_taf_callback($connection): bool
{
    $params = func_get_args();
    if (($bool = \oci_unregister_taf_callback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function opcache_compile_file(string $file): bool
{
    $params = func_get_args();
    if (($bool = \opcache_compile_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_buffer_data($buffer, int $format, string $data, int $freq): bool
{
    $params = func_get_args();
    if (($bool = \openal_buffer_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_buffer_destroy($buffer): bool
{
    $params = func_get_args();
    if (($bool = \openal_buffer_destroy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_buffer_get($buffer, int $property): int
{
    $params = func_get_args();
    if (($int = \openal_buffer_get(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function openal_buffer_loadwav($buffer, string $wavfile): bool
{
    $params = func_get_args();
    if (($bool = \openal_buffer_loadwav(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_context_current($context): bool
{
    $params = func_get_args();
    if (($bool = \openal_context_current(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_context_destroy($context): bool
{
    $params = func_get_args();
    if (($bool = \openal_context_destroy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_context_process($context): bool
{
    $params = func_get_args();
    if (($bool = \openal_context_process(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_context_suspend($context): bool
{
    $params = func_get_args();
    if (($bool = \openal_context_suspend(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_device_close($device): bool
{
    $params = func_get_args();
    if (($bool = \openal_device_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_listener_get(int $property): mixed
{
    $params = func_get_args();
    if (($mixed = \openal_listener_get(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function openal_listener_set(int $property, $setting): bool
{
    $params = func_get_args();
    if (($bool = \openal_listener_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_source_destroy($source): bool
{
    $params = func_get_args();
    if (($bool = \openal_source_destroy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_source_get($source, int $property): mixed
{
    $params = func_get_args();
    if (($mixed = \openal_source_get(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function openal_source_pause($source): bool
{
    $params = func_get_args();
    if (($bool = \openal_source_pause(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_source_play($source): bool
{
    $params = func_get_args();
    if (($bool = \openal_source_play(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_source_rewind($source): bool
{
    $params = func_get_args();
    if (($bool = \openal_source_rewind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_source_set($source, int $property, $setting): bool
{
    $params = func_get_args();
    if (($bool = \openal_source_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_source_stop($source): bool
{
    $params = func_get_args();
    if (($bool = \openal_source_stop(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openal_stream($source, int $format, int $rate): resource
{
    $params = func_get_args();
    if (($resource = \openal_stream(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function openssl_csr_export_to_file($csr, string $outfilename, bool $notext = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \openssl_csr_export_to_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_csr_export($csr, string $out, bool $notext = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \openssl_csr_export(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_csr_get_subject($csr, bool $use_shortnames = TRUE): array
{
    $params = func_get_args();
    if (($array = \openssl_csr_get_subject(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function openssl_csr_new(array $dn, $privkey, array $configargs, array $extraattribs): mixed
{
    $params = func_get_args();
    if (($mixed = \openssl_csr_new(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function openssl_decrypt(string $data, string $method, string $key, int $options = 0, string $iv = "", string $tag = "", string $aad = ""): string
{
    $params = func_get_args();
    if (($string = \openssl_decrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function openssl_dh_compute_key(string $pub_key, $dh_key): string
{
    $params = func_get_args();
    if (($string = \openssl_dh_compute_key(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function openssl_digest(string $data, string $method, bool $raw_output = FALSE): string
{
    $params = func_get_args();
    if (($string = \openssl_digest(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function openssl_encrypt(string $data, string $method, string $key, int $options = 0, string $iv = "", string $tag = NULL, string $aad = "", int $tag_length = 16): string
{
    $params = func_get_args();
    if (($string = \openssl_encrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function openssl_open(string $sealed_data, string $open_data, string $env_key, $priv_key_id, string $method = "RC4", string $iv = null): bool
{
    $params = func_get_args();
    if (($bool = \openssl_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pbkdf2(string $password, string $salt, int $key_length, int $iterations, string $digest_algorithm = "sha1"): string
{
    $params = func_get_args();
    if (($string = \openssl_pbkdf2(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function openssl_pkcs12_export_to_file($x509, string $filename, $priv_key, string $pass, array $args): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkcs12_export_to_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkcs12_export($x509, string $out, $priv_key, string $pass, array $args): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkcs12_export(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkcs12_read(string $pkcs12, array $certs, string $pass): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkcs12_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkcs7_decrypt(string $infilename, string $outfilename, $recipcert, $recipkey): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkcs7_decrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkcs7_encrypt(string $infile, string $outfile, $recipcerts, array $headers, int $flags = 0, int $cipherid = OPENSSL_CIPHER_RC2_40): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkcs7_encrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkcs7_read(string $infilename, array $certs): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkcs7_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkcs7_sign(string $infilename, string $outfilename, $signcert, $privkey, array $headers, int $flags = PKCS7_DETACHED, string $extracerts = null): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkcs7_sign(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkey_export_to_file($key, string $outfilename, string $passphrase, array $configargs): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkey_export_to_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkey_export($key, string $out, string $passphrase, array $configargs): bool
{
    $params = func_get_args();
    if (($bool = \openssl_pkey_export(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_pkey_get_private($key, string $passphrase = ""): resource
{
    $params = func_get_args();
    if (($resource = \openssl_pkey_get_private(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function openssl_pkey_get_public($certificate): resource
{
    $params = func_get_args();
    if (($resource = \openssl_pkey_get_public(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function openssl_private_decrypt(string $data, string $decrypted, $key, int $padding = OPENSSL_PKCS1_PADDING): bool
{
    $params = func_get_args();
    if (($bool = \openssl_private_decrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_private_encrypt(string $data, string $crypted, $key, int $padding = OPENSSL_PKCS1_PADDING): bool
{
    $params = func_get_args();
    if (($bool = \openssl_private_encrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_public_decrypt(string $data, string $decrypted, $key, int $padding = OPENSSL_PKCS1_PADDING): bool
{
    $params = func_get_args();
    if (($bool = \openssl_public_decrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_public_encrypt(string $data, string $crypted, $key, int $padding = OPENSSL_PKCS1_PADDING): bool
{
    $params = func_get_args();
    if (($bool = \openssl_public_encrypt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_random_pseudo_bytes(int $length, bool $crypto_strong): string
{
    $params = func_get_args();
    if (($string = \openssl_random_pseudo_bytes(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function openssl_seal(string $data, string $sealed_data, array $env_keys, array $pub_key_ids, string $method = "RC4", string $iv = null): int
{
    $params = func_get_args();
    if (($int = \openssl_seal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function openssl_sign(string $data, string $signature, $priv_key_id, $signature_alg = OPENSSL_ALGO_SHA1): bool
{
    $params = func_get_args();
    if (($bool = \openssl_sign(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_x509_export_to_file($x509, string $outfilename, bool $notext = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \openssl_x509_export_to_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_x509_export($x509, string $output, bool $notext = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \openssl_x509_export(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function openssl_x509_read($x509certdata): resource
{
    $params = func_get_args();
    if (($resource = \openssl_x509_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ob_end_clean(): bool
{
    $params = func_get_args();
    if (($bool = \ob_end_clean(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ob_end_flush(): bool
{
    $params = func_get_args();
    if (($bool = \ob_end_flush(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ob_start(callable $output_callback, int $chunk_size = 0, int $flags = null): bool
{
    $params = func_get_args();
    if (($bool = \ob_start(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function output_add_rewrite_var(string $name, string $value): bool
{
    $params = func_get_args();
    if (($bool = \output_add_rewrite_var(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function output_reset_rewrite_vars(): bool
{
    $params = func_get_args();
    if (($bool = \output_reset_rewrite_vars(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_close($pxdoc): bool
{
    $params = func_get_args();
    if (($bool = \px_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_create_fp($pxdoc, $file, array $fielddesc): bool
{
    $params = func_get_args();
    if (($bool = \px_create_fp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_date2string($pxdoc, int $value, string $format): string
{
    $params = func_get_args();
    if (($string = \px_date2string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function px_delete_record($pxdoc, int $num): bool
{
    $params = func_get_args();
    if (($bool = \px_delete_record(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_delete($pxdoc): bool
{
    $params = func_get_args();
    if (($bool = \px_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_get_parameter($pxdoc, string $name): string
{
    $params = func_get_args();
    if (($string = \px_get_parameter(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function px_get_value($pxdoc, string $name): float
{
    $params = func_get_args();
    if (($float = \px_get_value(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $float;
}



function px_open_fp($pxdoc, $file): bool
{
    $params = func_get_args();
    if (($bool = \px_open_fp(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_put_record($pxdoc, array $record, int $recpos = -1): bool
{
    $params = func_get_args();
    if (($bool = \px_put_record(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_set_blob_file($pxdoc, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \px_set_blob_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_set_parameter($pxdoc, string $name, string $value): bool
{
    $params = func_get_args();
    if (($bool = \px_set_parameter(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function px_set_value($pxdoc, string $name, float $value): bool
{
    $params = func_get_args();
    if (($bool = \px_set_value(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function px_timestamp2string($pxdoc, float $value, string $format): string
{
    $params = func_get_args();
    if (($string = \px_timestamp2string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function px_update_record($pxdoc, array $data, int $num): bool
{
    $params = func_get_args();
    if (($bool = \px_update_record(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function password_hash(string $password, int $algo, array $options): string
{
    $params = func_get_args();
    if (($string = \password_hash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}




function pcntl_getpriority(int $pid = getmypid(), int $process_identifier = PRIO_PROCESS): int
{
    $params = func_get_args();
    if (($int = \pcntl_getpriority(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pcntl_setpriority(int $priority, int $pid = getmypid(), int $process_identifier = PRIO_PROCESS): bool
{
    $params = func_get_args();
    if (($bool = \pcntl_setpriority(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pcntl_signal_dispatch(): bool
{
    $params = func_get_args();
    if (($bool = \pcntl_signal_dispatch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pcntl_signal(int $signo, callable|int $handler, bool $restart_syscalls = TRUE): bool {
    $params = func_get_args();
    if (($bool = \pcntl_signal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function pcntl_sigprocmask(int $how, array $set, array $oldset): bool
{
    $params = func_get_args();
    if (($bool = \pcntl_sigprocmask(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pcntl_strerror(int $errno): string
{
    $params = func_get_args();
    if (($string = \pcntl_strerror(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function preg_match(string $pattern, string $subject, array $matches, int $flags = 0, int $offset = 0): int
{
    $params = func_get_args();
    if (($int = \preg_match(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function preg_split(string $pattern, string $subject, int $limit = -1, int $flags = 0): array
{
    $params = func_get_args();
    if (($array = \preg_split(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function PDF_activate_item($pdfdoc, int $id): bool
{
    $params = func_get_args();
    if (($bool = \PDF_activate_item(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_add_locallink($pdfdoc, float $lowerleftx, float $lowerlefty, float $upperrightx, float $upperrighty, int $page, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \PDF_add_locallink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_add_nameddest($pdfdoc, string $name, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_add_nameddest(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_add_note($pdfdoc, float $llx, float $lly, float $urx, float $ury, string $contents, string $title, string $icon, int $open): bool
{
    $params = func_get_args();
    if (($bool = \PDF_add_note(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_add_pdflink($pdfdoc, float $bottom_left_x, float $bottom_left_y, float $up_right_x, float $up_right_y, string $filename, int $page, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \PDF_add_pdflink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_add_thumbnail($pdfdoc, int $image): bool
{
    $params = func_get_args();
    if (($bool = \PDF_add_thumbnail(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_add_weblink($pdfdoc, float $lowerleftx, float $lowerlefty, float $upperrightx, float $upperrighty, string $url): bool
{
    $params = func_get_args();
    if (($bool = \PDF_add_weblink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_attach_file($pdfdoc, float $llx, float $lly, float $urx, float $ury, string $filename, string $description, string $author, string $mimetype, string $icon): bool
{
    $params = func_get_args();
    if (($bool = \PDF_attach_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_begin_layer($pdfdoc, int $layer): bool
{
    $params = func_get_args();
    if (($bool = \PDF_begin_layer(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_begin_page_ext($pdfdoc, float $width, float $height, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_begin_page_ext(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_begin_page($pdfdoc, float $width, float $height): bool
{
    $params = func_get_args();
    if (($bool = \PDF_begin_page(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_circle($pdfdoc, float $x, float $y, float $r): bool
{
    $params = func_get_args();
    if (($bool = \PDF_circle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_clip($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_clip(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_close_pdi_page($p, int $page): bool
{
    $params = func_get_args();
    if (($bool = \PDF_close_pdi_page(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_close_pdi($p, int $doc): bool
{
    $params = func_get_args();
    if (($bool = \PDF_close_pdi(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_close($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_closepath_fill_stroke($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_closepath_fill_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_closepath_stroke($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_closepath_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_closepath($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_closepath(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_concat($p, float $a, float $b, float $c, float $d, float $e, float $f): bool
{
    $params = func_get_args();
    if (($bool = \PDF_concat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_continue_text($p, string $text): bool
{
    $params = func_get_args();
    if (($bool = \PDF_continue_text(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_curveto($p, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3): bool
{
    $params = func_get_args();
    if (($bool = \PDF_curveto(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_delete($pdfdoc): bool
{
    $params = func_get_args();
    if (($bool = \PDF_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_end_layer($pdfdoc): bool
{
    $params = func_get_args();
    if (($bool = \PDF_end_layer(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_end_page_ext($pdfdoc, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_end_page_ext(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_end_page($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_end_page(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_end_pattern($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_end_pattern(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_end_template($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_end_template(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_fill_stroke($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_fill_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_fill($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_fill(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_fit_image($pdfdoc, int $image, float $x, float $y, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_fit_image(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_fit_pdi_page($pdfdoc, int $page, float $x, float $y, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_fit_pdi_page(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_fit_textline($pdfdoc, string $text, float $x, float $y, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_fit_textline(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_initgraphics($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_initgraphics(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_lineto($p, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \PDF_lineto(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_makespotcolor($p, string $spotname): int
{
    $params = func_get_args();
    if (($int = \PDF_makespotcolor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function PDF_moveto($p, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \PDF_moveto(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_open_file($p, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \PDF_open_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_place_image($pdfdoc, int $image, float $x, float $y, float $scale): bool
{
    $params = func_get_args();
    if (($bool = \PDF_place_image(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_place_pdi_page($pdfdoc, int $page, float $x, float $y, float $sx, float $sy): bool
{
    $params = func_get_args();
    if (($bool = \PDF_place_pdi_page(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_rect($p, float $x, float $y, float $width, float $height): bool
{
    $params = func_get_args();
    if (($bool = \PDF_rect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_restore($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_restore(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_rotate($p, float $phi): bool
{
    $params = func_get_args();
    if (($bool = \PDF_rotate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_save($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_save(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_scale($p, float $sx, float $sy): bool
{
    $params = func_get_args();
    if (($bool = \PDF_scale(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_border_color($p, float $red, float $green, float $blue): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_border_color(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_border_dash($pdfdoc, float $black, float $white): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_border_dash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_border_style($pdfdoc, string $style, float $width): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_border_style(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_info($p, string $key, string $value): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_info(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_layer_dependency($pdfdoc, string $type, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_layer_dependency(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_parameter($p, string $key, string $value): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_parameter(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_text_pos($p, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_text_pos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_set_value($p, string $key, float $value): bool
{
    $params = func_get_args();
    if (($bool = \PDF_set_value(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setcolor($p, string $fstype, string $colorspace, float $c1, float $c2, float $c3, float $c4): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setcolor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setdash($pdfdoc, float $b, float $w): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setdash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setdashpattern($pdfdoc, string $optlist): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setdashpattern(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setflat($pdfdoc, float $flatness): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setflat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setfont($pdfdoc, int $font, float $fontsize): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setfont(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setgray_fill($p, float $g): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setgray_fill(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setgray_stroke($p, float $g): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setgray_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setgray($p, float $g): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setgray(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setlinejoin($p, int $value): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setlinejoin(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setlinewidth($p, float $width): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setlinewidth(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setmatrix($p, float $a, float $b, float $c, float $d, float $e, float $f): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setmatrix(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setmiterlimit($pdfdoc, float $miter): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setmiterlimit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setrgbcolor_fill($p, float $red, float $green, float $blue): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setrgbcolor_fill(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setrgbcolor_stroke($p, float $red, float $green, float $blue): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setrgbcolor_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_setrgbcolor($p, float $red, float $green, float $blue): bool
{
    $params = func_get_args();
    if (($bool = \PDF_setrgbcolor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_show_xy($p, string $text, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \PDF_show_xy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_show($pdfdoc, string $text): bool
{
    $params = func_get_args();
    if (($bool = \PDF_show(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_skew($p, float $alpha, float $beta): bool
{
    $params = func_get_args();
    if (($bool = \PDF_skew(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function PDF_stroke($p): bool
{
    $params = func_get_args();
    if (($bool = \PDF_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_cancel_query($connection): bool
{
    $params = func_get_args();
    if (($bool = \pg_cancel_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_client_encoding($connection): string
{
    $params = func_get_args();
    if (($string = \pg_client_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_close($connection): bool
{
    $params = func_get_args();
    if (($bool = \pg_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_connection_reset($connection): bool
{
    $params = func_get_args();
    if (($bool = \pg_connection_reset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_convert($connection, string $table_name, array $assoc_array, int $options = 0): array
{
    $params = func_get_args();
    if (($array = \pg_convert(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function pg_copy_from($connection, string $table_name, array $rows, string $delimiter, string $null_as): bool
{
    $params = func_get_args();
    if (($bool = \pg_copy_from(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_dbname($connection): string
{
    $params = func_get_args();
    if (($string = \pg_dbname(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_delete($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC): mixed
{
    $params = func_get_args();
    if (($mixed = \pg_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function pg_end_copy($connection): bool
{
    $params = func_get_args();
    if (($bool = \pg_end_copy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_execute($connection, string $stmtname, array $params): resource
{
    $params = func_get_args();
    if (($resource = \pg_execute(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function pg_field_name($result, int $field_number): string
{
    $params = func_get_args();
    if (($string = \pg_field_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_field_prtlen($result, int $row_number, $field_name_or_number): int
{
    $params = func_get_args();
    if (($int = \pg_field_prtlen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pg_field_prtlen($result, $field_name_or_number): int
{
    $params = func_get_args();
    if (($int = \pg_field_prtlen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pg_flush($connection): mixed
{
    $params = func_get_args();
    if (($mixed = \pg_flush(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function pg_free_result($result): bool
{
    $params = func_get_args();
    if (($bool = \pg_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_host($connection): string
{
    $params = func_get_args();
    if (($string = \pg_host(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_insert($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC): mixed
{
    $params = func_get_args();
    if (($mixed = \pg_insert(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function pg_last_error($connection): string
{
    $params = func_get_args();
    if (($string = \pg_last_error(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_last_notice($connection, int $option = PGSQL_NOTICE_LAST): mixed
{
    $params = func_get_args();
    if (($mixed = \pg_last_notice(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function pg_last_oid($result): string
{
    $params = func_get_args();
    if (($string = \pg_last_oid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_lo_close($large_object): bool
{
    $params = func_get_args();
    if (($bool = \pg_lo_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_lo_create($connection, $object_id): int
{
    $params = func_get_args();
    if (($int = \pg_lo_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pg_lo_create($object_id): int
{
    $params = func_get_args();
    if (($int = \pg_lo_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pg_lo_export($connection, int $oid, string $pathname): bool
{
    $params = func_get_args();
    if (($bool = \pg_lo_export(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_lo_open($connection, int $oid, string $mode): resource
{
    $params = func_get_args();
    if (($resource = \pg_lo_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function pg_lo_read_all($large_object): int
{
    $params = func_get_args();
    if (($int = \pg_lo_read_all(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pg_lo_read($large_object, int $len = 8192): string
{
    $params = func_get_args();
    if (($string = \pg_lo_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_lo_seek($large_object, int $offset, int $whence = PGSQL_SEEK_CUR): bool
{
    $params = func_get_args();
    if (($bool = \pg_lo_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_lo_truncate($large_object, int $size): bool
{
    $params = func_get_args();
    if (($bool = \pg_lo_truncate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_lo_unlink($connection, int $oid): bool
{
    $params = func_get_args();
    if (($bool = \pg_lo_unlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_lo_write($large_object, string $data, int $len): int
{
    $params = func_get_args();
    if (($int = \pg_lo_write(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pg_meta_data($connection, string $table_name, bool $extended = FALSE): array
{
    $params = func_get_args();
    if (($array = \pg_meta_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function pg_options($connection): string
{
    $params = func_get_args();
    if (($string = \pg_options(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_ping($connection): bool
{
    $params = func_get_args();
    if (($bool = \pg_ping(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_port($connection): int
{
    $params = func_get_args();
    if (($int = \pg_port(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pg_prepare($connection, string $stmtname, string $query): resource
{
    $params = func_get_args();
    if (($resource = \pg_prepare(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function pg_put_line($connection, string $data): bool
{
    $params = func_get_args();
    if (($bool = \pg_put_line(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_query_params($connection, string $query, array $params): resource
{
    $params = func_get_args();
    if (($resource = \pg_query_params(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function pg_query($connection, string $query): resource
{
    $params = func_get_args();
    if (($resource = \pg_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function pg_result_seek($result, int $offset): bool
{
    $params = func_get_args();
    if (($bool = \pg_result_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_select($connection, string $table_name, array $assoc_array, int $options = PGSQL_DML_EXEC, int $result_type = PGSQL_ASSOC): mixed
{
    $params = func_get_args();
    if (($mixed = \pg_select(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function pg_send_query_params($connection, string $query, array $params): bool
{
    $params = func_get_args();
    if (($bool = \pg_send_query_params(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_send_query($connection, string $query): bool
{
    $params = func_get_args();
    if (($bool = \pg_send_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_socket($connection): resource
{
    $params = func_get_args();
    if (($resource = \pg_socket(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function pg_trace(string $pathname, string $mode = "w", $connection = null): bool
{
    $params = func_get_args();
    if (($bool = \pg_trace(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pg_tty($connection): string
{
    $params = func_get_args();
    if (($string = \pg_tty(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function pg_update($connection, string $table_name, array $data, array $condition, int $options = PGSQL_DML_EXEC): mixed
{
    $params = func_get_args();
    if (($mixed = \pg_update(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function pg_version($connection): array
{
    $params = func_get_args();
    if (($array = \pg_version(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function posix_access(string $file, int $mode = POSIX_F_OK): bool
{
    $params = func_get_args();
    if (($bool = \posix_access(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_getpgid(int $pid): int
{
    $params = func_get_args();
    if (($int = \posix_getpgid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function posix_initgroups(string $name, int $base_group_id): bool
{
    $params = func_get_args();
    if (($bool = \posix_initgroups(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_kill(int $pid, int $sig): bool
{
    $params = func_get_args();
    if (($bool = \posix_kill(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_mkfifo(string $pathname, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \posix_mkfifo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_mknod(string $pathname, int $mode, int $major = 0, int $minor = 0): bool
{
    $params = func_get_args();
    if (($bool = \posix_mknod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_setegid(int $gid): bool
{
    $params = func_get_args();
    if (($bool = \posix_setegid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_seteuid(int $uid): bool
{
    $params = func_get_args();
    if (($bool = \posix_seteuid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_setgid(int $gid): bool
{
    $params = func_get_args();
    if (($bool = \posix_setgid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_setpgid(int $pid, int $pgid): bool
{
    $params = func_get_args();
    if (($bool = \posix_setpgid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_setrlimit(int $resource, int $softlimit, int $hardlimit): bool
{
    $params = func_get_args();
    if (($bool = \posix_setrlimit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function posix_setuid(int $uid): bool
{
    $params = func_get_args();
    if (($bool = \posix_setuid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function setthreadtitle(string $title): bool
{
    $params = func_get_args();
    if (($bool = \setthreadtitle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_add_launchlink($psdoc, float $llx, float $lly, float $urx, float $ury, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \ps_add_launchlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_add_locallink($psdoc, float $llx, float $lly, float $urx, float $ury, int $page, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \ps_add_locallink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_add_note($psdoc, float $llx, float $lly, float $urx, float $ury, string $contents, string $title, string $icon, int $open): bool
{
    $params = func_get_args();
    if (($bool = \ps_add_note(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_add_pdflink($psdoc, float $llx, float $lly, float $urx, float $ury, string $filename, int $page, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \ps_add_pdflink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_add_weblink($psdoc, float $llx, float $lly, float $urx, float $ury, string $url): bool
{
    $params = func_get_args();
    if (($bool = \ps_add_weblink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_arc($psdoc, float $x, float $y, float $radius, float $alpha, float $beta): bool
{
    $params = func_get_args();
    if (($bool = \ps_arc(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_arcn($psdoc, float $x, float $y, float $radius, float $alpha, float $beta): bool
{
    $params = func_get_args();
    if (($bool = \ps_arcn(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_begin_page($psdoc, float $width, float $height): bool
{
    $params = func_get_args();
    if (($bool = \ps_begin_page(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_begin_pattern($psdoc, float $width, float $height, float $xstep, float $ystep, int $painttype): int
{
    $params = func_get_args();
    if (($int = \ps_begin_pattern(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ps_begin_template($psdoc, float $width, float $height): int
{
    $params = func_get_args();
    if (($int = \ps_begin_template(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ps_circle($psdoc, float $x, float $y, float $radius): bool
{
    $params = func_get_args();
    if (($bool = \ps_circle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_clip($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_clip(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function ps_close($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_closepath_stroke($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_closepath_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_closepath($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_closepath(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_continue_text($psdoc, string $text): bool
{
    $params = func_get_args();
    if (($bool = \ps_continue_text(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_curveto($psdoc, float $x1, float $y1, float $x2, float $y2, float $x3, float $y3): bool
{
    $params = func_get_args();
    if (($bool = \ps_curveto(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_delete($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_end_page($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_end_page(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_end_pattern($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_end_pattern(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_end_template($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_end_template(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_fill_stroke($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_fill_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_fill($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_fill(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_get_parameter($psdoc, string $name, float $modifier): string
{
    $params = func_get_args();
    if (($string = \ps_get_parameter(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function ps_hyphenate($psdoc, string $text): array
{
    $params = func_get_args();
    if (($array = \ps_hyphenate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function ps_include_file($psdoc, string $file): bool
{
    $params = func_get_args();
    if (($bool = \ps_include_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_lineto($psdoc, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \ps_lineto(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_moveto($psdoc, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \ps_moveto(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_new(): resource
{
    $params = func_get_args();
    if (($resource = \ps_new(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ps_open_file($psdoc, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \ps_open_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_place_image($psdoc, int $imageid, float $x, float $y, float $scale): bool
{
    $params = func_get_args();
    if (($bool = \ps_place_image(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_rect($psdoc, float $x, float $y, float $width, float $height): bool
{
    $params = func_get_args();
    if (($bool = \ps_rect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_restore($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_restore(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_rotate($psdoc, float $rot): bool
{
    $params = func_get_args();
    if (($bool = \ps_rotate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_save($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_save(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_scale($psdoc, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \ps_scale(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_set_border_color($psdoc, float $red, float $green, float $blue): bool
{
    $params = func_get_args();
    if (($bool = \ps_set_border_color(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_set_border_dash($psdoc, float $black, float $white): bool
{
    $params = func_get_args();
    if (($bool = \ps_set_border_dash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_set_border_style($psdoc, string $style, float $width): bool
{
    $params = func_get_args();
    if (($bool = \ps_set_border_style(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_set_info($p, string $key, string $val): bool
{
    $params = func_get_args();
    if (($bool = \ps_set_info(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_set_parameter($psdoc, string $name, string $value): bool
{
    $params = func_get_args();
    if (($bool = \ps_set_parameter(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_set_text_pos($psdoc, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \ps_set_text_pos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_set_value($psdoc, string $name, float $value): bool
{
    $params = func_get_args();
    if (($bool = \ps_set_value(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setcolor($psdoc, string $type, string $colorspace, float $c1, float $c2, float $c3, float $c4): bool
{
    $params = func_get_args();
    if (($bool = \ps_setcolor(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setdash($psdoc, float $on, float $off): bool
{
    $params = func_get_args();
    if (($bool = \ps_setdash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setflat($psdoc, float $value): bool
{
    $params = func_get_args();
    if (($bool = \ps_setflat(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setfont($psdoc, int $fontid, float $size): bool
{
    $params = func_get_args();
    if (($bool = \ps_setfont(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setgray($psdoc, float $gray): bool
{
    $params = func_get_args();
    if (($bool = \ps_setgray(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setlinecap($psdoc, int $type): bool
{
    $params = func_get_args();
    if (($bool = \ps_setlinecap(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setlinejoin($psdoc, int $type): bool
{
    $params = func_get_args();
    if (($bool = \ps_setlinejoin(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setlinewidth($psdoc, float $width): bool
{
    $params = func_get_args();
    if (($bool = \ps_setlinewidth(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setmiterlimit($psdoc, float $value): bool
{
    $params = func_get_args();
    if (($bool = \ps_setmiterlimit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setoverprintmode($psdoc, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \ps_setoverprintmode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_setpolydash($psdoc, float $arr): bool
{
    $params = func_get_args();
    if (($bool = \ps_setpolydash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_shading_pattern($psdoc, int $shadingid, string $optlist): int
{
    $params = func_get_args();
    if (($int = \ps_shading_pattern(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ps_shading($psdoc, string $type, float $x0, float $y0, float $x1, float $y1, float $c1, float $c2, float $c3, float $c4, string $optlist): int
{
    $params = func_get_args();
    if (($int = \ps_shading(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function ps_shfill($psdoc, int $shadingid): bool
{
    $params = func_get_args();
    if (($bool = \ps_shfill(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_show_xy($psdoc, string $text, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \ps_show_xy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_show_xy2($psdoc, string $text, int $len, float $xcoor, float $ycoor): bool
{
    $params = func_get_args();
    if (($bool = \ps_show_xy2(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_show($psdoc, string $text): bool
{
    $params = func_get_args();
    if (($bool = \ps_show(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_show2($psdoc, string $text, int $len): bool
{
    $params = func_get_args();
    if (($bool = \ps_show2(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_stroke($psdoc): bool
{
    $params = func_get_args();
    if (($bool = \ps_stroke(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_symbol($psdoc, int $ord): bool
{
    $params = func_get_args();
    if (($bool = \ps_symbol(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ps_translate($psdoc, float $x, float $y): bool
{
    $params = func_get_args();
    if (($bool = \ps_translate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_add_to_personal(int $dictionary_link, string $word): bool
{
    $params = func_get_args();
    if (($bool = \pspell_add_to_personal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_add_to_session(int $dictionary_link, string $word): bool
{
    $params = func_get_args();
    if (($bool = \pspell_add_to_session(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_clear_session(int $dictionary_link): bool
{
    $params = func_get_args();
    if (($bool = \pspell_clear_session(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_create(string $language, string $spelling, string $jargon, string $encoding): int
{
    $params = func_get_args();
    if (($int = \pspell_config_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pspell_config_data_dir(int $conf, string $directory): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_data_dir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_dict_dir(int $conf, string $directory): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_dict_dir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_ignore(int $dictionary_link, int $n): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_ignore(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_mode(int $dictionary_link, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_mode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_personal(int $dictionary_link, string $file): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_personal(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_repl(int $dictionary_link, string $file): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_repl(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_runtogether(int $dictionary_link, bool $flag): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_runtogether(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_config_save_repl(int $dictionary_link, bool $flag): bool
{
    $params = func_get_args();
    if (($bool = \pspell_config_save_repl(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_new(string $language, string $spelling, string $jargon, string $encoding, int $mode = 0): int
{
    $params = func_get_args();
    if (($int = \pspell_new(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function pspell_save_wordlist(int $dictionary_link): bool
{
    $params = func_get_args();
    if (($bool = \pspell_save_wordlist(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function pspell_store_replacement(int $dictionary_link, string $misspelled, string $correct): bool
{
    $params = func_get_args();
    if (($bool = \pspell_store_replacement(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_acct_open(): resource
{
    $params = func_get_args();
    if (($resource = \radius_acct_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function radius_add_server($radius_handle, string $hostname, int $port, string $secret, int $timeout, int $max_tries): bool
{
    $params = func_get_args();
    if (($bool = \radius_add_server(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_auth_open(): resource
{
    $params = func_get_args();
    if (($resource = \radius_auth_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function radius_close($radius_handle): bool
{
    $params = func_get_args();
    if (($bool = \radius_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_config($radius_handle, string $file): bool
{
    $params = func_get_args();
    if (($bool = \radius_config(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_create_request($radius_handle, int $type): bool
{
    $params = func_get_args();
    if (($bool = \radius_create_request(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_demangle_mppe_key($radius_handle, string $mangled): string
{
    $params = func_get_args();
    if (($string = \radius_demangle_mppe_key(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function radius_demangle($radius_handle, string $mangled): string
{
    $params = func_get_args();
    if (($string = \radius_demangle(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function radius_get_tagged_attr_data(string $data): string
{
    $params = func_get_args();
    if (($string = \radius_get_tagged_attr_data(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function radius_get_tagged_attr_tag(string $data): int
{
    $params = func_get_args();
    if (($int = \radius_get_tagged_attr_tag(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function radius_get_vendor_attr(string $data): array
{
    $params = func_get_args();
    if (($array = \radius_get_vendor_attr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function radius_put_addr($radius_handle, int $type, string $addr, int $options = 0, int $tag = null): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_addr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_put_attr($radius_handle, int $type, string $value, int $options = 0, int $tag = null): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_attr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_put_int($radius_handle, int $type, int $value, int $options = 0, int $tag = null): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_int(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_put_string($radius_handle, int $type, string $value, int $options = 0, int $tag = null): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_put_vendor_addr($radius_handle, int $vendor, int $type, string $addr): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_vendor_addr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_put_vendor_attr($radius_handle, int $vendor, int $type, string $value, int $options = 0, int $tag = null): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_vendor_attr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_put_vendor_int($radius_handle, int $vendor, int $type, int $value, int $options = 0, int $tag = null): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_vendor_int(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_put_vendor_string($radius_handle, int $vendor, int $type, string $value, int $options = 0, int $tag = null): bool
{
    $params = func_get_args();
    if (($bool = \radius_put_vendor_string(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function radius_request_authenticator($radius_handle): string
{
    $params = func_get_args();
    if (($string = \radius_request_authenticator(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function radius_salt_encrypt_attr($radius_handle, string $data): string
{
    $params = func_get_args();
    if (($string = \radius_salt_encrypt_attr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function radius_server_secret($radius_handle): string
{
    $params = func_get_args();
    if (($string = \radius_server_secret(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function readline_add_history(string $line): bool
{
    $params = func_get_args();
    if (($bool = \readline_add_history(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function readline_callback_handler_install(string $prompt, callable $callback): bool
{
    $params = func_get_args();
    if (($bool = \readline_callback_handler_install(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function readline_clear_history(): bool
{
    $params = func_get_args();
    if (($bool = \readline_clear_history(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function readline_completion_function(callable $function): bool
{
    $params = func_get_args();
    if (($bool = \readline_completion_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function readline_read_history(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \readline_read_history(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function readline_write_history(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \readline_write_history(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function rpm_close($rpmr): bool
{
    $params = func_get_args();
    if (($bool = \rpm_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function rpm_is_valid(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \rpm_is_valid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function rrd_create(string $filename, array $options): bool
{
    $params = func_get_args();
    if (($bool = \rrd_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_function_add(string $funcname, string $arglist, string $code, bool $return_by_reference, string $doc_comment): bool
{
    $params = func_get_args();
    if (($bool = \runkit_function_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_function_add(string $funcname, Closure $closure, string $doc_comment): bool
{
    $params = func_get_args();
    if (($bool = \runkit_function_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_function_copy(string $funcname, string $targetname): bool
{
    $params = func_get_args();
    if (($bool = \runkit_function_copy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_function_redefine(string $funcname, string $arglist, string $code, bool $return_by_reference, string $doc_comment): bool
{
    $params = func_get_args();
    if (($bool = \runkit_function_redefine(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_function_redefine(string $funcname, Closure $closure, string $doc_comment): bool
{
    $params = func_get_args();
    if (($bool = \runkit_function_redefine(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_function_remove(string $funcname): bool
{
    $params = func_get_args();
    if (($bool = \runkit_function_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_function_rename(string $funcname, string $newname): bool
{
    $params = func_get_args();
    if (($bool = \runkit_function_rename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_import(string $filename, int $flags = RUNKIT_IMPORT_CLASS_METHODS): bool
{
    $params = func_get_args();
    if (($bool = \runkit_import(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_lint_file(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \runkit_lint_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_lint(string $code): bool
{
    $params = func_get_args();
    if (($bool = \runkit_lint(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_method_add(string $classname, string $methodname, string $args, string $code, int $flags = RUNKIT_ACC_PUBLIC, string $doc_comment = null): bool
{
    $params = func_get_args();
    if (($bool = \runkit_method_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_method_add(string $classname, string $methodname, Closure $closure, int $flags = RUNKIT_ACC_PUBLIC, string $doc_comment = null): bool
{
    $params = func_get_args();
    if (($bool = \runkit_method_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function runkit_method_remove(string $classname, string $methodname): bool
{
    $params = func_get_args();
    if (($bool = \runkit_method_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msg_queue_exists(int $key): bool
{
    $params = func_get_args();
    if (($bool = \msg_queue_exists(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msg_receive($queue, int $desiredmsgtype, int $msgtype, int $maxsize, $message, bool $unserialize = TRUE, int $flags = 0, int $errorcode = null): bool
{
    $params = func_get_args();
    if (($bool = \msg_receive(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msg_remove_queue($queue): bool
{
    $params = func_get_args();
    if (($bool = \msg_remove_queue(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function msg_set_queue($queue, array $data): bool
{
    $params = func_get_args();
    if (($bool = \msg_set_queue(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sem_acquire($sem_identifier, bool $nowait = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \sem_acquire(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sem_release($sem_identifier): bool
{
    $params = func_get_args();
    if (($bool = \sem_release(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sem_remove($sem_identifier): bool
{
    $params = func_get_args();
    if (($bool = \sem_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function shm_put_var($shm_identifier, int $variable_key, $variable): bool
{
    $params = func_get_args();
    if (($bool = \shm_put_var(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function shm_remove_var($shm_identifier, int $variable_key): bool
{
    $params = func_get_args();
    if (($bool = \shm_remove_var(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function shm_remove($shm_identifier): bool
{
    $params = func_get_args();
    if (($bool = \shm_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_abort(): bool
{
    $params = func_get_args();
    if (($bool = \session_abort(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_decode(string $data): bool
{
    $params = func_get_args();
    if (($bool = \session_decode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_destroy(): bool
{
    $params = func_get_args();
    if (($bool = \session_destroy(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_regenerate_id(bool $delete_old_session = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \session_regenerate_id(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_register($name, $...): bool {
    $params = func_get_args();
    if (($bool = \session_register(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_reset(): bool
{
    $params = func_get_args();
    if (($bool = \session_reset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_set_cookie_params(int $lifetime, string $path, string $domain, bool $secure = FALSE, bool $httponly = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \session_set_cookie_params(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_set_save_handler(callable $open, callable $close, callable $read, callable $write, callable $destroy, callable $gc, callable $create_sid, callable $validate_sid, callable $update_timestamp): bool
{
    $params = func_get_args();
    if (($bool = \session_set_save_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_set_save_handler(object $sessionhandler, bool $register_shutdown = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \session_set_save_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_unregister(string $name): bool
{
    $params = func_get_args();
    if (($bool = \session_unregister(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_unset(): bool
{
    $params = func_get_args();
    if (($bool = \session_unset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_write_close(): bool
{
    $params = func_get_args();
    if (($bool = \session_write_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_pgsql_add_error(int $error_level, string $error_message): bool
{
    $params = func_get_args();
    if (($bool = \session_pgsql_add_error(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_pgsql_reset(): bool
{
    $params = func_get_args();
    if (($bool = \session_pgsql_reset(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function session_pgsql_set_field(string $value): bool
{
    $params = func_get_args();
    if (($bool = \session_pgsql_set_field(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function shmop_delete($shmid): bool
{
    $params = func_get_args();
    if (($bool = \shmop_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function shmop_read($shmid, int $start, int $count): string
{
    $params = func_get_args();
    if (($string = \shmop_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function simplexml_import_dom(DOMNode $node, string $class_name = "SimpleXMLElement"): SimpleXMLElement
{
    $params = func_get_args();
    if (($SimpleXMLElement = \simplexml_import_dom(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $SimpleXMLElement;
}



function snmp2_get(string $host, string $community, string $object_id, string $timeout = 1000000, string $retries = 5): string
{
    $params = func_get_args();
    if (($string = \snmp2_get(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function snmp2_walk(string $host, string $community, string $object_id, string $timeout = 1000000, string $retries = 5): array
{
    $params = func_get_args();
    if (($array = \snmp2_walk(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function snmpget(string $hostname, string $community, string $object_id, int $timeout = 1000000, int $retries = 5): string
{
    $params = func_get_args();
    if (($string = \snmpget(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function snmpwalk(string $hostname, string $community, string $object_id, int $timeout = 1000000, int $retries = 5): array
{
    $params = func_get_args();
    if (($array = \snmpwalk(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function snmpwalkoid(string $hostname, string $community, string $object_id, int $timeout = 1000000, int $retries = 5): array
{
    $params = func_get_args();
    if (($array = \snmpwalkoid(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function socket_accept($socket): resource
{
    $params = func_get_args();
    if (($resource = \socket_accept(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function socket_bind($socket, string $address, int $port = 0): bool
{
    $params = func_get_args();
    if (($bool = \socket_bind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function socket_create_listen(int $port, int $backlog = 128): resource
{
    $params = func_get_args();
    if (($resource = \socket_create_listen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function socket_create_pair(int $domain, int $type, int $protocol, array $fd): bool
{
    $params = func_get_args();
    if (($bool = \socket_create_pair(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function socket_create(int $domain, int $type, int $protocol): resource
{
    $params = func_get_args();
    if (($resource = \socket_create(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function socket_export_stream($socket): resource
{
    $params = func_get_args();
    if (($resource = \socket_export_stream(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function socket_get_option($socket, int $level, int $optname): mixed
{
    $params = func_get_args();
    if (($mixed = \socket_get_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function socket_listen($socket, int $backlog = 0): bool
{
    $params = func_get_args();
    if (($bool = \socket_listen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function socket_read($socket, int $length, int $type = PHP_BINARY_READ): string
{
    $params = func_get_args();
    if (($string = \socket_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function socket_send($socket, string $buf, int $len, int $flags): int
{
    $params = func_get_args();
    if (($int = \socket_send(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function socket_sendmsg($socket, array $message, int $flags = 0): int
{
    $params = func_get_args();
    if (($int = \socket_sendmsg(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function socket_set_block($socket): bool
{
    $params = func_get_args();
    if (($bool = \socket_set_block(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function socket_set_nonblock($socket): bool
{
    $params = func_get_args();
    if (($bool = \socket_set_nonblock(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function socket_set_option($socket, int $level, int $optname, $optval): bool
{
    $params = func_get_args();
    if (($bool = \socket_set_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function socket_shutdown($socket, int $how = 2): bool
{
    $params = func_get_args();
    if (($bool = \socket_shutdown(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function socket_write($socket, string $buffer, int $length = 0): int
{
    $params = func_get_args();
    if (($int = \socket_write(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function sodium_crypto_pwhash(int $length, string $password, string $salt, int $opslimit, int $memlimit, int $alg): string
{
    $params = func_get_args();
    if (($string = \sodium_crypto_pwhash(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function class_implements($class, bool $autoload = TRUE): array
{
    $params = func_get_args();
    if (($array = \class_implements(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function class_parents($class, bool $autoload = TRUE): array
{
    $params = func_get_args();
    if (($array = \class_parents(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function class_uses($class, bool $autoload = TRUE): array
{
    $params = func_get_args();
    if (($array = \class_uses(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function spl_autoload_unregister($autoload_function): bool
{
    $params = func_get_args();
    if (($bool = \spl_autoload_unregister(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlite_popen(string $filename, int $mode = 0666, string $error_message = null): resource
{
    $params = func_get_args();
    if (($resource = \sqlite_popen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function sqlsrv_begin_transaction($conn): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_begin_transaction(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlsrv_cancel($stmt): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_cancel(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlsrv_close($conn): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlsrv_commit($conn): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_commit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlsrv_configure(string $setting, $value): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_configure(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlsrv_execute($stmt): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_execute(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlsrv_free_stmt($stmt): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_free_stmt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sqlsrv_rollback($conn): bool
{
    $params = func_get_args();
    if (($bool = \sqlsrv_rollback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_auth_agent($session, string $username): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_auth_agent(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_auth_hostbased_file($session, string $username, string $hostname, string $pubkeyfile, string $privkeyfile, string $passphrase, string $local_username): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_auth_hostbased_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_auth_password($session, string $username, string $password): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_auth_password(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_auth_pubkey_file($session, string $username, string $pubkeyfile, string $privkeyfile, string $passphrase): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_auth_pubkey_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_connect(string $host, int $port = 22, array $methods = null, array $callbacks = null): resource
{
    $params = func_get_args();
    if (($resource = \ssh2_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ssh2_disconnect($session): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_disconnect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_exec($session, string $command, string $pty, array $env, int $width = 80, int $height = 25, int $width_height_type = SSH2_TERM_UNIT_CHARS): resource
{
    $params = func_get_args();
    if (($resource = \ssh2_exec(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ssh2_publickey_add($pkey, string $algoname, string $blob, bool $overwrite = FALSE, array $attributes = null): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_publickey_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_publickey_init($session): resource
{
    $params = func_get_args();
    if (($resource = \ssh2_publickey_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function ssh2_publickey_remove($pkey, string $algoname, string $blob): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_publickey_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_scp_recv($session, string $remote_file, string $local_file): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_scp_recv(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_scp_send($session, string $local_file, string $remote_file, int $create_mode = 0644): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_scp_send(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_sftp_chmod($sftp, string $filename, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_sftp_chmod(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_sftp_mkdir($sftp, string $dirname, int $mode = 0777, bool $recursive = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_sftp_mkdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_sftp_rename($sftp, string $from, string $to): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_sftp_rename(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_sftp_rmdir($sftp, string $dirname): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_sftp_rmdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_sftp_symlink($sftp, string $target, string $link): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_sftp_symlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function ssh2_sftp_unlink($sftp, string $filename): bool
{
    $params = func_get_args();
    if (($bool = \ssh2_sftp_unlink(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_context_set_option($stream_or_context, string $wrapper, string $option, $value): bool
{
    $params = func_get_args();
    if (($bool = \stream_context_set_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_context_set_option($stream_or_context, array $options): bool
{
    $params = func_get_args();
    if (($bool = \stream_context_set_option(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_context_set_params($stream_or_context, array $params): bool
{
    $params = func_get_args();
    if (($bool = \stream_context_set_params(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_copy_to_stream($source, $dest, int $maxlength = -1, int $offset = 0): int
{
    $params = func_get_args();
    if (($int = \stream_copy_to_stream(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function stream_filter_append($stream, string $filtername, int $read_write, $params): resource
{
    $params = func_get_args();
    if (($resource = \stream_filter_append(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function stream_filter_prepend($stream, string $filtername, int $read_write, $params): resource
{
    $params = func_get_args();
    if (($resource = \stream_filter_prepend(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function stream_filter_register(string $filtername, string $classname): bool
{
    $params = func_get_args();
    if (($bool = \stream_filter_register(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_filter_remove($stream_filter): bool
{
    $params = func_get_args();
    if (($bool = \stream_filter_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_get_contents($handle, int $maxlength = -1, int $offset = -1): string
{
    $params = func_get_args();
    if (($string = \stream_get_contents(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function stream_is_local($stream_or_url): bool
{
    $params = func_get_args();
    if (($bool = \stream_is_local(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_isatty($stream): bool
{
    $params = func_get_args();
    if (($bool = \stream_isatty(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_resolve_include_path(string $filename): string
{
    $params = func_get_args();
    if (($string = \stream_resolve_include_path(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function stream_set_blocking($stream, bool $mode): bool
{
    $params = func_get_args();
    if (($bool = \stream_set_blocking(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_set_timeout($stream, int $seconds, int $microseconds = 0): bool
{
    $params = func_get_args();
    if (($bool = \stream_set_timeout(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_socket_accept($server_socket, float $timeout = ini_get("default_socket_timeout"), string $peername = null): resource
{
    $params = func_get_args();
    if (($resource = \stream_socket_accept(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function stream_socket_server(string $local_socket, int $errno, string $errstr, int $flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, $context = null): resource
{
    $params = func_get_args();
    if (($resource = \stream_socket_server(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function stream_socket_shutdown($stream, int $how): bool
{
    $params = func_get_args();
    if (($bool = \stream_socket_shutdown(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_supports_lock($stream): bool
{
    $params = func_get_args();
    if (($bool = \stream_supports_lock(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_wrapper_register(string $protocol, string $classname, int $flags = 0): bool
{
    $params = func_get_args();
    if (($bool = \stream_wrapper_register(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_wrapper_restore(string $protocol): bool
{
    $params = func_get_args();
    if (($bool = \stream_wrapper_restore(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function stream_wrapper_unregister(string $protocol): bool
{
    $params = func_get_args();
    if (($bool = \stream_wrapper_unregister(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function convert_uudecode(string $data): string
{
    $params = func_get_args();
    if (($string = \convert_uudecode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function convert_uuencode(string $data): string
{
    $params = func_get_args();
    if (($string = \convert_uuencode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function hex2bin(string $data): string
{
    $params = func_get_args();
    if (($string = \hex2bin(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function metaphone(string $str, int $phonemes = 0): string
{
    $params = func_get_args();
    if (($string = \metaphone(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function sprintf(string $format, $args, $...): string {
    $params = func_get_args();
    if (($string = \sprintf(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function stripos(string $haystack, string $needle, int $offset = 0): int
{
    $params = func_get_args();
    if (($int = \stripos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function strpos(string $haystack, $needle, int $offset = 0): int
{
    $params = func_get_args();
    if (($int = \strpos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function strripos(string $haystack, string $needle, int $offset = 0): int
{
    $params = func_get_args();
    if (($int = \strripos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function strrpos(string $haystack, string $needle, int $offset = 0): int
{
    $params = func_get_args();
    if (($int = \strrpos(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function strtok(string $str, string $token): string
{
    $params = func_get_args();
    if (($string = \strtok(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function strtok(string $token): string
{
    $params = func_get_args();
    if (($string = \strtok(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function substr(string $string, int $start, int $length): string
{
    $params = func_get_args();
    if (($string = \substr(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function sha256_file(string $filename, bool $raw_output): string
{
    $params = func_get_args();
    if (($string = \sha256_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function sha256(string $str, bool $raw_output): string
{
    $params = func_get_args();
    if (($string = \sha256(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function suhosin_encrypt_cookie(string $name, string $value): string
{
    $params = func_get_args();
    if (($string = \suhosin_encrypt_cookie(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function svn_add(string $path, bool $recursive = TRUE, bool $force = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \svn_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function svn_checkout(string $repos, string $targetpath, int $revision, int $flags = 0): bool
{
    $params = func_get_args();
    if (($bool = \svn_checkout(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function svn_cleanup(string $workingdir): bool
{
    $params = func_get_args();
    if (($bool = \svn_cleanup(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function svn_delete(string $path, bool $force = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \svn_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function svn_export(string $frompath, string $topath, bool $working_copy = TRUE, int $revision_no = -1): bool
{
    $params = func_get_args();
    if (($bool = \svn_export(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function svn_import(string $path, string $url, bool $nonrecursive): bool
{
    $params = func_get_args();
    if (($bool = \svn_import(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function svn_mkdir(string $path, string $log_message): bool
{
    $params = func_get_args();
    if (($bool = \svn_mkdir(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function svn_revert(string $path, bool $recursive = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \svn_revert(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function swoole_async_dns_lookup(string $hostname, callable $callback): bool
{
    $params = func_get_args();
    if (($bool = \swoole_async_dns_lookup(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function swoole_async_readfile(string $filename, callable $callback): bool
{
    $params = func_get_args();
    if (($bool = \swoole_async_readfile(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function swoole_async_write(string $filename, string $content, integer $offset, callable $callback): bool
{
    $params = func_get_args();
    if (($bool = \swoole_async_write(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function swoole_async_writefile(string $filename, string $content, callable $callback, int $flags = 0): bool
{
    $params = func_get_args();
    if (($bool = \swoole_async_writefile(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function swoole_event_defer(callable $callback): bool
{
    $params = func_get_args();
    if (($bool = \swoole_event_defer(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function swoole_event_del(int $fd): bool
{
    $params = func_get_args();
    if (($bool = \swoole_event_del(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function swoole_event_write(int $fd, string $data): bool
{
    $params = func_get_args();
    if (($bool = \swoole_event_write(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sybase_close($link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \sybase_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sybase_data_seek($result_identifier, int $row_number): bool
{
    $params = func_get_args();
    if (($bool = \sybase_data_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sybase_field_seek($result, int $field_offset): bool
{
    $params = func_get_args();
    if (($bool = \sybase_field_seek(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sybase_free_result($result): bool
{
    $params = func_get_args();
    if (($bool = \sybase_free_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sybase_pconnect(string $servername, string $username, string $password, string $charset, string $appname): resource
{
    $params = func_get_args();
    if (($resource = \sybase_pconnect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function sybase_query(string $query, $link_identifier): mixed
{
    $params = func_get_args();
    if (($mixed = \sybase_query(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function sybase_select_db(string $database_name, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \sybase_select_db(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function sybase_set_message_handler(callable $handler, $link_identifier): bool
{
    $params = func_get_args();
    if (($bool = \sybase_set_message_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function tidy_reset_config(): bool
{
    $params = func_get_args();
    if (($bool = \tidy_reset_config(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function tidy_save_config(string $filename): bool
{
    $params = func_get_args();
    if (($bool = \tidy_save_config(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function tidy_set_encoding(string $encoding): bool
{
    $params = func_get_args();
    if (($bool = \tidy_set_encoding(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function tidy_setopt(string $option, $value): bool
{
    $params = func_get_args();
    if (($bool = \tidy_setopt(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function odbc_binmode($result_id, int $mode): bool
{
    $params = func_get_args();
    if (($bool = \odbc_binmode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function odbc_columnprivileges($connection_id, string $qualifier, string $owner, string $table_name, string $column_name): resource
{
    $params = func_get_args();
    if (($resource = \odbc_columnprivileges(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_columns($connection_id, string $qualifier, string $schema, string $table_name, string $column_name): resource
{
    $params = func_get_args();
    if (($resource = \odbc_columns(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_commit($connection_id): bool
{
    $params = func_get_args();
    if (($bool = \odbc_commit(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function odbc_data_source($connection_id, int $fetch_type): array
{
    $params = func_get_args();
    if (($array = \odbc_data_source(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function odbc_exec($connection_id, string $query_string, int $flags): resource
{
    $params = func_get_args();
    if (($resource = \odbc_exec(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_execute($result_id, array $parameters_array): bool
{
    $params = func_get_args();
    if (($bool = \odbc_execute(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function odbc_fetch_into($result_id, array $result_array, int $rownumber): int
{
    $params = func_get_args();
    if (($int = \odbc_fetch_into(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function odbc_field_len($result_id, int $field_number): int
{
    $params = func_get_args();
    if (($int = \odbc_field_len(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function odbc_field_name($result_id, int $field_number): string
{
    $params = func_get_args();
    if (($string = \odbc_field_name(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function odbc_field_num($result_id, string $field_name): int
{
    $params = func_get_args();
    if (($int = \odbc_field_num(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function odbc_field_scale($result_id, int $field_number): int
{
    $params = func_get_args();
    if (($int = \odbc_field_scale(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function odbc_field_type($result_id, int $field_number): string
{
    $params = func_get_args();
    if (($string = \odbc_field_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function odbc_foreignkeys($connection_id, string $pk_qualifier, string $pk_owner, string $pk_table, string $fk_qualifier, string $fk_owner, string $fk_table): resource
{
    $params = func_get_args();
    if (($resource = \odbc_foreignkeys(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_longreadlen($result_id, int $length): bool
{
    $params = func_get_args();
    if (($bool = \odbc_longreadlen(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function odbc_prepare($connection_id, string $query_string): resource
{
    $params = func_get_args();
    if (($resource = \odbc_prepare(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_primarykeys($connection_id, string $qualifier, string $owner, string $table): resource
{
    $params = func_get_args();
    if (($resource = \odbc_primarykeys(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_procedurecolumns($connection_id): resource
{
    $params = func_get_args();
    if (($resource = \odbc_procedurecolumns(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_procedurecolumns($connection_id, string $qualifier, string $owner, string $proc, string $column): resource
{
    $params = func_get_args();
    if (($resource = \odbc_procedurecolumns(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_procedures($connection_id): resource
{
    $params = func_get_args();
    if (($resource = \odbc_procedures(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_procedures($connection_id, string $qualifier, string $owner, string $name): resource
{
    $params = func_get_args();
    if (($resource = \odbc_procedures(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_result_all($result_id, string $format): int
{
    $params = func_get_args();
    if (($int = \odbc_result_all(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function odbc_result($result_id, $field): mixed
{
    $params = func_get_args();
    if (($mixed = \odbc_result(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function odbc_rollback($connection_id): bool
{
    $params = func_get_args();
    if (($bool = \odbc_rollback(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function odbc_setoption($id, int $function, int $option, int $param): bool
{
    $params = func_get_args();
    if (($bool = \odbc_setoption(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function odbc_statistics($connection_id, string $qualifier, string $owner, string $table_name, int $unique, int $accuracy): resource
{
    $params = func_get_args();
    if (($resource = \odbc_statistics(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_tableprivileges($connection_id, string $qualifier, string $owner, string $name): resource
{
    $params = func_get_args();
    if (($resource = \odbc_tableprivileges(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function odbc_tables($connection_id, string $qualifier, string $owner, string $name, string $types): resource
{
    $params = func_get_args();
    if (($resource = \odbc_tables(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function uopz_add_function(string $function, Closure $handler, int $flags = ZEND_ACC_PUBLIC): bool
{
    $params = func_get_args();
    if (($bool = \uopz_add_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_add_function(string $class, string $function, Closure $handler, int $flags = ZEND_ACC_PUBLIC, int $all = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \uopz_add_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_del_function(string $function): bool
{
    $params = func_get_args();
    if (($bool = \uopz_del_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_del_function(string $class, string $function, int $all = TRUE): bool
{
    $params = func_get_args();
    if (($bool = \uopz_del_function(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_redefine(string $constant, $value): bool
{
    $params = func_get_args();
    if (($bool = \uopz_redefine(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_redefine(string $class, string $constant, $value): bool
{
    $params = func_get_args();
    if (($bool = \uopz_redefine(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_set_hook(string $function, Closure $hook): bool
{
    $params = func_get_args();
    if (($bool = \uopz_set_hook(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_set_hook(string $class, string $function, Closure $hook): bool
{
    $params = func_get_args();
    if (($bool = \uopz_set_hook(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_undefine(string $constant): bool
{
    $params = func_get_args();
    if (($bool = \uopz_undefine(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_undefine(string $class, string $constant): bool
{
    $params = func_get_args();
    if (($bool = \uopz_undefine(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_unset_hook(string $function): bool
{
    $params = func_get_args();
    if (($bool = \uopz_unset_hook(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function uopz_unset_hook(string $class, string $function): bool
{
    $params = func_get_args();
    if (($bool = \uopz_unset_hook(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function base64_decode(string $data, bool $strict = FALSE): string
{
    $params = func_get_args();
    if (($string = \base64_decode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function base64_encode(string $data): string
{
    $params = func_get_args();
    if (($string = \base64_encode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function import_request_variables(string $types, string $prefix): bool
{
    $params = func_get_args();
    if (($bool = \import_request_variables(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function settype($var, string $type): bool
{
    $params = func_get_args();
    if (($bool = \settype(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function wddx_add_vars($packet_id, $var_name, $...): bool {
    $params = func_get_args();
    if (($bool = \wddx_add_vars(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function wddx_packet_start(string $comment): resource
{
    $params = func_get_args();
    if (($resource = \wddx_packet_start(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function wddx_serialize_value($var, string $comment): string
{
    $params = func_get_args();
    if (($string = \wddx_serialize_value(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function wddx_serialize_vars($var_name, $...): string {
    $params = func_get_args();
    if (($string = \wddx_serialize_vars(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function wincache_fcache_fileinfo(bool $summaryonly = FALSE): array
{
    $params = func_get_args();
    if (($array = \wincache_fcache_fileinfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_fcache_meminfo(): array
{
    $params = func_get_args();
    if (($array = \wincache_fcache_meminfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_lock(string $key, bool $isglobal = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \wincache_lock(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function wincache_ocache_fileinfo(bool $summaryonly = FALSE): array
{
    $params = func_get_args();
    if (($array = \wincache_ocache_fileinfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_ocache_meminfo(): array
{
    $params = func_get_args();
    if (($array = \wincache_ocache_meminfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_refresh_if_changed(array $files = NULL): bool
{
    $params = func_get_args();
    if (($bool = \wincache_refresh_if_changed(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function wincache_rplist_fileinfo(bool $summaryonly = FALSE): array
{
    $params = func_get_args();
    if (($array = \wincache_rplist_fileinfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_rplist_meminfo(): array
{
    $params = func_get_args();
    if (($array = \wincache_rplist_meminfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_scache_info(bool $summaryonly = FALSE): array
{
    $params = func_get_args();
    if (($array = \wincache_scache_info(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_scache_meminfo(): array
{
    $params = func_get_args();
    if (($array = \wincache_scache_meminfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_ucache_cas(string $key, int $old_value, int $new_value): bool
{
    $params = func_get_args();
    if (($bool = \wincache_ucache_cas(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function wincache_ucache_clear(): bool
{
    $params = func_get_args();
    if (($bool = \wincache_ucache_clear(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function wincache_ucache_delete($key): bool
{
    $params = func_get_args();
    if (($bool = \wincache_ucache_delete(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function wincache_ucache_info(bool $summaryonly = FALSE, string $key = NULL): array
{
    $params = func_get_args();
    if (($array = \wincache_ucache_info(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_ucache_meminfo(): array
{
    $params = func_get_args();
    if (($array = \wincache_ucache_meminfo(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $array;
}



function wincache_unlock(string $key): bool
{
    $params = func_get_args();
    if (($bool = \wincache_unlock(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xattr_remove(string $filename, string $name, int $flags = 0): bool
{
    $params = func_get_args();
    if (($bool = \xattr_remove(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xattr_set(string $filename, string $name, string $value, int $flags = 0): bool
{
    $params = func_get_args();
    if (($bool = \xattr_set(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xdiff_file_bdiff(string $old_file, string $new_file, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \xdiff_file_bdiff(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xdiff_file_bpatch(string $file, string $patch, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \xdiff_file_bpatch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xdiff_file_diff_binary(string $old_file, string $new_file, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \xdiff_file_diff_binary(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xdiff_file_diff(string $old_file, string $new_file, string $dest, int $context = 3, bool $minimal = FALSE): bool
{
    $params = func_get_args();
    if (($bool = \xdiff_file_diff(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xdiff_file_patch_binary(string $file, string $patch, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \xdiff_file_patch_binary(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xdiff_file_rabdiff(string $old_file, string $new_file, string $dest): bool
{
    $params = func_get_args();
    if (($bool = \xdiff_file_rabdiff(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xdiff_string_bpatch(string $str, string $patch): string
{
    $params = func_get_args();
    if (($string = \xdiff_string_bpatch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function xdiff_string_patch_binary(string $str, string $patch): string
{
    $params = func_get_args();
    if (($string = \xdiff_string_patch_binary(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function xdiff_string_patch(string $str, string $patch, int $flags, string $error): string
{
    $params = func_get_args();
    if (($string = \xdiff_string_patch(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function xml_set_character_data_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_character_data_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xml_set_default_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_default_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xml_set_element_handler($parser, callable $start_element_handler, callable $end_element_handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_element_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}





function xml_set_end_namespace_decl_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_end_namespace_decl_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xml_set_external_entity_ref_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_external_entity_ref_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xml_set_notation_decl_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_notation_decl_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xml_set_object($parser, object $object): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_object(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function xml_set_processing_instruction_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_processing_instruction_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xml_set_start_namespace_decl_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_start_namespace_decl_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xml_set_unparsed_entity_decl_handler($parser, callable $handler): bool
{
    $params = func_get_args();
    if (($bool = \xml_set_unparsed_entity_decl_handler(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}




function xmlrpc_set_type(string $value, string $type): bool
{
    $params = func_get_args();
    if (($bool = \xmlrpc_set_type(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yaml_parse_file(string $filename, int $pos = 0, int $ndocs = null, array $callbacks = null): mixed
{
    $params = func_get_args();
    if (($mixed = \yaml_parse_file(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function yaml_parse_url(string $url, int $pos = 0, int $ndocs = null, array $callbacks = null): mixed
{
    $params = func_get_args();
    if (($mixed = \yaml_parse_url(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function yaml_parse(string $input, int $pos = 0, int $ndocs = null, array $callbacks = null): mixed
{
    $params = func_get_args();
    if (($mixed = \yaml_parse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function yaz_ccl_parse($id, string $query, array $result): bool
{
    $params = func_get_args();
    if (($bool = \yaz_ccl_parse(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yaz_close($id): bool
{
    $params = func_get_args();
    if (($bool = \yaz_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yaz_connect(string $zurl, $options): mixed
{
    $params = func_get_args();
    if (($mixed = \yaz_connect(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function yaz_database($id, string $databases): bool
{
    $params = func_get_args();
    if (($bool = \yaz_database(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yaz_element($id, string $elementset): bool
{
    $params = func_get_args();
    if (($bool = \yaz_element(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yaz_present($id): bool
{
    $params = func_get_args();
    if (($bool = \yaz_present(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yaz_search($id, string $type, string $query): bool
{
    $params = func_get_args();
    if (($bool = \yaz_search(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function yaz_wait(array $options): mixed
{
    $params = func_get_args();
    if (($mixed = \yaz_wait(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $mixed;
}



function zip_entry_close($zip_entry): bool
{
    $params = func_get_args();
    if (($bool = \zip_entry_close(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function zip_entry_open($zip, $zip_entry, string $mode): bool
{
    $params = func_get_args();
    if (($bool = \zip_entry_open(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function zip_entry_read($zip_entry, int $length = 1024): string
{
    $params = func_get_args();
    if (($string = \zip_entry_read(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function deflate_add($context, string $data, int $flush_mode = ZLIB_SYNC_FLUSH): string
{
    $params = func_get_args();
    if (($string = \deflate_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function deflate_init(int $encoding, array $options = array()): resource
{
    $params = func_get_args();
    if (($resource = \deflate_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function gzclose($zp): bool
{
    $params = func_get_args();
    if (($bool = \gzclose(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gzgets($zp, int $length): string
{
    $params = func_get_args();
    if (($string = \gzgets(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function gzgetss($zp, int $length, string $allowable_tags): string
{
    $params = func_get_args();
    if (($string = \gzgetss(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function gzinflate(string $data, int $length = 0): string
{
    $params = func_get_args();
    if (($string = \gzinflate(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function gzpassthru($zp): int
{
    $params = func_get_args();
    if (($int = \gzpassthru(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function gzrewind($zp): bool
{
    $params = func_get_args();
    if (($bool = \gzrewind(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $bool;
}



function gzuncompress(string $data, int $length = 0): string
{
    $params = func_get_args();
    if (($string = \gzuncompress(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function inflate_get_read_len($resource): int
{
    $params = func_get_args();
    if (($int = \inflate_get_read_len(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function inflate_get_status($resource): int
{
    $params = func_get_args();
    if (($int = \inflate_get_status(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $int;
}



function inflate_add($context, string $encoded_data, int $flush_mode = ZLIB_SYNC_FLUSH): string
{
    $params = func_get_args();
    if (($string = \inflate_add(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}



function inflate_init(int $encoding, array $options = array()): resource
{
    $params = func_get_args();
    if (($resource = \inflate_init(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $resource;
}



function zlib_decode(string $data, string $max_decoded_len): string
{
    $params = func_get_args();
    if (($string = \zlib_decode(...$params)) === FALSE) {
        $error = error_get_last();
        throw new FileWritingException($error['message']);
    }
    return $string;
}


        
