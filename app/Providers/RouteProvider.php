<?php
namespace App\Providers;

use App\Core\Route;

class RouteProvider implements Provider
{
    private $routes;

    public function boot()
    {
        $web = __DIR__."/../../routes/web.php";
        $api = __DIR__."/../../routes/api.php";
        require_once $web;
        require_once $api;
    }
}
