<?php

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
		if (!strpos($apikey, 'us1') !== FALSE) {
			$dc = explode('-', $apikey)[1];
			$this->endpoint = str_replace('us1', $dc, $this->endpoint);
		}
	}

	private function getOptions()
	{

	}

	public function makeRequest($request, $method)
	{
		$url = $this->endpoint . 'lists/57ff8a8389';
		echo $url;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/vnd.api+json',
			'Content-Type: application/vnd.api+json'));
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

		$result = curl_exec($ch);
		curl_close($ch);

		return json_decode($result);
	}
}
