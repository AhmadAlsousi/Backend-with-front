<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
protected $token;
protected $instanceId;

public function __construct()
{
$this->token = env('ULTRAMSG_TOKEN');
$this->instanceId = env('ULTRAMSG_INSTANCE_ID');
}

public function sendMessage($to, $body)
{
$response = Http::asForm()->post("https://api.ultramsg.com/{$this->instanceId}/messages/chat", [
'token' => $this->token,
'to'    => $to,
'body'  => $body,
]);

return $response->json();
}
}
