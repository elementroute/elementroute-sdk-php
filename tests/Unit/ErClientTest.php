<?php

use ElementRoute\ElementRouteSdkPhp\ErClient;

describe('ElementRouteClient', function () {
    it('cannot be instantiated with missing parameters', function () {
        ErClient::make();
    })->expectException(ArgumentCountError::class);

    it('can be instantiated with client configuration', function () {
        $elementRoute = ErClient::make('app_id', 'app_secret');

        expect($elementRoute)->toBeInstanceOf(ErClient::class);
    });

    it('a base url can be changed in an instance', function () {
        $elementRoute = ErClient::make('app_id', 'app_secret');
        $previousUrl = $elementRoute->getBaseUrl();
        $elementRoute->setBaseUrl('http://localhost/test');

        expect($elementRoute->getBaseUrl())->toBe('http://localhost/test')
            ->and($elementRoute->getBaseUrl())->not()->toBe($previousUrl);
    });
});
