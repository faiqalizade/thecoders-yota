<?php

namespace App\Core;

use stdClass;
class Request extends stdClass
{
    private array $mergedRequest = [];

    public function __construct()
    {
        $this->mergedRequest = $_GET + $_POST;
    }

    public function __get(string $name)
    {
        if (!array_key_exists($name, $this->mergedRequest)) {
            return null;
        }

        return $this->mergedRequest[$name];
    }

    public function all(): array
    {
        return $this->mergedRequest;
    }
}