<?php

namespace ElementRoute\ElementRouteSdkPhp\Tests;

use Dotenv\Dotenv;
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
}
