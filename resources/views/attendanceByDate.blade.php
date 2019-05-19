@extends('layouts.admin')

@section('content')
    <h2>Attendance</h2>

    @if(Session::has('status'))
        <p class="alert alert-info">
            {{ Session::get('status') }}
        </p>
    @endif

    <form action="{{ route('attendanceViewByDate') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="date" class="col-6">Date: {{ $date }}</label>
            <input type="hidden" name="date" id="date" value="{{ $date }}">
        </div>
        @foreach($members as $member)
            <div class="form-check row">
                <label for="members" class="col-8"> {{ $member->first_name }} {{ $member->last_name }}</label>
                @if($attendance->contains('member_id', $member->id))
                    <input type="checkbox" class="form-check-input col-4" id="members" name="members[]"
                           value="{{ $member->id }}" checked>
                @else
                    <input type="checkbox" class="form-check-input col-2" id="members" name="members[]"
                           value="{{ $member->id }}">
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
