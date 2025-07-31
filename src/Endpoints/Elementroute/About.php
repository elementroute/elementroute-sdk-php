<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Endpoint;

class About extends Endpoint
{
    protected static string $path = 'about';

    protected static ?string $parentEndpoint = Elementroute::class;

    protected static bool $requiresAuth = false;
}
