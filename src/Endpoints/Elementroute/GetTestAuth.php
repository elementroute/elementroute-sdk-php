<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Endpoint;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class GetTestAuth extends Endpoint
{
    protected static string $path = 'test-auth';

    protected static ?string $parentEndpoint = Elementroute::class;

    protected static HttpMethod $httpMethod = HttpMethod::GET;
}
