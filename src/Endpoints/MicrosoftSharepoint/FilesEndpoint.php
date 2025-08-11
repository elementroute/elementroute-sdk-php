<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\MicrosoftSharepoint;

use ElementRoute\ElementRouteSdkPhp\Endpoints\MicrosoftSharepointEndpoint;

class FilesEndpoint extends MicrosoftSharepointEndpoint
{
    protected static string $path = 'files';

    protected static ?string $parentEndpoint = MicrosoftSharepointEndpoint::class;

    protected static bool $requiresAuth = true;

    protected static bool $isValidEndpoint = true;
}
