@extends('layouts.admin')

@section('content')
    <h2>Attendance</h2>

    <form action="{{ route('storeAttendance') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="date" class="col-1">Date</label>
            <div class="col-3">
                <input class="form-control" type="date" id="date"
                       value="{{ \Carbon\Carbon::parse('sunday')->toDateString() }}">
            </div>
        </div>

        @foreach($members as $member)
            <div class="form-check row">
                <label for="member" class="col-2"> {{ $member->first_name }} {{ $member->last_name }}</label>
                <input type="checkbox" class="form-check-input" id="member" name="members[]" value="{{ $member->id }}">
            </div>

        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
