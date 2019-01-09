<?php
namespace Tests\Fakes;


class FakeTwilioResponse
{
    private $properties;
    public $body;

    public function __construct($response)
    {
        $this->properties = $response;
        $this->body = $response['body'];
    }

    public function toArray() {
        return $this->properties;
    }
}