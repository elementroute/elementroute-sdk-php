<?php

namespace ElementRoute\ElementRouteSdkPhp\Concerns;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute;

trait HasEndpoints
{
    public function elementroute(): Elementroute
    {
        return new Elementroute($this);
    }
}
