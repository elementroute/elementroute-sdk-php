<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetAboutEndpoint;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetTestAuthEndpoint;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class ElementrouteEndpoint extends Endpoint
{
    protected static string $path = 'elementroute';

    protected static bool $isValidEndpoint = false;

    public function about(HttpMethod $httpMethod = HttpMethod::GET): GetAboutEndpoint
    {
        return match ($httpMethod) {
            HttpMethod::GET => new GetAboutEndpoint($this->client),
            default => $this->throwInvalidHttpMethodException(),
        };
    }

    public function testAuth(HttpMethod $httpMethod = HttpMethod::GET): GetTestAuthEndpoint
    {
        return match ($httpMethod) {
            HttpMethod::GET => new GetTestAuthEndpoint($this->client),
            default => $this->throwInvalidHttpMethodException(),
        };
    }
}
