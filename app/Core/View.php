<?php
namespace App\Core;


use Jenssegers\Blade\Blade;

class View
{
    protected static $blade;

    public function __construct(Blade $blade)
    {
        self::$blade = $blade;
    }

    public static function make($path, $vars = [])
    {
        return self::$blade->make($path, $vars)->render();
    }
}
