<?php
/**
 * Created by PhpStorm.
 * User: sergio.rodenas
 * Date: 12/08/2018
 * Time: 17:28
 */

namespace Whisper\HetznerCloud\Clients;


use LaravelWhisper\Whisper\ClientInterface;

class ServerType implements ClientInterface
{
	public static $uri = 'server_types';

	public static function all(): array
	{
		return HetznerCloud::get(static::$uri)['server_types'];
	}

	public static function find($identifier): array
	{
		return HetznerCloud::get(static::$uri.'/'.$identifier)['server_type'];
	}

	public static function create(array $data): array{}
	public static function update($identifier, array $data): void{}
	public static function delete($identifier): ?bool{}
}