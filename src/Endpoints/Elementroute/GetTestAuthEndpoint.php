<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

use ElementRoute\ElementRouteSdkPhp\Endpoints\ElementrouteEndpoint;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class GetTestAuthEndpoint extends ElementrouteEndpoint
{
    protected static string $path = 'test-auth';

    protected static ?string $parentEndpoint = ElementrouteEndpoint::class;

    protected static HttpMethod $httpMethod = HttpMethod::GET;

    protected static bool $isValidEndpoint = true;
}
