<?php

use App\Core\View;

function redirect($path = null)
{
    return App\Core\Redirect::redirect($path);
}

function config($path)
{
    return App\Core\Config::getConfig($path);
}

function dd(...$args)
{
    echo "<pre>";
    foreach ($args as $arg)
    {
        print_r($arg);
    }
    die();
}

function route($name, $args = [])
{
    return \App\Core\Route::getRouteByName($name, $args);
}

function view($path, $vars = []): string
{
    return View::make($path, $vars);
}

function request()
{
    return new \App\Core\Request();
}

function asset($path)
{
    return $path;
}

function getCommentChildHTML($comment, $level = 1)
{
    foreach ($comment['children'] as $child) {
        echo View::make('components.children', [
            'item' => $child,
            'level' => $level
        ]);
    }
}
