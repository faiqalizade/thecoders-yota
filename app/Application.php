<?php
namespace App;
use App\Core\Route;
use App\Core\View;

class Application
{

    // URL prefix. Current Project Opened at MAMP where we have SmartSoft prefix in urls
    private string|null $prefix = '';

    private array $middlewares = [];

    public function __construct()
    {
        $this->prefix = config('app.path_prefix');
        $this->loadProviders(config('app.providers'));
    }

    public function run()
    {
        $uri = parse_url(str_replace($this->prefix, '', $_SERVER['REQUEST_URI']))['path'];
        $route = Route::checkRoute($uri);
        if (!$route) {
            http_response_code(404);
            return View::make('404');
        }

        $middleware = Route::routeHasMiddleware($route['path']);

        if ($middleware) {
            $middleware = new (config("app.middlewares.$middleware"))();
            $middleware->run();
        }
        // TODO we can use DTO but don't have enough time
        $controller = new $route['route'][0]();
        $method = $route['route'][1];
        $arguments = $route['arguments'];
        if (!method_exists($controller, $method)) {
            http_response_code(500);
            die("Method <b>$method</b> is not found in <b>".get_class($controller)."</b>");
        }
        $response = call_user_func_array([$controller, $method], $arguments);
        if (is_array($response)) {
            header('Content-Type: application/json; charset=utf-8');
            return json_encode($response);
        }

        return $response;
    }

    private function loadProviders($providers)
    {
        foreach ($providers as $provider) {
            $instance = new $provider;
            $instance->boot();
            $this->providers[] = $instance;
        }
    }
}
