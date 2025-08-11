<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\MicrosoftSharepoint\FilesEndpoint;

class MicrosoftSharepointEndpoint extends Endpoint
{
    protected static string $path = 'microsoft-sharepoint';

    protected static bool $isValidEndpoint = false;

    public function files(): FilesEndpoint
    {
        return new FilesEndpoint($this->client);
    }
}
