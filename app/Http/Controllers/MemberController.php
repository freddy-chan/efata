<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function index()
    {
        return view('member.index', [
            'members' => Member::all(),
        ]);
    }
}
