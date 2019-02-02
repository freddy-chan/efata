<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
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

        return redirect(route('member'))->with('status', 'Thank you, the information is saved.');
    }

    public function show(Member $member)
    {

    }

    public function edit(Member $member)
    {
        return view('member.edit', [
            'member' => Member::find($member)->first(),
        ]);
    }

    public function delete(Member $member)
    {
        if ($member) {
            $member->delete();
            return redirect(route('member'))->with('status', 'Thank you, the member is deleted.');
        }

        return redirect(route('member'));
    }

    public function update(Member $member, Request $request)
    {
        if ($member) {
            $member->first_name = $request->input('first_name');
            $member->middle_name = $request->input('middle_name');
            $member->last_name = $request->input('last_name');
            $member->nickname = $request->input('nickname');
            $member->email = $request->input('email');
            $member->bod = $request->input('bod');
            $member->birth_place = $request->input('birth_place');
            $member->gender = $request->input('gender');
            $member->marital_status = $request->input('marital_status');
            $member->address = $request->input('address');
            $member->address2 = $request->input('address2');
            $member->city = $request->input('city');
            $member->state = $request->input('state');
            $member->country = $request->input('country');
            $member->zip_code = $request->input('zip_code');
            $member->phone = $request->input('phone');
            $member->home_phone = $request->input('home_phone');
            $member->save();

            return redirect(route('member'))->with('status', 'Thank you, the information is saved.');
        }

        return redirect(route('member'));
    }

    public function changeStatus(Member $member, Request $request)
    {
        if ($member && $request->has('status')) {
            $member->status = $request->input('status');
            $member->save();
        }

        return back();
    }
}
