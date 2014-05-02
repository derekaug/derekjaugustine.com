<?php

class Config
{
    /** @var string root directory of website */
    public static $root;
    /** @var string base url of website */
    public static $base_url;
    /** @var string CSS class to add to body, random backgrounds */
    public static $body_class;
    /** @var string email to use for contact to: */
    public static $contact_to;
    public static $contact_from;
    public static $host;

    public static $smtp;

    public static function init()
    {
        static::$root = __DIR__ . '/../';
        $settings = json_decode(file_get_contents(static::$root . 'config.json'), true);
        static::$smtp = $settings['smtp'];

        static::$host = $_SERVER['SERVER_NAME'];
        static::$base_url = 'http://' . static::$host . '/';
        static::$body_class = 'bg-' . rand(1, 10);
        static::$contact_to = 'augshow@gmail.com';
        static::$contact_from = 'no-reply@' . static::$host;
    }
}

// init config so default values get set
Config::init();