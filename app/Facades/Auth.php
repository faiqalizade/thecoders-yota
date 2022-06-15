<?php
namespace App\Facades;

class Auth
{
    public static object|array|null $user;

    public static function user($role, $user)
    {
        self::$user = $user;
        setcookie("user_$role", json_encode($user));
    }
}