<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\HpeContentManager\RecordsEndpoint;

class HpeContentManagerEndpoint extends Endpoint
{
    protected static string $path = 'hpe-content-manager';

    protected static bool $isValidEndpoint = false;

    public function records(): RecordsEndpoint
    {
        return new RecordsEndpoint($this->client);
    }
}
