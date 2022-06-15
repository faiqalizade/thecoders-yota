<?php
namespace App\Providers;

use \R;
class DatabaseProvider implements Provider
{
    protected $db;

    public function boot()
    {
        $config = require_once __DIR__."/../../database/config.php";
        R::setup( "mysql:host={$config['host']}:{$config['port']};dbname={$config['db']}", $config['username'], $config['password'] );
    }
}
