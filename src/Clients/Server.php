<?php
/**
 * Created by PhpStorm.
 * User: sergio.rodenas
 * Date: 30/7/18
 * Time: 11:28
 */

namespace Whisper\HetznerCloud\Clients;

use LaravelWhisper\Whisper\ClientInterface;

class Server implements ClientInterface
{
	public static $uri = 'servers';

	public static function all(): array
	{
		return HetznerCloud::get(static::$uri)['servers'];
	}

	public static function find($identifier): array
	{
		return HetznerCloud::get(static::$uri.'/'.$identifier)['server'];
	}

	public static function create(array $data): array
	{
		return HetznerCloud::post(static::$uri, $data)['server'];
	}

	public static function update($identifier, array $data): void
	{
		HetznerCloud::put(static::$uri.'/'.$identifier, $data);
	}

	public static function delete($identifier): ?bool
	{
		return ! isset(HetznerCloud::delete(static::$uri.'/'.$identifier)['error']);
	}
}