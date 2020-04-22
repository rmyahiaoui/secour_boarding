<?php

function boardingAutoload($class_name)
{
    $file = dirname(__DIR__ . "/../vendor/secourBoarding/classes/") . "/classes/{$class_name}.php";
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('boardingAutoload');

function boardingTestAutoload($class_name)
{
    $file = dirname(__DIR__) . "/tests/{$class_name}.php";
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('boardingTestAutoload');
