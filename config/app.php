<?php

return [
    'path_prefix' => '',

    'providers' => [
        App\Providers\RouteProvider::class,
        App\Providers\ViewProvider::class,
        App\Providers\DatabaseProvider::class
    ],

    'middlewares' => [
        'auth' => App\Middlewares\Auth::class,
        'auth_admin' => App\Middlewares\Auth::class
    ]
];
