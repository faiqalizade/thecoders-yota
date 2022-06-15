<?php
namespace App\Models;

use \R;
use RedBeanPHP\OODBBean;

class Model
{
    public static string $tableName;
    private static OODBBean $bean;

    public function __construct()
    {
        static::$bean = R::dispense(static::$tableName);
    }

    public function __set(string $name, $value): void
    {
        static::$bean->$name = $value;
    }

    public function save()
    {
        return R::store(static::$bean);
    }

    public static function __callStatic($pluginName, $params)
    {
        array_unshift($params, static::$tableName);
        return R::$pluginName(...$params);
    }
}