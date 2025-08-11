<?php

use ElementRoute\ElementRouteSdkPhp\Endpoints\MicrosoftSharepoint\FilesEndpoint;
use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;

describe('GET microsoft-sharepoint/file', function () {
    it('has correct path', function () {
        $path = FilesEndpoint::getPath();

        expect($path)->toBe('microsoft-sharepoint/files');
    });

    it('requires authentication', function () {
        expect(FilesEndpoint::requiresAuth())->toBeTrue();
    });

    it('can run with valid parameters', function () {
        $client = $this->makeErClient();
        $endpoint = new FilesEndpoint($client);

        $response = $endpoint->get(query: [
            'site_name' => $this->getMicrosoftSharepointTestConfig()['site_name'],
            'channel' => $this->getMicrosoftSharepointTestConfig()['channel_name'],
            '_meta_' => json_encode([
                'internal_id' => 12345,
            ]),
        ]);
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toBeJson()
            ->and($responseContent)->toContain('"data":{"id":')
            ->and($responseContent)->toContain('"_meta_":{"internal_id":12345}')
            ->and($responseContent)->toContain('"type":{"name":"List files based on parameters given","system":"Microsoft Sharepoint"}')
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('can run fluently with valid parameters', function () {
        $client = $this->makeErClient();

        $response = $client->microsoftSharepoint()->files()->get(query: [
            'site_name' => $this->getMicrosoftSharepointTestConfig()['site_name'],
            'channel' => $this->getMicrosoftSharepointTestConfig()['channel_name'],
            '_meta_' => json_encode([
                'internal_id' => 987654,
            ]),
        ]);
        $responseContent = $response->getBody()->getContents();

        expect($response)->toBeInstanceOf(ResponseInterface::class)
            ->and($response->getStatusCode())->toBe(200)
            ->and($response->getHeader('Content-Type'))->toContain('application/json')
            ->and($responseContent)->toBeString()
            ->and($responseContent)->toBeJson()
            ->and($responseContent)->toContain('"data":{"id":')
            ->and($responseContent)->toContain('"_meta_":{"internal_id":987654}')
            ->and($responseContent)->toContain('"type":{"name":"List files based on parameters given","system":"Microsoft Sharepoint"}')
            ->and($responseContent)->toContain('"status":"success"');
    });

    it('errors if missing required parameters', function () {
        $this->makeErClient()->microsoftSharepoint()->files()->get(query: [
            //  Site name is required!
            // 'site_name' => $this->getMicrosoftSharepointTestConfig()['site_name'],

            'channel' => $this->getMicrosoftSharepointTestConfig()['channel_name'],
        ]);
    })->expectException(ServerException::class);
});

describe('POST microsoft-sharepoint/file', function () {
})->todo();

describe('PUT microsoft-sharepoint/file', function () {
    it('errors if try to run from client fluent', function () {
        $client = $this->makeErClient();
        $client->microsoftSharepoint()->files()->put();
    })->expectException(ServerException::class);
});

describe('PATCH microsoft-sharepoint/file', function () {
    it('errors if try to run from client fluent', function () {
        $client = $this->makeErClient();
        $client->microsoftSharepoint()->files()->patch();
    })->expectException(ServerException::class);
});

describe('DELETE microsoft-sharepoint/file', function () {
    it('errors if try to run from client fluent', function () {
        $client = $this->makeErClient();
        $client->microsoftSharepoint()->files()->delete();
    })->expectException(ServerException::class);
});
