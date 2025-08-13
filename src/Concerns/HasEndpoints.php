<?php

namespace ElementRoute\ElementRouteSdkPhp\Concerns;

use ElementRoute\ElementRouteSdkPhp\Endpoints\ElementrouteEndpoint;
use ElementRoute\ElementRouteSdkPhp\Endpoints\HpeContentManagerEndpoint;
use ElementRoute\ElementRouteSdkPhp\Endpoints\MicrosoftSharepointEndpoint;
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

    public function microsoftSharepoint(): MicrosoftSharepointEndpoint
    {
        return new MicrosoftSharepointEndpoint($this);
    }

    public function hpeContentManager(): HpeContentManagerEndpoint
    {
        return new HpeContentManagerEndpoint($this);
    }
}
