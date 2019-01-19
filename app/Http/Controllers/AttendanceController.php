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

    public function viewByDate(Request $request)
    {
        return view('attendanceByDate', [
            'members' => Member::all(),
            'date' => $request->input('date'),
            'attendance' => Attendance::memberThatAttend($request->input('date'))->get(),
        ]);
    }

    public function store(Request $request)
    {
        Attendance::whereDate('date', $request->input('date'))->delete();
        if(empty($request->input('members'))) {
            return redirect()->back();
        }

        $data = null;
        foreach($request->input('members') as $member_id ) {
            $data[] = [
                'date' => $request->input('date'),
                'member_id' => $member_id,
            ];
        }

        if(Attendance::insert($data))
            $request->session()->flash('status', 'Thank you, The attendance for ' . $request->input('date') . ' is saved');
        else
            $request->session()->flash('error', 'There is a problem when saving the attendance');
        return redirect()->back();
    }
}
