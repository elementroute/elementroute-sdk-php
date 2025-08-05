<?php

namespace ElementRoute\ElementRouteSdkPhp\Concerns;

use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

trait RunsHttpRequests
{
    /**
     * @throws GuzzleException
     */
    public function runHttpRequest(HttpMethod $httpMethod, string $path, array $options = []): ResponseInterface
    {
        return $this->client->request($httpMethod->value, $this->getFullUri($path), $options);
    }
}
