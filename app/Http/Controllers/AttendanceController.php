<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('attendance', [
            'members' => Member::all(),
        ]);
    }

    public function store(Request $request)
    {
        foreach($request->input('members') as $member_id ) {
            $data[] = [
                'date' => $request->input('date'),
                'member_id' => $member_id,
            ];
        }
        Attendance::insert($data);
    }
}
