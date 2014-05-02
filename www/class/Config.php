<?php

class Config
{
    public static $root;
    public static $base_href;
    public static $body_class;

    public static function init()
    {
        static::$root = __DIR__ . '/../';
        static::$base_href = 'http://' . $_SERVER['SERVER_NAME'] . '/';
        static::$body_class = 'bg-' . rand(1, 10);
    }
}

Config::init();