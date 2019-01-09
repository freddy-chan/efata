<?php

namespace App\Twilio;


interface TwilioClientInterface
{
    function sendText($number, $body);
}