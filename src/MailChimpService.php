<?php

namespace Altelma\LaravelMailChimp;

class MailChimpService
{
    private $apiKey;
    private $endpoint = 'https://us1.api.mailchimp.com/3.0/';

    public function __construct(string $apiKey = '')
    {
        $this->apiKey = $apiKey;
        $this->getEndpoint($apiKey);
    }

    /**
     * @param string $apiKey
     */
    private function getEndpoint(string $apiKey)
    {
        $dc = explode('-', $apiKey)[1];
        $this->endpoint = str_replace('us1', $dc, $this->endpoint);
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function get(string $method, array $args = [])
    {
        return $this->makeRequest('get', $method, $args);
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function post(string $method, array $args = [])
    {
        return $this->makeRequest('post', $method, $args);
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function patch(string $method, array $args = [])
    {
        return $this->makeRequest('patch', $method, $args);
    }

    /**
     * @param $method
     * @param array $args
     *
     * @return mixed
     */
    public function put($method, $args = [])
    {
        return $this->makeRequest('put', $method, $args);
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function delete(string $method, array $args = [])
    {
        return $this->makeRequest('delete', $method, $args);
    }

    /**
     * @param string $request
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    private function makeRequest(string $request, string $method, array $args = [])
    {
        $url = $this->endpoint.$method;
        $json_data = json_encode($args, JSON_FORCE_OBJECT);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/vnd.api+json',
            'Content-Type: application/vnd.api+json',
            'Authorization: apikey '.$this->apiKey, ]);
        // curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        switch ($request) {
            case 'post':
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            break;

            case 'get':
                $query = http_build_query($args);
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$query);
            break;

            case 'delete':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;

            case 'patch':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            break;

            case 'put':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            break;
        }

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }
}
