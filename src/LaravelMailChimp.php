<?php

namespace Altelma\LaravelMailChimp;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class LaravelMailChimp
{
    private Client $client;
    private string $endpoint = 'https://us1.api.mailchimp.com/3.0/';

    public function __construct(string $apiKey)
    {
        $this->setEndpoint($apiKey);
        $this->client = new Client([
            'base_uri' => $this->endpoint,
            'headers' => [
                'Authorization' => 'apikey ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * @param string $apiKey
     */
    private function setEndpoint(string $apiKey)
    {
        $dc             = explode('-', $apiKey)[1];
        $this->endpoint = str_replace('us1', $dc, $this->endpoint);
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function get(string $method, array $args = []): object
    {
        $response = $this->client->get($method, $args);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function post(string $method, array $args = []): object
    {
        $response = $this->client->post($method, $args);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function patch(string $method, array $args = []): mixed
    {
        $response = $this->client->patch($method, $args);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function put(string $method, array $args = []): mixed
    {
        $response = $this->client->put($method, $args);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function delete(string $method, array $args = []): mixed
    {
        $response = $this->client->delete($method, $args);

        return json_decode($response->getBody()->getContents());
    }
}
