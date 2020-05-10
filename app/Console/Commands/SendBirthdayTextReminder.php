<?php

namespace App\Console\Commands;

use Nexmo\Laravel\Facade\Nexmo;
use App\Member;
use Illuminate\Console\Command;

class SendBirthdayTextReminder extends Command
{
    protected $signature = 'efata:sendBirthdayTextReminder';

    protected $description = 'Send birthday text reminder';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $destinations = explode(',', env('REMINDER_TO'));
        $members = (new Member())->birthdayThisMonth()->birthdayToday()->get();
        $content = null;
        foreach ($members as $member) {
            $content .= $member->first_name . ' ' . $member->last_name . ' ' . $member->bod . ', ';
        }

        if($content) {
            foreach ($destinations as $to) {
                Nexmo::message()->send([
                    'to' => $to,
                    'from' => config('nexmo.phone_number'),
                    'text' => $content
                ]);
            }
        }
    }
}
