@extends('layouts.admin')

@section('content')
    <h2>Member</h2>

    <div class="form-group row">
        <div class="col">
            <a href="{{ route('createNewMember') }}">Create New Member</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($members as $member)
                <tbody>
                    <tr>
                        <td>{{ $member->first_name }}</td>
                        <td>{{ $member->last_name }}</td>
                        <td>Edit / Delete</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
