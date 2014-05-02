<?php

/**
 * PSR-0 compliant autoloader compatible with legacy Archrival class folder structure
 * @param string $class_name
 */
function autoload($class_name)
{
    $class_path = preg_replace('#\\\|_(?!.+\\\)#', '/', $class_name);
    include_once(__DIR__ . '/class/' . $class_path . '.php');
}
spl_autoload_register('autoload');