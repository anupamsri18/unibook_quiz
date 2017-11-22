<?php

class Session
{
    /*Session::put('name','zaid')*/
    public static function put($key = '', $value = '')
    {
        if ($key && $value) {
            $_SESSION[$key] = $value;
        }
    }

    /* $var = Session::get('name')*/
    public static function get($key = '')
    {
        if ($key) {
            if (self::exists($key)) {
                return $_SESSION[$key];
            }
        }
        return null;
    }

    /* Session::delete('name')*/
    public static function delete($key = '')
    {
        if ($key) {
            if (self::exists($key)) {
                $_SESSION[$key] = '';
                unset($_SESSION[$key]);
            }
        }
    }

    /* $var = Session::exists('name')*/
    public static function exists($key = '')
    {
        if ($key) {
            if ($_SESSION[$key] != null) {
                return true;
            }
        }
        return false;
    }
}
