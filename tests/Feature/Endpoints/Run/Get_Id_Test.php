<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Run\Get_Id_;

describe('Endpoint: run/{id}', function () {
    it('has correct path', function () {
        $path = Get_Id_::getPath();

        expect($path)->toBe('run/{id}');
    });

    it('requires authentication', function () {
        expect(Get_Id_::requiresAuth())->toBeTrue();
    });

    test('path with replaces works correctly', function () {
        $client = $this->makeErClient();
        $endpoint = new Get_Id_($client, 'test-id');

        expect($endpoint)->toBeInstanceOf(Get_Id_::class)
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
