<?php

use App\Services\Route;

define('APP_ROOT', __DIR__ );
require_once(APP_ROOT. '/vendor/autoload.php');

// autoload namespace 
spl_autoload_register(function($class){
    $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = APP_ROOT. DIRECTORY_SEPARATOR . "app". DIRECTORY_SEPARATOR . $classFile. '.php';
    echo $file;
    return;
    if (file_exists($file)) {
        require_once($file);
    } else {
        throw new Exception("Class file for {$class} not found: {$file}");
    }
});

session_start();

$route = new Route();
require_once(APP_ROOT. '/routes/web.php');
$route->handle();


