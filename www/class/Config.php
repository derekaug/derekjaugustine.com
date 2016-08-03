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
    public static $port;
    public static $canonical_host;
    public static $smtp;
    public static $environment;
    public static $asset_type;
    public static $current_url;
    public static $canonical_url;
    public static $inited = false;

    public static function init()
    {
        if (!static::$inited) {
            $de = new Dotenv\Dotenv(dirname(dirname(__DIR__)));
            $de->load();

            static::$inited = true;

            // get host first
            static::$host = $_SERVER['HTTP_HOST'];

            static::$canonical_host = 'derekaug.com';
            switch (static::$host) {
                case 'derekjaugustine.com':
                case 'www.derekjaugustine.com':
                case 'derekaugustine.com':
                case 'www.derekaugustine.com':
                case 'derekaug.com':
                case 'www.derekaug.com':
                    static::$environment = 'production';
                    static::$asset_type = 'min';
                    break;
                default:
                    static::$environment = 'development';
                    static::$asset_type = 'comb';
                    break;
            }
            static::$current_url = static::getCurrentURL();
            static::$canonical_url = static::getCanonicalURL();
            static::canonicalRedirect();
            static::sslRedirect();

            static::$root = __DIR__ . '/../';
            static::$smtp = array(
                'host' => 'smtp.mailgun.org',
                'port' => '587',
                'auth' => array(
                    'type' => 'login',
                    'user' => getenv('SMTP_USER'),
                    'pass' => getenv('SMTP_PASS'),
                    'ssl' => 'tls'
                )
            );

            static::$base_url = '//' . static::$host . '/';
            static::$body_class = 'bg-' . rand(1, 10);
            static::$contact_to = 'augshow@gmail.com';
            static::$contact_from = 'no-reply@' . static::$host;
            Session::init();
            
        }
    }

    public static function getCanonicalURL()
    {
        $parsed = parse_url(static::$current_url);
        if($parsed['host'] !== static::$canonical_host){
            $parsed['host'] = static::$canonical_host;
        }
        return static::buildURL($parsed);
    }

    public static function getSslUrl()
    {
        $parsed = parse_url(static::$current_url);
        if($parsed['scheme'] !== 'https'){
            $parsed['scheme'] = 'https';
        }
        return static::buildURL($parsed);
    }

    /**
     * handles redirection to canonical URL if the current host does not match
     */
    private static function canonicalRedirect()
    {
        if (static::$environment === 'production' && static::$host !== static::$canonical_host) {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . static::getCanonicalURL());
            exit();
        }
    }

    private static function sslRedirect()
    {
        if (static::$environment === 'production' && !static::isSsl()) {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . static::getSslUrl());
            exit();
        }
    }

    /**
     * @param [] $url_parts array of URL parts to build into string
     * @return string string built from URL parts
     */
    private static function buildURL($url_parts)
    {
        // from http://www.php.net/manual/en/function.parse-url.php#106731
        $scheme = isset($url_parts['scheme']) ? $url_parts['scheme'] . '://' : '';
        $host = isset($url_parts['host']) ? $url_parts['host'] : '';
        $port = isset($url_parts['port']) ? ':' . $url_parts['port'] : '';
        $user = isset($url_parts['user']) ? $url_parts['user'] : '';
        $pass = isset($url_parts['pass']) ? ':' . $url_parts['pass'] : '';
        $pass = ($user || $pass) ? "$pass@" : '';
        $path = isset($url_parts['path']) ? $url_parts['path'] : '';
        $query = isset($url_parts['query']) ? '?' . $url_parts['query'] : '';
        $fragment = isset($url_parts['fragment']) ? '#' . $url_parts['fragment'] : '';
        return "$scheme$user$pass$host$port$path$query$fragment";
    }

    /**
     * @return string current page URL
     */
    public static function getCurrentURL()
    {
        // from http://css-tricks.com/snippets/php/get-current-page-url/
        $url = !static::isSsl() ? 'http://' . $_SERVER["HTTP_HOST"] : 'https://' . $_SERVER["HTTP_HOST"];
        $url .= $_SERVER["REQUEST_URI"];
        return $url;
    }

    public static function isSsl()
    {
        return @($_SERVER["HTTPS"] == 'on');
    }
}

Config::init();
