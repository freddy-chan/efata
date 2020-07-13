<?php

namespace App\Http\Controllers\API;

use Log;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Http\Controllers\Controller;

class ReminderController extends Controller
{
    public function serviceSchedule(Request $request) {
	if ($this->validateKey($request->get('key'), $request->get('to'))){
            Nexmo::message()->send([
                'to'=> $request->get('to'),
                'from' => config('nexmo.phone_number'),
                'text' => $request->get('body')
            ]);

            return true;
        }

        return false;
    }

    private function validateKey($key, $to) {
        $decodeKey = base64_decode($key);
        $results = explode(';', $decodeKey);
	if ($results[0] == env('REMINDER_SALT') && $results[1] == $to) {
            return true;
        }

        return false;
    }
}
