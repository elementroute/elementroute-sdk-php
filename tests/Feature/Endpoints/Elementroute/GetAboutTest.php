<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetAbout;
use ElementRoute\ElementRouteSdkPhp\Exceptions\InvalidHttpMethodException;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use Psr\Http\Message\ResponseInterface;

describe('Endpoint: elementroute/about', function () {
    it('has correct path', function () {
        $path = GetAbout::getPath();

        expect($path)->toBe('elementroute/about');
    });

    it('does not require authentication', function () {
        expect(GetAbout::requiresAuth())->toBeFalse();
    });

    it('can run', function () {
        $client = $this->makeErClient();
        $about = new GetAbout($client);

        expect($about)->toBeInstanceOf(GetAbout::class);

        $response = $about->request();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('can run from client fluent endpoint', function () {
        $client = $this->makeErClient();

        $response = $client->elementroute()->about()->request();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about(HttpMethod::POST)->request();
    })->expectException(InvalidHttpMethodException::class);
});
