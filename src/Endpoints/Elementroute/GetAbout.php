<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Endpoint;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class GetAbout extends Endpoint
{
    protected static string $path = 'about';

    protected static ?string $parentEndpoint = Elementroute::class;

    protected static bool $requiresAuth = false;

    protected static HttpMethod $httpMethod = HttpMethod::GET;
}
