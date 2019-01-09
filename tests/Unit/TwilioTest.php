<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Twilio\Twilio;
use Tests\Fakes\FakeTwilioClient;

class TwilioTest extends TestCase
{
    public function testSendText()
    {
        $twilio = new Twilio(new FakeTwilioClient());

        $response = $twilio->sendBirthdayText('+181312345678');

        $this->assertEquals('Happy Birthday', $response->body);
    }
}
