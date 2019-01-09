<?php
namespace App\Twilio;

use Twilio\Rest\Client;

class TwilioClient implements TwilioClientInterface
{
    private $httpClient;

    function __construct()
    {
        $this->httpClient = new Client(config('app.twilio_account_sid'), config('app.twilio_auth_token'));
    }

    function sendText($number, $body)
    {
        return new TwilioResponse($this->httpClient->messages->create($number,
            array(
                'from' => config('app.twilio_from_number'),
                'body' => $body,
            )
        ));
    }
}