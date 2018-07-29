<?php
/**
 * Created by PhpStorm.
 * User: sergio.rodenas
 * Date: 29/7/18
 * Time: 18:43
 */

use LaravelWhisper\Whisper\ClientInterface;
use Zttp\PendingZttpRequest;

class HetznerCloudClient implements ClientInterface
{
	public static $baseHost = "https://api.hetzner.cloud/v1/";
	public static $authenticationToken;

	protected $client;

	private function __construct()
	{
		$this->client = (new PendingZttpRequest())
			->withHeaders([
				'Authorization' => 'Bearer '.static::$authenticationToken
			]);
	}

	public static function all(): array
	{
		return (new static)->client->get(static::$baseHost.static::getModelEndpoint())->json();
	}

	public static function create(array $data): array
	{
		return (new static)->client->post(static::$baseHost.static::getModelEndpoint(), $data)->json();
	}

	public static function delete($identifier): ?bool
	{
		return (bool)(new static)->client->delete(static::$baseHost.static::getModelEndpoint().'/'.$identifier)->json();
	}

	public static function find($identifier): array
	{
		return (new static)->client->get(static::$baseHost.static::getModelEndpoint().'/'.$identifier)->json();
	}

	public static function update($identifier, array $data): void
	{
		(new static)->client->put(static::$baseHost.static::getModelEndpoint().'/'.$identifier, $data)->json();
	}

	private static function getModelEndpoint(){
		$model = get_called_class();
		return $model::$uri;
	}
}