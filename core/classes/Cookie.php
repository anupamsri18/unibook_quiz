<?php

/**
 * Created by PhpStorm.
 * User: CEIS
 * Date: 3/28/2016
 * Time: 11:58 AM
 */
class Cookie
{


    public static function put($key = '', $value = '')
    {
        $expiry = time()+24 * 365 * 60 * 60;
        setcookie($key,$value,$expiry);

    }

    public static function get($key)
    {
        if ($key) {
            if (self::exists($key)) {
                return $_COOKIE[$key];
            }
        }
        return null;
    }

    public static function exists($key = '')
    {
        if ($key) {
            if ($_COOKIE[$key] != null) {
                return true;
            }
        }
        return false;
    }

    public static function delete($key = '')
    {
        if ($key) {
            if (self::exists($key)) {
                setcookie($key, '', time() - 10);
            }
        }
    }
}