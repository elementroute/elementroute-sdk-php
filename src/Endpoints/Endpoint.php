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
    public function request(HttpMethod $httpMethod, array $queryParameters = [], array $bodyParameters = [], array $headerParameters = []): ResponseInterface
    {
        if (! static::$isValidEndpoint) {
            throw new InvalidEndpointException('This endpoint is not valid. Maybe its path is not complete.');
        }

        // TODO: prepare all query parameters
        // TODO: prepare all body parameters
        // TODO: prepare all header parameters

        return $this->client->runHttpRequest($httpMethod, static::getPath(), static::requiresAuth(), $this->options);
    }

    /**
     * @throws GuzzleException
     */
    public function get(array $queryParameters = [], array $bodyParameters = [], array $headerParameters = []): ResponseInterface
    {
        return $this->request(HttpMethod::GET, $queryParameters, $bodyParameters, $headerParameters);
    }

    /**
     * @throws GuzzleException
     */
    public function post(array $bodyParameters = [], array $queryParameters = [], array $headerParameters = []): ResponseInterface
    {
        return $this->request(HttpMethod::POST, $queryParameters, $bodyParameters, $headerParameters);
    }

    /**
     * @throws GuzzleException
     */
    public function put(array $bodyParameters = [], array $queryParameters = [], array $headerParameters = []): ResponseInterface
    {
        return $this->request(HttpMethod::PUT, $queryParameters, $bodyParameters, $headerParameters);
    }

    /**
     * @throws GuzzleException
     */
    public function patch(array $bodyParameters = [], array $queryParameters = [], array $headerParameters = []): ResponseInterface
    {
        return $this->request(HttpMethod::PATCH, $queryParameters, $bodyParameters, $headerParameters);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(array $queryParameters = [], array $bodyParameters = [], array $headerParameters = []): ResponseInterface
    {
        return $this->request(HttpMethod::DELETE, $queryParameters, $bodyParameters, $headerParameters);
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
