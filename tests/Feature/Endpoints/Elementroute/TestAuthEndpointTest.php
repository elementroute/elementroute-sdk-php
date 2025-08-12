<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\TestAuthEndpoint;
use ElementRoute\ElementRouteSdkPhp\Exceptions\InvalidHttpMethodException;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use Psr\Http\Message\ResponseInterface;

describe('General: elementroute/test-auth', function () {
    it('has correct path', function () {
        $path = TestAuthEndpoint::getPath();

        expect($path)->toBe('elementroute/test-auth');
    });
});

describe('GET elementroute/test-auth', function () {
    test('HTTP method is allowed', function () {
        expect(TestAuthEndpoint::isMethodAllowed(HttpMethod::GET))->toBeTrue();
    });

    it('requires authentication', function () {
        expect(TestAuthEndpoint::requiresAuth(HttpMethod::GET))->toBeTrue();
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
    test('HTTP method is not allowed', function () {
        expect(TestAuthEndpoint::isMethodAllowed(HttpMethod::POST))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (POST)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->post();
    })->expectException(InvalidHttpMethodException::class);
});

describe('PUT elementroute/test-auth', function () {
    test('HTTP method is not allowed', function () {
        expect(TestAuthEndpoint::isMethodAllowed(HttpMethod::PUT))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (PUT)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->put();
    })->expectException(InvalidHttpMethodException::class);
});

describe('PATCH elementroute/test-auth', function () {
    test('HTTP method is not allowed', function () {
        expect(TestAuthEndpoint::isMethodAllowed(HttpMethod::PATCH))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (PATCH)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->patch();
    })->expectException(InvalidHttpMethodException::class);
});

describe('DELETE elementroute/test-auth', function () {
    test('HTTP method is not allowed', function () {
        expect(TestAuthEndpoint::isMethodAllowed(HttpMethod::DELETE))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (DELETE)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->testAuth()->delete();
    })->expectException(InvalidHttpMethodException::class);
});
