<?php

namespace ElementRoute\ElementRouteSdkPhp\Concerns;

use GuzzleHttp\Exception\GuzzleException;

trait AuthenticatesApp
{
    protected string $token;

    /**
     * @throws GuzzleException
     */
    protected function authenticate(): self
    {
        if (! empty($this->token)) {
            return $this;
        }

        $response = $this->client->post($this->getFullUri('/auth/token'), [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'client_credentials',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        var_dump($data);
        exit;

        // return $data['access_token'];
    }
}
