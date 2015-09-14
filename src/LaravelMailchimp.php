<?php

namespace ALTELMA\LaravelMailChimp;

class LaravelMailchimp
{
	public $endpoint = 'https://us1.api.mailchimp.com/3.0/';
	public $apikey = '';

	public function __construct($apikey = '')
	{
		$this->apikey = $apikey;
	}

	public function get($method, $args)
	{
		makeRequest('get', $method, $args);
	}

	public  function makeRequest($request, $method, $args)
	{
		// if (function_exists('curl_init')) {
		// 	$curl = curl_init();
		// 	curl_setopt($curl, CURLOPT_URL, '');
		// 	curl_setopt($curl, CURLOPT_HEADER, 0);
		// 	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		// 	curl_setopt($curl, CURLOPT_POST, true);
		// 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// 	curl_setopt($curl, CURLOPT_POSTFIELDS, "user=$user&pass=$pass");
		// 	curl_setopt($curl, CURLOPT_TIMEOUT, 30);

		// 	$result = curl_exec($curl);
		// } else {
		// 	return "your environment not support curl.";
		// }
	}
}