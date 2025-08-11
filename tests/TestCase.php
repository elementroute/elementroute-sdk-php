<?php

namespace ElementRoute\ElementRouteSdkPhp\Tests;

use Dotenv\Dotenv;
use ElementRoute\ElementRouteSdkPhp\ApiVersion;
use ElementRoute\ElementRouteSdkPhp\ErClient;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected string $clientId;

    protected string $clientSecret;

    protected string $baseUrl;

    protected function setUp(): void
    {
        parent::setUp();

        $dotenv = Dotenv::createImmutable(__DIR__.'/..');
        $dotenv->load();
        $dotenv->required(['CLIENT_ID', 'CLIENT_SECRET', 'BASE_URL'])->notEmpty();

        $this->clientId = $_ENV['CLIENT_ID'];
        $this->clientSecret = $_ENV['CLIENT_SECRET'];
        $this->baseUrl = $_ENV['BASE_URL'];
    }

    protected function makeErClient(ApiVersion $version = ApiVersion::V1): ErClient
    {
        return ErClient::make($this->clientId, $this->clientSecret, $version)
            ->setBaseUrl($this->baseUrl);
    }

    protected function getMicrosoftSharepointTestConfig(): array
    {
        return [
            'site_name' => $_ENV['MS_SP_SITE_NAME'],
            'channel_name' => $_ENV['MS_SP_CHANNEL_NAME'],
        ];
    }
}
