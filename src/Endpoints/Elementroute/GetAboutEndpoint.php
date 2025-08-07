<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

use ElementRoute\ElementRouteSdkPhp\Endpoints\ElementrouteEndpoint;

class GetAboutEndpoint extends ElementrouteEndpoint
{
    protected static string $path = 'about';

    protected static ?string $parentEndpoint = ElementrouteEndpoint::class;

    protected static bool $requiresAuth = false;

    protected static bool $isValidEndpoint = true;
}
