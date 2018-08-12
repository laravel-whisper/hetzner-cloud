<?php
/**
 * Created by PhpStorm.
 * User: sergio.rodenas
 * Date: 29/7/18
 * Time: 18:16
 */

namespace Whisper\HetznerCloud\Models;

use LaravelWhisper\Whisper\Whisperer;
use Whisper\HetznerCloud\Clients\Server as ServerClient;

class Server extends Whisperer
{
	public static $client = ServerClient::class;
	public $guarded = [];
}