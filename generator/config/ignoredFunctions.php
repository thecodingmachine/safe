<?php
return [
    'array_key_exists',
    'is_executable',
    'is_uploaded_file',
    'stream_is_local',
    'is_soap_fault',
    // Type hints to object OCI-Lob (weird class that has a dash in its name!)
    'oci_lob_copy',
    'func_get_arg',
    //'mktime', // 7th parameter has been removed in PHP 7
    'call_user_func_array',
    'mb_check_encoding',
    'array_search',
];