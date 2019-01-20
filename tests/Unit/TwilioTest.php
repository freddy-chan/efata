<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Twilio\Twilio;
use Tests\Fakes\FakeTwilioClient;

class TwilioTest extends TestCase
{
    public function testSendBirthdayText()
    {
        $twilio = new Twilio(new FakeTwilioClient());

        $response = $twilio->sendBirthdayText('+181312345678');

        $this->assertEquals('Happy Birthday', $response->body);
    }

    public function testSendReminderText()
    {
        $twilio = new Twilio(new FakeTwilioClient());

        $response = $twilio->sendReminderText('This is the content', '+181312345678');

        $this->assertEquals('This is the content', $response->body);
    }
}
