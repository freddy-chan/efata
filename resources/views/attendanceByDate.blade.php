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
            <label for="date" class="col-4">Date: {{ $date }}</label>
            <input type="hidden" name="date" id="date" value="{{ $date }}">
        </div>
{{--        {{ dd($attendance[0]) }}--}}
        @foreach($members as $member)
            <div class="form-check row">
                <label for="members" class="col-2"> {{ $member->first_name }} {{ $member->last_name }}</label>
                @if($attendance->contains('member_id', $member->id))
                    <input type="checkbox" class="form-check-input" id="members" name="members[]"
                           value="{{ $member->id }}" checked>
                @else
                    <input type="checkbox" class="form-check-input" id="members" name="members[]"
                           value="{{ $member->id }}">
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
