<?php

namespace ElementRoute\ElementRouteSdkPhp;

class ElementRouteClient
{
    protected string $baseUrl = 'https://www.elementroute.com/api';

    public function __construct(
        protected string|null $clientId = null,
        protected string|null $clientSecret = null,
        protected string $version = 'v1',
    )
    {

    }

    public static function make(
        string|null $clientId = null,
        string|null $clientSecret = null,
        string $version = 'v1',
    ): ElementRouteClient
    {
        return new ElementRouteClient(
            clientId: $clientId,
            clientSecret: $clientSecret,
            version: $version,
        );
    }

    public function setBaseUrl(string $baseUrl): ElementRouteClient
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }
}
