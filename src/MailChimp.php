<?php

namespace LaravelMailChimp;

class MailChimp
{
	private $apikey;
	private $endpoint = 'https://us1.api.mailchimp.com/3.0/';

	public function __construct($apikey = '')
	{
		$this->apikey = $apikey;
		$this->getEndpoint($apikey);
	}

	private function getEndpoint($apikey) {
		// if (!strpos($apikey, 'us1') !== FALSE) {
			$dc = explode('-', $apikey)[1];
			$this->endpoint = str_replace('us1', $dc, $this->endpoint);
		// }
	}

	public function get($method, $args = array())
	{
		return $this->makeRequest('get', $method, $args);
	}

	public function post($method, $args = array())
	{
		return $this->makeRequest('post', $method, $args);
	}

	public function patch($method, $args = array())
	{
		return $this->makeRequest('patch', $method, $args);
	}

	public function put($method, $args = array())
	{
		return $this->makeRequest('put', $method, $args);
	}

	public function delete($method, $args = array())
	{
		return $this->makeRequest('delete', $method, $args);
	}

	private function makeRequest($request, $method, $args = array())
	{
		$url = $this->endpoint . $method;
		$json_data = json_encode($args, JSON_FORCE_OBJECT);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/vnd.api+json',
			'Content-Type: application/vnd.api+json',
			'Authorization: apikey ' . $this->apikey));
		// curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

		switch($request) {
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
