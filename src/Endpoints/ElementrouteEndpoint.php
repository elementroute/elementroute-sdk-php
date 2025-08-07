<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetAboutEndpoint;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetTestAuthEndpoint;

class ElementrouteEndpoint extends Endpoint
{
    protected static string $path = 'elementroute';

    protected static bool $isValidEndpoint = false;

    public function about(): GetAboutEndpoint
    {
        return new GetAboutEndpoint($this->client);
    }

    public function testAuth(): GetTestAuthEndpoint
    {
        return new GetTestAuthEndpoint($this->client);
    }
}
