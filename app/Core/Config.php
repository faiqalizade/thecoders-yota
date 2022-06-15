<?php
namespace App\Core;

class Config
{
    protected static array $appConfig = [];

    public static function getConfig($path)
    {
        $pathArr = explode(".", $path);
        $fileName = $pathArr[0];
        unset($pathArr[0]);
        if (!array_key_exists($fileName, self::$appConfig)) {
            $path = __DIR__."/../../config/{$fileName}.php";

            if (!file_exists($path)) {
                return null;
            }

            self::$appConfig[$fileName] = require_once $path;
        }
        $config = self::$appConfig[$fileName];

        foreach ($pathArr as $item) {
            $config = &$config[$item];
        }

        return $config ?? null;
    }
}
