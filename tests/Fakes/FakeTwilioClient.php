<?php
namespace Tests\Fakes;

use App\Twilio\TwilioClientInterface;

class FakeTwilioClient implements TwilioClientInterface
{
    private $properties = ['accountSid' => 'ACde110558d809b567ad3af153591bfdd8',
        'apiVersion' => '2010-04-01',
        'body' => 'This is Fake Properties',
        'dateCreated' => '2019-01-09 02:09:36',
        'dateUpdated' => '2019-01-09 02:09:36',
        'dateSent' => '2019-01-09 02:09:36',
        'direction' => 'outbound-api',
        'errorCode' => null,
        'errorMessage' => null,
        'from' => '+11234567891',
        'messagingServiceSid' => null,
        'numMedia' => '0',
        'numSegments' => '1',
        'price' => null,
        'priceUnit' => 'USD',
        'sid' => 'SM22f744dfc423408c9ffe7da442840fe8',
        'status' => 'queued',
        'subresourceUris' => [
            'media' => '/2010-04-01/Accounts/ACde110558d809b567ad3af153591bfdd8/Messages/SM22f744dfc423408c9ffe7da442840fe8/Media.json'
        ],
        'to' => '+18135080210',
        'uri' => '/2010-04-01/Accounts/ACde110558d809b567ad3af153591bfdd8/Messages/SM22f744dfc423408c9ffe7da442840fe8.json',
    ];

    public function sendText($number, $body) {
        $this->properties['body'] = $body;
        $this->properties['to'] = $number;

        return new FakeTwilioResponse($this->properties);
    }
}