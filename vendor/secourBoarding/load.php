<?php
/**
 * Created by redouane YAHIAOUI.
 * Date: 23/04/2020
 * Time: 10:00
 */
function boardingAutoload($class_name)
{
    $file = dirname(__DIR__ . "/classes/") . "/classes/{$class_name}.php";
    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('boardingAutoload');