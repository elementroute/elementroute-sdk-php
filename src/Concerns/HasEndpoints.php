<?php

namespace ElementRoute\ElementRouteSdkPhp\Concerns;

use ElementRoute\ElementRouteSdkPhp\Endpoints\ElementrouteEndpoint;
use ElementRoute\ElementRouteSdkPhp\Endpoints\RunEndpoint;

trait HasEndpoints
{
    public function elementroute(): ElementrouteEndpoint
    {
        return new ElementrouteEndpoint($this);
    }

    public function run(): RunEndpoint
    {
        return new RunEndpoint($this);
    }
}
