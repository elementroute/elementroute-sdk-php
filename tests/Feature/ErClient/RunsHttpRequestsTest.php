<?php

use ElementRoute\ElementRouteSdkPhp\ApiVersion;
use ElementRoute\ElementRouteSdkPhp\ErClient;
use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use Psr\Http\Message\ResponseInterface;

describe('Can run HTTP requests', function () {
    it('can run GET basic requests', function () {
        $client = ErClient::make($_ENV['CLIENT_ID'], $_ENV['CLIENT_SECRET'], ApiVersion::from($_ENV['API_VERSION']));
        $client->setBaseUrl($_ENV['BASE_URL']);
        $response = $client->runHttpRequest(HttpMethod::GET, 'elementroute/about');

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getBody()->getContents())->toContain('"status":"success"');
    });
});
