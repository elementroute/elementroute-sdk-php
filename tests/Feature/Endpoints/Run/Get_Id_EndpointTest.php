<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\Run\Get_RunId_Endpoint;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

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

    it('returns "Not found" error if an invalid ID is used', function () {
        $client = $this->makeErClient();
        try {
            $client->run()->_id_('not-a-valid-id')->get();

            // It shouldn't get here - or it fails the test
            expect(true)->toBeFalse();
        } catch (ClientException $e) {
            expect($e->getCode())->toBe(404)
                ->and($e->getResponse()->getStatusCode())->toBe(404)
                ->and($e->getResponse()->getBody()->getContents())->toContain('error')->toContain('Run ID not found');
        }
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
