<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Run\Get_RunId_Endpoint;

describe('Endpoint: run/{id}', function () {
    it('has correct path', function () {
        $path = Get_RunId_Endpoint::getPath();

        expect($path)->toBe('run/{runId}');
    });

    it('requires authentication', function () {
        expect(Get_RunId_Endpoint::requiresAuth())->toBeTrue();
    });

    test('path with replaces works correctly', function () {
        $client = $this->makeErClient();
        $endpoint = new Get_RunId_Endpoint($client, 'test-id');

        expect($endpoint)->toBeInstanceOf(Get_RunId_Endpoint::class)
            ->and($endpoint->getPathWithReplaces())->toBe('run/test-id');
    });

    it('can run', function () {
        // TODO
    })->todo();

    it('can run from client fluent endpoint', function () {
        // TODO
    })->todo();

    it('errors if try to run from client fluent endpoint with invalid HTTP method', function () {
        // TODO
    })->todo();
});
