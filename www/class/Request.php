<?php

class Request
{
    public static function get($name){
        return !isset($_REQUEST[$name]) ? null : $_REQUEST[$name];
    }

    public static function getSanitized($name){
        $rvalue = static::get($name);
        if (is_array($rvalue)) {
            foreach ($rvalue as &$v) {
                $v = htmlspecialchars($v, ENT_COMPAT, 'UTF-8', false);
            }
            unset($v);
        } else {
            $rvalue = htmlspecialchars($rvalue, ENT_COMPAT, 'UTF-8', false);
        }
        return $rvalue;
    }

    public static function getInteger($name){
        return intval(static::get($name), 10);
    }

    public static function getBoolean($name){
        return boolval(static::get($name));
    }
} 