<?php

/**
 * how to use
 * pass the path for $loc
 */
class Redirect
{
    /* Redirect::to('login.php');*/
    public static function to($loc = null)
    {
        if ($loc) {
            header("location:" . $loc);
            exit();
        } else {
            header("location:index.php");
            exit();
        }
    }

    /* Redirect::with('login.php','m=success&v=1');*/
    public static function with($loc = null, $data = '')
    {
        if ($loc) {
            if ($data) {
                header("location:" . $loc . "?" . $data);
            }
            header("location:" . $loc);
            exit();
        } else {
            header("location:index.php");
            exit();
        }
    }
}

