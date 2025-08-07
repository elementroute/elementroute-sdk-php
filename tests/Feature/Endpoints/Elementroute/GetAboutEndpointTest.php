<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetAboutEndpoint;
use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;

describe('Endpoint: elementroute/about', function () {
    it('has correct path', function () {
        $path = GetAboutEndpoint::getPath();

        expect($path)->toBe('elementroute/about');
    });

    it('does not require authentication', function () {
        expect(GetAboutEndpoint::requiresAuth())->toBeFalse();
    });

    it('can run', function () {
        $client = $this->makeErClient();
        $about = new GetAboutEndpoint($client);

        expect($about)->toBeInstanceOf(GetAboutEndpoint::class);

        $response = $about->get();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('can run from client fluent endpoint', function () {
        $client = $this->makeErClient();

        $response = $client->elementroute()->about()->get();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (POST)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->post();
    })->expectException(ServerException::class);

    it('errors if try to run from client fluent endpoint with invalid HTTP method (PUT)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->put();
    })->expectException(ServerException::class);

    it('errors if try to run from client fluent endpoint with invalid HTTP method (PATCH)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->patch();
    })->expectException(ServerException::class);

    it('errors if try to run from client fluent endpoint with invalid HTTP method (DELETE)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->delete();
    })->expectException(ServerException::class);
});
