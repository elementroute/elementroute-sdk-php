<?php

use ElementRoute\ElementRouteSdkPhp\ApiVersion;
use ElementRoute\ElementRouteSdkPhp\ErClient;

describe('ErClient basics', function () {
    it('can be instantiated', function () {
        $client = ErClient::make($_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET'], ApiVersion::from($_ENV['API_VERSION']));

        expect($client)->toBeInstanceOf(ErClient::class);
    });

    test('Base Url can be changed', function () {
        $client = ErClient::make($_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET'], ApiVersion::from($_ENV['API_VERSION']));
        $client->setBaseUrl('https://example.com/');

        expect($client->getBaseUrl())->toBe('https://example.com/');
    });
});
