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
                Session::set(static::SESSION_KEY, static::$data);
                header('Location: ' . static::$redirect);
                break;
        }
    }

    public static function getMessages()
    {
        $rvalue = '';
        $stored = self::getSessionData();
        $messages = !empty($stored['messages']) ? $stored['messages'] : array();
        $engine = new Mustache_Engine();
        $template = file_get_contents(Config::$root . '/templates/message.mustache');
        foreach($messages as $m){
            $rvalue .= $engine->render($template, $m);
        }
        Session::set(static::SESSION_KEY, null);
        return $rvalue;
    }

    public static function getSessionData()
    {
        $val = Session::get(static::SESSION_KEY);
        return !empty($val) ? $val : null;
    }

    public static function clearSessionData()
    {
        Session::set(static::SESSION_KEY, null);
    }
}

Response::init();