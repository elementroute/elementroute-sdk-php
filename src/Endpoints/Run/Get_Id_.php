<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Run;

use ElementRoute\ElementRouteSdkPhp\Endpoints\Endpoint;
use ElementRoute\ElementRouteSdkPhp\Endpoints\Run;
use ElementRoute\ElementRouteSdkPhp\ErClient;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class Get_Id_ extends Endpoint
{
    protected static string $path = '{id}';

    protected static ?string $parentEndpoint = Run::class;

    protected static HttpMethod $httpMethod = HttpMethod::GET;

    public function __construct(
        ErClient $client,
        protected string $id,
    ) {
        parent::__construct($client);
    }
}
