<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Run\Get_RunId_Endpoint;

class RunEndpoint extends Endpoint
{
    protected static string $path = 'run';

    protected static bool $isValidEndpoint = false;

    public function _id_(string $id): Get_RunId_Endpoint
    {
        return new Get_RunId_Endpoint($this->client, $id);
    }
}
