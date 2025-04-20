<?php
spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = $_SERVER['DOCUMENT_ROOT'].'/CloudflareApi/PurgeZones';
    $file = $path. '/' . $classPath . '.php';


    if (file_exists($file)) {
        require_once $file;
    } else {
        error_log("Autoload error: $file bulunamadı.");
    }
});

