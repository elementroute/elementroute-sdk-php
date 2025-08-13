<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints\HpeContentManager;

use ElementRoute\ElementRouteSdkPhp\Endpoints\HpeContentManagerEndpoint;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;

class RecordsEndpoint extends HpeContentManagerEndpoint
{
    protected static string $path = 'records';

    protected static ?string $parentEndpoint = parent::class;

    protected static array|bool $requiresAuth = [
        HttpMethod::GET_VALUE => true,
        HttpMethod::POST_VALUE => true,
    ];

    protected static bool $isValidEndpoint = true;

    protected static array $allowedMethods = [
        HttpMethod::GET,
        HttpMethod::POST,
    ];
}
