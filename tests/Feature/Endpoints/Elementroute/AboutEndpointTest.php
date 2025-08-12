<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\AboutEndpoint;
use ElementRoute\ElementRouteSdkPhp\Exceptions\InvalidHttpMethodException;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use Psr\Http\Message\ResponseInterface;

describe('General: elementroute/about', function () {
    it('has correct path', function () {
        $path = AboutEndpoint::getPath();

        expect($path)->toBe('elementroute/about');
    });
});

describe('GET elementroute/about', function () {
    test('HTTP method is allowed', function () {
        expect(AboutEndpoint::isMethodAllowed(HttpMethod::GET))->toBeTrue();
    });

    it('does not require authentication', function () {
        expect(AboutEndpoint::requiresAuth(HttpMethod::GET))->toBeFalse();
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
    test('HTTP method is not allowed', function () {
        expect(AboutEndpoint::isMethodAllowed(HttpMethod::POST))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (POST)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->post();
    })->expectException(InvalidHttpMethodException::class);
});

describe('PUT elementroute/about', function () {
    test('HTTP method is not allowed', function () {
        expect(AboutEndpoint::isMethodAllowed(HttpMethod::PUT))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (PUT)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->put();
    })->expectException(InvalidHttpMethodException::class);
});

describe('PATCH elementroute/about', function () {
    test('HTTP method is not allowed', function () {
        expect(AboutEndpoint::isMethodAllowed(HttpMethod::PATCH))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (PATCH)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->patch();
    })->expectException(InvalidHttpMethodException::class);
});

describe('DELETE elementroute/about', function () {
    test('HTTP method is not allowed', function () {
        expect(AboutEndpoint::isMethodAllowed(HttpMethod::DELETE))->toBeFalse();
    });

    it('errors if try to run from client fluent endpoint with invalid HTTP method (DELETE)', function () {
        $client = $this->makeErClient();
        $client->elementroute()->about()->delete();
    })->expectException(InvalidHttpMethodException::class);
});
