<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('member.index', [
            'members' => Member::all(),
        ]);
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        if ($request->has(['first_name', 'last_name'])) {
            Member::create([
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'nickname' => $request->input('nickname'),
                'email' => $request->input('email'),
                'bod' => $request->input('bod'),
                'birth_place' => $request->input('birth_place'),
                'gender' => $request->input('gender'),
                'marital_status' => $request->input('marital_status'),
                'address' => $request->input('address'),
                'address2' => $request->input('address2'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'zip_code' => $request->input('zip_code'),
                'phone' => $request->input('phone'),
                'home_phone' => $request->input('home_phone')
            ]);
        }
    }

    public function show(Member $member)
    {

    }

    public function edit(Member $member, Request $request)
    {

    }

    public function delete(Member $member)
    {

    }
}
