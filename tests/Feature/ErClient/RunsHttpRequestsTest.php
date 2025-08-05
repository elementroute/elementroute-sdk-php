<?php

use ElementRoute\ElementRouteSdkPhp\HttpMethod;
use Psr\Http\Message\ResponseInterface;

describe('Can run HTTP requests', function () {
    it('can run GET basic requests', function () {
        $client = $this->makeErClient();
        $response = $client->runHttpRequest(HttpMethod::GET, 'elementroute/about');

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getBody()->getContents())->toContain('"status":"success"');
    });
});
