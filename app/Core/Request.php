<?php

namespace App\Core;

use stdClass;
class Request extends stdClass
{
    private array $mergedRequest = [];

    public function __construct()
    {
        $jsonBody = [];
        foreach (explode('&', file_get_contents("php://input")) as $couple) {
            list ($key, $val) = explode('=', $couple);
            $jsonBody[$key] = $val;
        }

        $this->mergedRequest = $_GET + $_POST + $jsonBody;
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
