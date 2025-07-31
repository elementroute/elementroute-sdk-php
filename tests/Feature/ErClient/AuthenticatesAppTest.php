<?php

use ElementRoute\ElementRouteSdkPhp\ApiVersion;
use ElementRoute\ElementRouteSdkPhp\ErClient;

describe('ElementROUTE Authentication', function () {
    it('can authenticate', function () {
        $client = ErClient::make($_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET'], ApiVersion::from($_ENV['API_VERSION']));

    });
});
