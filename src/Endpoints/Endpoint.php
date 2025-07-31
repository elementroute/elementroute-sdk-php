<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\ErClient;

abstract class Endpoint
{
    protected static string $path;

    /** @var class-string<Endpoint>|null */
    protected static ?string $parentEndpoint = null;

    protected static bool $requiresAuth = true;

    public function __construct(
        protected ErClient $client,
    ) {
        //
    }

    public static function getPath(): string
    {
        $path = '';

        if (! is_null(static::$parentEndpoint)) {
            $path = static::$parentEndpoint::getPath();

            if (! str_ends_with($path, '/')) {
                $path .= '/';
            }
        }

        return $path.static::$path;
    }

    public static function requiresAuth(): bool
    {
        return static::$requiresAuth;
    }
}
