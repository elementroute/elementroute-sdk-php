<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Elementroute\About;
use ElementRoute\ElementRouteSdkPhp\ErClient;

describe('Endpoint: about', function () {
    it('has correct path', function () {
        $path = About::getPath();

        expect($path)->toBe('elementroute/about');
    });

    it('can run', function () {
        $client = new ErClient($this->clientId, $this->clientSecret);
        $client->setBaseUrl($_ENV['BASE_URL']);
        $about = new About($client);

        expect($about)->toBeInstanceOf(About::class);
    });
});
