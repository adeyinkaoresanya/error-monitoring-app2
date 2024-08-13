<?php

// src/error_handling.php

function customErrorHandler($errno, $errstr, $errfile, $errline) {
    $log = "[" . date('Y-m-d H:i:s') . "] Error: [$errno] $errstr in $errfile on line $errline\n";
    error_log($log, 3, __DIR__ . '/../error.log');
    // Optionally, you can halt the script for critical errors:
    if ($errno == E_USER_ERROR) {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents(__DIR__ . '/../critical_error.flag', "true ". $timestamp);
    }
}

set_error_handler("customErrorHandler");