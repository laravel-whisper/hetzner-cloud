<?php
/**
 * Created by PhpStorm.
 * User: sergio.rodenas
 * Date: 29/7/18
 * Time: 18:24
 */

namespace Whisper\HetznerCloud\Models;

use LaravelWhisper\Whisper\Whisperer;
use Whisper\HetznerCloud\Clients\ServerType as ServerTypeClient;

class ServerType extends Whisperer
{
	public static $client = ServerTypeClient::class;
	public $guarded = [];
}