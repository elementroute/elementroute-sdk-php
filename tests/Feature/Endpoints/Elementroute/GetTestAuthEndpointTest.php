<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetTestAuthEndpoint;
use ElementRoute\ElementRouteSdkPhp\Exceptions\InvalidHttpMethodException;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use Psr\Http\Message\ResponseInterface;

describe('Endpoint: elementroute/test-auth', function () {
    it('has correct path', function () {
        $path = GetTestAuthEndpoint::getPath();

        expect($path)->toBe('elementroute/test-auth');
    });

    it('requires authentication', function () {
        expect(GetTestAuthEndpoint::requiresAuth())->toBeTrue();
    });

    it('can run', function () {
        $client = $this->makeErClient();
        $endpoint = new GetTestAuthEndpoint($client);

        expect($endpoint)->toBeInstanceOf(GetTestAuthEndpoint::class);

        $response = $endpoint->request();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('can run from client fluent endpoint', function () {
        $client = $this->makeErClient();

        $response = $client->elementroute()->testAuth()->request();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth(HttpMethod::POST)->request();
    })->expectException(InvalidHttpMethodException::class);
});
