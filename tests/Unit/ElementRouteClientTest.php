<?php

use ElementRoute\ElementRouteSdkPhp\ElementRouteClient;

test('ElementRouteClient can be instantiated without parameters', function () {
    $elementRoute = new ElementRouteClient();

    expect($elementRoute)->toBeInstanceOf(ElementRouteClient::class);
});

test('ElementRouteClient can be instantiated with client configuration', function () {
    $elementRoute = new ElementRouteClient('app_id', 'app_secret');

    expect($elementRoute)->toBeInstanceOf(ElementRouteClient::class);
});
