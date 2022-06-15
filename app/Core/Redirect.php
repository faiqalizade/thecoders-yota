<?php

namespace App\Core;

use JetBrains\PhpStorm\NoReturn;

class Redirect
{
    private static string|null $path;

    public static function redirect($path = null)
    {
        self::$path = config('app.path_prefix').$path;
        return new self();
    }

    public function back()
    {
        self::$path = $_SERVER['HTTP_REFERER'];
    }

    public function home()
    {
        self::$path = config('app.path_prefix')."";
    }

    public function to($routeName)
    {
        self::$path = route($routeName);
    }

    #[NoReturn] public function __destruct()
    {
        header("Location: ".self::$path);
        exit();
    }
}