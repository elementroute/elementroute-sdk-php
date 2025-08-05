<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetAbout;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class Elementroute extends Endpoint
{
    protected static string $path = 'elementroute';

    protected static bool $isValidEndpoint = false;

    public function about(HttpMethod $httpMethod = HttpMethod::GET): GetAbout
    {
        return match ($httpMethod) {
            HttpMethod::GET => new GetAbout($this->client),
            default => $this->throwInvalidHttpMethodException(),
        };
    }
}
