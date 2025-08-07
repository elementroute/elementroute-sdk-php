<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Run\Get_RunId_Endpoint;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class RunEndpoint extends Endpoint
{
    protected static string $path = 'run';

    protected static bool $isValidEndpoint = false;

    public function _id_(string $id, HttpMethod $httpMethod = HttpMethod::GET): Get_RunId_Endpoint
    {
        return match ($httpMethod) {
            HttpMethod::GET => new Get_RunId_Endpoint($this->client, $id),
            default => $this->throwInvalidHttpMethodException(),
        };
    }
}
