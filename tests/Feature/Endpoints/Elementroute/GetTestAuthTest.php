<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\GetTestAuth;
use ElementRoute\ElementRouteSdkPhp\Exceptions\InvalidHttpMethodException;

describe('Endpoint: elementroute/test-auth', function () {
    it('has correct path', function () {
        $path = GetTestAuth::getPath();

        expect($path)->toBe('elementroute/test-auth');
    });

    it('requires login', function () {
        $client = $this->makeErClient();
        // TODO
    })->todo();

    it('can run', function () {
        $client = $this->makeErClient();
        // TODO
    })->todo();

    it('can run from client fluent endpoint', function () {
        $client = $this->makeErClient();
        // TODO
    })->todo();

    it('errors if try to run from client fluent endpoint with invalid HTTP method', function () {
        $client = $this->makeErClient();
        // TODO
    })->todo()->expectException(InvalidHttpMethodException::class);
});
