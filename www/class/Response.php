<?php

class Response
{
    const SESSION_KEY = 'RESPONSE';

    public static $redirect = null;
    public static $data = null;
    public static $output = 'json';

    public static function init()
    {
        static::$redirect = Config::$base_url;
    }

    public static function render()
    {
        switch (static::$output) {
            case 'json':
                // format data as json
                echo json_encode(static::$data);
                break;
            case 'plain':
                // respond with plain text
                echo static::$data;
                break;
            default:
                // redirect is default and save response to session
                Session::start();
                $_SESSION[static::SESSION_KEY] = serialize(static::$data);
                Session::writeClose();
                header('Location: ' . static::$redirect);
                break;
        }
    }

    public static function getSessionData(){
        Session::start();
        Session::writeClose();
        return !empty($_SESSION[static::SESSION_KEY]) ? unserialize($_SESSION[static::SESSION_KEY]) : null;
    }

    public static function clearSessionData(){
        Session::start();
        $_SESSION[static::SESSION_KEY] = null;
        unset($_SESSION[static::SESSION_KEY]);
        Session::writeClose();
    }
}

Response::init();