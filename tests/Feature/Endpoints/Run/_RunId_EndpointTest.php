<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Run\_RunId_Endpoint;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

describe('GET run/{runId}', function () {
    it('has correct path', function () {
        $path = _RunId_Endpoint::getPath();

        expect($path)->toBe('run/{runId}');
    });

    it('requires authentication', function () {
        expect(_RunId_Endpoint::requiresAuth())->toBeTrue();
    });

    test('path with replaces works correctly', function () {
        $client = $this->makeErClient();
        $endpoint = new _RunId_Endpoint($client, 'test-id');

        expect($endpoint)->toBeInstanceOf(_RunId_Endpoint::class)
            ->and($endpoint->getPathWithReplaces())->toBe('run/test-id');
    });

    it('returns "Not found" error if an invalid ID is used', function () {
        $client = $this->makeErClient();
        try {
            $client->run()->_id_('not-a-valid-id')->get();

            // It shouldn't get here - or it fails the test
            expect(true)->toBeFalse();
        } catch (ClientException $e) {
            expect($e->getCode())->toBe(404)
                ->and($e->getResponse()->getStatusCode())->toBe(404)
                ->and($e->getResponse()->getBody()->getContents())->toContain('error')->toContain('Run ID not found');
        }
    });

    it('can run', function () {
        // TODO
    })->todo();

    it('can run from client fluent endpoint', function () {
        // TODO
    })->todo();
});

describe('POST run/{runId}', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (POST)', function () {
        $client = $this->makeErClient();
        $client->run()->_id_('any-id')->post();
    })->expectException(ServerException::class);
});

describe('PUT run/{runId}', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (PUT)', function () {
        $client = $this->makeErClient();
        $client->run()->_id_('any-id')->put();
    })->expectException(ServerException::class);
});

describe('PATCH run/{runId}', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (PATCH)', function () {
        $client = $this->makeErClient();
        $client->run()->_id_('any-id')->patch();
    })->expectException(ServerException::class);
});

describe('DELETE run/{runId}', function () {
    it('errors if try to run from client fluent endpoint with invalid HTTP method (DELETE)', function () {
        $client = $this->makeErClient();
        $client->run()->_id_('any-id')->delete();
    })->expectException(ServerException::class);
});
