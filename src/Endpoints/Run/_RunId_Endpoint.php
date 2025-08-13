<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\Run;

use ElementRoute\ElementRouteSdkPhp\Endpoints\RunEndpoint;
use ElementRoute\ElementRouteSdkPhp\ErClient;

class _RunId_Endpoint extends RunEndpoint
{
    protected static string $path = '{runId}';

    protected static ?string $parentEndpoint = parent::class;

    protected static bool $isValidEndpoint = true;

    public function __construct(
        ErClient $client,
        protected string $runId,
    ) {
        parent::__construct($client);
    }
}
