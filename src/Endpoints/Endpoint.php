<?php

namespace ElementRoute\ElementRouteSdkPhp\Endpoints;

use ElementRoute\ElementRouteSdkPhp\ErClient;
use ElementRoute\ElementRouteSdkPhp\Exceptions\InvalidEndpointException;
use ElementRoute\ElementRouteSdkPhp\Exceptions\InvalidHttpMethodException;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class Endpoint
{
    protected static string $path;

    /** @var class-string<Endpoint>|null */
    protected static ?string $parentEndpoint = null;

    protected static bool $requiresAuth = true;

    protected static bool $isValidEndpoint;

    protected array $options = [];

    public function __construct(
        protected ErClient $client,
    ) {
        //
    }

    public static function make(ErClient $client): Endpoint
    {
        return new static($client);
    }

    // ----------------------------------------

    public function getClient(): ErClient
    {
        return $this->client;
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

    public function getPathWithReplaces(): string
    {
        return preg_replace_callback(
            pattern: '/(\{.*?\})/',
            callback: fn ($matches) => $this->{trim($matches[1], '{}')},
            subject: static::getPath(),
        );
    }

    public static function requiresAuth(): bool
    {
        return static::$requiresAuth;
    }

    /**
     * @throws GuzzleException
     */
    public function request(HttpMethod $httpMethod, array $query = [], array $body = [], array $headers = []): ResponseInterface
    {
        if (! static::$isValidEndpoint) {
            throw new InvalidEndpointException('This endpoint is not valid. Maybe its path is not complete.');
        }

        $options = $this->options;

        if (count($query) > 0) {
            $options['query'] = $query;
        }

        // TODO: prepare all query parameters
        // TODO: prepare all body parameters
        // TODO: prepare all header parameters

        return $this->client->runHttpRequest($httpMethod, static::getPath(), static::requiresAuth(), $options);
    }

    /**
     * @throws GuzzleException
     */
    public function get(array $query = [], array $body = [], array $headers = []): ResponseInterface
    {
        return $this->request(HttpMethod::GET, $query, $body, $headers);
    }

    /**
     * @throws GuzzleException
     */
    public function post(array $body = [], array $query = [], array $headers = []): ResponseInterface
    {
        return $this->request(HttpMethod::POST, $query, $body, $headers);
    }

    /**
     * @throws GuzzleException
     */
    public function put(array $body = [], array $query = [], array $headers = []): ResponseInterface
    {
        return $this->request(HttpMethod::PUT, $query, $body, $headers);
    }

    /**
     * @throws GuzzleException
     */
    public function patch(array $body = [], array $query = [], array $headers = []): ResponseInterface
    {
        return $this->request(HttpMethod::PATCH, $query, $body, $headers);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(array $query = [], array $body = [], array $headers = []): ResponseInterface
    {
        return $this->request(HttpMethod::DELETE, $query, $body, $headers);
    }

    // ----------------------------------------

    /**
     * @throws InvalidHttpMethodException
     */
    protected function throwInvalidHttpMethodException(): void
    {
        throw new InvalidHttpMethodException('The endpoint does not support this method.');
    }
}
