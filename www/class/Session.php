<?php

class Session
{
    public static function init()
    {
        $temp = sys_get_temp_dir();
        session_save_path($temp);

        $session_length = 60 * 60 * 24; // 1 day for how long session will last
        $session_regenerate_length = 60 * 15; // regenerate session id every 15 minutes

        ini_set('session.name', 'DJASESSION');
        ini_set('session.cookie_lifetime', 0);
        ini_set('session.gc_maxlifetime', $session_length);

        session_start();
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $session_length)) {
            session_unset();
            session_destroy();
        }
        $_SESSION['LAST_ACTIVITY'] = time();

        if (!isset($_SESSION['CREATED'])) {
            $_SESSION['CREATED'] = time();
        } else {
            if (time() - $_SESSION['CREATED'] > $session_regenerate_length) {
                session_regenerate_id(true);
                $_SESSION['CREATED'] = time();
            }
        }
        session_write_close();

        // don't set session cookies again when calling session_start again
        ini_set('session.use_only_cookies', false);
        ini_set('session.use_cookies', false);
        ini_set('session.cache_limiter', null);
    }

    /**
     * @param string $key key to get
     * @return mixed|null value of session key
     */
    public static function get($key){
        session_start();
        session_write_close();
        return empty($_SESSION[$key]) ? null : unserialize($_SESSION[$key]);
    }

    /**
     * @param string $key key to set
     * @param mixed $value value to set
     */
    public static function set($key, $value){
        session_start();
        $_SESSION[$key] = serialize($value);
        if(is_null($value)){
            $_SESSION[$key] = null;
            unset($_SESSION[$key]);
        }
        session_write_close();
    }
}