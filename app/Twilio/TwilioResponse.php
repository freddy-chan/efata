<?php
namespace App\Twilio;

use Twilio\Rest\Api\V2010\Account\MessageInstance;

class TwilioResponse
{
    public $body;
    public $status;
    public $to;
    public $errorMessage;
    private $response;

    public function __construct(MessageInstance $response)
    {
        $this->response = $response;
        $this->body = $response->body;
        $this->to = $response->to;
        $this->status = $response->status;
        $this->errorMessage = $response->errorMessage;
    }

    public function toArray()
    {
        $this->response->toArray();
    }
}