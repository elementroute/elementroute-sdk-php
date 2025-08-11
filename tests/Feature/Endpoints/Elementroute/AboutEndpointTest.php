<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\AboutEndpoint;
use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;

describe('GET elementroute/about', function () {
    it('has correct path', function () {
        $path = AboutEndpoint::getPath();

        expect($path)->toBe('elementroute/about');
    });

    it('does not require authentication', function () {
        expect(AboutEndpoint::requiresAuth())->toBeFalse();
    });

    it('can run', function () {
        $client = $this->makeErClient();
        $about = new AboutEndpoint($client);

        expect($about)->toBeInstanceOf(AboutEndpoint::class);

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
});

describe('POST elementroute/about', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (POST)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->post();
    })->expectException(ServerException::class);
});

describe('PUT elementroute/about', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (PUT)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->put();
    })->expectException(ServerException::class);
});

describe('PATCH elementroute/about', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (PATCH)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->patch();
    })->expectException(ServerException::class);
});

describe('DELETE elementroute/about', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (DELETE)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->delete();
    })->expectException(ServerException::class);
});
