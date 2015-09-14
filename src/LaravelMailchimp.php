<?php

namespace ALTELMA\LaravelMailChimp;

use Illuminate\Routing\Controller as BaseController;

class LaravelMailchimp extends BaseController
{
	public static $api_key;
	public static $end_point;
	public static $verify_ssl;

	public static function get($method, $args)
	{
		self::makeRequest('get', $method, $args);
	}

	public static function makeRequest($request, $method, $args)
	{

	}
}