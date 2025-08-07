<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Run;

use ElementRoute\ElementRouteSdkPhp\Endpoints\RunEndpoint;
use ElementRoute\ElementRouteSdkPhp\ErClient;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class Get_RunId_Endpoint extends RunEndpoint
{
    protected static string $path = '{runId}';

    protected static ?string $parentEndpoint = RunEndpoint::class;

    protected static HttpMethod $httpMethod = HttpMethod::GET;

    protected static bool $isValidEndpoint = true;

    public function __construct(
        ErClient $client,
        protected string $runId,
    ) {
        parent::__construct($client);
    }
}
