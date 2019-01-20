<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendBirthdayTextReminderTomorrow extends Command
{
    protected $signature = 'efata:sendBirthdayTextReminderTomorrow';

    protected $description = 'Send birthday text reminder that birthday tomorrow';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $destinations = explode(',', env('REMINDER_TO'));
        $members = (new Member())->birthdayTomorrow()->get();
        $content = null;
        foreach ($members as $member) {
            $content .= $member->first_name . ' ' . $member->last_name . ' ' . $member->bod . ', ';
        }

        if($content) {
            $twilio = new Twilio(new TwilioClient());
            foreach ($destinations as $to) {
                $twilio->sendReminderText($content, $to);
            }
        }
    }
}
