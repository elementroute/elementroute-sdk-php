<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\AboutEndpoint;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\TestAuthEndpoint;

class ElementrouteEndpoint extends Endpoint
{
    protected static string $path = 'elementroute';

    protected static bool $isValidEndpoint = false;

    public function about(): AboutEndpoint
    {
        return new AboutEndpoint($this->client);
    }

    public function testAuth(): TestAuthEndpoint
    {
        return new TestAuthEndpoint($this->client);
    }
}
