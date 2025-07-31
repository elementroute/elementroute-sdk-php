<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Endpoint;

class TestAuth extends Endpoint
{
    protected static string $path = 'test-auth';

    protected static ?string $parentEndpoint = Elementroute::class;
}
