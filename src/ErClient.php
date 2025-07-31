<?php

namespace ElementRoute\ElementRouteSdkPhp;

use GuzzleHttp\Client;

class ErClient
{
    protected string $baseUrl = 'https://www.elementroute.com/api';

    protected Client $client;

    public function __construct(
        protected string $clientId,
        protected string $clientSecret,
        protected string $version = 'v1',
    ) {
        $this->client = new Client;
    }

    public static function make(
        string $clientId,
        string $clientSecret,
        string $version = 'v1',
    ): ErClient {
        return new ErClient(
            clientId: $clientId,
            clientSecret: $clientSecret,
            version: $version,
        );
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): ErClient
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }
}
