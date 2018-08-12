<?php
/**
 * Created by PhpStorm.
 * User: sergio.rodenas
 * Date: 29/7/18
 * Time: 18:43
 */

namespace Whisper\HetznerCloud\Clients;

use Zttp\PendingZttpRequest;

class HetznerCloud
{
	public static $baseHost = "https://api.hetzner.cloud/v1/";
	public static $authenticationToken;

	private static $client;

	public static function __callStatic($name, $arguments)
	{
		return (new static())->getClient()->{$name}(...$arguments)->json();
	}

	private function getClient(){
		return (static::$client) ? static::$client : static::setClient();
	}

	private function setClient(){
		$client = (new PendingZttpRequest())->withHeaders([
			'Authorization' => 'Bearer '.static::$authenticationToken
		]);

		$client->options += [
			'base_uri' => static::$baseHost
		];

		return static::$client = $client;
	}
}