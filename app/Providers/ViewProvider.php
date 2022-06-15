<?php

namespace App\Providers;

use App\Core\View;
use Jenssegers\Blade\Blade;

class ViewProvider implements Provider
{
    public function boot()
    {
        $blade = new Blade(__DIR__.'/../../resources/views', __DIR__.'/../../storage/cache');
        $blade->share('prefix', config('app.path_prefix'));
        new View($blade);
    }
}
