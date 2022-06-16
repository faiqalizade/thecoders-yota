<?php
namespace App\Models;

use \R;
use RedBeanPHP\OODBBean;

/**
 * @method static Model load($id);
 */
class Model extends \stdClass implements \JsonSerializable
{
    public static string $tableName;
    public array $attributes;
    private static ?OODBBean $bean = null;

    public function __construct()
    {
        if (!static::$bean) {
            static::$bean = R::dispense(static::$tableName);
        }
    }

    public function jsonSerialize()
    {
        return static::$bean->getProperties();
    }

    public function __set(string $name, $value): void
    {
        static::$bean->$name = $value;
    }

    public function __get(string $name)
    {
        return static::$bean->$name;
    }

    public function __debugInfo(): ?array
    {
        return static::$bean->getProperties();
    }

    public function save()
    {
        return R::store(static::$bean);
    }


    public function delete()
    {
        return R::trash(static::$bean);
    }

    public static function __callStatic($pluginName, $params)
    {
        array_unshift($params, static::$tableName);
        $result = R::$pluginName(...$params);
        if ($result instanceof OODBBean) {
            static::$bean = $result;
            return new static();
        }

        if (is_array($result)) {
            $_return = [];
            foreach ($result as $bean) {
                $properties = $bean->getProperties();
                $_return[$properties['id']] = $properties;
            }
            $result = $_return;
        }

        return $result;
    }
}
