<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

use ElementRoute\ElementRouteSdkPhp\Endpoints\ElementrouteEndpoint;

class TestAuthEndpoint extends ElementrouteEndpoint
{
    protected static string $path = 'test-auth';

    protected static ?string $parentEndpoint = ElementrouteEndpoint::class;

    protected static bool $isValidEndpoint = true;
}
