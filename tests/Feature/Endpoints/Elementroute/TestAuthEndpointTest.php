<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\TestAuthEndpoint;
use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;

describe('GET elementroute/test-auth', function () {
    it('has correct path', function () {
        $path = TestAuthEndpoint::getPath();

        expect($path)->toBe('elementroute/test-auth');
    });

    it('requires authentication', function () {
        expect(TestAuthEndpoint::requiresAuth())->toBeTrue();
    });

    it('can run', function () {
        $client = $this->makeErClient();
        $endpoint = new TestAuthEndpoint($client);

        expect($endpoint)->toBeInstanceOf(TestAuthEndpoint::class);

        $response = $endpoint->get();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('can run from client fluent endpoint', function () {
        $client = $this->makeErClient();

        $response = $client->elementroute()->testAuth()->get();
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toContain('"status":"success"');
    });
});

describe('POST elementroute/test-auth', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (POST)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->post();
    })->expectException(ServerException::class);
});

describe('PUT elementroute/test-auth', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (PUT)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->put();
    })->expectException(ServerException::class);
});

describe('PATCH elementroute/test-auth', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (PATCH)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->patch();
    })->expectException(ServerException::class);
});

describe('DELETE elementroute/test-auth', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (DELETE)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->delete();
    })->expectException(ServerException::class);
});
