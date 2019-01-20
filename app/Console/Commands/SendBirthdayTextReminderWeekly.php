<?php

namespace App\Console\Commands;

use App\Member;
use App\Twilio\Twilio;
use App\Twilio\TwilioClient;
use Illuminate\Console\Command;

class SendBirthdayTextReminderWeekly extends Command
{
    protected $signature = 'efata:sendBirthdayTextReminderWeekly';

    protected $description = 'Send Birthday Text Reminder Weekly';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $destinations = explode(',', env('REMINDER_TO'));
        $members = (new Member())->birthdayThisMonth()->birthdayThisWeek()->get();
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
