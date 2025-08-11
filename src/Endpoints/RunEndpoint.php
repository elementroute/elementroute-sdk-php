<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Run\_RunId_Endpoint;

class RunEndpoint extends Endpoint
{
    protected static string $path = 'run';

    protected static bool $isValidEndpoint = false;

    public function _id_(string $id): _RunId_Endpoint
    {
        return new _RunId_Endpoint($this->client, $id);
    }
}
