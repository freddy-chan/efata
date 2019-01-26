@extends('layouts.admin')

@section('content')
    <h2>Member</h2>

    <div class="form-group row">
        <div class="col">
            <a href="{{ route('member.create') }}">Create New Member</a>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

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
                        <td>
                            <a href="{{ route("member.edit", [$member->id]) }}">Edit</a> /
                            <a href="{{ route("member.delete", [$member->id]) }}">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
