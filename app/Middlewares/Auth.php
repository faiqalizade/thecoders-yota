<?php
namespace App\Middlewares;

use App\Middlewares\Middleware;

class Auth extends Middleware
{
    public function run()
    {

    }

    public static function user($role, $user)
    {
        // TODO auth verification error
        setcookie("user_$role", json_encode($user));
    }
}
