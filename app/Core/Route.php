<?php
namespace App\Core;

class Route
{
    private static array $routes = [];
    private static array $availableRoutesForCurrentHttpMethod = [];
    private static array $middlewares = [];
    private static string $route;
    private static array $namedRoutes = [];

    public static function get($path, $argument)
    {
        if (!$path) {
            return false;
        }
        $path = self::validateRoute($path);
        self::$routes['GET'][$path] = $argument;
        self::$route = $path;
        return new static();
    }

    public static function post($path, $argument)
    {
        if (!$path) {
            return null;
        }
        $path = self::validateRoute($path);
        self::$route = $path;
        self::$routes['POST'][$path] = $argument;
        return new static();
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function checkRoute($currentUri): array|string|bool
    {
        $currentUri = self::validateRoute($currentUri);

        if (!array_key_exists($_SERVER['REQUEST_METHOD'], self::$routes)) {
            return false;
        }

        self::$availableRoutesForCurrentHttpMethod = self::$routes[$_SERVER['REQUEST_METHOD']];
        if (!self::$availableRoutesForCurrentHttpMethod) {
            return false;
        }

        if (array_key_exists($currentUri, self::$availableRoutesForCurrentHttpMethod)) {
            return [
                'route' => self::$availableRoutesForCurrentHttpMethod[$currentUri],
                'path' => $currentUri,
                'arguments' => []
            ];
        }
        return self::checkRouteRegex($currentUri);
    }

    private static function checkRouteRegex($currentUri): array|bool
    {
        foreach (array_keys(self::$availableRoutesForCurrentHttpMethod) as $availableRoute)
        {
            if (preg_match("/{[A-Z0-9a-z]+}/", $availableRoute)) {
                $pattern = preg_replace('/{[A-Z0-9a-z]+}/', "[A-Z0-9a-z]+", $availableRoute);
                $pattern = str_replace("/", "\/", $pattern);
                $pattern = "/^$pattern$/";
                if (preg_match($pattern, $currentUri)) {

                    $routeArguments = [];
                    $availableRouteElements = explode('/', $availableRoute);
                    $currentRouteElements = explode('/', $currentUri);

                    if (count($currentRouteElements) !== count($availableRouteElements)) {
                        return false;
                    }

                    foreach ($availableRouteElements as $index => $element) {
                        if (preg_match("/{[A-Z0-9a-z]+}/", $element)) {
                            $argument = str_replace(["{", "}"], '', $element);
                            $routeArguments[$argument] = $currentRouteElements[$index];
                        }
                    }
                    return [
                        'route' => self::$availableRoutesForCurrentHttpMethod[$availableRoute],
                        'path' => $availableRoute,
                        'arguments' => $routeArguments
                    ];
                }
            }
        }
        return false;
    }

    private static function validateRoute(string $route): string
    {
        if (str_contains($route, "//")) {
            $route = str_replace("//", '/', $route);
            return self::validateRoute($route);
        }
        if ($route[-1] == '/' and $route != '/') {
            $route = substr($route, 0, strlen($route) - 1);
        }
        if ($route[0] != '/' and $route != '/') {
            $route = "/$route";
        }

        return trim($route);
    }

    public function middleware($middleware): static
    {
        self::$middlewares[self::$route] = $middleware;
        return new static();
    }


    public function name($name)
    {
        self::$namedRoutes[$name] = self::$route;
        return new static();
    }

    public static function routeHasMiddleware($path)
    {
        if (array_key_exists($path, self::$middlewares))
        {
            return self::$middlewares[$path];
        }

        return false;
    }

    public static function getRouteByName($name, $arguments = [])
    {
        if (!array_key_exists($name, self::$namedRoutes)) {
            return '';
        }
        return config('app.path_prefix').self::$namedRoutes[$name];
    }
}
