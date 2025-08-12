<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\MicrosoftSharepoint;

use ElementRoute\ElementRouteSdkPhp\Endpoints\MicrosoftSharepointEndpoint;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class FilesEndpoint extends MicrosoftSharepointEndpoint
{
    protected static string $path = 'files';

    protected static ?string $parentEndpoint = MicrosoftSharepointEndpoint::class;

    protected static array|bool $requiresAuth = [
        HttpMethod::GET_VALUE => true,
        HttpMethod::POST_VALUE => true,
    ];

    protected static bool $isValidEndpoint = true;
}
