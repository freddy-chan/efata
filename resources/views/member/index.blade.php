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
            <table class="table" style="width:70%;">
                <thead>
                <tr>
                    <th width="49%">First Name</th>
                    <th width="49%">Last Name</th>
                    <th colspan="3" width="2%" class="text-center">Action</th>
                </tr>
                </thead>
                @foreach($members as $member)
                    <tbody>
                    <tr>
                        <td class="align-middle">{{ $member->first_name }}</td>
                        <td class="align-middle">{{ $member->last_name }}</td>
                        <td class="col-1">
                            <form method="GET" action="{{ route("member.edit", [$member->id]) }}">
                                @csrf
                                <button class="btn-link btn" type="submit">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route("member.delete", [$member->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-link" type="submit">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route("member.changeStatus", [$member->id]) }}">
                                <div class="btn-group" role="group">
                                    @csrf
                                    @if($member->status == "active")
                                        <button type="submit" name="status" id="status" class="btn btn-secondary active"
                                                value="active"> Active
                                        </button>
                                    @else
                                        <button type="submit" name="status" id="status" class="btn btn-secondary"
                                                value="active"> Active
                                        </button>
                                    @endif
                                    @if($member->status == "inactive")
                                        <button type="submit" name="status" id="status" value="inactive"
                                                class="btn btn-secondary active"> Inactive
                                        </button>
                                    @else
                                        <button type="submit" name="status" id="status" value="inactive"
                                                class="btn btn-secondary"> Inactive
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
